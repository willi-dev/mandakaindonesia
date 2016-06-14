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
					<section class="panel">
						<header class="panel-heading"><a href="<?php echo base_url();?>administrator/kategori">Kategori</a>  /  Ubah Kategori</header>
						<div class="panel-body">Di sini anda dapat mengubah kategori</div>
					</section>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-12">
					<section class="panel">
						<?php if(isset($loadCategorySpecific)){
							?>
						<header class="panel-heading">Kategori : <?php echo ucwords($loadCategorySpecific->produk_kategori);?></header>
						<div class="panel-body">
							<?php
								$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
								echo form_open('administrator/kategori_ubah_proses', $att);
							?>
								<input type="hidden" name="id_kategori" value="<?php echo $loadCategorySpecific->id;?>" />
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" for="produk_kategori">Kategori</label>
								<div class="col-sm-10">
									<input type="text" id="produk_kategori" class="form-control" name="produk_kategori" value="<?php echo $loadCategorySpecific->produk_kategori;?>"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" id="simpanperubahan" class="btn btn-info btn-lg">Simpan Perubahan</button>
								</div>
							</div>
							
							<?php
								echo form_close();
							?>
						</div>
						<?php
							}else{
								redirect('administrator/admin_kategori_ubah');
							?>
								<!--header class="panel-heading">&nbsp;</header>
								<div class="panel-body">
									<h4>Terjadi Kesalahan.. <a href="<?php echo base_url();?>administrator/kategori">kembali ke halaman sebelumnya.</a></h4>
								</div-->
							<?php
							}
							?>
					</section>
				</div>
				
			</div>
		
		</section>
	</section>
	
<?php
	$this->load->view('admin/templates/footer');
?>