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
            <a href="<?php echo base_url();?>index.php/classifiedsubcategory">Classified Sub Category</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Classified Sub Category</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open('classifiedsubcategory/editClassifiedSubcategory/'.$sub_cat_id, array('class'=>'form-horizontal'))?>
                    <fieldset>
                    <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="<?php echo $sub_cat_id?>">
                      <div class="control-group">
                        <label class="control-label" for="selectError">Category *</label>
                        <div class="controls">
                          <select name="selectCategory" id="selectCategory" data-rel="chosen1">
                           <option value="<?php echo $cat_id; ?>"<?php echo set_select('selectCategory',$cat_id,TRUE)?>><?php echo $category; ?></option>
                          <?php
                          if($categories){
                          foreach ($categories as $cat) {
                          ?>
                          <option value="<?php echo $cat->cat_id; ?>"<?php echo set_select('selectCategory',$cat->cat_id,FALSE)?>><?php echo $cat->category; ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Sub Category *</label>
                        <div class="controls">
                            <input type="text" name="subcat" id="subcat" class="input-xlarge focused" value="<?php echo $sub_category;?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Sub Category Status *</label>
                        <div class="controls">
                            <select id="status" name="status" data-rel="chosen1">
                                <?php if ($sub_cat_status == 1) {?>
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
