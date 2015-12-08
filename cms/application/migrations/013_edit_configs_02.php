<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Edit_configs_02 extends CI_Migration
{

	var $table = 'configs';
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_name_3', 'config_value' => 'History'));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_name_4', 'config_value' => 'About Us Panel 2'));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_text_3', 'config_value' => ''));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_text_4', 'config_value' => ''));
	}

	public function down()
	{
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_name_3'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_name_4'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_text_3'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_text_4'));
	}
}