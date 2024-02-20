<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Productcategory extends Admin_Controller
{

    public function index()
    {
        if (!$this->rbac->hasPrivilege('product', 'can_view')) {
            access_denied();
        }
        if ($this->rbac->hasPrivilege('product_category', 'can_view')) {
            redirect('admin/productcategory/product');
        } else
        if ($this->rbac->hasPrivilege('product_supply', 'can_view')) {
            redirect('admin/productcategory/supply');
        } else
        if ($this->rbac->hasPrivilege('product_dosage', 'can_view')) {
            redirect('admin/productdosage');
        }

        $this->product();
    }

    public function product()
    {

        if (!$this->rbac->hasPrivilege('product_category', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'product/index');
        $this->session->set_userdata('sub_sidebar_menu', 'admin/productcategory/product');
        $productcategoryid       = $this->input->post("productcategoryid");
        $data["title"]            = $this->lang->line('add_product_category');
        $productCategory         = $this->product_category_model->getProductCategory();
        $data["productCategory"] = $productCategory;
        $this->form_validation->set_rules(
            'product_category', $this->lang->line('product_category'), array('required',
                array('check_exists', array($this->product_category_model, 'valid_product_category')),
            )
        );
        if ($this->form_validation->run()) {
            $productCategory   = $this->input->post("product_category");
            $productcategoryid = $this->input->post("id");
            if (empty($productcategoryid)) {
                if (!$this->rbac->hasPrivilege('product_category', 'can_add')) {
                    access_denied();
                }
            } else {
                if (!$this->rbac->hasPrivilege('product_category', 'can_edit')) {
                    access_denied();
                }
            }
            if (!empty($productcategoryid)) {
                $data = array('product_category' => $productCategory, 'id' => $productcategoryid);
            } else {
                $data = array('product_category' => $productCategory);
            }

            $insert_id = $this->product_category_model->addProductCategory($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('record_added_successfully') . '</div>');
            redirect("admin/productcategory/product");
        } else {
            $this->load->view("layout/header");
            $this->load->view("admin/stores/product_category", $data);
            $this->load->view("layout/footer");
        }
    }

    public function supply()
    {
        if (!$this->rbac->hasPrivilege('product_supply', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setup');
        $this->session->set_userdata('sub_menu', 'product/index');
        $this->session->set_userdata('sub_sidebar_menu', 'admin/productcategory/supply');
        $productcategoryid       = $this->input->post("productcategoryid");
        $data["title"]            = $this->lang->line('add_supply');
        $supplyCategory         = $this->product_category_model->getSupplyCategoryPat();
        $data["supplyCategory"] = $supplyCategory;
        $this->form_validation->set_rules(
            'supply_category', $this->lang->line('supply_name'), array('required',
                array('check_exists', array($this->product_category_model, 'valid_supply_category')),
            )
        );
        if ($this->form_validation->run()) {
            $supplyCategory   = $this->input->post("supply_category");
            $supplycategoryid = $this->input->post("id");
            if (empty($supplycategoryid)) {
                if (!$this->rbac->hasPrivilege('supply_category', 'can_add')) {
                    access_denied();
                }
            } else {
                if (!$this->rbac->hasPrivilege('supply_category', 'can_edit')) {
                    access_denied();
                }
            }
            if (!empty($supplycategoryid)) {
                $data = array('supply_category' => $supplyCategory, 'id' => $supplycategoryid);
            } else {

                $data = array('supply_category' => $supplyCategory);
            }

            $insert_id = $this->product_category_model->addProductCategory($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">' . $this->lang->line('record_added_successfully') . '</div>');
            redirect("admin/productcategory/supply");
        } else {
            $this->load->view("layout/header");
            $this->load->view("admin/stores/supply_category", $data);
            $this->load->view("layout/footer");
        }
    }

    public function add()
    {
        if ((!$this->rbac->hasPrivilege('product_category', 'can_add')) || (!$this->rbac->hasPrivilege('product_category', 'can_edit'))) {
            access_denied();
        }
        $productcategoryid = $this->input->post("productcategoryid");
        $this->form_validation->set_rules(
            'product_category', $this->lang->line('product_category'), array('required',
                array('check_exists', array($this->product_category_model, 'valid_product_category')),
            )
        );
        if ($this->form_validation->run() == false) {
            $msg = array(
                'name' => form_error('product_category'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $productCategory = $this->input->post("product_category");
            if (!empty($productcategoryid)) {
                $data  = array('product_category' => $productCategory, 'id' => $productcategoryid);
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('update_message'));
            } else {
                $data  = array('product_category' => $productCategory);
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            }
            $insert_id = $this->product_category_model->addProductCategory($data);
        }
        echo json_encode($array);
    }

    public function addsupply()
    {

        if ((!$this->rbac->hasPrivilege('product_supply', 'can_add')) || (!$this->rbac->hasPrivilege('product_supply', 'can_edit'))) {
            access_denied();
        }
        $supplycategoryid = $this->input->post("supplycategoryid");
        $this->form_validation->set_rules(
            'supply_category', $this->lang->line('supply_name'), array('required',
                array('check_exists', array($this->product_category_model, 'valid_supply_category')),
            )
        );
        if ($this->form_validation->run() == false) {
            $msg = array(
                'supply_category'       => form_error('supply_category'),
                'contact'                 => form_error('contact'),
                'supply_person'         => form_error('supply_person'),
                'supply_person_contact' => form_error('supply_person_contact'),
                'address'                 => form_error('address'),
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
            $supplyCategory      = $this->input->post("supply_category");
            $contact               = $this->input->post('contact');
            $supplyperson        = $this->input->post('supply_person');
            $supplypersoncontact = $this->input->post('supply_person_contact');
            $supplydruglicence   = $this->input->post('supply_drug_licence');
            $address               = $this->input->post('address');
            if (!empty($supplycategoryid)) {
                $data = array('supply'  => $supplyCategory,
                    'id'                      => $supplycategoryid,
                    'contact'                 => $contact,
                    'supply_person'         => $supplyperson,
                    'supply_person_contact' => $supplypersoncontact,
                    'supply_drug_licence'   => $supplydruglicence,
                    'address'                 => $address,
                );
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('update_message'));
            } else {
                $data = array('supply'  => $supplyCategory,
                    'contact'                 => $contact,
                    'supply_person'         => $supplyperson,
                    'supply_person_contact' => $supplypersoncontact,
                    'supply_drug_licence'   => $supplydruglicence,
                    'address'                 => $address,
                );
                $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('success_message'));
            }
            $insert_id = $this->product_category_model->addSupplyCategory($data);
        }
        echo json_encode($array);
    }

    public function get()
    {
        //get product data and encode to be JSON object
        header('Content-Type: application/json');
        echo $this->product_category_model->getall();
    }

    public function edit($id)
    {
        if (!$this->rbac->hasPrivilege('product_category', 'can_view')) {
            access_denied();
        }
        $result                   = $this->product_category_model->getProductCategory($id);
        $data["result"]           = $result;
        $data["title"]            = $this->lang->line('edit_category');
        $productCategory         = $this->product_category_model->getProductCategory();
        $data["productCategory"] = $productCategory;
        $this->load->view("layout/header");
        $this->load->view("admin/stores/product_category", $data);
        $this->load->view("layout/footer");
    }

    public function delete($id)
    {
        if (!$this->rbac->hasPrivilege('product_category', 'can_delete')) {
            access_denied();
        }
        $this->product_category_model->delete($id);
        redirect('admin/productcategory/product');
    }

    public function deletesupply($id)
    {
        if (!$this->rbac->hasPrivilege('product_category', 'can_delete')) {
            access_denied();
        }

        $this->product_category_model->deletesupply($id);
        echo json_encode(array('status' => 1, 'msg' => $this->lang->line('delete_message')));
    }

    public function get_data($id)
    {
        if (!$this->rbac->hasPrivilege('product_category', 'can_view')) {
            access_denied();
        }
        $result = $this->product_category_model->getProductCategory($id);
        echo json_encode($result);
    }

    public function get_datasupply($id)
    {
        if (!$this->rbac->hasPrivilege('product_category', 'can_view')) {
            access_denied();
        }
        $result = $this->product_category_model->getSupplyCategory($id);
        echo json_encode($result);
    }

}
