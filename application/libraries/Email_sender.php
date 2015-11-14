<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Email_sender Class
 *
 * This class manages the email sending to the users
 *
 * @package		Email_sender
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014, Randy Nivales
 * @link		
 */
class Email_sender {
	
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{
		$this->CI =& get_instance();

		log_message('debug', "Email_sender Class Initialized");
	}
	
	/**
	 * sends an email
	 *
	 * @access	public
	 * @return	string
	 */		
	function send($template_code, $email_users, $vars)
	{
		// get the email template
		$this->CI->load->model('settings/email_templates_model');
		$email_template = $this->CI->email_templates_model->find_by('email_template_code', $template_code);

		$vars['application_name'] = $this->CI->config->item('application_name');
		// pr($email_users);
		foreach ($email_users as $user)
		{
			$vars['first_name'] = $user['first_name'];
			$vars['last_name'] = $user['last_name'];
			$subject = $this->_replace_vars('subject', $email_template, $vars);
			$body = $this->_replace_vars('body', $email_template, $vars);

			$this->CI->email->clear();
			$this->CI->email->set_newline("\r\n"); // important to include this
			$this->CI->email->to($user['email']);
			$this->CI->email->from($this->CI->config->item('application_email_from'), $this->CI->config->item('application_name'));
			$this->CI->email->subject($subject);
			$this->CI->email->message($body);
			$this->CI->email->send();
		}
	}

	function _replace_vars($type, $template, $vars)
	{
		$var_names = array();
		$var_values = array();
		foreach ($vars as $key => $val)
		{
			$var_names[] = '{' . $key . '}';
			$var_values[] = $val;
		}

		$part = ($type == 'subject') ? $template->email_template_subject : $template->email_template_body;

		return str_replace($var_names, $var_values, $part);
	}
}

/* End of file App_menu.php */
/* Location: ./application/libraries/App_menu.php */
