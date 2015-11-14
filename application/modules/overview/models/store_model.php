<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_model extends MY_Model {

	protected $table				= "milo_stores";
	protected $key					= "milo_store_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= FALSE;
	protected $set_created			= FALSE;
	protected $set_modified 		= FALSE;
	protected $soft_deletes			= FALSE;

	public function __construct()
	{
		parent::__construct();

	}
}

/* End of file region_model.php */
/* Location: ./application/modules/dashboard/models/region_model.php */