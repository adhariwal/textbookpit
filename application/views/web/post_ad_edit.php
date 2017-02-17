

<div class="col-lg-12">
  <ol class="breadcrumb">
  </ol>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script>
 function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
	  
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","../../index.php/classified_ads/search_module/?s="+str,true);
  xmlhttp.send();
  
  
  
  
  
  
}

function showResult1(str) {
  if (str.length==0) { 
    document.getElementById("livesearch1").innerHTML="";
    document.getElementById("livesearch1").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch1").innerHTML=this.responseText;
	  
      document.getElementById("livesearch1").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","../../index.php/classified_ads/search_module1/?s="+str,true);
  xmlhttp.send();
  
  
  
  
  
  
}
	function put_data_in1(val,id,ca){
	document.getElementById('subcatid').value=id;
		document.getElementById('subcatid121').value=val;
		document.getElementById('selectCategory').value=ca;
		document.getElementById("livesearch1").innerHTML='';
	}
function put_data_in(val,id){
	document.getElementById('catid').value=id;
	document.getElementById('catid121').value=val;
	
	document.getElementById("livesearch").innerHTML='';
	}
 </script>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet porta eros, eget facilisis arcu. Duis condimentum fermentum enim, ac rutrum erat venenatis vel. Morbi pharetra viverra faucibus.</p>-->
     <h2>Welcome <?php echo $cus_name; ?> </h2>
          <hr>
          <div><h4>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?><a href="<?php echo  base_url() ;?>index.php/editpost/logout">Logout</a>
                    </h4></div>
         
        <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Your personal details</h3>
                
              </div>
            
              <div class="panel-body" style="margin-left: 20px; margin-right: 20px;">
                
                <?php echo form_open_multipart(base_url().'index.php/editpost/editAd/'.$ads_id, array('class' => 'form-horizontal')) ?>
                <fieldset>
                    <input type="hidden" name="ads_id" id="ads_id" value="<?php echo $ads_id?>">
                    <div class="form-group">
                        <label class="control-label" for="focusedInput">Ad Title *</label>
                        <div class="controls">
                          <input type="text" name="title" required="required" id="title" class="form-control" value="<?php echo $title; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">School Name *</label>
                        <div class="controls">
                           
                          
                           <select name="school_name" required="required" class="form-control" id="school_name" >
                              
                                <?php
                                if($districts){
                                foreach ($districts as $district) {
                                ?>
                                <option value="<?php echo $district->ID; ?>" <?php if($school_name==$district->ID){ ?>  selected="selected" <?php }?>><?php echo $district->COLLEGE; ?></option>
                                <?php }} ?>
                            </select>         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="selectError">Course ID*</label>
                        <div class="controls">
                            <select name="selectCategory" required="required" id="selectCategory" class="form-control" data-rel="chosen1" onchange="getSubCat();">
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
                      <div class="form-group">
                        <label class="control-label" for="selectError">Course *</label>
                        <div class="controls">
                          <select name="selectSubCategory" required="required" class="form-control" id="selectSubCategory" data-rel="chosen1">
                           <option value="<?php echo $sub_cat_id; ?>"<?php echo set_select('selectSubCategory',$sub_cat_id,TRUE)?>><?php echo $sub_category; ?></option>
                          
                          </select>
                          
                        </div>
                      </div>
                       <input type="hidden" name="selectDis" value="6" />
                      <input type="hidden" name="selectArea" value="32" />
                      <!--<div class="form-group">
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
                      <div class="form-group">
                        <label class="control-label" for="selectError">School Area *</label>
                        <div class="controls">
                          <select name="selectArea" id="selectArea" data-rel="chosen1">
                           <option value="<?php echo $area_id; ?>"<?php echo set_select('selectArea',$area_id,TRUE)?>><?php echo $area; ?></option>
                            
                          </select>
                          <div id="area">
                          </div>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">Description *</label>
                        <div class="controls">
                          <textarea class="cleditor form-control" required="required" rows="5" style="width: 500px; height: 150px;" cols="100" name="description" id="description"><?php echo $description; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">Price</label>
                        <div class="controls">
                          <input type="text" name="price"  id="price" class="form-control" value="<?php echo $price; ?>">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">ISBN Number</label>
                        <div class="controls">
                          <input type="text" name="ISBN" id="ISBN" class="form-control" value="<?php echo $isbn; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">Seller Name *</label>
                        <div class="controls">
                          <input type="text" name="customer" required="required" id="customer" class="form-control" value="<?php echo $cus_name; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">Seller Description</label>
                        <div class="controls">
                          <textarea class="cleditor form-control" required="required" rows="5" style="width: 500px; height: 100px;" cols="100" name="address" id="address"><?php echo $address; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">Phone No *</label>
                        <div class="controls">
                          <input type="text" name="phone" id="phone" required="required" class="form-control" value="<?php echo $phone; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="focusedInput">E-Mail * Not Editable</label>
                        <div class="controls">
                          <input type="text" name="email" id="email" readonly="readonly" class="form-control" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="selectError">Posted By *</label>
                        <div class="controls">
                          <select name="selectType" class="form-control" required="required" id="selectType" data-rel="chosen1">
                           <option value="<?php echo $ad_type; ?>"<?php echo set_select('selectType',$ad_type,TRUE)?>><?php echo $ad_type; ?></option>
                           <option value="Private"<?php echo set_select('selectType','Private',FALSE)?>>Private</option>
                           <option value="Business"<?php echo set_select('selectType','Business',FALSE)?>>Business</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="selectError">Type of ad </label>
                        <div class="controls">
                          <select name="selectCat" class="form-control" required="required" id="selectCat" data-rel="chosen1">
                           <option value="<?php echo $ad_cat; ?>"<?php echo set_select('selectType',$ad_cat,TRUE)?>><?php echo $ad_cat; ?></option>
                           <option value="Buy"<?php echo set_select('selectCat','Buy',FALSE)?>>Buy</option>
                           <option value="Sell"<?php echo set_select('selectCat','Sell',FALSE)?>>Sell</option>
                           <option value="Want"<?php echo set_select('selectCat','Want',FALSE)?>>Want</option>
                           <option value="Rent"<?php echo set_select('selectCat','Rent',FALSE)?>>Rent</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
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
                      <div class="form-group">
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
                      <div class="form-group">
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
                      <div class="form-group">
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
                    <div class="form-group">
                        <label class="control-label" for="userEmail">Show email & phone   </label>
                        <?php
                        if($email_status==1){
                            echo '<input type="checkbox" name="email_status" id="email_status" value="" checked>';
                        }else{
                            echo '<input type="checkbox" name="email_status" id="email_status" value="" >';
                        }
                        ?>

                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="focusedInput">Ad Status</label>
                        <div class="controls">
                            <select id="selectAd"  class="form-control" name="selectAd" data-rel="chosen1">
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
                        
                    </div>
                </fieldset>
                </form>
            </div>
            </div>

            
       
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
            $('#selectSubCategory').html(data);
        }
    });
}
</script>