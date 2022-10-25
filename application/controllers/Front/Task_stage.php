<?php

class Task_stage extends Front_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array();
        $data['table'] = 'task_stage';
        $data['order_by'] = 'DESC';
        $data['order_by_col'] = 'task_stage_id';
        $data['output_type'] = 'result';
        $content['task_stage'] = $this->general->get($data);
        $content['main_content'] = 'task_stage';
        $this->load->view('front/inc/view', $content);
    }

    public function add($form_choice = "", $id = "")
    {
        if ($_POST) {
            $content = array(
                'task_stage_name' => $this->input->post('task_stage_name', TRUE),
            );

            if ($_FILES) {

                $image_feild = 'task_stage_logo';
                $image_folder = 'task_stage';
                if ($_FILES[$image_feild]['size'] > 0) {
                    $_FILES[$image_feild]['name'] = $_FILES[$image_feild]['size'] . '-' . $_FILES[$image_feild]['name'];
                    $image = single_image_upload($_FILES[$image_feild], './uploads/' . $image_folder);
                    if (is_array($image)) {
                        $this->session->set_flashdata('error', $image);
                    } else {
                        $content[$image_feild] = $image;
                    }
                }
            }

            $data = array();
            $data['table'] = 'task_stage';
            $this->general->insert($data, $content);
            $this->session->set_flashdata('success', 'Added Successfully.');
            redirect('task_stage');
        }
    }




    public function update($id = "")
    {
        if ($_POST) {
            $content = array(
                'task_stage_name' => $this->input->post('task_stage_name_e', TRUE),
            );

            if ($_FILES) {

                $image_feild = 'task_stage_logo_e';
                $image_folder = 'task_stage';
                if ($_FILES[$image_feild]['size'] > 0) {
                    $_FILES[$image_feild]['name'] = $_FILES[$image_feild]['size'] . '-' . $_FILES[$image_feild]['name'];
                    $image = single_image_upload($_FILES[$image_feild], './uploads/' . $image_folder);
                    if (is_array($image)) {
                        $this->session->set_flashdata('error', $image);
                    } else {

                        if ($image_feild == 'task_stage_logo_e') {
                            $image_feild = 'task_stage_logo';
                        }
                        $content[$image_feild] = $image;
                    }
                }
            }


            $where_id = $this->uri->segment(1) . '_id';
            $data['where'] = array($where_id => $id);
            $data['table'] = $this->uri->segment(1);

            $this->general->update($data, $content);
            $this->session->set_flashdata('success', 'Updated Successfully.');
            redirect($this->uri->segment(1));
        }
    }








    public function get_record($id = "")
    {
        if (!$id) {
            redirect($this->uri->segment(1));
        }


        $where_id = $this->uri->segment(1) . '_id';
        $where_status = $this->uri->segment(1) . '_status';
        $data['where'] = array($where_id => $id);
        $data['table'] = $this->uri->segment(1);
        $data['output_type'] = 'row';
        $result  = $this->general->get($data);

        echo json_encode(array('message' => 'fetched successfully', 'success' => true, 'data' => $result));
    }



    public function delete($id)
    {
        $where_id = $this->uri->segment(1) . '_id';
        $where_status = $this->uri->segment(1) . '_status';
        $data['where'] = array($where_id => $id);
        $data['table'] = $this->uri->segment(1);
        $data['output_type'] = 'row';
        $content['record']  = $this->general->get($data);

        $content = array(
            $where_status => 'disable',
        );
        $data['where'] = array($where_id => $id);
        $data['table'] = $this->uri->segment(1);
        $this->general->update($data, $content);
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect($this->uri->segment(1));
    }
}
