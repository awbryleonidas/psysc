<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Builder Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Builder extends MX_Controller 
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
		$this->load->config('config');
		$this->load->language('builder');
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
		$this->acl->restrict('develop.builder.list');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('develop'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('develop/builder'));

		// get the modules
		$data['modules'] = controller_list();

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

		$this->template->add_css(module_css('develop', 'builder_index'));
		// $this->template->add_js(module_js('settings', 'menus_index'));
		$this->template->write_view('content', 'builder_index', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * add
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function add()
	{
		$this->acl->restrict('develop.builder.add');

		$data['page_heading'] = lang('add_module_heading');
		$data['page_subhead'] = lang('add_module_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('develop'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('develop/builder'));
		$this->breadcrumbs->push(lang('add_module_heading'), site_url('develop/builder/add/module'));

		if ($this->input->post('submit'))
		{
			if ($this->_save_module())
			{
				$this->session->set_flashdata('flash_message', lang('add_module_success'));
				redirect('develop/builder', 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');
			}
		}

		// get the current user to be used for copyright info
		$data['user'] = $this->ion_auth->user()->row();

		// get the modules
		$controllers = controller_list();
		$modules = array('none' => 'New Module');
		foreach ($controllers as $module => $controller)
		{
			$modules[$module] = $module;
		}
		$data['modules'] = $modules;

		$this->template->add_css(module_css('develop', 'builder_add_module'));
		$this->template->add_js(module_js('develop', 'builder_add_module'));
		$this->template->write_view('content', 'builder_add_module', $data);
		$this->template->render();
	}

	

	// --------------------------------------------------------------------

	/**
	 * _create_folders
	 *
	 * @access	private
	 * @param	string $module_path
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _create_folders($module_path)
	{
		// TODO: add error checking

		mkdir($module_path, 0755, TRUE);
		mkdir($module_path . '/config', 0755, TRUE);
		mkdir($module_path . '/controllers', 0755, TRUE);
		mkdir($module_path . '/language', 0755, TRUE);
		mkdir($module_path . '/language/english', 0755, TRUE);
		mkdir($module_path . '/migrations', 0755, TRUE);
		mkdir($module_path . '/models', 0755, TRUE);
		mkdir($module_path . '/views', 0755, TRUE);
		mkdir($module_path . '/views/css', 0755, TRUE);
		mkdir($module_path . '/views/js', 0755, TRUE);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * _copy_files
	 *
	 * @access	private
	 * @param	array $module
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _copy_files($module)
	{
		// module name
		$module_name = ($module['parent_module'] == 'none') ? $module['lc_plural_module_name'] : $module['parent_module'];

		if ($module['parent_module'] == 'none')
		{
			// copy migration config
			$string = read_file($this->config->item('tpl_migration'));
			write_file(APPPATH . 'modules/' . $module_name . '/config/migration.php', $string);
		}

		// copy the controller
		$string = read_file($this->config->item('tpl_controller'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/controllers/' . $module['ucf_plural_module_name'] . '.php', $string);


		// copy the language file
		$string = read_file($this->config->item('tpl_language'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/language/english/' . $module['lc_plural_module_name'] . '_lang.php', $string);


		if ($module['parent_module'] == 'none')
		{
			// copy the migration files
			$string = read_file($this->config->item('tpl_migration1'));
			$string = $this->_replace_vars($string, $module);
			// $string = $this->_add_fields($string, $module);
			write_file(APPPATH . 'modules/' . $module_name . '/migrations/001_rollback_' . $module['lc_plural_module_name'] . '.php', $string);

			$string = read_file($this->config->item('tpl_migration2'));
			$string = $this->_replace_vars($string, $module);
			$string = $this->_add_fields($string, $module);
			write_file(APPPATH . 'modules/' . $module_name . '/migrations/002_create_' . $module['lc_plural_module_name'] . '.php', $string);
		}
		else
		{
			// get the next migration version
			$migrations = $this->migration->display_all_migrations();
			$current_version = count($migrations[$module_name]);
			$new_version = $current_version + 1;
			$ver_with_zero = str_pad($new_version, 3, '0', STR_PAD_LEFT);

			// copy the migration file
			$string = read_file($this->config->item('tpl_migration2'));
			$string = $this->_replace_vars($string, $module);
			$string = $this->_add_fields($string, $module);
			write_file(APPPATH . 'modules/' . $module_name . '/migrations/' . $ver_with_zero . '_create_' . $module['lc_plural_module_name'] . '.php', $string);

			// update the migration version in the config file
			$string = read_file($this->config->item('tpl_migration'));
			$file = APPPATH . 'modules/' . $module_name . '/config/migration.php';
			// $string = read_file($file);
			unlink($file);
			$string = str_replace("= 2", "= $new_version", $string); 
			write_file($file, $string);
		}


		// copy the model
		$string = read_file($this->config->item('tpl_model'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/models/' . $module['ucf_plural_module_name'] . '_model.php', $string);

		// copy the view files
		$string = read_file($this->config->item('tpl_html_index'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/' . $module['lc_plural_module_name'] . '_index.php', $string);

		$string = read_file($this->config->item('tpl_html_form'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/' . $module['lc_plural_module_name'] . '_form.php', $string);

		$string = read_file($this->config->item('tpl_css_index'));
		// $string = $this->_replace_vars($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/css/' . $module['lc_plural_module_name'] . '_index.css', $string);

		$string = read_file($this->config->item('tpl_css_form'));
		// $string = $this->_replace_vars($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/css/' . $module['lc_plural_module_name'] . '_form.css', $string);

		$string = read_file($this->config->item('tpl_js_index'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/js/' . $module['lc_plural_module_name'] . '_index.js', $string);

		$string = read_file($this->config->item('tpl_js_form'));
		$string = $this->_replace_vars($string, $module);
		$string = $this->_add_fields($string, $module);
		write_file(APPPATH . 'modules/' . $module_name . '/views/js/' . $module['lc_plural_module_name'] . '_form.js', $string);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * _module_names
	 *
	 * @access	private
	 * @param	string $string
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _module_names()
	{
		$lc_plural_module_name = url_title($this->input->post('module_name_plural'), '_', TRUE);
		$lc_singular_module_name = url_title($this->input->post('module_name_singular'), '_', TRUE);

		$data = array(
			'parent_module' => $this->input->post('parent_module'),
			'lc_plural_module_name' => $lc_plural_module_name,
			'lc_singular_module_name' => $lc_singular_module_name,
			'ucf_plural_module_name' => ucfirst($lc_plural_module_name),
			'ucf_singular_module_name' => ucfirst($lc_singular_module_name)
		);

		return $data;
	}

	// --------------------------------------------------------------------

	/**
	 * _replace_names
	 *
	 * @access	private
	 * @param	string $string
	 * @param	array $module
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _replace_vars($string, $module)
	{
		// replace parent module
		$parent_module = ($module['parent_module'] == 'none') ? $module['lc_plural_module_name'] : $module['parent_module'];
		$string = str_replace("{{parent_module}}", $parent_module, $string);

		// replace module names
		$string = str_replace("{{lc_plural_module_name}}", $module['lc_plural_module_name'], $string); // eg. contacts
		$string = str_replace("{{lc_singular_module_name}}", $module['lc_singular_module_name'], $string); // eg. contact
		$string = str_replace("{{ucf_plural_module_name}}", $module['ucf_plural_module_name'], $string); // eg. Contacts
		$string = str_replace("{{ucf_singular_module_name}}", $module['ucf_singular_module_name'], $string); // eg. Contact

		// replace module info
		$string = str_replace("{{module_version}}", $this->input->post('module_version'), $string); // module version
		$string = str_replace("{{package_name}}", $this->input->post('package_name'), $string); // package name

		// replace author and copyright
		$string = str_replace("{{author_name}}", $this->input->post('author_name'), $string); // author name
		$string = str_replace("{{author_email}}", $this->input->post('author_email'), $string); // author email
		$string = str_replace("{{copyright_year}}", $this->input->post('copyright_year'), $string); // copyright year
		$string = str_replace("{{copyright_name}}", $this->input->post('copyright_name'), $string); // copyright name
		$string = str_replace("{{copyright_link}}", $this->input->post('copyright_link'), $string); // copyright link

		// replace icon and order
		$string = str_replace("{{module_icon}}", $this->input->post('module_icon'), $string);
		$string = str_replace("{{module_order}}", $this->input->post('module_order'), $string);

		return $string;
	}

	// --------------------------------------------------------------------

	/**
	 * _add_fields
	 *
	 * @access	private
	 * @param	string $string
	 * @param	array $module
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _add_fields($string, $module)
	{
		// get the post data
		$column_names = $this->input->post('column_name');
		$column_types = $this->input->post('column_type');
		$column_length = $this->input->post('column_length');
		$form_types = $this->input->post('form_type');
		$column_unsigned = $this->input->post('column_unsigned');
		$column_null = $this->input->post('column_null');
		$column_index = $this->input->post('column_index');

		// set the initial values
		$controller_form_errors = '';
		$controller_form_validations = '';
		$controller_form_fields = '';
		$lang_form_labels = '';
		$lang_table_heads = '';
		$migration_table_fields = '';
		$migration_table_keys = '';
		$model_table_fields = '';
		$view_table_heads = '';
		$view_column_count = 6;
		$view_action_col = 1;
		$view_form_fields = '';
		$view_form_markups = '';

		$key = 0;

		$no_constraints = array('DATE', 'DATETIME', 'TEXTAREA');
		$integers = array('INT', 'MEDIUMINT', 'SMALLINT', 'TINYINT');

		foreach ($column_names as $column_name)
		{
			// skip the primary key
			// if ($column_name == 'id') continue;

			// lowercase the column name
			$column_name = strtolower($column_name);

			// add column name prefix
			$col_name = "{$module['lc_singular_module_name']}_{$column_name}";

			// controller
			$controller_form_errors .= "\t\t\t\t\t'{$col_name}'\t\t=> form_error('{$col_name}'),\n";
			$controller_form_validations .= "\t\t\$this->form_validation->set_rules('{$col_name}', lang('{$col_name}'), 'required');\n";
			$controller_form_fields .= "\t\t\t'{$col_name}'\t\t=> \$this->input->post('{$col_name}'),\n";

			// language
			$col_value = ucwords(str_replace('_', ' ', $column_name));
			$lang_form_labels .= "\$lang['{$col_name}']\t\t\t= '{$col_value}';\n";
			$lang_table_heads .= "\$lang['index_{$column_name}']\t\t\t= '{$col_value}';\n";

			// migration fields
			$migration_table_fields .= "\t\t\t'{$col_name}'\t\t=> array('type' => '{$column_types[$key]}',";
			if ($column_length[$key] && !in_array($column_types[$key], $no_constraints)) $migration_table_fields .= " 'constraint' => {$column_length[$key]},";
			if ($column_unsigned[$key] == 'Unsigned' && in_array($column_types[$key], $integers)) $migration_table_fields .= " 'unsigned' => TRUE,";
			$migration_table_fields .= ($column_null[$key] == 'Null') ? " 'null' => TRUE),\n" : " 'null' => FALSE),\n";

			// migration keys
			if ($column_index[$key] == 'Index') $migration_table_keys .= "\t\t\$this->dbforge->add_key('{$col_name}');\n";

			// model
			$model_table_fields .= "\t\t\t'{$col_name}',\n";

			// view
			$view_table_heads .= "\t\t\t\t\t<th><?php echo lang('index_{$column_name}'); ?></th>\n";
			if ($form_types[$key] == 'CHECKBOX') $value = "\$('#{$col_name}').is(':checked') ? 1 : 0";
			else if ($form_types[$key] == 'RADIO') $value = "\$('.{$col_name}:checked').val()";
			else $value = "\$('#{$col_name}').val()";
			$view_form_fields .= "\t\t\t{$col_name}: $value,\n";
			

			// form markups
			switch ($form_types[$key])
			{
				case 'SELECT': $view_form_markups .= $this->_add_form_markup($col_name, 'select'); break;
				case 'TEXTAREA': $view_form_markups .= $this->_add_form_markup($col_name, 'textarea'); break;
				case 'CHECKBOX': $view_form_markups .= $this->_add_form_markup($col_name, 'checkbox'); break;
				case 'RADIO': $view_form_markups .= $this->_add_form_markup($col_name, 'radio'); break;
				default: $view_form_markups .= $this->_add_form_markup($col_name, 'input'); break;
			}
			
			// increment the array key
			$key++;
		}

		$view_column_count += $key;
		$view_action_col = $view_column_count - 1;

		// replace the variables in the templates
		$string = str_replace("{{controller_form_errors}}", $controller_form_errors, $string);
		$string = str_replace("{{controller_form_validations}}", $controller_form_validations, $string);
		$string = str_replace("{{controller_form_fields}}", $controller_form_fields, $string);
		$string = str_replace("{{lang_form_labels}}", $lang_form_labels, $string);
		$string = str_replace("{{lang_table_heads}}", $lang_table_heads, $string);
		$string = str_replace("{{migration_table_fields}}", $migration_table_fields, $string);
		$string = str_replace("{{migration_table_keys}}", $migration_table_keys, $string);
		$string = str_replace("{{model_table_fields}}", $model_table_fields, $string);
		$string = str_replace("{{view_table_heads}}", $view_table_heads, $string);
		$string = str_replace("{{view_column_count}}", $view_column_count, $string);
		$string = str_replace("{{view_action_col}}", $view_action_col, $string);
		$string = str_replace("{{view_form_fields}}", $view_form_fields, $string);
		$string = str_replace("{{view_form_markups}}", $view_form_markups, $string);

		return $string;
	}

	// --------------------------------------------------------------------

	/**
	 * _add_form_markup
	 *
	 * @access	private
	 * @param	string $form_name
	 * @param	string $type
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _add_form_markup($form_name, $type = 'input')
	{

		$string = read_file($this->config->item('tpl_html_' . $type));
		$string = str_replace("{{form_name}}", $form_name, $string);

		return $string;
	}

	// --------------------------------------------------------------------

	/**
	 * _module_check
	 *
	 * @access	private
	 * @param	string $str
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function _module_check($str)
	{
		$modules_path = APPPATH . 'modules/';
		$module_name = url_title($str, '_', TRUE);

		if (is_dir($modules_path . $module_name))
		{
			$this->form_validation->set_message('_module_check', lang('add_module_exists'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _save_module
	 *
	 * @access	private
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _save_module()
	{
		// validate inputs
		$this->form_validation->set_rules('module_name_plural', lang('module_name_plural'), 'required|callback__module_check');
		$this->form_validation->set_rules('module_name_singular', lang('module_name_singular'), 'required');
		$this->form_validation->set_rules('module_version', lang('module_version'), 'required|numeric');
		$this->form_validation->set_rules('package_name', lang('package_name'), 'required|max_length[100]');
		$this->form_validation->set_rules('author_name', lang('author_name'), 'required|max_length[100]');
		$this->form_validation->set_rules('author_email', lang('author_email'), 'required|valid_email');
		$this->form_validation->set_rules('copyright_year', lang('copyright_year'), 'required|exact_length[4]|is_natural_no_zero');
		$this->form_validation->set_rules('copyright_name', lang('copyright_name'), 'required|max_length[100]');
		$this->form_validation->set_rules('copyright_link', lang('copyright_link'), 'required|max_length[255]');

		$this->form_validation->set_rules('column_name[]', lang('column_name'), 'required');
		$this->form_validation->set_rules('column_type[]', lang('column_type'), 'required');
		$this->form_validation->set_rules('column_length[]', lang('column_length'), 'min_length[1]');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			// $this->session->set_flashdata('flash_error', lang('validation_error'));
			return FALSE;
		}
	
		// set the path
		$modules_path = APPPATH . 'modules/';
		$module = $this->_module_names();

		// create the folders
		if ($module['parent_module'] == 'none')
		{
			if (! $this->_create_folders($modules_path . $module['lc_plural_module_name']))
			{
				$this->session->set_flashdata('flash_error', 'Unable to create the directories');
				return FALSE;
			}
		}

		// copy the files
		if (! $this->_copy_files($module))
		{
			$this->session->set_flashdata('flash_error', 'Unable to create the directories');
			return FALSE;
		}

		return TRUE;
	}
}

/* End of file Migrations.php */
/* Location: ./application/modules/develop/controllers/Migrations.php */