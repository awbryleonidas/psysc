<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('settings_model');
		$this->load->language('email');
		// $this->load->library('audittrail/audittrail');
	}
	
	public function index()
	{
		// parameter for this is Module_Name.Controller_Name.Method_Name
		$this->acl->restrict('Settings.Email.Edit');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/email'));
		
		$data['config'] = $this->settings_model->format_dropdown('config_name', 'config_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('settings/email', 'refresh');
			}
			else
			{	
				$data['error_message'] = lang('validation_error');
			}
		}


		// pr($data); exit;
		// $this->template->write_view('styles', 'css/email_index.css');
		$this->template->write_view('content', 'email_index', $data);
		$this->template->render();
	}

	public function templates()
	{
		// parameter for this is Module_Name.Controller_Name.Method_Name
		$this->acl->restrict('Settings.Email.Templates');

		// page title
		$data['page_heading'] = lang('template_heading');
		$data['page_subhead'] = lang('template_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/email/templates'));

		$this->load->model('email_templates_model');
		$data['email_templates'] = $this->email_templates_model->find_all();

		// pr($data); exit;
		// $this->template->write_view('styles', 'css/email_index.css');
		$this->template->write_view('content', 'email_templates', $data);
		$this->template->render();
	}	

	public function testmail()
	{
		$this->acl->restrict('Settings.Email.Testmail', 'modal');

		$this->email->clear();
		$this->email->set_newline("\r\n"); // important to include this
		$this->email->to($this->config->item('application_email_from'));
		$this->email->from($this->config->item('application_email_from'), $this->config->item('application_name'));
		$this->email->subject('Test email');
		$this->email->message('Hi.  This is a test email.');
		$this->email->send();

		$this->load->view('email_testmail');		
	}


	private function _save()
	{
		// validate inputs
		$this->form_validation->set_rules('email_notices', 'Email Notifications', 'required|trim|xss_clean');
		$this->form_validation->set_rules('application_email_from', lang('application_email_from'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_useragent', lang('email_useragent'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_protocol', lang('email_protocol'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_mailpath', lang('email_mailpath'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_host', lang('email_smtp_host'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_user', lang('email_smtp_user'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_pass', lang('email_smtp_pass'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_port', lang('email_smtp_port'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('email_smtp_crypto', lang('email_smtp_crypto'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_auth', lang('email_smtp_auth'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_smtp_timeout', lang('email_smtp_timeout'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('email_wordwrap', lang('email_wordwrap'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_wrapchars', lang('email_wrapchars'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_mailtype', lang('email_mailtype'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_charset', lang('email_charset'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('email_newline', lang('email_newline'), 'required|trim|xss_clean');
		
		$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		// log this 
		// $this->audittrail->log_action('Update Application Settings', serialize($this->input->post()), 'Configs', 'configs');


		foreach ($this->input->post() as $k => $v)
		{
			if ($k == 'submit') break;

			$this->settings_model->update_where('config_name', $k, array('config_value' => $v));
		}

		$this->cache->delete('app-config');
		// $this->db->cache_delete_all();

		return TRUE;
	}
}

/* End of file application.php */
/* Location: ./application/modules/settings/controllers/application.php */