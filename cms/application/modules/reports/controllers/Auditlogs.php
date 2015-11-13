<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dashboard Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Auditlogs extends MX_Controller 
{
	/**
	 * Constructor
	 *
	 * @access	public
	 *
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('auditlogs_model');
		$this->load->language('auditlogs');
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function index()
	{
		$this->acl->restrict('reports.auditlogs.list');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('reports'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('reports/audittrail'));
		
		// add plugins
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.responsive.min.js');
		
		// render the page
		$this->template->add_css(module_css('reports', 'auditlogs_index'));
		$this->template->add_js(module_js('reports', 'auditlogs_index'));
		$this->template->write_view('content', 'auditlogs_index', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * datatables
	 *
	 * @access	public
	 * @param	mixed datatables parameters (datatables.net)
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function datatables()
	{
		$this->acl->restrict('reports.auditlogs.list');

		echo $this->auditlogs_model->get_datatables();
	}

	// --------------------------------------------------------------------

	/**
	 * view
	 *
	 * @access	public
	 * @param   $id integer
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function view($id)
	{
		$this->acl->restrict('reports.auditlogs.view', 'modal');

		$data['auditlog'] = $this->auditlogs_model
			->join('users', 'id = auditlog_created_by', 'LEFT')
			->find($id);

		// render the page
		$this->template->set_template('modal');
		$this->template->add_css(module_css('reports', 'auditlogs_view'));
		$this->template->add_js(module_js('reports', 'auditlogs_view'));
		$this->template->write_view('content', 'auditlogs_view', $data);
		$this->template->render();
	}
}

/* End of file Auditlog.php */
/* Location: ./application/modules/reports/controllers/Auditlog.php */