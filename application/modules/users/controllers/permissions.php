<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('permissions_model');
		
		$this->load->language('permissions');
		$this->load->language('ion_auth');
	}
	
	public function index()
	{
		// $this->acl->restrict('Users.Permissions.List');
		
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/permissions'));
		
		$this->session->set_userdata('redirect', current_url());
		
		// get all records
		// $data['records'] = $this->permissions_model->order_by('permission_name', 'asc')->find_all();
		
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');
		
		// render the page
		$this->template->write_view('scripts', 'js/permissions_index.js');
		$this->template->write_view('content', 'permissions_index', $data, FALSE);
		$this->template->render();
	}
	
	public function datatables()
	{
		// $this->acl->restrict('Users.Permissions.List');

		$fields = array('permission_id', 'permission_name', 'permission_active');

		echo $this->permissions_model->datatables($fields);
	}

	// public function view($id)
	// {
	// 	$this->acl->restrict('Users.Permissions.View');
				
	// 	$data['page_heading'] = lang('view_heading');
	// 	$data['page_subhead'] = lang('view_subhead');
	// 	$data['page_type'] = 'view';

	// 	// breadcrumbs
	// 	$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
	// 	$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
	// 	$this->breadcrumbs->push(lang('index_heading'), site_url('users/permissions'));
	// 	$this->breadcrumbs->push(lang('view_heading'), site_url('users/permissions/view/'.$id));

	// 	$data['record'] = $this->permissions_model->find($id);
		
	// 	$this->template->add_css('assets/css/form_view_mode.css');
	// 	$this->template->write_view('content', 'permissions_form', $data);
	// 	$this->template->render();
	// }
	
	public function add($permission_name = FALSE)
	{
		// $this->acl->restrict('Users.Permissions.Add', 'modal');
				
		$data['page_heading'] = lang('add_heading');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			if ($this->_save())
			{
				echo json_encode(array('success' => true)); exit;
			}
			else
			{	
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
					'permission_name'   => form_error('permission_name'),
					'permission_simple' => form_error('permission_simple'),
					'permission_active' => form_error('permission_active'),
				);
				echo json_encode($response);
				exit;
			}
		}
		// else if ($permission_name)
		// {
		// 	// quick add
		// 	if ($insert_id = $this->_add($permission_name))
		// 	{
		// 		echo json_encode(array('success' => true)); exit;
		// 	}
		// }

		$data['record'] = (object) array(
			'permission_name' => (isset($permission_name)) ? $permission_name : '',
		);

		$this->load->view('permissions_form', $data);
	}
	
	public function edit($id)
	{
		// $this->acl->restrict('Users.Permissions.Edit', 'modal');
				
		$data['page_heading'] = lang('edit_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $id))
			{
				echo json_encode(array('success' => true)); exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
					'permission_name'   => form_error('permission_name'),
					'permission_simple' => form_error('permission_simple'),
					'permission_active' => form_error('permission_active'),
				);
				echo json_encode($response);
				exit;
			}
		}

		$data['record'] = $this->permissions_model->find($id);

		$this->load->view('permissions_form', $data);
	}
	
	// public function delete($id)
	// {
	// 	$this->acl->restrict('Users.Permissions.Delete');
		
	// 	$this->permissions_model->delete($id);

	// 	// $this->db->cache_delete('users', 'permissions');


	// 	$this->session->set_flashdata('flash_message', lang('delete_success'));
	// 	redirect($this->session->userdata('redirect'), 'refresh');
	// }
	
	function delete($id)
	{
		$this->acl->restrict('Users.Permissions.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_success'] = lang('delete_success');
		$data['page_button'] = lang('button_delete_permission');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->permissions_model->delete($id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	private function _add($permission_name, $permission_simple, $permission_active)
	{
		$data = array();
		$data['permission_name'] = $permission_name;
		$data['permission_simple'] = $permission_simple;
		$data['permission_active'] = $permission_active;

		$id = $this->permissions_model->insert($data);

		return (is_numeric($id)) ? $id : FALSE;
	}


	private function _save($type = 'add', $id = 0)
	{
		if ($type == 'edit') { $_POST['id'] = $id; }

		// validate inputs
		if ($type == 'add')
		{
			$this->form_validation->set_rules('permission_name', lang('label_permission'),'required|trim|xss_clean|callback__permission_name_check');
		}
		else
		{
			$permission = $this->permissions_model->find($id);

			// check if the posted permission name is the same as the original name
			if ($permission->permission_name == $this->input->post('permission_name'))
			{
				$this->form_validation->set_rules('permission_name', lang('label_permission'),'required|trim|xss_clean');
			}

			// otherwise, check for duplicates
			else
			{
				$this->form_validation->set_rules('permission_name', lang('label_permission'),'required|trim|xss_clean|callback__permission_name_check');
			}
		}

		$this->form_validation->set_rules('permission_simple', lang('label_simple'),'trim|xss_clean');
		$this->form_validation->set_rules('permission_active', lang('label_active'),'trim|xss_clean');
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		$data = array();
		$data['permission_name'] = $this->input->post('permission_name');
		$data['permission_simple'] = $this->input->post('permission_simple');
		$data['permission_active'] = $this->input->post('permission_active');

		if ($type == 'add')
		{
			$id = $this->permissions_model->insert($data);

			$return = (is_numeric($id)) ? $id : FALSE;
		}
		else if ($type == 'edit')
		{
			$return = $this->permissions_model->update($id, $data);
		}

		// $this->db->cache_delete('users', 'permissions');

		return $return;
	}
	
	public function _permission_name_check($str)
	{
		if ($this->permissions_model->find_by(array('permission_name' => $str, 'permission_deleted !=' => 1)))
		{
			$this->form_validation->set_message('_permission_name_check', lang('add_existing'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}

/* End of file permisssions.php */
/* Location: ./application/modules/users/controllers/permissions.php */