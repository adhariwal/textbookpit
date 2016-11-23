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
            <a href="<?php echo base_url();?>index.php/area">Areas</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Area</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open('area/editArea/'.$area_id, array('class'=>'form-horizontal'))?>
                    <fieldset>
                    <input type="hidden" name="area_id" id="area_id" value="<?php echo $area_id;?>">
                      <div class="control-group">
                        <label class="control-label" for="selectError">District *</label>
                        <div class="controls">
                          <select name="selectDis" id="selectDis" data-rel="chosen1">
                           <option value="<?php echo $district_id; ?>"<?php echo set_select('selectDis',$district_id,TRUE)?>><?php echo $district; ?></option>
                          <?php
                          if($districts){
                          foreach ($districts as $dis) {
                          ?>
                          <option value="<?php echo $dis->district_id; ?>"<?php echo set_select('selectDis',$dis->district_id,FALSE)?>><?php echo $dis->district; ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Area *</label>
                        <div class="controls">
                            <input type="text" name="area" id="area" class="input-xlarge focused" value="<?php echo $area; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Area Status *</label>
                        <div class="controls">
                            <select id="status" name="status" data-rel="chosen1">
                                <?php if ($area_status == 1) {?>
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
