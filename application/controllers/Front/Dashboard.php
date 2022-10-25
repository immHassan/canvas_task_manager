<?php 

class Dashboard extends Front_Controller {

    function __construct() {
        parent::__construct();  
        if($this->uri->segment(1) ==''){
            redirect('dashboard');
        }    
    }  

    public function index(){

    	


    	$content['main_content'] = 'projects';
        $this->load->view('front/inc/view',$content);
    }

}
