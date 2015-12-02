<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_subscribers extends CI_Migration
{
	var $table = 'subscribers';

	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}

	public function up()
	{
		$this->dbforge->add_field("subscriber_id int(10) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("subscriber_email varchar(255) DEFAULT NULL");

		$this->dbforge->add_field("subscriber_created_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("subscriber_created_on datetime NOT NULL");
		$this->dbforge->add_field("subscriber_modified_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("subscriber_modified_on datetime NOT NULL");
		$this->dbforge->add_field("subscriber_deleted tinyint(1) NOT NULL");
		$this->dbforge->add_field("subscriber_deleted_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("subscriber_deleted_on datetime NOT NULL");

		$this->dbforge->add_key('subscriber_id', TRUE);
		$this->dbforge->add_key('subscriber_deleted');
		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

	}
}