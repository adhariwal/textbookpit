<?php

class Pages_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pages', $data);
        $this->db->limit(1);
    }


    public function getAll() {
        $this->db->limit(1);
        $query = $this->db->get('pages');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getPageData(){
        $this->db->where('id', 1);
        $query = $this->db->get('pages');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
