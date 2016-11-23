<?php

class Area_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('area', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('area_id', $id);
        $this->db->update('area', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('area_id', $id);
        $this->db->delete('area');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $this->db->join('districts','area.district_id=districts.district_id');
        $query = $this->db->get('area');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('area', 'asc');
        $this->db->join('districts','area.district_id=districts.district_id');
        $this->db->where('area_status', $status);
        $this->db->where('dis_status', $status);
        $query = $this->db->get('area');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('area_id', $id);
        $this->db->join('districts','area.district_id=districts.district_id');
        $this->db->limit(1);
        $query = $this->db->get('area');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByDisId($id,$order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $this->db->where('area_status', 1);
        $this->db->where('district_id', $id);
        $query = $this->db->get('area');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('area', $name);
        $this->db->limit(1);
        $query = $this->db->get('area');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByDisId_limit5($id,$order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $this->db->where('area_status', 1);
        $this->db->where('district_id', $id);
        $this->db->limit(5);
        $query = $this->db->get('area');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
