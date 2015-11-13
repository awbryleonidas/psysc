<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Application Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Application extends MX_Controller 
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

		$this->load->language('application');
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
		$this->acl->restrict('settings.application.edit');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/application'));


		// $this->template->add_css(module_css('settings', 'application_index'));
		// $this->template->add_js(module_js('settings', 'application_index'));
		$this->template->write_view('content', 'application_index', $data);
		$this->template->render();
	}

}

/* End of file Application.php */
/* Location: ./application/modules/settings/controllers/Application.php */