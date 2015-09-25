<?php
    require_once('config.php');
    require_once('includes/functions.php');
    require_once('includes/process-form.php');
    // Convert domain names to lower case, just in case!
    $domains = array_change_key_case($domains, CASE_LOWER);
    // Get the current domain name, using the nicename if available
    if( isset($domains[$_SERVER['HTTP_HOST']]['nicename']) ) {
        $current_domain = $domains[$_SERVER['HTTP_HOST']]['nicename'];
    } else {
        $current_domain = $_SERVER['HTTP_HOST']; 
    }
    // Start up the editor if ?editor is added to the end of the URL
    if( isset($_GET['editor']) ) {
        include_once('includes/editor.php');
    }
?><!doctype html>
<html>
<head>

    <meta charset="utf-8">

    <!-- Page Title -->
    <title><?php echo $current_domain; ?> is for sale!</title>

    <!-- Page Description -->
    <meta name="description" content="">
    
    <!-- Set the viewport to the device's screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/icons/favicon.png">

    <!-- Styles for all browsers and IE 9+ -->
    <!--[if !(IE)|(IE 9)]> -->
    <link rel="stylesheet" href="assets/css/screen.css">
    <style>
        /* Background styles */
        body {
            background-image: url('assets/images/bg-<?php echo $config['image']; ?>.jpg');
        }
        body:after {
            <?php if( $config['tint'] != '' ): ?>
                background-color: rgba(<?php echo hex2rgb($config['tint']); ?>, .63);
            <?php endif; ?>
            <?php if( $config['texture'] != '' ): ?>
                background-image: url('assets/images/texture-<?php echo $config['texture']; ?>.png');
            <?php endif; ?>
        }
        /* Narrow screen background styles */
        @media (max-width: 480px) {
            .header {
                background-image: url('assets/images/bg-<?php echo $config['image']; ?>.jpg');
            }
            .header:after {
                <?php if( $config['tint'] != '' ): ?>
                    background-color: rgba(<?php echo hex2rgb($config['tint']); ?>, .63);
                <?php endif; ?>
                <?php if( $config['texture'] != '' ): ?>
                    background-image: url('assets/images/texture-<?php echo $config['texture']; ?>.png');
                <?php endif; ?>
            }
        }
    </style>
    <![endif]-->
    <!-- Basic styles for older browsers, IE 8 and below -->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css">
    <![endif]-->

    <!-- Include jQuery with local fallback -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.3.min.js"><\/script>')</script>
    
    <!-- jQuery plugins -->
    <script src="assets/js/plugins.js"></script>
    
    <!-- JavaScript that runs on document load and document ready -->
    <script src="assets/js/main.js"></script>
    
    <!-- Load fonts -->
    <script type="text/javascript">
        WebFontConfig = {
            google: { 
                families: [ 'Open+Sans:700italic,800italic:latin', 'Open+Sans+Condensed:300:latin' ] 
            }
        };
        (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })(); </script>
    
    <!-- reCAPTCHA -->
    <?php if( $config['enable_recaptcha'] === true ) : ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>

