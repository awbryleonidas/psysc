<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Page Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		
 */
class Page extends CI_Controller 
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
		// page title
		$data['page_title'] = 'Home';
		
		// template
		$this->template->add_css(module_css('page', 'page_index'));
		$this->template->add_js(module_js('page', 'page_index'));
		$this->template->write_view('content', 'page_index', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * about
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function about()
	{
		// page title
		$data['page_title'] = 'About';
		
		// template
		$this->template->write_view('content', 'page_about', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * contact
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function contact()
	{
		// page title
		$data['page_title'] = 'Contact';
		
		// template
		$this->template->write_view('content', 'page_contact', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * carousel
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function carousel()
	{
		// page title
		$data['page_title'] = 'Carousel';
		
		// template
		$this->template->add_css(module_css('page', 'page_carousel'));
		$this->template->write_view('content', 'page_carousel', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * parallax
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function parallax()
	{
		// page title
		$data['page_title'] = 'Parallax';
		
		// template
		$this->template->add_js('assets/plugins/jquery.parallax/jquery.localscroll-1.2.7-min.js');
		$this->template->add_js('assets/plugins/jquery.parallax/jquery.scrollTo-1.4.2-min.js');
		$this->template->add_js('assets/plugins/jquery.parallax/jquery.parallax-1.1.3.js');

		$this->template->add_css(module_css('page', 'page_parallax'));
		$this->template->add_js(module_js('page', 'page_parallax'));
		$this->template->write_view('content', 'page_parallax', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * terms
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function terms()
	{
		// page title
		$data['page_title'] = 'Terms and Conditions';
		
		$this->load->view('page_terms', $data);
	}

}

/* End of file Page.php */
/* Location: ./application/modules/page/controllers/Page.php */