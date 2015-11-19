<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Overview extends MX_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->language('content');
			$this->load->model('settings/application_model');
		}

		public function index()
		{
			$data['page_heading'] = lang('index_heading');
			$data['page_subhead'] = lang('index_subhead');

			$this->session->set_userdata('redirect', current_url());

			/*$this->fetch_region();*/
			if($this->input->post())
			{
				if ($this->_send('save'))
				{
					//$data['project'] = $this->input->post('campaign_name');
					redirect('', 'refresh');
				}

			}

			$data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');
			// render the page
			$this->template->add_css('assets/plugins/datepicker/css/bootstrap-datepicker3.css');
			$this->template->add_js('assets/plugins/datepicker/js/bootstrap-datepicker.min.js');


			$this->template->add_css('assets/css/extra/extra.css?f=content/views/css/content_index.css');
			$this->template->add_js('assets/js/extra/extra.js?f=content/views/js/content_index.js');
			$this->template->write_view('content', 'content_index', $data);
			$this->template->render();
		}

		public function sample()
		{
			$this->load->model('region_model');

			$records = $this->region_model->find_all();

			pr($records);
		}

		private function _send($action = null){

			if($action=='save')
			{
				$this->session->set_userdata('campaign_start', $this->input->post('campaign_start'));
				$this->session->set_userdata('campaign_end', $this->input->post('campaign_end'));
				$this->session->set_userdata('campaign_name', $this->input->post('campaign_name'));
				return true;
			}
			else
			{
				return false;
			}
		}
		public function save_campaign($campaign_name){

			$this->session->set_userdata('campaign_name', $campaign_name);
		}

		public function fetch_region(){
			$this->load->model('details/consumer_model');
			$this->load->model('details/answer_model');

			$campaign_name = $this->session->userdata('campaign_name');
			$year = ( !empty($campaign_name) )? $campaign_name:date('Y');
			$campaign_start = $this->session->userdata('campaign_start');
			$campaign_start = ( !empty($campaign_start) )? $campaign_start: date('Y-m-d',strtotime(date('Y-m-d H:i:s',time()).' -30 days'));
			$campaign_end = $this->session->userdata('campaign_end');
			$campaign_end = ( !empty($campaign_end) )? $campaign_end:date('Y-m-d',time());
			$region_list = $this->answer_model
				->select('milo_crm_answer_value region_name, milo_crm_answer_caption')
				->where('milo_crm_answer_filter_id', 18)
				->order_by('milo_crm_answer_caption', 'asc')
				->find_all();
			$results = $this->consumer_model
				->select('milo_consumer_region region_name, count(milo_consumer_region) ctr')
				->where('year(milo_consumer_date_created) = '.$year.' AND (date(milo_consumer_date_created) BETWEEN "'.$campaign_start.'" AND "'.$campaign_end.'")')
				->group_by('milo_consumer_region')
				->order_by('milo_consumer_region', 'asc')
				->find_all();
			$del_sessions = $this->consumer_model
				->select('milo_consumer_region region_name, count(milo_consumer_deleted_session) ctr2')
				->where('year(milo_consumer_date_created) = '.$year.' AND (date(milo_consumer_date_created) BETWEEN "'.$campaign_start.'" AND "'.$campaign_end.'")')
				->where('milo_consumer_deleted_session', 0)
				->group_by('milo_consumer_region')
				->order_by('milo_consumer_region', 'asc')
				->find_all();

			$regions = array();
			$ticks = array();
			$sessions = array();
			foreach($region_list as $region){
				$sessions_val = 0;
				$regions_val = 0;
				if($del_sessions){
					foreach($del_sessions as $del_session)
					{
						if($del_session->region_name==$region->region_name){
							$sessions_val = (integer)$del_session->ctr2;
						}

					}
				}
				if($results){
					foreach($results as $result)
					{
						if($result->region_name==$region->region_name){
							$regions_val = (integer)$result->ctr;
						}

					}
				}
				$sessions[] = $sessions_val;
				$regions[] = $regions_val;
				$ticks[] = $region->region_name;

			}


			$return = array(
				'ticks' => $ticks,
				'data_value' => $regions,
				'completed_sessions' => $sessions
			);
			echo json_encode($return);
		}
	}

	/* End of file content.php */
	/* Location: ./application/modules/content/controllers/content.php */