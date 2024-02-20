<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product_category_model extends MY_model
{

    public function valid_product_category($str)
    {
        $product_category = $this->input->post('product_category');
        $id                = $this->input->post('id');
        if (!isset($id)) {
            $id = 0;
        }
        if ($this->check_category_exists($product_category, $id)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return false;
        } else {
            return true;
        }
    }

    public function valid_product_name($str)
    {
        $product_name = $this->input->post('product_name');
        $id            = $this->input->post('id');
        if (!isset($id)) {
            $id = 0;
        }
        if ($this->check_name_exists($product_name, $id)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return false;
        } else {
            return true;
        }
    }

    public function check_name_exists($name, $id)
    {
        if ($id != 0) {
            $data  = array('id != ' => $id, 'product_name' => $name);
            $query = $this->db->where($data)->get('pharmacy');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->where('product_name', $name);
            $query = $this->db->get('pharmacy');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function valid_supply_category($str)
    {
        $supply_category = $this->input->post('supply_category');
        $id                = $this->input->post('supplycategoryid');
        if (!isset($id)) {
            $id = 0;
        }
        if ($this->check_category_existssupply($supply_category, $id)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return false;
        } else {
            return true;
        }
    }

    public function getProductCategory($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('product_category');
            return $query->row_array();
        } else {
            $query = $this->db->get("product_category");
            return $query->result_array();
        }
    }



    public function getSupplyCategory($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('product_supply');
            return $query->row_array();
        } else {
            $query = $this->db->get("product_supply");
            return $query->result_array();
        }
    }

    public function getProductCategoryPat($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('product_category');
            return $query->row_array();
        } else {
            $query = $this->db->get("product_category");
            return $query->result_array();
        }
    }

    public function getSupplyCategoryPat($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('product_supply');
            return $query->row_array();
        } else {
            $query = $this->db->get("product_supply");
            return $query->result_array();
        }
    }

    public function check_category_exists($name, $id)
    {
        if ($id != 0) {
            $data  = array('id != ' => $id, 'product_category' => $name);
            $query = $this->db->where($data)->get('product_category');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->where('product_category', $name);
            $query = $this->db->get('product_category');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function check_category_existssupply($name, $id)
    {
        if ($id != 0) {
            $data  = array('id != ' => $id, 'supply' => $name);
            $query = $this->db->where($data)->get('product_supply');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->where('supply', $name);
            $query = $this->db->get('product_supply');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
 
    public function addProductCategory($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('product_category', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Product Category id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert('product_category', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Product Category id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            $this->log($message, $record_id, $action);
        }
        
        //======================Code End==============================

        $this->db->trans_complete(); # Completing transaction
        /* Optional */

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            return $record_id;
        }
    }

    public function addSupplyCategory($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('product_supply', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Product Supply id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert('product_supply', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Product Supply id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            $this->log($message, $record_id, $action);
        }
        
        //======================Code End==============================

        $this->db->trans_complete(); # Completing transaction
        /* Optional */

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            return $record_id;
        }
    }

    public function getall()
    {
        $this->datatables->select('id,product_category');
        $this->datatables->from('product_category');
        $this->datatables->add_column('view', '<a href="' . site_url('admin/productcategory/edit/$1') . '" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Edit"> <i class="fa fa-pencil"></i></a><a href="' . site_url('admin/productcategory/delete/$1') . '" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="Delete">
                                                        <i class="fa fa-remove"></i>
                                                    </a>', 'id');
        return $this->datatables->generate();
    }

    public function delete($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("product_category");
        $message = DELETE_RECORD_CONSTANT . " On Product Category id " . $id;
        $action = "Delete";
        $record_id = $id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================

        $this->db->trans_complete(); # Completing transaction
        /* Optional */

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            return $record_id;
        }
    }

 
    public function deletesupply($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("product_supply");
        $message = DELETE_RECORD_CONSTANT . " On Product Category id " . $id;
        $action = "Delete";
        $record_id = $id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================

        $this->db->trans_complete(); # Completing transaction
        /* Optional */

        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            return $record_id;
        }
    }
}
