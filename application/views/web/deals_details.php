<div class="col-lg-10 content-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php/directory_ads/index">Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/deals_ads/index">Deals</a></li>
          </ol>
          <h2><?php echo $title;?></h2>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12" id="slider">
                  <div class="col-md-12" id="carousel-bounding-box" style="padding: 0;">
                    <div id="detailCarousel" class="carousel slide">
                      <div class="carousel-inner">
                        <div class="active item" data-slide-number="0">
                          <img src="<?php echo base_url().$image;?>" class="img-responsive" />
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div><br>
             <div class="row">
                <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
                  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <table class="table table-condensed ">
                <thead>
                  <th colspan="2">Details:</th>
                </thead>
                <tbody style="font-size: 12px;">
                  <tr>
                    <td>Deal ID</td>
                    <td><?php echo $id;?></td>
                  </tr>
                  <tr>
                    <td>Start Date</td>
                    <td><?php echo $start_date;?></td>
                  </tr>
                  <tr>
                    <td>End Date</td>
                    <td><?php echo $end_date;?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php if($deal_status==1) echo 'Active'; else echo 'Expired';?></td>
                  </tr>
                  

                </tbody>
              </table>
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>Description</h4>
              <p style="text-align: justify;"><?php echo $description;?></p>
            </div>
          </div>
          
          
        </div>