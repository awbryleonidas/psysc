<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_model extends MY_Model {

	protected $table				= "subscribers";
	protected $key					= "subscriber_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "subscriber_created_on";
	protected $created_by_field 	= "subscriber_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "subscriber_modified_on";
	protected $modified_by_field	= "subscriber_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "subscriber_deleted";
	protected $deleted_field 		= "subscriber_deleted_on";
	protected $deleted_by_field 	= 'subscriber_deleted_by';
}

/* End of file subscriber_model.php */
/* Location: ./subscriber/modules/settings/models/subscriber_model.php */