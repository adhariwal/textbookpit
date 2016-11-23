<?php 

  class Index1 extends CI_Controller { 
  
  public function index() { 
  $this->load->model('category_model', '', TRUE);
   $data['categories'] = $this->category_model->getAllClassifiedCategoryWithStatus(1);
    $this->load->model('Districts_model', '', TRUE);
   $data['school'] = $this->Districts_model->getAllWithStatus(1);
         
 $this->load->view('web/index1',$data);
  
  
  }
  
  }
  
  ?>