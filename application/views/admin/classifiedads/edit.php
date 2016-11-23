
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-tasks"></i>
            <a href="<?php echo base_url(); ?>index.php/classifiedads">Classified Ads</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Classified Ad</h2>
            </div>
            <div class="box-content">
                <div><h2>
                <?php
                if(isset ($massage))echo $massage;
                echo validation_errors('<div class="alert alert-error">', '</div>');
                ?>
                </h2></div>
                <?php echo form_open_multipart(base_url().'index.php/classifiedads/editAd/'.$ads_id, array('class' => 'form-horizontal')) ?>
                <fieldset>
                    <input type="hidden" name="ads_id" id="ads_id" value="<?php echo $ads_id?>">
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Ad Title *</label>
                        <div class="controls">
                          <input type="text" name="title" id="title" class="input-xlarge focused" value="<?php echo $title; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">School Name *</label>
                        <div class="controls">
                          <input type="text" name="school_name" id="school_name" class="input-xlarge focused" value="<?php echo $school_name; ?>">                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="selectError">Category *</label>
                        <div class="controls">
                            <select name="selectCategory" id="selectCategory" data-rel="chosen1" onchange="getSubCat();">
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
                        <label class="control-label" for="selectError">Sub Category *</label>
                        <div class="controls">
                          <select name="selectSubCategory" id="selectSubCategory" data-rel="chosen1">
                           <option value="<?php echo $sub_cat_id; ?>"<?php echo set_select('selectSubCategory',$sub_cat_id,TRUE)?>><?php echo $sub_category; ?></option>
                          
                          </select>
                          <div id="subcat">
                          </div>
                        </div>
                      </div>
                       <input type="hidden" name="selectDis" value="6" />
                      <input type="hidden" name="selectArea" value="32" />
                      <!--<div class="control-group">
                        <label class="control-label" for="selectError">School Name *</label>
                        <div class="controls">
                          <select name="selectDis" id="selectDis" data-rel="chosen1" onchange="getArea();">
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
                        <label class="control-label" for="selectError">School Area *</label>
                        <div class="controls">
                          <select name="selectArea" id="selectArea" data-rel="chosen1">
                           <option value="<?php echo $area_id; ?>"<?php echo set_select('selectArea',$area_id,TRUE)?>><?php echo $area; ?></option>
                            
                          </select>
                          <div id="area">
                          </div>
                        </div>
                      </div>-->
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Description *</label>
                        <div class="controls">
                          <textarea class="cleditor" rows="5" style="width: 500px; height: 150px;" cols="100" name="description" id="description"><?php echo $description; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Price</label>
                        <div class="controls">
                          <input type="text" name="price" id="price" class="input-xlarge focused" value="<?php echo $price; ?>">
                        </div>
                      </div>
                     
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">ISBN Number</label>
                        <div class="controls">
                          <input type="text" name="ISBN" id="ISBN" class="input-xlarge focused" value="<?php echo $isbn; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Seller Name *</label>
                        <div class="controls">
                          <input type="text" name="customer" id="customer" class="input-xlarge focused" value="<?php echo $cus_name; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Seller Description</label>
                        <div class="controls">
                          <textarea class="cleditor" rows="5" style="width: 500px; height: 100px;" cols="100" name="address" id="address"><?php echo $address; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Phone No *</label>
                        <div class="controls">
                          <input type="text" name="phone" id="phone" class="input-xlarge focused" value="<?php echo $phone; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">E-Mail *</label>
                        <div class="controls">
                          <input type="text" name="email" id="email" class="input-xlarge focused" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="selectError">Posted By *</label>
                        <div class="controls">
                          <select name="selectType" id="selectType" data-rel="chosen1">
                           <option value="<?php echo $ad_type; ?>"<?php echo set_select('selectType',$ad_type,TRUE)?>><?php echo $ad_type; ?></option>
                           <option value="Private"<?php echo set_select('selectType','Private',FALSE)?>>Private</option>
                           <option value="Business"<?php echo set_select('selectType','Business',FALSE)?>>Business</option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="selectError">Type of ad </label>
                        <div class="controls">
                          <select name="selectCat" id="selectCat" data-rel="chosen1">
                           <option value="<?php echo $ad_cat; ?>"<?php echo set_select('selectType',$ad_cat,TRUE)?>><?php echo $ad_cat; ?></option>
                           <option value="Buy"<?php echo set_select('selectCat','Buy',FALSE)?>>Buy</option>
                           <option value="Sell"<?php echo set_select('selectCat','Sell',FALSE)?>>Sell</option>
                           <option value="Want"<?php echo set_select('selectCat','Want',FALSE)?>>Want</option>
                           <option value="Rent"<?php echo set_select('selectCat','Rent',FALSE)?>>Rent</option>
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
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Change Image 2</label>
                        <div class="controls">
                            <?php
                            if($img_2 !='no'){
                                ?>
                                <img src="<?php echo base_url().$img_2; ?>" width="200" height="200">
                                <?php
                            }
                            ?>

                          <input type="file" name='img_2' id="img_2" value="">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Chanage Image 3</label>
                        <div class="controls">
                            <?php
                            if($img_3 !='no'){
                                ?>
                                <img src="<?php echo base_url().$img_3; ?>" width="200" height="200">
                                <?php
                            }
                            ?>
                          <input type="file" name='img_3' id="img_3" value="">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Chanage Image 4</label>
                        <div class="controls">
                            <?php
                            if($img_4 !='no'){
                                ?>
                                <img src="<?php echo base_url().$img_4; ?>" width="200" height="200">
                                <?php
                            }
                            ?>

                          <input type="file" name='img_4' id="img_4" value="">
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label" for="userEmail">Show email & phone   </label>
                        <?php
                        if($email_status==1){
                            echo '<input type="checkbox" name="email_status" id="email_status" value="" checked>';
                        }else{
                            echo '<input type="checkbox" name="email_status" id="email_status" value="" >';
                        }
                        ?>

                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Ad Status</label>
                        <div class="controls">
                            <select id="selectAd" name="selectAd" data-rel="chosen1">
                                <?php if ($ad_status == 1) {?>
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

<script>
    function getSubCat(){
        var id=$('#selectCategory').val();
        // var cct = $("input[name=csrf_token_name]").val();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/classifiedsubcategory/getSubCatByCatId",
        dataType: 'html',
        data: {'id': id, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data) {
            $('#selectSubCategory').remove();
            $('#subcat').html(data);
        }
    });
}
</script>

<script>
    function getArea(){
        var id=$('#selectDis').val();
        // var cct = $("input[name=csrf_token_name]").val();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/area/getAreaByDisId",
        dataType: 'html',
        data: {'id': id, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data) {
            $('#selectArea').remove();
            $('#area').html(data);
        }
    });
}
</script>