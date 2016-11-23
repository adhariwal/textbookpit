<?php

class Deals_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('deals', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('deal_id', $id);
        $this->db->update('deals', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('deal_id', $id);
        $this->db->delete('deals');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $query = $this->db->get('deals');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function getAllWithStatus($status) {
        $this->db->order_by('deal_id', 'desc');
        $this->db->where('deal_status', $status);
        $query = $this->db->get('deals');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('deal_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('deals');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('title', $name);
        $this->db->limit(1);
        $query = $this->db->get('deals');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function count_all(){
        $this->db->where('deal_status', 1);
         $query = $this->db->get('deals');
		return $query->num_rows();
	}
    
    public function fetch_data($limit = 25, $offset = 0) {
        $this->db->order_by('deal_id', 'desc');
        $this->db->where('deal_status', 1);
        $query = $this->db->get('deals',$limit, $offset);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        return $data;
        }
        return false;
        }

        public function getActiveDealById($id) {
        $this->db->where('deal_id', $id);
        $this->db->where('deal_status', 1);
        $this->db->limit(1);
        $query = $this->db->get('deals');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
