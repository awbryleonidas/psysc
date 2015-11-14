<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {
	
	protected $table				= "users";
	protected $key					= "user_id";
	protected $set_created			= FALSE;
	protected $set_modified 		= FALSE;

	protected $log_user				= TRUE;
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "user_deleted";
	protected $deleted_field 		= "user_deleted_on";
	protected $deleted_by_field 	= 'user_deleted_by';

	public function get_users($type = 'active')
	{
		$this->join('users_groups ug', 'users.user_id = ug.user_group_user_id', 'LEFT');
		$this->join('groups g', 'g.group_id = ug.user_group_group_id', 'LEFT');

		if ($type == 'active')
		{
			$this->where('user_deleted !=', 1);
		}
		else if ($type == 'deleted')
		{
			$this->where('user_deleted', 1);
		}
		$this->group_by('users.user_id');

		return $this;
	}
}
