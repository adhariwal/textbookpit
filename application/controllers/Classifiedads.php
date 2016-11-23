<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Classifiedads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Classified Ads | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('ads_model', '', TRUE);
        $this->load->model('category_model', '', TRUE);
        $this->load->model('subcategory_model', '', TRUE);
        $this->load->model('districts_model', '', TRUE);
        $this->load->model('area_model', '', TRUE);
        $this->load->model('pages_model', '', TRUE);
        $config =  array(
          'upload_path'     => "./uploads/ads/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "2000",
          'max_height'      => "2024",
          'max_width'       => "2024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
        $id='';
    }

    public function index() {
            $data['ads'] = $this->ads_model->getAllClassifiedAds('ads_id','desc');
            $this->load->view('admin/classifiedads/index', $data);
            $this->load->view('admin/footer');
    }

    public function add() {
             $data=array(
                'btn_back'=> base_url().'index.php/classifiedads',
                'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                'districts'=>$this->districts_model->getAllWithStatus(1),
                'areas'=>$this->area_model->getAllWithStatus(1)
            );
            $this->load->view('admin/classifiedads/add',$data);
            $this->load->view('admin/footer');
    }

    public function addAd() {
        $err="";
            if ($this->form_validation->run() == FALSE) {
                $data=array(
                'btn_back'=> base_url().'index.php/classifiedads',
                'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                'districts'=>$this->districts_model->getAllWithStatus(1),
                'areas'=>$this->area_model->getAllWithStatus(1)
                );
                $this->load->view('admin/classifiedads/add',$data);
                $this->load->view('admin/footer');
            }
            else {
                $e_status=$this->input->post('email_status');
                if (isset($e_status)) {
                    $email_status=1;
                }else $email_status=0;
                $data = array(
                    'title' => $this->db->escape_str($this->input->post('title')),
                    'cat_id' => $this->db->escape_str($this->input->post('selectCategory')),
                    'sub_cat_id' => $this->db->escape_str($this->input->post('selectSubCategory')),
                    'description' => $this->input->post('description'),
                    'price' => $this->db->escape_str($this->input->post('price')),
                    'cus_name' => $this->db->escape_str($this->input->post('customer')),
					'isbn' => $this->db->escape_str($this->input->post('ISBN')),
					'school_name' => $this->db->escape_str($this->input->post('school_name')),
                    'address' => $this->input->post('address'),
                    'email' => $this->db->escape_str($this->input->post('email')),
                    'phone' => $this->db->escape_str($this->input->post('phone')),
                    'ad_type' => $this->db->escape_str($this->input->post('selectType')),
                    'ad_cat' => $this->db->escape_str($this->input->post('selectCat')),
                    'district_id' => $this->db->escape_str($this->input->post('selectDis')),
                    'area_id' => $this->db->escape_str($this->input->post('selectArea')),
                    'date' =>date("F j, Y, g:i a"),
                    'email_status' =>$email_status
                );
                if ($_FILES['img_1']['name'] != ""){
                    $field_name1="img_1";
                    if($this->handle_upload($field_name1) == TRUE){
                        $data['img_1']=$this->handle_upload($field_name1);
                    }else {
                        $err.="invalid image";
                        $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                        $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                        $data['districts']=$this->districts_model->getAllWithStatus(1);
                        $data['areas']=$this->area_model->getAllWithStatus(1);
                        $data = array(
                        'btn_back'=> base_url().'index.php/classifiedads',
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                        );
                        $this->load->view('admin/classifiedads/add',$data);
                        $this->load->view('admin/footer');
                    }
                }else $data['img_1']="no";//$data['img_1']="uploads/ads/no_img1.jpg";
                
                if ($_FILES['img_2']['name'] != ""){
                    $field_name2="img_2";
                    if($this->handle_upload($field_name2) == TRUE){
                        $data['img_2']=$this->handle_upload($field_name2);
                    }else {
                        $err.="invalid image";
                        $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                        $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                        $data['districts']=$this->districts_model->getAllWithStatus(1);
                        $data['areas']=$this->area_model->getAllWithStatus(1);
                        $data = array(
                        'btn_back'=> base_url().'index.php/classifiedads',
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                        );
                        $this->load->view('admin/classifiedads/add',$data);
                        $this->load->view('admin/footer');
                    }
                }else $data['img_2']="no";//$data['img_2']="uploads/ads/no_img2.jpg";

                if ($_FILES['img_3']['name'] != ""){
                    $field_name3="img_3";
                    if($this->handle_upload($field_name3) == TRUE){
                        $data['img_3']=$this->handle_upload($field_name3);
                    }else {
                        $err.="invalid image";
                        $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                        $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                        $data['districts']=$this->districts_model->getAllWithStatus(1);
                        $data['areas']=$this->area_model->getAllWithStatus(1);
                        $data = array(
                        'btn_back'=> base_url().'index.php/classifiedads',
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                        );
                        $this->load->view('admin/classifiedads/add',$data);
                        $this->load->view('admin/footer');
                    }
                }else $data['img_3']="no";//$data['img_3']="uploads/ads/no_img3.jpg";

                if ($_FILES['img_4']['name'] != ""){
                    $field_name4="img_4";
                    if($this->handle_upload($field_name4) == TRUE){
                        $data['img_4']=$this->handle_upload($field_name4);
                    }else {
                        $err.="invalid image";
                        $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                        $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                        $data['districts']=$this->districts_model->getAllWithStatus(1);
                        $data['areas']=$this->area_model->getAllWithStatus(1);
                        $data = array(
                        'btn_back'=> base_url().'index.php/classifiedads',
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                        );
                        $this->load->view('admin/classifiedads/add',$data);
                        $this->load->view('admin/footer');
                    }
                }else $data['img_4']="no";//$data['img_4']="uploads/ads/no_img4.jpg";
                if(empty ($err)){
                    $this->ads_model->addClassifiedAds($data);
                    $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                    $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                    $data['districts']=$this->districts_model->getAllWithStatus(1);
                    $data['areas']=$this->area_model->getAllWithStatus(1);
                    $data=array(
                    'btn_back'=> base_url().'index.php/classifiedads',
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                    'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                    'districts'=>$this->districts_model->getAllWithStatus(1),
                    'areas'=>$this->area_model->getAllWithStatus(1),
                    'massage'=>'<div class="alert alert-success">Data Sucessfully Saved.</div>'
                    );

                    $cus_email=$this->db->escape_str($this->input->post('email'));
                    $cus_name=$this->db->escape_str($this->input->post('customer'));
                    $cus_phone=$this->db->escape_str($this->input->post('phone'));
                    $cus_details="Customer Name - ".$cus_name." Customer phone - ".$cus_phone;

                    $result= $this->pages_model->getAll();
                    if($result){
                        foreach ($result as $row) {
                            $to=$row->email;

                        }
                    }
                    $sub='New Ad posting on takas.artifectx.com';
                    $msg='New Ad posting on takas.artifectx.com from '."<br><br>Customer Name - ".$cus_name."<br>Customer phone - ".$cus_phone;

                    $this->send_mail_to_admin($cus_email,$cus_details,$to,$sub,$msg);
                    

                    $web_msg='Your ad sucessfully has submited to takas.artifectx.com classified web.<br>'.
                                       '<br><br>Your ad will publish within 1 hour after review. Thank You. takas.artifectx.com'.
                    '<br>-----------------------------------------------------------------------------------------------------------'.
                    '<br>Thank you for posting on your ad on takas.artifectx.com'.
                    '<br>Regards,'.
                    '<br>takas.artifectx.com team'.
                    '<br>takas.artifectx.com'.
                    '<br><br>Need help please contact us - info@artifectx.com';

                    $this->send_mail_to_customer($to,$cus_email,$sub,$web_msg);

                    $this->load->view('admin/classifiedads/add',$data);
                    $this->load->view('admin/footer');
                }
            }
    }

    public function send_mail_to_admin($from,$sender_details,$to,$sub,$msg){
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($from, $sender_details);
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
    }

    public function send_mail_to_customer($from,$to,$sub,$msg){
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($from, 'Redpage.lk');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->ads_model->getByIdClassifiedAds($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'ads_id' => $row->ads_id,
                    'cat_id' => $row->cat_id,
                    'category'=>$row->category,
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                    'sub_cat_id' => $row->sub_cat_id,
                    'sub_category' => $row->sub_category,
                    'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                    'title' => $row->title,
                    'description' => $row->description,
                    'price' => $row->price,
                    'img_1' => $row->img_1,
                    'img_2' => $row->img_2,
                    'img_3' => $row->img_3,
                    'img_4' => $row->img_4,
                    'ad_status' => $row->ad_status,
                    'cus_name' => $row->cus_name,
					 'isbn' => $row->isbn,
                    'address' => $row->address,
                    'email' => $row->email,
                    'phone' => $row->phone,
					'school_name' => $row->school_name,
                    'ad_type' => $row->ad_type,
                    'ad_cat' => $row->ad_cat,
                    'district_id' => $row->district_id,
                    'district' => $row->district,
                    'districts'=>$this->districts_model->getAllWithStatus(1),
                    'area_id' => $row->area_id,
                    'area' => $row->area,
                    'areas'=>$this->area_model->getAllWithStatus(1),
                    'btn_back'=> base_url().'index.php/classifiedads',
                        'email_status' =>$row->email_status
                    );
                }
                $this->load->view('admin/classifiedads/edit', $data);
                $this->load->view('admin/footer');
                }else redirect('classifiedads', 'refresh');
            }
            else redirect('classifiedads', 'refresh');
    }

    public function editAd($id) {
        $err="";
        $result= $this->ads_model->getByIdClassifiedAds($id);
        if($result){
            if ($this->form_validation->run() == FALSE) {
                $data=$this->getData($id);
                $this->load->view('admin/classifiedads/edit', $data);
                $this->load->view('admin/footer');
            }
            else {
                $e_status=$this->input->post('email_status');
                if (isset($e_status)) {
                    $email_status=1;
                }else $email_status=0;
                $data = array(
                    'ads_id' => $this->db->escape_str($this->input->post('ads_id')),
                    'title' => $this->db->escape_str($this->input->post('title')),
                    'cat_id' => $this->db->escape_str($this->input->post('selectCategory')),
                    'sub_cat_id' => $this->db->escape_str($this->input->post('selectSubCategory')),
                    'description' => $this->input->post('description'),
                    'price' => $this->db->escape_str($this->input->post('price')),
                    'cus_name' => $this->db->escape_str($this->input->post('customer')),
					'isbn' => $this->db->escape_str($this->input->post('ISBN')),
					'school_name' => $this->db->escape_str($this->input->post('school_name')),
                    'address' => $this->input->post('address'),
                    'email' => $this->db->escape_str($this->input->post('email')),
                    'phone' => $this->db->escape_str($this->input->post('phone')),
                    'ad_type' => $this->db->escape_str($this->input->post('selectType')),
                    'ad_cat' => $this->db->escape_str($this->input->post('selectCat')),
                    'district_id' => $this->db->escape_str($this->input->post('selectDis')),
                    'area_id' => $this->db->escape_str($this->input->post('selectArea')),
                    'ad_status' => $this->db->escape_str($this->input->post('selectAd')),
                    'email_status' =>$email_status
                );
                if ($_FILES['img_1']['name'] != ""){
                    $field_name1="img_1";
                    if($this->handle_upload($field_name1) == TRUE){
                        $data['img_1']=$this->handle_upload($field_name1);
                    }else {
                        $err.="invalid image";
                        $data=$this->getData($id);
                        $data['massage']='<div class="alert alert-error">You must upload a valid image & type.</div>';
                        $this->load->view('admin/classifiedads/edit', $data);
                        $this->load->view('admin/footer');
                    }
                }else{
                    foreach ($result as $row)
                        $data['img_1']='no';//$data['img_1']=$row->img_1;
                }

                if ($_FILES['img_2']['name'] != ""){
                    $field_name2="img_2";
                    if($this->handle_upload($field_name2) == TRUE){
                        $data['img_2']=$this->handle_upload($field_name2);
                    }else {
                        $err.="invalid image";
                        $data=$this->getData($id);
                        $data['massage']='<div class="alert alert-error">You must upload a valid image & type.</div>';
                        $this->load->view('admin/classifiedads/edit', $data);
                        $this->load->view('admin/footer');
                    }
                }else{
                    foreach ($result as $row)
                    $data['img_2']='no';//$data['img_2']=$row->img_2
                }

                if ($_FILES['img_3']['name'] != ""){
                    $field_name3="img_3";
                    if($this->handle_upload($field_name3) == TRUE){
                        $data['img_3']=$this->handle_upload($field_name3);
                    }else {
                        $err.="invalid image";
                        $data=$this->getData($id);
                        $data['massage']='<div class="alert alert-error">You must upload a valid image & type.</div>';
                        $this->load->view('admin/classifiedads/edit', $data);
                        $this->load->view('admin/footer');
                    }
                }else{
                    foreach ($result as $row)
                        $data['img_3']='no';//$data['img_3']=$row->img_3;
                }

                if ($_FILES['img_4']['name'] != ""){
                    $field_name4="img_4";
                    if($this->handle_upload($field_name4) == TRUE){
                        $data['img_4']=$this->handle_upload($field_name4);
                    }else {
                        $err.="invalid image";
                        $data=$this->getData($id);
                        $data['massage']='<div class="alert alert-error">You must upload a valid image & type.</div>';
                        $this->load->view('admin/classifiedads/edit', $data);
                        $this->load->view('admin/footer');
                    }
                }else{
                    $data['img_4']='no';//$data['img_4']=$row->img_4;
                }
                if(empty ($err)){
                    $this->ads_model->editClassifiedAds($id, $data);
                    $data=$this->getData($id);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $this->load->view('admin/classifiedads/edit', $data);
                    $this->load->view('admin/footer');
                }
            } 
        }else redirect('classifiedads', 'refresh');
    }

    public function getData($id){
        $result= $this->ads_model->getByIdClassifiedAds($id);
        if($result){
           foreach ($result as $row) {
            $data = array(
            'ads_id' => $row->ads_id,
            'cat_id' => $row->cat_id,
            'category'=>$row->category,
            'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
            'sub_cat_id' => $row->sub_cat_id,
            'sub_category' => $row->sub_category,
            'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
            'title' => $row->title,
			 'school_name' => $row->school_name,
            'description' => $row->description,
            'price' => $row->price,
            'img_1' => $row->img_1,
            'img_2' => $row->img_2,
            'img_3' => $row->img_3,
            'img_4' => $row->img_4,
            'ad_status' => $row->ad_status,
            'cus_name' => $row->cus_name,
			 'isbn' => $row->isbn,
			 // 'school_name' => $row->school_name,
            'address' => $row->address,
            'email' => $row->email,
            'phone' => $row->phone,
            'ad_type' => $row->ad_type,
            'ad_cat' => $row->ad_cat,
            'district_id' => $row->district_id,
            'district' => $row->district,
            'districts'=>$this->districts_model->getAllWithStatus(1),
            'area_id' => $row->area_id,
            'area' => $row->area,
            'areas'=>$this->area_model->getAllWithStatus(1),
            'btn_back'=> base_url().'index.php/classifiedads',
                'email_status' => $row->email_status,
            );
        }
            return $data;
        }else redirect('classifiedads', 'refresh');
    }
    
    public function delete($id) {
            $this->ads_model->deleteClassifiedAds($id);
            redirect('classifiedads', 'refresh');
    }

    public function handle_upload($field_name){
        if($this->upload->do_upload($field_name))
        {
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $upload_data["full_path"];
            $image_config['create_thumb'] = FALSE;
            //$image_config['maintain_ratio'] = TRUE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width']         = 1024;
            $image_config['height']       = 768;

            /*$image_config['wm_text'] = 'Powered by Takas-Classifieds by Artifectx.com';
            $image_config['wm_type'] = 'text';
            $image_config['wm_font_size']	= '30';
            $image_config['wm_font_color'] = '000000';
            $image_config['wm_vrt_alignment'] = 'center';
            $image_config['wm_hor_alignment'] = 'center';
            $image_config['wm_padding'] = '50';*/

            $image_config['wm_type'] = 'overlay';
            $image_config['wm_overlay_path'] = './uploads/watermark.png';//the overlay image
            $image_config['wm_opacity']=35;
            $image_config['wm_vrt_alignment'] = 'middle';
            $image_config['wm_hor_alignment'] = 'center';

           $this->load->library('image_lib', $image_config);
            $this->image_lib->initialize($image_config);

            $this->image_lib->watermark();
            if (!$this->image_lib->watermark()) {
                echo $this->image_lib->display_errors();die();
            }


            $this->image_lib->resize();
            $this->image_lib->clear();
            return $path="uploads/ads/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }

    public function getAllReview(){
        $data['ads_review'] = $this->ads_model->getAllReview('reviewer_name','desc');
        $this->load->view('admin/classifiedads/review', $data);
        $this->load->view('admin/footer');
    }

    public function delete_review($id){
        if($id){
            $this->ads_model->deleteReviewAds($id);
            redirect('classifiedads/getAllReview', 'refresh');
        }
    }

    public function change_review($id){
        if($id){
            $review= $this->ads_model->getReviewAds($id);
            foreach($review as $row){
                if($row->review_status==1)$status=0;
                else $status=1;
            }
            $data=array(
                'review_status'=>$status
            );
            $this->ads_model->changeReviewAds($id,$data);
            redirect('classifiedads/getAllReview', 'refresh');
        }
    }
}
