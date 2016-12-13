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
                $data = array(
                    'district' => $this->db->escape_str($this->input->post('district'))
                );
                $this->districts_model->add($data);
                $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                $data['btn_back']= base_url().'index.php/districts';
                $this->load->view('admin/districts/add',$data);
                $this->load->view('admin/footer');
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
                            'btn_back'=> base_url().'index.php/districts'
                        );
                    }
                    $this->load->view('admin/districts/edit', $data);
                    $this->load->view('admin/footer');
                }
                else {

                    $data = array(
                        'district_id' =>$this->db->escape_str($this->input->post('district_id')),
                        'district' => $this->db->escape_str($this->input->post('district')),
                        'dis_status' => $this->db->escape_str($this->input->post('status'))
                    );
                    $this->districts_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/districts';
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