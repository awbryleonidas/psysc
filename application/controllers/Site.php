<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migrate Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		che leonidas <che.leonidas@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, che leonidas
 * @link		che.leonidas@gmail.com
 */
class Site extends CI_Controller 
{
	/**
	 * Constructor
	 *
	 * @access	public
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	che leonidas <che.leonidas@gmail.com>
	 */
	public function index()
	{
		$this->load->view('site_template');
	}

	// --------------------------------------------------------------------


	/**
	 * single view
	 *
	 * @access	public
	 * @param	none
	 * @author 	che leonidas <che.leonidas@gmail.com>
	 */
	public function sign_up()
	{
		$data['title'] = 'Sign Up';
		$data['banner_text'] = 'BE A SCIENCE CLUBBER NOW!';
		$this->load->view('sign_up', $data);
	}

	public function login()
	{
		//no more validations yet
		$this->redirect_login();
	}

	public function redirect_login()
	{
		$data['title'] = 'User Profile';
		$data['banner_text'] = 'My Profile';
		$this->load->view('user_profile', $data);
	}

	public function register()
	{
		$this->load->library('form_validation');
		//validate form input
		$this->form_validation->set_rules('guest_title', 'Title', 'required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('birth_date_year', 'Year', 'xss_clean');
		$this->form_validation->set_rules('birth_date__nc_month', 'Month', 'xss_clean');
		$this->form_validation->set_rules('birth_date__nc_day', 'Day', 'xss_clean');
		$this->form_validation->set_rules('company', 'Company', 'xss_clean');
		$this->form_validation->set_rules('url', 'Website', 'xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
		$this->form_validation->set_rules('address_2', 'Address 2', 'xss_clean');
		$this->form_validation->set_rules('city', 'City', 'required|xss_clean');
		$this->form_validation->set_rules('state', 'State/Province', 'xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
		$this->form_validation->set_rules('zipcode', 'Zip/Postal code', 'required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');

		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			$this->single_view();//return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * rollback
	 *
	 * @access	public
	 * @param	none
	 * @author 	che leonidas <che.leonidas@gmail.com>
	 */
}