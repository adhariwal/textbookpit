<?php
if($type != null){
if($type == 'directory'){
$this->ads_model->delete_cat_temp();
$data['categories'] = $this->category_model->getAllWithStatus(1);
$url_allads=base_url().'index.php/directory_ads/index';
if ($data['categories'] != null) {
    foreach ($data['categories'] as $cat) {
            $cat_id=$cat->cat_id;
            $data1['cat_id']=$cat->cat_id;
            $data1['category']=$cat->category;
            $data1['count']=$this->ads_model->count_all_by_category($cat_id);
            $data1['image']=$cat->image;
            $this->ads_model->add_cat_temp($data1);
        }
        $data['categories']=$this->ads_model->getAllCat();
    }
}
if($type == 'classified'){
$this->ads_model->delete_cat_temp_classified();
$data['categories'] = $this->category_model->getAllClassifiedCategoryWithStatus(1);
$url_allads=base_url().'index.php/classified_ads/index';
if ($data['categories'] != null) {
    foreach ($data['categories'] as $cat) {
            $cat_id=$cat->cat_id;
            $data1['cat_id']=$cat->cat_id;
            $data1['category']=$cat->category;
            $data1['count']=$this->ads_model->count_all_by_category_classified($cat_id);
            $data1['image']=$cat->image;
            $this->ads_model->add_cat_temp_classified($data1);
        }
        $data['categories']=$this->ads_model->getAllCat_classified();
    }
}
?>
<div class="col-lg-2 col-sm-3 content-left" >
  <div id="left"></div>   <div style="display:none;">
      <!--<div class="well well-sm">
        <form method="get" action="<?php echo base_url() ?>index.php/classified_ads/ads/">
          <fieldset>
          
            <input type="text" name="s" value="<?php if(isset($_GET['s'])){echo $_GET['s']; } ?>" class="form-control" />
            <small><a href="#" class="btn-advanced-search">Advanced</a></small>
            <input type="submit" class="btn btn-danger btn-sm btn-search" value="Search" />
          </fieldset>
        </form>
      </div>-->
      
      <h4>Categories</h4>
      <div class="list-group categories" >
        <ul id="nav">
        <li><a href="<?php echo $url_allads;?>" class="list-group-item"><!--<img src="">-->&nbsp;&nbsp All <?php if($type == 'directory')echo'Directory';if($type == 'classified')echo'Classified';?> Ads (<?php echo $all_ads;?>)<span class="glyphicon glyphicon-chevron-right"></span></a></li>
        <?php
        
        //
        if ($data['categories'] != null) {
          foreach ($data['categories'] as $cat) {
              $cat_id=$cat->cat_id;
              if($type == 'directory'){
                  $data['all_cat_ads']=$this->ads_model->count_all_by_category($cat_id);
              }
              if($type == 'classified'){
                  $data['all_cat_ads']=$this->ads_model->count_all_by_category_classified($cat_id);
              }
        ?>
            <li class="has_sub"><a href="#" class="list-group-item"><img src="<?php echo base_url().$cat->image;?>">&nbsp;&nbsp<?php echo $cat->category;echo '   ('.$data['all_cat_ads'].')' ?> <span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul>
                    <li>
                        <div class="list-subgroups">
                            <?php
                            if($type == 'directory'){
                             //$url_cat= base_url().'index.php/directory_ads/cat_ads/'.preg_replace("![^a-z0-9]+!i", "-", $cat->cat_id.' '.$cat->category);
                             $url_cat= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&catid='.$cat->cat_id.'&category='.$cat->category;
                             $this->ads_model->delete_sub_cat_temp();
                             $data['subcategory']=$this->subcategory_model->getAllByCatId($cat_id,'sub_category','asc');
                             if ($data['subcategory'] != null) {
                                foreach ($data['subcategory'] as $sub_cat) {
                                    $sub_cat_id=$sub_cat->sub_cat_id;
                                    $data4['sub_cat_id']=$sub_cat->sub_cat_id;
                                    $data4['sub_category']=$sub_cat->sub_category;
                                    $data4['count']=$this->ads_model->count_all_by_sub_category($sub_cat_id);
                                    $this->ads_model->add_sub_cat_temp($data4);
                                    }
                                    $data['subcategory']=$this->ads_model->getAllsub_cat();
                                }
                            }
                            if($type == 'classified'){
                              $url_cat= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&catid='.$cat->cat_id.'&category='.$cat->category;
                              $this->ads_model->delete_sub_cat_temp_classified();
                              $data['subcategory']=$this->subcategory_model->getAllClassifiedSubcategoryByCatId($cat_id,'sub_category','asc');
                              if ($data['subcategory'] != null) {
                                foreach ($data['subcategory'] as $sub_cat) {
                                    $sub_cat_id=$sub_cat->sub_cat_id;
                                    $data4['sub_cat_id']=$sub_cat->sub_cat_id;
                                    $data4['sub_category']=$sub_cat->sub_category;
                                    $data4['count']=$this->ads_model->count_all_by_sub_category_classified($sub_cat_id);
                                    $this->ads_model->add_sub_cat_temp_classified($data4);
                                    }
                                    $data['subcategory']=$this->ads_model->getAllsub_cat_classified();
                                }
                            }?>
                            <a href="<?php echo $url_cat;?>" class="list-subgroup-item">All <?php echo $cat->category;echo '   ('.$data['all_cat_ads'].')' ?></a>
                            <?php
                            if($data['subcategory'] != null){

                            foreach ($data['subcategory'] as $sub_cat)
                                {
                                    $sub_cat_id=$sub_cat->sub_cat_id;
                                    if($type == 'directory'){
                                        $data['all_sub_cat_ads']=$this->ads_model->count_all_by_sub_category($sub_cat_id);
                                        //$url= base_url().'index.php/directory_ads/sub_cat_ads/'.preg_replace("![^a-z0-9]+!i", "-", $sub_cat->sub_cat_id.' '.$sub_cat->sub_category);
                                        $url_sub_cat= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&subcatid='.$sub_cat->sub_cat_id.'&subcategory='.$sub_cat->sub_category;
                                    }
                                    if($type == 'classified'){
                                        $data['all_sub_cat_ads']=$this->ads_model->count_all_by_sub_category_classified($sub_cat_id);
                                        $url_sub_cat= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&subcatid='.$sub_cat->sub_cat_id.'&subcategory='.$sub_cat->sub_category;
                                    }
                                    
                                ?>
                                <a href="<?php echo $url_sub_cat;?>" class="list-subgroup-item"><?php echo $sub_cat->sub_category;echo '   ('.$data['all_sub_cat_ads'].')' ?></a>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </li>
            <?php } }?>
        </ul>
      </div>

      <h4>School with Area</h4>
      <div class="list-group categories" id="content">
        <ul id="nav" class="second">
        <?php
        if($type == 'directory'){
            $url_allads=base_url().'index.php/directory_ads/index';
        }
        if($type == 'classified'){
            $url_allads=base_url().'index.php/classified_ads/index';
        }
        ?>
        <li><a href="<?php echo $url_allads;?>" class="list-group-item">All Schools (<?php echo $all_ads;?>)<span class="glyphicon glyphicon-chevron-right"></span></a></li>
        <?php
        if($type == 'directory'){
            $this->ads_model->delete_districts_temp();
            $data['districts']=$this->districts_model->getAllWithStatus(1);

            if ($data['districts'] != null) {
            foreach ($data['districts'] as $dis) {
                $dis_id=$dis->district_id;
                $data2['district_id']=$dis->district_id;
                $data2['district']=$dis->district;
                $data2['count']=$this->ads_model->count_all_by_dis($dis_id);
                $this->ads_model->add_districts_temp($data2);
                }
                $data['districts']=$this->ads_model->getAlldistricts();
            }
        }
        if($type == 'classified'){
            $this->ads_model->delete_districts_temp_classified();
            $data['districts']=$this->districts_model->getAllWithStatus(1);
            if ($data['districts'] != null) {
            foreach ($data['districts'] as $dis) {
                $dis_id=$dis->district_id;
                $data2['district_id']=$dis->district_id;
                $data2['district']=$dis->district;
                $data2['count']=$this->ads_model->count_all_by_dis_classified($dis_id);
                $this->ads_model->add_districts_temp_classified($data2);
                }
                $data['districts']=$this->ads_model->getAlldistricts_classified();
            }
        }
        
        if ($data['districts'] != null) {
          foreach ($data['districts'] as $dis) {
              $dis_id=$dis->district_id;
              if($type == 'directory'){
                  $data['all_dis_ads']=$this->ads_model->count_all_by_dis($dis_id);
                  //$url_location= base_url().'index.php/directory_ads/location_ads/'.preg_replace("![^a-z0-9]+!i", "-", $dis->district_id.' '.$dis->district);
                  $url_location= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&locid='.$dis->district_id.'&location='.$dis->district;
              }
              if($type == 'classified'){
                  $data['all_dis_ads']=$this->ads_model->count_all_by_dis_classified($dis_id);                  
                  $url_location= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&locid='.$dis->district_id.'&location='.$dis->district;
              }
              
        ?>
            <li class="has_sub"><a href="#" onclick="hideDive(<?php echo $dis_id;?>);" class="list-group-item"><?php echo $dis->district;echo'   ('.$data['all_dis_ads'].')' ?> <span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul>
                    <li>
                        <div class="list-subgroups">
                        
                        <a href="<?php echo $url_location;?>" class="list-subgroup-item">All of <?php echo $dis->district;echo '   ('.$data['all_dis_ads'].')' ?></a>
                            
                            <?php
                            if($type == 'directory'){
                                $this->ads_model->delete_area_temp();
                                $data['area']=$this->area_model->getByDisId_limit5($dis_id,'area','asc');
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
                                $data['area']=$this->area_model->getByDisId_limit5($dis_id,'area','asc');
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
                                <input type="hidden" name="url_area" id="url_area" value="<?php echo $url_area;?>">
                                <input type="hidden" name="area_ad_count" id="area_ad_count" value="<?php echo $data['all_area_ads'];?>">

                                <div id="area1">
                                <a href="<?php echo $url_area;?>" class="list-subgroup-item"><?php echo $area->area;echo'   ('.$data['all_area_ads'].')' ?></a>
                                 </div>
                                 
                                
                            <?php
                            }}
                            if($type == 'directory'){
                                ?>
                                <a href="#" onclick="getArea_directory()" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Show more...</a>
                           <?php }
                            if($type == 'classified'){
                             ?>
                             <a href="#" onclick="getArea_classified()"data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Show more...</a>
                             <?php
                            }
                            ?>
                          
                           
                        </div>
                    </li>
                </ul>
            </li>
            <?php } }?>
    <input type="hidden" name="ty" id="ty" value="<?php echo $type;?>">
    <input type="hidden" name="dis" id="dis" value="">
        </ul>
      </div>
      <?php
      if($type == 'directory'){
       $url_all_post= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=All';
       $url_private= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=Private';
       $url_business= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=Business';

       $url_all_type= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=All';
       $url_buy= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Buy';
       $url_sell= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Sell';
       $url_want= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Want';
       $url_rent= base_url().'index.php/directory_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Rent';
      ?>
          <h4>Posted By</h4>
          <h5>
        <div>
                <input type="radio" name="post"  value="All" <?php if(isset($_GET['post'])){if($_GET['post'] == 'All')echo 'checked';}?> onclick="window.location.href='<?php echo $url_all_post;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">All Posters</font><br>
                <input type="radio" name="post"  value="Private" <?php if(isset($_GET['post'])){if($_GET['post'] == 'Private')echo 'checked';}?> onclick="window.location.href='<?php echo $url_private;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Private</font><br>
                <input type="radio" name="post"  value="Business" <?php if(isset($_GET['post'])){if($_GET['post'] == 'Business')echo 'checked';}?> onclick="window.location.href='<?php echo $url_business;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Business</font>
          </div>-->
          <!--
          <a href="<?php //echo $url_all_post; ?>">All Posters</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_private; ?>">Private</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_business; ?>">Business</a>-->
          </h5>
          <br>
          <h4>Type of ad</h4>
          <h5>
          <div>
                <input type="radio" name="type"  value="All" <?php if(isset($_GET['type'])){if($_GET['type'] == 'All')echo 'checked';}?> onclick="window.location.href='<?php echo $url_all_type;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">All Posters</font><br>
                <input type="radio" name="type"  value="Buy" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Buy')echo 'checked';}?> onclick="window.location.href='<?php echo $url_buy;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Buy</font><br>
                <input type="radio" name="type"  value="Sell" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Sell')echo 'checked';}?> onclick="window.location.href='<?php echo $url_sell;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Sell</font><br>
                <input type="radio" name="type"  value="Want" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Want')echo 'checked';}?> onclick="window.location.href='<?php echo $url_want;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Want</font><br>
                <input type="radio" name="type"  value="Rent" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Rent')echo 'checked';}?> onclick="window.location.href='<?php echo $url_rent;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Rent</font>
          </div>

          <!--<a href="<?php //echo $url_all_type; ?>">All Type</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_buy; ?>">Buy</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_sell; ?>">Sell</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_want; ?>">Want</a>&nbsp;&nbsp;&nbsp
          <a href="<?php //echo $url_rent; ?>">Rent</a>-->
          </h5>
      <?php
      }
      ?>

      <?php
      if($type == 'classified'){
       $url_all_post= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=All';
       $url_private= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=Private';
       $url_business= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&post=Business';

       $url_all_type= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=All';
       $url_buy= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Buy';
       $url_sell= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Sell';
       $url_want= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Want';
       $url_rent= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&type=Rent';
      ?>
          <h4>Posted By</h4>
          <h5>
          <div>
                <input type="radio" name="post"  value="All" <?php if(isset($_GET['post'])){if($_GET['post'] == 'All')echo 'checked';}?> onclick="window.location.href='<?php echo $url_all_post;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">All Posters</font><br>
                <input type="radio" name="post"  value="Private" <?php if(isset($_GET['post'])){if($_GET['post'] == 'Private')echo 'checked';}?> onclick="window.location.href='<?php echo $url_private;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Private</font><br>
                <input type="radio" name="post"  value="Business" <?php if(isset($_GET['post'])){if($_GET['post'] == 'Business')echo 'checked';}?> onclick="window.location.href='<?php echo $url_business;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Business</font>
          </div>
          </h5>
          <br>
          <h4>Type of ad</h4>
          <h5>
          <div>
                <input type="radio" name="type"  value="All" <?php if(isset($_GET['type'])){if($_GET['type'] == 'All')echo 'checked';}?> onclick="window.location.href='<?php echo $url_all_type;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">All Posters</font><br>
                <input type="radio" name="type"  value="Buy" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Buy')echo 'checked';}?> onclick="window.location.href='<?php echo $url_buy;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Buy</font><br>
                <input type="radio" name="type"  value="Sell" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Sell')echo 'checked';}?> onclick="window.location.href='<?php echo $url_sell;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Sell</font><br>
                <input type="radio" name="type"  value="Want" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Want')echo 'checked';}?> onclick="window.location.href='<?php echo $url_want;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Want</font><br>
                <input type="radio" name="type"  value="Rent" <?php if(isset($_GET['type'])){if($_GET['type'] == 'Rent')echo 'checked';}?> onclick="window.location.href='<?php echo $url_rent;?>'">&nbsp;&nbsp;&nbsp;<font color="#d9534f">Rent</font>
          </div>
          </h5>
      <?php
      }
      ?>
    </div></div>
    
<?php
}
?>

<script>
    function getArea_directory(){
        var id=$('#dis').val();
        var ty=$('#ty').val();
//        var url_area=$('#url_area').val();
//        var area_ad_count=$('#area_ad_count').val();
        // var cct = $("input[name=csrf_token_name]").val();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/areafront/getAreaByDisId_front_list",
        dataType: 'html',
        
        data: {'id': id,'ty': ty,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data) {
           // $('#area1').remove();
            $('#area').html(data);
        }
    });
}

function getArea_classified(){
        var id=$('#dis').val();
        var ty=$('#ty').val();
        // var cct = $("input[name=csrf_token_name]").val();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/areafront/getAreaByDisId_front_list",
        dataType: 'html',

         data: {'id': id,'ty': ty,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data) {
            
          //  $('#area1').remove();
            $('#area').html(data);
        }
    });
}
</script>

<script>
function hideDive($id)
{
    $('#dis').val($id);
}
</script>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Area you are looking ...</h4>
      </div>
      <div class="modal-body">
            <div id="area" style=" height: 450px; overflow-y: scroll;">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
