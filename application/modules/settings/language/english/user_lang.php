<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Breadcrumbs
$lang['crumb_settings']						= 'Settings';

// Buttons
$lang['button_update_settings']				= 'Update Settings';

// Headers (for form group)
$lang['header_user_settings']				= 'User Settings';

// Index Function
$lang['index_heading']						= 'User Settings';
$lang['index_subhead']						= 'Various settings for user management';
$lang['index_update_success']				= 'Your changes have been saved';
		
// Labels
$lang['label_min_password_length']			= 'Min Password Length';
$lang['label_max_password_length']			= 'Max Password Length';
$lang['label_user_expire']					= 'User Login Expiration';
$lang['label_user_extend_on_login']			= 'Extend User On Login';
$lang['label_track_login_attempts']			= 'Enable Login Attempts';
$lang['label_maximum_login_attempts']		= 'Max Login Attempts';
$lang['label_user_lockout_time']			= 'User Lockout Time';
$lang['label_forgot_password_expiration']	= 'Forgot Password Expiration';

// Text
$lang['text_min_password_length']			= 'Minimum required length of user\'s password';
$lang['text_max_password_length']			= 'Maximum allowed length of user\'s password';
$lang['text_user_expire']					= 'How long the application will remember the user (seconds). Set to zero for no expiration.';
$lang['text_user_extend_on_login']			= 'Extend the users cookies everytime they auto-login';
$lang['text_track_login_attempts']			= 'Block the user or IP address after reaching the number of failed login attempts.';
$lang['text_maximum_login_attempts']		= 'The maximum number of failed login attempts.';
$lang['text_user_lockout_time']				= 'The number of miliseconds to lockout a user due to exceeded attempts';
$lang['text_forgot_password_expiration']	= 'The number of miliseconds after which a forgot password request will expire. If set to 0, forgot password requests will not expire.';