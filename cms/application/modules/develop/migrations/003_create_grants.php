<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migration Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Migration_Create_grants extends CI_Migration 
{
	var $table = 'grants';

	function __construct()
	{
		parent::__construct();

		$this->load->model('migrations_model');
	}
	
	public function up()
	{
		$fields = array(
			'grant_id' 				=> array('type' => 'MEDIUMINT', 'unsigned' => TRUE, 'auto_increment' => TRUE, 'null' => FALSE),
			'grant_group_id' 		=> array('type' => 'SMALLINT', 'unsigned' => TRUE, 'null' => FALSE),
			'grant_permission_id' 	=> array('type' => 'SMALLINT', 'unsigned' => TRUE, 'null' => FALSE),
			'grant_access' 			=> array('type' => 'TINYINT', 'unsigned' => TRUE, 'null' => FALSE),
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('grant_id', TRUE);
		$this->dbforge->add_key('grant_group_id');
		$this->dbforge->add_key('grant_permission_id');
		$this->dbforge->add_key('grant_access');
		$this->dbforge->create_table($this->table, TRUE);

		// insert default grants for admin
		$permissions = $this->db->get('permissions')->result();
		foreach ($permissions as $permission)
		{
			$this->db->insert('grants', array(
				'grant_group_id' 		=> 1,
				'grant_permission_id' 	=> $permission->permission_id, 
				'grant_access' 			=> 1
			));
		}
	}

	public function down()
	{
		// drop the table
		$this->dbforge->drop_table($this->table);
	}
}