<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_consumers extends CI_Migration
{
	var $table = 'milo_consumers';

	function __construct()
	{
		parent::__construct();
	}
	
	public function up()
	{
		$this->dbforge->add_field("milo_consumer_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("milo_consumer_store_id mediumint(8) unsigned NOT NULL");
		$this->dbforge->add_field("milo_consumer_rnd_username varchar(100) NOT NULL");
        $this->dbforge->add_field("milo_consumer_region varchar(100) NULL");
		$this->dbforge->add_field("milo_consumer_child_age tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_child_gender set('M', 'F') NOT NULL");

		$this->dbforge->add_field("milo_consumer_eating_hrs tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_homework_hrs tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_playing_hrs tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_sports_hrs tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_studying_hrs tinyint(2) NOT NULL");

		$this->dbforge->add_field("milo_consumer_physical_activity_hrs tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_physical_activity_kcal mediumint(8) NOT NULL");
		$this->dbforge->add_field("milo_consumer_mental_activity_hrs tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_mental_activity_kcal mediumint(8) NOT NULL");
		$this->dbforge->add_field("milo_consumer_total_kcal varchar(255) NOT NULL");

		$this->dbforge->add_field("milo_consumer_child_eat_breakfast tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_times_per_week tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_not_eating varchar(255) NOT NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_not_eating_others varchar(255) NOT NULL");
		$this->dbforge->add_field("milo_consumer_breakfast_drink varchar(50) NOT NULL");
		$this->dbforge->add_field("milo_consumer_breakfast_drink_others varchar(50) NOT NULL");
		$this->dbforge->add_field("milo_consumer_milo_intake tinyint(2) NOT NULL");

		$this->dbforge->add_field("milo_consumer_parent_firstname varchar(100) NOT NULL");
		$this->dbforge->add_field("milo_consumer_parent_lastname varchar(100) NOT NULL");
		$this->dbforge->add_field("milo_consumer_mobile_number varchar(50) NULL");
		$this->dbforge->add_field("milo_consumer_email_address varchar(100) NULL");
		$this->dbforge->add_field("milo_consumer_child_birthdate date NOT NULL");
        $this->dbforge->add_field("milo_consumer_agree_1 tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_agree_2 tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_agree_3 tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_agree_4 tinyint(2) NOT NULL");
        $this->dbforge->add_field("milo_consumer_agree_5 tinyint(2) NOT NULL");

		$this->dbforge->add_field("milo_consumer_purchased tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_sku varchar(100) NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_buying varchar(255) NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_buying_others varchar(255) NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_not_buying varchar(255) NULL");
		$this->dbforge->add_field("milo_consumer_reason_for_not_buying_others varchar(255) NULL");
		$this->dbforge->add_field("milo_consumer_preferred_brand  varchar(100) NULL");

        $this->dbforge->add_field("milo_consumer_deleted_session tinyint(2) NOT NULL");
		$this->dbforge->add_field("milo_consumer_date_created datetime NOT NULL");
		$this->dbforge->add_field("date_synced datetime NOT NULL");

		$this->dbforge->add_key('milo_consumer_id', TRUE);
		$this->dbforge->add_key('milo_consumer_store_id');
		$this->dbforge->add_key('milo_consumer_rnd_username');

		$this->dbforge->add_key('milo_consumer_physical_activity_hrs');
		$this->dbforge->add_key('milo_consumer_physical_activity_kcal');
		$this->dbforge->add_key('milo_consumer_mental_activity_hrs');
		$this->dbforge->add_key('milo_consumer_mental_activity_kcal');
		$this->dbforge->add_key('milo_consumer_total_kcal');
		$this->dbforge->add_key('milo_consumer_child_eat_breakfast');
		$this->dbforge->add_key('milo_consumer_reason_for_not_eating');
		$this->dbforge->add_key('milo_consumer_breakfast_drink');
		$this->dbforge->add_key('milo_consumer_milo_intake');
		$this->dbforge->add_key('milo_consumer_purchased');
		$this->dbforge->add_key('milo_consumer_sku');
		$this->dbforge->add_key('milo_consumer_reason_for_buying');
		$this->dbforge->add_key('milo_consumer_reason_for_not_buying');
		$this->dbforge->add_key('milo_consumer_preferred_brand');
		$this->dbforge->add_key('milo_consumer_agree_4');
		$this->dbforge->add_key('milo_consumer_region');

		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down()
	{
		// MUST NOT drop the table
		//$this->dbforge->drop_table($this->table);
	}
}