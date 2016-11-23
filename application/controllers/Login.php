<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if($this->session->logged_in)redirect('admin/home', 'refresh');
        $this->load->model('user_model','',TRUE);
    }
    
	public function index()
	{
        //$this->validate_field();
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] ="Login | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/login/login_form');
        }
        else
        {
            $session_data=$this->session->logged_in;
            $data['username'] = $session_data['username'];
            $data['page_title'] ="Login | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/home', $data);
            $this->load->view('admin/footer');
            redirect('admin/home', 'refresh');
        }
	}

//    public function validate_field()
//    {
//        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
//        $this->form_validation->set_rules('password','Password','trim|required|callback_check_user');
//    }

    public function check_user($password){
       $username = $this->input->post('username');
       $pass=$this->user_model->get_pass($username);
       if($pass){
           foreach($pass as $pass){
               $hash=array($pass->user_password);
           }
           $hash=$hash[0];
           if (password_verify($password, $hash)) {
            $result = $this->user_model->login($username);
               if($result)
               {
                 foreach($result as $row)
                 {

                   $sess_array = array(
                     'id' => $row->user_id,
                     'username' => $row->user_name,
                     'is_admin' => $row->is_admin
                   );
                   $this->session->set_userdata('logged_in', $sess_array);
                 }
                 return true;
               }
               else
               {
                 $this->form_validation->set_message('check_user', 'Invalid User Name or Password');
                 return false;
               }
           }
           else{
                $this->form_validation->set_message('check_user', 'Invalid User Name or Password');
                return false;
           }
       }
       else
       {
         $this->form_validation->set_message('check_user', 'Invalid User Name or Password');
         return false;
       }
    }
}
