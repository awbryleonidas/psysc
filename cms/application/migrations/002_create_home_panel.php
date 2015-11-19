<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 * @copyright 	Copyright (c) 2015, Digify, Inc.
 * @link		http://www.digify.com.ph
 */
class Migration_Create_home_panel extends CI_Migration
{
	var $table = 'home_panels';

	var $permissions = array(
		'Content.Content.List',
		'Content.Home_panel.List',
		'Content.Home_panel.View',
		'Content.Home_panel.Add',
		'Content.Home_panel.Edit',
		'Content.Home_panel.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'none', // none if parent or single menu; link of parent if child. eg, malls
			'menu_text'			=> 'Content',
			'menu_link'			=> 'content',
			'menu_permission'	=> 'Content.Content.List',
			'menu_icon'			=> 'fa fa-folder',
			'menu_order'		=> 2,
			'menu_active'		=> 1
		),
		array(
			'menu_parent_id'	=> 'content', // none if parent or single menu
			'menu_text' 		=> 'Home',
			'menu_link' 		=> 'content/home_panel',
			'menu_permission' 	=> 'Content.Home_panel.list',
			'menu_icon' 		=> 'fa fa-file-text',
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
			'home_panel_id' 			=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'home_panel_no'				=> array('type' => 'TINYINT', 'constraint' => 1, 'null' => FALSE),
			'home_panel_text'			=> array('type' => 'VARCHAR', 'constraint' => 100, 'null' => FALSE),
			'home_panel_caption'		=> array('type' => 'VARCHAR', 'constraint' => 150, 'null' => FALSE),
			'home_panel_link_to'		=> array('type' => 'VARCHAR', 'constraint' => 20, 'null' => FALSE),
			'home_panel_link_text'		=> array('type' => 'VARCHAR', 'constraint' => 20, 'null' => FALSE),
			'home_panel_image'				=> array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),

			'home_panel_created_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'home_panel_created_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'home_panel_modified_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'home_panel_modified_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'home_panel_deleted' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'home_panel_deleted_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('home_panel_id', TRUE);
		$this->dbforge->add_key('home_panel_no');

		$this->dbforge->add_key('home_panel_deleted');
		$this->dbforge->create_table($this->table, TRUE);
		
		// // add the module permissions
		$this->migrations_model->add_permissions($this->permissions);

		// // add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{

		// // delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);

		// // delete the menu
		$this->migrations_model->delete_menus($this->menus);
		
		// drop the table
		$this->dbforge->drop_table($this->table);
	}
}