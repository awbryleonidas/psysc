<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * App_menu Class
 *
 * @package		Codifire
 * @version		1.2
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
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
		$this->CI->load->driver('cache', $this->CI->config->item('cache_drivers'));

		log_message('debug', "App_menu Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * show
	 *
	 * Generates the navigation menu
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function show()
	{
		if (! $menus = $this->CI->cache->get('app_menu'))
		{
			$menus = $this->CI->db->where('menu_active', 1)->where('menu_deleted', 0)
				->order_by('menu_order')->get('menus')->result();

			$this->CI->cache->save('app_menu', $menus, 86400); // 1 day
		}

		// pr($menus); exit;
		$navs = array();
		$subnavs = array();
		
		foreach ($menus as $menu)
		{
			if ($menu->menu_parent > 0)
			{
				$active = $this->_check_active($menus, $menu); 
				$subnavs[] = array(
					'menu_id'			=> $menu->menu_id,
					'menu_text'			=> $menu->menu_text,
					'menu_link'			=> $menu->menu_link,
					'menu_perm'			=> $menu->menu_perm,
					'menu_icon'			=> $menu->menu_icon,
					'menu_active'		=> $active,
					'menu_parent'		=> $menu->menu_parent,
				);
			}
			else
			{
				$active = $this->_check_active($menus, $menu, TRUE); 
				$navs[$menu->menu_id] = array(
					'menu_id'			=> $menu->menu_id,
					'menu_text'			=> $menu->menu_text,
					'menu_link'			=> $menu->menu_link,
					'menu_perm'			=> $menu->menu_perm,
					'menu_icon'			=> $menu->menu_icon,
					'menu_active'		=> $active,
				);
			}
		}


		foreach ($subnavs as $subnav)
		{
			$navs[$subnav['menu_parent']]['menu_child'][] = array(
				'menu_id'			=> $subnav['menu_id'],
				'menu_text'			=> $subnav['menu_text'],
				'menu_link'			=> $subnav['menu_link'],
				'menu_perm'			=> $subnav['menu_perm'],
				'menu_icon'			=> $subnav['menu_icon'],
				'menu_active'		=> $subnav['menu_active'],
			);
		}


		$html = '<ul class="sidebar-menu">' . PHP_EOL;
		foreach ($navs as $nav)
		{
			// menu without child
			if (! isset($nav['menu_child']))
			{
				$treeview = (isset($nav['menu_child'])) ? 'treeview' : '';
				$active = ($nav['menu_active'] == 1) ? 'active' : '';
				$arrow1 = ($nav['menu_active'] == 1) ? '<span class="arrow-left"></span>' : '';
				$html .= '<li class="'. $treeview . ' ' . $active . '">' . PHP_EOL;
				$html .= '	<a href="' . site_url($nav['menu_link']) . '"><i class="text-center ' . $nav['menu_icon'] . '"></i>';
				$html .= ' <span>' . $nav['menu_text'] . '</span>' . PHP_EOL;
				$html .= (isset($nav['menu_child'])) ? '<i class="fa fa-angle-left pull-right"></i>' : '<small class="badge pull-right bg-red" id="menu-' . $nav['menu_id'] . '"></small>';
				$html .= '</a>' . PHP_EOL;
			}

			// menu with child
			if (isset($nav['menu_child']))
			{
				// parent menu
				$treeview = (isset($nav['menu_child'])) ? 'treeview' : '';
				$active = ($nav['menu_active'] == 1) ? 'active' : '';
				$arrow1 = ($nav['menu_active'] == 1) ? '<span class="arrow-left"></span>' : '';
				$html .= '<li class="'. $treeview . ' ' . $active . '">' . PHP_EOL;
				$html .= '	<a href="' . site_url($nav['menu_link']) . '"><i class="text-center ' . $nav['menu_icon'] . '"></i>';
				$html .= ' <span>' . $nav['menu_text'] . '</span>' . PHP_EOL;
				$html .= (isset($nav['menu_child'])) ? '<i class="fa fa-angle-left pull-right"></i>' : '<small class="badge pull-right bg-red" id="menu-' . $nav['menu_id'] . '"></small>';
				$html .= '</a>' . PHP_EOL;


				// child menu
				$html .= '<ul class="treeview-menu">' . PHP_EOL;

				foreach ($nav['menu_child'] as $child)
				{
					if ($this->CI->acl->restrict($child['menu_perm'], 'return'))
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
			if (isset($nav['menu_perm']) && ($this->CI->acl->restrict($nav['menu_perm'], 'return')))
			{
				$arrow1 = ($treeview) ? '' : $arrow1;
				$html .= $arrow1 . '</li>' . PHP_EOL;
			}
		}
		$html .= '</ul>' . PHP_EOL;

		return $html;
	}

	// --------------------------------------------------------------------

	/**
	 * _check_active
	 *
	 * Generates the navigation menu
	 *
	 * @access	private
	 * @param	object $menus
	 * @param	object $menu
	 * @param	integer $parent
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _check_active($menus, $menu, $parent = FALSE)
	{
		if ($parent && $this->_check_child($menus, $menu))
		{
			return TRUE;
		}
		else if (site_url($menu->menu_link) == current_url())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _check_child
	 *
	 * Generates the navigation menu
	 *
	 * @access	private
	 * @param	object $menus
	 * @param	integer $parent
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _check_child($menus, $parent)
	{
		$return = FALSE;

		foreach ($menus as $child)
		{
			// if this menu is a child of the parent menu
			if ($child->menu_parent == $parent->menu_id)
			{
				// check if this child is the active menu
				if (site_url($child->menu_link) == current_url())
				{
					$return = TRUE;
					break;
				}
			}
		}

		return $return;
	}

}

/* End of file App_menu.php */
/* Location: ./application/libraries/App_menu.php */