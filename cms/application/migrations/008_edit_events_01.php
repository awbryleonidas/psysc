<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Edit_events_01 extends CI_Migration
{

	var $table = 'events';
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
        $this->db->insert($this->table, array('event_option' => 'featured_event_title', 'event_option_value' => 'Featured Event Title'));
        $this->db->insert($this->table, array('event_option' => 'featured_event_description', 'event_option_value' => 'Featured event Short description'));
        $this->db->insert($this->table, array('event_option' => 'featured_event_image_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'featured_event_image_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'featured_event_image_3', 'event_option_value' => ''));

        $this->db->insert($this->table, array('event_option' => 'event_name_1', 'event_option_value' => 'NSCM'));
        $this->db->insert($this->table, array('event_option' => 'event_name_2', 'event_option_value' => 'NYSTESC'));
        $this->db->insert($this->table, array('event_option' => 'event_name_3', 'event_option_value' => 'CSIW'));
        $this->db->insert($this->table, array('event_option' => 'event_name_4', 'event_option_value' => 'SEARCH'));

        $this->db->insert($this->table, array('event_option' => 'event_youtube_link_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_description_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_image_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_description_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_faqs_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_register_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_fb_link_1', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_contact_1', 'event_option_value' => ''));

        $this->db->insert($this->table, array('event_option' => 'event_youtube_link_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_description_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_image_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_description_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_faqs_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_register_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_fb_link_2', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_contact_2', 'event_option_value' => ''));

        $this->db->insert($this->table, array('event_option' => 'event_youtube_link_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_description_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_image_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_description_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_faqs_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_register_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_fb_link_3', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_contact_3', 'event_option_value' => ''));

        $this->db->insert($this->table, array('event_option' => 'event_youtube_link_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_description_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_image_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_highlight_description_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_faqs_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_register_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_fb_link_4', 'event_option_value' => ''));
        $this->db->insert($this->table, array('event_option' => 'event_contact_4', 'event_option_value' => ''));
	}

	public function down()
	{
        $this->db->delete($this->table, array('event_option' => 'featured_event_title'));
        $this->db->delete($this->table, array('event_option' => 'featured_event_description'));
        $this->db->delete($this->table, array('event_option' => 'featured_event_image_1'));
        $this->db->delete($this->table, array('event_option' => 'featured_event_image_2'));
        $this->db->delete($this->table, array('event_option' => 'featured_event_image_3'));

        $this->db->delete($this->table, array('event_option' => 'event_youtube_link_1'));
        $this->db->delete($this->table, array('event_option' => 'event_youtube_link_2'));
        $this->db->delete($this->table, array('event_option' => 'event_youtube_link_3'));
        $this->db->delete($this->table, array('event_option' => 'event_youtube_link_4'));

        $this->db->delete($this->table, array('event_option' => 'event_description_1'));
        $this->db->delete($this->table, array('event_option' => 'event_description_2'));
        $this->db->delete($this->table, array('event_option' => 'event_description_3'));
        $this->db->delete($this->table, array('event_option' => 'event_description_4'));

        $this->db->delete($this->table, array('event_option' => 'event_highlight_image_1'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_image_2'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_image_3'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_image_4'));

        $this->db->delete($this->table, array('event_option' => 'event_highlight_description_1'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_description_2'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_description_3'));
        $this->db->delete($this->table, array('event_option' => 'event_highlight_description_4'));

        $this->db->delete($this->table, array('event_option' => 'event_faqs_1'));
        $this->db->delete($this->table, array('event_option' => 'event_faqs_2'));
        $this->db->delete($this->table, array('event_option' => 'event_faqs_3'));
        $this->db->delete($this->table, array('event_option' => 'event_faqs_4'));

        $this->db->delete($this->table, array('event_option' => 'event_register_1'));
        $this->db->delete($this->table, array('event_option' => 'event_register_2'));
        $this->db->delete($this->table, array('event_option' => 'event_register_3'));
        $this->db->delete($this->table, array('event_option' => 'event_register_4'));

        $this->db->delete($this->table, array('event_option' => 'event_fb_link_1'));
        $this->db->delete($this->table, array('event_option' => 'event_fb_link_2'));
        $this->db->delete($this->table, array('event_option' => 'event_fb_link_3'));
        $this->db->delete($this->table, array('event_option' => 'event_fb_link_4'));

        $this->db->delete($this->table, array('event_option' => 'event_contact_1'));
        $this->db->delete($this->table, array('event_option' => 'event_contact_2'));
        $this->db->delete($this->table, array('event_option' => 'event_contact_3'));
        $this->db->delete($this->table, array('event_option' => 'event_contact_4'));

	}
}