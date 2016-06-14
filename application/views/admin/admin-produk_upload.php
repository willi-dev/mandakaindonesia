<?php
	$this->load->view('admin/templates/header'); // header html
	$this->load->view('admin/templates/header_menu'); // header menu
	$this->load->view('admin/templates/sidebar'); // sidebar menu
?>
	<section id="main-content">
		<section class="wrapper">
			
			<div class="row">
				<div class="col-lg-12">
					<?php
					$msgsuccess = $this->session->flashdata('messagesuccess');
					echo $msgsuccess == '' ? '' : '<div class="alert alert-success alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgsuccess . '!</strong></div>';
					
					$msgerror = $this->session->flashdata('messageerror');
					echo $msgerror == '' ? '' : '<div class="alert alert-success alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgerror . '!</strong></div>';
					?>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading"><h2>Unggah Foto</h2>
						</header>
						
						<div class="panel-body">
							<div class="stepy-tab">
								<ul id="default-titles" class="stepy-titles clearfix">
									<li id="default-title-0" class="">
										<div>Data Produk</div>
										<span> </span>
									</li>
									<li id="default-title-1" class="current-step">
										<div>Unggah Foto</div>
										<span></span>
									</li>
								</ul>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<?php
									$att = array( 'class' => 'dropzone', 'enctype' =>'multipart/form-data');
									echo form_open('administrator/produk_tambah_foto_proses', $att);
								?>	
										<input type="hidden" name="id_produk" value="<?php echo $last ;?>" />
								<?php
									echo form_close();
								?>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<a href="<?php echo base_url();?>administrator/produk">
										<button class="btn btn-default btn-lg btn-success" type="button">Selesai</button>
									</a>
									
								</div>
							</div>
							
						</div>	
					</section>
				</div>
				
			</div>
		
		</section>
	</section>
	
<?php
	$this->load->view('admin/templates/footer');
?>