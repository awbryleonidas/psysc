<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model {

	protected $table				= "menu";
	protected $key					= "menu_id";
	protected $date_format			= "datetime";
	
	protected $log_user				= TRUE;
	
	protected $set_created			= TRUE;
	protected $created_field 		= "menu_created_on";
	protected $created_by_field 	= "menu_created_by";
	
	protected $set_modified 		= TRUE;
	protected $modified_field 		= "menu_modified_on";
	protected $modified_by_field	= "menu_modified_by";
	
	protected $soft_deletes			= TRUE;
	protected $deleted		 		= "menu_deleted";
	protected $deleted_field 		= "menu_deleted_on";
	protected $deleted_by_field 	= 'menu_deleted_by';

	// public function get_menu()
	// {
	// 	// $this->join('menu b', 'b.menu_id = menu.menu_parent_id');
	// 	// $this->where('menu.menu_deleted', 0);

	// 	return $this;
	// }
}

/* End of file menu_model.php */
/* Location: ./application/modules/settings/models/menu_model.php */