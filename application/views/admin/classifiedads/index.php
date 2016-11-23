<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Ads</a></li>
    </ul>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/classifiedads/add'">New Classified Ad</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-tasks"></i><span class="break"></span>Classified Ads</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Customer</th>
                          <th>Phone No</th>
                          <th>Posted By</th>
                          <th>Type of ad</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($ads != null) {
                      foreach ($ads as $ads) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $ads->title; ?></td>
                        <td class="center"><?php echo $ads->category; ?></td>
                        <td class="center"><?php echo $ads->sub_category; ?></td>
                        <td class="center"><?php echo $ads->cus_name; ?></td>
                        <td class="center"><?php echo $ads->phone; ?></td>
                        <td class="center"><?php echo $ads->ad_type; ?></td>
                        <td class="center"><?php echo $ads->ad_cat; ?></td>
                        <td class="center">
                            <?php
                            if ($ads->ad_status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="classifiedads/edit/<?php echo $ads->ads_id; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="classifiedads/delete/<?php echo $ads->ads_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this classified ad?')">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                     </tr>
                     <?php }
                    }
                    ?>
                  </tbody>
              </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</div><!--/.fluid-container-->
