<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User Class
 *
 * @package		Codifire
 * @version		1.0
 * @author 		Randy Nivales <randynivales@gmail.com>
 * @copyright 	Copyright (c) 2014-2015, Randy Nivales
 * @link		randynivales@gmail.com
 */
class User extends CI_Controller 
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
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation', 'user/facebook_ion_auth'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		$this->load->model('users_model');
		$this->load->model('groups_model');
		$this->load->model('users_model');
		$this->load->language('users');
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

	}

	// --------------------------------------------------------------------

	/**
	 * register
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function register()
	{
		$data['page_title'] = 'Register';

		if ($this->input->post())
		{
			$tables = $this->config->item('tables','ion_auth');

			//validate form input
			$this->form_validation->set_rules('first_name', lang('first_name'), 'required');
			$this->form_validation->set_rules('last_name', lang('last_name'), 'required');
			$this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
			$this->form_validation->set_rules('company', lang('company'), 'min_length[3]');
			$this->form_validation->set_rules('phone', lang('phone'), 'min_length[7]');
			$this->form_validation->set_rules('username', lang('username'), 'required|is_unique['.$tables['users'].'.username]');
			$this->form_validation->set_rules('password', lang('password'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', lang('password_confirm'), 'required');
			$this->form_validation->set_rules('terms', lang('terms'), 'callback__terms_check');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			$this->form_validation->set_message('is_unique', '{field} is not available for registration');

			if ($this->form_validation->run($this) == TRUE)
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				); 

				if ($this->ion_auth->register($username, $password, $email, $additional))
				{
					// if the registration is successful
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('user/login', 'refresh');
				}
			}
		}
	
		$this->template->add_css(module_css('user', 'user_register'));
		// $this->template->add_js(module_js('users', 'user_register'));
		$this->template->write_view('content', 'user_register', $data);
		$this->template->render();
	}

	// --------------------------------------------------------------------

	/**
	 * register_fb
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function register_fb()
	{
		$data['page_title'] = "Register with Facebook";

		if ($this->input->post())
		{
			// validate form input
			$this->form_validation->set_rules('terms', lang('terms'), 'callback__terms_check');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run($this) == TRUE)
			{
				// redirect to FB
				redirect(site_url('user/facebook_login?return=' . current_url()), 'refresh');
			}
		}
	
		$this->template->add_css(module_css('user', 'user_register'));
		// $this->template->add_js(module_js('users', 'user_register'));
		$this->template->write_view('content', 'user_register_fb', $data);
		$this->template->render();
	}


	// --------------------------------------------------------------------

	/**
	 * login
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function login()
	{
		$this->data['page_title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run($this) == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('account', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('user/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			// $this->_render_page('users/login', $this->data);

			// $this->template->set_template('blank');
			$this->template->add_css(module_css('user', 'user_login'));
			$this->template->write_view('content', 'user_login', $this->data);
			$this->template->render();
		}
	}

	// --------------------------------------------------------------------

	/**
	 * facebook_login
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function facebook_login()
	{
		// first load
		if (isset($_GET['return']))
		{
			$this->session->set_userdata('return', $_GET['return']);

			// redirect the user to FB
			$this->facebook_ion_auth->login();
		}

		// 2nd load, after getting back from FB
		else if (isset($_GET['code']))
		{
			// register and login the user
			if ($this->facebook_ion_auth->login())
			{
				redirect('user/facebook_login', 'refresh');
			}

			// header('Location:/');
			redirect('', 'refresh');
		}

		// 3rd load
		else if (!$this->ion_auth->logged_in())
		{
			$this->session->set_flashdata('flash_message', 'You have successfully registered through Facebook.  Please check your mailbox to verify your account.');

			redirect('', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'You have successfully logged in through Facebook');

			// return to the previous url before logging in
			// $return = ($this->session->userdata('return')) ? $this->session->userdata('return') : '';
			// if ($return != '')
			// {
			// 	header('Location: ' . $return);
			// 	exit();
			// }
			// else
			// {
				redirect('account', 'refresh');
			// }
		}		
	}

	// --------------------------------------------------------------------

	/**
	 * logout
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function logout()
	{
		//log the user out
		$this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		$this->session->set_flashdata('flash_message', '');
		redirect('user/login', 'refresh');
	}

	// --------------------------------------------------------------------

	/**
	 * change_password
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function change_password()
	{
		$this->acl->restrict('users.users.password');

		$this->form_validation->set_rules('old', lang('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', lang('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', lang('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('users/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('users/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/change_password', 'refresh');
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * forgot_password
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function forgot_password()
	{
		$this->data['page_heading'] = "Forgot Password";
		$this->data['page_subhead'] = "Please enter your Email so we can send you an email to reset your password.";

		//setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') == 'username' )
		{
		   $this->form_validation->set_rules('email', lang('forgot_password_username_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('email', lang('forgot_password_validation_email_label'), 'required|valid_email');
		}
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');


		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email', 'class' => 'form-control'
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = lang('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = lang('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			// $this->_render_page('users/forgot_password', $this->data);

			$this->template->set_template('blank');
			$this->template->write_view('content', 'users/forgot_password', $this->data);
			$this->template->render();
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
				if(empty($identity)) {

					if($this->config->item('identity', 'ion_auth') == 'username')
					{
						$this->ion_auth->set_message('forgot_password_username_not_found');
					}
					else
					{
						$this->ion_auth->set_message('forgot_password_email_not_found');
					}

					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("users/forgot_password", 'refresh');
				}

			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("users/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("users/forgot_password", 'refresh');
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * reset_password
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', lang('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', lang('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('users/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error(lang('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("users/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('users/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("users/forgot_password", 'refresh');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * activate
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("user/login", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("user/forgot_password", 'refresh');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _terms_check
	 *
	 * @access	public
	 * @param	none
	 * @author 	Randy Nivales <randynivales@gmail.com>
	 */
	public function _terms_check($str)
	{
		if ($str == 1)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_terms_check', 'You must agree to the Terms and Conditions');
			return FALSE;
		}
	}

}
