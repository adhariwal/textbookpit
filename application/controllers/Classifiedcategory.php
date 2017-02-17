<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Classifiedcategory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Classified Categories | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('category_model', '', TRUE);
        $config =  array(
          'upload_path'     => "./uploads/category/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "4000",
          'max_height'      => "4068",
          'max_width'       => "4024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
    }

    public function index() {
            $data['categories'] = $this->category_model->getAllClassifiedCategory('category','asc');
            $this->load->view('admin/classifiedcategory/index', $data);
            $this->load->view('admin/footer');
    }

    public function add() {
             $data = array(
                    'btn_back'=> base_url().'index.php/classifiedcategory'
                );
            $this->load->view('admin/classifiedcategory/add',$data);
            $this->load->view('admin/footer');
    }

    public function addClassifiedCategory() {
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'btn_back'=> base_url().'index.php/classifiedcategory'
                );
                $this->load->view('admin/classifiedcategory/add',$data);
                $this->load->view('admin/footer');
            }
            else {
                $data = array(
                    'category' => $this->db->escape_str($this->input->post('category')),
                );
                if($this->handle_upload() == TRUE){
                    $data['image']=$this->handle_upload();
                    $this->category_model->addClassifiedCategory($data);
                    //$this->session->set_flashdata('sucess', 'Data Sucessfully Saved.');
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                    $data['btn_back']= base_url().'index.php/classifiedcategory';
                    $this->load->view('admin/classifiedcategory/add',$data);
                    $this->load->view('admin/footer');
                }else {
                   $data = array(
                    'btn_back'=> base_url().'index.php/category',
                    'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                    );
                    $this->load->view('admin/classifiedcategory/add',$data);
                    $this->load->view('admin/footer');
                }
            }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->category_model->getByIdClassifiedCategory($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'id' => $row->cat_id,
                    'category' => $row->category,
                    'cat_status' => $row->cat_status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/classifiedcategory'
                );
            }
                    $this->load->view('admin/classifiedcategory/edit', $data);
                    $this->load->view('admin/footer');
                }else redirect('classifiedcategory', 'refresh');
            }
            else redirect('classifiedcategory', 'refresh');
    }

    public function editClassifiedCategory($id) {
        $result= $this->category_model->getByIdClassifiedCategory($id);
        if($result){
            if ($this->form_validation->run() == FALSE) {
                foreach ($result as $row) {
                    $data = array(
                    'id' => $row->cat_id,
                    'category' => $row->category,
                    'cat_status' => $row->cat_status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/classifiedcategory'
                    );
                }
                $this->load->view('admin/classifiedcategory/edit', $data);
                $this->load->view('admin/footer');
            }
            else {
                if ($_FILES['userfile']['name'] != ""){
                    $id =$this->db->escape_str($this->input->post('cat_id'));
                    $data = array(
                        'category' => $this->db->escape_str($this->input->post('category')),
                        'cat_status' => $this->db->escape_str($this->input->post('selectCategory'))
                    );
                    if($this->handle_upload() == TRUE){
                        $data['image']=$this->handle_upload();
                        $this->category_model->editClassifiedCategory($id, $data);
                        $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                        $data['id']=$id;
                        $data['btn_back']= base_url().'index.php/classifiedcategory';
                        $this->load->view('admin/classifiedcategory/edit', $data);
                        $this->load->view('admin/footer');
                    }else{
                       foreach ($result as $row) {
                            $data = array(
                            'id' => $row->cat_id,
                            'category' => $row->category,
                            'cat_status' => $row->cat_status,
                            'image' => $row->image,
                            'btn_back'=> base_url().'index.php/classifiedcategory',
                            'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                            );
                        }
                        $this->load->view('admin/classifiedcategory/edit', $data);
                        $this->load->view('admin/footer');
                    }

                }else{
                    $id =$this->db->escape_str($this->input->post('cat_id'));
                    $data = array(
                        'category' => $this->db->escape_str($this->input->post('category')),
                        'cat_status' => $this->db->escape_str($this->input->post('selectCategory'))
                    );
                    foreach ($result as $row)
                    $data['image']=$row->image;
                    $this->category_model->editClassifiedCategory($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['id']=$id;
                    $data['btn_back']= base_url().'index.php/classifiedcategory';
                    $this->load->view('admin/classifiedcategory/edit', $data);
                    $this->load->view('admin/footer');
                }
            }
        }else redirect('classifiedcategory', 'refresh');
    }

    public function delete($id) {
            $this->category_model->deleteClassifiedCategory($id);
            redirect('classifiedcategory', 'refresh');
    }

    public function handle_upload(){
        if($this->upload->do_upload())
        {
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $upload_data["full_path"];
            $image_config['create_thumb'] = FALSE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width']         = 20;
            $image_config['height']       = 20;
            $this->image_lib->initialize($image_config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return $path="uploads/category/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }

}
