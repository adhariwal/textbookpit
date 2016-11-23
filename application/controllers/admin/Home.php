<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       //if($this->session->userdata('logged_in'))
       //if($this->session->logged_in)
       //$this->session->has_userdata('logged_in')
       if($this->session->logged_in)
       {
            $session_data=$this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/home');
            $this->load->view('admin/footer');
       }
       else
       {
         //If no session, redirect to login page
         $this->load->view('admin/header');
         redirect('login', 'refresh');
       }
     }

     public function logout()
     {
       $this->session->unset_userdata('logged_in');
       session_destroy();
       $this->load->view('admin/header');
       redirect('login', 'refresh');
     }
}
?>
