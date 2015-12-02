<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package
 * @version		1.0
 * @author 		Aubrey Leonidas <che.leonidas@gmail.com>
 */
class Migration_Create_feedback extends CI_Migration
{
	var $table = 'feedbacks';

	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}

	public function up()
	{
		$this->dbforge->add_field("feedback_id int(10) unsigned NOT NULL AUTO_INCREMENT");
		$this->dbforge->add_field("feedback_name varchar(100) DEFAULT NULL");
		$this->dbforge->add_field("feedback_email varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("feedback_subject varchar(255) DEFAULT NULL");
		$this->dbforge->add_field("feedback_message text DEFAULT NULL");

		$this->dbforge->add_field("feedback_created_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("feedback_created_on datetime NOT NULL");
		$this->dbforge->add_field("feedback_modified_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("feedback_modified_on datetime NOT NULL");
		$this->dbforge->add_field("feedback_deleted tinyint(1) NOT NULL");
		$this->dbforge->add_field("feedback_deleted_by smallint(5) unsigned NOT NULL");
		$this->dbforge->add_field("feedback_deleted_on datetime NOT NULL");

		$this->dbforge->add_key('feedback_id', TRUE);
		$this->dbforge->add_key('feedback_deleted');
		$this->dbforge->create_table($this->table, TRUE);
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);

	}
}