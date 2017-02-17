<?php

class Ads_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        $this->db->insert('ads', $data);
        $this->db->limit(1);
    }

    public function edit($id, $data) {
        $this->db->where('ads_id', $id);
        $this->db->update('ads', $data);
        $this->db->limit(1);
    }

    public function delete($id) {
        $this->db->where('ads_id', $id);
        $this->db->delete('ads');
        $this->db->limit(1);
    }

    public function getAll($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $query = $this->db->get('ads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatus($status) {
        $this->db->order_by('ads_id', 'desc');
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $this->db->where('ad_status', $status);
        $this->db->where('cat_status', $status);
        $this->db->where('sub_cat_status', $status);
        $this->db->where('dis_status', $status);
        $this->db->where('area_status', $status);
        $query = $this->db->get('ads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->where('ads_id', $id);
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $this->db->limit(1);
        $query = $this->db->get('ads');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByName($name) {
        $this->db->where('title', $name);
        $this->db->limit(1);
        $query = $this->db->get('ads');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function count_all(){
        $this->db->where('ad_status', 1);
         $query = $this->db->get('ads');
		return $query->num_rows();
	}

    public function count_all_by_category($id){
        $this->db->where('ad_status', 1);
        $this->db->where('cat_id', $id);
        $query = $this->db->get('ads');
		return $query->num_rows();
	}

    public function count_all_by_sub_category($id){
        $this->db->where('ad_status', 1);
        $this->db->where('sub_cat_id', $id);
        $query = $this->db->get('ads');
		return $query->num_rows();
	}

    public function count_all_by_dis($id){
        $this->db->where('ad_status', 1);
        $this->db->where('district_id', $id);
        $query = $this->db->get('ads');
		return $query->num_rows();
	}

    public function count_all_by_area($id){
        $this->db->where('ad_status', 1);
        $this->db->where('area_id', $id);
        $query = $this->db->get('ads');
		return $query->num_rows();
	}

    public function getBySubCatId($id) {
        
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $this->db->where('ads.sub_cat_id', $id);
        $query = $this->db->get('ads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_cat_temp() {
        $this->db->query('DELETE FROM `cat_temp`');
    }
    public function add_cat_temp($data) {
        //$this->db->query('DELETE FROM `cat_temp`');
        $this->db->insert('cat_temp', $data);
    }

    public function getAllCat(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('cat_temp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_districts_temp() {
        $this->db->query('DELETE FROM `districts_temp`');
    }

    public function delete_districts_temp_classified() {
        $this->db->query('DELETE FROM `districts_temp_classified`');
    }

    public function add_districts_temp($data) {
     //   $this->db->insert('districts_temp', $data);
    }
    public function add_districts_temp_classified($data) {
//        $this->db->insert('districts_temp_classified', $data);
    }

    public function getAlldistricts(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('districts_temp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAlldistricts_classified(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('districts_temp_classified');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_area_temp() {
        $this->db->query('DELETE FROM `area_temp`');
    }

    public function delete_area_temp_classified() {
        $this->db->query('DELETE FROM `area_temp_classified`');
    }
    public function add_area_temp($data) {
        $this->db->insert('area_temp', $data);
    }

    public function add_area_temp_classified($data) {
        $this->db->insert('area_temp_classified', $data);
    }

    public function getAllarea(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('area_temp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllarea_classified(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('area_temp_classified');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_sub_cat_temp() {
        $this->db->query('DELETE FROM `sub_category_temp`');
    }
    public function add_sub_cat_temp($data) {
        $this->db->insert('sub_category_temp', $data);
    }

    public function getAllsub_cat(){
        $this->db->order_by('count', 'DESC');
        $query = $this->db->get('sub_category_temp');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //classified ads

public function editpost_email_id($id){
	   $this->db->where('ads_id', $id);
         $query = $this->db->get('ads');
		return $query->result();
	}

    public function addClassifiedAds($data) {
	
        $this->db->insert('classified_ads', $data);
        $this->db->limit(1);
		
/*		$this->db->query("INSERT INTO `classified_ads`( `cat_id`, `sub_cat_id`, `title`, `description`, `img_1`, `img_2`, `img_3`, `img_4`, `user_id`, `ad_status`, `cus_name`, `isbn`, `school_name`, `address`, `email`, `phone`, `ad_type`, `ad_cat`, `district_id`, `area_id`, `price`, `date`, `email_status`) VALUES ('".$data['cat_id']."','".$data['sub_cat_id']."','".$data['title']."','".$data['description']."','".$data['img_1']."','".$data['img_2']."','".$data['img_3']."','".$data['img_4']."','1','','".$data['cus_name']."','','".$data['school_name']."','','".$data['email']."','".$data['phone']."','Sell','1','".$data['district_id']."','".$data['area_id']."','".$data['price']."','".$data['date']."','".$data['email_status']."')");*/
		
		$insert_id = $this->db->insert_id();

   return  $insert_id;
    }

    public function editClassifiedAds($id, $data) {
        $this->db->where('ads_id', $id);
        $this->db->update('classified_ads', $data);
        $this->db->limit(1);
    }

    public function deleteClassifiedAds($id) {
        $this->db->where('ads_id', $id);
        $this->db->delete('classified_ads');
        $this->db->limit(1);
    }

    public function getAllClassifiedAds($order_field,$order_type) {
        $this->db->order_by($order_field, $order_type);
        $this->db->join('classified_category','classified_ads.cat_id=classified_category.cat_id');
        $this->db->join('classified_sub_category','classified_ads.sub_cat_id=classified_sub_category.sub_cat_id');
      
        $query = $this->db->get('classified_ads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllWithStatusClassifiedAds($status) {
        $this->db->order_by('ads_id', 'desc');
        $this->db->join('classified_category','classified_ads.cat_id=classified_category.cat_id');
        $this->db->join('classified_sub_category','classified_ads.sub_cat_id=classified_sub_category.sub_cat_id');
        $this->db->join('districts','classified_ads.district_id=districts.district_id');
        $this->db->join('area','classified_ads.area_id=area.area_id');
        $this->db->where('ad_status', $status);
        $this->db->where('cat_status', $status);
        $this->db->where('sub_cat_status', $status);
        $this->db->where('dis_status', $status);
        $this->db->where('area_status', $status);
        $query = $this->db->get('classified_ads');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByIdClassifiedAds($id) {
        $this->db->where('classified_ads.ads_id', $id);
        $this->db->join('classified_category','classified_ads.cat_id=classified_category.cat_id');
        $this->db->join('classified_sub_category','classified_ads.sub_cat_id=classified_sub_category.sub_cat_id');
      

        $this->db->limit(1);
        $query = $this->db->get('classified_ads');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getReview($id){
        //$this->db->join('review','review.ads_id=classified_ads.ads_id','left');
        $this->db->where('ads_id', $id);
       $this->db->where('review_status', 1);
        $query = $this->db->get('review');
        if ($query->num_rows()> 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getByNameClassifiedAds($name) {
        $this->db->where('title', $name);
        $this->db->limit(1);
        $query = $this->db->get('classified_ads');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function fetch_data($limit = 25, $offset = 0) {
        $this->db->order_by('ads_id', 'desc');
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $this->db->where('ad_status', 1);
        $this->db->where('cat_status', 1);
        $this->db->where('sub_cat_status', 1);
        $this->db->where('dis_status', 1);
        $this->db->where('area_status', 1);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('ads');
       // print_r($this->db);die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        return $data;
        }
        return false;
   }

       // public function fetch_data_by_sub_cat($id,$limit = 25, $offset = 0) {
   public function fetch_data_by_sub_cat($id,$startpoint) {
        $this->db->order_by('ads_id', 'desc');
        $this->db->join('category','ads.cat_id=category.cat_id');
        $this->db->join('sub_category','ads.sub_cat_id=sub_category.sub_cat_id');
        $this->db->join('districts','ads.district_id=districts.district_id');
        $this->db->join('area','ads.area_id=area.area_id');
        $this->db->where('ad_status', 1);
        $this->db->where('cat_status', 1);
        $this->db->where('sub_cat_status', 1);
        $this->db->where('dis_status', 1);
        $this->db->where('area_status', 1);
        $this->db->where('ads.sub_cat_id', $id);
        $this->db->limit($startpoint);
        $query = $this->db->get('ads');
       // print_r($this->db);die();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        return $data;
        }
        return false;
   }

   public function count_all_ClassifiedAds(){
        $this->db->where('ad_status', 1);
         $query = $this->db->get('classified_ads');
		return $query->num_rows();
	}

    public function count_all_by_category_classified($id){
        $this->db->where('ad_status', 1);
        $this->db->where('cat_id', $id);
        $query = $this->db->get('classified_ads');
		return $query->num_rows();
	}

    public function count_all_by_sub_category_classified($id){
        $this->db->where('ad_status', 1);
        $this->db->where('sub_cat_id', $id);
        $query = $this->db->get('classified_ads');
		return $query->num_rows();
	}

    public function count_all_by_dis_classified($id){
        $this->db->where('ad_status', 1);
        $this->db->where('district_id', $id);
        $query = $this->db->get('classified_ads');
		return $query->num_rows();
	}

    public function count_all_by_area_classified($id){
        $this->db->where('ad_status', 1);
        $this->db->where('area_id', $id);
        $query = $this->db->get('classified_ads');
		return $query->num_rows();
	}

    public function delete_cat_temp_classified() {
      //  $this->db->query('DELETE FROM `cat_temp_classified`');
    }
    public function add_cat_temp_classified($data) {
        //$this->db->query('DELETE FROM `cat_temp`');
       // $this->db->insert('cat_temp_classified', $data);
    }

    public function getAllCat_classified(){}

    public function delete_sub_cat_temp_classified() {
       // $this->db->query('DELETE FROM `sub_category_temp_classified`');
    }
    public function add_sub_cat_temp_classified($data) {
       // $this->db->insert('sub_category_temp_classified', $data);
    }

    public function getAllsub_cat_classified(){}

    public function addReview($data){
        $this->db->insert('review', $data);
        $this->db->limit(1);
    }


    public function getAllReview($order_field,$order_type)
    {
        $this->db->order_by($order_field, $order_type);
        $this->db->join('classified_ads', 'classified_ads.ads_id=review.ads_id');
        $query = $this->db->get('review');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function deleteReviewAds($id){
        $this->db->where('review_id', $id);
        $this->db->delete('review');
        $this->db->limit(1);
    }

    public function getReviewAds($id){
        $this->db->where('review_id', $id);
        $query = $this->db->get('review');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function changeReviewAds($id,$data){
        $this->db->where('review_id', $id);
        $this->db->update('review',$data);
        $this->db->limit(1);
    }
}
