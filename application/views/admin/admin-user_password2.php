<?php 
	$this->load->view( 'admin/templates_LTE/header.php' );
	$this->load->view( 'admin/templates_LTE/header_menu.php' );
	$this->load->view( 'admin/templates_LTE/sidebar_menu.php' );
?>
	<!-- content-wrapper -->
	<div class="content-wrapper">
		<?php $this->load->view( 'admin/templates_LTE/header_content.php' ); ?>
		
		<!-- Main content -->
        <section class="content">
			
			<div class="row">
				
				<div class="col-md-12">
					<?php
						$att = array('id' => '', 'class' => 'form-horizontal', 'name' => 'formsetting', 'method'=>'POST' );
						echo form_open('administrator/update_password', $att);
					?>
					<div class="box box-info">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Password</h3> min. 7 Characters
		                    <div class="box-tools pull-right">
		                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		                      <i class="fa fa-minus"></i></button>
		                    </div>
		                </div>
		                <div class="box-body">
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
						</div>
						<div class="box-footer">
							<button type="submit" id="savepass" class="btn btn-warning pull-right" >Save</button>
		                </div>
		                <!-- /.box-footer-->
		            </div>
					<?php echo form_close();?>
				</div>

			</div>
           
            <!-- /.box -->

        </section>
        <!-- /.content --> 

	</div>
	<!-- end of content-wrapper -->


<?php 

	$this->load->view( 'admin/templates_LTE/footer_content.php' );
	$this->load->view( 'admin/templates_LTE/footer.php' );