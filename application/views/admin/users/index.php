<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Users</a></li>
    </ul>
    <?php
            $session_data=$this->session->userdata('logged_in');
                  if($session_data['is_admin']=='YES'){
                 ?>
    <button type="submit" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index.php/users/add'">New User</button>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>User Name</th>
                          <th>Description</th>
                          <th>Is Admin</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  if ($users != null) {
                      foreach ($users as $user) {
                    ?>
                    <tr>
                        <td class="center"><?php echo $user->name; ?></td>
                        <td class="center"><?php echo $user->user_name; ?></td>
                        <td class="center"><?php echo $user->description; ?></td>
                        <td class="center"><?php echo $user->is_admin; ?></td>
                        <td class="center">
                            <?php
                            if ($user->status == 1) { ?>
                                <span class="label label-success">Active</span>
                            <?php }
                            else { ?>
                                <span class="label label-danger ">Inactive</span>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="users/edit/<?php echo $user->user_id; ?>" title="Edit" >
                                        <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="users/delete/<?php echo $user->user_id;?>" title="Delete" onclick="return confirm('Are you sure want to delete this user?')">
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
    <?php }?>
</div><!--/.fluid-container-->
