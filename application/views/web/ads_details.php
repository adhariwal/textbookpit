 <script src="https://use.fontawesome.com/fe8be35b3e.js"></script>
<div class="col-lg-10 content-right">
          <ol class="breadcrumb">
            <?php
            if($type == 'classified'){
                $url_home=base_url().'index.php/classified_ads/index';
                $url_cat= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&catid='.$cat_id.'&category='.$category;
                $url_sub_cat= base_url().'index.php/classified_ads/ads/?'.$_SERVER['QUERY_STRING'].'&subcatid='.$sub_cat_id.'&subcategory='.$sub_category;
            }

    if ($this->session->flashdata('flashSuccess')) {
      echo '<div class="alert alert-success fade in"><a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">x</a>';
      echo $this->session->flashdata('flashSuccess');
      echo '<br></div>';
    }
            ?>
            <li><a href="<?php echo $url_home;?>">Home</a></li>
            <li><a href="<?php echo $url_cat;?>"><?php echo $category;?></a></li>
            <li><a href="<?php echo $url_sub_cat;?>"><?php echo $sub_category;?></a></li>
          </ol>
          <h2><?php echo $title;?></h2>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12" id="slider">
                  <div class="col-md-12" id="carousel-bounding-box" style="padding: 0;">
                    <div id="detailCarousel" class="carousel slide">
                      <div class="carousel-inner">
                         <?php
                          if($img_1!='no'){?>  <div class="active item" data-slide-number="0">
                       
                            <img src="<?php echo base_url().$img_1;?>" class="img-responsive" />
                          
                        </div>  <?php
                          }
                          ?>
                         <?php
                          if($img_2!='no'){?>  <div class="item" data-slide-number="1">
                       
                          <img src="<?php echo base_url().$img_2;?>" class="img-responsive" />
                         
                        </div> <?php
                          }
                          ?>
                        <?php
                          if($img_3!='no'){?>   <div class="item" data-slide-number="2">
                       
                            <img src="<?php echo base_url().$img_3;?>" class="img-responsive" />
                           

                        </div> <?php
                          }
                          ?>
                         <?php
                          if($img_4!='no'){?>  <div class="item" data-slide-number="3">
                       
                            <img src="<?php echo base_url().$img_4;?>" class="img-responsive" />
                            

                        </div><?php
                          }
                          ?>
                      </div>
                      <a class="carousel-control left" href="#detailCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                      <a class="carousel-control right" href="#detailCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                  </div>
                </div>
              </div><br>
             <div class="row">
                <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
                  <ul class="list-inline">
                    <?php
                    if($img_1!='no'){?>
                      <li><a  href="#detailCarousel" id="carousel-selector-0" class="selected"><img src="<?php echo base_url().$img_1;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_2!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-1"><img src="<?php echo base_url().$img_2;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_3!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-2"><img src="<?php echo base_url().$img_3;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_4!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-3"><img src="<?php echo base_url().$img_4;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>

                  </ul>    
                </div>
              </div>
            </div>
            <div class="col-md-4">
     <style>
	 .list-detail2 tr{
	border-bottom:1px dashed #ddd;
	height:30px;
}
 
 .list-detail2{
	 margin-bottom:30px;
 }
	 </style>  
     <h3 style="margin-top:0px;">Details - </h3>     
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="list-detail2">
   <tr>
                    <td><strong><i class="fa fa-book" aria-hidden="true"></i>&nbsp;ISBN No.</strong></td>
                    <td> <?php echo $isbn;?></td>
                  </tr>
                  <tr>
                    <td><strong><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Author</strong></td>
                    <td><?php echo $cus_name; ?></td>
                  </tr>
                   <tr>
                    <td><strong><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;Category</strong></td>
                    <td><?php echo $category;?></td>
                  </tr>
                  
                    <td><strong><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;Price</strong></td>
                    <td><a><?php if($price)echo '$'.$price;else echo'-'?></a></td>
                  </tr>
</table>

            
            
             <!-- <table class="table table-condensed ">
                <thead>
                  <th colspan="2">Details:</th>
                </thead>
                <tbody style="font-size: 12px;">
                  <tr>
                    <td><strong>Directory ID</strong></td>
                    <td><?php //echo $ads_id;?></td>
                  </tr>
                 
                  <tr>
                    <td><strong>INSB No.</strong></td>
                    <td> ..........</td>
                  </tr>
                  <tr>
                    <td><strong>Author</strong></td>
                    <td>.........</td>
                  </tr>
                   <tr>
                    <td><strong>Category</strong></td>
                    <td><?php echo $category;?></td>
                  </tr>
                  <tr>
                    <td><strong>Area</strong></td>
                    <td><?php echo $area;?></td>
                  </tr>
                  <tr>
                    <td><strong>Posted by</strong></td>
                    <td><?php echo $ad_type;?></td>
                  </tr>
                  <tr>
                    <td><strong>Type of ad</strong></td>
                    <td><?php echo $ad_cat;?></td>
                  </tr>
                  <tr>
                    <td><strong>Price</strong></td>
                    <td><a><?php if($price)echo '$'.$price;else echo'-'?></a></td>
                  </tr>
                  
                </tbody>
              </table>-->
              <div class="row">
                <div class="col-md-12">
                   
                  <div class="well">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4><a href="#">Seller Name : <?php echo $cus_name;?></a></h4>
                       
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php echo base_url().$img_1;?>" class="img-responsive" width="75" height="75"/></td>
    <td> <?php
                        if($email_status==1){?>
                          <span class="glyphicon glyphicon-envelope"></span> <?php echo $email;?><br /> 
                          <span class="glyphicon glyphicon-phone-alt"></span> <?php echo $phone;?><br />
                        <?php
                        }
                        ?></td>
  </tr>
</table>

                       
                       
                       <!-- <small><span class="glyphicon glyphicon-map-marker"></span>Address: <cite title="Prague, Czech Republic"><?php echo $address;?> </cite></small><br /><br />-->
                       

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>Seller Description</h4>
              <p style="text-align: justify;"><?php echo $address;?></p>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12">
              <h4>Description</h4>
              <p style="text-align: justify;"><?php echo $description;?></p>
            </div>
          </div>
          <hr>
  <div class="row">
    <div class="col-md-12">
      <button class="btn btn-success" type="button" id="contact_s">Contact Seller</button>
      <!--<button class="btn btn-success" type="button" id="add_review">Show review </button>-->
    </div>
  </div>
          <div class="row" id="contact_seller">
            <div class="col-md-12">
              <h4>Send message to seller</h4>
              <div class="panel panel-default">
                <div class="panel-body">
                 <?php
                    if(isset ($massage))echo $massage;
                    echo validation_errors('<div class="alert alert-error">', '</div>');
                 ?>
                  <?php echo form_open('webdetails/contactSeller')?>
                  <input type="hidden" class="form-control" name="subject" id="subject" value="<?php echo $title;?>">
                  <input type="hidden" class="form-control" name="seller" id="seller" value="<?php echo $email;?>">
                    <div class="form-group">
                      <label for="InputName">Name *</label>
                      <input type="text"  class="form-control" name="name" id="name" placeholder="Enter your name"  required>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">Email *</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <label for="InputPhone">Phone </label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone no" >
                    </div>
                    <div class="form-group">
                      <label for="InputText">Your Message *</label>
                      <textarea class="form-control" id="message" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;" required></textarea>
                    </div>
                    <button class="btn btn-danger" type="submit">Send</button>
                  </form>
                </div>
              </div>
            </div>
           </div>

          <div class="row" id="review">
            <div class="col-md-12">
              <h4>Product Reviews</h4>
              <div class="panel panel-default">
                <div class="panel-body">
              <?php
              if($review){
                foreach($review as $rowReview){
                  echo '<b>'.$rowReview->reviewer_name.'</b> - '.$rowReview->rating.'/5';
                  echo '<br>';
                  echo $rowReview->review_des;
                  echo '<br>';
                  echo $rowReview->review_date;
                  echo '<br>';
                }
              }

              ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <h4>Write a Review</h4>
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                  if(isset ($massage))echo $massage;
                  echo validation_errors('<div class="alert alert-error">', '</div>');
                  ?>
                  <?php echo form_open('classified_ads/review/'.$ads_id)?>
                  <input type="hidden" class="form-control" name="ads_id" id="ads_id" value="<?php echo $ads_id;?>">
                  <input type="hidden" class="form-control" name="review_status" id="review_status" value="0">
                  <div class="form-group">
                    <label for="InputName">Name *</label>
                    <input type="text"  class="form-control" name="reviewer_name" id="reviewer_name" placeholder="Enter your name"  required>
                  </div>
                  <div class="form-group">
                    <label for="InputEmail">Rating *</label>
                    <select name="rating" id="rating" class="form-control" required>
                      <option value="">Select rating</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="InputText">Your Review *</label>
                    <textarea class="form-control" id="review_des" name="review_des" placeholder="Type in your review" rows="5" style="margin-bottom:10px;" required></textarea>
                  </div>
                  <button class="btn btn-danger" type="submit">Send</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<script src="<?php echo base_url();?>web_assest/js/jquery-1.10.2.min.js"></script>
<script>
  $(document).ready(function () {
    $('#contact_seller').hide();
    $('#review').hide();
  });

  $('#contact_s').click(function(){
        $('#review').hide();
        $('#contact_seller').show();
      }
  )
  $('#add_review').click(function(){
        $('#contact_seller').hide();
        $('#review').show();
      }
  )
</script>