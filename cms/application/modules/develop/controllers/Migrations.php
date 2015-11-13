<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Migrations Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Migrations extends MX_Controller 
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
		// $this->load->model('menus_model');
		$this->load->language('migrations');
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
		$this->acl->restrict('develop.migrations.list');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('develop'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('develop/migrations'));
		
		// get all migration files
		$data['migrations'] = $this->migration->display_all_migrations();

		$data['core_migrations'] = array(
			'001_rollback_develop.php',
			'002_add_develop_menu.php',
			// '003_create_grants.php',
			'001_rollback_reports.php',
			// '002_create_auditlogs.php',
			'001_rollback_settings.php',
			'002_create_menus.php',
			// '003_create_configs.php',
			'001_rollback_users.php',
			'002_create_users.php',
			// '003_create_permissions.php'
		);
		// get the current versions
		$migrations = $this->db->get('migrations')->result();
		$versions = array();

		foreach ($migrations as $migration)
		{
			$versions[$migration->module] = $migration->version;
		}
		$data['versions'] = $versions;

		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.responsive.min.js');

		// $this->template->add_css(module_css('develop', 'menus_index'));
		$this->template->add_js(module_js('develop', 'migrations_index'));
		$this->template->write_view('content', 'migrations_index', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * rollback
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function rollback($module = FALSE, $version = 1)
	{
		if (! $module) show_404();

		$this->acl->restrict('develop.migrations.rollback', 'modal');

		$data['page_heading'] = lang('rollback_heading');
		$data['page_confirm'] = lang('rollback_confirm');
		$data['page_button'] = lang('button_rollback');

		if ($this->input->post())
		{
			if ($this->migration->init_module($module)) 
			{
				if (! $this->migration->version($version)) 
				{
					echo json_encode(array('success' => FALSE, 'message' => $this->migration->error_string())); exit;
				}
				else 
				{
					$this->cache->delete('app_menu');
					$this->session->set_flashdata('flash_message', lang('rollback_success'));
					echo json_encode(array('success' => TRUE)); exit;
				}
			}
			else
			{
				echo json_encode(array('success' => FALSE, 'message' => 'There was an error with the rollback.')); exit;
			}
		}

		$this->load->view('../../../views/confirm', $data);	
	}

	// --------------------------------------------------------------------

	/**
	 * migrate
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function migrate($module = FALSE)
	{
		if (! $module) show_404();

		$this->acl->restrict('develop.migrations.migrate', 'modal');

		$data['page_heading'] = lang('migrate_heading');
		$data['page_confirm'] = lang('migrate_confirm');
		$data['page_button'] = lang('button_migrate');

		if ($this->input->post())
		{
			if ($this->migration->init_module($module)) 
			{
				if (! $this->migration->current()) 
				{
					echo json_encode(array('success' => FALSE, 'message' => $this->migration->error_string())); exit;
				}
				else 
				{
					$this->cache->delete('app_menu');
					$this->session->set_flashdata('flash_message', lang('migrate_success'));
					echo json_encode(array('success' => TRUE)); exit;
				}
			}
			else
			{
				echo json_encode(array('success' => FALSE, 'message' => 'There was an error with the migration.')); exit;
			}
		}

		$this->load->view('../../../views/confirm', $data);	
	}
}

/* End of file Migrations.php */
/* Location: ./application/modules/develop/controllers/Migrations.php */