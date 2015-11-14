<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application_model extends MY_Model {

	protected $table				= "configs";
	protected $key					= "config_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "config_created_on";
	protected $created_by_field 	= "config_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "config_modified_on";
	protected $modified_by_field	= "config_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "config_deleted";
	protected $deleted_field 		= "config_deleted_on";
	protected $deleted_by_field 	= 'config_deleted_by';
}

/* End of file application_model.php */
/* Location: ./application/modules/settings/models/application_model.php */