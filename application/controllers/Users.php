<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Users | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('user_model', '', TRUE);
    }

    public function index(){
            
                $data['users']=$this->user_model->getAll('name','asc');
                $this->load->view('admin/users/index',$data);
          
            $this->load->view('admin/footer');
    }

    public function add(){
           $data=array(
                'btn_back'=> base_url().'index.php/users'
            );
           $this->load->view('admin/users/add',$data);
           $this->load->view('admin/footer');
    }

    public function addUser(){
            if($this->form_validation->run() == FALSE){
            $data=array(
                'btn_back'=> base_url().'index.php/users'
            );
               $this->load->view('admin/users/add',$data);
               $this->load->view('admin/footer');
            }else{
                $pass=password_hash($this->db->escape_str($this->input->post('user_password')), PASSWORD_DEFAULT);
                $data = array(
                    'name' => $this->db->escape_str($this->input->post('name')),
                    'user_name' => $this->db->escape_str($this->input->post('user_name')),
                    'user_password' => $pass,
                    'description' => $this->db->escape_str($this->input->post('description')),
                    'is_admin' => $this->db->escape_str($this->input->post('adminStatus'))
                );
                $this->user_model->add($data);
                $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                $data['btn_back']= base_url().'index.php/users';
                $this->load->view('admin/users/add',$data);
                $this->load->view('admin/footer');
            }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->user_model->getById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'user_id' => $row->user_id,
                    'name' => $row->name,
                    'user_name' => $row->user_name,
                    'user_password' => $row->user_password,
                    'description' => $row->description,
                    'is_admin' => $row->is_admin,
                    'status' => $row->status,
                    'btn_back'=> base_url().'index.php/users'
                );
            }
                $this->load->view('admin/users/edit', $data);
                $this->load->view('admin/footer');
                }else redirect('users', 'refresh');
            }
            else redirect('users', 'refresh');
    }

    public function editUser($id) {
            if(isset ($id)){
                $result= $this->user_model->getById($id);
                if($result){
                    if ($this->form_validation->run() == FALSE) {
                    foreach ($result as $row) {
                        $data = array(
                            'user_id' => $row->user_id,
                            'name' => $row->name,
                            'user_name' => $row->user_name,
                            'user_password' => $row->user_password,
                            'description' => $row->description,
                            'is_admin' => $row->is_admin,
                            'status' => $row->status,
                            'btn_back'=> base_url().'index.php/users'
                        );
                    }
                    $this->load->view('admin/users/edit', $data);
                    $this->load->view('admin/footer');
                }
                else {
                    $pass=password_hash($this->db->escape_str($this->input->post('user_password')), PASSWORD_DEFAULT);
                    $data = array(
                        'user_id' =>$this->db->escape_str($this->input->post('user_id')),
                        'name' => $this->db->escape_str($this->input->post('name')),
                        'user_name' => $this->db->escape_str($this->input->post('user_name')),
                        'user_password' => $pass,
                        'description' => $this->db->escape_str($this->input->post('description')),
                        'is_admin' => $this->db->escape_str($this->input->post('adminStatus')),
                        'status' => $this->db->escape_str($this->input->post('status'))
                    );
                    $this->user_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/users';
                    $this->load->view('admin/users/edit', $data);
                    $this->load->view('admin/footer');
                }
                }else redirect('users', 'refresh');
            }
            else redirect('users', 'refresh');
    }

    public function delete($id){
            $this->user_model->delete($id);
            redirect('users', 'refresh');
    }
}