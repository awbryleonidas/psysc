<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_perms_model extends MY_Model {

	protected $table 			= "group_perms";
	protected $key				= "group_perm_id";
	protected $soft_deletes		= false;
	protected $set_created		= false;
	protected $set_modified 	= false;
	protected $deleted		 	= "group_perm_deleted";

	public function check_group_perms($group_id, $permission_id)
	{
		if (is_array($group_id))
		{
			$this->db->where_in('group_perm_group_id', $group_id);
		}
		else
		{
			$this->db->where('group_perm_group_id', $group_id);
		}

		$this->db->where('group_perm_permission_id', $permission_id); 
		$this->db->where('group_perm_allowed !=', 0);
		$this->db->order_by('group_perm_allowed');
		$query = $this->db->get($this->table);
		$result = $query->row();
		// pr($group_id);
		// pr($result); exit;
		return ($result) ? $result->group_perm_allowed : FALSE;
	}
}
