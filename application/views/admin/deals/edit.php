
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-tasks"></i>
            <a href="<?php echo base_url(); ?>index.php/deals">Deals</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Deal</h2>
            </div>
            <div class="box-content">
                <div><h2>
                <?php
                if(isset ($massage))echo $massage;
                echo validation_errors('<div class="alert alert-error">', '</div>');
                ?>
                </h2></div>
                <?php echo form_open_multipart(base_url().'index.php/deals/editDeal/'.$id, array('class' => 'form-horizontal')) ?>
                <fieldset>
                    <input type="hidden" name="deal_id" id="deal_id" value="<?php echo $id?>">
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Deal Title *</label>
                        <div class="controls">
                          <input type="text" name="title" id="title" class="input-xlarge focused" value="<?php echo $title; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Start Date *</label>
                        <div class="controls">
                          <input type="text" name="start_date" id="date01" class="input-xlarge datepicker"  value="<?php echo $start_date; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">End Date *</label>
                        <div class="controls">
                          <input type="text" name="end_date" id="date02" class="input-xlarge datepicker"  value="<?php echo $end_date; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Description *</label>
                        <div class="controls">
                          <textarea class="cleditor" rows="5" style="width: 500px; height: 150px;" cols="100" name="description" id="description"><?php echo $description; ?></textarea>
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Change Image</label>
                        <div class="controls">
                          <img src="<?php echo base_url().$image; ?>" width="300" height="300">
                          <input type="file" name='userfile'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Deal Status</label>
                        <div class="controls">
                            <select id="selectDeal" name="selectDeal" data-rel="chosen1">
                                <?php if ($deal_status == 1) {?>
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