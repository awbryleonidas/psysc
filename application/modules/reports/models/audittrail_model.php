<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Audittrail_model extends MY_Model {

	protected $table				= "audittrail";
	protected $key					= "audittrail_id";
	protected $date_format			= "datetime";
	protected $log_user				= FALSE;
	protected $set_created			= FALSE;	
	protected $set_modified 		= FALSE;
	protected $soft_deletes			= FALSE;
	protected $deleted		 		= "audittrail_deleted";
	
	public function get_audittrail()
	{
		$this->join('users', 'user_id = audittrail_user_id', 'LEFT');
		$this->where('audittrail_deleted', 0);

		return $this;
	}
}

/* End of file audittrail_model.php */
/* Location: ./application/modules/reports/models/audittrail_model.php */