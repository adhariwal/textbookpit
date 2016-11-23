<?php

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('category', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('cat_id', $id);
        $this->db->update('category', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('cat_id', $id);
        $this->db->delete('category');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('category', 'asc');
        $this->db->where('cat_status', $status);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('cat_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('category', $name);
        $this->db->limit(1);
        $query = $this->db->get('category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    //classified details

    public function getAllClassifiedCategory($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $query = $this->db->get('classified_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllClassifiedCategoryWithStatus($status) {
        $this->db->order_by('category', 'asc');
        $this->db->where('cat_status', $status);
        $query = $this->db->get('classified_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function addClassifiedCategory($data) {
        $this->db->insert('classified_category', $data);
        $this->db->limit(1);
    }

    public function getByIdClassifiedCategory($id) {
        $this->db->where('cat_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('classified_category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function editClassifiedCategory($id, $data) {
        $this->db->where('cat_id', $id);
        $this->db->update('classified_category', $data);
        $this->db->limit(1);
    }

    public function deleteClassifiedCategory($id) {
        $this->db->where('cat_id', $id);
        $this->db->delete('classified_category');
        $this->db->limit(1);
    }
}
