<?php
/* 
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'class' => 'text input'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' =>'password input',
	'placeholder' => 'Password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'type' => 'checkbox',
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
); */
?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/admin/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

    <form class="form-signin" action="<?php $this->uri->uri_string();?>" method="POST">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" name="login" class="form-control" placeholder="Username" autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" name="remember" value="remember-me"> Remember me
                <span class="pull-right">
                    <!--a data-toggle="modal" href="#myModal"> Forgot Password?</a-->

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>
	</form>
	
	
          <!-- Modal -->
          <!--div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
  </body>
</html>
