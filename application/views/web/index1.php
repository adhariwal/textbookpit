<!DOCTYPE html>
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Takas-Classifieds . Premier online business directory and Classifieds. Find everything faster & easier. Buy & sell brand new and used items or search all of...">
    <meta name="keywords" content="...">
    <meta name="author" content="Powered by Takas-Classifieds - Developed by www.artifectx.com">
     <script src="https://use.fontawesome.com/fe8be35b3e.js"></script>
    <link href="<?php echo base_url();?>web_assest/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>web_assest/css/czsale.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>web_assest/css/czsale-responsive.css" rel="stylesheet" media="screen">

	<link href="<?php echo base_url();?>web_assest/css/sidebar-nav.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url();?>css/reset.css" rel="stylesheet" media="screen">
			<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" media="screen">

    <link href="<?php echo base_url();?>web_assest/css/A_red.css" rel="stylesheet" media="screen">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <title>TextBookPit.Com - Buy & Sell Text Books Easy and Fast! </title>

  </head>
  <body>

     <div class="container">
       <div class="row">
       <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-xs-12">
         <a href=""><img src="<?php echo base_url();?>web_assest/img/logo.png" class="w100"></a>  
     </div>
     </div>
     </div>
     
    <div class="container wrapper">
      <!-- Logo -->
    
      
      <!-- /Logo -->
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#czsale-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="czsale-navbar">
           <ul class="nav navbar-nav navbar-left">
		  <a role="button" class="btn btn-danger add-menu-btn" href="<?php echo base_url();?>index.php">Home</a>
		  <a role="button" class="btn btn-danger add-menu-btn" href="<?php echo base_url();?>index.php/classified_ads/index">Browse Books</a>
               <!--    <a role="button" class="btn btn-danger add-menu-btn" href="<?php echo base_url();?>index.php/webdetails/post">Post Ad</a>-->
		  <a role="button" class="btn btn-danger add-menu-btn" href="<?php echo base_url(); ?>index.php/webdetails/about_us">About Us</a>
		  
		  <a role="button" class="btn btn-danger add-menu-btn" href="<?php echo base_url(); ?>index.php/webdetails/contact">Contact Us</a>
          
          <a role="button" class="btn btn-danger add-menu-btn pull-right" href="<?php echo base_url();?>index.php/webdetails/post">Post Ad</a>
          
          </ul>
        </div>
      </nav>
	  
	  <br/>  <br/>  <br/>  <br/>   
	  <center> 
	  
	  <font size="5px"> Search a Huge Collection of College Textbooks and Buy them from Local Students </font> <br/>   <br/>  <br/>
 </center>

<div class="container">
<form class="" id="form"  action="<?php echo base_url() ?>index.php/classified_ads/ads/" method="get">
<div class="row">

<div class="col-sm-12 col-md-6 col-md-offset-3">

 <div class="well">



  <div class="clearfix">&nbsp;</div>

<div class="font-group">
	
</br>


        <input type="hidden" name="school_name" id="catid" value="">
         <input type="hidden" name="subcatid" id="subcatid" value="">
<input class="form-control input-lg" autocomplete="off" type="search" id="catid121" name="collage" onkeyup="showResult(this.value)" placeholder="Search with school Name">
<div class="s-result" id="livesearch"></div>
<span class="input-group-btn">
<br>
<input class="form-control input-lg" autocomplete="off" type="search" id="subcatid121" name="subcategory" onkeyup="showResult1(this.value)" placeholder="Search with Course Id">
<div class="s-result" id="livesearch1"></div>
<!-- onClick="form_submit()"-->
<input class="btn btn-block btn-primary btn-lg"  style="margin-top:20px; border-radius:0px;" onClick="submit12()" type="button" value="Search"/>

</span>
 
			
            
		</div>
 
 </div>
 
</div>

</div>

</form>
</div>






    
    <div class="container" style="display:none;">

<div class="row">

<div class="col-sm-12 col-md-6 col-md-offset-3">

 <div class="well">



