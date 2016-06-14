<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/img/favicon.png">

    <title>Mandaka Indonesia | Administrator Page <?php //echo $title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/assets/dropzone/css/dropzone.css">
	<link href="<?php echo base_url();?>assets/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/gallery.css" />
    <link href="<?php echo base_url();?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/style-responsive.css" rel="stylesheet" />
	
	
	<?php 
		$produk = $this->uri->segment(2);
		if($produk == "produk"){
		?>
		<link href="<?php echo base_url();?>assets/admin/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/admin/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
	<?php
		}else{
			echo "";
		}
	?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>assets/admin/js/html5shiv.js"></script>
      <script src="<?php echo base_url();?>assets/admin/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" >