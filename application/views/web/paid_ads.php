<div class="col-lg-2 content-right" >
          <ol class="breadcrumb">
<li><a href="<?php echo base_url();?>">Home</a></li>
           
          </ol>
          <h5>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>index.php/webdetails/post" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Post Ad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h5>

          <div class="row classifieds-table" id="right">
            <div class="col-lg-16">
              <table class="table11 table11-hover">
                <tbody>
                <?php
                if ($paidads != null) {
                    foreach ($paidads as $paidads) {
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        
                          <div class="media">
                          <?php
                          if($paidads->url != null){
                              ?>
                              <a class="thumbnail pull-left" href="http://<?php echo $paidads->url; ?>" target="_blank">
                              <img class="media-object" src="<?php echo base_url().$paidads->image; ?>" style="width: 125px; height: 125px;" />
                              </a><?php
                          }
                          else{
                              ?>
                              <a class="thumbnail pull-left" href="<?php echo base_url().$paidads->image; ?>" target="_blank">
                              <img class="media-object" src="<?php echo base_url().$paidads->image; ?>" style="width: 125px; height: 125px;" />
                              </a>
                              <?php
                          }
                          ?>
                          </div>
                        </td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-12" style="text-align: center;">
              
            </div>
          </div>
        </div>

