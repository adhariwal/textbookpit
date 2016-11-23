<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areafront extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        if(!$this->session->home_in)redirect('landing', 'refresh');

        $this->load->model('area_model', '', TRUE);
        $this->load->model('districts_model', '', TRUE);
        $this->load->model('ads_model', '', TRUE);
        $this->load->model('subcategory_model', '', TRUE);
    }

    public function getAreaByDisId_front_list(){
//        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
// echo($this->output->set_header("Pragma: no-cache"));die();
        $out='';
        $dis_id=$this->input->post('id');
        $type=$this->input->post('ty');
        $link['link']='';
//        $url_area=$this->input->post('url_area');
//        $area_ad_count=$this->input->post('area_ad_count');
        //$area=$this->area_model->getByDisId($id,'area','asc');

        if($type == 'directory'){
                                $this->ads_model->delete_area_temp();
                                $data['area']=$this->area_model->getByDisId($dis_id,'area','asc');
                                if ($data['area'] != null) {
                                   foreach ($data['area'] as $area){
                                    $area_id=$area->area_id;
                                    $data6['area_id']=$area->area_id;
                                    $data6['area']=$area->area;
                                    $data6['count']=$this->ads_model->count_all_by_area($area_id);
                                    $this->ads_model->add_area_temp($data6);
                                    }
                                    $data['area']=$this->ads_model->getAllarea();
                                }
                            }

                            if($type == 'classified'){
                                $this->ads_model->delete_area_temp_classified();
                                $this->ads_model->getAllarea_classified();
                                $data['area']=$this->area_model->getByDisId($dis_id,'area','asc');
                                if ($data['area'] != null) {
                                   foreach ($data['area'] as $area){
                                    $area_id=$area->area_id;
                                    $data7['area_id']=$area->area_id;
                                    $data7['area']=$area->area;
                                    $data7['count']=$this->ads_model->count_all_by_area_classified($area_id);
                                    $this->ads_model->add_area_temp_classified($data7);
                                    }
                                    $data['area']=$this->ads_model->getAllarea_classified();
                                }
                            }
       // $data['area']=$this->area_model->getByDisId($dis_id,'area','asc');
        if ($data['area'] != null) {
        foreach ($data['area'] as $area){
            $area_id=$area->area_id;
            if($type == 'directory'){
                $data['all_area_ads']=$this->ads_model->count_all_by_area($area_id);
                $url_area= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&areaid='.$area->area_id.'&area='.$area->area;
            }
            if($type == 'classified'){
                $data['all_area_ads']=$this->ads_model->count_all_by_area_classified($area_id);
                $url_area= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&areaid='.$area->area_id.'&area='.$area->area;
            }
            ?>
            <a href="<?php echo $url_area;?>" class="list-subgroup-item"><?php echo $area->area;echo'   ('.$data['all_area_ads'].')' ?></a>

        <?php
        }}
   // print_r($link);
    }


    public function getAreaByDisId_front(){
        $con=array(
            'name'=>'selectArea',
            'class'=>'form-control'
        );
        $id=$this->input->post('id');
        $area=$this->area_model->getByDisId($id,'area','asc');
        if($area != null){
           foreach ($area as $raw) {
                $arrArea[$raw->area_id] = $raw->area;
            }
            print_r(form_dropdown($con,$arrArea));
        }
    }

    public function getSubCatByCatId_front(){
        $con=array(
            'name'=>'selectSubCategory',
            'class'=>'form-control'
        );
        $id=$this->input->post('id');
        $subcategory=$this->subcategory_model->getAllClassifiedSubcategoryByCatId($id,'sub_category','asc');
        if($subcategory != null){
           foreach ($subcategory as $raw) {
                $arrSubCat[$raw->sub_cat_id] = $raw->sub_category;
            }
            print_r(form_dropdown($con,$arrSubCat));
        }

    }
}