<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Settings.
| -------------------------------------------------------------------------
*/

// Your app id
$config['app_id'] 		= '828887307188588';

// Your app secret key
$config['app_secret'] 	= '00f492121dc170e7b06854791fe10f82';

// custom permissions check
// http://developers.facebook.com/docs/reference/login/#permissions
$config['scope'] 		= 'email'; 

// url to redirect back from facebook
$config['redirect_uri'] = site_url('user/facebook_login'); 

// default password of registrations through fb
$config['fb_password']	= '@facebook^does&not*have%pass123';