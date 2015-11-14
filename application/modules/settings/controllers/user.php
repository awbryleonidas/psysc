<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// $this->load->model('users/user_levels_model');
		$this->load->model('settings_model');
		$this->load->language('user');
		// $this->load->library('audittrail/audittrail');
	}
	
	public function index()
	{
		// parameter for this is Module_Name.Controller_Name.Method_Name
		$this->acl->restrict('Settings.User.Edit');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/user'));
		
		$data['config'] = $this->settings_model->format_dropdown('config_name', 'config_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('settings/user', 'refresh');
			}
			else
			{	
				$data['error_message'] = lang('validation_error');
			}
		}

		// $data['user_levels'] = $this->user_levels_model->find_all();

		// pr($data); exit;
		// $this->template->write_view('styles', 'css/user_index.css');
		$this->template->write_view('content', 'user_index', $data);
		$this->template->render();
	}


	private function _save()
	{
		// validate inputs
		$this->form_validation->set_rules('min_password_length', lang('label_min_password_length'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('max_password_length', lang('label_max_password_length'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('user_expire', lang('label_user_expire'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('user_extend_on_login', lang('label_user_extend_on_login'), 'trim|xss_clean|is_natural');
		$this->form_validation->set_rules('track_login_attempts', lang('label_track_login_attempts'), 'trim|xss_clean|is_natural');
		$this->form_validation->set_rules('maximum_login_attempts', lang('label_maximum_login_attempts'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('user_lockout_time', lang('label_user_lockout_time'), 'required|trim|xss_clean|is_natural');
		$this->form_validation->set_rules('forgot_password_expiration', lang('label_forgot_password_expiration'), 'required|trim|xss_clean|is_natural');
		
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

/* End of file user.php */
/* Location: ./application/modules/settings/controllers/user.php */