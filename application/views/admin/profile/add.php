<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-tasks"></i>
            <a href="#">User Profile</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>User Profile</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open('profile/addProfile/'.$user_id, array('class'=>'form-horizontal'))?>
                    <fieldset>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                     <div class="control-group">
                        <label class="control-label" for="focusedInput">Name *</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" class="input-xlarge focused" value="<?php echo $name;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">User Name *</label>
                        <div class="controls">
                            <input type="text" name="user_name" id="user_name" class="input-xlarge focused" value="<?php echo $user_name;?>" readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">User Password *</label>
                        <div class="controls">
                            <input type="password" name="user_password" id="user_password" class="input-xlarge focused" value="<?php //echo $user_password;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Description </label>
                        <div class="controls">
                            <input type="text" name="description" id="description" class="input-xlarge focused" value="<?php echo $description;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Profile Status</label>
                        <div class="controls">
                            <select id="selectStatus" name="selectStatus" data-rel="chosen1">
                                <?php if ($status == 1) {?>
                                <option selected="true" value="1">Active</option>
                                <option value="0">Inactive</option>
                                <?php } else { ?>
                                    <option value="1">Active</option>
                                    <option selected="true" value="0">Inactive</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                        <button type="reset" class="btn">Reset</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?php echo $btn_back;?>'">Back</button>
                      </div>
                    </fieldset>
                  </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
    
</div><!--/.fluid-container-->

