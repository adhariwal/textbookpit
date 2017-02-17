<!DOCTYPE html>
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Takas-Classifieds . Premier online business directory and Classifieds. Find everything faster & easier. Buy & sell brand new and used items or search all of...">
    <meta name="keywords" content="...">
   
    <meta name="author" content="Powered by Takas-Classifieds - Developed by www.Textbookpit.com">
    <script src="https://use.fontawesome.com/fe8be35b3e.js"></script>
    <link href="<?php echo base_url();?>web_assest/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>web_assest/css/czsale.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>web_assest/css/czsale-responsive.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>web_assest/css/sidebar-nav.css" rel="stylesheet" media="screen">

    <link href="<?php echo base_url();?>web_assest/css/A_red.css" rel="stylesheet" media="screen">

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
     
      <div class="row">
                <div class="col-lg-12" >
                <div class="col-lg-2" > 

				<!--- Ugly Ass Icons Disabled  <a href="https://www.facebook.com/artifectx" target="_blank"><img src="<?php echo base_url();?>images/Facebook.png" width="65" height="65"></a>&nbsp;&nbsp;
          <a href="https://twitter.com/artifectx" target="_blank"><img src="<?php echo base_url();?>images/twitter-red.png" width="50" height="50"></a> ---------> 

		  </div>
                <div class="col-lg-6" >
                <div id="slide-show">
                <ul id="slide-images">
                <?php
                  if ($baners != null) {
                      foreach ($baners as $baners) {
                          $img[]=base_url().$baners->image;
                          $url[]=$baners->url
                          ?>
                          <a href="<?php echo "http://".$baners->url;?>" target="_blank"><img id="adBanner"></a>
                <?php }
            //print_r($img) ;die();
                  }
                ?>
                </ul>
                </div>
                </div>
                </div>
              </div>
       
      <!-- /Static navbar -->
      <div class="row content">
      <style>
        #slide-images{
            position:relative;
            display:block;
            margin:0px;
            padding:0px;
            width:728px;
            height:90px;
            overflow:hidden;
        }

        #slide-images li{
            position:absolute;
            display:block;
            list-style-type:none;
            margin:0px;
            padding:0px;
            background-color:#FFFFFF;
        }

        #slide-images li img{
            display:block;
            background-color:#FFFFFF;
        }
    </style>

    <script>

        window.onload = initBannerLink;

var theAd = 0;
var adURL = new Array();
adURL=<?php echo json_encode($url); ?>;
var adImages=new Array();
adImages=<?php echo json_encode($img); ?>;
//alert(adImages);
function initBannerLink() {
	if (document.getElementById("adBanner").parentNode.tagName == "A") {
		document.getElementById("adBanner").parentNode.onclick = newLocation;
	}

	rotate();
}

function newLocation() {
	document.location.href = "http://" + adURL[theAd];
	return false;
}

function rotate() {
	theAd++;
	if (theAd == adImages.length) {
		theAd = 0;
	}
	document.getElementById("adBanner").src = adImages[theAd];

	setTimeout(rotate, 6 * 1000);
}

    </script>