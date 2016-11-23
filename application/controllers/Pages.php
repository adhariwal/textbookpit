<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        $data['page_title'] ="Pages | ";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/sidebar');
        $this->load->model('pages_model', '', TRUE);
    }

    public function index(){
        $result= $this->pages_model->getAll();
                if($result){
                    foreach ($result as $row) {
                        $data=array(
                            'btn_back'=> base_url().'index.php/pages',
                            'about_us'=>$row->about_us,
                            'services'=>$row->services,
                            'terms'=>$row->terms,
                            'privacy'=>$row->privacy,
                            'faq'=>$row->faq,
                            'contact_us'=>$row->contact_us,
                            'gmap'=>$row->gmap,
                            'email'=>$row->email,
                            'phone'=>$row->phone
                        );
                    }
                    //print_r($data);die();
                    $this->load->view('admin/pages/add',$data);
                    $this->load->view('admin/footer');
                }else redirect('pages', 'refresh');
    }

    public function addPages($id){
        if ($this->form_validation->run() == FALSE) {
            $data=array(
                    'btn_back'=> base_url().'index.php/pages',
                    'about_us' => $this->input->post('about_us'),
                    'services' => $this->input->post('services'),
                    'terms' => $this->input->post('terms'),
                    'privacy' => $this->input->post('privacy'),
                    'faq' => $this->input->post('faq'),
                    'contact_us' => $this->input->post('contact_us'),
                    'gmap' => $this->input->post('gmap'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone')
               );
               $this->load->view('admin/pages/add',$data);
               $this->load->view('admin/footer');
        }else{
           $data = array(
                    'about_us' => $this->input->post('about_us'),
                    'services' => $this->input->post('services'),
                    'terms' => $this->input->post('terms'),
                    'privacy' => $this->input->post('privacy'),
                    'faq' => $this->input->post('faq'),
                    'contact_us' => $this->input->post('contact_us'),
                    'gmap' => $this->input->post('gmap'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone')
                );
                $this->pages_model->add($id,$data);
                $data['massage']='<div class="alert alert-success">Data Sucessfully Saved.</div>';
                $data['btn_back']= base_url().'index.php/pages';
                $this->load->view('admin/pages/add',$data);
                $this->load->view('admin/footer');
        }
    }
}