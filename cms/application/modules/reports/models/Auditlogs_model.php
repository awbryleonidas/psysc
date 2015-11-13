<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auditlogs_model Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Auditlogs_model extends BF_Model 
{

	protected $table_name			= 'auditlogs';
	protected $key					= 'auditlog_id';
	protected $date_format			= 'datetime';
	protected $log_user				= TRUE;

	protected $set_created			= TRUE;
	protected $created_field		= 'auditlog_created_on';
	protected $created_by_field		= 'auditlog_created_by';

	protected $set_modified			= FALSE;

	protected $soft_deletes			= TRUE;
	protected $deleted_field		= 'auditlog_deleted';
	protected $deleted_by_field		= 'auditlog_deleted_by';

	public function get_datatables()
	{
		$fields = array(
			'auditlog_id', 
			'auditlog_action', 
			'CONCAT(first_name, " ", last_name)', 
			'auditlog_user_ip', 
			'auditlog_created_on'
		);

		return $this->join('users', 'id = auditlog_created_by', 'LEFT')->datatables($fields);
	}
}