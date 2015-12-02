<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_panel extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('settings/application_model');
		$this->load->language('about_panels');
	}

	public function index()
	{
		$this->acl->restrict('Content.About_panel.List');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('content'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('content/about_panel'));

		$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('content/about_panel', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}
		// pr($data); exit;

		$this->template->add_js('assets/js/extra/extra.js?f=settings/views/js/about_panels_index.js');
		$this->template->write_view('styles', 'css/about_panels_form.css');
		$this->template->write_view('content', 'about_panels_index', $data);
		$this->template->render();
	}

	function change_interface()
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
						'about_us_panel_image_1'		=> form_error('about_us_panel_image_1'),
						'about_us_panel_image_2'		=> form_error('about_us_panel_image_2'),
						'about_us_panel_image_3'		=> form_error('about_us_panel_image_3')
				);
				echo json_encode($response);
				exit;
			}
		}


		$data['record'] = $this->application_model->format_dropdown('config_name', 'config_value');
		// pr($data);

		$this->load->view('about_panels_form', $data);
	}

	function upload()
	{
		$this->acl->restrict('Content.About_panel.Edit', 'modal');
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

	private function _save($submit = 'about',$type='edit')
	{
		// validate inputs

		if($submit == 'interface')
		{
			$this->form_validation->set_rules('about_us_panel_image_1', 'about_us_panel_image_1', 'trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_image_2', 'about_us_panel_image_2', 'trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_image_3', 'about_us_panel_image_3', 'trim|xss_clean');
		}
		else
		{
			// about us settings
			$this->form_validation->set_rules('about_us_caption', 'Caption', 'required|trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_name_1', 'Panel 1', 'required|trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_name_2', 'Panel 1 Text', 'required|trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_text_1', 'Panel 2', 'required|trim|xss_clean');
			$this->form_validation->set_rules('about_us_panel_text_2', 'Panel 2 Text', 'required|trim|xss_clean');
		}

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

		$this->cache->delete('app-config');
		// $this->db->cache_delete_all();

		return TRUE;

	}

	/*public function search()
	{
		$records = $this->about_panels_model
			->select ('about_panel_brand')
			->where('about_panel_brand like', '%' . $this->input->get('term') . '%')
			->group_by('about_panel_brand')
			->where('about_panel_active', 1)
			->where('about_panel_deleted', 0)
			->find_all();

		$return = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$return[] = $record->about_panel_brand;
			}
		}
		header('Content-Type: about_panel/json');
		echo json_encode($return);
		exit;
	}*/
}

/* End of file about_panels.php */
/* Location: ./about_panel/modules/about_panels/controllers/about_panels.php */