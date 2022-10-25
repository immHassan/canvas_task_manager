<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();	  
		

		if(!$this->session->userdata('user_id')){		
			$this->uri->segment(1)==''||$this->uri->segment(1)=='login'||$this->uri->segment(1)=='forgot-password'||$this->uri->segment(1)=='reset-password'?'':redirect('login');
		}   

		$data = array();
		$data['table'] = 'settings';
		$data['output_type'] = 'row';
		$data['where'] = array('settings_id' => 1);
		$website_settings = $this->general->get($data);
		
		$this->header_logo = $website_settings->settings_logo;
		$this->footer_logo = $website_settings->settings_footer_logo;
		$this->favicon = $website_settings->settings_favicon;		
		$this->site_title = $website_settings->settings_site_title;	
		$this->settings_email_to = $website_settings->settings_email_to;	
		
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');


	}

}
