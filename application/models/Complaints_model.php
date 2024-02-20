<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Complaints_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!empty($id)) {
            $this->db->select('complaints.*,complaint_category.category');
            $this->db->from('complaints');
            $this->db->join('complaint_category', 'complaint_category.id = complaints.complaint_category_id', 'left');
            $this->db->where("complaints.id", $id);
            $query = $this->db->get();
            return $query->row_array();
        } else {

            $this->db->select('complaints.*,complaint_category.category');
            $this->db->from('complaints');
            $this->db->join('complaint_category', 'complaint_category.id = complaints.complaint_category_id', 'left');
            $query = $this->db->get();
            return $query->result_array();
        }
    }
    public function getfindingcategory($id = null)
    {
        $this->db->select()->from('complaint_category');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getbyfinding($complaint_category_id)
    {
        $this->db->select()->from('complaints');
        $this->db->where('complaint_category_id', $complaint_category_id);
        $query = $this->db->get();
        return $query->result();

    }


    public function getFindingCountbyPatients($patient_id,$finding)
    {
      
      $sql=  "Select count(*) as `total_count` from (SELECT ipd_prescription_basic.id FROM `ipd_prescription_basic`  JOIN `ipd_details` ON `ipd_details`.`id` = `ipd_prescription_basic`.`ipd_id` AND ipd_details.patient_id=  ".$patient_id."  WHERE `finding_description` LIKE  '%".$finding."%' UNION SELECT ipd_prescription_basic.id FROM `ipd_prescription_basic` JOIN `visit_details` ON `visit_details`.`id` = `ipd_prescription_basic`.`visit_details_id` JOIN opd_details on opd_details.id=visit_details.opd_details_id and opd_details.patient_id= ".$patient_id." WHERE `finding_description` LIKE  '%".$finding."%') as a";

         $query = $this->db->query($sql);
        $result= $query->row();
        return $result->total_count;

    }

        public function getAllFinding()
    {
        $this->db->select('name')->from('complaints');
        $query = $this->db->get();
        return $query->result_array();
    }


    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('complaints');
        $message = DELETE_RECORD_CONSTANT . " On Finding id " . $id;
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

    public function removefindingtype($id)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('complaint_category');
        $message = DELETE_RECORD_CONSTANT . " On Finding Category id " . $id;
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

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('complaints', $data);
            
            $message = UPDATE_RECORD_CONSTANT . " On Finding id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            
        } else {
            $this->db->insert('complaints', $data);
            
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Finding id " . $insert_id;
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

    public function addfindingtype($data)
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('complaint_category', $data);
            
            $message = UPDATE_RECORD_CONSTANT . " On Finding Category id " . $data['id'];
            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            
        } else {
            $this->db->insert('complaint_category', $data);
            
            $insert_id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On Finding Category id " . $insert_id;
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

}
