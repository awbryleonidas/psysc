<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_4 extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('events_model');
		$this->load->language('events');
	}
	
	public function index()
	{
		$this->acl->restrict('Events.Event_4.List');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('events'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('events/event_4'));

		$data['config'] = $this->events_model->format_dropdown('event_option', 'event_option_value');

		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('index_update_success'));
				redirect('events/event_4', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}
		// pr($data); exit;

		$this->template->add_js('assets/js/extra/extra.js?f=settings/views/js/event_4s_index.js');
		$this->template->write_view('styles', 'css/events.css');
		$this->template->write_view('content', 'event_4_index', $data);
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
						'event_highlight_image_4'		=> form_error('event_highlight_image_4'),
				);
				echo json_encode($response);
				exit;
			}
		}


		$data['record'] = $this->events_model->format_dropdown('event_option', 'event_option_value');
		// pr($data);

		$this->load->view('event_4_form', $data);
	}

	function upload()
	{
		$this->acl->restrict('Events.Event_4.Edit', 'modal');
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
			$this->form_validation->set_rules('event_highlight_image_4', 'event_highlight_image_4', 'trim|xss_clean');
		}
		else
		{
			// about us settings
			$this->form_validation->set_rules('event_youtube_link_4', 'Youtube Link', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_description_4', 'Description', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_highlight_description_4', 'Description', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_faqs_4', 'FAQs', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_register_4', 'Registration', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_fb_link_4', 'FB Link', 'required|trim|xss_clean');
			$this->form_validation->set_rules('event_contact_4', 'Contact Details', 'required|trim|xss_clean');
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
		$records = $this->event_4s_model
			->select ('event_4_brand')
			->where('event_4_brand like', '%' . $this->input->get('term') . '%')
			->group_by('event_4_brand')
			->where('event_4_active', 1)
			->where('event_4_deleted', 0)
			->find_all();

		$return = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$return[] = $record->event_4_brand;
			}
		}
		header('Event-Type: event_4/json');
		echo json_encode($return);
		exit;
	}*/
}

/* End of file event_4s.php */
/* Location: ./event_4/modules/event_4s/controllers/event_4s.php */