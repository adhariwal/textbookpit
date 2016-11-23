<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
       
        $this->load->model('area_model', '', TRUE);
        $this->load->model('districts_model', '', TRUE);
        $this->load->model('ads_model', '', TRUE);
    }

    public function index(){
            $data['area']=$this->area_model->getAll('area','asc'); $data['page_title'] ="Area | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/area/index',$data);
            $this->load->view('admin/footer');
    }

    public function add(){
           $data=array(
                'btn_back'=> base_url().'index.php/area',
                'districts'=>$this->districts_model->getAllWithStatus(1)
            );
             $data['page_title'] ="Area | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
           $this->load->view('admin/area/add',$data);
           $this->load->view('admin/footer');
    }

    public function addArea(){
            if($this->form_validation->run() == FALSE){
                 $data=array(
                    'btn_back'=> base_url().'index.php/area',
                    'districts'=>$this->districts_model->getAllWithStatus(1)
               );
                $data['page_title'] ="Area | ";
                $this->load->view('admin/header',$data);
                $this->load->view('admin/menu');
                $this->load->view('admin/sidebar');
               $this->load->view('admin/area/add',$data);
               $this->load->view('admin/footer');
            }
            else{
                $data = array(
                    'district_id' => $this->db->escape_str($this->input->post('selectDis')),
                    'area' => $this->db->escape_str($this->input->post('area'))
                );
                $this->area_model->add($data);
                $data['districts']=$this->districts_model->getAllWithStatus(1);
                $data=array(
                    'btn_back'=> base_url().'index.php/area',
                    'districts'=>$this->districts_model->getAllWithStatus(1),
                    'massage'=>'<div class="alert alert-success">Data Sucessfully Saved.</div>'
               );
                $data['page_title'] ="Area | ";
                $this->load->view('admin/header',$data);
                $this->load->view('admin/menu');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/area/add',$data);
                $this->load->view('admin/footer');
            }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->area_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                        'area_id' => $row->area_id,
                        'district_id' => $row->district_id,
                        'district' => $row->district,
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'area' => $row->area,
                        'area_status' => $row->area_status,
                        'btn_back'=> base_url().'index.php/area'
                        );
                    }
                     $data['page_title'] ="Area | ";
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/menu');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/area/edit', $data);
                    $this->load->view('admin/footer');
                }else redirect('area', 'refresh');
            }
            else redirect('area', 'refresh');
    }

    public function editArea($id) {
            if(isset ($id)){
                    if ($this->form_validation->run() == FALSE) {
                    $result= $this->area_model->getById($id);
                    if($result){
                        foreach ($result as $row) {
                            $data = array(
                            'area_id' => $row->area_id,
                            'district_id' => $row->district_id,
                            'district' => $row->district,
                            'districts'=>$this->districts_model->getAllWithStatus(1),
                            'area' => $row->area,
                            'area_status' => $row->area_status,
                            'btn_back'=> base_url().'index.php/area'
                            );
                        }
                         $data['page_title'] ="Area | ";
                        $this->load->view('admin/header',$data);
                        $this->load->view('admin/menu');
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/area/edit', $data);
                        $this->load->view('admin/footer');
                    }else redirect('area', 'refresh');
                }
                else {
                    $data = array(
                        'area_id' =>$this->db->escape_str($this->input->post('area_id')),
                        'district_id' =>$this->db->escape_str($this->input->post('selectDis')),
                        'area' => $this->db->escape_str($this->input->post('area')),
                        'area_status' => $this->db->escape_str($this->input->post('status'))
                    );
                    $this->area_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/area';
                    $result= $this->area_model->getById($id);
                    foreach ($result as $row) {
                         $data['districts']=$this->districts_model->getAllWithStatus(1);
                         $data['district']=$row->district;
                    }
                     $data['page_title'] ="Area | ";
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/menu');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/area/edit', $data);
                    $this->load->view('admin/footer');
                }
            }
            else redirect('area', 'refresh');
    }

    public function delete($id){
            $this->area_model->delete($id);
            redirect('area', 'refresh');
    }

    public function getAreaByDisId(){
        $id=$this->input->post('id');
        $area=$this->area_model->getByDisId($id,'area','asc');
        if($area != null){
           foreach ($area as $raw) {
                $arrArea[$raw->area_id] = $raw->area;
            }
            print_r(form_dropdown('selectArea',$arrArea));
        }

    }

    
}