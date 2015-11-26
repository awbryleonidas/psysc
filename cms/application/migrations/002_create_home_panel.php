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
	var $table = 'configs';

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
		//add configs per panel
		$this->db->insert($this->table, array('config_name' => 'home_text_1', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_caption_1', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_link_1', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_text_link_1', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_image_1', 'config_value' => ''));

		$this->db->insert($this->table, array('config_name' => 'home_text_2', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_caption_2', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_link_2', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_text_link_2', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_image_2', 'config_value' => ''));

		$this->db->insert($this->table, array('config_name' => 'home_text_3', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_caption_3', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_link_3', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_text_link_3', 'config_value' => ''));
		$this->db->insert($this->table, array('config_name' => 'home_image_3', 'config_value' => ''));

		// // add the module permissions
		$this->migrations_model->add_permissions($this->permissions);

		// // add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{
		//delete configs
		$this->db->delete($this->table, array('config_name' => 'home_text_1'));
		$this->db->delete($this->table, array('config_name' => 'home_caption_1'));
		$this->db->delete($this->table, array('config_name' => 'home_link_1'));
		$this->db->delete($this->table, array('config_name' => 'home_text_link_1'));
		$this->db->delete($this->table, array('config_name' => 'home_image_1'));

		$this->db->delete($this->table, array('config_name' => 'home_text_2'));
		$this->db->delete($this->table, array('config_name' => 'home_caption_2'));
		$this->db->delete($this->table, array('config_name' => 'home_link_2'));
		$this->db->delete($this->table, array('config_name' => 'home_text_link_2'));
		$this->db->delete($this->table, array('config_name' => 'home_image_2'));

		$this->db->delete($this->table, array('config_name' => 'home_text_3'));
		$this->db->delete($this->table, array('config_name' => 'home_caption_3'));
		$this->db->delete($this->table, array('config_name' => 'home_link_3'));
		$this->db->delete($this->table, array('config_name' => 'home_text_link_3'));
		$this->db->delete($this->table, array('config_name' => 'home_image_3'));


		// // delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);

		// // delete the menu
		$this->migrations_model->delete_menus($this->menus);

	}
}