<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stores_model extends MY_Model
{
    public function add($stores)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert('stores', $stores);
        $insert_id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On Stores id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
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

    public function addImport($product_data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert('stores', $product_data);
        $insert_id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On Stores id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
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
    
    public function get_product_stockinfo($stores_id)
    {
        return $this->db->select('product_batch_details.available_quantity,`stores`.`min_level`, (SELECT sum(available_quantity) FROM `product_batch_details` WHERE stores_id=stores.id) as `total_qty`,IFNULL((SELECT SUM(quantity) FROM `stores_bill_detail` WHERE product_batch_detail_id=product_batch_details.id),0) as used_quantity')->from('product_batch_details')->join('stores', 'stores.id=product_batch_details.stores_id', 'inner')->where('stores.id', $stores_id)->get()->row_array();
    }
    
    public function getAllstoresRecord()
    {
        $this->datatables
            ->select('stores.*,product_category.id as product_categoryid,product_category.product_category,(SELECT sum(available_quantity) FROM `product_batch_details` WHERE stores_id=stores.id) as `total_qty`')
            ->join('product_category', 'stores.product_category_id = product_category.id', 'left')
            ->join('product_batch_details', 'stores.id = product_batch_details.stores_id', 'left')
            ->join('stores_bill_detail', 'stores_bill_detail.product_batch_detail_id = product_batch_details.id', 'left')
            ->searchable('stores.product_name,stores.product_company,stores. product_composition,stores.product_category_id,stores.product_group')
            ->orderable('stores.id,stores.product_name,stores.product_company,stores. product_composition,stores.product_category_id,stores.product_group,stores.unit')
            ->group_by('stores.id')
            ->sort('stores.id', 'desc')
            ->where('`stores`.`product_category_id`=`product_category`.`id`')
            ->from('stores');
        return $this->datatables->generate('json');
    }
    
    public function getAvailableQuantity($stores_id)
    {
        $this->db->select('sum(stores_bill_detail.quantity) as used_quantity');
        $this->db->join('stores_bill_detail', 'stores_bill_detail.product_batch_detail_id = product_batch_details.id');
        $this->db->where('`product_batch_details`.`stores_id`', $stores_id); 
        $query = $this->db->get('product_batch_details');
        return $query->row_array();
    }
    
    public function searchFullText()
    {
        $this->db->select('stores.*,product_category.id as product_category_id,product_category.product_category');
        $this->db->join('product_category', 'stores.product_category_id = product_category.id', 'left');
        $this->db->where('`stores`.`product_category_id`=`product_category`.`id`');
        $this->db->order_by('stores.product_name');
        $query = $this->db->get('stores');
        return $query->result_array();
    }

    public function searchtestdata()
    {
        $this->db->select('stores.*');
        $this->db->order_by('stores.product_name');
        $query = $this->db->get('stores');
        return $query->result_array();
    }
    
    public function getpatientStoresYearCounter($patient_id,$year)
    {
    $sql= "SELECT count(*) as `total_visits`,Year(date) as `year` FROM `stores_bill_basic` WHERE YEAR(date) >= ".$this->db->escape($year)." AND patient_id=".$this->db->escape($patient_id)." GROUP BY  YEAR(date)";

      $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function check_product_exists($product_name, $product_category_id)
    {
        $this->db->where(array('product_category_id' => $product_category_id, 'product_name' => $product_name));
        $query = $this->db->join("product_category", "product_category.id = stores.product_category_id")->get('stores');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function bulkdelete($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (!empty($id)) {
            $this->db->where_in('id', $id);
            $this->db->delete('stores');
            $message = DELETE_RECORD_CONSTANT . " On Stores id " . $id;
            $action = "Delete";
            $record_id = $id;
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

    public function searchFullTextPurchase()
    {
        $this->db->select('supply_bill_detail.*,supply_bill_basic.supply_id,supply_bill_basic.supply_name,supply_bill_basic.total,supply_bill_basic.net_amount,product_supply.product_supply,product_supply.supply_person,product_supply.supply_person,product_supply.contact,product_supply.supply_person_contact,product_supply.address,product_category,stores.product_name');
        $this->db->join('supply_bill_basic', 'supply_bill_detail.supply_bill_basic_id=supply_bill_basic.id');
        $this->db->join('product_supply', 'supply_bill_basic.supply_id=product_supply.id');
        $this->db->join('product_category', 'supply_bill_detail.product_category_id = product_category.id', 'left');
        $this->db->join('stores', 'supply_bill_detail.product_name = stores.id', 'left');
        $query = $this->db->get('supply_bill_detail');
        return $query->result_array();
    }

    public function getDetails($id)
    {
        $this->db->select('stores.*,product_category.id as product_category_id,product_category.product_category');
        $this->db->join('product_category', 'stores.product_category_id = product_category.id', 'inner');
        $this->db->where('stores.id', $id);
        $this->db->order_by('stores.id', 'desc');
        $query = $this->db->get('stores');
        return $query->row_array();
    }

    public function update($stores)
    {
        $query = $this->db->where('id', $stores['id'])
            ->update('stores', $stores);
    }

    public function delete($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete('stores');
        $message = DELETE_RECORD_CONSTANT . " On Stores id " . $id;
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

    public function getStores($id = null)
    {
        $query = $this->db->get('stores');
        return $query->result_array();
    }

    public function productDetail($product_batch)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert('product_batch_details', $product_batch);
        $insert_id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On Product Batch Details id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
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

    public function getProductBatch($pharm_id)
    {
        $this->db->select('product_batch_details.*, stores.id as stores_id, stores.product_name');
        $this->db->join('stores', 'product_batch_details.stores_id = stores.id', 'inner');
        $this->db->where('stores.id', $pharm_id);
        $query = $this->db->get('product_batch_details');
        return $query->result();
    }

    public function getProductName()
    {
        $query = $this->db->select('stores.id,stores.product_name')->get('stores');
        return $query->result_array();
    }

    public function getProductNamePat()
    {
        $query = $this->db->select('stores.id,stores.product_name')->get('stores');
        return $query->result_array();
    }

    public function addBill($data, $insert_array, $update_array, $delete_array, $payment_array)
    {    
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        if (isset($data['id']) && $data['id'] != 0) {
            $insert_id = $data['id'];
            $this->db->where('id', $data['id'])
                ->update('stores_bill_basic', $data);
                
            $message = UPDATE_RECORD_CONSTANT . " On Stores Bill Basic id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            
        } else {

            $this->db->insert('stores_bill_basic', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Stores Bill Basic id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            $this->log($message, $record_id, $action);
        }

        if (!empty($delete_array)) {

            $this->db->where_in('id', $delete_array);
            $this->db->delete('stores_bill_detail');
        }

        if (isset($update_array) && !empty($update_array)) {

            $this->db->update_batch('stores_bill_detail', $update_array, 'id');
        }

        if (isset($insert_array) && !empty($insert_array)) {

            $total_rec = count($insert_array);
            for ($i = 0; $i < $total_rec; $i++) {
                $insert_array[$i]['stores_bill_basic_id'] = $insert_id;
            }
            $this->db->insert_batch('stores_bill_detail', $insert_array);
        }

        if (isset($payment_array) && !empty($payment_array)) {
            $payment_array['stores_bill_basic_id'] = $insert_id;
            $payment_array['case_reference_id']      = $data['case_reference_id'];
             $this->db->insert("transactions", $payment_array);
        }

        $this->db->trans_complete(); # Completing transaction

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $insert_id;
        }
    }
 
    public function addBillSupply($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data["id"])) {
            $this->db->where("id", $data["id"])->update("supply_bill_basic", $data);
            $message = UPDATE_RECORD_CONSTANT . " On Supply Bill Basic id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert("supply_bill_basic", $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Supply Bill Basic id " . $insert_id;
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

    public function addBillBatch($data)
    {
        $query = $this->db->insert_batch('stores_bill_detail', $data);
    }

    public function addBillBatchSupply($data)
    {
        $query = $this->db->insert_batch('supply_bill_detail', $data);
    }

    public function addBillProductBatchSupply($data1)
    {
        $query = $this->db->insert_batch('product_batch_details', $data1);
    }

    public function updateBillBatch($data)
    {    
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('stores_bill_basic_id', $data['id'])->update('stores_bill_detail');         
        $message = UPDATE_RECORD_CONSTANT . " On Stores Bill Basic_id id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function updateBillBatchSupply($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('supply_bill_basic_id', $data['id'])->update('supply_bill_basic_id');
        $message = UPDATE_RECORD_CONSTANT . " On Stores Bill Basic_id id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function updateBillDetail($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $data['id'])->update('stores_bill_detail', $data);
        $message = UPDATE_RECORD_CONSTANT . " On Stores Bill Detail id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function updateBillSupplyDetail($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $data['id'])->update('supply_bill_detail', $data);
        $message = UPDATE_RECORD_CONSTANT . " On Supply Bill Detail id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function updateProductBatchDetail($data1)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where('id', $data1['id'])->update('product_batch_details', $data1);        
        // $this->db->last_query();
        $message = UPDATE_RECORD_CONSTANT . " On Product Batch Details id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function deleteStoresBill($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where("stores_bill_basic_id", $id)->delete("stores_bill_detail");
        if ($query) {
            $this->db->where("id", $id)->delete("stores_bill_basic");
            $this->customfield_model->delete_custom_fieldRecord($id, 'stores');
        }
        
        $message = DELETE_RECORD_CONSTANT . " On Stores Bill Detail id " . $id;
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

    public function deleteSupplyBill($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where("supply_bill_basic_id", $id)->delete("product_batch_details");
        if ($query) {
            $this->db->where("id", $id)->delete("supply_bill_basic");
        }
        
        $message = DELETE_RECORD_CONSTANT . " On Product Batch Details id " . $id;
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

    public function getMaxId()
    {
        $query  = $this->db->select('max(id) as purchase_no')->get("supply_bill_basic");
        $result = $query->row_array();
        return $result["purchase_no"];
    }
    
    public function getindate($purchase_id)
    {
        $query = $this->db->select('supply_bill_basic.*,')
            ->where('supply_bill_basic.id', $purchase_id)
            ->get('supply_bill_basic');
        return $query->row_array();
    }

    public function getdate($id)
    {
        $query = $this->db->select('stores_bill_basic.*,')
            ->where('stores_bill_basic.id', $id)
            ->get('stores_bill_basic');
        return $query->row_array();
    }
    
    public function getSupply()
    {
        $query = $this->db->select('supply_bill_basic.*,product_supply.supply')
            ->join('product_supply', 'product_supply.id = supply_bill_basic.supply_id')
            ->order_by('id', 'desc')
            ->get('supply_bill_basic');
        return $query->result_array();
    }

    public function getAllstorespurchaseRecord()
    {
        $this->datatables
            ->select('supply_bill_basic.*,product_supply.supply')
            ->join('product_supply', 'product_supply.id = supply_bill_basic.supply_id')
            ->searchable('supply_bill_basic.id,supply_bill_basic.invoice_no,supply')
            ->orderable('supply_bill_basic.id,supply_bill_basic.date,supply_bill_basic.invoice_no,supply,supply_bill_basic.total,supply_bill_basic.tax,supply_bill_basic.discount,supply_bill_basic.net_amount')
            ->sort('supply_bill_basic.id', 'desc')
            ->from('supply_bill_basic');
        return $this->datatables->generate('json');
    }
    
    public function getAllstorespurchaseRecords()
    {
        $this->datatables
            ->select('supply_bill_basic.*,product_supply.supply')
            ->join('product_supply', 'product_supply.id = supply_bill_basic.supply_id')
            ->searchable('supply_bill_basic.id,supply_bill_basic.invoice_no,supply')
            ->orderable('supply_bill_basic.id,supply_bill_basic.date,supply_bill_basic.invoice_no,supply,supply_bill_basic.total,supply_bill_basic.tax,supply_bill_basic.discount,supply_bill_basic.net_amount')
            ->where('supply_bill_basic.supply_id', 18)
            ->sort('supply_bill_basic.id', 'desc')
            ->from('supply_bill_basic');
        return $this->datatables->generate('json');
    }

    public function getBillBasic($limit = "", $start = "")
    {
        $query = $this->db->select('stores_bill_basic.*,patients.patient_name')
            ->order_by('stores_bill_basic.id', 'desc')
            ->join('patients', 'patients.id = stores_bill_basic.patient_id')
            ->where("patients.is_active", "yes")->limit($limit, $start)
            ->get('stores_bill_basic');
        return $query->result_array();
    }

    // public function getAllstoresbillRecord()
    // {
    //     $custom_fields             = $this->customfield_model->get_custom_fields('stores', 1);
    //     $custom_field_column_array = array();

    //     $field_var_array = array();
    //     $i               = 1;
    //     if (!empty($custom_fields)) {
    //         foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
    //             $tb_counter = "table_custom_" . $i;
    //             array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
    //             array_push($field_var_array, '`table_custom_' . $i . '`.`field_value` as `' . $custom_fields_value->name . '`');
    //             $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, "left");
    //             $i++;
    //         }
    //     }

    //     $field_variable      = (empty($field_var_array)) ? "" : "," . implode(',', $field_var_array);
    //     $custom_field_column = (empty($custom_field_column_array)) ? "" : "," . implode(',', $custom_field_column_array);
    //     $this->datatables
    //         ->select('stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount, patients.patient_name,patients.id as pid' . $field_variable)
    //         ->join('patients', 'patients.id = stores_bill_basic.patient_id', 'left')
          
    //         ->searchable('stores_bill_basic.id,stores_bill_basic.discount,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name' . $custom_field_column . ',stores_bill_basic.doctor_name')
    //         ->orderable('stores_bill_basic.id,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name,stores_bill_basic.doctor_name' . $custom_field_column . ',stores_bill_basic.discount,stores_bill_basic.net_amount,paid_amount')
    //         ->sort('stores_bill_basic.id', 'desc')
    //         ->from('stores_bill_basic');
           
    //     return $this->datatables->generate('json');
    // }

 public function getAllstoresbillRecord()
    {
        $custom_fields             = $this->customfield_model->get_custom_fields('stores', 1);
        $custom_field_column_array = array();

        $field_var_array = array();
        $i               = 1;
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, '`table_custom_' . $i . '`.`field_value` as `' . $custom_fields_value->name . '`');
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, "left");
                $i++;
            }
        }

        $field_variable      = (empty($field_var_array)) ? "" : "," . implode(',', $field_var_array);
        $custom_field_column = (empty($custom_field_column_array)) ? "" : "," . implode(',', $custom_field_column_array);
        $this->datatables
            ->select('stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount, patients.patient_name,patients.id as pid' . $field_variable)
            ->join('patients', 'patients.id = stores_bill_basic.patient_id', 'left')
          
            ->searchable('stores_bill_basic.id,stores_bill_basic.discount,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name' . $custom_field_column . ',stores_bill_basic.doctor_name')
            ->orderable('stores_bill_basic.id,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name,stores_bill_basic.doctor_name' . $custom_field_column . ',stores_bill_basic.discount,stores_bill_basic.net_amount,paid_amount')
            ->sort('stores_bill_basic.id', 'desc')
            ->from('stores_bill_basic');
           
        return $this->datatables->generate('json');
    }

    public function getstoresbillByCaseId($case_id)
    {
        $query=$this->db->select('stores_bill_basic.*,IFNULL((SELECT sum(transactions.amount) from transactions WHERE transactions.stores_bill_basic_id=stores_bill_basic.id),0) as `amount_paid`,patients.patient_name,patients.id as patient_id')
            ->join('patients', 'patients.id = stores_bill_basic.patient_id', 'left')
            ->where('stores_bill_basic.case_reference_id', $case_id)           
          ->get('stores_bill_basic');
        return $query->result();
    }

    public function getAllstoresbillByCaseId($case_id)
    {
        $this->datatables
            ->select('stores_bill_basic.*,sum(transactions.amount) as paid_amount,patients.patient_name,patients.id as patient_unique_id')
            ->join('patients', 'patients.id = stores_bill_basic.patient_id', 'left')
            ->join('transactions', 'transactions.stores_bill_basic_id = stores_bill_basic.id', 'left')
            ->searchable('stores_bill_basic.id,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name,stores_bill_basic.doctor_name')
            ->orderable('stores_bill_basic.id,stores_bill_basic.case_reference_id,stores_bill_basic.date,patients.patient_name,stores_bill_basic.doctor_name,stores_bill_basic.net_amount,paid_amount')
            ->group_by('transactions.stores_bill_basic_id')
            ->where('stores_bill_basic.case_reference_id', $case_id)
            ->sort('stores_bill_basic.id', 'desc')
            ->from('stores_bill_basic');
        return $this->datatables->generate('json');
    }




    public function totalPatientStores($patient_id)
    {
        $query = $this->db->select('count(stores_bill_basic.patient_id) as total')
            ->where('patient_id', $patient_id)
            ->get('stores_bill_basic');
        return $query->row_array();
    }


    public function getBillBasicPatient($patient_id)
    {
        $i                         = 1;
        $custom_fields             = $this->customfield_model->get_custom_fields('stores', '','','', 1);
        $custom_field_column_array = array();

        $field_var_array = array();
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, '`table_custom_' . $i . '`.`field_value` as `' . $custom_fields_value->name . '`');
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, "left");
                $i++;
            }
        }

        $field_variable      = (empty($field_var_array)) ? "" : "," . implode(',', $field_var_array);
        $custom_field_column = (empty($custom_field_column_array)) ? "" : "," . implode(',', $custom_field_column_array);
        $this->db->select('stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount,patients.patient_name,patients.id as pid' . $field_variable);
        $this->db->join('patients', 'patients.id = stores_bill_basic.patient_id');
        $this->db->where('stores_bill_basic.patient_id', $patient_id);
        $query = $this->db->get('stores_bill_basic');
        return $query->result_array();
    }            

    public function get_product_name($product_category_id)
    {
        $this->db->select('stores.*');
        $this->db->where('stores.product_category_id', $product_category_id);
        $query = $this->db->get('stores');
        return $query->result_array();
    }

    

    public function get_product_dosage($product_category_id)
    {
        $this->db->select('product_dosage.dosage,charge_units.unit,product_dosage.id')->join('charge_units', 'charge_units.id=product_dosage.charge_units_id');
        $this->db->where('product_dosage.product_category_id', $product_category_id);
        $query = $this->db->get('product_dosage');
        return $query->result_array();
    }

    public function get_dosagename($id)
    {
        $this->db->select('product_dosage.dosage,charge_units.unit,product_dosage.id')->join('charge_units', 'charge_units.id=product_dosage.charge_units_id');
        $this->db->where('product_dosage.id', $id);
        $query = $this->db->get('product_dosage');
        return $query->row_array();
    }

    public function get_supply_name($supply_category_id)
    {
        $query = $this->db->where("id", $supply_category_id)->get("product_supply");
        return $query->result_array();
    }

    public function getBillDetails($id, $check_print = NULL)
    {
        if($check_print == 'print'){
            $custom_fields = $this->customfield_model->get_custom_fields('stores', '', 1);
        }else{
            $custom_fields = $this->customfield_model->get_custom_fields('stores');
        }

        $custom_field_column_array = array();
        $field_var_array = array();
        $i               = 1;
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, 'table_custom_' . $i . '.field_value as ' . $custom_fields_value->name);
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, 'left');
                $i++;
            }
        }
        $field_variable = implode(',', $field_var_array);       
        $this->db->select('stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.stores_bill_basic_id =stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount,staff.name,staff.surname,staff.id as staff_id,staff.employee_id,patients.patient_name,patients.id as patientid,patients.id as patient_unique_id,patients.mobileno,patients.age,' . $field_variable);
        $this->db->join('patients', 'stores_bill_basic.patient_id = patients.id');
        $this->db->join('staff', 'stores_bill_basic.generated_by = staff.id');
        $this->db->where('stores_bill_basic.id', $id);
        $query = $this->db->get('stores_bill_basic');
        return $query->row_array();
    }

    public function getAllBillDetails($id)
    {
        $sql = "SELECT stores_bill_detail.*,product_batch_details.expiry,product_batch_details.stores_id,product_batch_details.batch_no,product_batch_details.mrp,product_batch_details.tax,stores.product_name,stores.product_group,stores.vat_ac,stores.unit,stores.id as `product_id`,stores.product_category_id,product_category.product_category FROM `stores_bill_detail` INNER JOIN product_batch_details on product_batch_details.id=stores_bill_detail.product_batch_detail_id INNER JOIN stores on stores.id= product_batch_details.stores_id INNER JOIN product_category on product_category.id= stores.product_category_id WHERE stores_bill_basic_id =" . $this->db->escape($id);
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getSupplyDetails($id)
    {
        $this->db->select('supply_bill_basic.*,product_supply.supply,product_supply.supply_person,product_supply.contact,product_supply.address');
        $this->db->join('product_supply', 'product_supply.id=supply_bill_basic.supply_id');
        $this->db->where('supply_bill_basic.id', $id);
        $query = $this->db->get('supply_bill_basic');
        return $query->row_array();
    }

    public function getAllSupplyDetails($id)
    {
        $query = $this->db->select('product_batch_details.*,stores.product_name,stores.unit,stores.id as product_id,product_category.product_category,product_category.id as product_category_id')
            ->join('stores', 'product_batch_details.stores_id = stores.id')
            ->join('product_category', 'stores.product_category_id = product_category.id')
            ->where('product_batch_details.supply_bill_basic_id', $id)
            ->get('product_batch_details');
        return $query->result_array();
    }

    public function getBillDetailsPharma($id)
    {
        $this->db->select('stores_bill_basic.*,patients.patient_name');
        $this->db->join('patients', 'patients.id = stores_bill_basic.patient_id');
        $this->db->where('stores_bill_basic.id', $id);
        $query = $this->db->get('stores_bill_basic');
        return $query->row_array();
    }

    public function getAllBillDetailsPharma($id)
    {
        $query = $this->db->select('stores_bill_detail.*,stores.product_name,stores.unit,stores.id as product_id')
            ->join('stores', 'stores_bill_detail.product_name = stores.id')
            ->where('stores_bill_basic_id', $id)
            ->get('stores_bill_detail');
        return $query->result_array();
    }

    public function getQuantity($batch_no, $med_id)
    {
        $query = $this->db->select('product_batch_details.id,product_batch_details.available_quantity,product_batch_details.quantity,product_batch_details.purchase_price,product_batch_details.sale_rate')
            ->where('batch_no', $batch_no)
            ->where('stores_id', $med_id)
            ->get('product_batch_details');
        return $query->row_array();
    }
    public function getQuantityedit($batch_no)
    {
        $query = $this->db->select('product_batch_details.id,product_batch_details.available_quantity,product_batch_details.quantity,product_batch_details.purchase_price,product_batch_details.sale_rate')
            ->where('batch_no', $batch_no)
            ->get('product_batch_details');
        return $query->row_array();
    }

    public function checkvalid_product_exists($str)
    {
        $product_name = $this->input->post('product_name');
        if ($this->check_medicie_exists($product_name)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return false;
        } else {
            return true;
        }
    }

    public function check_medicie_exists($name, $id)
    {
        if ($id != 0) {
            $data  = array('id != ' => $id, 'product_name' => $name);
            $query = $this->db->where($data)->get('stores');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->where('product_name', $name);
            $query = $this->db->get('stores');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function availableQty($update_quantity)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where('id', $update_quantity['id'])
            ->update('product_batch_details', $update_quantity);
        $message = UPDATE_RECORD_CONSTANT . " On Product Batch Details id " . $update_quantity['id'];
        $action = "Update";
        $record_id = $update_quantity['id'];
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

    public function getsingleProductBatchdetails($product_batch_id)
    {
        $query = $this->db->select('available_quantity')
            ->where('id', $product_batch_id)
            ->get('product_batch_details');
        return $query->row_array();
    }

    public function totalQuantity($stores_id)
    {
        $query = $this->db->select('sum(available_quantity) as total_qty')
            ->where('stores_id', $stores_id)
            ->get('product_batch_details');
        return $query->row_array();
    }

    public function searchBillReport($date_from, $date_to)
    {
        $this->db->select('stores_bill_basic.*');
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get("stores_bill_basic");
        return $query->result_array();
    }

    public function delete_product_batch($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("product_batch_details");        
        $message = DELETE_RECORD_CONSTANT . " On Product Batch Details id " . $id;
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

    public function delete_bill_detail($delete_arr)
    {       
        foreach ($delete_arr as $key => $value) {
            $id = $value["id"];
            $this->db->where("id", $id)->delete("prescription");
        }
    }

    public function getBillNo()
    {
        $query = $this->db->select("max(id) as id")->get('stores_bill_basic');
        return $query->row_array();
    }

    public function getExpiryDate($product_batch_detail_id)
    {
        $query = $this->db->where("id", $product_batch_detail_id)
            ->get('product_batch_details');
        return $query->row_array();
    }

    public function getProductBatchByID($product_batch_detail_id)
    {
        $sql   = "SELECT product_batch_details.*, IFNULL((SELECT SUM(quantity) FROM `stores_bill_detail` WHERE product_batch_detail_id=product_batch_details.id),0) as used_quantity FROM `product_batch_details` WHERE product_batch_details.id=" . $this->db->escape($product_batch_detail_id);
     
        $query = $this->db->query($sql);
        return $query->row();
    }

   

    public function getExpireDate($batch_no)
    {
        $query = $this->db->where("batch_no", $batch_no)
            ->get('product_batch_details');
        return $query->row_array();
    }

    public function getproductdetailsbyid($id)
    {
        $query = $this->db->where("stores.id", $id)
            ->get('stores');
        return $query->row_array();
    }

   
    public function getBatchNoList($stores_id)
    {
     $sql = "SELECT product_batch_details.*, (product_batch_details.available_quantity-IFNULL((SELECT SUM(quantity) FROM `stores_bill_detail` WHERE product_batch_detail_id=product_batch_details.id),0)) as remaining_quantity FROM `product_batch_details` WHERE product_batch_details.stores_id=".$this->db->escape($stores_id)." HAVING remaining_quantity > 0";
           $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function addBadStock($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert("product_bad_stock", $data);
        $insert_id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On Product Bad Stock id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
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

    public function updateProductBatch($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $data["id"])->update("product_batch_details", $data);
        $message = UPDATE_RECORD_CONSTANT . " On Product Batch Details id " . $data['id'];
        $action = "Update";
        $record_id = $data['id'];
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

    public function getProductBadStock($id)
    {
        $query = $this->db->where("stores_id", $id)->get("product_bad_stock");
        return $query->result();
    }

    public function getsingleProductBadStock($id)
    {
        $query = $this->db->where("id", $id)->get("product_bad_stock");
        return $query->row_array();
    }

    public function deleteBadStock($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("product_bad_stock");        
        $message = DELETE_RECORD_CONSTANT . " On Product Bad Stock id " . $id;
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

    public function searchNameLike($category, $value)
    {
        $query = $this->db->where("product_category_id", $category)->like("product_name", $value)->get("stores");
        return $query->result_array();
    }
    
    public function validate_paymentamount()
    {
        $final_amount=0 ;
        $amount = $this->input->post('amount');
        $payment_amount = $this->input->post('payment_amount');
        if(!empty($amount)){
            $final_amount = $amount;
        }else if(!empty($payment_amount)){
            $final_amount = $payment_amount;
        }
     
        $net_amount    = $this->input->post('net_amount') ;
        if($final_amount > $net_amount ){
        
            $this->form_validation->set_message('check_exists', $this->lang->line('amount_should_not_be_greater_than_balance').' '. $net_amount );
            return false;
        }else{        
            return true;
        }        
    }
    
    public function getIpdPrescriptionBasic($ipd_prescription_basic_id)
    {
        $this->db->select('ipd_prescription_basic.*');
        $this->db->where('ipd_prescription_basic.id', $ipd_prescription_basic_id);
        $query = $this->db->get('ipd_prescription_basic');
        return $query->row();
    }
    
    public function getBatchNumberByBatch($batch){
       
        if(!empty($batch)){
             $this->db->select('product_batch_details.batch_no,product_batch_details.id');
             $this->db->like('batch_no', $batch);
             $this->db->order_by('id','desc');
            $query=$this->db->get('product_batch_details');

          return $query->row_array();
        }
       
       

    }
    
    public function getIPStores($id = null)
    {
        $query = $this->db->get('ip_stores');
        return $query->result_array();
    }
    
    public function getAllIPstorespurchaseRecord()
    {
        $this->datatables
            ->select('ip_supply_bill_basic.*,product_supply.supply')
            ->join('product_supply', 'product_supply.id = ip_supply_bill_basic.supply_id')
            ->searchable('ip_supply_bill_basic.id,ip_supply_bill_basic.invoice_no,supply')
            ->orderable('ip_supply_bill_basic.id,ip_supply_bill_basic.date,ip_supply_bill_basic.invoice_no,supply,ip_supply_bill_basic.total,ip_supply_bill_basic.tax,ip_supply_bill_basic.discount,ip_supply_bill_basic.net_amount')
            ->sort('ip_supply_bill_basic.id', 'desc')
            ->from('ip_supply_bill_basic');
        return $this->datatables->generate('json');
    }
    
    public function getAllIPstorespurchaseRecords()
    {
        $this->datatables
            ->select('ip_supply_bill_basic.*,product_supply.supply')
            ->join('product_supply', 'product_supply.id = ip_supply_bill_basic.supply_id')
            ->searchable('ip_supply_bill_basic.id,ip_supply_bill_basic.invoice_no,supply')
            ->orderable('ip_supply_bill_basic.id,ip_supply_bill_basic.date,ip_supply_bill_basic.invoice_no,supply,ip_supply_bill_basic.total,ip_supply_bill_basic.tax,ip_supply_bill_basic.discount,ip_supply_bill_basic.net_amount')
            ->where('ip_supply_bill_basic.supply_id', 18)
            ->sort('ip_supply_bill_basic.id', 'desc')
            ->from('ip_supply_bill_basic');
        return $this->datatables->generate('json');
    }
    
    public function addIPBillSupply($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data["id"])) {
            $this->db->where("id", $data["id"])->update("ip_supply_bill_basic", $data);
            $message = UPDATE_RECORD_CONSTANT . " On Ip Supply Bill Basic id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert("ip_supply_bill_basic", $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Ip Supply Bill Basic id " . $insert_id;
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
    
    public function addIPBillProductBatchSupply($data1)
    {
        $query = $this->db->insert_batch('ip_product_batch_details', $data1);
    }
    
    public function searchIPFullText()
    {
        $this->db->select('ip_stores.*,product_category.id as product_category_id,product_category.product_category');
        $this->db->join('product_category', 'ip_stores.product_category_id = product_category.id', 'left');
        $this->db->where('`ip_stores`.`product_category_id`=`product_category`.`id`');
        $this->db->order_by('ip_stores.product_name');
        $query = $this->db->get('ip_stores');
        return $query->result_array();
    }
    
    public function totalIPQuantity($stores_id)
    {
        $query = $this->db->select('sum(available_quantity) as total_qty')
            ->where('stores_id', $stores_id)
            ->get('ip_product_batch_details');
        return $query->row_array();
    }
    
    public function add_ip($stores)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->insert('ip_stores', $stores);
        $insert_id = $this->db->insert_id();
        $message = INSERT_RECORD_CONSTANT . " On Ip Stores id " . $insert_id;
        $action = "Insert";
        $record_id = $insert_id;
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
    
    public function getAllIPstoresRecord()
    {
        $this->datatables
            ->select('ip_stores.*,product_category.id as product_categoryid,product_category.product_category,(SELECT sum(available_quantity) FROM `ip_product_batch_details` WHERE stores_id=ip_stores.id) as `total_qty`')
            ->join('product_category', 'ip_stores.product_category_id = product_category.id', 'left')
            ->join('ip_product_batch_details', 'ip_stores.id = ip_product_batch_details.stores_id', 'left')
            ->join('ip_stores_bill_detail', 'ip_stores_bill_detail.product_batch_detail_id = ip_product_batch_details.id', 'left')
            ->searchable('ip_stores.product_name,ip_stores.product_company,ip_stores. product_composition,ip_stores.product_category_id,ip_stores.product_group')
            ->orderable('ip_stores.id,ip_stores.product_name,ip_stores.product_company,ip_stores. product_composition,ip_stores.product_category_id,ip_stores.product_group,ip_stores.unit')
            ->group_by('ip_stores.id')
            ->sort('ip_stores.id', 'desc')
            ->where('`ip_stores`.`product_category_id`=`product_category`.`id`')
            ->from('ip_stores');
        return $this->datatables->generate('json');
    }
    
    public function get_ip_product_name($product_category_id)
    {
        $this->db->select('ip_stores.*');
        $this->db->where('ip_stores.product_category_id', $product_category_id);
        $query = $this->db->get('ip_stores');
        return $query->result_array();
    }
    
    public function getIPBatchNumberByBatch($batch){
       
        if(!empty($batch)){
             $this->db->select('ip_product_batch_details.batch_no,ip_product_batch_details.id');
             $this->db->like('batch_no', $batch);
             $this->db->order_by('id','desc');
            $query=$this->db->get('ip_product_batch_details');

          return $query->row_array();
        }
       
    }
    
    public function getIPSupplyDetails($id)
    {
        $this->db->select('ip_supply_bill_basic.*,product_supply.supply,product_supply.supply_person,product_supply.contact,product_supply.address');
        $this->db->join('product_supply', 'product_supply.id=ip_supply_bill_basic.supply_id');
        $this->db->where('ip_supply_bill_basic.id', $id);
        $query = $this->db->get('ip_supply_bill_basic');
        return $query->row_array();
    }

    public function getIPAllSupplyDetails($id)
    {
        $query = $this->db->select('ip_product_batch_details.*,ip_stores.product_name,ip_stores.unit,ip_stores.id as product_id,product_category.product_category,product_category.id as product_category_id')
            ->join('ip_stores', 'ip_product_batch_details.stores_id = ip_stores.id')
            ->join('product_category', 'ip_stores.product_category_id = product_category.id')
            ->where('ip_product_batch_details.supply_bill_basic_id', $id)
            ->get('ip_product_batch_details');
        return $query->result_array();
    }
    
    public function deleteIPSupplyBill($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where("supply_bill_basic_id", $id)->delete("ip_product_batch_details");
        if ($query) {
            $this->db->where("id", $id)->delete("ip_supply_bill_basic");
        }
        
        $message = DELETE_RECORD_CONSTANT . " On Ip Product Batch Details id " . $id;
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
    
    public function getIPDetails($id)
    {
        $this->db->select('ip_stores.*,product_category.id as product_category_id,product_category.product_category');
        $this->db->join('product_category', 'ip_stores.product_category_id = product_category.id', 'inner');
        $this->db->where('ip_stores.id', $id);
        $this->db->order_by('ip_stores.id', 'desc');
        $query = $this->db->get('ip_stores');
        return $query->row_array();
    }
    
    public function getIPProductBatch($pharm_id)
    {
        $this->db->select('ip_product_batch_details.*, ip_stores.id as stores_id, ip_stores.product_name');
        $this->db->join('ip_stores', 'ip_product_batch_details.stores_id = ip_stores.id', 'inner');
        $this->db->where('ip_stores.id', $pharm_id);
        $query = $this->db->get('ip_product_batch_details');
        return $query->result();
    }

    public function ip_addBill($data, $insert_array, $update_array, $delete_array, $payment_array)
    {    
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        if (isset($data['id']) && $data['id'] != 0) {
            $insert_id = $data['id'];
            $this->db->where('id', $data['id'])
                ->update('ip_stores_bill_basic', $data);
                
            $message = UPDATE_RECORD_CONSTANT . " On Ip Stores Bill Basic id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            
        } else {

            $this->db->insert('ip_stores_bill_basic', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Ip Stores Bill Basic id " . $insert_id;
            $action = "Insert";
            $record_id = $insert_id;
            $this->log($message, $record_id, $action);
        }

        if (!empty($delete_array)) {

            $this->db->where_in('id', $delete_array);
            $this->db->delete('ip_stores_bill_detail');
        }

        if (isset($update_array) && !empty($update_array)) {

            $this->db->update_batch('ip_stores_bill_detail', $update_array, 'id');
        }

        if (isset($insert_array) && !empty($insert_array)) {

            $total_rec = count($insert_array);
            for ($i = 0; $i < $total_rec; $i++) {
                $insert_array[$i]['stores_bill_basic_id'] = $insert_id;
            }
            $this->db->insert_batch('ip_stores_bill_detail', $insert_array);
        }

        if (isset($payment_array) && !empty($payment_array)) {
            $payment_array['ip_stores_bill_basic_id'] = $insert_id;
            $payment_array['case_reference_id']      = $data['case_reference_id'];
            $this->db->insert("transactions", $payment_array);
        }

        $this->db->trans_complete(); # Completing transaction

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $insert_id;
        }
    }
    
    public function ip_getAllstoresbillRecord()
    {
        $custom_fields             = $this->customfield_model->get_custom_fields('stores', 1);
        $custom_field_column_array = array();

        $field_var_array = array();
        $i               = 1;
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, '`table_custom_' . $i . '`.`field_value` as `' . $custom_fields_value->name . '`');
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, "left");
                $i++;
            }
        }

        $field_variable      = (empty($field_var_array)) ? "" : "," . implode(',', $field_var_array);
        $custom_field_column = (empty($custom_field_column_array)) ? "" : "," . implode(',', $custom_field_column_array);
        $this->datatables
            ->select('ip_stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount, patients.patient_name,patients.id as pid' . $field_variable)
            ->join('patients', 'patients.id = ip_stores_bill_basic.patient_id', 'left')
          
            ->searchable('ip_stores_bill_basic.id,ip_stores_bill_basic.discount,ip_stores_bill_basic.case_reference_id,ip_stores_bill_basic.date,patients.patient_name' . $custom_field_column . ',ip_stores_bill_basic.doctor_name')
            ->orderable('ip_stores_bill_basic.id,ip_stores_bill_basic.case_reference_id,ip_stores_bill_basic.date,patients.patient_name,ip_stores_bill_basic.doctor_name' . $custom_field_column . ',ip_stores_bill_basic.discount,ip_stores_bill_basic.net_amount,paid_amount')
            ->sort('ip_stores_bill_basic.id', 'desc')
            ->from('ip_stores_bill_basic');
           
        return $this->datatables->generate('json');
    }
    
    public function ip_get_product_name($product_category_id)
    {
        $this->db->select('ip_stores.*');
        $this->db->where('ip_stores.product_category_id', $product_category_id);
        $query = $this->db->get('ip_stores');
        return $query->result_array();
    }
    
    public function ip_getBatchNoList($stores_id)
    {
     $sql = "SELECT ip_product_batch_details.*, (ip_product_batch_details.available_quantity-IFNULL((SELECT SUM(quantity) FROM `ip_stores_bill_detail` WHERE product_batch_detail_id=ip_product_batch_details.id),0)) as remaining_quantity FROM `ip_product_batch_details` WHERE ip_product_batch_details.stores_id=".$this->db->escape($stores_id)." HAVING remaining_quantity > 0";
           $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function ip_getProductBatchByID($product_batch_detail_id)
    {
        $sql   = "SELECT ip_product_batch_details.*, IFNULL((SELECT SUM(quantity) FROM `ip_stores_bill_detail` WHERE product_batch_detail_id=ip_product_batch_details.id),0) as used_quantity FROM `ip_product_batch_details` WHERE ip_product_batch_details.id=" . $this->db->escape($product_batch_detail_id);
     
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function ip_getBillDetails($id, $check_print = NULL)
    {
        if($check_print == 'print'){
            $custom_fields = $this->customfield_model->get_custom_fields('stores', '', 1);
        }else{
            $custom_fields = $this->customfield_model->get_custom_fields('stores');
        }

        $custom_field_column_array = array();
        $field_var_array = array();
        $i               = 1;
        if (!empty($custom_fields)) {
            foreach ($custom_fields as $custom_fields_key => $custom_fields_value) {
                $tb_counter = "table_custom_" . $i;
                array_push($custom_field_column_array, 'table_custom_' . $i . '.field_value');
                array_push($field_var_array, 'table_custom_' . $i . '.field_value as ' . $custom_fields_value->name);
                $this->datatables->join('custom_field_values as ' . $tb_counter, 'stores_bill_basic.id = ' . $tb_counter . '.belong_table_id AND ' . $tb_counter . '.custom_field_id = ' . $custom_fields_value->id, 'left');
                $i++;
            }
        }
        $field_variable = implode(',', $field_var_array);       
        $this->db->select('ip_stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount,staff.name,staff.surname,staff.id as staff_id,staff.employee_id,patients.patient_name,patients.id as patientid,patients.id as patient_unique_id,patients.mobileno,patients.age,' . $field_variable);
        $this->db->join('patients', 'ip_stores_bill_basic.patient_id = patients.id');
        $this->db->join('staff', 'ip_stores_bill_basic.generated_by = staff.id');
        $this->db->where('ip_stores_bill_basic.id', $id);
        $query = $this->db->get('ip_stores_bill_basic');
        return $query->row_array();
    }

    public function ip_getAllBillDetails($id)
    {
        $sql = "SELECT ip_stores_bill_detail.*,ip_product_batch_details.expiry,ip_product_batch_details.stores_id,ip_product_batch_details.batch_no,ip_product_batch_details.mrp,ip_product_batch_details.tax,ip_stores.product_name,ip_stores.product_group,ip_stores.vat_ac,ip_stores.unit,ip_stores.id as `product_id`,ip_stores.product_category_id,product_category.product_category FROM `ip_stores_bill_detail` INNER JOIN ip_product_batch_details on ip_product_batch_details.id=ip_stores_bill_detail.product_batch_detail_id INNER JOIN ip_stores on ip_stores.id= ip_product_batch_details.stores_id INNER JOIN product_category on product_category.id= ip_stores.product_category_id WHERE stores_bill_basic_id =" . $this->db->escape($id);
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function getIpBillDetails($id, $check_print = NULL)
    {       
        $this->db->select('ip_stores_bill_basic.*,IFNULL((select sum(amount) as amount_paid from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="payment" ),0) as paid_amount, IFNULL((select sum(amount) as refund from transactions WHERE transactions.ip_stores_bill_basic_id =ip_stores_bill_basic.id and transactions.type="refund" ),0) as refund_amount,staff.name,staff.surname,staff.id as staff_id,staff.employee_id,patients.patient_name,patients.id as patientid,patients.id as patient_unique_id,patients.mobileno,patients.age,');
        $this->db->join('patients', 'ip_stores_bill_basic.patient_id = patients.id');
        $this->db->join('staff', 'ip_stores_bill_basic.generated_by = staff.id');
        $this->db->where('ip_stores_bill_basic.id', $id);
        $query = $this->db->get('ip_stores_bill_basic');
        return $query->row_array();
    }
    
    public function ip_deleteStoresBill($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $query = $this->db->where("stores_bill_basic_id", $id)->delete("ip_stores_bill_detail");
        if ($query) {
            $this->db->where("id", $id)->delete("ip_stores_bill_basic");
            $this->customfield_model->delete_custom_fieldRecord($id, 'stores');
        }
        
        $message = DELETE_RECORD_CONSTANT . " On Ip Stores Bill Detail id " . $id;
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
