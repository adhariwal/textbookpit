<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paidads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Paid ads | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('paidads_model', '', TRUE);
        $config =  array(
          'upload_path'     => "./uploads/paidads/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "1000",
          'max_height'      => "1024",
          'max_width'       => "1024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib'); 
    }

    public function index() {
            $data['paidads'] = $this->paidads_model->getAll('url','asc');
            $this->load->view('admin/paidads/index', $data);
            $this->load->view('admin/footer');
    }

    public function add() {
             $data = array(
                    'btn_back'=> base_url().'index.php/paidads'
                );
            $this->load->view('admin/paidads/add',$data);
            $this->load->view('admin/footer');
    }

    public function addPaidads() {
                $data = array(
                    'url' => $this->db->escape_str($this->input->post('web_url')),
                );
                if($this->handle_upload() == TRUE){
                    $data['image']=$this->handle_upload();
                    $this->paidads_model->add($data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                    $data['btn_back']= base_url().'index.php/paidads';
                    $this->load->view('admin/paidads/add',$data);
                    $this->load->view('admin/footer');
                }else {
                   $data = array(
                    'btn_back'=> base_url().'index.php/paidads',
                    'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                    );
                    $this->load->view('admin/paidads/add',$data);
                    $this->load->view('admin/footer');
                }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->paidads_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'id' => $row->paidads_id,
                    'url' => $row->url,
                    'status' => $row->status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/paidads'
                );
            }
                $this->load->view('admin/paidads/edit', $data);
                $this->load->view('admin/footer');
            }else redirect('paidads', 'refresh');
        }
        else redirect('paidads', 'refresh');
    }

    public function editPaidads($id) {
        $result= $this->paidads_model->getById($id);
        if($result){
                if ($_FILES['userfile']['name'] != ""){
                    $id =$this->db->escape_str($this->input->post('paidads_id'));
                    $data = array(
                        'url' => $this->db->escape_str($this->input->post('web_url')),
                        'status' => $this->db->escape_str($this->input->post('selectPaidad'))
                    );
                    if($this->handle_upload() == TRUE){
                        $data['image']=$this->handle_upload();
                        $this->paidads_model->edit($id, $data);
                        $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                        $data['id']=$id;
                        $data['btn_back']= base_url().'index.php/paidads';
                        $this->load->view('admin/paidads/edit', $data);
                        $this->load->view('admin/footer');
                    }else{
                       foreach ($result as $row) {
                            $data = array(
                            'id' => $row->paidads_id,
                            'url' => $row->url,
                            'status' => $row->status,
                            'image' => $row->image,
                            'btn_back'=> base_url().'index.php/paidads',
                            'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                            );
                        }
                        $this->load->view('admin/paidads/edit', $data);
                        $this->load->view('admin/footer');
                    }

                }else{
                    $id =$this->db->escape_str($this->input->post('paidads_id'));
                    $data = array(
                        'url' => $this->db->escape_str($this->input->post('web_url')),
                        'status' => $this->db->escape_str($this->input->post('selectPaidad'))
                    );
                    foreach ($result as $row)
                    $data['image']=$row->image;
                    $this->paidads_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['id']=$id;
                    $data['btn_back']= base_url().'index.php/paidads';
                    $this->load->view('admin/paidads/edit', $data);
                    $this->load->view('admin/footer');
                }
            
        }else redirect('paidads', 'refresh');
    }

    public function delete($id) {
            $this->paidads_model->delete($id);
            redirect('paidads', 'refresh');
    }

    public function handle_upload(){
        if($this->upload->do_upload())
        {
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $upload_data["full_path"];
            $image_config['create_thumb'] = FALSE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width']         = 800;
            $image_config['height']       = 800;
            $this->image_lib->initialize($image_config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return $path="uploads/paidads/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }

}
