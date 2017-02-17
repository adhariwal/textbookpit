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
            <a href="<?php echo base_url();?>index.php/districts">School Name</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit School Name</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open_multipart('districts/editDistricts/'.$district_id, array('class'=>'form-horizontal'))?>
                    <fieldset>
                    <input type="hidden" name="district_id" id="district_id" value="<?php echo $district_id?>">
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">School *</label>
                        <div class="controls">
                            <input type="text" name="district" id="district" class="input-xlarge focused" value="<?php echo $district;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">School Status *</label>
                        <div class="controls">
                            <select id="status" name="status" data-rel="chosen1">
                                <?php if ($dis_status == 1) {?>
                                <option selected="true" value="1">Active</option>
                                <option value="0">Inactive</option>
                                <?php } else { ?>
                                    <option value="1">Active</option>
                                    <option selected="true" value="0">Inactive</option>
                                <?php } ?>
                            </select>
                        </div>
                        </div>
                         <div class="control-group">
                        <label class="control-label" for="focusedInput">Change Image 1</label>
                        <div class="controls">
                            <?php
                            if($img_1 !='no'){
                                ?>
                                <img src="<?php echo base_url().$img_1; ?>" width="200" height="200">
                            <?php
                            }
                            ?>
                          <input type="file" name='img_1' id="img_1" value="">
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
