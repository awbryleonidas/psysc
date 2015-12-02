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
		$this->load->model('application_model');
		$this->load->model('home_panels_model');
		$this->load->model('news_panels_model');
		$this->load->model('team_panels_model');
		$this->load->model('events_model');
		$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');
		$data['bots'] = $this->team_panels_model->where('team_panel_type', 2)->find_all();
		$data['necs'] = $this->team_panels_model->where('team_panel_type', 1)->find_all();
		$data['news'] = $this->news_panels_model->where('news_panel_deleted', 0)->find_all();
		$data['events'] = $this->events_model->format_dropdown('event_option', 'event_option_value');
		$this->load->view('site_template', $data);
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

	public function events_view($event = 1)
	{

		$this->load->model('events_model');

		$config = $this->events_model->format_dropdown('event_option', 'event_option_value');
		$asset_url =  $this->config->item('asset_url') ;
		$data['title'] = $config['event_name_'.$event];
		$data['youtube_link'] = $config['event_youtube_link_'.$event];
		$data['description'] = $config['event_description_'.$event];
		$data['highlight_image'] = $config['event_highlight_image_'.$event];
		$data['highlight_description'] = $config['event_highlight_description_'.$event];
		$data['faqs'] = $config['event_faqs_'.$event];
		$data['register'] = $config['event_register_'.$event];
		$data['fb_link'] = $config['event_fb_link_'.$event];
		$this->load->view('event_view', $data);
	}
	public function landing_page($indicator = 'Subscribed')
	{
		$this->load->model('application_model');
		$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');
		$data['title'] = $indicator;
		$data['message'] = ($indicator=='Feedback')? 'Thanks for sending your feedback.':'Thanks for your subscription. Please check your email for future updates';
		$this->load->view('landing_page', $data);
	}

	public function save_feedback()
	{
		$data = array(
			'feedback_name' => $this->input->post('feedback_name'),
			'feedback_email' => $this->input->post('feedback_email'),
			'feedback_subject' => $this->input->post('feedback_subject'),
			'feedback_message' => $this->input->post('feedback_message'),
		);
		$this->load->model('feedback_model');
		$this->feedback_model->insert($data);
		$this->landing_page('Feedback');
	}

	public function save_subscriber()
	{
		$data = array(
			'subscriber_email' => $this->input->post('subscriber_email'),
		);
		$this->load->model('subscriber_model');
		$this->subscriber_model->insert($data);
		$this->landing_page();
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