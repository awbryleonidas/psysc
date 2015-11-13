<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Robert Christian Obias <robert.obias@digify.com.ph>
 * @author 		Randy Nivales <randy.nivales@digify.com.ph>
 * @copyright 	Copyright (c) 2015, Digify, Inc.
 * @link		http://www.digify.com.ph
 */
class Migration_Create_configs extends CI_Migration 
{
	private $_table = 'configs';

	private $_permissions = array(
		'settings.configs.list', 
		'settings.configs.view',
		'settings.configs.add',
		'settings.configs.edit',
		'settings.configs.delete'
	);

	private $_menus = array(
		array(
			'menu_parent'		=> 'settings', // none if parent or single menu
			'menu_text'			=> 'Configurations', 
			'menu_link'			=> 'settings/configs', 
			'menu_perm'			=> 'settings.configs.list', 
			'menu_icon'			=> 'fa fa-wrench', 
			'menu_order'		=> 1, 
			'menu_active'		=> 1
		),
	);

	public function __construct() 
	{
		parent::__construct();

		$this->load->model('migrations_model');
		$this->load->database();
	}
	
	public function up() 
	{
		$fields = array(
			'config_id'				=> array('type'  => 'SMALLINT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
			'config_name'			=> array('type'	 => 'VARCHAR',  'constraint'  => 255),
			'config_value'			=> array('type'  => 'VARCHAR',  'constraint'  => 255),
			'config_created_by'		=> array('type'  => 'MEDIUMINT', 'unsigned'    => TRUE, 'null' => TRUE),
			'config_created_on'		=> array('type'  => 'DATETIME',  'null'     => TRUE),
			'config_modified_by'	=> array('type'  => 'MEDIUMINT', 'unsigned' => TRUE, 'null'=> TRUE),
			'config_modified_on'	=> array('type'  => 'DATETIME',  'null' => TRUE),
			'config_deleted'		=> array('type'  => 'TINYINT',   'constraint' => 1,  'unsigned' => TRUE,  'null' => FALSE),
			'config_deleted_by'		=> array('type'  => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE), 
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('config_id', TRUE);
		$this->dbforge->add_key('config_name');
		$this->dbforge->create_table($this->_table, TRUE);

		// add the module permissions
		$this->migrations_model->add_permissions($this->_permissions);

		// add the module menu
		$this->migrations_model->add_menus($this->_menus);
		
		// add the initial values
		$data = array('config_name'  => 'cms_title', 'config_value' => 'Codifire CMS');
		$this->db->insert($this->_table, $data);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->_table);

		// delete the permissions
		$this->migrations_model->delete_permissions($this->_permissions);

		// delete the menu
		$this->migrations_model->delete_menus($this->_menus);
	}
}