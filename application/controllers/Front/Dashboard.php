<?php 

class Dashboard extends Front_Controller {

    function __construct() {
        parent::__construct();
        redirect('project');
    }  

    public function index(){
    	$content['main_content'] = 'projects';
        $this->load->view('front/inc/view',$content);
    }

}
