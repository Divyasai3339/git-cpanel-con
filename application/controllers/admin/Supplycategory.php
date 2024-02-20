<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Supplycategory extends Admin_Controller
{
    public function supply()
    {
        if (!$this->rbac->hasPrivilege('supply', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'supply/index');
        $supply         = $this->input->post("supply");
        $data["title"]    = $this->lang->line('add_supply');
        $supply         = $this->supply_category_model->getSupply();
        $data["supply"] = $supply;
        $this->form_validation->set_rules(
            'supply', $this->lang->line('supply'), array('required',
                array('check_exists', array($this->supply_category_model, 'valid_supply')),
            )
        );
        if ($this->form_validation->run()) {
            $supply = $this->input->post("supply");
            $supply = $this->input->post("id");
            if (empty($supply)) {
                if (!$this->rbac->hasPrivilege('supply', 'can_add')) {
                    access_denied();
                }
            } else {
                if (!$this->rbac->hasPrivilege('supply', 'can_edit')) {
                    access_denied();
                }
            }
            if (!empty($supply)) {
                $data = array('supply' => $supply, 'id' => $supply);
            } else {

                $data = array('supply' => $supply);
            }

            $insert_id = $this->supply_category_model->addsupply($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> ' . $this->lang->line('record_added_successfully') . '</div>');
            redirect("admin/Supplycategory/supply");
        } else {
            $this->load->view("layout/header");
            $this->load->view("admin/stores/supply", $data);
            $this->load->view("layout/footer");
        }
    }

    public function add()
    {
        if ((!$this->rbac->hasPrivilege('supply', 'can_add')) || (!$this->rbac->hasPrivilege('supply', 'can_edit'))) {
            access_denied();
        }
        $supply = $this->input->post("supply");
        $this->form_validation->set_rules(
            'supply', $this->lang->line('product_category'), array('required',
                array('check_exists', array($this->supply_category_model, 'valid_supply')),
            )
        );
        if ($this->form_validation->run() == false) {
            $msg = array(
                'name' => form_error('supply'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $supply = $this->input->post("supply");
            if (!empty($supply)) {
                $data  = array('supply' => $supply, 'id' => $supply);
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('update_message'));
            } else {
                $data  = array('supply' => $supply);
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            }
            $insert_id = $this->supply_category_model->addsupply($data);
        }
        echo json_encode($array);
    }

    public function get()
    {
        //get product data and encode to be JSON object
        header('Content-Type: application/json');
        echo $this->supply_category_model->getall();
    }

    public function edit($id)
    {
        if (!$this->rbac->hasPrivilege('supply', 'can_view')) {
            access_denied();
        }
        $result           = $this->supply_category_model->getCategory($id);
        $data["result"]   = $result;
        $data["title"]    = $this->lang->line('edit_category');
        $supply         = $this->supply_category_model->getProductCategory();
        $data["supply"] = $supply;
        $this->load->view("layout/header");
        $this->load->view("admin/stores/supply", $data);
        $this->load->view("layout/footer");
    }

    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('supply', 'can_delete')) {
            access_denied();
        }
        $this->supply_category_model->delete($id);
        redirect('admin/productcategory/product');
    }

    public function get_data($id)
    {
        if (!$this->rbac->hasPrivilege('supply', 'can_view')) {
            access_denied();
        }
        $result = $this->supply_category_model->getProductCategory($id);
        echo json_encode($result);
    }

}
