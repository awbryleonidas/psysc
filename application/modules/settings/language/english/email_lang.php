<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Breadcrumbs
$lang['crumb_settings']						= 'Settings';

// Buttons
$lang['button_update_settings']				= 'Update Email Settings';
$lang['button_send_test_mail']				= 'Send Test Mail';

// Headers (for form group)
$lang['header_application_settings']		= 'Application Settings';
$lang['header_email_settings']				= 'Email Settings';
$lang['header_user_settings']				= 'User Settings';

// Radio
$lang['radio_smtp_ssl']						= 'SSL';
$lang['radio_smtp_tls']						= 'TLS';
$lang['radio_email_text']					= 'TEXT';
$lang['radio_email_html']					= 'HTML';

// Index Function
$lang['index_heading']						= 'Email Settings';
$lang['index_subhead']						= 'Various settings for email sending';
$lang['index_update_success']				= 'Your changes have been saved';
		
// Labels
$lang['label_application_email_from']		= 'Application Email';
$lang['label_email_useragent']				= 'Email User Agent';
$lang['label_email_protocol']				= 'Email Protocol';
$lang['label_email_mailpath']				= 'Sendmail Path';
$lang['label_email_smtp_host']				= 'SMTP Host';
$lang['label_email_smtp_user']				= 'SMTP Username';
$lang['label_email_smtp_pass']				= 'SMTP Password';
$lang['label_email_smtp_port']				= 'SMTP Port';
$lang['label_email_smtp_crypto']			= 'SMTP Protocol';
$lang['label_email_smtp_auth']				= 'SMTP Authentication';
$lang['label_email_smtp_timeout']			= 'SMTP Timeout';
$lang['label_email_wordwrap']				= 'Wordwrap';
$lang['label_email_wrapchars']				= 'Wrap Characters';
$lang['label_email_mailtype']				= 'Email Type';
$lang['label_email_charset']				= 'Character Set';
$lang['label_email_crlf']					= 'Newline Character';
$lang['label_email_newline']				= 'Newline Character';

// Text
$lang['text_email_useragent']				= 'The name that will appear in the mail header\'s X-Mailer: field';
$lang['text_email_protocol']				= 'The protocol to use when sending an email';
$lang['text_protocol_mail']					= 'Mail (Native Application Mailer)';
$lang['text_protocol_sendmail']				= 'Sendmail (Server\'s Sendmail Function)';
$lang['text_protocol_smtp']					= 'SMTP (Remote or Local SMTP Server)';
$lang['text_email_mailpath']				= 'The server path to Sendmail. Eg., /usr/sbin/sendmail';
$lang['text_email_smtp_host']				= 'The SMTP server address. Eg., smtp.gmail.com';
$lang['text_email_smtp_user']				= 'The SMTP username. Eg., user@gmail.com';
$lang['text_email_smtp_port']				= 'The SMTP port. Eg, 465 or 587';
$lang['text_email_smtp_crypto']				= 'The SMTP server connection protocol';
$lang['text_email_smtp_auth']				= 'If the SMTP server requires authentication';
$lang['text_email_smtp_timeout']			= 'SMTP timeout in seconds';
$lang['text_email_wordwrap']				= 'Enable wordwrap in email content';
$lang['text_email_wrapchars']				= 'Character count to wrap at';
$lang['text_email_mailtype']				= 'If you send HTML email you must send it as a complete web page. Make sure you don\'t have any relative links or relative image paths otherwise they will not work.';
$lang['text_email_charset']					= 'Character set (utf-8, iso-8859-1, etc.)';
$lang['text_email_crlf']					= 'Newline character. (Use "\r\n" to comply with RFC 822)';
$lang['text_email_newline']					= 'Newline character. (Use "\r\n" to comply with RFC 822)';


$lang['text_save_the_settings']				= 'Save the settings first before sending a test mail';
$lang['text_other_mail_settings']			= 'Other Mail Settings';

// Modal
$lang['modal_send_test_mail_title']			= 'Test Mail';
$lang['email_sent']							= 'Test mail was successfully sent';