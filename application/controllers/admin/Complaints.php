<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Complaints extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('complaints_model');
    }

    public function index()
    {
        // if (!$this->rbac->hasPrivilege('finding_type', 'can_view') || !$this->rbac->hasPrivilege('finding_head', 'can_view')) {
        //     access_denied();
        // }
        if (!$this->rbac->hasPrivilege('complaint', 'can_view') || !$this->rbac->hasPrivilege('complaint', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'finding/index');
        $this->session->set_userdata('sub_sidebar_menu', 'setup/finding/finding_head');
        $data['title']             = $this->lang->line('finding_head_list');
        $finding_result            = $this->complaints_model->get();
        $data['findingresult']     = $finding_result;
        $findingresult             = $this->complaints_model->getfindingcategory();
        $data['findingresulttype'] = $findingresult;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/complaints/complaintslist', $data);
        $this->load->view('layout/footer', $data);
    }

    public function category()
    {        
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'finding/index');
        $this->session->set_userdata('sub_sidebar_menu', 'setup/finding/category');
        $data['title']         = $this->lang->line('finding_type_list');
        $finding_result        = $this->complaints_model->getfindingcategory();
        $data['findingresult'] = $finding_result;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/complaints/categorylist', $data);
        $this->load->view('layout/footer', $data);
    }

    public function view($id)
    {
        $data['title']    = $this->lang->line('finding_head_list');
        $category         = $this->complaints_model->get($id);
        $data['category'] = $category;
        $this->load->view('layout/header', $data);
        $this->load->view('admin/complaints/complaintsShow', $data);
        $this->load->view('layout/footer', $data);
    }

    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('finding_head', 'can_delete')) {
            access_denied();
        }
        $data['title'] = $this->lang->line('finding_head_list');
        $this->finding_model->remove($id);
        echo json_encode(array("status" => 1, "msg" => $this->lang->line('delete_message')));
    }

    public function deletefindingtype($id)
    {
        if (!$this->rbac->hasPrivilege('finding_type', 'can_delete')) {
            access_denied();
        }
        $data['title'] = $this->lang->line('finding_type');
        $this->complaints_model->removefindingtype($id);
        echo json_encode(array("status" => 1, "msg" => $this->lang->line('delete_message')));
    }

    public function create()
    {
        $data['title']        = $this->lang->line('add_finding_head');
        $category_result      = $this->complaints_model->get();
        $data['categorylist'] = $category_result;
        $this->form_validation->set_rules('complaints', $this->lang->line('finding_head'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/complaints/complaintsList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'name'        => $this->input->post('name'),
                'description' => $this->input->post('description'),
            );
            $this->complaints_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('income_head_added_successfully') . '</div>');
            redirect('admin/complaints/index');
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('name', $this->lang->line('complaints'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', $this->lang->line('category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $msg = array(
                'name' => form_error('name'),
                'type' => form_error('type'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            $data = array(
                'name'                => $this->input->post('name'),
                'complaint_category_id' => $this->input->post('type'),
                'description'         => $this->input->post('description'),
            );
            $this->complaints_model->add($data);
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('new_income_head_successfully_inserted'));
        }

        echo json_encode($array);
    }

    public function addcomplaintscategory()
    {
        $this->form_validation->set_rules('complaints_category', $this->lang->line('complaints_category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {

            $msg = array(
                'complaints_category' => form_error('complaints_category'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            $data = array(
                'category' => $this->input->post('complaints_category'),
            );
            $this->complaints_model->addfindingtype($data);
            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('new_finding_type_successfully_inserted'));
        }

        echo json_encode($array);
    }

    public function edit()
    {
        $id = $this->input->post('finding_id');
        $this->form_validation->set_rules('name', $this->lang->line('finding'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $msg = array(
                'name' => form_error('finding'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            $data = array(
                'id'                  => $id,
                'name'                => $this->input->post('name'),
                'finding_category_id' => $this->input->post('type'),
                'description'         => $this->input->post('description'),
            );
            $this->finding_model->add($data);

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('finding_head_successfully_updated'));
        }

        echo json_encode($array);
    }

    public function editcategory()
    {

        if (!$this->rbac->hasPrivilege('complaints_category', 'can_edit')) {
            access_denied();
        }

        $id = $this->input->post('complaints_id');
        $this->form_validation->set_rules('complaints_category', $this->lang->line('complaints_category'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $msg = array(
                'complaints_category' => form_error('complaints_category'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

            $data = array(
                'id'       => $id,
                'category' => $this->input->post('complaints_category'),

            );
            $this->complaints_model->addfindingtype($data);

            $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('finding_type_successfully_updated'));
        }

        echo json_encode($array);
    }

    public function get_data($id)
    {
        $finding_result = $this->complaints_model->get($id);
        echo json_encode($finding_result);
    }

    public function getfindingcategory($id)
    {
        $finding_result = $this->complaints_model->getfindingcategory($id);
        echo json_encode($finding_result);
    }

}
