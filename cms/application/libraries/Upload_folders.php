<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Upload_folders Class
 *
 * This class manages the menu object
 *
 * @package		Upload_folders
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2015, Randy Nivales
 * @link		
 */
class Upload_folders {

	/**
	* Constructor
	*
	* @access	public
	*
	*/
	public function __construct()
	{
		// $this->CI =& get_instance();

		log_message('debug', "Upload_folders Class Initialized");
	}
	
	/**
	 * Get the current upload folder
	 *
	 * @access	public
	 * @return	string
	 */		
	function get()
	{
		$upload_path = 'assets/uploads/';

		$year = date("Y");   
		$month = date("m");   
		
		$year_folder = FCPATH . $upload_path . $year;   
		$month_folder = FCPATH . $upload_path . $year . "/" . $month;

		if (file_exists($year_folder))
		{
			if (file_exists($month_folder) == FALSE)
			{
				mkdir($month_folder, 0777);
			}
		}
		else
		{
			mkdir($year_folder, 0777);
			mkdir($month_folder, 0777);
		}

		return $upload_path . $year . "/" . $month;
	}

	function testing()
	{
		return 'test';
	}

}

/* End of file Upload_folders.php */
/* Location: ./application/libraries/Upload_folders.php */