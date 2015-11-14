<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('application_model');
		$this->load->language('application');
		// $this->load->library('audittrail/audittrail');
        $this->load->library('migration');
	}
	
	public function index()
	{
		// parameter for this is Module_Name.Controller_Name.Method_Name
		$this->acl->restrict('Settings.Application.Edit');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/application'));
		
		$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('settings/application', 'refresh');
			}
			else
			{	
				$data['error_message'] = lang('validation_error');
			}
		}

		// pr($data); exit;

        $this->template->add_js('assets/js/extra/extra.js?f=settings/views/js/application_index.js');
		$this->template->write_view('styles', 'css/application_index.css');
		$this->template->write_view('content', 'application_index', $data);
		$this->template->render();
	}

	private function _save()
	{
		// validate inputs

		// application settings
		$this->form_validation->set_rules('application_name', lang('application_name'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('application_email_from', lang('application_email_from'), 'required|trim|xss_clean');
	
		
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

			$this->application_model->update_where('config_name', $k, array('config_value' => $v));
		}

		$this->cache->delete('app-config');
		// $this->db->cache_delete_all();

		return TRUE;
	}

    function migrate(){

        $this->acl->restrict('Settings.Application.Edit', 'modal');

        $data['page_heading'] = "Migrate Database";
        $data['page_confirm'] = "Are you sure you want to Migrate the database?";
        $data['page_button'] = "Migrate";

        if ($this->input->post()){

            $this->migration->current();
            $this->cache->delete('app-menu');
            $this->cache->delete('app-config');
            echo json_encode(array('success' => true)); exit;
        }

        $this->load->view('../../../views/confirm', $data);
    }

    function rollback(){

        $this->acl->restrict('Settings.Application.Edit', 'modal');
        $results = $this->db->get('migrations');
        if ($results->num_rows() > 0)
        {
            $row = $results->row();
            $migration_count =  $row->version;

            $migration_option = '<select name="rollback_count" id="rollback_count">';
            for($i = 1; $i <= $migration_count; $i++){
                $migration_option .='<option value="'.$i.'">'.$i.'</option>';
            }
            $migration_option .= '</select>';
        }

        $data['page_heading'] = "Rollback Database";
        $data['page_confirm'] = 'Please select rollback number: '.$migration_option;
        $data['page_button'] = "Rollback";

        if ($this->input->post())
        {

            $this->cache->delete('app-menu');
            $this->cache->delete('app-config');

            $version_number = $this->input->post('rollback_count');
            $this->migration->version(isset($version_number)? $version_number: 1);

            echo json_encode(array('success' => true));
            exit;
        }

        $this->load->view('rollback_confirm', $data);
    }
}

/* End of file application.php */
/* Location: ./application/modules/settings/controllers/application.php */