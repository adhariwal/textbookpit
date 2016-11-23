<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Profile | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('user_model', '', TRUE);
    }

    public function index(){
        $session_data=$this->session->logged_in;
        $id = $session_data['id'];
        $result= $this->user_model->getById($id);
            if($result){
                foreach ($result as $row) {
                    $data=array(
                        'btn_back'=> base_url().'index.php/profile',
                        'user_id'=>$row->user_id,
                        'name'=>$row->name,
                        'user_name'=>$row->user_name,
                        'user_password'=>$row->user_password,
                        'description'=>$row->description,
                        'status'=>$row->status
                    );
                }
                $this->load->view('admin/profile/add',$data);
                $this->load->view('admin/footer');
            }else redirect('profile', 'refresh');
    }

    public function addProfile($id){
        if(isset ($id)){
            $result= $this->user_model->getById($id);
            if($this->form_validation->run() == FALSE){
                if($result){
                    foreach ($result as $row) {
                    $data=array(
                        'btn_back'=> base_url().'index.php/profile',
                        'user_id'=>$row->user_id,
                        'name'=>$row->name,
                        'user_name'=>$row->user_name,
                        'user_password'=>$row->user_password,
                        'description'=>$row->description,
                        'status'=>$row->status
                        );
                    }
                    $this->load->view('admin/profile/add',$data);
                    $this->load->view('admin/footer');
                }else redirect('profile', 'refresh');
            }
            else{
                //$pass=$this->db->escape_str($this->input->post('user_password'));
                $pass=password_hash($this->db->escape_str($this->input->post('user_password')), PASSWORD_DEFAULT);
                $data = array(
                        'user_id' =>$this->db->escape_str($this->input->post('user_id')),
                        'name' =>$this->db->escape_str($this->input->post('name')),
                        'user_name' =>$this->db->escape_str($this->input->post('user_name')),
                        'user_password' => $pass,
                        'description' => $this->db->escape_str($this->input->post('description')),
                        'status' => $this->db->escape_str($this->input->post('selectStatus'))
                    );
                    $this->user_model->edit($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/profile';
                    $this->load->view('admin/profile/add',$data);
                    $this->load->view('admin/footer');
            }
        }else redirect('profile', 'refresh');
    }
}