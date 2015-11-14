<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('users_model');
		$this->load->model('groups_model');
		$this->load->language('users');
		$this->load->language('ion_auth');
	}

	function index()
	{
		//$this->acl->restrict('Users.Users.List');

		// $data['title'] = lang('index_heading');
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));

		$this->session->set_userdata('redirect', current_url());

		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');

		$this->template->write_view('scripts', 'js/users_index.js');
		$this->template->write_view('content', 'users_index', $data);
		$this->template->render();

	}

	public function datatables()
	{
		//$this->acl->restrict('Users.Users.List');

		$fields = array($this->db->dbprefix('users') . '.user_id', 'user_firstname', 'user_lastname', 'GROUP_CONCAT(DISTINCT g.group_name SEPARATOR ",<br />") as groups', 'user_active');

		echo $this->users_model->get_users('active')->datatables($fields);
	}

	function view($user_id)
	{
		//$this->acl->restrict('Users.Users.View');

		$data['page_heading'] = lang('view_heading');
		$data['page_subhead'] = lang('view_subhead');
		$data['page_type'] = 'view';

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('view_heading'), site_url('users/view/'.$user_id));

		$this->session->set_userdata('redirect', current_url());

		$data['record'] = $this->ion_auth->user($user_id)->row();

		$data['groups'] = $this->groups_model->where('group_deleted', 0)->order_by('group_name')->find_all();

		// get the current groups
		$current_groups = $this->ion_auth->get_users_groups($user_id)->result();
		$curr_grp = '';
		if (isset($current_groups))
		{
			foreach($current_groups as $grp)
			{
				$curr_grp .= "{id:{$grp->group_id}, text:'{$grp->group_name}'},";
			}
		}
		$data['current_groups'] = '[' . $curr_grp . ']';


		$this->template->add_css('assets/plugins/select2/select2.css');
		$this->template->add_css('assets/plugins/select2/select2-bootstrap.css');
		$this->template->add_js('assets/plugins/select2/select2.min.js');

		$this->template->add_css('assets/css/form_view_mode.css');
		$this->template->write_view('scripts', 'js/users_form.js');
		$this->template->write_view('styles', 'css/users_form.css');
		$this->template->write_view('content', 'users_form', $data);
		$this->template->render();
	}


	function add()
	{
		//$this->acl->restrict('Users.Users.Add');

		$data['page_heading'] = lang('add_heading');
		$data['page_subhead'] = lang('add_subhead');
		$data['page_type'] = 'add';

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('add_heading'), site_url('users/add/'));

		if ($this->input->post('submit'))
		{
			if ($this->_save('add'))
			{
				$this->session->set_flashdata('flash_message', lang('add_success'));
				redirect($this->session->userdata('redirect'), 'refresh');
			}
			else
			{
				if ($this->ion_auth->errors())
				{
					$data['error_message'] = $this->ion_auth->errors();
				}
				else
				{
					$data['error_message'] = lang('validation_error');

					// repopulate the groups
					$current_groups = $this->groups_model->where_in('group_id', $this->input->post('groups'))->find_all();
				}
			}
		}
		else
		{
			$current_groups = '';
		}


		$data['groups'] = $this->groups_model->where('group_deleted', 0)->order_by('group_name')->find_all();

		// current groups
		$curr_grp = '';
		if ($current_groups)
		{
			foreach($current_groups as $grp)
			{
				$curr_grp .= "{id:{$grp->group_id}, text:'{$grp->group_name}'},";
			}
		}
		$data['current_groups'] = '[' . $curr_grp . ']';


		$this->template->add_css('assets/plugins/select2/select2.css');
		$this->template->add_css('assets/plugins/select2/select2-bootstrap.css');
		$this->template->add_js('assets/plugins/select2/select2.min.js');

		$this->template->write_view('scripts', 'js/users_form.js');
		// $this->template->write_view('styles', 'css/users_form.css');
		$this->template->write_view('content', 'users_form', $data);
		$this->template->render();

	}

	function edit($user_id)
	{
		//$this->acl->restrict('Users.Users.Edit');

		$data['page_heading'] = lang('edit_heading');
		$data['page_subhead'] = lang('edit_subhead');
		$data['page_type'] = 'edit';

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_users'), site_url('users'));
		$this->breadcrumbs->push(lang('edit_heading'), site_url('users/edit/'.$user_id));

		// get the user info
		$data['record'] = $this->ion_auth->user($user_id)->row();

		// get the current groups
		$current_groups = $this->ion_auth->get_users_groups($user_id)->result();

		if ($this->input->post('submit'))
		{

			if ($this->_save('edit', $user_id))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				redirect($this->session->userdata('redirect'), 'refresh');
			}
			else
			{
				$data['error_message'] = lang('validation_error');

				// repopulate the groups
				$current_groups = $this->groups_model->where_in('group_id', $this->input->post('groups'))->find_all();

			}
		}

		$data['groups'] = $this->groups_model->where('group_deleted', 0)->order_by('group_name')->find_all();

		// current groups
		$curr_grp = '';
		// log_message('debug', print_r($current_groups, true));

		if ($current_groups)
		{
			foreach($current_groups as $grp)
			{
				$curr_grp .= "{id:{$grp->group_id}, text:'{$grp->group_name}'},";
			}
		}
		$data['current_groups'] = '[' . $curr_grp . ']';

		// pr($data); exit;

		$this->template->add_css('assets/plugins/select2/select2.css');
		$this->template->add_css('assets/plugins/select2/select2-bootstrap.css');
		$this->template->add_js('assets/plugins/select2/select2.min.js');

		$this->template->write_view('scripts', 'js/users_form.js');
		// $this->template->write_view('styles', 'css/users_form.css');
		$this->template->write_view('content', 'users_form', $data);
		$this->template->render();
	}

	function login()
	{
		$data['page_heading'] = 'Login';

        if ($this->input->post('submit'))
        {
            $return = $this->_login();
            if ($return==1)
            {
                $data['test'] =$return ;
                if ($this->input->get('return'))
                {
                    header('Location: ' . $this->input->get('return'));
                }
                redirect('', 'refresh');
            }
            elseif($return==2)//if validation error
            {
                $data['error_message'] = lang('validation_error');

                /*if ($this->ion_auth->errors())
                {
                    $data['error_message'] = $this->ion_auth->errors();
                }
                else
                {
                    $data['error_message'] = lang('validation_error');
                }*/
            }
            elseif($return==3){//if username do not exists
                $data['error_message'] = 'You have entered the wrong username<br><br>Please try again';
                $data['code_username'] = 'wrong username';
            }
            else// default error handling
            {
                $ctr = $this->ion_auth->get_attempts_num($this->input->post('user_identity'));
                $data['error_message'] = 'You have entered the wrong username or password ('. $ctr.'/5)<br><br>Please try again';
                if($ctr>=5){
                    $data['error_message'] = 'You have reached the maximum log in error limit';
                    $data['error_ctr'] = 5;
                }
            }
        }


        $data['return'] = ($this->input->get('return')) ? $this->input->get('return') : '';

		$this->load->view('users_login', $data);
	}

	function logout()
	{
		$logout = $this->ion_auth->logout();

		$this->session->set_flashdata('flash_message', lang('logout_success'));

		redirect('users/login', 'refresh');
	}

	function noaccess()
	{
		$this->load->view('users_noaccess');
	}

	function restricted()
	{
		$data['page_heading'] = lang('restricted_heading');

		$this->load->view('users_restricted', $data);
	}


	function password()
	{
		$this->acl->restrict('Users.Users.Password', 'modal');

		$data['page_heading'] = lang('password_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save_password())
			{
				// $this->session->set_flashdata('flash_message', lang('edit_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{
				if ($this->ion_auth->errors())
				{
					$response['success'] = FALSE;
					$response['message'] = 'Please correct or provide the necessary information.';//strip_tags($this->ion_auth->errors());
					echo json_encode($response);
					exit;
				}
				else
				{
					$response['success'] = FALSE;
					$response['message'] = strip_tags(lang('validation_error'));
					$response['errors'] = array(
						'old_password'				=> form_error('old_password'),
						'new_password'				=> form_error('new_password'),
						'new_password_confirm'		=> form_error('new_password_confirm')
					);
					echo json_encode($response);
					exit;
				}
			}
		}

		$this->load->view('users_password', $data);
	}

	function profile()
	{
		$this->acl->restrict('Users.Users.Profile', 'modal');

		$data['page_heading'] = lang('profile_heading');
		// $data['page_subhead'] = lang('edit_subhead');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save_profile())
			{
				// $this->session->set_flashdata('flash_message', lang('edit_success'));
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
						'user_firstname'	=> form_error('user_firstname'),
						'user_lastname'		=> form_error('user_lastname'),
						'user_email'		=> form_error('user_email')
					);
					echo json_encode($response);
					exit;
				}
			}
		}

		$data['record'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		// $this->template->write_view('content', 'groups_form', $data);
		// $this->template->render();
		$this->load->view('users_profile', $data);
	}

	function picture()
	{
		$this->acl->restrict('Users.Users.Picture', 'modal');

		$data['page_heading'] = lang('picture_heading');

		if (!empty($_FILES))
		{
			$this->_save_picture();
		}
		$this->load->view('users_picture', $data);
	}



	function forgot_password()
	{
		$data['page_heading'] = 'Forgot Password';

		if ($this->input->post('submit'))
		{
			if ($this->_forgot_password()==1)
			{
				// $this->db->cache_delete('users', 'login');
				$this->session->set_flashdata('flash_message', $this->ion_auth->messages());
				redirect('users/login', 'refresh');
			}
			else
			{
				if ($this->ion_auth->errors())
				{
					$data['error_message'] = $this->ion_auth->errors();
				}
				elseif($this->_forgot_password()==3)
				{
					$data['error_message'] = lang('validation_error');
				}
                else{
                    $data['error_message'] = 'The e-mail address provided is not in the system. Please contact CRM support.';//
                }

			}
		}

		$this->load->view('users_forgot_password', $data);

	}

	function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$data['page_heading'] = 'Reset Password';

		if ($this->input->post('submit'))
		{
			if ($this->_reset_password($code))
			{
				$this->session->set_flashdata('flash_message', $this->ion_auth->messages());
				redirect('users/login', 'refresh');
			}
			else
			{
				if ($this->ion_auth->errors())
				{
					$data['ion_auth_error_message'] = $this->ion_auth->errors().'The password reset link is already expired.';
				}
				else
				{
					$data['error_message'] = lang('validation_error');
				}
			}
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		$this->load->view('users_reset_password', $data);

	}


	function activate($user_id, $code=false)
	{
		$this->acl->restrict('Users.Users.Activate', 'modal');

		$data['page_heading'] = lang('activate_heading');
		$data['page_confirm'] = lang('activate_confirm');
		$data['page_success'] = lang('activate_success');
		$data['page_button'] = lang('button_activate_user');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$activation = $this->ion_auth->activate($user_id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	function deactivate($user_id = NULL)
	{
		$this->acl->restrict('Users.Users.Deactivate', 'modal');

		$data['page_heading'] = lang('deactivate_heading');
		$data['page_confirm'] = lang('deactivate_confirm');
		$data['page_success'] = lang('deactivate_success');
		$data['page_button'] = lang('button_deactivate_user');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->ion_auth->deactivate($user_id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	function delete($user_id)
	{
		$this->acl->restrict('Users.Users.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_success'] = lang('delete_success');
		$data['page_button'] = lang('button_delete_user');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->ion_auth->deactivate($user_id);
			$this->users_model->delete($user_id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}


	private function _save($type = 'add', $user_id = 0)
	{
		// validate inputs
		$this->form_validation->set_rules('user_firstname', lang('label_firstname'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_lastname', lang('label_lastname'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_email', lang('label_email'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_username', lang('label_username'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_groups', lang('label_groups'), 'required');

		if ($this->input->post('user_password'))
		{
			$this->form_validation->set_rules('user_password', lang('label_password'), 'required|trim|xss_clean|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_password_confirm]');
			$this->form_validation->set_rules('user_password_confirm', lang('label_retype_password'), 'required|trim|xss_clean');
		}

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}
		// pr($this->input->post('groups')); exit;

		// make sure we only pass in the fields we want

		if ($type == 'add')
		{
			$user_username 		= $this->input->post('user_username');
			$user_password 		= $this->input->post('user_password');
			$user_email 		= $this->input->post('user_email');
			$user_group_data 	= $this->input->post('user_groups');

			$additional_data = array(
				'user_firstname'		=> $this->input->post('user_firstname'),
				'user_lastname'			=> $this->input->post('user_lastname'),
			);

			$user_id = $this->ion_auth->register($user_username, $user_password, $user_email, $additional_data, $user_group_data);

			return (is_numeric($user_id)) ? $user_id : FALSE;
		}
		else if ($type == 'edit')
		{
			// update the groups
			$groups = $this->input->post('user_groups');
			if (isset($groups) && !empty($groups))
			{
				$this->ion_auth->remove_from_group('', $user_id);

				foreach ($groups as $group)
				{
					$this->ion_auth->add_to_group($group, $user_id);
				}
			}

			// update the user
			$data = array(
				'user_firstname'		=> $this->input->post('user_firstname'),
				'user_lastname'			=> $this->input->post('user_lastname'),
				'user_username'			=> $this->input->post('user_username'),
				'user_email'			=> $this->input->post('user_email'),
			);
			if (null != $this->input->post('user_password'))
			{
				$data['user_password'] = $this->input->post('user_password');
			}

			$this->ion_auth->update($user_id, $data);
		}

		return TRUE;
	}

    private function _login()
    {
        // validate inputs
        $this->form_validation->set_rules('user_identity', lang('label_username'),'required|trim|xss_clean|max_length[20]');
        $this->form_validation->set_rules('user_password', lang('label_password'),'required|trim|xss_clean|max_length[20]');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run($this) == FALSE)
        {
            return 2;
        }

        $user_remember = (bool) $this->input->post('user_remember');
        if ($this->ion_auth->login($this->input->post('user_identity'), $this->input->post('user_password'), $user_remember))
        {
            return 1;
        }
        else
        {
            if($this->ion_auth->is_max_login_attempts_exceeded($this->input->post('user_identity')))
            {
                return 4;//false
            }
            if($this->ion_auth->identity_check($this->input->post('user_identity')) === FALSE){
                return 3;
            }
            return 4;//$this->ion_auth->get_attempts_num($this->input->post('user_identity'));
        }

    }


	private function _save_password()
	{
		// validate inputs
		$min_password_length = $this->config->item('min_password_length', 'ion_auth');
		$max_password_length = $this->config->item('max_password_length', 'ion_auth');

		$this->form_validation->set_rules('old_password', lang('label_old_password'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('new_password', lang('label_new_password'), 'required|trim|xss_clean|min_length[' . $min_password_length . ']|max_length[' .$max_password_length . ']|matches[new_password_confirm]');
		$this->form_validation->set_rules('new_password_confirm', lang('label_new_password2'), 'required|trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');

		$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
		// echo $old_password; exit;
		if (! $this->ion_auth->change_password($identity, $old_password, $new_password))
		{
			return False;
		}

		// $this->db->cache_delete('users', 'password');

		return TRUE;
	}


	private function _save_profile()
	{
		// validate inputs
		$this->form_validation->set_rules('user_firstname', lang('label_firstname'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_lastname', lang('label_lastname'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('user_email', lang('label_email'), 'required|trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$data = array(
			'user_firstname'			=> $this->input->post('user_firstname'),
			'user_lastname'				=> $this->input->post('user_lastname'),
			'user_email'				=> $this->input->post('user_email'),
		);

		if (! $this->ion_auth->update($this->session->userdata('user_id'), $data))
		{
			$this->session->set_flashdata('flash_error', $this->ion_auth->errors());
			redirect('users/profile', 'refresh');
		}

		return TRUE;
	}

	private function _save_picture()
	{
		// get the users profile
		$user = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$config = array();
		$config['upload_path'] = FCPATH.'assets/uploads/propic';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			return FALSE;
		}
		$image_data = $this->upload->data();
		// pr($image_data);
		log_message('debug', print_r($image_data, true));

		$this->load->library('image_lib');

		// resize the image
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = 150;
		$config['height'] = 150;
		$this->image_lib->initialize($config);
		if ( ! $this->image_lib->resize())
		{
		    return FALSE;
		}

		// filename for the db
		$user_image = $image_data['file_name'];
		$this->session->set_userdata('user_image', $user_image);

		// delete the user's previous profile picture
		unlink(FCPATH . 'assets/uploads/propic/' . $user->user_image);

		if ($this->ion_auth->update($this->session->userdata('user_id'), array('user_image' => $user_image)))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	private function _forgot_password()
	{

		// validate inputs
		$this->form_validation->set_rules('user_email', lang('label_email'), 'required|trim|xss_clean|valid_email');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return 3;
		}

		// get identity for that email
		$config_tables = $this->config->item('tables', 'ion_auth');
		$identity = $this->db->where('user_email', $this->input->post('user_email'))->limit('1')->get($config_tables['users'])->row();
		if($identity){

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            return ($forgotten) ? 1 : 2;
        }
        else{
            return 2;
        }
	}

	private function _reset_password($code)
	{
		// validate inputs
		$min_password_length = $this->config->item('min_password_length', 'ion_auth');
		$max_password_length = $this->config->item('max_password_length', 'ion_auth');

		$this->form_validation->set_rules('new_password', lang('label_new_password'), 'required|trim|xss_clean|min_length[' . $min_password_length . ']|max_length[' .$max_password_length . ']|matches[new_password_confirm]');

		$this->form_validation->set_rules('new_password_confirm', lang('label_new_password2'), 'required|trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if (!$user) return FALSE;

		$identity = $user->{$this->config->item('identity', 'ion_auth')};
		$change = $this->ion_auth->reset_password($identity, $this->input->post('new_password'));

		return ($change) ? TRUE : FALSE;
	}

}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */