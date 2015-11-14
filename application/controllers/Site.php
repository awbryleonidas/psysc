<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migrate Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		che leonidas <che.leonidas@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, che leonidas
 * @link		che.leonidas@gmail.com
 */
class Site extends CI_Controller 
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
	}
	
	// --------------------------------------------------------------------

	/**
	 * index
	 *
	 * @access	public
	 * @param	none
	 * @author 	che leonidas <che.leonidas@gmail.com>
	 */
	public function index()
	{
		$this->load->view('site_template');
	}

	// --------------------------------------------------------------------

	/**
	 * rollback
	 *
	 * @access	public
	 * @param	none
	 * @author 	che leonidas <che.leonidas@gmail.com>
	 */
}