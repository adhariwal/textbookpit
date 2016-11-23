<?php
class Webdetails extends CI_Controller{
    public function  __construct() {
        parent::__construct();
        $sess_array = array(
                     'username' => 'visitor'
                   );
        $this->session->set_userdata('home_in',$sess_array);
        
        $this->load->model('pages_model', '', TRUE);
        $this->load->model('banerads_model', '', TRUE);

        $this->load->model('category_model', '', TRUE);
        $this->load->model('subcategory_model', '', TRUE);
        $this->load->model('districts_model', '', TRUE);
        $this->load->model('area_model', '', TRUE);
        $this->load->model('ads_model', '', TRUE);

         $config =  array(
          'upload_path'     => "./uploads/ads/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "1000",
          'max_height'      => "1024",
          'max_width'       => "1024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
    }
    
    public function about_us(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="About Us | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/about_us',$data);
        $this->load->view('web/footer');
    }

    public function services(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Our Services | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/services',$data);
        $this->load->view('web/footer');
    }

    public function privacy(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Privacy Policy | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/privacy',$data);
        $this->load->view('web/footer');
    }

    public function terms(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Terms & Conditions | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/terms',$data);
        $this->load->view('web/footer');
    }

    public function help(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Terms & Conditions | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/help',$data);
        $this->load->view('web/footer');
    }

    public function contact(){
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Contact Us | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/contact',$data);
        $this->load->view('web/footer');
    }

    public function contactSeller(){

        $seller_email=$this->db->escape_str($this->input->post('seller'));
        $cus_name=$this->db->escape_str($this->input->post('name'));
        $cus_email=$this->db->escape_str($this->input->post('email'));
        $cus_phone=$this->db->escape_str($this->input->post('phone'));
        $cus_msg='takas.artifectx.com<br><br>'.
                 'The customer contact you, regarding your ad -'.$this->db->escape_str($this->input->post('subject')).' on takas.artifectx.com<br><br>'.
                 'Customer Details<br><br>'.
                 'Customer Name -'.$cus_name.'<br>'.
                 'Customer E-mail -'.$cus_email.'<br>'.
                 'Customer Phone -'.$cus_phone.'<br>'.
                 'Customer message -'.$this->db->escape_str($this->input->post('message')).
                 '<br><br>------------------------------------------------------------------------------------'.
                    '<br>Thank you for posting on your ad on takas.artifectx.com'.
                    '<br>takas.artifectx.com,'.
                    '<br>Takas-Classified team'.
                    '<br>takas.artifectx.com'.
                    '<br><br>Need help please contact us - info@artifectx.com'.
                    '<br><br>takas.artifectx.com - Premier Online Business Directory & Classified site.'.
                    '<br><br>Follow us on Facebook: https://www.facebook.com/artifectx'.
                    '<br>Tweet us on twitter: https://twitter.com/artifectx';
        $sub='Regarding ad '.$this->db->escape_str($this->input->post('subject')).' post on takas.artifectx.com ';


        $this->load->library('email');
        $this->email->clear();
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('info@artifectx.com', 'artifectx.com');
        $this->email->to($seller_email);

        $this->email->subject($sub);
        $this->email->message($cus_msg);

        $this->email->send();
        redirect(base_url().'index.php/classified_ads/index');
    }

    public function contactUs(){
        $to=$this->db->escape_str($this->input->post('webemail'));
        $cus_name=$this->db->escape_str($this->input->post('name'));
        $cus_email=$this->db->escape_str($this->input->post('email'));
        $cus_phone=$this->db->escape_str($this->input->post('phone'));
        $cus_msg=$this->db->escape_str($this->input->post('message'));
        $sub=$this->db->escape_str($this->input->post('subject'));

        $this->load->library('email');
        $this->email->clear();
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($cus_email, $cus_name);
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($cus_msg);
        $this->email->send();

        $data['massage']='<div class="alert alert-success">Your Message Sucessfully Sent.</div>';
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Contact Us | ";
        $data['pages']=$this->pages_model->getPageData();
        $this->load->view('web/header',$data);
        $this->load->view('web/contact',$data);
        $this->load->view('web/footer');
    }

    public function post(){
         $data=array(
                'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                'districts'=>$this->districts_model->getAllWithStatus(1),
                'areas'=>$this->area_model->getAllWithStatus(1)
            );
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['page_title'] ="Post Ad | ";
        $this->load->view('web/header',$data);
        $this->load->view('web/post_ad',$data);
        $this->load->view('web/footer');
    }

    public function postAd() {
        $err="";
        $e_status=$this->input->post('email_status');
        if (isset($e_status)) {
            $email_status=1;
        }else $email_status=0;
                $data = array(
                    'title' => $this->db->escape_str($this->input->post('title')),
                    'cat_id' => $this->db->escape_str($this->input->post('selectCategory')),
                    'sub_cat_id' => $this->db->escape_str($this->input->post('selectSubCategory')),
                    'description' =>$this->input->post('description'),
                    'price' => $this->db->escape_str($this->input->post('price')),
                    'cus_name' => $this->db->escape_str($this->input->post('customer')),
					
					'isbn' => $this->db->escape_str($this->input->post('isbn')),
                  //  'address' => $this->input->post('address'),
                    'email' => $this->db->escape_str($this->input->post('email')),
                    'phone' => $this->db->escape_str($this->input->post('phone')),
                    //'ad_type' => $this->db->escape_str($this->input->post('selectType')),
                    //'ad_cat' => $this->db->escape_str($this->input->post('selectCat')),
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
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<small><a  class="btn-advanced-search">You must upload a valid image & type.</a></small>'
                        );
                        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                        $data['page_title'] ="Post Ad | ";
                        $this->load->view('web/header',$data);
                        $this->load->view('web/post_ad',$data);
                        $this->load->view('web/footer');
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
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<small><a  class="btn-advanced-search">You must upload a valid image & type.</a></small>'
                        );
                        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                        $data['page_title'] ="Post Ad | ";
                        $this->load->view('web/header',$data);
                        $this->load->view('web/post_ad',$data);
                        $this->load->view('web/footer');
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
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<small><a  class="btn-advanced-search">You must upload a valid image & type.</a></small>'
                        );
                        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                        $data['page_title'] ="Post Ad | ";
                        $this->load->view('web/header',$data);
                        $this->load->view('web/post_ad',$data);
                        $this->load->view('web/footer');
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
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'massage' => '<small><a  class="btn-advanced-search">You must upload a valid image & type.</a></small>'
                        );
                        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                        $data['page_title'] ="Post Ad | ";
                        $this->load->view('web/header',$data);
                        $this->load->view('web/post_ad',$data);
                        $this->load->view('web/footer');
                    }
                }else $data['img_4']="no";//$data['img_4']="uploads/ads/no_img4.jpg";
                if(empty ($err)){
                    $this->ads_model->addClassifiedAds($data);
                    $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                    $data['subcategories']=$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1);
                    $data['districts']=$this->districts_model->getAllWithStatus(1);
                    $data['areas']=$this->area_model->getAllWithStatus(1);
                    
                    $data=array(
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                    'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                    'districts'=>$this->districts_model->getAllWithStatus(1),
                    'areas'=>$this->area_model->getAllWithStatus(1),
                    'massage'=>'<div class="alert alert-success">Your Ad Sucessfully posted.</div>'
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

                    $sub='New Ad posting on TextBookPit.Com';
                    $msg='New Ad posting on TextBookPit.Com  from '."<br><br>Customer Name - ".$cus_name."<br>Customer phone - ".$cus_phone;

                    $this->send_mail_to_admin($cus_email,$cus_details,$to,$sub,$msg);

                    $web_msg='Your ad sucessfully has submited to takas.artifectx.com classified web.<br>Please confirm your contact details before Publish your ad.<br><br>'.

                    '<br><br>Your ad will publish within 1 hour after review. Thank You. TextBookPit.Com'.
                    '<br>-----------------------------------------------------------------------------------------------------------'.
                    '<br>Thank you for posting on your ad on takas.artifectx.com'.
                    '<br>Regards,'.
                    '<br>Takas-Classified team'.
                    '<br>takas.artifectx.com'.
                    '<br><br>Need help please contact us - info@artifectx.com'.
                    '<br><br>takas.artifectx.com - Premier Online Business Directory & Classified site.'.
                    '<br><br>Follow us on Facebook: https://www.facebook.com/artifectx'.
                    '<br>Tweet us on twitter: https://twitter.com/artifectx';
                    $this->send_mail_to_customer($to,$cus_email,$sub,$web_msg);
                    
                        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                        $data['page_title'] ="Post Ad | ";
                        $this->load->view('web/header',$data);
                        $this->load->view('web/post_ad',$data);
                        $this->load->view('web/footer');
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
        $this->email->from($from, 'Artifectx.com');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
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
}
