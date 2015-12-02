<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Edit_events_02 extends CI_Migration
{

	var $table = 'events';
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
            $this->db->delete($this->table, array('event_option' => 'featured_event_title'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_description'));

            $this->db->insert($this->table, array('event_option' => 'featured_event_title_1', 'event_option_value' => 'Featured Event Title 1'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_description_1', 'event_option_value' => 'Featured event Short description 1'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_title_2', 'event_option_value' => 'Featured Event Title 2'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_description_2', 'event_option_value' => 'Featured event Short description 2'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_title_3', 'event_option_value' => 'Featured Event Title 3'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_description_3', 'event_option_value' => 'Featured event Short description 3'));

    }

	public function down()
	{
            $this->db->insert($this->table, array('event_option' => 'featured_event_title', 'event_option_value' => 'Featured Event Title'));
            $this->db->insert($this->table, array('event_option' => 'featured_event_description', 'event_option_value' => 'Featured event Short description'));

            $this->db->delete($this->table, array('event_option' => 'featured_event_title_1'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_description_1'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_title_2'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_description_2'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_title_3'));
            $this->db->delete($this->table, array('event_option' => 'featured_event_description_3'));
    }
}