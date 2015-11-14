<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['useragent'] = $this->config->item('email_useragent');
$config['protocol'] = $this->config->item('email_protocol');
$config['mailpath'] = $this->config->item('email_mailpath');
$config['smtp_host'] = $this->config->item('email_smtp_host');
$config['smtp_user'] = $this->config->item('email_smtp_user');
$config['smtp_pass'] = $this->config->item('email_smtp_pass');
$config['smtp_port'] = $this->config->item('email_smtp_port');
$config['smtp_crypto'] = $this->config->item('email_smtp_crypto');
$config['smtp_timeout'] = $this->config->item('email_smtp_timeout');
$config['_smtp_auth'] = $this->config->item('email_smtp_auth');
$config['wordwrap'] = $this->config->item('email_wordwrap');
$config['wrapchars'] = $this->config->item('email_wrapchars');
$config['mailtype'] = $this->config->item('email_mailtype');
$config['charset'] = $this->config->item('email_charset');
// $config['crlf'] = $this->config->item('email_crlf');
$config['newline'] = $this->config->item('email_newline');