<?php

class Banerads_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('banerads', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('baner_id', $id);
        $this->db->update('banerads', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('baner_id', $id);
        $this->db->delete('banerads');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $query = $this->db->get('banerads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('baner_id', 'RANDOM');
       // $this->db->order_by('baner_id');
        $this->db->where('status', $status);
        //$this->db->limit(1);
        $query = $this->db->get('banerads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('baner_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('banerads');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
