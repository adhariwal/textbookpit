<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Classified Category</a></li>
    </ul>
    <?php //echo anchor('category/save/','Add New Category',array('class'=>'"btn btn-primary')); ?>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/classifiedcategory/add'">New Classified Category</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-tasks"></i><span class="break"></span>Classified Category</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($categories != null) {
                      foreach ($categories as $cat) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $cat->category; ?></td>
                        <td class="center"><img src="<?php echo base_url().$cat->image; ?>"></td>
                        <td class="center">
                            <?php
                            if ($cat->cat_status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="classifiedcategory/edit/<?php echo $cat->cat_id; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="classifiedcategory/delete/<?php echo $cat->cat_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this category?')">
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
