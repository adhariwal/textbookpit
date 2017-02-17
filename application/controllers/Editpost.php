<?php 
class Editpost extends CI_Controller{
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
        }
    }
	 public function logout()
     {
       
       session_destroy();
      
       redirect('index.php', 'refresh');
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

            /*$image_config['wm_text'] = 'Powered by Takas-Classifieds by Textbookpit.com';
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
	 public function editAd($id) {
        $err="";
		if($id !=$_SESSION['edit_id']){
			redirect('index.php/editpost/index?id='.$_SESSION['edit_id'], 'refresh');
			}
        $result= $this->ads_model->getByIdClassifiedAds($id);
		
        if($result){
        
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
                   // 'email' => $this->db->escape_str($this->input->post('email')),
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
                        $this->load->view('web/header',$data);
		
            $this->load->view('web/post_ad_edit', $data);
		
        $this->load->view('web/footer');
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
                         $this->load->view('web/header',$data);
		
            $this->load->view('web/post_ad_edit', $data);
		
        $this->load->view('web/footer');
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
                        $this->load->view('web/header',$data);
		
            $this->load->view('web/post_ad_edit', $data);
		
        $this->load->view('web/footer');
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
                       $this->load->view('web/header',$data);
		
            $this->load->view('web/post_ad_edit', $data);
		
        $this->load->view('web/footer');
                    }
                }else{
                    $data['img_4']='no';//$data['img_4']=$row->img_4;
                }
                if(empty ($err)){
                    $this->ads_model->editClassifiedAds($id, $data);
                    $data=$this->getData($id);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    redirect('editpost/form', 'refresh');
                }
             
        }
    }
	   public function send_mail_to_customer($from,$to,$sub,$msg){
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
	
        $this->email->from($from, 'Textbookpit.com');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
    }
	public function form(){
	
		if(isset($_POST['one_pass'])){
			if($_POST['one_pass']==$_SESSION['rand_number']){
				$_SESSION['user_verify']='1';
				}else{
					unset($_SESSION['user_verify']);
					}
			}
			if(!isset($_SESSION['user_verify'])){
				redirect('editpost/index?id='.$_SESSION['edit_id'], 'refresh');
				}else{
				if($_SESSION['user_verify']==""){
					 redirect('editpost/index?id='.$_SESSION['edit_id'], 'refresh');
					}
					 $id=$_SESSION['edit_id'];
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
            
              $this->load->view('web/header',$data);
		
            $this->load->view('web/post_ad_edit', $data);
		
        $this->load->view('web/footer');
                }
            
				}
		
		}
	   public function index(){
        
        if(isset($_GET['id'])){
			
			$query=$this->db->query("select * from classified_ads where ads_id='".$_GET['id']."'");
			$asi=$query->row();
			if(isset($asi->email)){
			$data['email']=$asi->email;
			$length = 10;
			 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }   $result= $this->pages_model->getAll();
                    if($result){
                        foreach ($result as $row) {
                            $to=$row->email;

                        }
                    }
			$_SESSION['rand_number']=$randomString;
			$_SESSION['edit_id']=$_GET['id'];
			$sub='one time password';
			$msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>One Time Password</title>
</head>

<body><div style="text-align:center">
<a href="'.base_url().'"><img src="'.base_url().'web_assest/img/logo.png" ></a>

<h1>Hello, '.$asi->cus_name.'</h1>
<h2>one time password is '.$_SESSION['rand_number'].'</h2>
<a href="'.base_url().'">Textbookpit.com</a>
</div>
</body>
</html>';
			$this->send_mail_to_customer($to,$data['email'],$sub,$msg);
			}
			}
        $data['page_title'] ="Edit your Posting";
		 $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $this->load->view('web/header',$data);
		
        $this->load->view('web/editpost',$data);
		
        $this->load->view('web/footer');
    }
}

?>
