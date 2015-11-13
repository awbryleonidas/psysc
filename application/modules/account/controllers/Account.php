<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Account Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Account extends CI_Controller 
{
	/**
	 * Constructor
	 *
	 * @access	public
	 *
	 */
	public function __construct()
	{
		parent::__construct();
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
		if (!$this->ion_auth->logged_in())
		{
			redirect('user/login', 'refresh');
		}
		
		// page title
		$data['page_title'] = 'Account Dashboard';
		
		// template
		$this->template->write_view('content', 'account_index', $data);
		$this->template->render();
	}
}

/* End of file Account.php */
/* Location: ./application/modules/account/controllers/Account.php */