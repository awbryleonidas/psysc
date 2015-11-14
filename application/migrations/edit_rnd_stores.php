<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Edit_rnd_stores extends CI_Migration
{
	var $table = 'milo_stores';

	function __construct()
	{
		parent::__construct();
	}

    public function up()
    {
        $fields = array(
            'milo_store_region' => array('type' => 'varchar(100) NOT NULL'),
            'milo_store_distributor' => array('type' => 'varchar(100) NOT NULL'),
            'milo_store_agency' => array('type' => 'varchar(100) NOT NULL'),
        );
        $this->dbforge->add_column($this->table, $fields);
    }

    public function down()
    {
       //$this->dbforge->drop_column($this->table, 'milo_store_region');
       //$this->dbforge->drop_column($this->table, 'milo_store_distributor');
       //$this->dbforge->drop_column($this->table, 'milo_store_agency');
    }
}