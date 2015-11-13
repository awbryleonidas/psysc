<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Migration_Create_menus extends CI_Migration 
{
	var $table = 'menus';

	var $menus = array(
		array(
			'menu_parent'		=> 'none', // 'none' if parent or single menu; link of parent if child. eg, malls
			'menu_text'			=> 'Dashboard', 
			'menu_link'			=> 'dashboard', 
			'menu_perm'			=> 'dashboard.dashboard.list', 
			'menu_icon'			=> 'fa fa-dashboard', 
			'menu_order'		=> 1, 
			'menu_active'		=> 1
		),
		array(
			'menu_parent'		=> 'none', 
			'menu_text'			=> 'Settings', 
			'menu_link'			=> 'settings', 
			'menu_perm'			=> 'settings.settings.list', 
			'menu_icon'			=> 'fa fa-cogs', 
			'menu_order'		=> 254, 
			'menu_active'		=> 1
		),
		// array(
		// 	'menu_parent'		=> 'settings',
		// 	'menu_text' 		=> 'Application', 
		// 	'menu_link' 		=> 'settings/application', 
		// 	'menu_perm' 		=> 'settings.application.edit', 
		// 	'menu_icon' 		=> 'fa fa-cog', 
		// 	'menu_order' 		=> 1, 
		// 	'menu_active' 		=> 1
		// ),
		array(
			'menu_parent'		=> 'settings',
			'menu_text' 		=> 'Menus', 
			'menu_link' 		=> 'settings/menus', 
			'menu_perm' 		=> 'settings.menus.list', 
			'menu_icon' 		=> 'fa fa-list-ul', 
			'menu_order' 		=> 2, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'none', 
			'menu_text'			=> 'Users', 
			'menu_link'			=> 'users', 
			'menu_perm'			=> 'users.users.list', 
			'menu_icon'			=> 'fa fa-users', 
			'menu_order'		=> 253, 
			'menu_active'		=> 1
		),
		array(
			'menu_parent'		=> 'users',
			'menu_text' 		=> 'Users', 
			'menu_link' 		=> 'users', 
			'menu_perm' 		=> 'users.users.list', 
			'menu_icon' 		=> 'fa fa-users', 
			'menu_order' 		=> 1, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'users',
			'menu_text' 		=> 'Roles', 
			'menu_link' 		=> 'users/roles', 
			'menu_perm' 		=> 'users.roles.list', 
			'menu_icon' 		=> 'fa fa-street-view', 
			'menu_order' 		=> 2, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'users',
			'menu_text' 		=> 'Permissions', 
			'menu_link' 		=> 'users/permissions', 
			'menu_perm' 		=> 'users.permissions.list', 
			'menu_icon' 		=> 'fa fa-lock', 
			'menu_order' 		=> 3, 
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
		$fields = array(
			'menu_id' 				=> array('type' => 'SMALLINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'menu_text' 			=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
			'menu_link' 			=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
			'menu_perm' 			=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
			'menu_icon' 			=> array('type' => 'VARCHAR', 'constraint' => 40, 'null' => FALSE),
			'menu_parent' 			=> array('type' => 'SMALLINT', 'unsigned' => TRUE, 'null' => TRUE),
			'menu_order' 			=> array('type' => 'TINYINT', 'constraint' => 3, 'unsigned' => TRUE, 'null' => TRUE),
			'menu_active' 			=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => TRUE),
			'menu_created_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'menu_created_on' 		=> array('type' => 'DATETIME', 'null' => TRUE),
			'menu_modified_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'menu_modified_on' 		=> array('type' => 'DATETIME', 'null' => TRUE),
			'menu_deleted' 			=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'menu_deleted_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('menu_id', TRUE);
		$this->dbforge->add_key('menu_text');
		$this->dbforge->add_key('menu_active');
		$this->dbforge->add_key('menu_deleted');
		$this->dbforge->create_table($this->table, TRUE);

		// add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

		// delete the menu
		$this->migrations_model->delete_menus($this->menus);
	}
}