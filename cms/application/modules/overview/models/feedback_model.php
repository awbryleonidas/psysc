<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends MY_Model {

	protected $table				= "feedbacks";
	protected $key					= "feedback_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "feedback_created_on";
	protected $created_by_field 	= "feedback_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "feedback_modified_on";
	protected $modified_by_field	= "feedback_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "feedback_deleted";
	protected $deleted_field 		= "feedback_deleted_on";
	protected $deleted_by_field 	= 'feedback_deleted_by';
}

/* End of file feedback_model.php */
/* Location: ./feedback/modules/settings/models/feedback_model.php */