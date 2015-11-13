<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Facebook_ion_auth {

	/*
		Library for login with facebook and create a ion_auth compatibility session. 

		author: Daniel Georgiev
		website: http://dgeorgiev.biz
	*/

	public function __construct() {

		// get Codeigniter instance
	    $this->CI =& get_instance();

	    // Load config
	    $this->CI->load->config('user/facebook_ion_auth', TRUE);

		$this->app_id = $this->CI->config->item('app_id', 'facebook_ion_auth');
		$this->app_secret = $this->CI->config->item('app_secret', 'facebook_ion_auth'); 
		$this->scope = $this->CI->config->item('scope', 'facebook_ion_auth');
		
		if($this->CI->config->item('redirect_uri', 'facebook_ion_auth') === '' ) {
			$this->my_url = site_url(''); 
		} else {
			$this->my_url = $this->CI->config->item('redirect_uri', 'facebook_ion_auth');
		}

		$this->fb_password = $this->CI->config->item('fb_password', 'facebook_ion_auth');
		
	}

    public function login() {

    	// null at first
		$code = $this->CI->input->get('code');
		
		// if is not set go make a facebook connection
		if(!$code) {

			// create a unique state
			$state = md5(uniqid(rand(), TRUE));
	   		$this->CI->session->set_userdata('state', $state);

	   		// redirect to facebook oauth page
	   		$url_to_redirect =  "https://www.facebook.com/dialog/oauth?client_id=" 
	       						.$this->app_id
	       						."&redirect_uri=".urlencode($this->my_url)
	       						."&state=".$state.'&scope='.$this->scope;
	       	// echo $url_to_redirect; exit;
	       	redirect($url_to_redirect);

	   	} else {

	   		// check if session state is equal to the returned state
			if ($this->CI->session->userdata('state') && ($this->CI->session->userdata('state') === $this->CI->input->get('state'))) 
			{

				$token_url = "https://graph.facebook.com/oauth/access_token?"
			       . "client_id=" . $this->app_id . "&redirect_uri=" . urlencode($this->my_url)
			       . "&client_secret=" . $this->app_secret . "&code=" . $code;

				$response = file_get_contents($token_url);
				// pr($response); exit;
				$params = null;

				parse_str($response, $params);
				// pr($params);

				$this->CI->session->set_userdata('access_token', $params['access_token']);

				$graph_url = "https://graph.facebook.com/me?fields=id,first_name,last_name,email&access_token=".$params['access_token'];

				$fbuser = json_decode(file_get_contents($graph_url));
				// pr($fbuser); exit;

				// check if this user is already registered
				if(!$this->CI->ion_auth_model->identity_check($fbuser->email))
				{
					$user_id = $this->CI->ion_auth->register($fbuser->email, $this->fb_password, $fbuser->email, array('first_name' => $fbuser->first_name, 'last_name' => $fbuser->last_name));

					$login = $this->CI->ion_auth->login($fbuser->email, $this->fb_password, 1);

				} else 
				{
					$login = $this->CI->ion_auth->login($fbuser->email, $this->fb_password, 1);
				}

				return true;
		    }
		    else {
		   		return false;
		    }
	    }
    }
}

/* End of file Facebook_ion_auth.php */