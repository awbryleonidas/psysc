<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends MY_Model {

	protected $table				= "events";
	protected $key					= "event_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "event_created_on";
	protected $created_by_field 	= "event_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "event_modified_on";
	protected $modified_by_field	= "event_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "event_deleted";
	protected $deleted_field 		= "event_deleted_on";
	protected $deleted_by_field 	= 'event_deleted_by';
}