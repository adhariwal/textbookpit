<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Paid Ads</a></li>
    </ul>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/paidads/add'">New Paid Ad</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-tasks"></i><span class="break"></span>Paid Ads</h2>
                <!--<div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>-->
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>URL</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($paidads != null) {
                      foreach ($paidads as $paidads) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $paidads->url; ?></td>
                        <td class="center"><img src="<?php echo base_url().$paidads->image; ?>" width="100" height="100"></td>
                        <td class="center">
                            <?php
                            if ($paidads->status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="paidads/edit/<?php echo $paidads->paidads_id; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="paidads/delete/<?php echo $paidads->paidads_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this paid ad?')">
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
