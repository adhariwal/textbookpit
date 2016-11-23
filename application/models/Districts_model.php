<?php
class Districts_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('districts', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('district_id', $id);
        $this->db->update('districts', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('district_id', $id);
        $this->db->delete('districts');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $query = $this->db->get('districts');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('district', 'asc');
        $this->db->where('dis_status', $status);
        $query = $this->db->get('districts');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('district_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('districts');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('district', $name);
        $this->db->limit(1);
        $query = $this->db->get('districts');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
