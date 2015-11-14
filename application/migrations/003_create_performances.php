<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_performances extends CI_Migration
{

    var $permissions = array(
        'Performances.Performances.List',
    );

    var $menus = array(
        array(
            'menu_parent_id'	=> 'none', // none if parent or single menu; link of parent if child. eg, malls
            'menu_text'			=> 'Performances',
            'menu_link'			=> 'performances',
            'menu_permission'	=> 'Performances.Performances.List',
            'menu_icon'			=> 'fa fa-line-chart',
            'menu_order'		=> 2,
            'menu_active'		=> 1
        ),
    );

	function __construct()
	{
		parent::__construct();

        $this->load->model('migrations_model');
	}
	
	public function up()
	{

        // add the module permissions
        $this->migrations_model->add_permissions($this->permissions);

        // add the module menu
        $this->migrations_model->add_menus($this->menus);
	}

	public function down()
	{


        // delete the permissions
        $this->migrations_model->delete_permissions($this->permissions);

        // delete the menu
        $this->migrations_model->delete_menus($this->menus);
	}
}