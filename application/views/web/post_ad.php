

<div class="col-lg-12">
  <ol class="breadcrumb">
  </ol>
 
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet porta eros, eget facilisis arcu. Duis condimentum fermentum enim, ac rutrum erat venenatis vel. Morbi pharetra viverra faucibus.</p>-->
     <h2>Add Classified</h2>
          <hr>
          <div><h4>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h4></div>
          <?php echo form_open_multipart('webdetails/postAd')?>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Classified sections</h3>
              </div>
              <div class="panel-body">
              <div class="form-group">
                  <label for="userName">Book Name *</label>
                  <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($massage))echo set_value('');else echo set_value('title'); ?>" required>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>
                 <div class="form-group">
                  <label for="userName">School Name *</label>
                  <input type="text" class="form-control" name="school_name" id="title" value="<?php if(isset($massage))echo set_value('');else echo set_value('school_name'); ?>" required>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>
                  <div class="form-group">
                  <label for="userName">ISBN Number *</label>
                  <input type="text" class="form-control" name="isbn" id="title" value="<?php if(isset($massage))echo set_value('');else echo set_value('isbn'); ?>" required>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label for="section1">Category *</label>
                  <select name="selectCategory" id="selectCategory" class="form-control" onchange="getSubCat();" required>
                      <option value="">Select One</option>
                      <?php
                      if($categories){
                      foreach ($categories as $cat) {
                      ?>
                      <option value="<?php echo $cat->cat_id; ?>"<?php echo set_select('selectCategory',$cat->cat_id,FALSE)?>><?php echo $cat->category; ?></option>
                      <?php }} ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="section1">Sub Category *</label>
                  <div id="subcat">
                        </div>
                </div>
              <!-- <div class="form-group">
                  <label for="section1">School Name *</label>
                  <select name="selectDis" id="selectDis" class="form-control"  onchange="getArea();" >
                      <option value="">Select One</option>
                      <?php
                      if($districts){
                      foreach ($districts as $dis) {
                      ?>
                      <option value="<?php echo $dis->district_id; ?>"<?php echo set_select('selectDis',$dis->district_id,FALSE)?>><?php echo $dis->district; ?></option>
                      <?php }} ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="section1">School Area *</label>
                  <div id="area">
                        </div>
                </div>
                <script type="text/javascript" src="<?php echo base_url();?>web_assest/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>-->
                 <div class="form-group">
                  <label for="text">Seller's comments </label>
                  <textarea class="form-control" rows="8" name="description" id="description"><?php if(isset($massage))echo set_value('');else echo set_value('description'); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="userName">Price </label>
                  <input type="text" class="form-control" name="price" id="price" value="<?php if(isset($massage))echo set_value('');else echo set_value('price'); ?>">
                </div>
                <!--<div class="form-group">
                    <label for="section1">Posted By *</label>
                    <select name="selectType" id="selectType" class="form-control" data-rel="chosen">
                    <option value="">Select One</option>
                    <option value="Private"<?php echo set_select('selectType','Private',FALSE)?>>Private</option>
                    <option value="Business"<?php echo set_select('selectType','Business',FALSE)?>>Business</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="section1">Type of ad *</label>
                    <select name="selectCat" id="selectCat" class="form-control" data-rel="chosen">
                           <option value="">Select One</option>
                           <option value="Buy"<?php echo set_select('selectCat','Buy',FALSE)?>>Buy</option>
                           <option value="Sell"<?php echo set_select('selectCat','Sell',FALSE)?>>Sell</option>
                           <option value="Want"<?php echo set_select('selectCat','Want',FALSE)?>>Want</option>
                           <option value="Rent"<?php echo set_select('selectCat','Rent',FALSE)?>>Rent</option>
                          </select>
               </div>-->
              </div>
            </div>

            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Classified images</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label>Select images</label>
                  <input type="file" name='img_1' id="img_1" value="">
                  <input type="file" name='img_2' id="img_2" value="">
                  <input type="file" name='img_3' id="img_3" value="">
                  <input type="file" name='img_4' id="img_4" value="">
                </div>
                <!--<div class="form-group">
                  <label for="video">Video (YouTube embed code)</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="video">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
                  </div>
                </div>-->
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Your personal details</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="userName">Your name *</label>
                  <input type="text" class="form-control" name="customer" id="customer" value="<?php if(isset($massage))echo set_value('');else echo set_value('customer'); ?>" required>
                </div>
                <!--<div class="form-group">
                  <label for="text">Address </label>
                  <textarea id="text" class="form-control" rows="8" name="address" id="address" ><?php if(isset($massage))echo set_value('');else echo set_value('address'); ?></textarea>
                </div>-->
                <div class="form-group">
                  <label for="userPhone">Phone *</label>
                  <input type="number" class="form-control" name="phone" id="phone" value="<?php if(isset($massage))echo set_value('');else echo set_value('phone'); ?>" required>
                </div>
                <div class="form-group">
                  <label for="userEmail">E-mail *</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($massage))echo set_value('');else echo set_value('email'); ?>" required>
                </div>

                  <div class="form-group">
                      <label for="userEmail">Show email & phone  </label>
                      <input type="checkbox" name="email_status" id="email_status" value="">

                  </div>
              </div>
            </div>
            <div class="well">
              <p>By posting this ad, you agree to the Terms & Conditions of this site.</p>
              <button type="submit" class="btn btn-danger" id="save">Post Ad</button>
              <button type="reset" class="btn">Reset</button>
            </div>
          </form>
    </div>
  </div>
</div>

<script>
    function getSubCat(){
        var id=$('#selectCategory').val();
        // var cct = $("input[name=csrf_token_name]").val();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/areafront/getSubCatByCatId_front",
        dataType: 'html',
        data: {'id': id, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        //data: {'id': id},
        success: function(data) {
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
        url: "<?php echo base_url(); ?>index.php/areafront/getAreaByDisId_front",
        dataType: 'html',
        data: {'id': id, <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data) {
            $('#area').html(data);
        }
    });
}
</script>
