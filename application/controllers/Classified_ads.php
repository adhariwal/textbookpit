<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classified_ads extends CI_Controller{
private $limit = 25;
    public function __construct()
    {
        parent::__construct();
        $sess_array = array(
                     'username' => 'visitor'
                   );
        $this->session->set_userdata('home_in',$sess_array);
        $this->load->model('category_model', '', TRUE);
        $this->load->model('subcategory_model', '', TRUE);

        $this->load->model('districts_model', '', TRUE);
        $this->load->model('area_model', '', TRUE);

        $this->load->model('ads_model', '', TRUE);
        $this->load->model('paidads_model', '', TRUE);

        $this->load->model('banerads_model', '', TRUE);

        $this->load->library('pagination');
    }

    public function index()
    {
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 25;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $data=array();
        $statement = "`classified_ads` JOIN `classified_category` ON `classified_ads`.`cat_id`=`classified_category`.`cat_id` JOIN `classified_sub_category` ON `classified_ads`.`sub_cat_id`=`classified_sub_category`.`sub_cat_id` JOIN `districts` ON `classified_ads`.`district_id`=`districts`.`district_id` JOIN `area` ON `classified_ads`.`area_id`=`area`.`area_id` WHERE `ad_status` = 1 AND `cat_status` = 1 AND `sub_cat_status` = 1 AND `dis_status` = 1 AND `area_status` = 1 ORDER BY `ads_id` DESC";
        $query=$this->db->query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
        }
        $data['ads']=$data;
        $data['type']='classified';
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['all_ads']=$this->ads_model->count_all_ClassifiedAds();
        $data['statement']=$statement;
        $data['limit']=$limit;
        $data['page']=$page;
        $data['pagination']=$this->pagination($statement,$limit,$page);
        $data['paidads']=$this->paidads_model->getAllWithStatus(1);
        $this->load->view('web/header',$data);
        $this->load->view('web/left_sidebar',$data);
        $this->load->view('web/classified_home_sub',$data);
        $this->load->view('web/paid_ads',$data);
        $this->load->view('web/footer');
        
    }



  public function index_amazon()
    {
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 25;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $data=array();
        $statement = "`classified_ads` JOIN `classified_category` ON `classified_ads`.`cat_id`=`classified_category`.`cat_id` JOIN `classified_sub_category` ON `classified_ads`.`sub_cat_id`=`classified_sub_category`.`sub_cat_id` JOIN `districts` ON `classified_ads`.`district_id`=`districts`.`district_id` JOIN `area` ON `classified_ads`.`area_id`=`area`.`area_id` WHERE `ad_status` = 1 AND `cat_status` = 1 AND `sub_cat_status` = 1 AND `dis_status` = 1 AND `area_status` = 1 ORDER BY `ads_id` DESC";
        $query=$this->db->query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
        }
        $data['ads']=$data;
        $data['type']='classified';
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['all_ads']=$this->ads_model->count_all_ClassifiedAds();
        $data['statement']=$statement;
        $data['limit']=$limit;
        $data['page']=$page;
        $data['pagination']=$this->pagination($statement,$limit,$page);
        $data['paidads']=$this->paidads_model->getAllWithStatus(1);
        $this->load->view('web/header',$data);
       // $this->load->view('web/left_sidebar',$data);
        $this->load->view('web/classified_amazon',$data);
        $this->load->view('web/paid_ads',$data);
        $this->load->view('web/footer');
        
    }

 public function details_amazon(){
        if(isset ($_REQUEST['main_url1'])){
                $xml=simplexml_load_file($_REQUEST['main_url1']);
$row=$xml->Items->Item;

                if($row){
					if(isset($row->ImageSets->ImageSet[0]->LargeImage->URL)){
					$img1=$row->ImageSets->ImageSet[0]->LargeImage->URL;
					$categor=$row->ImageSets->ImageSet[0]->attributes()->Category;
					}else{
						$img1='no';
						}
						if(isset($row->ImageSets->ImageSet[1]->LargeImage->URL)){
					$img2=$row->ImageSets->ImageSet[1]->LargeImage->URL;
				}else{
						$img2='no';
						}
						if(isset($row->ImageSets->ImageSet[2]->LargeImage->URL)){
					$img3=$row->ImageSets->ImageSet[2]->LargeImage->URL;
				}else{
						$img3='no';
						}
						if(isset($row->ImageSets->ImageSet[3]->LargeImage->URL)){
					$img4=$row->ImageSets->ImageSet[3]->LargeImage->URL;
						}else{
						$img4='no';
						}
						if(isset($row->ItemAttributes->Author)){
							$boo_auto=$row->ItemAttributes->Author;
							}else if(isset($row->ItemAttributes->Creator)){
								$boo_auto=$row->ItemAttributes->Creator[0];
								}else{
									$boo_auto='';
									}
            if(isset($row->ItemAttributes->ListPrice->FormattedPrice)){
			
				$price=$row->ItemAttributes->ListPrice->FormattedPrice;
				}else{
					$price='';
					}
                        $data = array(
                        'ads_id' => '',
                        'cat_id' => $row->cat_id,
                        'category'=>	$categor,
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'sub_cat_id' => '',
                        'sub_category' => '',
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'title' => $row->ItemAttributes->Title,
                        'description' => $row->EditorialReviews->EditorialReview->Content,
                        'img_1' => $img1,
                        'img_2' => $img2,
                        'img_3' => $img3,
                        'img_4' =>$img4,
                        'ad_status' => '1',
                        'cus_name' => $boo_auto,
                        'address' => $row->ItemAttributes->Manufacturer,
                        'email' => '',
                        'phone' =>'',
                        'ad_type' => '',
                        'ad_cat' => '',
                        'district_id' => '',
                        'district' => '',
                        'districts'=>'',
                        'area_id' => '',
                        'area' => '',
                        'areas'=>'',
                        'btn_back'=> base_url().'index.php/classified_ads',
                        'price'=> $price,
                            'email_status'=> '0'
                        );
                   
$data['DetailPageURL']=$row->DetailPageURL;
                    $data['review']=$row->CustomerReviews->IFrameURL;
//print_r($data['review']);die();
                    $data['type']='classified';
                 //   $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                   // $data['all_ads']=$this->ads_model->count_all_ClassifiedAds();
                 //   $this->load->view('web/header',$data);
                   // $this->load->view('web/left_sidebar',$data);
                    $this->load->view('web/ads_details_amazon',$data);
                   // $this->load->view('web/right_sidebar');
                  ///  $this->load->view('web/footer');
                }else redirect('classified_ads', 'refresh');
            }
            else redirect('classified_ads', 'refresh');
    }

    public function details($id){
        if(isset ($id)){
                $result= $this->ads_model->getByIdClassifiedAds($id);
                if($result){
                    foreach ($result as $row) {
                        $data = array(
                        'ads_id' => $row->ads_id,
                        'cat_id' => $row->cat_id,
                        'category'=>$row->category,
                        'categories'=>$this->category_model->getAllClassifiedCategoryWithStatus(1),
                        'sub_cat_id' => $row->sub_cat_id,
                        'sub_category' => $row->sub_category,
                        'subcategories'=>$this->subcategory_model->getAllClassifiedSubcategoryWithStatus(1),
                        'title' => $row->title,
                        'description' => $row->description,
                        'img_1' => $row->img_1,
                        'img_2' => $row->img_2,
                        'img_3' => $row->img_3,
                        'img_4' => $row->img_4,
                        'ad_status' => $row->ad_status,
                        'cus_name' => $row->cus_name,
						 'isbn' => $row->isbn,
                        'address' => $row->address,
                        'email' => $row->email,
                        'phone' => $row->phone,
                        'ad_type' => $row->ad_type,
                        'ad_cat' => $row->ad_cat,
                        'district_id' => $row->district_id,
                        'district' => $row->district,
                        'districts'=>$this->districts_model->getAllWithStatus(1),
                        'area_id' => $row->area_id,
                        'area' => $row->area,
                        'areas'=>$this->area_model->getAllWithStatus(1),
                        'btn_back'=> base_url().'index.php/classified_ads',
                        'price'=> $row->price,
                            'email_status'=> $row->email_status
                        );
                    }

                    $data['review']=$this->ads_model->getReview($id);
//print_r($data['review']);die();
                    $data['type']='classified';
                    $data['baners'] = $this->banerads_model->getAllWithStatus(1);
                    $data['all_ads']=$this->ads_model->count_all_ClassifiedAds();
                    $this->load->view('web/header',$data);
                   // $this->load->view('web/left_sidebar',$data);
                    $this->load->view('web/ads_details',$data);
                    $this->load->view('web/right_sidebar');
                    $this->load->view('web/footer');
                }else redirect('classified_ads', 'refresh');
            }
            else redirect('classified_ads', 'refresh');
    }

