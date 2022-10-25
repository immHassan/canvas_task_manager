<?php 

class User extends Front_Controller {

    function __construct() {
        parent::__construct();  
    }  

    public function index(){
    	$content['main_content'] = 'users';
        $this->load->view('front/inc/view',$content);
    }

}
