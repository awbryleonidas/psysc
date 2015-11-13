<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randy.nivales@digify.com.ph>
 * @copyright 	Copyright (c) 2015, Digify, Inc.
 * @link		http://www.digify.com.ph
 */
class Migration_Create_auditlogs extends CI_Migration 
{
	var $table = 'auditlogs';

	var $permissions = array(
		'reports.reports.list',
		'reports.auditlogs.list', 
		'reports.auditlogs.view',
	);

	var $menus = array(
		array(
			'menu_parent'		=> 'none', // none if parent or single menu
			'menu_text' 		=> 'Reports', 
			'menu_link' 		=> 'reports', 
			'menu_perm' 		=> 'reports.reports.list', 
			'menu_icon' 		=> 'fa fa-bar-chart', 
			'menu_order' 		=> 252, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'reports', // none if parent or single menu
			'menu_text' 		=> 'Auditlogs', 
			'menu_link' 		=> 'reports/auditlogs', 
			'menu_perm' 		=> 'reports.auditlogs.list', 
			'menu_icon' 		=> 'fa fa-archive', 
			'menu_order' 		=> 1, 
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
			'auditlog_id' 			=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'auditlog_action' 		=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
			'auditlog_data' 		=> array('type' => 'TEXT', 'null' => FALSE),
			'auditlog_user_ip' 		=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => FALSE),
			'auditlog_user_agent' 	=> array('type' => 'TEXT', 'null' => TRUE),
			'auditlog_created_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'auditlog_created_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'auditlog_deleted' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'auditlog_deleted_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('auditlog_id', TRUE);
		$this->dbforge->add_key('auditlog_action');
		$this->dbforge->add_key('auditlog_created_by');
		$this->dbforge->add_key('auditlog_deleted');
		$this->dbforge->create_table($this->table, TRUE);

		// // add the module permissions
		$this->migrations_model->add_permissions($this->permissions);

		// // add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

		// // delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);

		// // delete the menu
		$this->migrations_model->delete_menus($this->menus);
	}
}