<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deals extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Deals | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('deals_model', '', TRUE);
        $config =  array(
          'upload_path'     => "./uploads/deals/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'max_size'        => "4000",
          'max_height'      => "4024",
          'max_width'       => "4024"
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
    }

    public function index() {
            $data['deals'] = $this->deals_model->getAll('deal_id','desc');
            $this->load->view('admin/deals/index', $data);
            $this->load->view('admin/footer');
    }

    public function add() {
             $data = array(
                    'btn_back'=> base_url().'index.php/deals'
                );
            $this->load->view('admin/deals/add',$data);
            $this->load->view('admin/footer');
    }

    public function addDeal() {
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'btn_back'=> base_url().'index.php/deals'
                );
                $this->load->view('admin/deals/add',$data);
                $this->load->view('admin/footer');
            }
            else {
                $data = array(
                    'title' => $this->db->escape_str($this->input->post('title')),
                    'start_date' => $this->db->escape_str($this->input->post('start_date')),
                    'end_date' => $this->db->escape_str($this->input->post('end_date')),
                    'description' => $this->db->escape_str($this->input->post('description'))
                );
                if($this->handle_upload() == TRUE){
                    $data['image']=$this->handle_upload();
                    $this->deals_model->add($data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                    $data['btn_back']= base_url().'index.php/deals';
                    $this->load->view('admin/deals/add',$data);
                    $this->load->view('admin/footer');
                }else {
                   $data = array(
                    'btn_back'=> base_url().'index.php/deals',
                    'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                    );
                    $this->load->view('admin/deals/add',$data);
                    $this->load->view('admin/footer');
                }
            }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->deals_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'id' => $row->deal_id,
                    'title' => $row->title,
                    'start_date' => $row->start_date,
                    'end_date' => $row->end_date,
                    'description' => $row->description,
                    'deal_status' => $row->deal_status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/deals'
                    );
                }
                $this->load->view('admin/deals/edit', $data);
                $this->load->view('admin/footer');
                }else redirect('deals', 'refresh');
            }
            else redirect('deals', 'refresh');
    }

    public function editDeal($id) {
        $result= $this->deals_model->getById($id);
        if($result){
            if ($this->form_validation->run() == FALSE) {
                foreach ($result as $row) {
                    $data = array(
                    'id' => $row->deal_id,
                    'title' => $row->title,
                    'start_date' => $row->start_date,
                    'end_date' => $row->end_date,
                    'description' => $row->description,
                    'deal_status' => $row->deal_status,
                    'image' => $row->image,
                    'btn_back'=> base_url().'index.php/deals'
                    );
                }
                $this->load->view('admin/deals/edit', $data);
                $this->load->view('admin/footer');
            }
            else {
                if ($_FILES['userfile']['name'] != ""){
                    $id =$this->db->escape_str($this->input->post('deal_id'));
                    $data = array(
                        'title' => $this->db->escape_str($this->input->post('title')),
                        'start_date' => $this->db->escape_str($this->input->post('start_date')),
                        'end_date' => $this->db->escape_str($this->input->post('end_date')),
                        'description' => $this->db->escape_str($this->input->post('description')),
                        'deal_status' => $this->db->escape_str($this->input->post('selectDeal'))
                    );
                    if($this->handle_upload() == TRUE){
                        $data['image']=$this->handle_upload();
                        $this->deals_model->edit($id, $data);
                        $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                        $data['id']=$id;
                        $data['btn_back']= base_url().'index.php/deals';
                        $this->load->view('admin/deals/edit', $data);
                        $this->load->view('admin/footer');
                    }else{
                       foreach ($result as $row) {
                            $data = array(
                            'id' => $row->deal_id,
                            'title' => $row->title,
                            'start_date' => $row->start_date,
                            'end_date' => $row->end_date,
                            'deal_status' => $row->deal_status,
                            'description' => $row->description,
                            'image' => $row->image,
                            'btn_back'=> base_url().'index.php/deals',
                            'massage' => '<div class="alert alert-error">You must upload a valid image & type.</div>'
                            );
                        }
                        $this->load->view('admin/deals/edit', $data);
                        $this->load->view('admin/footer');
                    }

                }else{
                    $id =$this->db->escape_str($this->input->post('deal_id'));
                    $data = array(
                    'title' => $this->db->escape_str($this->input->post('title')),
                    'start_date' => $this->db->escape_str($this->input->post('start_date')),
                    'end_date' => $this->db->escape_str($this->input->post('end_date')),
                      'description' => $this->db->escape_str($this->input->post('description')),
                    'deal_status' => $this->db->escape_str($this->input->post('selectDeal'))
                    );
                    foreach ($result as $row)
                    $data['image']=$row->image;
                    $this->deals_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['id']=$id;
                    $data['btn_back']= base_url().'index.php/deals';
                    $this->load->view('admin/deals/edit', $data);
                    $this->load->view('admin/footer');
                }
            }
        }else redirect('deals', 'refresh');
    }

    public function delete($id) {
            $this->deals_model->delete($id);
            redirect('deals', 'refresh');
    }

    public function handle_upload(){
        if($this->upload->do_upload())
        {
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $upload_data["full_path"];
            $image_config['create_thumb'] = FALSE;
            //$image_config['maintain_ratio'] = TRUE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['width']         = 1024;
            $image_config['height']       = 768;
            $this->image_lib->initialize($image_config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return $path="uploads/deals/".$upload_data["file_name"];
        }
        else
        {
            $data['massage']=$this->upload->display_errors();
            return false;
        }
    }
}
