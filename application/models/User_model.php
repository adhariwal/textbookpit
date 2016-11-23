<?php
class User_model extends CI_model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login($username){
        $this -> db -> where('user_name', $username);
        $this -> db -> where('status', 1);
        $this -> db -> limit(1);
        $query = $this -> db -> get('user');

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function get_pass($username){
        $this -> db -> where('user_name', $username);
        $this -> db -> limit(1);
        $query = $this -> db -> get('user');
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function add($data) {
        $this->db->insert('user', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
        $this->db->limit(1);
    }
    
    public function getAll($order_field,$order_type) {
//        $this->db->order_by($order_field, $order_type);
//        $this->db->limit('1','100');
//        $query = $this->db->get('user');
//        $statement = "`ads` JOIN `category` ON `ads`.`cat_id`=`category`.`cat_id` JOIN `sub_category` ON `ads`.`sub_cat_id`=`sub_category`.`sub_cat_id` JOIN `districts` ON `ads`.`district_id`=`districts`.`district_id` JOIN `area` ON `ads`.`area_id`=`area`.`area_id` WHERE `ad_status` = 1 AND `cat_status` = 1 AND `sub_cat_status` = 1 AND `dis_status` = 1 AND `area_status` = 1 ORDER BY `ads_id` DESC";
        $query=$this->db->query("SELECT * FROM `user`LIMIT 1,100");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('name', 'asc');
        $this->db->where('status', $status);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function getById($id) {
        $this->db->where('user_id', $id);
        $this->db->limit(1);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
