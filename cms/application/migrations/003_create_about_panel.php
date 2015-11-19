<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_about_panel extends CI_Migration
{
	var $table = 'about_panels';

	var $permissions = array(
		'Content.About_panel.List',
		'Content.About_panel.View',
		'Content.About_panel.Add',
		'Content.About_panel.Edit',
		'Content.About_panel.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'content', // none if parent or single menu
			'menu_text' 		=> 'About',
			'menu_link' 		=> 'content/about_panel',
			'menu_permission' 	=> 'Content.About_panel.list',
			'menu_icon' 		=> 'fa fa-child',
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