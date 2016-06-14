<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
			 More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Gumby - A Flexible, Responsive CSS Framework - Powered by SASS</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="<?php echo base_url();?>humans.txt">

	<link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/favicon.png" type="image/x-icon" />

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
			 However, there is a blank style.css in the css directory should you prefer -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/gumby.css">
	<!-- <link rel="stylesheet" href="css/style.css"> -->

	<script src="<?php echo base_url();?>assets/admin/js/libs/modernizr-2.6.2.min.js"></script>
</head>

<style>
	.btn,.drawer { margin-bottom:10px; }
	.drawer { text-align: center; }
	h1.lead { border-bottom: 1px dotted #ccc; margin-bottom: 30px; }
	h4.lead { margin-bottom:10px; }
	#icon_map ul li { font-size: 16px; }
	.smallify { font-size: 13px; }
	.modal h2, .modal .btn { margin: 5% 0 20px; }
	
	
</style>

<body>
	<div class="navbar" gumby-fixed="top" id="nav1" >
		<div class="row">
			<a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
			<h1 class="four columns logo centered">
				<a href="#">
					<img src="<?php echo base_url();?>assets/admin/img/gumby_mainlogo.png" gumby-retina />
				</a>
			</h1>
			
		</div>
	</div>
	<div class="white-space" style="height:60px;"></div>
	
	