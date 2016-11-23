<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php if(isset ($page_title))echo $page_title;?>Admin Dashboard</title>
	<meta name="description" content=">Admin Area">
	<meta name="author" content="Admin Area">
	<meta name="keyword" content=">Admin Area">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
    <link id="bootstrap-style" href="<?php echo base_url();?>admin_assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>admin_assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url();?>admin_assets/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url();?>admin_assets/css/style-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>admin_assets/css/css.css" rel="stylesheet" type="text/css">
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
    <script>
window.onload = function()
{
    $("#content").css("min-height", "1100px");
}
</script>
</head>
<body>