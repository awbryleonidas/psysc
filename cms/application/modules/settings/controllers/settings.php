<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->language('settings');
	}
	
	public function index()
	{
		// created this one just for the menu only
		$this->acl->restrict('Settings.Settings.List');

		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		$this->template->write_view('content', 'settings_index', $data);
		$this->template->render();
	}
}

/* End of file settings.php */
/* Location: ./application/modules/settings/controllers/settings.php */