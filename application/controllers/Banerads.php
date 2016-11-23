<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banerads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Baner ads | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('banerads_model', '', TRUE);
        $config =  array(
          'upload_path'     => "./uploads/banerads/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "1000",
          'max_height'      => "768",
          'max_width'       => "1024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib'); 
    }

    public function index() {
            $data['baners'] = $this->banerads_model->getAll('url','asc');
            $this->load->view('admin/banerads/index', $data);
            $this->load->view('admin/footer');
    }

    public function add() {
             $data = array(
                    'btn_back'=> base_url().'index.php/banerads'
                );
            $this->load->view('admin/banerads/add',$data);
            $this->load->view('admin/footer');
    }

    public function addBanerads() {
                $data = array(
                    'url' => $this->db->escape_str($this->input->post('web_url')),
                );
                if($this->handle_upload() == TRUE){
                    $data['image']=$this->handle_upload();
                    $this->banerads_model->add($data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                    $data['btn_back']= base_url().'index.php/banerads';
                    $this->load->view('admin/banerads/add',$data);
                    $this->load->view('admin/footer');
                }else {
                   $data = array(
                    'btn_back'=> base_url().'index.php/banerads',
                    'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                    );
                    $this->load->view('admin/banerads/add',$data);
                    $this->load->view('admin/footer');
                }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->banerads_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'id' => $row->baner_id,
                    'url' => $row->url,
                    'status' => $row->status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/banerads'
                );
            }
                $this->load->view('admin/banerads/edit', $data);
                $this->load->view('admin/footer');
            }else redirect('banerads', 'refresh');
        }
        else redirect('banerads', 'refresh');
    }

    public function editBanerads($id) {
        $result= $this->banerads_model->getById($id);
        if($result){
                if ($_FILES['userfile']['name'] != ""){
                    $id =$this->db->escape_str($this->input->post('baner_id'));
                    $data = array(
                        'url' => $this->db->escape_str($this->input->post('web_url')),
                        'status' => $this->db->escape_str($this->input->post('selectBaner'))
                    );
                    if($this->handle_upload() == TRUE){
                        $data['image']=$this->handle_upload();
                        $this->banerads_model->edit($id, $data);
                        $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                        $data['id']=$id;
                        $data['btn_back']= base_url().'index.php/banerads';
                        $this->load->view('admin/banerads/edit', $data);
                        $this->load->view('admin/footer');
                    }else{
                       foreach ($result as $row) {
                            $data = array(
                            'id' => $row->baner_id,
                            'url' => $row->url,
                            'status' => $row->status,
                            'image' => $row->image,
                            'btn_back'=> base_url().'index.php/banerads',
                            'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                            );
                        }
                        $this->load->view('admin/banerads/edit', $data);
                        $this->load->view('admin/footer');
                    }

                }else{
                    $id =$this->db->escape_str($this->input->post('baner_id'));
                    $data = array(
                        'url' => $this->db->escape_str($this->input->post('web_url')),
                        'status' => $this->db->escape_str($this->input->post('selectBaner'))
                    );
                    foreach ($result as $row)
                    $data['image']=$row->image;
                    $this->banerads_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['id']=$id;
                    $data['btn_back']= base_url().'index.php/banerads';
                    $this->load->view('admin/banerads/edit', $data);
                    $this->load->view('admin/footer');
                }
            
        }else redirect('banerads', 'refresh');
    }

    public function delete($id) {
            $this->banerads_model->delete($id);
            redirect('banerads', 'refresh');
    }

    public function handle_upload(){
        if($this->upload->do_upload())
        {
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $upload_data["full_path"];
            $image_config['create_thumb'] = FALSE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width']         = 728;
            $image_config['height']       = 90;
            $this->image_lib->initialize($image_config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return $path="uploads/banerads/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }

}
