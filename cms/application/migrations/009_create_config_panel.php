<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_config_panel extends CI_Migration
{
	var $table = 'configs';

	var $permissions = array(
		'Content.Config_panel.List',
		'Content.Config_panel.View',
		'Content.Config_panel.Add',
		'Content.Config_panel.Edit',
		'Content.Config_panel.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'content', // none if parent or single menu
			'menu_text' 		=> 'Config',
			'menu_link' 		=> 'content/config_panel',
			'menu_permission' 	=> 'Content.Config_panel.list',
			'menu_icon' 		=> 'fa fa-cogs',
			'menu_order' 		=> 5,
			'menu_active' 		=> 1
		),
	);
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}

	public function up()
	{
		$this->db->insert($this->table, array('config_name' => 'config_subscribe_text', 'config_value' => 'Sample Subscribed Now text'));
		$this->db->insert($this->table, array('config_name' => 'config_contact_text', 'config_value' => 'Sample Contact Us text'));
		$this->db->insert($this->table, array('config_name' => 'config_contact', 'config_value' => '0917xxxxxxx'));
		$this->db->insert($this->table, array('config_name' => 'config_email', 'config_value' => 'email@us.com'));
		$this->db->insert($this->table, array('config_name' => 'config_office_location', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'config_working_hours', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'config_fb', 'config_value' => 'fb.com'));
		$this->db->insert($this->table, array('config_name' => 'config_twitter', 'config_value' => 'twitter.com'));

		// // add the module permissions
		$this->migrations_model->add_permissions($this->permissions);

		// // add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{
		$this->db->delete($this->table, array('config_name' => 'config_subscribe_text'));
		$this->db->delete($this->table, array('config_name' => 'config_contact_text'));
		$this->db->delete($this->table, array('config_name' => 'config_contact'));
		$this->db->delete($this->table, array('config_name' => 'config_email'));
		$this->db->delete($this->table, array('config_name' => 'config_office_location'));
		$this->db->delete($this->table, array('config_name' => 'config_working_hours'));
		$this->db->delete($this->table, array('config_name' => 'config_fb'));
		$this->db->delete($this->table, array('config_name' => 'config_twitter'));

		// // delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);

		// // delete the menu
		$this->migrations_model->delete_menus($this->menus);
	}
}