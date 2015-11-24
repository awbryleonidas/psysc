<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_news_panel extends CI_Migration
{
	var $table = 'news_panels';

	var $permissions = array(
		'Content.News_panel.List',
		'Content.News_panel.View',
		'Content.News_panel.Add',
		'Content.News_panel.Edit',
		'Content.News_panel.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'content', // none if parent or single menu
			'menu_text' 		=> 'News',
			'menu_link' 		=> 'content/news_panel',
			'menu_permission' 	=> 'Content.News_panel.list',
			'menu_icon' 		=> 'fa fa-newspaper-o',
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
		$this->dbforge->add_field("news_panel_id int(10) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("news_panel_caption text DEFAULT NULL");
		$this->dbforge->add_field("news_panel_image varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("news_panel_header varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("news_panel_author varchar(100) DEFAULT NULL");
		$this->dbforge->add_field("news_panel_tags text DEFAULT NULL");
		$this->dbforge->add_field("news_panel_link varchar(255) DEFAULT NULL");

		$this->dbforge->add_field("news_panel_created_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("news_panel_created_on datetime NOT NULL");
		$this->dbforge->add_field("news_panel_modified_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("news_panel_modified_on datetime NOT NULL");
		$this->dbforge->add_field("news_panel_deleted tinyint(1) NOT NULL");
		$this->dbforge->add_field("news_panel_deleted_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("news_panel_deleted_on datetime NOT NULL");

		$this->dbforge->add_key('news_panel_id', TRUE);
		$this->dbforge->add_key('news_panel_deleted');
		$this->dbforge->create_table($this->table, TRUE);

		// add the module permissions
		$this->migrations_model->add_permissions($this->permissions);

		// add the module menu
		$this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

		// delete the permissions
		$this->migrations_model->delete_permissions($this->permissions);

		// delete the menu
		$this->migrations_model->delete_menus($this->menus);
	}
}