</head>
<body>
    
    <!-- Title and price -->
    <header class="header">
        <div class="header-inner">
            <h1 class="title"><span><?php echo $current_domain; ?></span></h1>
            <span class="subtitle">is for sale!</span>
            <?php 
                if( 
                    isset( $domains[$_SERVER['HTTP_HOST']] )
                    && $domains[$_SERVER['HTTP_HOST']]['price'] != ''
                ): 
            ?>
                <div class="price-tag">
                    <span class="price"><?php echo $domains[$_SERVER['HTTP_HOST']]['price']; ?></span>
                    <span class="caption"><abbr title="estimated">est.</abbr> value</span>
                    <svg class="tag-outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 157 87" version="1.1" xml:space="preserve" stroke-linejoin="round">
                      <g id="tag-outline">
                        <path d="M143.87 82.33c5.14 0 9.33-4.19 9.33-9.33l0-59.7c0-5.14-4.19-9.33-9.33-9.33l-111.93 0c-3.24 0-6.19 1.64-7.91 4.38l-18.65 29.85c-1.88 3-1.88 6.89 0 9.89l18.65 29.85c1.71 2.74 4.67 4.38 7.91 4.38l111.93 0ZM143.87 0.25c7.2 0 13.06 5.86 13.06 13.06l0 59.7c0 7.2-5.86 13.06-13.06 13.06l-111.93 0c-4.53 0-8.67-2.29-11.07-6.14l-18.65-29.85c-2.63-4.2-2.63-9.64 0-13.84l18.65-29.85c2.4-3.84 6.54-6.14 11.07-6.14l111.93 0Z" fill="#c05862"/>
                        <path d="M31.94 51.74c4.73 0 8.58-3.85 8.58-8.58 0-4.73-3.85-8.58-8.58-8.58 -4.73 0-8.58 3.85-8.58 8.58 0 4.73 3.85 8.58 8.58 8.58M31.94 33.08c5.56 0 10.07 4.52 10.07 10.07 0 5.56-4.52 10.07-10.07 10.07 -5.56 0-10.07-4.52-10.07-10.07 0-5.56 4.52-10.07 10.07-10.07" fill="#c05862"/>
                      </g>
                    </svg>
                    <svg class="tag-fill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 157 86" version="1.1" xml:space="preserve" stroke-linejoin="round">
                        <path id="tag-fill" d="M31.99 33.12c5.52 0 10 4.49 10 10 0 5.52-4.49 10-10 10 -5.52 0-10-4.49-10-10 0-5.52 4.49-10 10-10M2.47 50l18.53 29.64c2.39 3.82 6.5 6.09 11 6.09l111.15 0c7.15 0 12.97-5.82 12.97-12.97l0-59.28c0-7.15-5.82-12.97-12.97-12.97l-111.15 0c-4.5 0-8.61 2.28-11 6.09l-18.53 29.64c-2.61 4.18-2.61 9.57 0 13.75" style="fill-opacity:0.63;fill:#28273c"/>
                    </svg>
                </div>
            <?php endif; ?>
        </div>
    </header>
    
    <!-- Offer form -->
    <section class="main">
        <div class="main-inner">
            <form action="?" method="post" class="offer-form" id="offer-form">
                <h2 class="title">make your offer</h2>
                <?php 
                    if( 
                        isset( $domains[$_SERVER['HTTP_HOST']] )
                        && $domains[$_SERVER['HTTP_HOST']]['description'] != ''
                    ): 
                ?>
                    <p><?php echo $domains[$_SERVER['HTTP_HOST']]['description']; ?></p>
                <?php endif; ?>
                <?php 
                    $error_style = 'display: none;';
                    if( isset($error) && $error != '' ) {
                        $error_style = '';
                    }
                ?>
                <div class="form-error animated shake" style="<?php echo $error_style; ?>">
                    <span aria-hidden="true" class="icon li_pen"></span>
                    <p>Please correct the following and resubmit, thanks!</p>
                    <ul><?php if( isset($error) ) { echo $error; } ?></ul>
                </div>

                <?php 
                    $success_style = 'display: none;';
                    if( isset($success) && $success === true ) {
                        $success_style = '';
                    }
                ?>
                <div class="form-success animated zoomInDown" style="<?php echo $success_style; ?>">
                    <span aria-hidden="true" class="icon li_like"></span>
                    <?php if( isset($success) ) { echo $success; } ?>
                </div>

                <?php if( $success_style != '' ): ?>
                    <div class="fields">
                        <div class="field-wrapper border">
                            <label for="offer" class="offer-label">Offer</label>
                            <input 
                                type="text" 
                                name="offer"
                                id="offer" 
                                placeholder="offer ($)" 
                                class="text-field"
                                required
                                minlength="2"
                                value="<?php if( isset($field_data['offer']) ) { echo $field_data['offer']; } ?>"
                            >
                        </div>
                        <div class="field-wrapper border">
                            <label for="name" class="name-label">Full Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                placeholder="full name" 
                                class="text-field"
                                required
                                minlength="2"
                                value="<?php if( isset($field_data['name']) ) { echo $field_data['name']; } ?>"
                            >
                        </div>
                        <div class="field-wrapper border">
                            <label for="email" class="email-label">Email</label>
                            <input 
                                type="text" 
                                name="email" 
                                id="email" 
                                placeholder="email" 
                                class="email-field"
                                required
                                minlength="5"
                                value="<?php if( isset($field_data['email']) ) { echo $field_data['email']; } ?>"
                            >
                        </div>
                        <div class="antispam">Leave this empty: <input type="text" name="url"></div>
                        <?php if( $config['enable_recaptcha'] === true ) : ?>
                            <div class="g-recaptcha" data-sitekey="<?php echo $config['recaptcha_public_key']; ?>"></div>
                        <?php endif; ?>
                        <div class="field-wrapper send-btn-wrapper">
                            <input type="submit" name="send" value="send" class="send-btn">
                        </div>
                    </div><!-- /fields -->
                <?php endif; ?>
            </form>
        </div><!-- /main-inner -->
    </section><!-- /main -->

    <!-- My contact details -->
    <?php if( 
        $config['email'] != '' 
        || $config['phone'] != ''
        || $config['twitter_handle'] != ''
    ): ?>
        <footer class="footer">
            <h3 class="title">contact</h3>
            <?php if( $config['email'] != '' ): ?>
                <a class="email" href="mailto:<?php echo $config['email']; ?>"><?php echo $config['email']; ?></a>
            <?php endif; ?>
            <?php if( $config['phone'] != '' ): ?>
                <a class="phone" href="tel:<?php echo preg_replace( "/\D/", "", $config['phone'] ); ?>"><?php echo $config['phone']; ?></a>
            <?php endif; ?>
            <?php if( $config['twitter_handle'] != '' ): ?>
                <a class="twitter" href="https://twitter.com/<?php echo $config['twitter_handle']; ?>">@<?php echo $config['twitter_handle']; ?></a>
            <?php endif; ?>
        </footer>
    <?php endif; ?>

    <!-- My Domain Portfolio -->
    <?php if( $config['enable_domain_portfolio'] === true ): ?>
        <aside class="portfolio" id="portfolio">
            <ul class="domains" id="domains">
                <?php foreach( $domains as $domain => $value ): ?>
                    <li>
                        <a href="http://<?php echo $domain; ?>">
                            <?php 
                                if( isset($value['nicename']) ) {
                                    echo $value['nicename'];
                                } else {
                                    echo $domain; 
                                }
                            ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="more-domains-btn-wrap">
                <button id="more-domains-btn" class="more-domains-btn">
                    <span aria-hidden="true" class="li_world"></span> &nbsp; more domains
                </button>
            </div>
        </aside>
    <?php endif; ?>

    <?php 
        if( isset($_GET['editor']) ) {
            // Include Editor template
            include_once('includes/editor-view.php');
        }
    ?>

</body>
</html>