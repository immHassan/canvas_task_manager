<?php 

class Task extends Front_Controller {

    function __construct() {
        parent::__construct();  
    }  

    public function index($project_id = ""){
        $data = array();
        $data['table'] = 'project';
        $data['where'] = array('project_id' => $project_id);
        $data['output_type'] = 'row';
        $content['project'] = $this->general->get($data);

        if(empty($content['project']) || empty($project_id)){
            redirect('dashboard');
        }

        $data = array();
        $data['select'] = '*,task.task_id as tid, (
        SELECT COUNT(*)
        FROM comment WHERE task_id = tid
        ) AS comment_count';

        $data['table'] = 'task';
        $data['where'] = array('project_id' => $project_id);
        $data['join_array'] = array(
            array(
                'join' => 'task.department_id = department.department_id',
                'join_type' => 'LEFT',
                'join_table' => 'department',
            ),
            array(
                'join' => 'task.task_stage_id = task_stage.task_stage_id',
                'join_type' => 'LEFT',
                'join_table' => 'task_stage',
            ),            
        );
        $data['output_type'] = 'result';
        $data['order_by_col'] = 'task_id';
        $data['order_by'] = 'DESC';
        $content['tasks'] = $this->general->get($data);

        $data = array();
        $data['table'] = 'department';
        $data['output_type'] = 'result';
        $content['departments'] = $this->general->get($data);        

    	$content['main_content'] = 'task';
        $this->load->view('front/inc/view',$content);
    }

    public function add(){
        $content = array(
            'task_name' => $this->input->post('task_name', TRUE),
            'task_description' => $this->input->post('task_description', TRUE),
            'department_id' => $this->input->post('department_id', TRUE),
            'project_id' => $this->input->post('project_id', TRUE),
            'brand_id' => $this->input->post('brand_id', TRUE),
            'task_due_date' => $this->input->post('task_due_date', TRUE), 
            'task_stage_id' => $this->input->post('task_stage_id', TRUE),             
            'task_created_by' => $this->session->userdata('user_id'),
            'task_uuid' => uniqid('T'),      
        );

        $data['table'] = 'task';
        $this->general->insert($data,$content);

        redirect('task/'.$this->input->post('project_id', TRUE));
    }



    public function stages($department_id = ""){
        $data['table'] = 'task_stage';
        $data['where'] = array('department_id' => $department_id);
        $data['output_type'] = 'result';
        $records  = $this->general->get($data); 

        if(!empty($records)){
            foreach($records as $record){
                echo '<option value="'.$record->task_stage_id.'">'.$record->task_stage_name.'</option>';
            }
        }
        else{
            echo "";
        }
    }


    public function view($task_id = ""){
        $data['select'] = '*,task.department_id as team_id';
        $data['table'] = 'task';
        $data['join_array'] = array(
            array(
                'join' => 'task.department_id = department.department_id',
                'join_type' => 'LEFT',
                'join_table' => 'department',
            ),
            array(
                'join' => 'task.task_stage_id = task_stage.task_stage_id',
                'join_type' => 'LEFT',
                'join_table' => 'task_stage',
            ),
            array(
                'join' => 'user.user_id = task.task_created_by',
                'join_type' => 'LEFT',
                'join_table' => 'user',
            ),            
        );        
        $data['output_type'] = 'row';
        $data['where'] = array('task_id' => $task_id);
        $records = $this->general->get($data);

        $records->task_created_at = date('D d-m-y, h:i:sa', strtotime($records->task_created_at));


        $data = array();
        $data['table'] = 'task_stage';
        $data['where'] = array('department_id' => $records->team_id);
        $data['output_type'] = 'result';
        $task_stages = $this->general->get($data); 

        $records->task_stages = $task_stages;


        $data = array();
        $data['select'] = 'comment.*, user.user_first_name, user.user_last_name,user.user_id';
        $data['table'] = 'comment';
        $data['where'] = array('task_id' => $records->task_id);
        $data['output_type'] = 'result';
        $data['order_by_col'] = 'comment_id';
        $data['order_by'] = 'ASC';
        $data['join'] = 'comment.comment_created_by = user.user_id';
        $data['join_table'] = 'user';
        $data['join_type'] = 'LEFT';
        $task_comments = $this->general->get($data); 

        $records->task_comments = $task_comments;


        echo json_encode($records);
    }

    public function task_stage_update(){
        if(empty($this->input->post('task_id',TRUE)) && empty($this->input->post('task_stage_id',TRUE))){
            echo "failed";
        }
        else{
            $data['table'] = 'task';
            $data['where'] = array('task_id' => $this->input->post('task_id',TRUE));
            $content = array(
                'task_stage_id' => $this->input->post('task_stage_id',TRUE),
            );

            if($this->general->update($data,$content)){
                echo "success";
                $data = array();
                $data['table'] = 'comment';
                $content = array(
                    'comment_type' => 'log',
                    'task_stage_id' => $this->input->post('task_stage_id',TRUE),
                    'comment_created_by' => $this->session->userdata('user_id'),
                    'project_id' => $this->input->post('project_id'),
                    'task_id' => $this->input->post('task_id'),
                );
                $this->general->insert($data,$content);

            }else{
                echo "failed";
            }
        }
    }


}
