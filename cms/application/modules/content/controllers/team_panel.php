<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_panel extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('team_panels_model');
		$this->load->language('team_panels');
		$this->load->model('malls_model');
		$this->load->model('beacons_model');
		$this->load->model('coupons_model');
		$this->load->model('feeds_model');
	}
	
	public function index()
	{
		$this->acl->restrict('Content.Alerts.List');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('content'));
		$this->breadcrumbs->push(lang('crumb_controller'), site_url('content/team_panels'));
		
		$this->session->set_userdata('redirect', current_url());

		// render the page
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');

		$this->template->add_css('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css');
		$this->template->add_js('assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js');

		// $this->template->add_css('assets/css/extra/extra.css?f=team_panels/views/css/team_panels_index.css');
		$this->template->add_js('assets/js/extra/extra.js?f=content/views/js/team_panels_index.js');
		$this->template->write_view('content', 'team_panels_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		$this->acl->restrict('Content.Alerts.List');

		$fields = array('team_panel_id','team_panel_message', 'team_panel_active');

		echo $this->team_panels_model->datatables($fields);
	}

	function add()
	{
		$this->acl->restrict('Content.Alerts.Add', 'modal');

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
					'team_panel_message' => form_error('team_panel_message'),
					'team_panel_active' => form_error('team_panel_active')
				);
				echo json_encode($response);
				exit;
			}
		}
		// get the malls
		$data['malls'] = $this->malls_model
			->where('mall_active', 1)
			->where('mall_deleted', 0)
			->format_dropdown('mall_id', 'mall_name', TRUE);
		$data['default_mall_id'] = (NULL != $this->session->userdata('mall_id')) ? $this->session->userdata('mall_id') : 0;

		// get the coupons
		$coupons = $this->coupons_model
			->select('coupon_id as id, coupon_description as descr')
			->where('coupon_deleted', 0)
			->find_all();

		$c[''] = '';
		foreach($coupons as $coupon)
		{
			$c[$coupon->id] = (strlen($coupon->descr) > 45)? $coupon->id.' - '.substr($coupon->descr, 0, 45).'...':$coupon->id.' - '.$coupon->descr;
		}
		$data['coupons'] = $c;

		// get the feeds
		$feeds = $this->feeds_model
			->select('feed_id as id, feed_caption as descr')
			->where('feed_deleted', 0)
			->find_all();

		$f[''] = '';
		foreach($feeds as $feed)
		{
			$f[$feed->id] = (strlen($feed->descr) > 45)? $feed->id.' - '.substr($feed->descr, 0, 45).'...':$feed->id.' - '.$feed->descr;
		}
		$data['feeds'] = $f;

		$data['default_coupon_id'] = (NULL != $this->session->userdata('coupon_id')) ? $this->session->userdata('coupon_id') : 0;

		$this->load->view('team_panels_form', $data);
	}

	function edit($id)
	{
		$this->acl->restrict('Content.Alerts.Edit', 'modal');

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
					'team_panel_message' => form_error('team_panel_message'),
					'team_panel_active' => form_error('team_panel_active')
				);
				echo json_encode($response);
				exit;
			}
		}
		// get the malls
		$data['malls'] = $this->malls_model
			->where('mall_active', 1)
			->where('mall_deleted', 0)
			->format_dropdown('mall_id', 'mall_name', TRUE);
		$data['default_mall_id'] = (NULL != $this->session->userdata('mall_id')) ? $this->session->userdata('mall_id') : 0;

		// get the coupons
		$coupons = $this->coupons_model
			->select('coupon_id as id, coupon_description as descr')
			->where('coupon_deleted', 0)
			->find_all();

		$c[''] = '';
		foreach($coupons as $coupon)
		{
			$c[$coupon->id] = (strlen($coupon->descr) > 45)? $coupon->id.' - '.substr($coupon->descr, 0, 45).'...':$coupon->id.' - '.$coupon->descr;
		}
		$data['coupons'] = $c;

		// get the feeds
		$feeds = $this->feeds_model
			->select('feed_id as id, feed_caption as descr')
			->where('feed_deleted', 0)
			->find_all();

		$f[''] = '';
		foreach($feeds as $feed)
		{
			$f[$feed->id] = (strlen($feed->descr) > 45)? $feed->id.' - '.substr($feed->descr, 0, 45).'...':$feed->id.' - '.$feed->descr;
		}
		$data['feeds'] = $f;

		$data['default_coupon_id'] = (NULL != $this->session->userdata('coupon_id')) ? $this->session->userdata('coupon_id') : 0;

		$record = $this->team_panels_model
			->join('beacons', 'beacon_id = team_panel_beacon_id', 'LEFT')
			->join('feeds', 'feed_id = team_panel_redirect_to', 'LEFT')
			->find($id);

		$data['record'] = $record;

		$this->load->view('team_panels_form', $data);
	}



	function delete($id)
	{
		$this->acl->restrict('Content.Alerts.Delete', 'modal');

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
		$this->form_validation->set_rules('team_panel_message', lang('label_message'), 'required|trim|xss_clean|max_length[140]');
		$this->form_validation->set_rules('team_panel_active', lang('label_active'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_longitude', lang('label_team_panel_longitude'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_latitude', lang('label_team_panel_latitude'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_date', lang('label_team_panel_date'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_beacon_id', lang('label_team_panel_beacon_id'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_mall_id', lang('label_mall'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_coupon_id', lang('label_coupon'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_type', lang('label_team_panel_type'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_redirect_type', lang('label_redirect'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_redirect_to', lang('label_redirect'), 'trim|xss_clean');
		$this->form_validation->set_rules('team_panel_start_date', lang('label_start'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('team_panel_end_date', lang('label_end'), 'required|trim|xss_clean');


		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		if($this->input->post('team_panel_beacon_id'))
		{			
			list($beacon_id, $beacon_name) = explode(' - ', $this->input->post('team_panel_beacon_id'));
		}
		$mall = $this->malls_model->find_by('mall_id', $this->input->post('team_panel_mall_id'));

		$data = array(
			'team_panel_message' => $this->input->post('team_panel_message'),
			'team_panel_active' => $this->input->post('team_panel_active')? 'Active' : 'Hidden',
			'team_panel_type' => $this->input->post('team_panel_type'),
			'team_panel_longitude' => isset($mall->mall_longitude)? $mall->mall_longitude:'',
			'team_panel_latitude' => isset($mall->mall_latitude)? $mall->mall_latitude: '',
			'team_panel_date' => $this->input->post('team_panel_date'),
			'team_panel_beacon_id' => isset($beacon_id)? $beacon_id:'',
			'team_panel_mall_id' => $this->input->post('team_panel_mall_id'),
			'team_panel_coupon_id' => $this->input->post('team_panel_coupon_id'),
			'team_panel_redirect_type' => $this->input->post('team_panel_redirect_type'),
			'team_panel_redirect_to' => $this->input->post('team_panel_redirect_to'),
			'team_panel_start_date' 	=> $this->input->post('team_panel_start_date'),
			'team_panel_end_date' 	=> $this->input->post('team_panel_end_date'),
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

/* End of file team_panels.php */
/* Location: ./application/modules/team_panels/controllers/team_panels.php */