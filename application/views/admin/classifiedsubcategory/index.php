<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Classified Sub Category</a></li>
    </ul>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/classifiedsubcategory/add'">New Classified Sub Category</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Sub Category</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($subcategory != null) {
                      foreach ($subcategory as $sub_cat) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $sub_cat->sub_category; ?></td>
                        <td class="center"><?php echo $sub_cat->category; ?></td>
                        <td class="center">
                            <?php
                            if ($sub_cat->sub_cat_status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="classifiedsubcategory/edit/<?php echo $sub_cat->sub_cat_id; ?>" title="Edit">
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="classifiedsubcategory/delete/<?php echo $sub_cat->sub_cat_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this sub category?')">
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
