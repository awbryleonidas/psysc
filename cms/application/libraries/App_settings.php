<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * App_settings Class
 *
 * This class loads the settings from config database
 *
 * @package		App_settings
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014, Randy Nivales
 * @link		
 */
class App_settings {
	
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{	
		$this->CI =& get_instance();

		// check if configs table exists
		if ($this->CI->db->table_exists('configs'))
		{

			// check cache first
			if (! $appconfigs = $this->CI->cache->get('app-config'))
			{
				// if not in cache, get configs from the database
				$result = $this->CI->db->select('config_id, config_name, config_value')->get('configs');
				
				if ($appconfigs = $result->result())
				{
					// then save to cache
					$this->CI->cache->write($appconfigs, 'app-config');
				}
				
			}

			// assemble the config data
			$settings = array();
			foreach ($appconfigs as $appconfig)
			{
				$this->CI->config->set_item($appconfig->config_name, $appconfig->config_value);
			}
			log_message('debug', "App_settings Class Initialized");
		}
	}
}

/* End of file App_settings.php */
/* Location: ./application/libraries/App_settings.php */