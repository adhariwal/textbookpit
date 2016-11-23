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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>New Area</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open('area/addArea', array('class'=>'form-horizontal'))?>
                    <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="selectError">District *</label>
                        <div class="controls">
                          <select name="selectDis" id="selectDis" data-rel="chosen1">
                           <option value="">Select One</option>
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
                            <input type="text" name="area" id="area" class="input-xlarge focused" value="<?php if(isset($massage))echo set_value('');else echo set_value('area'); ?>">
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
