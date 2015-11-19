<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * App_menu Class
 *
 * This class manages the menu object
 *
 * @package		App_menu
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014, Randy Nivales
 * @link		
 */
class App_menu {
	
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{
		$this->CI =& get_instance();

		// $this->ci =& get_instance();
		// $this->ci->load->model('settings/menu_model');

		log_message('debug', "App_menu Class Initialized");
	}
	
	/**
	 * Generate menu
	 *
	 * @access	public
	 * @return	string
	 */		
	function show()
	{
		// turn on db caching
		// $this->CI->db->cache_on();
		
		// $menus = $this->ci->menu_model->where('menu_active', 1)->where('menu_deleted !=', 1)->order_by('menu_order')->find_all();
		
		if (! $menus = $this->CI->cache->get('app-menu'))
		{
			$menus = $this->CI->db->where('menu_active', 1)->where('menu_deleted !=', 1)
			->order_by('menu_order')->get('menu')->result();
			$this->CI->cache->write($menus, 'app-menu');
		}

		// pr($menus); exit;
		$navs = array();
		$subnavs = array();
		foreach ($menus as $menu)
		{
			if ($menu->menu_parent_id)
			{
				$active = $this->_check_active($menu, TRUE); 
				$subnavs[] = array(
					'menu_id'			=> $menu->menu_id,
					'menu_text'			=> $menu->menu_text,
					'menu_link'			=> $menu->menu_link,
					'menu_permission'	=> $menu->menu_permission,
					'menu_icon'			=> $menu->menu_icon,
					'menu_active'		=> $active,
					'menu_parent_id'	=> $menu->menu_parent_id,
				);
			}
			else
			{
				$active = $this->_check_active($menu); 
				$navs[$menu->menu_id] = array(
					'menu_id'			=> $menu->menu_id,
					'menu_text'			=> $menu->menu_text,
					'menu_link'			=> $menu->menu_link,
					'menu_permission'	=> $menu->menu_permission,
					'menu_icon'			=> $menu->menu_icon,
					'menu_active'		=> $active,
				);
			}
		}

		// pr($subnavs);
		foreach ($subnavs as $subnav)
		{
			// if ($subnav)
			// $active = $this->_check_active($subnav['menu_link']);
			$navs[$subnav['menu_parent_id']]['menu_child'][] = array(
				'menu_id'			=> $subnav['menu_id'],
				'menu_text'			=> $subnav['menu_text'],
				'menu_link'			=> $subnav['menu_link'],
				'menu_permission'	=> $subnav['menu_permission'],
				'menu_icon'			=> $subnav['menu_icon'],
				'menu_active'		=> $subnav['menu_active'],
			);
		}
		// echo phpinfo();
		// pr($navs);

		$html = '<ul class="sidebar-menu">' . PHP_EOL;
		foreach ($navs as $nav)
		{
			// log_message('debug', print_r($nav['menu_permission']));
			// log_message('debug', print_r($this->CI->acl->restrict($nav['menu_permission'])));
			if (isset($nav['menu_permission']) && ($this->CI->acl->restrict($nav['menu_permission'], 'return')))
			{
				$treeview = (isset($nav['menu_child'])) ? 'treeview' : '';
				$active = ($nav['menu_active'] == 1) ? 'active' : '';
				$arrow1 = ($nav['menu_active'] == 1) ? '<span class="arrow-left"></span>' : '';
				$html .= '<li class="'. $treeview . ' ' . $active . '"">' . PHP_EOL;
				$html .= '	<a href="' . site_url($nav['menu_link']) . '"><i class="text-center ' . $nav['menu_icon'] . '"></i>';
				$html .= ' <span>' . $nav['menu_text'] . '</span>' . PHP_EOL;
				$html .= (isset($nav['menu_child'])) ? '<i class="fa fa-angle-left pull-right"></i>' : '<small class="badge pull-right bg-red" id="menu-' . $nav['menu_id'] . '"></small>';
				$html .= '</a>' . PHP_EOL;
			}			

			if (isset($nav['menu_child']))
			{
				$html .= '<ul class="treeview-menu">' . PHP_EOL;

				foreach ($nav['menu_child'] as $child)
				{
					if ($this->CI->acl->restrict($child['menu_permission'], 'return'))
					{
						$active = ($child['menu_active'] == 1) ? 'active' : '';
						$arrow2 = ($child['menu_active'] == 1) ? '<span class="arrow-left"></span>' : '';
						$html .= '<li class="'.$active.'">' . PHP_EOL;
						$html .= '	<a href="' . site_url($child['menu_link']) . '"><i class="text-center ' . $child['menu_icon'] . '"></i>';
						$html .= ' <span>' . $child['menu_text'] . '</span></a>' . PHP_EOL;
						$html .= $arrow2 . '</li>' . PHP_EOL;
					}
				}

				$html .= '</ul>';
			}
			if (isset($nav['menu_permission']) && ($this->CI->acl->restrict($nav['menu_permission'], 'return')))
			{
				$arrow1 = ($treeview) ? '' : $arrow1;
				$html .= $arrow1 . '</li>' . PHP_EOL;
			}
		}
		$html .= '</ul>' . PHP_EOL;


		// turn off db caching
		// $this->CI->db->cache_off();


		return $html;
	}

	private function _check_active($menu, $subnav = FALSE)
	{
		// pr($menu);
		// pr($menu->menu_parent_id);
		$menu_segments = explode('/', $menu->menu_link);
		// pr($menu_segments);
		// $segment_count = count($segment);

		$uri_segments = explode('/', $this->CI->uri->uri_string());
		// pr($uri_segments);

		// for other functions
		if (isset($menu_segments[2]) && isset($uri_segments[2]))
		{
			if ($menu_segments[2] == $uri_segments[2])
			{
				return 1;
			}
		}
		else if (isset($menu_segments[1]) && isset($uri_segments[1]))
		{
			if ($menu_segments[1] == $uri_segments[1])
			{
				return 1;
			}
		}

		// for module index
		else if (isset($menu_segments[0]) && !isset($menu_segments[1]))
		{
			if ($menu_segments[0] == $uri_segments[0])
			{
				// exception for same module name and controller name
				// return ($menu->menu_parent_id) ? 0 : 1;
				if ($menu->menu_parent_id)
				{
					return (isset($uri_segments[1])) ? 0 : 1;
				}
				else
				{
					return 1;
				}
			}
		}

		// for base url
		else if (!isset($menu_segments[0]) && !isset($uri_segments[0]))
		{
			return 1;
		}



		return 0;
	}

}

/* End of file App_menu.php */
/* Location: ./application/libraries/App_menu.php */