public function search_module_amozon(){
if(isset($_REQUEST['sec_page'])){
	
$xml=simplexml_load_file($_REQUEST['main_url']);
if(isset($xml->Items->Item)){
$data=' <hr /><h1 class="text-center">Amazon Results</h1><hr /><table class="list-detail"><tbody><div class="list-subgroups">';
//print_r($xml->Items->Item);
foreach($xml->Items->Item as $books) { 
if(isset($books->ItemAttributes->Author)){
							$boo_auto=$books->ItemAttributes->Author;
							}else if(isset($books->ItemAttributes->Creator)){
								$boo_auto='';
								$acujk=$books->ItemAttributes->Creator;
								
								for($a=0; $a<=count($books->ItemAttributes->Creator)-1;$a++){
									if($a!=count($books->ItemAttributes->Creator)-1){
									$boo_auto.=$acujk[$a].' , ';
									}else{
										$boo_auto.=$acujk[$a];
										}
									}
								//$boo_auto=$books->ItemAttributes->Creator[0];
								}else{
									$boo_auto='';
									}
								$url=base_url().'index.php/classified_ads/index_amazon?asin='.$books->ASIN;	
								$originalDate = $books->ItemAttributes->PublicationDate;
$newDate = date("F j, Y", strtotime($originalDate));
   $data .= '<tr><td class=" "><div class="media" style="cursor: pointer;" onclick="window.location.href='.$url.'"><div class="xx12 col-md-4 col-xs-4 col-sm-12"><a class="thumbnail pull-left" href="'.$url.'"><img  style="max-height: 180px;" class="media-object w100" src="'.$books->ImageSets->ImageSet[0]->LargeImage->URL.'"></a><div class="clearfix"></div></div><div class="xx12 col-md-8 col-sm-12 col-xs-8 "><div class="media-body"><h4 class="media-heading"><a href="'.$url.'">'.$books->ItemAttributes->Title.'</a></h4><p>Author: '.$boo_auto.'</p><p>Date: '.$newDate.'</p><p>Price: <strong>'.$books->ItemAttributes->ListPrice->FormattedPrice.'</strong></p><p>'.$books->ItemAttributes->Publisher.' </p><p>'.$newDate.' , '.$books->ItemAttributes->ProductTypeName.' , '.$books->ItemAttributes->ProductGroup.'</p></div></div></div></td></tr>';
} 
 $data .='</div></tbody></table>';
}else{
	
	$data='<table class=" list-detail " width="100%"><tbody><tr><td align="center">No Results Found on Amazon</td></tr></tbody></table>';
	}
 echo $data;

		
}else if(isset($_REQUEST['main_url'])){
$xml=simplexml_load_file($_REQUEST['main_url']);
$data='<div class="list-subgroups">';

foreach($xml->Items->Item as $books) { 
$url=base_url().'index.php/classified_ads/index_amazon?asin='.$books->ASIN;	
   $data .= '<a class="list-subgroup-item" href='.$url.' >'.$books->ItemAttributes->Title.'</a>';
} 
 $data .='</div>';
 echo $data;
}


}


