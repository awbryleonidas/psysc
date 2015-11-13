<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migrate Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Migrate extends CI_Controller 
{
	/**
	 * Constructor
	 *
	 * @access	public
	 *
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->library('migration');
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function index()
	{
		if (! $this->migration->current()) 
		{
			show_error($this->migration->error_string());
		}
		else 
		{
			echo 'Done';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * rollback
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function rollback($version = FALSE)
	{
		if (! $version) show_404();

		if (! $this->migration->version($version)) 
		{
			show_error($this->migration->error_string());
		}
		else 
		{
			echo 'Done';
		}
	}
}