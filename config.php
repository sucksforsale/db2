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
	'email' => 'email@somedomain.com',
	'phone' => '+1 (555) 123-4567',
	// Twitter handle - just your username, no "@" symbol before it
	'twitter_handle' => 'USERNAME',
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
	'enable_recaptcha' => false,
	// Obtain keys from https://www.google.com/recaptcha
	'recaptcha_public_key' => '',
	'recaptcha_private_key' => '',
	// -------------------------------------------------------------------
	// Background options
	// -------------------------------------------------------------------
	// Image options include mountains, city-lights, and tabletop
	'image' => 'mountains',
	// Tint colour to apply on top of the image -- use hexadecimal format
	// #FFFFFF would add a white tint. Try out http://www.colorpicker.com/
	'tint' => '#322F48',
	// Texture options include circles, diamonds, feathers, and rough
	'texture' => '',
	// -------------------------------------------------------------------
	// Editor settings
	// -------------------------------------------------------------------
	'editor_login_email' => '',
	'editor_auth_methods' => array(
		'Google' => array(
			'client_id' => '',
			'client_secret' => ''
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
// 'domain name here' => array(
//	   'nicename' => 'ReplacesDomainNameText' // optional
// 	   'price' => 'price here',
// 	   'description' => 'description here',
// ),
//
// Notes:
// * If you don't want a price or description, erase the contents
//   inside the quote marks
// * If the price is blank, the tag will not show
// * Enter domain names *without* the "http://" in front
$domains = array(
	'mydomain.com' => array(
		'price' => '$750',
		'description' => 'short description of domain, visits, ranking, age, useful stats' 
	), 
	'domaintwo.com' => array(
		'price' => '',
		'description' => '' 
	), 
	'domainthree.com' => array(
		'price' => '',
		'description' => '' 
	), 
	
);