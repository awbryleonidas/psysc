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
class Migration_Add_develop_menu extends CI_Migration 
{

	var $permissions = array(
		'develop.develop.list',
		'develop.migrations.list',
		'develop.migrations.migrate',
		'develop.migrations.rollback',
		'develop.builder.list', 
		'develop.builder.add', 
	);

	var $menus = array(
		array(
			'menu_parent'		=> 'none', // 'none' if parent or single menu
			'menu_text' 		=> 'Develop', 
			'menu_link' 		=> 'develop', 
			'menu_perm' 		=> 'develop.develop.list', 
			'menu_icon' 		=> 'fa fa-code', 
			'menu_order' 		=> 255, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'develop',
			'menu_text' 		=> 'Migration Files', 
			'menu_link' 		=> 'develop/migrations', 
			'menu_perm' 		=> 'develop.migrations.list', 
			'menu_icon' 		=> 'fa fa-database', 
			'menu_order' 		=> 1, 
			'menu_active' 		=> 1
		),
		array(
			'menu_parent'		=> 'develop',
			'menu_text' 		=> 'Module Builder', 
			'menu_link' 		=> 'develop/builder', 
			'menu_perm' 		=> 'develop.builder.list', 
			'menu_icon' 		=> 'fa fa-sitemap', 
			'menu_order' 		=> 2, 
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
	}
}