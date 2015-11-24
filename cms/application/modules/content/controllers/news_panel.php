<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_panel extends MX_Controller
{

	function __construct()
	{
		parent::__construct();

		//$this->load->model('resources/interests_model');
		$this->load->model('content/malls_model');
		$this->load->model('content/coupons_model');
		$this->load->model('content/movies_model');
		$this->load->model('content/news_panel_malls_model');
		$this->load->model('content/news_panel_subcategories_model');
		$this->load->model('content/subcategories_model');
		$this->load->model('news_panels_model');
		$this->load->language('news_panels');
	}
	
	public function index()
	{
		$this->acl->restrict('Content.News_panels.List');
		
		// page title
		$data['page_heading'] = lang('index_heading');
		$data['page_subhead'] = lang('index_subhead');
		
		// breadcrumbs
		$this->breadcrumbs->push(lang('crumb_home'), site_url(''));
		$this->breadcrumbs->push(lang('crumb_module'), site_url('content'));
		$this->breadcrumbs->push(lang('crumb_controller'), site_url('content/malls'));
		
		$this->session->set_userdata('redirect', current_url());

		// render the page
		$this->template->add_css('assets/plugins/datatables/css/dataTables.bootstrap.css');
		$this->template->add_css('assets/plugins/datatables/css/dataTables.responsive.css');
		$this->template->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.bootstrap.js');
		$this->template->add_js('assets/plugins/datatables/js/dataTables.responsive.min.js');

		$this->template->add_css('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css');
		$this->template->add_js('assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js');

		$this->template->add_css('assets/plugins/select2/select2.css');
		$this->template->add_css('assets/plugins/select2/select2-bootstrap.css');
		$this->template->add_js('assets/plugins/select2/select2.min.js');

		$this->template->add_css('assets/css/extra/extra.css?f=content/views/css/news_panels_index.css');
		$this->template->add_js('assets/js/extra/extra.js?f=content/views/js/news_panels_index.js');
		$this->template->write_view('content', 'news_panels_index', $data);
		$this->template->render();
	}

	public function datatables()
	{
		$this->acl->restrict('Content.News_panels.List');

		$fields = array('news_panel_id', 'news_panel_image_thumb', 'news_panel_brand', 'news_panel_caption', 'brand_logo', 'news_panel_starts_on', 'news_panel_active', 'news_panel_is_external');

		echo $this->news_panels_model
			->join('brands', 'brand_name = news_panel_brand', 'LEFT')
			->where('brand_deleted', 0)
			->order_by('news_panel_starts_on', 'desc')
			->datatables($fields);
	}

	function add()
	{
		$this->acl->restrict('Content.News_panels.Add', 'modal');

		$data['page_heading'] = lang('add_heading');
		$data['page_type'] = 'add';

		if ($this->input->post())
		{
			if ($this->_save('add'))
			{
				$this->session->set_flashdata('flash_message', lang('add_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
					//'news_panel_interest_id' => form_error('news_panel_interest_id'),
					'news_panel_malls' => form_error('news_panel_malls'),
					'news_panel_caption' => form_error('news_panel_caption'),
					'news_panel_starts_on' => form_error('news_panel_starts_on'),
					'news_panel_ends_on' => form_error('news_panel_ends_on'),
					'news_panel_brand' => form_error('news_panel_brand'),
					'news_panel_active' => form_error('news_panel_active'),
					'news_panel_brand_news_panel' => form_error('news_panel_brand_news_panel'),
					'news_panel_featured_news_panel' => form_error('news_panel_featured_news_panel'),
					'news_panel_type' => form_error('news_panel_type'),
					'news_panel_image_thumb' => form_error('news_panel_image_thumb'),
					'news_panel_image_small' => form_error('news_panel_image_small'),
					'news_panel_image_medium' => form_error('news_panel_image_medium'),
					'news_panel_image_large' => form_error('news_panel_image_large'),
					'news_panel_image_xlarge' => form_error('news_panel_image_xlarge'),
				);
				echo json_encode($response);
				exit;
			}
		}
		else
		{
			$current_malls = '';
			$current_subcategories = '';
		}

		// current groups
		$curr_grp = '';

		if ($current_malls)
		{
			foreach($current_malls as $grp)
			{
				$curr_grp .= "{id:{$grp->mall_id}, text:'{$grp->mall_name}'},";
			}
		}
		$data['current_malls'] = '[' . $curr_grp . ']';

		// current subcategories
		$curr_grp = '';

		if ($current_subcategories)
		{
			foreach($current_subcategories as $grp)
			{
				$curr_grp .= "{id:{$grp->subcategory_id}, text:'{$grp->subcategory_name}'},";
			}
		}
		$data['current_subcategories'] = '[' . $curr_grp . ']';

		// get the coupons
		$coupons = $this->coupons_model
			->select('coupon_id as id, coupon_description as descr')
			->where('coupon_deleted', 0)
			->find_all();

		$c[''] = '';
		foreach($coupons as $coupon)
		{
			$c[$coupon->id] = (strlen($coupon->descr) > 50)? $coupon->id.' - '.substr($coupon->descr, 0, 50).'...':$coupon->id.' - '.$coupon->descr;
		}
		$data['coupons'] = $c;

		$data['mall_names'] = $this->malls_model
			/*->select('mall_id', 'mall_name')*/
			->where('mall_active', 1)
			->where('mall_deleted', 0)
			->order_by('mall_name', 'asc')
			->find_all();


		// get the subcategories
		$data['subcategories_1']	= $this->subcategories_model->where('subcategory_cat_id = 1')->find_all();
		$data['subcategories_2']	= $this->subcategories_model->where('subcategory_cat_id = 2')->find_all();
		$data['subcategories_3']	= $this->subcategories_model->where('subcategory_cat_id = 3')->find_all();
		$data['subcategories_4']	= $this->subcategories_model->where('subcategory_cat_id = 4')->find_all();
		$data['subcategories_5']	= $this->subcategories_model->where('subcategory_cat_id = 5')->find_all();
		$data['subcategories_6']	= $this->subcategories_model->where('subcategory_cat_id = 6')->find_all();
		$data['subcategories_7']	= $this->subcategories_model->where('subcategory_cat_id = 7')->find_all();
		$data['subcategories_8']	= $this->subcategories_model->where('subcategory_cat_id = 8')->find_all();
		$data['subcategories_9']	= $this->subcategories_model->where('subcategory_cat_id = 9')->find_all();
		$data['subcategories_10'] 	= $this->subcategories_model->where('subcategory_cat_id = 10')->find_all();
		$data['subcategories_11'] 	= $this->subcategories_model->where('subcategory_cat_id = 11')->find_all();

		$this->load->view('news_panels_form', $data);
	}

	function edit($id)
	{
		$this->acl->restrict('Content.News_panels.Edit', 'modal');

		$data['page_heading'] = lang('edit_heading');
		$data['page_type'] = 'edit';

		if ($this->input->post())
		{
			if ($this->_save('edit', $id))
			{
				$this->session->set_flashdata('flash_message', lang('edit_success'));
				echo json_encode(array('success' => true)); exit;
			}
			else
			{	
				$response['success'] = FALSE;
				$response['message'] = lang('validation_error');
				$response['errors'] = array(
					//'news_panel_interest_id' => form_error('news_panel_interest_id'),
					'news_panel_malls' => form_error('news_panel_malls'),
					'news_panel_subcategories' => form_error('news_panel_subcategories'),
					'news_panel_caption' => form_error('news_panel_caption'),
					'news_panel_starts_on' => form_error('news_panel_starts_on'),
					'news_panel_ends_on' => form_error('news_panel_ends_on'),
					'news_panel_brand' => form_error('news_panel_brand'),
					'news_panel_active' => form_error('news_panel_active'),
					'news_panel_brand_news_panel' => form_error('news_panel_brand_news_panel'),
					'news_panel_featured_news_panel' => form_error('news_panel_featured_news_panel'),
					'news_panel_type' => form_error('news_panel_type'),
					'news_panel_image_thumb' => form_error('news_panel_image_thumb'),
					'news_panel_image_small' => form_error('news_panel_image_small'),
					'news_panel_image_medium' => form_error('news_panel_image_medium'),
					'news_panel_image_large' => form_error('news_panel_image_large'),
					'news_panel_image_xlarge' => form_error('news_panel_image_xlarge'),
					'news_panel_category' => form_error('news_panel_category'),
				);
				echo json_encode($response);
				exit;
			}
		}
		else
		{
			$cat_ids = $this->news_panel_malls_model
				->where('news_panel_mall_news_panel_id', $id)
				->find_all();
			if($cat_ids){
				foreach($cat_ids as $category_id){

					$cat_id[]=$category_id->news_panel_mall_mall_id;
				}

				// get the categories
				$c_malls = $this->malls_model
					/*->select('mall_id', 'mall_name')*/
					->where('mall_active', 1)
					->where('mall_deleted', 0)
					->where_in('mall_id', $cat_id)
					->find_all();
				$current_malls = array();
				if(in_array('0', $cat_id)){
					$current_malls[] = array(
						'id' => '0',
						'text' => 'All Malls',
					);
				}
				if($c_malls)
				{
					foreach($c_malls as $cmall)
					{
						$current_malls[] = array(
							'id' => $cmall->mall_id,
							'text' => $cmall->mall_name,
						);
					}
				}
			}
			else{
				$current_malls = '';
			}

			$sub_ids = $this->news_panel_subcategories_model
				->where('news_panel_subcategory_news_panel_id', $id)
				->find_all();
			if($sub_ids){
				foreach($sub_ids as $subcategory_id){

					$sub_id[]=$subcategory_id->news_panel_subcategory_subcategory_id;
				}

				// get the subcategories
				$c_subcategories = $this->subcategories_model
					->where_in('subcategory_id', $sub_id)
					->find_all();
				$current_subcategories = array();
				if($c_subcategories)
				{
					foreach($c_subcategories as $c_subcategory)
					{
						$current_subcategories[] = array(
							'id' => $c_subcategory->subcategory_id,
							'text' => $c_subcategory->subcategory_name,
						);
					}
				}
			}
			else{
				$current_subcategories = '';
			}
		}
		$data['current_malls'] = json_encode($current_malls);//'[' . $curr_grp . ']';
		$data['current_subcategories'] = json_encode($current_subcategories);//'[' . $curr_grp . ']';

		// get the malls
		$data['mall_names'] = $this->malls_model
							/*->select('mall_id', 'mall_name')*/
							->where('mall_active', 1)
							->where('mall_deleted', 0)
							->order_by('mall_name', 'asc')
							->find_all();

		// get the subcategories
		$data['subcategories_1']	= $this->subcategories_model->where('subcategory_cat_id = 1')->find_all();
		$data['subcategories_2']	= $this->subcategories_model->where('subcategory_cat_id = 2')->find_all();
		$data['subcategories_3']	= $this->subcategories_model->where('subcategory_cat_id = 3')->find_all();
		$data['subcategories_4']	= $this->subcategories_model->where('subcategory_cat_id = 4')->find_all();
		$data['subcategories_5']	= $this->subcategories_model->where('subcategory_cat_id = 5')->find_all();
		$data['subcategories_6']	= $this->subcategories_model->where('subcategory_cat_id = 6')->find_all();
		$data['subcategories_7']	= $this->subcategories_model->where('subcategory_cat_id = 7')->find_all();
		$data['subcategories_8']	= $this->subcategories_model->where('subcategory_cat_id = 8')->find_all();
		$data['subcategories_9']	= $this->subcategories_model->where('subcategory_cat_id = 9')->find_all();
		$data['subcategories_10'] 	= $this->subcategories_model->where('subcategory_cat_id = 10')->find_all();
		$data['subcategories_11'] 	= $this->subcategories_model->where('subcategory_cat_id = 11')->find_all();
		$data['record'] = $this->news_panels_model->find($id);

		// get the coupons
		$coupons = $this->coupons_model
			->select('coupon_id as id, coupon_description as descr')
			->where('coupon_deleted', 0)
			->find_all();

		$c[''] = '';
		foreach($coupons as $coupon)
		{
			$c[$coupon->id] = (strlen($coupon->descr) > 50)? $coupon->id.' - '.substr($coupon->descr, 0, 50).'...':$coupon->id.' - '.$coupon->descr;
		}
		$data['coupons'] = $c;
		$data['movie'] = $this->movies_model->find_by(array('movie_id' => $data['record']->news_panel_movie_id));

		$this->load->view('news_panels_form', $data);
	}

	function upload()
	{
		// get the upload folder
		$this->load->library('upload_folders');
		$folder = $this->upload_folders->get();

		$config = array();
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name'] = TRUE;
		//if($_SERVER['CONTENT_LENGTH']>20971520){
//
		//    echo 'The file you are trying to upload exceeds the permitted size'; exit;
		//}

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
//            pr($this->upload);
			echo 'Error in file '.$_FILES['file']['name'].': '.$this->upload->display_errors(); exit;
		}

		$file_data = $this->upload->data();
		log_message('debug', print_r($file_data, TRUE));

		if ($file_data['is_image'] == 1)
		{
			$this->load->library('image_lib');

			$thumb_config['image_library'] = 'gd2';
			$thumb_config['source_image'] = $file_data['full_path'];
			$thumb_config['maintain_ratio'] = FALSE;

			$thumb_config['width'] = 320;
			$thumb_config['height'] = 320;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/thumb_' . $file_data['raw_name']  . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}
			$thumb_config['width'] = 480;
			$thumb_config['height'] = 480;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/small_' . $file_data['raw_name']  . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}

			$thumb_config['width'] = 960;
			$thumb_config['height'] = 960;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/medium_' . $file_data['raw_name'] . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}

			$thumb_config['width'] = 1024;
			$thumb_config['height'] = 1024;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/large_' . $file_data['raw_name'] . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}

			$thumb_config['width'] = 2048;
			$thumb_config['height'] = 2048;
			$thumb_config['quality'] = '75%';
			$thumb_config['new_image'] =  $folder.'/xlarge_' . $file_data['raw_name'] . $file_data['file_ext'];
			$this->image_lib->initialize($thumb_config);

			if ( ! $this->image_lib->resize())
			{
				echo  $this->image_lib->display_errors(); exit;
			}

		}

		$response = array(
			'thumb'		=> $folder . '/thumb_' . $file_data['file_name'],
			'small'		=> $folder . '/small_' . $file_data['file_name'],
			'medium'	=> $folder . '/medium_' . $file_data['file_name'],
			'large'		=> $folder . '/large_' . $file_data['file_name'],
			'xlarge'	=> $folder . '/xlarge_' . $file_data['file_name'],
		);

		echo json_encode($response);
		exit;
	}

	function delete($id)
	{
		$this->acl->restrict('Content.News_panels.Delete', 'modal');

		$data['page_heading'] = lang('delete_heading');
		$data['page_confirm'] = lang('delete_confirm');
		$data['page_success'] = lang('delete_success');
		$data['page_button'] = lang('button_delete');
		$data['datatables_id'] = '#datatables';

		if ($this->input->post())
		{
			$this->news_panels_model->delete($id);

			echo json_encode(array('success' => true)); exit;
		}

		$this->load->view('../../../views/confirm', $data);
	}

	private function _save($type = 'add', $id = 0)
	{
		// validate inputs
		//$this->form_validation->set_rules('news_panel_interest_id', lang('label_interest'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_malls', lang('label_mall_code'), 'required');
		$this->form_validation->set_rules('news_panel_subcategories', lang('label_subcategories'), 'required');
		$this->form_validation->set_rules('news_panel_category', lang('label_category'), 'required');
		$this->form_validation->set_rules('news_panel_caption', lang('label_caption'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_starts_on', lang('label_start'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_ends_on', lang('label_end'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_brand', lang('label_brand'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_link', lang('label_link'), 'trim|xss_clean');
		$this->form_validation->set_rules('news_panel_movie_id', lang('label_movie'), 'trim|xss_clean');
		$this->form_validation->set_rules('news_panel_image_thumb', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_image_small', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_image_medium', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_image_large', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_image_xlarge', lang('label_image'), 'required|trim|xss_clean');
		$this->form_validation->set_rules('news_panel_active', lang('label_active'), 'trim|xss_clean');
		$this->form_validation->set_rules('news_panel_brand_news_panel', lang('label_news_panel_brand_news_panel'), 'trim|xss_clean');
		$this->form_validation->set_rules('news_panel_featured_news_panel', lang('label_news_panel_featured_news_panel'), 'trim|xss_clean');
		$this->form_validation->set_rules('news_panel_type', 'News_panel Type', 'trim|xss_clean');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		
		if ($this->form_validation->run($this) == FALSE)
		{
			return FALSE;
		}

		$movie = $this->movies_model->find_by(array('movie_title' => $this->input->post('news_panel_movie_id')));

		$data = array(
			//'news_panel_interest_id' 		=> $this->input->post('news_panel_interest_id'),
			'news_panel_caption' 			=> $this->input->post('news_panel_caption'),
			'news_panel_category' 		=> $this->input->post('news_panel_category'),
			'news_panel_starts_on' 		=> $this->input->post('news_panel_starts_on'),
			'news_panel_ends_on' 			=> $this->input->post('news_panel_ends_on'),
			'news_panel_brand' 			=> $this->input->post('news_panel_brand'),
			'news_panel_link' 			=> $this->input->post('news_panel_link'),
			'news_panel_active' 			=> ($this->input->post('news_panel_active'))? 'Active': 'Hidden',
			'news_panel_type' 			=> $this->input->post('news_panel_type'),
			'news_panel_movie_id' 		=> ($movie)? $movie->movie_id: '',
			'news_panel_image_thumb' 		=> $this->input->post('news_panel_image_thumb'),
			'news_panel_image_small' 		=> $this->input->post('news_panel_image_small'),
			'news_panel_image_medium' 	=> $this->input->post('news_panel_image_medium'),
			'news_panel_image_large' 		=> $this->input->post('news_panel_image_large'),
			'news_panel_image_xlarge' 	=> $this->input->post('news_panel_image_xlarge'),
			'news_panel_coupon_id' 		=> $this->input->post('news_panel_coupon_id'),
			'news_panel_is_external'		=> ($this->input->post('news_panel_is_external'))? 1:0,
			'news_panel_brand_news_panel'		=> ($this->input->post('news_panel_brand_news_panel'))? 1:0,
			'news_panel_featured_news_panel'		=> ($this->input->post('news_panel_featured_news_panel'))? 1:0,
		);

		// if (!empty($_FILES['file']['name']))
		// {
		// 	$data['news_panel_image_small'] = 'small_'.$_FILES['file']['name'];
		// 	$data['news_panel_image_medium'] = 'medium_'.$_FILES['file']['name'];
		// 	$data['news_panel_image_large'] = 'large_'.$_FILES['file']['name'];
		// 	$data['news_panel_image_xlarge'] = 'xlarge_'.$_FILES['file']['name'];
		// 	$data['news_panel_image_thumb'] = 'thumb_'.$_FILES['file']['name'];
		// }

		$malls = $this->input->post('news_panel_malls');
		$subcategories = $this->input->post('news_panel_subcategories');
		if ($type == 'add')
		{
			$insert_id = $this->news_panels_model->insert($data);
			if (isset($malls) && !empty($malls))
			{
				foreach ($malls as $mall)
				{
					$this->news_panel_malls_model->insert(array('news_panel_mall_news_panel_id' => $insert_id, 'news_panel_mall_mall_id' => $mall));
				}
			}
			if (isset($subcategories) && !empty($subcategories))
			{
				foreach ($subcategories as $subcategory)
				{
					$this->news_panel_subcategories_model->insert(array('news_panel_subcategory_news_panel_id' => $insert_id, 'news_panel_subcategory_subcategory_id' => $subcategory));
				}
			}
			$return = (is_numeric($insert_id)) ? $insert_id : FALSE;
		}
		else if ($type == 'edit')
		{
			//var_dump($malls);
			if (isset($malls) && !empty($malls))
			{
				$this->news_panel_malls_model->delete_where(array('news_panel_mall_news_panel_id' => $id));

				foreach ($malls as $mall)
				{
					$this->news_panel_malls_model->insert(array('news_panel_mall_news_panel_id' => $id, 'news_panel_mall_mall_id' => $mall));
				}
			}
			//var_dump($malls);
			if (isset($subcategories) && !empty($subcategories))
			{
				$this->news_panel_subcategories_model->delete_where(array('news_panel_subcategory_news_panel_id' => $id));

				foreach ($subcategories as $subcategory)
				{
					$this->news_panel_subcategories_model->insert(array('news_panel_subcategory_news_panel_id' => $id, 'news_panel_subcategory_subcategory_id' => $subcategory));
				}
			}
			$return = $this->news_panels_model->update($id, $data);
		}

		return $return;

	}

	/*public function search()
	{
		$records = $this->news_panels_model
			->select ('news_panel_brand')
			->where('news_panel_brand like', '%' . $this->input->get('term') . '%')
			->group_by('news_panel_brand')
			->where('news_panel_active', 1)
			->where('news_panel_deleted', 0)
			->find_all();

		$return = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$return[] = $record->news_panel_brand;
			}
		}
		header('Content-Type: application/json');
		echo json_encode($return);
		exit;
	}*/
}

/* End of file news_panels.php */
/* Location: ./application/modules/news_panels/controllers/news_panels.php */