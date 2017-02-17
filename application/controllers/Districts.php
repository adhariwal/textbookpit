<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Districts extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="School Name | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('districts_model', '', TRUE);
		 $config =  array(
          'upload_path'     => "./uploads/collage/",
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

    public function index(){
            $data['districts']=$this->districts_model->getAll('COLLEGE','asc');
            $this->load->view('admin/districts/index',$data);
            $this->load->view('admin/footer');
    }

    public function add(){
           $data=array(
                'btn_back'=> base_url().'index.php/districts'
            );
           $this->load->view('admin/districts/add',$data);
           $this->load->view('admin/footer');
    }

    public function addDistricts(){
            if($this->form_validation->run() == FALSE){
                 $data=array(
                    'btn_back'=> base_url().'index.php/districts'
               );
               $this->load->view('admin/districts/add',$data);
               $this->load->view('admin/footer');
            }
            else{
				 if ($_FILES['img_1']['name'] != ""){
                    $field_name1="img_1";
					
                    if($this->handle_upload($field_name1) == TRUE){
                        $image=$this->handle_upload($field_name1);
                    }
 }else{
	  $result= $this->districts_model->getById($id);
	 $image= $result[0]->img_1;
	 }
				
               $data = array(
                        'COLLEGE' => $this->db->escape_str($this->input->post('district')),
                        'status' => $this->db->escape_str($this->input->post('status')),
						'img_1' => $image
                    );
                $this->districts_model->add($data);
                $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                $data['btn_back']= base_url().'index.php/districts';
                $this->load->view('admin/districts/add',$data);
                $this->load->view('admin/footer');
            }
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
            return $path="uploads/collage/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }
    public function edit($id){
            if(isset ($id)){
                $result= $this->districts_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'district_id' => $row->ID,
                    'district' => $row->COLLEGE,
                    'dis_status' => $row->status,
					'img_1' => $row->img_1,
                    'btn_back'=> base_url().'index.php/districts'
                );
            }
                $this->load->view('admin/districts/edit', $data);
                $this->load->view('admin/footer');
                }else redirect('districts', 'refresh');
            }
            else redirect('districts', 'refresh');
    }

    public function editDistricts($id) {
            if(isset ($id)){
                $result= $this->districts_model->getById($id);
                if($result){
                    if ($this->form_validation->run() == FALSE) {
                    foreach ($result as $row) {
                        $data = array(
                            'district_id' => $row->ID,
                    'district' => $row->COLLEGE,
                    'dis_status' => $row->status,
					'img_1' => $row->img_1,
                            'btn_back'=> base_url().'index.php/districts'
                        );
                    }
                    $this->load->view('admin/districts/edit', $data);
                    $this->load->view('admin/footer');
                }
                else {
					
 if ($_FILES['img_1']['name'] != ""){
                    $field_name1="img_1";
					
                    if($this->handle_upload($field_name1) == TRUE){
                        $image=$this->handle_upload($field_name1);
                    }
 }else{
	  $result= $this->districts_model->getById($id);
	 $image= $result[0]->img_1;
	 }
                    $data = array(
                        'COLLEGE' => $this->db->escape_str($this->input->post('district')),
                        'status' => $this->db->escape_str($this->input->post('status')),
						'img_1' => $image
                    );
                    $this->districts_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/districts';
					 $data='';
					$result= $this->districts_model->getById($id);
					   foreach ($result as $row) {
                        $data = array(
                            'district_id' => $row->ID,
                    'district' => $row->COLLEGE,
                    'dis_status' => $row->status,
					'img_1' => $row->img_1,
                            'btn_back'=> base_url().'index.php/districts'
                        );
                    }
                    $this->load->view('admin/districts/edit', $data);
                    $this->load->view('admin/footer');
                }
                }else redirect('districts', 'refresh');
            }
            else redirect('districts', 'refresh');
    }

    public function delete($id){
            $this->districts_model->delete($id);
            redirect('districts', 'refresh');
    }
}