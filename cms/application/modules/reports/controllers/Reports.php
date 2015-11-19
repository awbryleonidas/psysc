<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MX_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		// $this->acl->restrict('Reports.Reports.List');
		redirect('reports/audittrail', 'refresh');
	}
}

/* End of file reports.php */
/* Location: ./application/modules/reports/controllers/reports.php */