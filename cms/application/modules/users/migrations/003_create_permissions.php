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
class Migration_Create_permissions extends CI_Migration 
{
	var $table = 'permissions';

	var $permissions = array(
		'dashboard.dashboard.list', 
		// 'settings.settings.list',
		'settings.menus.list',
		'settings.menus.view',
		'settings.menus.add',
		'settings.menus.edit',
		'settings.menus.delete',
		'settings.application.edit',
		'users.users.list',
		'users.users.view',
		'users.users.add',
		'users.users.edit',
		'users.users.delete',
		'users.users.activate',
		'users.users.suspend',
		'users.users.password',
		'users.users.photo',
		'users.users.profile',
		'users.roles.list',
		'users.roles.view',
		'users.roles.add',
		'users.roles.edit',
		'users.roles.delete',
		'users.permissions.list',
		'users.permissions.view',
		'users.permissions.add',
		'users.permissions.edit',
		'users.permissions.delete',
	);

	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
		$fields = array(
			'permission_id' 				=> array('type' => 'SMALLINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'permission_name' 				=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
			'permission_simple' 			=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => TRUE),
			'permission_active' 			=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => TRUE),
			'permission_created_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'permission_created_on' 		=> array('type' => 'DATETIME', 'null' => TRUE),
			'permission_modified_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'permission_modified_on' 		=> array('type' => 'DATETIME', 'null' => TRUE),
			'permission_deleted' 			=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'permission_deleted_by' 		=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('permission_id', TRUE);
		$this->dbforge->add_key('permission_name');
		$this->dbforge->add_key('permission_simple');
		$this->dbforge->add_key('permission_active');
		$this->dbforge->add_key('permission_deleted');
		$this->dbforge->create_table($this->table, TRUE);

		// add the module permissions
		$this->migrations_model->add_permissions($this->permissions);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

		// delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);
	}
}