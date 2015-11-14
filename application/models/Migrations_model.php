<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrations_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function add_permissions($permissions = array())
	{
		// add the module permissions
		if ($permissions)
		{
			foreach ($permissions as $permission)
			{
				$this->db->insert('permissions', array(
					'permission_name' => $permission, 
					'permission_simple' => 1, 
					'permission_active' => 1
				));
			}
		}
	}

	public function add_menus($menus = array())
	{
		// add the module menu
		if ($menus)
		{
			foreach ($menus as $menu)
			{
				if ($menu['menu_parent_id'] == 'none')
				{
					$parent = 0;
				}
				else
				{
					// get the parent id
					$query = $this->db->query('SELECT menu_id FROM menu WHERE menu_link = "' . $menu['menu_parent_id'] . '"');
					$row = $query->row();
					if ($row)
					{
						$parent = $row->menu_id;
					}
					else
					{
						$parent = 0;
					}
				}
				$menu['menu_parent_id'] = $parent;
				$this->db->insert('menu', $menu);
			}
		}
	}

	public function delete_permissions($permissions = array())
	{
		// delete the permissions
		if ($permissions)
		{
			foreach ($permissions as $permission)
			{
				$this->db->delete('permissions', array('permission_name' => $permission));
			}
		}
	}

	public function delete_menus($menus = array())
	{
		// delete the menu
		if ($menus)
		{
			foreach ($menus as $menu)
			{
				$this->db->delete('menu', array('menu_link' => $menu['menu_link']));
			}
		}
	}
}