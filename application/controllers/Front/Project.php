<?php

class Project extends Front_Controller
{

    function __construct()
    {
        parent::__construct();  
        if($this->uri->segment(1) ==''){
            redirect('project');
        }    
    }

    public function index()
    {
        $data = array();
        $data['table'] = 'brand';
        $data['order_by'] = 'DESC';
        $data['order_by_col'] = 'brand_id';
        $data['output_type'] = 'result';
        $content['brand'] = $this->general->get($data);

        $data = array();
        $data['table'] = 'project';
        $data['order_by'] = 'DESC';
        $data['order_by_col'] = 'project_id';
        $data['output_type'] = 'result';
        $content['project'] = $this->general->get($data);
        $content['main_content'] = 'project';
        $this->load->view('front/inc/view', $content);
    }

    public function add($form_choice = "", $id = "")
    {
        if ($_POST) {
            $content = array(
                'brand_id' => $this->input->post('brand_id', TRUE),
                'project_title' => $this->input->post('project_title', TRUE),
                'client_name' => $this->input->post('client_name', TRUE),
                'client_email' => $this->input->post('client_email', TRUE),
                'client_phone' => $this->input->post('client_phone', TRUE),
            );

            if ($_FILES) {
            	$image_feild = 'project_logo';
                $image_folder = 'project';
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
            $data['table'] = 'project';
            $this->general->insert($data, $content);
            $this->session->set_flashdata('success', 'Added Successfully.');
            redirect('project');
        }
    }




    public function update($id = "")
    {
        if ($_POST) {
            $content = array(
                'brand_id' => $this->input->post('brand_id_e', TRUE),
                'project_title' => $this->input->post('project_title_e', TRUE),
                'client_name' => $this->input->post('client_name_e', TRUE),
                'client_email' => $this->input->post('client_email_e', TRUE),
                'client_phone' => $this->input->post('client_phone_e', TRUE),
            );

            if ($_FILES) {

                $image_feild = 'project_logo_e';
                $image_folder = 'project';
                if ($_FILES[$image_feild]['size'] > 0) {
                    $_FILES[$image_feild]['name'] = $_FILES[$image_feild]['size'] . '-' . $_FILES[$image_feild]['name'];
                    $image = single_image_upload($_FILES[$image_feild], './uploads/' . $image_folder);
                    if (is_array($image)) {
                        $this->session->set_flashdata('error', $image);
                    } else {

                        if ($image_feild == 'project_logo_e') {
                            $image_feild = 'project_logo';
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
