<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audittrail extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('audittrail_model');
		$this->load->language('audittrail');
	}
	
	public function index()
	{
		$this->acl->restrict('Reports.Audittrail.List');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('reports'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('reports/audittrail'));
		
		$this->session->set_userdata('redirect', current_url());

		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');
		
		$this->template->write_view('styles', 'css/audittrail_index.css');
		$this->template->write_view('scripts', 'js/audittrail_index.js');
		$this->template->write_view('content', 'audittrail_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		$this->acl->restrict('Reports.Audittrail.List');

		// no db caching here
		// $this->db->cache_off();

		$fields = array('audittrail_id', 'audittrail_date', 'user_username', 'audittrail_table', 'audittrail_table_id', 'audittrail_action', 'audittrail_message', 'audittrail_ip');

		echo $this->audittrail_model->get_audittrail()->datatables($fields);
	}

	public function view($id)
	{
		$this->acl->restrict('Reports.Audittrail.View', 'modal');

		// $data['page_heading'] = lang('view_heading');
		// $data['page_subhead'] = lang('view_subhead');

		// // breadcrumbs
		// $this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		// $this->breadcrumbs->push(lang('index_heading'), site_url('audittrail'));
		// $this->breadcrumbs->push(lang('view_heading'), site_url('audittrail/view/'.$id));

		$this->audittrail_model->join('users', 'user_id = audittrail_user_id', 'LEFT');
		$data['audittrail'] = $this->audittrail_model->find($id);
		$data['old_data'] = json_decode($data['audittrail']->audittrail_old);
		$data['new_data'] = json_decode($data['audittrail']->audittrail_new);

		// $this->template->write_view('content', 'audittrail_view', $data);
		// $this->template->render();
		$this->load->view('audittrail_view', $data);
	}
}

/* End of file audittrail.php */
/* Location: ./application/modules/reports/controllers/audittrail.php */