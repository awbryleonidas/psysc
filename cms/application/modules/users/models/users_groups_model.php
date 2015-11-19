<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_groups_model extends MY_Model {

	protected $table				= "users_groups";
	protected $key					= "user_group_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= FALSE;
	
	protected $set_created			= FALSE;
	
	protected $set_modified 		= FALSE;
	
	protected $soft_deletes			= FALSE;
}