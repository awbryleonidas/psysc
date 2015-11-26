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
class Migration_Create_events extends CI_Migration
{
	var $table = 'events';

	var $permissions = array(
		'Events.Events.List',
		'Events.Featured_event.List',
		'Events.Featured_event.View',
		'Events.Featured_event.Add',
		'Events.Featured_event.Edit',
		'Events.Featured_event.Delete',
		'Events.Event_1.List',
		'Events.Event_1.View',
		'Events.Event_1.Add',
		'Events.Event_1.Edit',
		'Events.Event_1.Delete',
		'Events.Event_2.List',
		'Events.Event_2.View',
		'Events.Event_2.Add',
		'Events.Event_2.Edit',
		'Events.Event_2.Delete',
		'Events.Event_3.List',
		'Events.Event_3.View',
		'Events.Event_3.Add',
		'Events.Event_3.Edit',
		'Events.Event_3.Delete',
		'Events.Event_4.List',
		'Events.Event_4.View',
		'Events.Event_4.Add',
		'Events.Event_4.Edit',
		'Events.Event_4.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'none', // none if parent or single menu; link of parent if child. eg, malls
			'menu_text'			=> 'Events',
			'menu_link'			=> 'events',
			'menu_permission'	=> 'Events.Events.List',
			'menu_icon'			=> 'fa fa-folder',
			'menu_order'		=> 3,
			'menu_active'		=> 1
		),
		array(
			'menu_parent_id'	=> 'events', // none if parent or single menu
			'menu_text' 		=> 'Featured Event',
			'menu_link' 		=> 'events/featured_event',
			'menu_permission' 	=> 'Events.Featured_event.list',
			'menu_icon' 		=> 'fa fa-file-text',
			'menu_order' 		=> 1,
			'menu_active' 		=> 1
		),
		array(
			'menu_parent_id'	=> 'events', // none if parent or single menu
			'menu_text' 		=> 'NSCM',
			'menu_link' 		=> 'events/event_1',
			'menu_permission' 	=> 'Events.Event_1.list',
			'menu_icon' 		=> 'fa fa-file-text',
			'menu_order' 		=> 2,
			'menu_active' 		=> 1
		),
		array(
			'menu_parent_id'	=> 'events', // none if parent or single menu
			'menu_text' 		=> 'NYSTESC',
			'menu_link' 		=> 'events/event_2',
			'menu_permission' 	=> 'Events.Event_2.list',
			'menu_icon' 		=> 'fa fa-file-text',
			'menu_order' 		=> 3,
			'menu_active' 		=> 1
		),
		array(
			'menu_parent_id'	=> 'events', // none if parent or single menu
			'menu_text' 		=> 'CSIW',
			'menu_link' 		=> 'events/event_3',
			'menu_permission' 	=> 'Events.Event_3.list',
			'menu_icon' 		=> 'fa fa-file-text',
			'menu_order' 		=> 4,
			'menu_active' 		=> 1
		),
		array(
			'menu_parent_id'	=> 'events', // none if parent or single menu
			'menu_text' 		=> 'SEARCH',
			'menu_link' 		=> 'events/event_4',
			'menu_permission' 	=> 'Events.Event_4.list',
			'menu_icon' 		=> 'fa fa-file-text',
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
		$fields = array(
			'event_id' 					=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'event_type'				=> array('type' => 'VARCHAR', 'constraint' => 5, 'null' => FALSE),
			'event_option'				=> array('type' => 'VARCHAR', 'constraint' => 150, 'null' => FALSE),
			'event_option_value'		=> array('type' => 'TEXT', 'null' => FALSE),
			'event_option_description'	=> array('type' => 'TEXT', 'null' => FALSE),

			'event_created_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'event_created_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'event_modified_by' => array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'event_modified_on' => array('type' => 'DATETIME', 'null' => TRUE),
			'event_deleted' 	=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'event_deleted_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('event_id', TRUE);
		$this->dbforge->add_key('event_type');
		$this->dbforge->add_key('event_option');

		$this->dbforge->add_key('event_deleted');
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