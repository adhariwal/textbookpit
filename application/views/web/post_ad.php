

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
function showResult2(str) {
  if (str.length==0) { 
    document.getElementById("livesearch2").innerHTML="";
    document.getElementById("livesearch2").style.border="0px";
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
      document.getElementById("livesearch2").innerHTML=this.responseText;
	  
      document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","../../index.php/classified_ads/search_module2/?s="+str,true);
  xmlhttp.send();
 
}

function put_data_in2(val){
	
	document.getElementById('title').value=val;
	
	document.getElementById("livesearch2").innerHTML='';
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
			
			<script src='https://www.google.com/recaptcha/api.js'></script>
              <div class="panel-heading">
                <h3 class="panel-title">Classified sections</h3>
              </div>
              <div class="panel-body">
              <div class="form-group">
                  <label for="userName">Book Name *</label>
                  <input type="text" class="form-control" name="title" onkeyup="showResult2(this.value)" id="title" value="<?php if(isset($massage))echo set_value('');else echo set_value('title'); ?>" placeholder="Book Name" autocomplete="off" required="required">
                  <div class="s-result" id="livesearch2"></div>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>
                 <div class="form-group">
                  <label for="userName">School Name *</label>
                <input type="hidden" name="school_name" id="catid" value="" required="required">
                <input type="hidden" value="" name="selectCategory" id="selectCategory" />
                <input type="hidden" value="" name="selectSubCategory" id="subcatid" />
                <input class="form-control " autocomplete="off" type="search" id="catid121" name="collage" onkeyup="showResult(this.value)" placeholder="Search with school Name">
<div class="s-result" id="livesearch"></div>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>
                  <!--<div class="form-group">
                  <label for="userName">ISBN Number *</label>
                  <input type="text" class="form-control" name="isbn" id="title" value="<?php if(isset($massage))echo set_value('');else echo set_value('isbn'); ?>" required>
                  <?php //echo form_error('title','<div class="alert alert-error">', '</div>'); ?>
                </div>-->
               
                <div class="form-group">
                  <label for="section1">Course By Course Id</label>
                  <input class="form-control " autocomplete="off" type="search" id="subcatid121" name="subcategory" onkeyup="showResult1(this.value)" placeholder="Search with Course Id">
<div class="s-result" id="livesearch1"></div>
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
                  <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($massage))echo set_value('');else echo set_value('phone'); ?>" required>
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
			
			
				 <div class="g-recaptcha" data-sitekey="6LdoZRUUAAAAADiZ9yxg66OyZbukSBAZuy3_x5M1"></div>

            <div class="well">
              <p>By posting this ad, you agree to the Terms & Conditions of this site.</p>
              <button type="submit" class="btn btn-danger" id="save">Post Ad</button>
              <button type="reset" class="btn">Reset</button>
            </div>
          </form>
    </div>
  </div>
</div>


