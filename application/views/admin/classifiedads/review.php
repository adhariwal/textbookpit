<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Ads Review</a></li>
    </ul>
    <!--<button type="submit" class="btn btn-primary" onclick="window.location.href='<?php //echo base_url();?>index.php/classifiedads/add'">New Classified Ad</button>-->
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-tasks"></i><span class="break"></span>Ads Review</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Ads</th>
                          <th>Reviewer</th>
                          <th>Rating</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($ads_review != null) {
                      foreach ($ads_review as $row) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $row->title; ?></td>
                        <td class="center"><?php echo $row->reviewer_name; ?></td>
                        <td class="center"><?php echo $row->rating; ?></td>
                        <td class="center"><?php echo $row->review_date; ?></td>
                        <td class="center"><?php echo $row->review_des; ?></td>
                        <td class="center">
                            <?php
                            if ($row->review_status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-success" href="<?php echo base_url();?>index.php/classifiedads/change_review/<?php echo $row->review_id; ?>" title="Change Review Status">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="<?php echo base_url();?>index.php/classifiedads/delete_review/<?php echo $row->review_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this ?')">
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
