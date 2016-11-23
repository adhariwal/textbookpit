<div class="col-lg-7 content-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/directory_ads/index">Directory Ads</a></li>
          </ol>
         <h5>
            All Directory Ads :
            <?php
                if(isset($_GET['catid'])){echo $_GET['category'];}
                if(isset($_GET['subcatid'])){echo' -> ';echo $_GET['subcategory'];}
                if(isset($_GET['post'])){;echo' -> ';echo $_GET['post'];}
                if(isset($_GET['type'])){echo' -> ';echo $_GET['type'];}
                if(isset($_GET['locid'])){echo' in ';echo $_GET['location'];}
                if(isset($_GET['areaid'])){echo' -> ';echo $_GET['area'];}
            ?>
         </h5>
         <br>
          <div class="row classifieds-table">
            <div class="col-lg-16">
              <table class="table table-hover">
                <tbody>
                <?php
                if ($ads != null) {
                    foreach ($ads as $ads) {
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <?php
                            $url= base_url().'index.php/directory_ads/details/'.preg_replace("![^a-z0-9]+!i", "-", $ads->ads_id.' '.$ads->title);
                            ?>
                          <div class="media" style="cursor: pointer;" onclick="window.location.href='<?php echo $url; ?>'">
                            <a class="thumbnail pull-left" href="<?php echo $url; ?>">
                              <img class="media-object" src="<?php echo base_url().$ads->img_1; ?>" style="width: 125px; height: 125px;" />
                            </a>
                            <div class="media-body">
                              <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $ads->title; ?></a></h4><br>
                              <p><small><?php echo $ads->date;echo' , ';echo $ads->area;echo' , ';echo $ads->category;//echo substr($ads->description,0,150); ?></small></p><br>
                              <h5 class="media-heading"><a href="<?php echo $url; ?>"> <?php if($ads->price)echo 'Rs '.$ads->price; ?></a></h5>
                            </div>
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
              <?php echo $pagination;?>
            </div>
          </div>
        </div>

       