
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-tasks"></i>
            <a href="<?php echo base_url(); ?>index.php/classifiedcategory">Classified Category</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Classified Category</h2>
            </div>
            <div class="box-content">
                <div><h2>
                <?php
                if(isset ($massage))echo $massage;
                echo validation_errors('<div class="alert alert-error">', '</div>');
                ?>
                </h2></div>
                <?php echo form_open_multipart(base_url().'index.php/classifiedcategory/editClassifiedCategory/'.$id, array('class' => 'form-horizontal')) ?>
                <fieldset>
                    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $id?>">
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Category *</label>
                        <div class="controls">
                          <input type="text" name="category" id="category" class="input-xlarge focused" value="<?php echo $category;?>">
                          <?php //echo form_error('category','<div class="alert alert-error">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Change Image</label>
                        <div class="controls">
                          <img src="<?php echo base_url().$image; ?>">
                          <input type="file" name='userfile'>(20x20 px)
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Category Status</label>
                        <div class="controls">
                            <select id="selectCategory" name="selectCategory" data-rel="chosen1">
                                <?php if ($cat_status == 1) {?>
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
<script>
window.onload = function()
{
    $('.filename').remove();
    $('.action').remove();
}
</script>