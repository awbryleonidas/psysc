<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_panel extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('settings/application_model');
	}

	public function index()
	{
		$this->acl->restrict('Content.Config_panel.List');

		// page title
		$data['page_heading'] = 'Configs';
		$data['page_subhead'] = 'Other options';

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('content'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('content/config_panel'));

		$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('content/config_panel', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}
		// pr($data); exit;

		$this->template->add_js('assets/js/extra/extra.js?f=settings/views/js/config_panels_index.js');
		//$this->template->write_view('styles', 'css/config_panels_form.css');
		$this->template->write_view('content', 'config_panels_index', $data);
		$this->template->render();
	}

	function upload()
	{
		$this->acl->restrict('Content.Config_panel.Edit', 'modal');
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

	private function _save($submit = 'config',$type='edit')
	{

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
		$records = $this->config_panels_model
			->select ('config_panel_brand')
			->where('config_panel_brand like', '%' . $this->input->get('term') . '%')
			->group_by('config_panel_brand')
			->where('config_panel_active', 1)
			->where('config_panel_deleted', 0)
			->find_all();

		$return = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$return[] = $record->config_panel_brand;
			}
		}
		header('Content-Type: config_panel/json');
		echo json_encode($return);
		exit;
	}*/
}

/* End of file config_panels.php */
/* Location: ./config_panel/modules/config_panels/controllers/config_panels.php */