public function search_module(){
	if(!isset($_GET['s'])){
		$_GET['s']='';
		}
	$search=$_GET['s'];
	
	$data='<div class="list-subgroups">';
	 $query=$this->db->query("SELECT * FROM classified_ads where ad_status='1' and title like '".$search."%' LIMIT 0 , 10");

	 foreach ($query->result() as $row) {
		   $url= base_url().'index.php/classified_ads/details/'.preg_replace("![^a-z0-9]+!i", "-", $row->ads_id.' '.$row->title);
                $data .= '<a class="list-subgroup-item" href="'.$url.'">'.$row->title.'</a>';
            }
			 $data .='</div>';
			echo $data;
	
}


    public function ads(){
        $where='';
        $url='';

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 25;
    	$startpoint = ($page * $limit) - $limit;

        $statement = "`classified_ads` JOIN `classified_category` ON `classified_ads`.`cat_id`=`classified_category`.`cat_id` JOIN `classified_sub_category` ON `classified_ads`.`sub_cat_id`=`classified_sub_category`.`sub_cat_id` JOIN `districts` ON `classified_ads`.`district_id`=`districts`.`district_id` JOIN `area` ON `classified_ads`.`area_id`=`area`.`area_id` WHERE `ad_status` = 1 AND `cat_status` = 1 AND `sub_cat_status` = 1 AND `dis_status` = 1 AND `area_status` = 1 ";

 if(isset($_GET['s'])){
            $search=$_GET['s'];
 
            $where .= "AND classified_ads.title like '".$search."%' ";
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
 if(isset($_GET['isbn'])){
            $isbn=$_GET['isbn'];
 
            $where .= "AND classified_ads.isbn like '".$isbn."%' ";
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
        if(isset($_GET['catid'])){
            $catid=$_GET['catid'];
            $data['category']=$_GET['category'];
            $where .= "AND classified_ads.cat_id= $catid ";
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
        if(isset($_GET['subcatid'])){
            $subcatid=$_GET['subcatid'];
            $data['subcategory']=$_GET['subcategory'];
            $where .= "AND classified_ads.sub_cat_id= $subcatid ";
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
		   if(isset($_GET['school_name'])){
            $school_name=$_GET['school_name'];
            $data['school_name']=$_GET['school_name'];
            $where .= "AND classified_ads.school_name like '".$school_name."%' ";
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
       
        if(isset($_GET['post'])){
            $post=$_GET['post'];
            //$data['Pri']=$_GET['Private'];
            if($post == 'All'){
            }
            else{
                $where .= "AND classified_ads.ad_type= '$post' ";
            }
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }
        if(isset($_GET['type'])){
            $type=$_GET['type'];
            //$data['type']=$_GET['type'];
            if($type == 'All'){
            }
            else{
                $where .= "AND classified_ads.ad_cat= '$type' ";
            }
            $url .= '?'.$_SERVER['QUERY_STRING'].'&';
        }


        $order=" ORDER BY `ads_id` DESC ";
        $statement=$statement.$where.$order;

        //to make pagination
        $data=array();
		//echo "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";die;
        $query=$this->db->query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
        }

        $data['ads']=$data;
        $data['type']='classified';
        $data['baners'] = $this->banerads_model->getAllWithStatus(1);
        $data['all_ads']=$this->ads_model->count_all_ClassifiedAds();
        $data['statement']=$statement;
        $data['limit']=$limit;
        $data['page']=$page;

        $data['pagination']=$this->pagination($statement,$limit,$page,$url);

        $data['paidads']=$this->paidads_model->getAllWithStatus(1);

        $this->load->view('web/header',$data);
        $this->load->view('web/left_sidebar',$data);
        $this->load->view('web/classified_home_sub',$data);
        $this->load->view('web/paid_ads',$data);
        $this->load->view('web/footer');
    }

     public function pagination($query, $per_page = 10,$page = 1, $url = '?'){
        $sql= "SELECT COUNT(*) as `num` FROM {$query}";
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0) {
            $query->result();
        }
        $result=$query->result();
        foreach ($result as $row) {
            $total=$row->num;
        }
        $adjacents = "2";
        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total/$per_page);
        $lpm1 = $lastpage - 1;
        $pagination = "";
        if($lastpage > 1)
        {
            $pagination .= "<ul class='pagination'>";

            $pagination .= "<li class='details'></li>";
            if ($page == 1){
                $pagination.= "<li><a href='#'>Previous</a></li>";
            }else{
                $pagination.= "<li><a href='{$url}page=$prev'>Previous</a></li>";
            }
            if ($lastpage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))
            {
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                    $pagination.= "<li class='dot'>...</li>";
                    $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                }
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination.= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                    $pagination.= "<li class='dot'>..</li>";
                    $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                }
                else
                {
                    $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination.= "<li class='dot'>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1){
                $pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
                //$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
            }else{
                $pagination.= "<li><a class='current'>Next</a></li>";
                //$pagination.= "<li><a class='current'>Last</a></li>";
            }
            $pagination.= "</ul>\n";
        }
        return $pagination;
    }

    public function review($id){
        if($id){
            $data = array(
                'reviewer_name' => $this->db->escape_str($this->input->post('reviewer_name')),
                'rating' => $this->db->escape_str($this->input->post('rating')),
                'review_des' => $this->db->escape_str($this->input->post('review_des')),
                'review_status' =>$this->input->post('review_status'),
                'ads_id' => $this->db->escape_str($this->input->post('ads_id')),
                'review_date' => date('Y-m-d')
            );
            $this->ads_model->addReview($data);
            $this->session->set_flashdata('flashSuccess', 'Your review sucessfully send');
            $this->details($this->db->escape_str($this->input->post('ads_id')));
        }else{
            redirect(base_url().'index.php/classified_ads/index');
        }

    }
}

