<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_rnd_contacts extends CI_Migration
{
	var $table = 'milo_rnd_contacts';

	function __construct()
	{
		parent::__construct();
	}
	
	public function up()
	{
		$this->dbforge->add_field("milo_rnd_contact_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("milo_rnd_contact_rnd_id mediumint(8) unsigned NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_total_contact tinyint(3) NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_converted_contact tinyint(3) NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_conversion_rate double NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_date date NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_daily_rate double NOT NULL");
		$this->dbforge->add_field("milo_rnd_contact_date_inserted datetime NOT NULL");

		$this->dbforge->add_field("milo_rnd_contact_date_created datetime NOT NULL");
		$this->dbforge->add_field("created_on datetime NOT NULL");

		$this->dbforge->add_key('milo_rnd_contact_id', TRUE);
		$this->dbforge->add_key('milo_rnd_contact_rnd_id');

		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down()
	{
		// MUST NOT drop the table
		//$this->dbforge->drop_table($this->table);
	}
}