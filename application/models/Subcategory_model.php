<?php
class Subcategory_model extends CI_Model{

    public function  __construct() {
        parent::__construct();
    }

    public function add($data){
        $this->db->insert('sub_category',$data);
        $this->db->limit(1);
    }

    public function edit($id,$data){
        $this->db->where('sub_cat_id',$id);
        $this->db->update('sub_category',$data);
        $this->db->limit(1);
    }

    public function delete($id){
        $this->db->where('sub_cat_id',$id);
        $this->db->delete('sub_category');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type){
        $this->db->order_by($order_field, $order_type);
        $this->db->join('category','sub_category.cat_id=category.cat_id');
        $query = $this->db->get('sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getAllByCatId($id,$order_field,$order_type){
        $this->db->order_by($order_field, $order_type);
        $this->db->where('cat_id',$id);
        $this->db->where('sub_cat_status',1);
        $query = $this->db->get('sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('sub_category','asc');
        $this->db->join('category','sub_category.cat_id=category.cat_id');
        $this->db->where('sub_cat_status', $status);
        $this->db->where('cat_status', $status);
        $query = $this->db->get('sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getById($id){
        $this->db->where('sub_cat_id',$id);
        $this->db->join('category','sub_category.cat_id=category.cat_id');
        $this->db->limit(1);
        $query = $this->db->get('sub_category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('sub_category', $name);
        $this->db->limit(1);
        $query = $this->db->get('sub_category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    // classified

    public function getAllClassifiedSubcategory($order_field,$order_type){
        $this->db->order_by($order_field, $order_type);
        $this->db->join('classified_category','classified_sub_category.cat_id=classified_category.cat_id');
        $query = $this->db->get('classified_sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

     public function getAllClassifiedSubcategoryByCatId($id,$order_field,$order_type){
        $this->db->order_by($order_field, $order_type);
        $this->db->where('cat_id',$id);
        $this->db->where('sub_cat_status',1);
        $query = $this->db->get('classified_sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getAllClassifiedSubcategoryWithStatus($status) {
        $this->db->order_by('sub_category','asc');
        $this->db->join('classified_category','classified_sub_category.cat_id=classified_category.cat_id');
        $this->db->where('sub_cat_status', $status);
        $this->db->where('cat_status', $status);
        $query = $this->db->get('classified_sub_category');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function addClassifiedSubcategory($data){
        $this->db->insert('classified_sub_category',$data);
        $this->db->limit(1);
    }

    public function getByIdClassifiedSubcategory($id){
        $this->db->where('sub_cat_id',$id);
        $this->db->join('classified_category','classified_sub_category.cat_id=classified_category.cat_id');
        $this->db->limit(1);
        $query = $this->db->get('classified_sub_category');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function editClassifiedSubcategory($id,$data){
        $this->db->where('sub_cat_id',$id);
        $this->db->update('classified_sub_category',$data);
        $this->db->limit(1);
    }

    public function deleteClassifiedSubcategory($id){
        $this->db->where('sub_cat_id',$id);
        $this->db->delete('classified_sub_category');
        $this->db->limit(1);
    }

}
