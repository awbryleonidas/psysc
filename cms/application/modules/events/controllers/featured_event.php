<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Featured_event extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('events_model');
		$this->load->language('events');
	}
	
	public function index()
	{
		$this->acl->restrict('Events.Featured_event.List');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('events'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('events/featured_event'));

		$data['config'] = $this->events_model->format_dropdown('event_option', 'event_option_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('events/featured_event', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}
		// pr($data); exit;

		$this->template->add_js('assets/js/extra/extra.js?f=settings/views/js/featured_events_index.js');
		$this->template->write_view('styles', 'css/events.css');
		$this->template->write_view('content', 'featured_events_index', $data);
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
						'featured_event_image_1'		=> form_error('featured_event_image_1'),
						'featured_event_image_2'		=> form_error('featured_event_image_2'),
						'featured_event_image_3'		=> form_error('featured_event_image_3')
				);
				echo json_encode($response);
				exit;
			}
		}


		$data['record'] = $this->events_model->format_dropdown('event_option', 'event_option_value');
		// pr($data);

		$this->load->view('featured_events_form', $data);
	}

	function upload()
	{
		$this->acl->restrict('Events.Featured_event.Edit', 'modal');
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
			$this->form_validation->set_rules('featured_event_image_1', 'featured_event_image_1', 'trim|xss_clean');
			$this->form_validation->set_rules('featured_event_image_2', 'featured_event_image_2', 'trim|xss_clean');
			$this->form_validation->set_rules('featured_event_image_3', 'featured_event_image_3', 'trim|xss_clean');
		}
		else
		{
			// about us settings
			$this->form_validation->set_rules('featured_event_title', 'Title', 'required|trim|xss_clean');
			$this->form_validation->set_rules('featured_event_description', 'Description', 'required|trim|xss_clean');
		}

		$this->form_validation->set_error_delimiters('<span class="middle text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		foreach ($this->input->post() as $k => $v)
		{
			if ($k == 'submit'||($k == 'beacons')||($k == 'events')) break;

			$this->events_model->update_where('event_option', $k, array('event_option_value' => $v));
		}


		return TRUE;

	}

	/*public function search()
	{
		$records = $this->featured_events_model
			->select ('featured_event_brand')
			->where('featured_event_brand like', '%' . $this->input->get('term') . '%')
			->group_by('featured_event_brand')
			->where('featured_event_active', 1)
			->where('featured_event_deleted', 0)
			->find_all();

		$return = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$return[] = $record->featured_event_brand;
			}
		}
		header('Event-Type: featured_event/json');
		echo json_encode($return);
		exit;
	}*/
}

/* End of file featured_events.php */
/* Location: ./featured_event/modules/featured_events/controllers/featured_events.php */