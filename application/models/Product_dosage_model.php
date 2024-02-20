<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product_dosage_model extends MY_model
{

    public function addProductDosage($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('product_dosage', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Product Dosage id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert('product_dosage', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Product Dosage id " . $insert_id;
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

    public function add_interval($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id']) && $data['id']!=='') {
            $this->db->where('id', $data['id']);
            $this->db->update('dose_interval', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Dose Interval id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert('dose_interval', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Dose Interval id " . $insert_id;
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

    public function add_duration($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id']) && $data['id']!=='') {
            $this->db->where('id', $data['id']);
            $this->db->update('dose_duration', $data);
            $message = UPDATE_RECORD_CONSTANT . " On Dose Duration id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
        } else {
            $this->db->insert('dose_duration', $data);
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Dose Duration id " . $insert_id;
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
     public function getIntervalDosage($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('dose_interval');
            return $query->row_array();
        } else {
            $query = $this->db->get("dose_interval");
            return $query->result_array();
        }
    }

    public function getDurationDosage($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get('dose_duration');
            return $query->row_array();
        } else {
            $query = $this->db->get("dose_duration");
            return $query->result_array();
        }
    }
    public function getProductDosage($id = null)
    {
        if (!empty($id)) {
            $query = $this->db->select('product_dosage.*,product_category.product_category')
                ->join('product_category', 'product_dosage.product_category_id = product_category.id')
                ->where('product_dosage.id', $id)
                ->get('product_dosage');
            return $query->row_array();
        } else {
            $query = $this->db->select('product_dosage.*,product_category.product_category,charge_units.unit')
                ->join('product_category', 'product_dosage.product_category_id = product_category.id')
                 ->join('charge_units', 'charge_units.id = product_dosage.charge_units_id')
                ->get('product_dosage');
            return $query->result_array();
        }
    }

    public function getCategoryDosages()
    {
      $query = $this->db->select('product_dosage.*,product_category.product_category,charge_units.unit')
                ->join('product_category', 'product_dosage.product_category_id = product_category.id')
                ->join('charge_units', 'charge_units.id = product_dosage.charge_units_id','left')
                ->get('product_dosage');
            $result=$query->result();
            $product_array=array();
            if(!empty($result)){
foreach ($result as $result_key => $result_value) {
  $product_array[$result_value->product_category_id][]=$result_value;
}
            }
        return $product_array;
        
    }

    public function getDosageByProduct($product)
    {

    }

    public function delete($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("product_dosage");
        $message = DELETE_RECORD_CONSTANT . " On Product Dosage id " . $id;
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

    public function deletemedicationdosage($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("medication_report");
        $message = DELETE_RECORD_CONSTANT . " On Product Report id " . $id;
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


    public function get_doseIntervallist()
    {
        $this->datatables
            ->select('*')
            ->searchable('name')
            ->orderable('name')
            ->sort('id', 'desc')
            ->from('dose_interval');
        return $this->datatables->generate('json');
    }
    
    public function get_intervalbyid($id){
        return $this->db->select('*')->from('dose_interval')->where('id',$id)->get()->row_array();

    }

    public function delete_doseInterval($id){
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("dose_interval");
        $message = DELETE_RECORD_CONSTANT . " On Dose Interval id " . $id;
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

    public function get_dosedurationlist()
    {
        $this->datatables
            ->select('*')
            ->searchable('name')
            ->orderable('name')
            ->sort('id', 'desc')
            ->from('dose_duration');
        return $this->datatables->generate('json');
    }
    
    public function get_durationbyid($id){
        return $this->db->select('*')->from('dose_duration')->where('id',$id)->get()->row_array();

    }

    public function delete_doseduration($id){
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where("id", $id)->delete("dose_duration");
        $message = DELETE_RECORD_CONSTANT . " On Dose Duration id " . $id;
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
