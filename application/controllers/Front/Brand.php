<?php 

class Brand extends Front_Controller {

    function __construct() {
        parent::__construct();  
    }  

    public function index(){
    	$content['main_content'] = 'brands';
        $this->load->view('front/inc/view',$content);
    }

}