<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		{{package_name}}
 * @version		{{module_version}}
 * @author 		{{author_name}} <{{author_email}}>
 * @copyright 	Copyright (c) {{copyright_year}}, {{copyright_name}}
 * @link		{{copyright_link}}
 */
class Migration_Create_{{lc_plural_module_name}} extends CI_Migration 
{
	var $table = '{{lc_plural_module_name}}';

	var $permissions = array(
		'{{parent_module}}.{{lc_plural_module_name}}.list', 
		'{{parent_module}}.{{lc_plural_module_name}}.view',
		'{{parent_module}}.{{lc_plural_module_name}}.add',
		'{{parent_module}}.{{lc_plural_module_name}}.edit',
		'{{parent_module}}.{{lc_plural_module_name}}.delete',
	);

	var $menus = array(
		array(
			'menu_parent'		=> 'none', // none if parent or single menu
			'menu_text' 		=> '{{ucf_plural_module_name}}', 
			'menu_link' 		=> '{{parent_module}}/{{lc_plural_module_name}}', 
			'menu_perm' 		=> '{{parent_module}}.{{lc_plural_module_name}}.list', 
			'menu_icon' 		=> '{{module_icon}}', 
			'menu_order' 		=> {{module_order}}, 
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
			'{{lc_singular_module_name}}_id' 			=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
{{migration_table_fields}}
			'{{lc_singular_module_name}}_created_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'{{lc_singular_module_name}}_created_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'{{lc_singular_module_name}}_modified_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
			'{{lc_singular_module_name}}_modified_on' 	=> array('type' => 'DATETIME', 'null' => TRUE),
			'{{lc_singular_module_name}}_deleted' 		=> array('type' => 'TINYINT', 'constraint' => 1, 'unsigned' => TRUE, 'null' => FALSE),
			'{{lc_singular_module_name}}_deleted_by' 	=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'null' => TRUE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('{{lc_singular_module_name}}_id', TRUE);
{{migration_table_keys}}
		$this->dbforge->add_key('{{lc_singular_module_name}}_deleted');
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