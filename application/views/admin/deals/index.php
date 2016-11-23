<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Deals</a></li>
    </ul>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/deals/add'">New Deal</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-tasks"></i><span class="break"></span>Deal</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Deal</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($deals != null) {
                      foreach ($deals as $deal) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $deal->title; ?></td>
                        <td class="center"><img src="<?php echo base_url().$deal->image; ?>" width="60" height="15"></td>
                        <td class="center">
                            <?php
                            if ($deal->deal_status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="deals/edit/<?php echo $deal->deal_id; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="deals/delete/<?php echo $deal->deal_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this deal?')">
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
