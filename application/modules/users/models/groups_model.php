<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groups_model extends MY_Model {

	protected $table 				= "groups";
	protected $key					= "group_id";
	protected $set_created			= FALSE;
	protected $set_modified			= FALSE;

	protected $log_user				= TRUE;
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "group_deleted";
	protected $deleted_field 		= "group_deleted_on";
	protected $deleted_by_field 	= 'group_deleted_by';
}