<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Permissions Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class Permissions extends MX_Controller 
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
		
		$this->load->language('permissions');
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
		$this->acl->restrict('users.permissions.list');
		
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('users/permissions'));
		
		$this->session->set_userdata('redirect', current_url());
		
		$this->template->add_css('assets/plugins/datatables/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/dataTables.responsive.min.js');
		
		// render the page
		// $this->template->add_css(module_css('users', 'permissions_index'));
		$this->template->add_js(module_js('users', 'permissions_index'));
		$this->template->write_view('content', 'permissions_index', $data, FALSE);
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
		$this->acl->restrict('users.permissions.list');

		$fields = array('permission_id', 'permission_name', 'permission_simple', 'permission_active');

		echo $this->permissions_model->datatables($fields);
	}

	// --------------------------------------------------------------------

	/**
	 * add
	 *
	 * @access	public
	 * @param	string $permission_name
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function add($permission_name = FALSE)
	{
		$this->acl->restrict('users.permissions.add', 'modal');
				
		$data['page_heading'] = lang('add_heading');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			if ($this->_save())
			{
				echo json_encode(array('success' => true, 'message' => lang('add_success'))); exit;
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

		$data['record'] = (object) array(
			'permission_name' => (isset($permission_name)) ? $permission_name : '',
		);

		$this->template->set_template('modal');
		$this->template->add_js(module_js('users', 'permissions_form'));
		$this->template->write_view('content', 'permissions_form', $data);
		$this->template->render();
	}
	
	// --------------------------------------------------------------------

	/**
	 * edit
	 *
	 * @access	public
	 * @param	integer $id
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function edit($id)
	{
		$this->acl->restrict('users.permissions.edit', 'modal');
				
		$data['page_heading'] = lang('edit_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $id))
			{
				echo json_encode(array('success' => true, 'message' => lang('edit_success'))); exit;
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

		$this->template->set_template('modal');
		$this->template->add_js(module_js('users', 'permissions_form'));
		$this->template->write_view('content', 'permissions_form', $data);
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
		$this->acl->restrict('users.permissions.delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->permissions_model->delete($id);

			echo json_encode(array('success' => true, 'message' => lang('delete_success'))); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * _add
	 *
	 * @access	private
	 * @param	string $permission_name
	 * @param 	boolean $permission_simple
	 * @param 	boolean $permission_active
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	private function _add($permission_name, $permission_simple, $permission_active)
	{
		$data = array();
		$data['permission_name'] = $permission_name;
		$data['permission_simple'] = $permission_simple;
		$data['permission_active'] = $permission_active;

		$id = $this->permissions_model->insert($data);

		return (is_numeric($id)) ? $id : FALSE;
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
	private function _save($type = 'add', $id = 0)
	{
		if ($type == 'edit') { $_POST['id'] = $id; }

		// validate inputs
		if ($type == 'add')
		{
			$this->form_validation->set_rules('permission_name', lang('label_permission'), 'required|callback_permission_check');
		}
		else
		{
			$permission = $this->permissions_model->find($id);

			// check if the posted permission name is the same as the original name
			if ($permission->permission_name == $this->input->post('permission_name'))
			{
				$this->form_validation->set_rules('permission_name', lang('label_permission'), 'required');
			}

			// otherwise, check for duplicates
			else
			{
				$this->form_validation->set_rules('permission_name', lang('label_permission'), 'required|callback_permission_check');
			}
		}

		$this->form_validation->set_rules('permission_simple', lang('label_simple'), 'is_natural');
		$this->form_validation->set_rules('permission_active', lang('label_active'), 'is_natural');
		
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

		return $return;
	}
	
	// --------------------------------------------------------------------

	/**
	 * permission_check
	 *
	 * @access	public
	 * @param	string $str
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function permission_check($str)
	{
		if ($this->permissions_model->find_by(array('permission_name' => $str, 'permission_deleted' => 0)))
		{
			$this->form_validation->set_message('permission_check', lang('add_existing'));
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