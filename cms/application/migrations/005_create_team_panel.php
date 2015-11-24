<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_team_panel extends CI_Migration
{
	var $table = 'team_panels';

	var $permissions = array(
		'Content.Team_panel.List',
		'Content.Team_panel.View',
		'Content.Team_panel.Add',
		'Content.Team_panel.Edit',
		'Content.Team_panel.Delete',
	);

	var $menus = array(
		array(
			'menu_parent_id'	=> 'content', // none if parent or single menu
			'menu_text' 		=> 'Team',
			'menu_link' 		=> 'content/team_panel',
			'menu_permission' 	=> 'Content.Team_panel.list',
			'menu_icon' 		=> 'fa fa-users',
			'menu_order' 		=> 4,
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
		$this->dbforge->add_field("team_panel_id int(10) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("team_panel_name varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("team_panel_position varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("team_panel_type varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("team_panel_facebook varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("team_panel_twitter varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("team_panel_description TEXT DEFAULT NULL");
		$this->dbforge->add_field("team_panel_image varchar(255) DEFAULT NULL");

		$this->dbforge->add_field("team_panel_created_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("team_panel_created_on datetime NOT NULL");
		$this->dbforge->add_field("team_panel_modified_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("team_panel_modified_on datetime NOT NULL");
		$this->dbforge->add_field("team_panel_deleted tinyint(1) NOT NULL");
		$this->dbforge->add_field("team_panel_deleted_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("team_panel_deleted_on datetime NOT NULL");

		$this->dbforge->add_key('team_panel_id', TRUE);
		$this->dbforge->add_key('team_panel_deleted');
		$this->dbforge->add_key('team_panel_name');
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