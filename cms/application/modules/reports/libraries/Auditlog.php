<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auditlog Class
 *
 * This class manages the permission object
 *
 * @package		Auditlog
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014, Randy Nivales
 * @link		
 */

class Auditlog
{

	public function __construct()
	{
		$this->CI =& get_instance();
		
		// $this->CI->load->model('audittrail/audittrail_model');
		$this->CI->load->database();
	}

	public function insert($table, $table_id, $action, $message, $old = FALSE, $new = FALSE, $user_id = FALSE)
	{
		$old_data = ($old) ? json_encode($old) : FALSE;
		$new_data = ($new) ? json_encode($new) : FALSE;
		if (!$user_id) $user_id = $this->CI->session->userdata('user_id');

		$data = array(
			'audittrail_table'			=> $table,
			'audittrail_table_id'		=> $table_id,
			'audittrail_action'			=> $action,
			'audittrail_message'		=> $message,
			'audittrail_old'			=> $old_data,
			'audittrail_new'			=> $new_data,
			'audittrail_ip'				=> $this->CI->session->userdata('ip_address'),
			'audittrail_user_agent'		=> $this->CI->session->userdata('user_agent'),
			'audittrail_user_id'		=> $user_id,
		);

		$this->CI->db->insert('audittrail', $data);
		// $this->CI->audittrail_model->insert($data);
	}
}

/* End of file Auditlog.php */
/* Location: ./application/modules/admin/libraries/Auditlog.php */