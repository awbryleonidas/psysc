<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overview extends MX_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->language('overview');
        $this->load->model('settings/application_model');
    }

    public function index()
    {
        $data['page_heading'] = lang('index_heading');
        $data['page_subhead'] = lang('index_subhead');

        $this->session->set_userdata('redirect', current_url());

        /*$this->fetch_region();*/
        /*if($this->input->post())
        {
            if ($this->_send('save'))
            {
                //$data['project'] = $this->input->post('campaign_name');
                redirect('', 'refresh');
            }

        }*/

        $data['config'] = $this->application_model->format_dropdown('config_name', 'config_value');
        // render the page
        $this->template->add_css('assets/plugins/datepicker/css/bootstrap-datepicker3.css');
        $this->template->add_js('assets/plugins/datepicker/js/bootstrap-datepicker.min.js');


        $this->template->add_css('assets/css/extra/extra.css?f=overview/views/css/overview_index.css');
        $this->template->add_js('assets/js/extra/extra.js?f=overview/views/js/overview_index.js');
        $this->template->write_view('content', 'overview_index', $data);
        $this->template->render();
    }
}

/* End of file overview.php */
/* Location: ./application/modules/overview/controllers/overview.php */