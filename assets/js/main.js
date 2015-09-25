// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we have to scale it using CSS
// transform.
// --------------------------------------------------------------
// Scaling factor: 300.54
// fieldWidth / captchaScale = 300.54
function scaleCaptcha() {
	var fieldWidth = $('.text-field').first().outerWidth();
	var captchaScale = fieldWidth / 300.54;
	$('.g-recaptcha').css({
		'transform':'scale('+captchaScale+')'
	});
	console.log('fieldWidth: ' + fieldWidth);
}

// Domain Portfolio
// --------------------------------------------------------------

var screenHeight;
var portfolio;
var domainList;
var domainListHeight;

function portfolioSetup() {
	// If the list of domains extends beyond the bottom of the screen,
	// Set it to scroll instead of clipping off at the bottom
	screenHeight = $(window).height();
	domainListHeight = domainList.outerHeight();
	if( (domainListHeight + 67) >= screenHeight ) {
		// Activate scrolling on domain list
		domainList.css({ height: (screenHeight - 67) + 'px', overflow: 'auto' });
	} else {
		domainList.css({ height: 'auto' });
	}
	// Detect the height and keep it off the screen until it's needed
	portfolio.css({top: -domainListHeight + 'px' });
}

$(window).load(function() { 
	
	screenHeight = $(window).height();
	portfolio = $('#portfolio');
	domainList = $('#domains');
	domainListHeight = domainList.outerHeight();
	
	$(window).resize( $.throttle( 500, portfolioSetup ) );
	
	// Toggle Open/Close
	$('#more-domains-btn').on('click', function() { 
		$('.portfolio').toggleClass('open');
	});

	portfolioSetup();

	// Re-run portfolioSetup in 1.5 seconds just in case the webfonts
	// aren't displaying yet
	window.setTimeout(function() { 
		portfolioSetup();
	}, 1500);

	// Domain Name
	// --------------------------------------------------------------

	// Fit domain dame text into the available width
	$('.header .title').bigtext();
});

$(function() { 

	// Placeholder support for older browsers (IE9 and below)
	$('input').placeholder();

	// Trigger captcha scaling 
	// first run on doc ready
	scaleCaptcha();
	// then on resize	
	$(window).resize( $.throttle( 100, scaleCaptcha ) );

	// AJAX Form Handling
	// --------------------------------------------------------------

	var offerForm = $("#offer-form");
	var successContainer = $('.form-success');
	var errorContainer = $('.form-error');
	$('.send-btn').removeAttr('disabled');

	// show a simple loading indicator
	var loader = jQuery('<div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>')
		.appendTo('.send-btn-wrapper')
		.hide();

	// Validate form
	offerForm.validate({
		submitHandler: function(form) {
			var formData = offerForm.serialize();
			// Disable send button and show loading indicator
			$('.send-btn').attr('value', 'sending');
			$('.send-btn').attr('disabled', 'disabled');
			loader.show();
			$.post('index.php?ajax', formData, function(data) {
				data = $.parseJSON(data);
				if( data['success'] != '' ) {
					// Hide error message and form
					errorContainer.hide();
					$('.fields').hide();
					// Display success message
					successContainer.show().append(data['success']);
				} else {
					// Display error message
					errorContainer.show().find('ul').empty().append(data['error']);
					// Reset captcha if it's enabled
					if( typeof grecaptcha !== 'undefined' ) {
						grecaptcha.reset();
					}
					// Change resubmit message if SMTP fails
					if( data['error_code'] == 'SMTP' ) {
						$('p', errorContainer).text('');
					}
				}
			}).always(function() { 
				// Re-enable send button and hide loading indicator
				$('.send-btn').attr('value', 'send');
				$('.send-btn').removeAttr('disabled');
				loader.hide();
			});
		}
	});

});