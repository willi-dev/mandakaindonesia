<?php 
	$this->load->view( 'admin/templates_LTE/header.php' );
	$this->load->view( 'admin/templates_LTE/header_menu.php' );
	$this->load->view( 'admin/templates_LTE/sidebar_menu.php' );
?>
	<!-- content-wrapper -->
	<div class="content-wrapper">
		<?php $this->load->view( 'admin/templates_LTE/header_content.php' ); ?>
	
	</div>
	<!-- end of content-wrapper -->


	<div class="row">
		<div class="col-lg-12">
		<?php
		$msgsuccess = $this->session->flashdata('messagesuccess');
		echo $msgsuccess == '' ? '' : '<div class="alert alert-success alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgsuccess . '!</strong></div>';
		
		$msgerror = $this->session->flashdata('messageerror');
		echo $msgerror == '' ? '' : '<div class="alert alert-success alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgerror . '!</strong></div>';
		?>
		<!-- <section class="panel">
			<header class="panel-heading">Atur Ulang Kata Sandi</header>
			<div class="panel-body">Di sini anda dapat mengatur ulang kata sandi anda</div>
		</section> -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">Password: min. 7 Characters</header>
			<div class="panel-body">
				<?php
					$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
					echo form_open('administrator/update_password', $att);
				?>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label" for="name">Username</label>
						<div class="col-sm-10">
							<input type="text" id="name" class="form-control" name="user" value="<?php echo $username;?>" disabled />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label" for="oldpass">Old Password</label>
						<div class="col-sm-10">
							<input id="oldpass" class="form-control" type="password" name="oldpassword" placeholder="Old Password" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label" for="retype">(re-type) Old Password</label>
						<div class="col-sm-10">
							<input id="retype" class="form-control" type="password" name="retypeoldpassword" placeholder="(re-type) Old Password" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label" for="newpass">New Password</label>
						<div class="col-sm-10">
							<input id="newpass" class="form-control" type="password" name="newpassword" placeholder="New Password" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" id="savepass" class="btn btn-warning btn-lg" >Save</button>
						</div>
					</div>
			
				<?php echo form_close();?>
			</div>	
		</section>
		</div>
	</div>
<?php 

	$this->load->view( 'admin/templates_LTE/footer_content.php' );
	$this->load->view( 'admin/templates_LTE/footer.php' );