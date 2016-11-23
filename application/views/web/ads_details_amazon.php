<div >
       
          <h2><?php echo $title;?></h2>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12" id="slider">
                  <div class="col-md-12" id="carousel-bounding-box" style="padding: 0;">
                    <div id="detailCarousel" class="carousel slide">
                      <div class="carousel-inner">
                       <?php
                          if($img_1!='no'){?>
                        <div class="active item" data-slide-number="0">
                         
                            <img src="<?php echo $img_1;?>" class="img-responsive" />
                           
                        </div> <?php
                          }
                          ?>    <?php
                          if($img_2!='no'){?>
                        <div class="item" data-slide-number="1">
                      
                          <img src="<?php echo $img_2;?>" class="img-responsive" />
                        
                        </div>  <?php
                          }
                          ?>
                            <?php
                          if($img_3!='no'){?>
                        <div class="item" data-slide-number="2">
                      
                            <img src="<?php echo $img_3;?>" class="img-responsive" />
                          

                        </div>  <?php
                          }
                          ?>
                        <?php
                          if($img_4!='no'){?>
                        <div class="item" data-slide-number="3">
                          
                            <img src="<?php echo $img_4;?>" class="img-responsive" />
                        

                        </div>    <?php
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
                      <li><a  href="#detailCarousel" id="carousel-selector-0" class="selected"><img src="<?php echo $img_1;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_2!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-1"><img src="<?php echo $img_2;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_3!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-2"><img src="<?php echo $img_3;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>
                    <?php
                    if($img_4!='no'){?>
                      <li> <a  href="#detailCarousel" id="carousel-selector-3"><img src="<?php echo $img_4;?>" class="img-responsive" width="75" height="75"/></a></li>
                      <?php
                    }
                    ?>

                  </ul>    
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <table class="table table-condensed ">
                <thead>
                  <th colspan="2">Details:</th>
                </thead>
                <tbody style="font-size: 12px;">
                  <!--<tr>
                    <td><strong>Directory ID</strong></td>
                    <td><?php //echo $ads_id;?></td>
                  </tr>-->
                  <tr>
                    <td><strong>Category</strong></td>
                    <td><?php echo $category;?></td>
                  </tr>
                <!--  <tr>
                    <td><strong>Sub Category</strong></td>
                    <td><?php echo $sub_category;?></td>
                  </tr>
                  <tr>
                    <td><strong>District</strong></td>
                    <td><?php echo $district;?></td>
                  </tr>
                  <tr>
                    <td><strong>Area</strong></td>
                    <td><?php echo $area;?></td>
                  </tr>-->
                  <tr>
                    <td><strong>Posted by</strong></td>
                    <td>Public</td>
                  </tr>
                  <tr>
                    <td><strong>Type of ad</strong></td>
                    <td> 	Sell</td>
                  </tr>
                  <tr>
                    <td><strong>Price</strong></td>
                    <td><a><?php if($price)echo $price;else echo'-'?></a></td>
                  </tr>
                   <tr>
                    <td><strong>Url</strong></td>
                    <td><a href="<?php echo  $DetailPageURL; ?>">View item on Amozon</a></td>
                  </tr>
                 
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-12">
                  <span style="padding-left: 5px;"><strong>Seller:</strong></span>
                  <div class="well">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4><a href="#"><?php echo $cus_name;?></a></h4>
                        <small><span class="glyphicon glyphicon-map-marker"></span>Address: <cite title="Prague, Czech Republic"><?php echo $address;?> </cite></small><br /><br />
                        <?php
                        if($email_status==1){?>
                          <span class="glyphicon glyphicon-envelope"></span> <?php echo $email;?><br /><br />
                          <span class="glyphicon glyphicon-phone-alt"></span> <?php echo $phone;?><br />
                        <?php
                        }
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>Description</h4>
              <p style="text-align: justify;"><?php echo $description;?></p>
            </div>
          </div>
          <hr>
 
          

          <div class="row" >
            <div class="col-md-12">
              <h4>Product Reviews</h4>
               <iframe src="<?php echo $review; ?>"  frameborder="0"   width="100%"   marginheight="0"   marginwidth="0"   scrolling="no" ></iframe>
            </div>
            
          </div>
        </div>
