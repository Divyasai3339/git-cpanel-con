<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Master_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_single($wherearray = array(), $table)
    {
        $this->db->select('*');
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get($table);
        return $query->row();
    }

    public function get_num_rows($wherearray = array(), $table)
    {
        if($columns!=NULL)
        {
            $this->db->select($columns);
        }
        else
        {
          $this->db->select('*');    
        }
        
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function get_data($wherearray = array(), $table,$columns=NULL)
    {
        $this->db->select('*');
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get($table);
        return $query->result();
    }



    public function insert_data($data = array(), $table)
    {
        $res =  $this->db->insert($table, $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($data = array(), $wherearray = array(), $table)
    {

        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->update($table, $data);
        $res = $this->db->affected_rows();
        if ($res > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($wherearray = array(), $table)
    {
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $res = $this->db->delete($table);;
        if ($res) {
            return true;
        } else {
            return false;
        }
    }





    function getMasterDataLike($wherearray = array(), $likearray = array(), $table)
    {

        // Fetch users
        $this->db->select('*');
        //  $this->db->where("master_value like '%".$searchTerm."%' ");
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        foreach ($likearray as $key => $value) {
            $this->db->like($key, $value, 'both');
        }
        $fetched_records = $this->db->get($table);
        $data = $fetched_records->result();
        return $data;
    }

    public function getMasterData($type)
    {
        $this->datatables
            ->select('*')
            ->searchable('master_value', 'master_key')
            ->sort('id', 'desc')
            ->where('master_type', $type)
            ->from('master_data');
        $result = $this->datatables->generate('json');

        return $result;
    }
    
        public function get_single_patient($wherearray = array(), $table)
    {
        $this->db->select('*');
        foreach ($wherearray as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get($table);
        return $query->row();
    }

}
