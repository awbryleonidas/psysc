<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_stores extends CI_Migration
{
	var $table = 'milo_stores';

	function __construct()
	{
		parent::__construct();
	}
	
	public function up()
	{
		$this->dbforge->add_field("milo_store_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("milo_store_name varchar(255) NOT NULL");
		$this->dbforge->add_field("created_on datetime NOT NULL");

		$this->dbforge->add_key('milo_store_id', TRUE);
		$this->dbforge->add_key('milo_store_name');
		$this->dbforge->create_table($this->table, TRUE);


        $fields = array(
            'milo_store_region' => array('type' => 'varchar(100) NOT NULL'),
            'milo_store_distributor' => array('type' => 'varchar(100) NOT NULL'),
            'milo_store_agency' => array('type' => 'varchar(100) NOT NULL'),
        );
        $this->dbforge->add_column($this->table, $fields);
	}

	public function down()
	{
		// drop the table
		//$this->dbforge->drop_table($this->table);
        //$this->dbforge->drop_column($this->table, 'milo_store_region');
        //$this->dbforge->drop_column($this->table, 'milo_store_distributor');
        //$this->dbforge->drop_column($this->table, 'milo_store_agency');
	}
}