<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends MX_Controller 
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('permissions_model');
		$this->load->model('group_perms_model');
		$this->load->model('groups_model');

		$this->load->language('groups');
		$this->load->language('ion_auth');
	}
	
	public function index()
	{
		$this->acl->restrict('Users.Groups.List');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/groups'));
		
		$this->session->set_userdata('redirect', current_url());
		
		// get all records
		// $data['records'] = $this->ion_auth->groups()->result();
		
		// render the page
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');
		// $this->template->add_js('assets/js/plugins/bootstrap-confirmation/bootstrap-confirmation.js');
		
		$this->template->write_view('styles', 'css/groups_index.css');
		$this->template->write_view('scripts', 'js/groups_index.js');
		$this->template->write_view('content', 'groups_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		// $this->acl->restrict('Users.Groups.List');

		$fields = array('group_id', 'group_name', 'group_description', 'group_deleted');

		echo $this->groups_model->datatables($fields);
	}

	function view($group_id)
	{
		$this->acl->restrict('Users.Groups.View');

		$data['page_heading'] = lang('view_heading');
		$data['page_subhead'] = lang('view_subhead');
		$data['page_type'] = 'view';
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/groups'));
		$this->breadcrumbs->push(lang('view_heading'), site_url('users/groups/view/'.$group_id));

		$data['record'] = $this->ion_auth->group($group_id)->row();

		// $this->template->add_css('assets/css/form_view_mode.css');
		// $this->template->write_view('content', 'groups_form', $data);
		// $this->template->render();
		$this->load->view('groups_form', $data);
	}

	function add()
	{
		$this->acl->restrict('Users.Groups.Add', 'modal');

		$data['page_heading'] = lang('add_heading');
		// $data['page_subhead'] = lang('add_subhead');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			// pr($this->input->post()); exit;
			if ($this->_save('add'))
			{
				$this->session->set_flashdata('flash_message', lang('add_success'));
				// redirect($this->session->userdata('redirect'), 'refresh');
				echo json_encode(array('success' => true)); exit;
			}
			else
			{	
				if ($this->ion_auth->errors())
				{
					$response['success'] = FALSE;
					$response['message'] = $this->ion_auth->errors();
					// $response['errors'] = FALSE;
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

		// $this->template->set_template('blank');
		// $this->template->write_view('content', 'groups_form', $data);
		// $this->template->render();

		$this->load->view('groups_form', $data);
	}

	function edit($group_id)
	{
		$this->acl->restrict('Users.Groups.Edit', 'modal');

		$data['page_heading'] = lang('edit_heading');
		// $data['page_subhead'] = lang('edit_subhead');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $group_id))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				echo json_encode(array('success' => true)); exit;
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

		// $this->template->write_view('content', 'groups_form', $data);
		// $this->template->render();
		$this->load->view('groups_form', $data);
	}



	// function delete($group_id)
	// {
	// 	$this->acl->restrict('Users.Users.Delete');
		
	// 	$this->groups_model->delete($group_id);

	// 	// $this->_delete_cache();

	// 	$this->session->set_flashdata('flash_message', lang('delete_success'));
	// 	redirect($this->session->userdata('redirect'), 'refresh');
	// }

	function delete($id)
	{
		$this->acl->restrict('Users.Groups.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_success'] = lang('delete_success');
		$data['page_button'] = lang('button_delete_group');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->groups_model->delete($id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}
	
	public function permissions($group_id)
	{
		// $this->acl->restrict('Users.Groups.Permissions');
		
		$data['page_heading'] = lang('permissions_heading');
		$data['page_subhead'] = lang('permissions_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/groups'));
		$this->breadcrumbs->push(lang('permissions_heading'), site_url('users/groups/permissions/'.$group_id));

		$this->session->set_userdata('redirect', current_url());
		
		// get the group info
		$data['group'] = $this->groups_model->find($group_id);

		
		if ($this->input->post('submit'))
		{
			// mark all permissions for this group as "deny"
			$this->group_perms_model->update_where('group_perm_id', $group_id, array('group_perm_allowed'=>0));
			
			// insert or update permission for this group
			$selected_permissions = $this->input->post('permission');
			//debug($selected_permissions);
			
			if ($selected_permissions)
			{
				foreach ($selected_permissions as $permission_key => $permission_id)
				{
					//debug($permission_id);
					// check if permission exists, then update
					$result = $this->group_perms_model->find_by(array('group_perm_id'=>$group_id, 'group_perm_permission_id'=>$permission_id));
					// pr($result);
					if ($result)
					{
						// update existing record
						$this->group_perms_model->update_where('group_perm_id', $result->group_perm_id, array('group_perm_allowed'=>1));
					}
					else
					{
						// insert the permission
						$this->group_perms_model->insert(array('group_perm_id'=>$group_id, 'group_perm_permission_id'=>$permission_id, 'allowed'=>1));
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
					$search_key = ucfirst($module).'.'.ucfirst($controller_name);
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
		$group_perms = $this->group_perms_model->find_all_by(array('group_perm_group_id' => $group_id, 'group_perm_allowed !=' => 0));
		// $data['group_perms'] = array_values_by_key($group_perms_obj, FALSE, 'permission_id');
		$grp_prms = array();
		if ($group_perms)
		{
			foreach ($group_perms as $group_perm)
			{
				$grp_prms[$group_perm->group_perm_permission_id] = $group_perm->group_perm_allowed;
			}
		}
		$data['group_perms'] = $grp_prms;

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
		// log_message('debug', 'group_perms_obj ' . print_r($group_perms_obj, TRUE));
		log_message('debug', 'group_perms ' . print_r($data['group_perms'], TRUE));
		
		// render the page
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');
		
		$this->template->add_js($js, 'embed');
		
		$this->template->write_view('scripts', 'js/groups_permissions.js');
		$this->template->write_view('content', 'groups_permissions', $data);
		$this->template->render();
	}

	function update_permission($group_id, $permission_id, $permission_level)
	{
		// $this->acl->restrict('Users.Groups.Permissions');
		log_message('debug', $permission_level);

		if ($permission = $this->group_perms_model->find_by(array('group_perm_group_id' => $group_id, 'group_perm_permission_id' => $permission_id)))
		{
			$this->group_perms_model->update($permission->group_perm_id, array('group_perm_allowed' => $permission_level));

			$response['success'] = TRUE;
			echo json_encode($response);
			exit;
		}
		else
		{
			$data = array(
				'group_perm_group_id' 		=> $group_id,
				'group_perm_permission_id'	=> $permission_id,
				'group_perm_allowed'		=> $permission_level,
				'group_perm_deleted'		=> 0
			);
			$id = $this->group_perms_model->insert($data);

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

	private function _save($type = 'add', $group_id = 0)
	{
		// validate inputs
		$this->form_validation->set_rules('group_name', lang('label_group'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('group_description', lang('label_description'), 'required|trim|xss_clean');

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

	// private function _delete_cache()
	// {
	// 	$this->db->cache_delete('users', 'datatables');
	// 	$this->db->cache_delete('users', 'groups');
	// }
}

/* End of file groups.php */
/* Location: ./application/modules/users/controllers/groups.php */