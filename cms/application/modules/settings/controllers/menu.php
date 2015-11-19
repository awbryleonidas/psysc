<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('menu_model');
		$this->load->language('menu');
	}

	public function index()
	{
		// parameter for this is Module_Name.Controller_Name.Method_Name
		$this->acl->restrict('Settings.Menu.List');
	
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');

		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/menu'));
		
		$this->session->set_userdata('redirect', current_url());

		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');
		// $this->template->add_js('assets/plugins/bootstrap-confirmation/bootstrap-confirmation.js');
		
		$this->template->write_view('scripts', 'js/menu_index.js');
		$this->template->write_view('content', 'menu_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		$this->acl->restrict('Settings.Menu.List');
		
		$fields = array('menu_id', 'menu_text', 'menu_link', 'menu_permission', 'menu_icon', 'menu_order', 'menu_active');

		echo $this->menu_model->datatables($fields);
	}

	public function view($id)
	{
		$this->acl->restrict('Settings.Menu.View');

		$data['page_heading'] = lang('view_heading');
		$data['page_subhead'] = lang('view_subhead');
		$data['page_type'] = 'view';
	
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/menu'));
		$this->breadcrumbs->push(lang('view_heading'), site_url('settings/menu/view/'.$id));

		$this->session->set_userdata('redirect', current_url());
		
		$data['record'] = $this->menu_model->find($id);

		$data['menu_items'] = $this->menu_model->format_dropdown('menu_id', 'concat(menu_text, " (", menu_link, ")")');
		$data['menu_items'][0]  = 'No Parent';

		$this->template->add_css('assets/css/form_view_mode.css');


		// $this->template->write_view('scripts', 'js/menu_form.js');
		// $this->template->write_view('styles', 'css/menu_form.css');
		$this->template->write_view('content', 'menu_form', $data);
		$this->template->render();
	}

	public function add()
	{
		$this->acl->restrict('Settings.Menu.Add');

		$data['page_heading'] = lang('add_heading');
		$data['page_subhead'] = lang('add_subhead');
		$data['page_type'] = 'add';
	
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/menu'));
		$this->breadcrumbs->push(lang('add_heading'), site_url('settings/menu/add'));
		
		// $this->session->set_userdata('redirect', current_url());
	
		if ($this->input->post('submit'))
		{
			if ($this->_save())
			{
				$this->session->set_flashdata('flash_message', lang('add_success'));
				redirect($this->session->userdata('redirect'), 'refresh');
			}
			else
			{	
				$data['error_message'] = lang('validation_error');
			}
		}

		$data['menu_items'] = $this->menu_model->format_dropdown('menu_id', 'concat(menu_text, " (", menu_link, ")")');
		$data['menu_items'][0]  = 'No Parent';

		// $this->template->add_css('assets/plugins/jquery-ui/jquery.ui.datepicker.css');
		// $this->template->add_js('assets/plugins/jquery-ui/jquery.ui.datepicker.js');

		$this->template->write_view('scripts', 'js/menu_form.js');
		// $this->template->write_view('styles', 'css/menu_form.css');
		$this->template->write_view('content', 'menu_form', $data);
		$this->template->render();
	}

	public function edit($id, $booking_id = FALSE)
	{
		$this->acl->restrict('Settings.Menu.Edit');

		$data['page_heading'] = lang('edit_heading');
		$data['page_subhead'] = lang('edit_subhead');
		$data['page_type'] = 'edit';
	
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_settings'), site_url('settings'));
		$this->breadcrumbs->push(lang('index_heading'), site_url('settings/menu'));
		$this->breadcrumbs->push(lang('edit_heading'), site_url('settings/menu/edit/'.$id));
		
		// $this->session->set_userdata('redirect', current_url());
	
		$data['record'] = $this->menu_model->find($id);

		$data['menu_items'] = $this->menu_model->format_dropdown('menu_id', 'concat(menu_text, " (", menu_link, ")")');
		$data['menu_items'][0]  = 'No Parent';

		if ($this->input->post('submit'))
		{
			if ($this->_save('edit', $id))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				redirect($this->session->userdata('redirect'), 'refresh');
			}
			else
			{	
				$data['error_message'] = lang('validation_error');
			}
		}

		// $this->template->add_css('assets/plugins/jquery-ui/jquery-ui.css');
		// $this->template->add_css('assets/plugins/jquery-ui/jquery.ui.datepicker.css');
		// $this->template->add_js('assets/plugins/jquery-ui/jquery-ui.min.js');
		// $this->template->add_js('assets/plugins/jquery-ui/jquery.ui.datepicker.js');

		$this->template->write_view('scripts', 'js/menu_form.js');
		// $this->template->write_view('styles', 'assets/css/menu_form.css');
		$this->template->write_view('content', 'menu_form', $data);
		$this->template->render();
	}

	// public function delete($id)
	// {
	// 	$this->acl->restrict('Settings.Menu.Delete');
		
	// 	// $record = $this->menu_model->find($id);
		
	// 	$this->menu_model->delete($id);

	// 	$this->cache->delete('app-menu');
	// 	// $this->_delete_cache();

	// 	$this->session->set_flashdata('flash_message', lang('delete_success'));
	// 	redirect($this->session->userdata('redirect'), 'refresh');
	// }

	function delete($id)
	{
		$this->acl->restrict('Settings.Menu.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_button'] = lang('button_delete_menu');

		if ($this->input->post())
		{
			$this->menu_model->delete($id);

			$this->cache->delete('app-menu');

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}
	
	private function _save($type = 'add', $id = 0)
	{		
		// validate inputs
		$this->form_validation->set_rules('menu_text', lang('label_text'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_link', lang('label_link'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_permission', lang('label_permission'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_icon', lang('label_icon'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_parent_id', lang('label_parent_id'), 'trim|xss_clean');
		$this->form_validation->set_rules('menu_order', lang('label_order'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('menu_active', lang('label_active'), 'trim|xss_clean');
		
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		$data = array(
			'menu_text'					=> $this->input->post('menu_text'),
			'menu_link'					=> $this->input->post('menu_link'),
			'menu_permission'			=> $this->input->post('menu_permission'),
			'menu_icon'					=> $this->input->post('menu_icon'),
			'menu_parent_id'			=> $this->input->post('menu_parent_id'),
			'menu_order'				=> $this->input->post('menu_order'),
			'menu_active'				=> $this->input->post('menu_active'),
		);
		
		if ($type == 'add')
		{
			$return_id = $this->menu_model->insert($data);

			// $this->_delete_cache();

			$return = (is_numeric($return_id)) ? $return_id : FALSE;
		}
		else if ($type == 'edit')
		{
			$return = $this->menu_model->update($id, $data);
		}

		$this->cache->delete('app-menu');

		return $return;
	}	

}

/* End of file menu.php */
/* Location: ./application/modules/settings/controllers/menu.php */