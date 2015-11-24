<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_panel extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('team_panels_model');
		$this->load->language('team_panels');
	}

	public function index()
	{
		$this->acl->restrict('Content.Team_panel.List');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('content'));
		$this->breadcrumbs->push(lang('crumb_controller'), site_url('content/team_panel'));

		$this->session->set_userdata('redirect', current_url());

		// render the page
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');

		$this->template->add_css('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css');
		$this->template->add_js('assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js');

		// $this->template->add_css('assets/css/extra/extra.css?f=team_panel/views/css/team_panel_index.css');
		$this->template->add_js('assets/js/extra/extra.js?f=content/views/js/team_panels_index.js');
		$this->template->write_view('content', 'team_panels_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		$this->acl->restrict('Content.Team_panel.List');

		$fields = array('team_panel_id', 'team_panel_image', 'team_panel_position', 'team_panel_name');

		echo $this->team_panels_model->datatables($fields);
	}

	function add()
	{
		$this->acl->restrict('Content.Team_panel.Add', 'modal');

		$data['page_heading'] = lang('add_heading');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			if ($this->_save('add'))
			{
				$this->session->set_flashdata('flash_message', lang('add_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
						'alert_message' => form_error('alert_message'),
						'alert_active' => form_error('alert_active')
				);
				echo json_encode($response);
				exit;
			}
		}

		$this->load->view('team_panels_form', $data);
	}

	function edit($id)
	{
		$this->acl->restrict('Content.Team_panel.Edit', 'modal');

		$data['page_heading'] = lang('edit_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $id))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{

				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
						'alert_message' => form_error('alert_message'),
						'alert_active' => form_error('alert_active')
				);
				echo json_encode($response);
				exit;
			}
		}
		$record = $this->team_panels_model->find($id);

		$data['record'] = $record;

		$this->load->view('team_panels_form', $data);
	}



	function delete($id)
	{
		$this->acl->restrict('Content.Team_panel.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_success'] = lang('delete_success');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->team_panels_model->delete($id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	private function _save($type = 'add', $id = 0)
	{
		// validate inputs
		$this->form_validation->set_rules('team_panel_position', lang('label_position'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_description', lang('label_description'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_name', lang('label_name'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_type', lang('label_type'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_image', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_facebook', lang('label_facebook'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_twitter', lang('label_twitter'), 'trim|xss_clean');


		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$data = array(
				'team_panel_position' => $this->input->post('team_panel_position'),
				'team_panel_description' => $this->input->post('team_panel_description'),
				'team_panel_name' => $this->input->post('team_panel_name'),
				'team_panel_type' => $this->input->post('team_panel_type'),
				'team_panel_image' => $this->input->post('team_panel_image'),
				'team_panel_facebook' => $this->input->post('team_panel_facebook'),
				'team_panel_twitter' => $this->input->post('team_panel_twitter'),
		);


		if ($type == 'add')
		{
			$insert_id = $this->team_panels_model->insert($data);
			$return = (is_numeric($insert_id)) ? $insert_id : FALSE;
		}
		else if ($type == 'edit')
		{
			$return = $this->team_panels_model->update($id, $data);
		}

		return $return;

	}

	function upload()
	{
		// get the upload folder
		$this->load->library('upload_folders');
		$folder = $this->upload_folders->get();

		$config = array();
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'jpg|png|gif';
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
//            pr($this->upload);
			echo 'Error in file '.$_FILES['file']['name'].': '.$this->upload->display_errors(); exit;
		}

		$file_data = $this->upload->data();
		log_message('debug', print_r($file_data, TRUE));

		if ($file_data['is_image'] == 1)
		{
			$this->load->library('image_lib');

			$thumb_config['image_library'] = 'gd2';
			$thumb_config['source_image'] = $file_data['full_path'];
			$thumb_config['maintain_ratio'] = FALSE;

			$thumb_config['width'] = 480;
			$thumb_config['height'] = 480;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/thumb_' . $file_data['raw_name']  . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}

		}

		$response = array(
				'large'		=> $folder . '/thumb_' . $file_data['file_name'],
		);

		echo json_encode($response);
		exit;
	}

	//valid url check
	// public function url_check($str)
	// {
	// 	$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
	// 	if (!preg_match($pattern, $str)){

	// 		//$this->form_validation->set_message('url_check', 'The URL you entered is not correctly formatted.');
	// 		return FALSE;
	// 	}

	// 	return TRUE;
	// }

}

/* End of file team_panel.php */
/* Location: ./application/modules/team_panel/controllers/team_panel.php */