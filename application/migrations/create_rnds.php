<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_rnds extends CI_Migration
{
	var $table = 'milo_rnds';

	function __construct()
	{
		parent::__construct();
	}
	
	public function up()
	{
		$this->dbforge->add_field("milo_rnd_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("milo_rnd_firstname varchar(255) NOT NULL");
		$this->dbforge->add_field("milo_rnd_lastname varchar(255) NOT NULL");
		$this->dbforge->add_field("milo_rnd_username varchar(10) NOT NULL");
		$this->dbforge->add_field("milo_rnd_password varchar(10) NOT NULL");
		$this->dbforge->add_field("created_on datetime NOT NULL");

		$this->dbforge->add_key('milo_rnd_id', TRUE);
		$this->dbforge->add_key('milo_rnd_username');
		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down()
	{
		// drop the table
		//$this->dbforge->drop_table($this->table);
	}
}