<div class="font-group">
			<form class="flexsearch--form" action="<?php echo base_url() ?>index.php/classified_ads/ads/" method="get">
				 <div  class="input-group">
<!--<input class="form-control input-lg" autocomplete="off" type="search" name="s" onkeyup="showResult(this.value)" placeholder="Search with Book Name">-->
<input class="form-control input-lg" type="search" name="isbn" required placeholder="Search with ISBN #">

<span class="input-group-btn">
<button type="submit" class="btn btn-default btn-lg" style="border-left: 0px;"><i class="fa fa-search"></i></button>
<!--<input class="flexsearch--submit" type="submit" value="&#10140;"/>-->
</span>
</div>
			</form>
            <div   style=" border-radius: 25px; overflow: hidden; margin-left: 1px; width: 87%;" id="livesearch"></div>
		</div>
 
 </div>
 
</div>

</div>


</div>
    
	 
	
	
	


    <br/>   <br/>  <br/> <br/>   <br/>  <br/>
	   <div class="footer">
        <div class="well well-sm">
          <div class="pull-left">
            <ul class="nav nav-pills">
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/post"><span class="glyphicon glyphicon-plus"></span> Post Ad</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <ul class="nav nav-pills">
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/contact">Contact</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/help">Help</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/terms">Terms & Conditions</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/webdetails/privacy">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="clearfix">&nbsp;</div>
        </div>
        <div class="pull-center">
         <p class="text-muted" align="center"><small>Copyright 2016 - TextBookPit.Com | All Right Reserved</small></p>
        </div>
        <div class="pull-right">
        <p class="text-muted"><small>Powered By <a href="http://www.greatwebidea.com/" target="_blank">Great Web Idea</a></small></p>
        </div>
      </div>
    </div>
    
    <style>
	
	
	</style>
    <script>
	
	function submit12(){
		
		cate_id=document.getElementById('catid').value;
		sub_cate_id=document.getElementById('catid').value;
		
		if(cate_id!="" && sub_cate_id!=""){
			
			document.getElementById('form').submit();
			
			}else{
				
				alert('please select both the filelds');
				
				}
		
		}
	
	
	$( "#form" ).submit(function( event ) {
 if($("#yourid").val()!='' && $("#sch_value").val()!=''){
	 return;
 }
 
  event.preventDefault();
  form_submit();
});
$('#yourid').change(function() {
	if($( "#yourid option:selected" ).text()!='Select Category'){
	$('#cat_value').val($( "#yourid option:selected" ).text());
		$("#category_name").html('');
	}else{
	$('#cat_value').val('');
	$("#category_name").html('please select Category');	
		}
});

$('#yourid2').change(function() {
	if($( "#yourid2 option:selected" ).text()!='Select School'){
	$('#sch_value').val($( "#yourid2 option:selected" ).text());
	$("#school_name").html('');
	}else{
		$("#school_name").html('please select School');
	$('#sch_value').val('');
			
		}
});


function form_submit(){
	if($("#yourid").val()!='' && $("#sch_value").val()!=''){
		$("#form").submit();
		}else{
			
			if($("#yourid").val()==''){
				$("#category_name").html('please select Category');
				$("#yourid").focus();
				}else{
					$("#category_name").html('');
					}
				
				if($("#sch_value").val()==''){
				$("#school_name").html('please select School');
				$("#sch_value").focus();
				}else{
					$("#school_name").html('');
					}
					
			} 
	}


</script>
     <script >



	    
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
  xmlhttp.open("GET","index.php/classified_ads/search_module/?s="+str,true);
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
  xmlhttp.open("GET","index.php/classified_ads/search_module1/?s="+str,true);
  xmlhttp.send();
  
  
  
  
  
  
}

function put_data_in(val,id){
	document.getElementById('catid').value=id;
	document.getElementById('catid121').value=val;
	document.getElementById("livesearch").innerHTML='';
	}
	
	function put_data_in1(val,id){
	document.getElementById('subcatid').value=id;
		document.getElementById('subcatid121').value=val;
		document.getElementById("livesearch1").innerHTML='';
	}
</script>
	        <script src="js/index.js"></script>