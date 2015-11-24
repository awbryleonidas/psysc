<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Edit_configs_01 extends CI_Migration
{

	var $table = 'configs';
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
        $this->db->insert($this->table, array('config_name' => 'about_us_caption', 'config_value' => 'About Us Caption goes here'));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_name_1', 'config_value' => 'History'));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_name_2', 'config_value' => 'About Us Panel 2'));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_text_1', 'config_value' => ''));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_text_2', 'config_value' => ''));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_image_1', 'config_value' => ''));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_image_2', 'config_value' => ''));
        $this->db->insert($this->table, array('config_name' => 'about_us_panel_image_3', 'config_value' => ''));
	}

	public function down()
	{
        $this->db->delete($this->table, array('config_name' => 'about_us_caption'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_name_1'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_name_2'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_text_1'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_text_2'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_image_1'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_image_2'));
        $this->db->delete($this->table, array('config_name' => 'about_us_panel_image_3'));
	}
}