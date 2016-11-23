<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deals_ads extends CI_Controller{
private $limit = 25;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', '', TRUE);
        $this->load->model('subcategory_model', '', TRUE);

        $this->load->model('districts_model', '', TRUE);
        $this->load->model('area_model', '', TRUE);

        $this->load->model('deals_model', '', TRUE);
        $this->load->model('ads_model', '', TRUE);

        $this->load->model('banerads_model', '', TRUE);
        $this->load->model('paidads_model', '', TRUE);

        $this->load->library('pagination');
    }

    public function index()
    {
        $data['type']='directory';
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
        $data['deals']=$this->deals_model->fetch_data($this->limit, $offset);
        $data['all_ads']=$this->ads_model->count_all();
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url()."index.php/deals_ads/index";
 		$config['total_rows'] = $this->deals_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        // By clicking on performing NEXT pagination.
        $config['next_link'] = 'Next';
        // By clicking on performing PREVIOUS pagination.
        $config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
        $data['paidads']=$this->paidads_model->getAllWithStatus(1); 
        $this->load->view('web/header',$data);
        //$this->load->view('web/left_sidebar',$data);
        $this->load->view('web/deals_home',$data);
        $this->load->view('web/paid_ads');
        $this->load->view('web/footer');
    }

    public function details($id){
        if(isset ($id)){
                $result= $this->deals_model->getActiveDealById($id);
                if($result){
                    foreach ($result as $row) {
                    $data = array(
                    'id' => $row->deal_id,
                    'title' => $row->title,
                    'start_date' => $row->start_date,
                    'end_date' => $row->end_date,
                    'deal_status' => $row->deal_status,
                    'image' => $row->image,
                    'description'=>$row->description,
                    'btn_back'=> base_url().'index.php/deals_ads'
                    );
               }
                    $data['type']='directory';
                    $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                    $data['all_ads']=$this->ads_model->count_all();
                    $this->load->view('web/header',$data);
                   // $this->load->view('web/left_sidebar',$data);
                    $this->load->view('web/deals_details',$data);
                    $this->load->view('web/right_sidebar');
                    $this->load->view('web/footer');
                }
                else redirect('deals_ads', 'refresh');
            }
            else redirect('deals_ads', 'refresh');
    }
}
