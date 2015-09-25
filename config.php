<?php

/**
 * Configuration options
 * If you want to set up the most common options for Domain Broker 2 you're in the right place!
 * Simply edit the contents (between quotation marks) of the items below to what you'd like.
 *
 * @package Domain Broker 2
 * @author Derek Loewen <derek@derekloewen.com>
 */

$config = array(
	// -------------------------------------------------------------------
	// General
	// -------------------------------------------------------------------
	// Show the domain portfolio?
	'enable_domain_portfolio' => true,
	// -------------------------------------------------------------------
	// Footer contact info
	// -------------------------------------------------------------------
	'email' => 'aa3e2523@opayq.com',
	'phone' => '',
	// Twitter handle - just your username, no "@" symbol before it
	'twitter_handle' => '',
	// -------------------------------------------------------------------
	// Email/SMTP settings
	// -------------------------------------------------------------------
	'recipient_name' => '',
	'recipient_email' => '',
	'recipient_email_password' => '',
	'smtp_server' => '',
	// -------------------------------------------------------------------
	// reCAPTCHA spam protection
	// -------------------------------------------------------------------
	'enable_recaptcha' => true,
	// Obtain keys from https://www.google.com/recaptcha
	'recaptcha_public_key' => '6LeRhw0TAAAAAHAfNSpjwtks6WM1aXQgzcrv9WV2',
	'recaptcha_private_key' => '6LeRhw0TAAAAAFs88IxAJuBPpL7u3eFciTP2qG8',
	// -------------------------------------------------------------------
	// Background options
	// -------------------------------------------------------------------
	// Image options include mountains, city-lights, and tabletop
	'image' => 'tabletop',
	// Tint colour to apply on top of the image -- use hexadecimal format
	// #FFFFFF would add a white tint. Try out http://www.colorpicker.com/
	'tint' => '#322F48',
	// Texture options include circles, diamonds, feathers, and rough
	'texture' => '',
	// -------------------------------------------------------------------
	// Editor settings
	// -------------------------------------------------------------------
	'editor_login_email' => 'tom@tomfrazier.com',
	'editor_auth_methods' => array(
		'Google' => array(
			'client_id' => '50036880659-cd4cdfhaq6bspsfnrjtgf23gppp7t69o.apps.googleusercontent.com',
			'client_secret' => 'YTwXxJedkbtF4V9TYrj00MP3'
		),

		'Live' => array(
			'client_id' => '',
			'client_secret' => '',
			'scope' => 'wl.emails'
		),
		
		'LinkedIn' => array(
			'api_key' => '',
			'secret_key' => '',
			'scope' => 'r_emailaddress'
		),				
	),
);

// -------------------------------------------------------------------
// Domains
// -------------------------------------------------------------------
// A list of the domains you want to use with domain broker.
// This list is also used for the domain portfolio feature if
// the 'enable_domain_portfolio' setting is set to true
//
// Format (repeat for each domain): 
//
//
// Notes:
// * If you don't want a price or description, erase the contents
//   inside the quote marks
// * If the price is blank, the tag will not show
// * Enter domain names *without* the "http://" in front
$domains = array(
	'daraprim.sucks' => array(
		'price' => '$99000',
		'description' => 'Free speech about Daraprim from Turing Pharma' 
	), 
	'acthar.sucks' => array(
		'price' => '$49000',
		'description' => 'Free speech about Acthar from Mallinckrodt Pharmaceuticals' 
	), 
	'jazzpharma.sucks' => array(
		'price' => '$59000',
		'description' => 'Free speech about Jazz Pharma' 
	), 
	
);
