<div class="col-lg-10 content-right">
<ol class="breadcrumb">
           <li><a href="<?php echo base_url();?>index.php/directory_ads/index">Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/deals_ads/index">Deals</a></li>
          </ol>
          <h2>All Deals Ads</h2>
          
          <div class="row classifieds-table">
            <div class="col-lg-12">
              <table class="table table-hover">
                <tbody>
                <?php
                if ($deals != null) {
                    foreach ($deals as $deals) {
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div id="media_t">
                          <div class="media" style="cursor: pointer;" onclick="window.location.href='<?php echo base_url();?>index.php/deals_ads/details/<?php echo $deals->deal_id; ?>'">
                            <a class="thumbnail pull-left" href="<?php echo base_url();?>index.php/deals_ads/details/<?php echo $deals->deal_id; ?>">
                              <img class="media-object" src="<?php echo base_url().$deals->image; ?>" style="width: 300px; height: 275px;" />
                            </a>
                            <div class="media-body">
                              <h2 class="media-heading"><a href="<?php echo base_url();?>index.php/deals_ads/details/<?php echo $deals->deal_id; ?>"><?php echo $deals->title; ?></a></h2>
                              <p><small><?php echo substr($deals->description,0,150); ?></small></p>
                              <h3><a>Start Date: </a></h3><h4><?php echo $deals->start_date ;?></h4>
                              <h3><a>End Date: </a></h3><h4><?php echo $deals->end_date ;?></h4>
                            </div>
                          </div>
                          </div>
                        </td>
                        <!--<td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><a href="<?php //echo base_url();?>index.php/deals_ads/details/<?php //echo $deals->deal_id; ?>">More &rarr;</a></td>-->
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-12" style="text-align: center;">
              <ul class="pagination">
<li class=""><?php echo $pagination;?></li>
    </ul>
            </div>
          </div>
        </div>

        <style>
            ul.pagination li a:hover,
ul.pagination li a.current
{
text-shadow:0px 1px #fff;
border-color:#d9534f;
background:#d9534f;
background:-moz-linear-gradient(top, #B4F6FF 1px, #fff 1px, #d9534f);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #fff), color-stop(1, #d9534f));
}
            </style>