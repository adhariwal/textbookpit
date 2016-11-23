<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classifiedsubcategory extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->logged_in)redirect('login', 'refresh');
        
        $this->load->model('subcategory_model', '', TRUE);
        $this->load->model('category_model', '', TRUE);

        //$this->no_cache();
    }

    public function index(){
            $data['subcategory']=$this->subcategory_model->getAllClassifiedSubcategory('sub_category','asc');
            $data['page_title'] ="Classified Sub Categories | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/classifiedsubcategory/index',$data);
            $this->load->view('admin/footer');
    }

    public function add(){
           $data=array(
                'btn_back'=> base_url().'index.php/classifiedsubcategory',
                'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1)
            );
            $data['page_title'] ="Classified Sub Categories | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
           $this->load->view('admin/classifiedsubcategory/add',$data);
           $this->load->view('admin/footer');
    }

    public function addClassifiedSubcategory(){
            if($this->form_validation->run() == FALSE){
                $data=array(
                    'btn_back'=> base_url().'index.php/classifiedsubcategory',
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1)
                );
                $data['page_title'] ="Classified Sub Categories | ";
                $this->load->view('admin/header',$data);
                $this->load->view('admin/menu');
                $this->load->view('admin/sidebar');
               $this->load->view('admin/classifiedsubcategory/add',$data);
               $this->load->view('admin/footer');
            }
            else{
                $data = array(
                    'cat_id' => $this->db->escape_str($this->input->post('selectCategory')),
                    'sub_category' => $this->db->escape_str($this->input->post('subcat'))
                );
                $this->subcategory_model->addClassifiedSubcategory($data);
                $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                $data=array(
                    'btn_back'=> base_url().'index.php/classifiedsubcategory',
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                    'massage'=>'<div class="alert alert-success">Data Sucessfully Saved.</div>'
                );
                $data['page_title'] ="Classified Sub Categories | ";
                $this->load->view('admin/header',$data);
                $this->load->view('admin/menu');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/classifiedsubcategory/add',$data);
                $this->load->view('admin/footer');
            }
    }

    public function edit($id){
            if(isset ($id)){
                $result= $this->subcategory_model->getByIdClassifiedSubcategory($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'sub_cat_id' => $row->sub_cat_id,
                    'cat_id' => $row->cat_id,
                    'category' => $row->category,
                    'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                    'sub_category' => $row->sub_category,
                    'sub_cat_status' => $row->sub_cat_status,
                    'btn_back'=> base_url().'index.php/classifiedsubcategory'
                );
            }
            $data['page_title'] ="Classified Sub Categories | ";
            $this->load->view('admin/header',$data);
            $this->load->view('admin/menu');
            $this->load->view('admin/sidebar');
                $this->load->view('admin/classifiedsubcategory/edit', $data);
                $this->load->view('admin/footer');
                }else redirect('classifiedsubcategory', 'refresh');
            }
            else redirect('classifiedsubcategory', 'refresh');
    }

    public function editClassifiedSubcategory($id) {
            if(isset ($id)){
                $result= $this->subcategory_model->getByIdClassifiedSubcategory($id);
                if($result){
                    if ($this->form_validation->run() == FALSE) {
                    foreach ($result as $row) {
                        $data = array(
                        'sub_cat_id' => $row->sub_cat_id,
                        'cat_id' => $row->cat_id,
                        'category' => $row->category,
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'sub_category' =>'',
                        'sub_cat_status' => $row->sub_cat_status,
                        'btn_back'=> base_url().'index.php/classifiedsubcategory'
                    );
                }
                    $data['page_title'] ="Classified Sub Categories | ";
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/menu');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/classifiedsubcategory/edit', $data);
                    $this->load->view('admin/footer');
                }
                else {
                    $data = array(
                        'sub_cat_id' =>$this->db->escape_str($this->input->post('sub_cat_id')),
                        'cat_id' => $this->db->escape_str($this->input->post('selectCategory')),
                        'sub_category' => $this->db->escape_str($this->input->post('subcat')),
                        'sub_cat_status' => $this->db->escape_str($this->input->post('status'))
                    );
                    $this->subcategory_model->editClassifiedSubcategory($id, $data);
                    $data['massage']='<div class="alert alert-success">Data Sucessfully Changed.</div>';
                    $data['btn_back']= base_url().'index.php/classifiedsubcategory';
                    $result= $this->subcategory_model->getByIdClassifiedSubcategory($id);
                    foreach ($result as $row) {
                         $data['categories']=$this->category_model->getAllClassifiedCategoryWithStatus(1);
                         $data['category']=$row->category;
                    }
                    $data['page_title'] ="Classified Sub Categories | ";
                    $this->load->view('admin/header',$data);
                    $this->load->view('admin/menu');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/classifiedsubcategory/edit', $data);
                    $this->load->view('admin/footer');
                }
                }else redirect('classifiedsubcategory', 'refresh');
                    
            }
            else redirect('classifiedsubcategory', 'refresh');
    }

    public function delete($id){
            $this->subcategory_model->deleteClassifiedSubcategory($id);
            redirect('classifiedsubcategory', 'refresh');
    }

    public function check_subcategory($subcategory) {
        $result = $this->subcategory_model->getByName($subcategory);
        if ($result) {
            $this->form_validation->set_message('check_subcategory', 'This Sub Category already added.');
            return false;
        }else return true;
    }

    public function getSubCatByCatId(){

        $id=$this->input->post('id');
        $subcategory=$this->subcategory_model->getAllClassifiedSubcategoryByCatId($id,'sub_category','asc');
        if($subcategory != null){
           foreach ($subcategory as $raw) {
                $arrSubCat[$raw->sub_cat_id] = $raw->sub_category;
            }
            print_r(form_dropdown('selectSubCategory',$arrSubCat));
        }

    }

    

//    protected function no_cache()
//      {
//          header('Cache-Control: no-store, no-cache, must-revalidate');
//          header('Cache-Control: post-check=0, pre-check=0',false);
//          header('Pragma: no-cache');
//      }
}