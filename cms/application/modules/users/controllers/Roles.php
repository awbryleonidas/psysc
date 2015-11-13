<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Roles Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Roles extends CI_Controller 
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

		$this->load->model('permissions_model');
		$this->load->model('grants_model');
		$this->load->model('groups_model');

		$this->load->language('roles');
		$this->load->language('ion_auth');
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
		$this->acl->restrict('users.roles.list');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/roles'));
		
		$this->session->set_userdata('redirect', current_url());
		
		// get all records
		// $data['records'] = $this->ion_auth->groups()->result();
		// render the page
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.responsive.min.js');
		
		$this->template->add_js(module_js('users', 'roles_index'));
		$this->template->write_view('content', 'roles_index', $data, FALSE);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * datatables
	 *
	 * @access	public
	 * @param	mixed datatables parameters (datatables.net)
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function datatables()
	{
		$this->acl->restrict('users.roles.list');
		$fields = array('id', 'name', 'description');
 
		echo $this->groups_model->datatables($fields);
	}

	// --------------------------------------------------------------------

	/**
	 * add
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function add()
	{
		$this->acl->restrict('users.roles.add', 'modal');
		$data['page_heading'] = lang('add_heading');
		// $data['page_subhead'] = lang('add_subhead');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			// pr($this->input->post()); exit;
			if ($this->_save('add'))
			{
				echo json_encode(array('success' => true, 'message' => lang('add_success'))); exit;
			}
			else
			{	 
				if ($this->ion_auth->errors())
				{
					$response['success'] = FALSE;
					$response['message'] = $this->ion_auth->errors();
					echo json_encode($response);
					exit;
				}
				else
				{
					$response['success'] = FALSE;
					$response['message'] = lang('validation_error');
					$response['errors'] = array(
						'group_name'			=> form_error('group_name'),
						'group_description'		=> form_error('group_description')
					);
					echo json_encode($response);
					exit;
				}
			}
		}

		$this->template->set_template('modal');
		$this->template->add_js(module_js('users', 'roles_form'));
		$this->template->write_view('content', 'roles_form', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * edit
	 *
	 * @access	public
	 * @param	integer $group_id
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function edit($group_id)
	{
		$this->acl->restrict('users.roles.edit', 'modal');

		$data['page_heading'] = lang('edit_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $group_id))
			{
				echo json_encode(array('success' => true, 'message' => lang('edit_success'))); exit;
			}
			else
			{	
				if ($this->ion_auth->errors())
				{
					$response['success'] = FALSE;
					$response['message'] = $this->ion_auth->errors();
					echo json_encode($response);
					exit;
				}
				else
				{
					$response['success'] = FALSE;
					$response['message'] = lang('validation_error');
					$response['errors'] = array(
						'group_name'			=> form_error('group_name'),
						'group_description'		=> form_error('group_description')
					);
					echo json_encode($response);
					exit;
				}
			}
		}

		$data['record'] = $this->ion_auth->group($group_id)->row();

		$this->template->set_template('modal');
		$this->template->add_js(module_js('users', 'roles_form'));
		$this->template->write_view('content', 'roles_form', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * delete
	 *
	 * @access	public
	 * @param	integer $id
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function delete($id)
	{
		$this->acl->restrict('users.roles.delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->groups_model->delete($id);

			echo json_encode(array('success' => true, 'message' => lang('delete_success'))); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}
	
	// --------------------------------------------------------------------

	/**
	 * permission
	 *
	 * @access	public
	 * @param	integer $group_id
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function permissions($group_id)
	{
		$this->acl->restrict('users.roles.edit');
		
		$data['page_heading'] = lang('permissions_heading');
		$data['page_subhead'] = lang('permissions_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/roles'));
		$this->breadcrumbs->push(lang('permissions_heading'), site_url('users/roles/permissions/'.$group_id));

		$this->session->set_userdata('redirect', current_url());
		
		// get the group info
		$data['group'] = $this->groups_model->find($group_id);

		
		if ($this->input->post('submit'))
		{
			// mark all permissions for this group as "deny"
			$this->grants_model->update_where('grant_id', $group_id, array('grant_access'=>0));
			
			// insert or update permission for this group
			$selected_permissions = $this->input->post('permission');
			//debug($selected_permissions);
			
			if ($selected_permissions)
			{
				foreach ($selected_permissions as $permission_key => $permission_id)
				{
					//debug($permission_id);
					// check if permission exists, then update
					$result = $this->grants_model->find_by(array('grant_id'=>$group_id, 'grant_permission_id'=>$permission_id));
					// pr($result);
					if ($result)
					{
						// update existing record
						$this->grants_model->update_where('grant_id', $result->grant_id, array('grant_access'=>1));
					}
					else
					{
						// insert the permission
						$this->grants_model->insert(array('grant_id'=>$group_id, 'grant_permission_id'=>$permission_id, 'grant_access'=>1));
					}
					// $this->db->cache_delete('users', 'groups');
				}
			}
			$this->session->set_flashdata('flash_message', lang('permissions_success'));
			redirect($this->session->userdata('redirect'), 'refresh');
		}
		
		// populate the permissions table
		// $this->acl->reconstruct($group_id);
		
		// build the permissions data
		$modules = controller_list(); // see common_helper.php
		ksort($modules);
		$permission_obj = $this->permissions_model->order_by('permission_name')->where('permission_active', 1)->find_all();
		$data['permissions'] = $permission_obj;

		$permissions = array_values_by_key($permission_obj, 'permission_id', 'permission_name');
		

		$module_perms = array();
		$js = '';
		foreach ($modules as $module => $mod_vals)
		{
			if ($mod_vals)
			{
				foreach ($mod_vals as $controller)
				{
					$controller_name = basename($controller['name'],".php");
					$search_key = strtolower($module).'.'.strtolower($controller_name);
					$controller_perms = in_array_search($search_key, $permissions);
					$module_perms[$module][$controller_name] = $controller_perms;

 					$js .= <<<EOT
$("#select-{$module}-{$controller_name}").change(function () { $('.{$module}-{$controller_name}').prop('checked', this.checked); });
$(".{$module}-{$controller_name}").change(function(){
    if($(".{$module}-{$controller_name}").length === $(".{$module}-{$controller_name}:checked").length) {
        $("#select-{$module}-{$controller_name}").prop("checked", "checked");
    } else {
        $("#select-{$module}-{$controller_name}").prop("checked", false);
    }
});
EOT;
				}
			}
		}

		$data['module_permissions'] = $module_perms;
		// pr($data); exit;

		
		// get the groups permission
		$grants = $this->grants_model->find_all_by(array('grant_group_id' => $group_id, 'grant_access !=' => 0));
		// $data['grants'] = array_values_by_key($grants_obj, FALSE, 'permission_id');
		$grp_prms = array();
		if ($grants)
		{
			foreach ($grants as $grant)
			{
				$grp_prms[$grant->grant_permission_id] = $grant->grant_access;
			}
		}
		$data['grants'] = $grp_prms;

		// list options
		$data['list_options'] = array('0'=>'Deny', '3'=>'Own', '2'=>'Group', '1'=>'All');
		$data['list_options_simple'] = array('0'=>'Deny', '1'=>'Allow');

		// view options
		$data['view_options'] = array('0'=>'Deny', '3'=>'Own', '2'=>'Group', '1'=>'Any');
		$data['view_options_simple'] = array('0'=>'Deny', '1'=>'Allow');

		// add option
		$data['add_options'] = array('0'=>'Deny', '1'=>'Allow');

		// edit options
		$data['edit_options'] = array('0'=>'Deny', '3'=>'Own', '2'=>'Group', '1'=>'Any');
		$data['edit_options_simple'] = array('0'=>'Deny', '1'=>'Allow');

		// delete options
		$data['delete_options'] = array('0'=>'Deny', '3'=>'Own', '2'=>'Group', '1'=>'Any');
		$data['delete_options_simple'] = array('0'=>'Deny', '1'=>'Allow');

		// other options
		$data['other_options'] = array('0'=>'Deny', '3'=>'Own', '2'=>'Group', '1'=>'Any');
		$data['other_options_simple'] = array('0'=>'Deny', '1'=>'Allow');

		// pr($data); exit;
		// log_message('debug', 'grants_obj ' . print_r($grants_obj, TRUE));
		log_message('debug', 'grants ' . print_r($data['grants'], TRUE));
		
		// render the page
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.responsive.min.js');
		
		$this->template->add_js($js, 'embed');
		
		$this->template->add_css('assets/styles/extra/extra.css?f=users/views/css/roles_permissions.css');
		$this->template->add_js('assets/scripts/extra/extra.js?f=users/views/js/roles_permissions.js');
		$this->template->write_view('content', 'roles_permissions', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * update_permission
	 *
	 * @access	public
	 * @param	integer $group_id
	 * @param	integer $permission_id
	 * @param	integer $permission_level
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function update_permission($group_id, $permission_id, $permission_level)
	{
		$this->acl->restrict('users.roles.edit');
		log_message('debug', $permission_level);

		if ($permission = $this->grants_model->find_by(array('grant_group_id' => $group_id, 'grant_permission_id' => $permission_id)))
		{
			$this->grants_model->update($permission->grant_id, array('grant_access' => $permission_level));

			$response['success'] = TRUE;
			echo json_encode($response);
			exit;
		}
		else
		{
			$data = array(
				'grant_group_id' 		=> $group_id,
				'grant_permission_id'	=> $permission_id,
				'grant_access'		=> $permission_level,
				// 'grant_deleted'		=> 0
			);
			$id = $this->grants_model->insert($data);

			if ($id)
			{
				$response['success'] = TRUE;
				echo json_encode($response);
				exit;
			} 
			else
			{
				$response['success'] = FALSE;
				echo json_encode($response);
				exit;
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _save
	 *
	 * @access	private
	 * @param	string $type
	 * @param 	integer $id
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _save($type = 'add', $group_id = 0)
	{
		// validate inputs
		$this->form_validation->set_rules('group_name', lang('label_role'), 'required');
		$this->form_validation->set_rules('group_description', lang('label_description'), 'required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		

		if ($type == 'add')
		{
			$group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('group_description'));

			// $this->_delete_cache();

			return (is_numeric($group_id)) ? $group_id : FALSE;
		}
		else if ($type == 'edit')
		{
			$return = $this->ion_auth->update_group($group_id, $this->input->post('group_name'), $this->input->post('group_description'));

			// $this->_delete_cache();
			
			return ($return) ? TRUE : FALSE;
		}
	}
}

/* End of file Roles.php */
/* Location: ./application/modules/users/controllers/Roles.php */