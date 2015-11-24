<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_panel extends MX_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->language('home_panel');
        $this->load->model('home_panels_model');
        $this->load->model('settings/application_model');
    }

    public function index()
    {
        $data['page_heading'] = lang('index_heading');
        $data['page_subhead'] = lang('index_subhead');

        $this->session->set_userdata('redirect', current_url());

        /*$this->fetch_region();*/
		if ($this->input->post('panel_1'))
		{
			if ($this->_save('panel', 1))
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}

        $data['panel_1'] = $this->home_panels_model->find_by(array('home_panel_no'=>'1'));
        $data['panel_2'] = $this->home_panels_model->find_by(array('home_panel_no'=>'2'));
        $data['panel_3'] = $this->home_panels_model->find_by(array('home_panel_no'=>'3'));

        $this->template->add_css('assets/css/extra/extra.css?f=home_panel/views/css/home_panel_index.css');
        $this->template->add_js('assets/js/extra/extra.js?f=home_panel/views/js/home_panel_index.js');
        $this->template->write_view('content', 'home_panel_index', $data);
        $this->template->render();
    }



	function change_interface($panel_no)
	{

		$data['page_heading'] = 'Dynamic UI';
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('interface'))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
					'panel_image'	=> form_error('panel_image'),
				);
				echo json_encode($response);
				exit;
			}
		}

		$data['record'] = $this->home_panel_model->where('home_panel_no', $panel_no)->format_dropdown('home_panel_no', 'home_panel_image');
		// pr($data);

		$this->load->view('home_panel_form', $data);
	}


	private function _save($action='application', $panel_no = 0)
	{
		// validate inputs

		// application settings
		if($action == 'beacons'){
			$this->form_validation->set_rules('global_hunt_proximity', lang('label_global_hunt_proximity'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('global_notification_proximity', lang('label_global_notification_proximity'), 'required|trim|xss_clean');
		}
		elseif($action == 'content'){
			$this->form_validation->set_rules('privacy_policy', lang('label_privacy_policy'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('terms_condition', lang('label_terms_condition'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('mechanics', lang('label_mechanics'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('contact_us', lang('label_contact_us'), 'required|trim|xss_clean');
		}
		elseif($action == 'interface'){
			$this->form_validation->set_rules('panel_image', 'panel_image', 'trim|xss_clean');
			$this->form_validation->set_rules('panel_no', 'panel_no', 'trim|xss_clean');

			$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');

			if ($this->form_validation->run($this) == FALSE)
			{
				return FALSE;
			}
			$this->home_panel_model->update_where('home_panel_no', $this->input->post('home_panel_no'), array('home_panel_image' => $this->input->post('panel_image')));

		}
		elseif($action == 'panel'){
			$this->form_validation->set_rules('home_text', lang('home_text'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('home_caption', lang('home_caption'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('home_link', lang('home_link'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('home_link_text', lang('home_link_text'), 'required|trim|xss_clean');

			$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');

			if ($this->form_validation->run($this) == FALSE)
			{
				return FALSE;
			}

			$data = array(

			);

			$this->home_panel_model->update_where('home_panel_no', $panel_no, $data);
			return TRUE;

		}
		else{
			$this->form_validation->set_rules('application_name', lang('application_name'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('application_email_from', lang('application_email_from'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('asset_url', lang('label_asset_url'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('oauth2_client_id', lang('label_oauth2_client_id'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('oauth2_endpoint', lang('label_oauth2_endpoint'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('smphi_api_name', lang('label_smphi_api_name'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('smphi_api_key', lang('label_smphi_api_key'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('smphi_api_endpoint', lang('label_smphi_api_endpoint'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('thesmstore_endpoint', lang('label_thesmstore_endpoint'), 'required|trim|xss_clean');
			$this->form_validation->set_rules('allowed_ip_address', 'Allowed IP Address', 'required|trim|xss_clean');

			$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');

			if ($this->form_validation->run($this) == FALSE)
			{
				return FALSE;
			}

			foreach ($this->input->post() as $k => $v)
			{
				if ($k == 'submit'||($k == 'beacons')||($k == 'content')) break;

				$this->application_model->update_where('config_name', $k, array('config_value' => $v));
			}

			return TRUE;
		}
	}

	function upload()
	{
		$this->acl->restrict('Settings.Application.Edit', 'modal');
		// get the upload folder
		$this->load->library('upload_folders');
		$folder = $this->upload_folders->get();

		$config = array();
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name'] = TRUE;
		//if($_SERVER['CONTENT_LENGTH']>20971520){
//
		//    echo 'The file you are trying to upload exceeds the permitted size'; exit;
		//}

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			echo 'Error in file '.$_FILES['file']['name'].': '.$this->upload->display_errors(); exit;
		}

		$file_data = $this->upload->data();
		log_message('debug', print_r($file_data, TRUE));


		$response = array(
			'image'		=> $folder . '/' . $file_data['file_name'],
		);

		echo json_encode($response);
		exit;
	}
}

/* End of file home_panels_model.php */
/* Location: ./application/modules/home_panel/controllers/home_panels_model.php */