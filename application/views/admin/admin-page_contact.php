<?php 
	$this->load->view( 'admin/templates_LTE/header.php' );
	$this->load->view( 'admin/templates_LTE/header_menu.php' );
	$this->load->view( 'admin/templates_LTE/sidebar_menu.php' );
?>

<!-- content-wrapper -->
	<div class="content-wrapper">
		<?php $this->load->view( 'admin/templates_LTE/header_content.php' );?>

		<!-- Main Content -->
		<section class="content">
			<div class="row">
					
				

			</div>
		</section>

	</div>
	<!-- end of content-wrapper -->

<?php 
	$this->load->view( 'admin/templates_LTE/footer_content.php' );
	$this->load->view( 'admin/templates_LTE/footer.php' );