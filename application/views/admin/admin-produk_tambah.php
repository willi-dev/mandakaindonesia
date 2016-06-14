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
					$msgerror = $this->session->flashdata('messageerror');
					echo $msgerror == '' ? '' : '<div class="alert alert-success alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgerror . '!</strong></div>';
					?>
				</div>
			</div>
			<div class="row">
			
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading"><h2>Tambahkan Produk</h2></header>
						<div class="panel-body">
							<div class="stepy-tab">
								<ul id="default-titles" class="stepy-titles clearfix">
									<li id="default-title-0" class="current-step">
									<div>Data Produk</div>
									<span> </span>
									</li>
									<li id="default-title-1" class="">
									<div>Unggah Foto</div>
									<span></span>
									</li>
								</ul>
							</div>
							<hr />
							<?php
								$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
								echo form_open('administrator/produk_tambah_proses', $att);
							?>
							<div class="form-group">
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="produk_nama">Nama Produk</label>
									<div class="col-sm-10">
										<input type="text" id="produk_nama" class="form-control" name="produk_nama" />
									</div>
								</div>
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="harga">Harga</label>
									<div class="col-sm-10">
										<div class="input-group m-bot15">
											<span class="input-group-addon">Rp.</span>
											<input type="text" id="harga" class="form-control" name="harga" />
										</div>
									</div>
									
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="hargasale">Harga Sale</label>
									<div class="col-sm-10">
										<div class="input-group m-bot15">
											<span class="input-group-addon">Rp.</span>
											<input type="text" id="hargasale" class="form-control" name="hargasale" />
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="statusproduk">Status Produk</label>
									<div class="col-sm-10">
										<select name="produk_status" class="form-control m-bot15">
										<?php
											if(isset($loadStatus)){
												foreach($loadStatus as $ls){
										?>
													<option value="<?php echo $ls->id;?>"><?php echo $ls->produk_status;?></option>
										<?php
												}
											}else{
										?>
												<option value=""> - terjadi kesalahan - </option>
										<?php
											}
										?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="produkkategori">Kategori Produk</label>
									<div class="col-sm-10">
										<select name="produk_kategori" class="form-control m-bot15">
										<?php
											if(isset($loadCategory)){
												foreach($loadCategory as $lc){
										?>
												<option value="<?php echo $lc->id;?>"><?php echo $lc->produk_kategori;?></option>
										<?php
												}
											}else{
										?>
												<option value="">- kategori belum ada -</option>
										<?php
											}
										?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" for="produk_deskripsi">Deskripsi Produk</label>
								<div class="col-sm-10">
									<textarea class="form-control ckeditor" rows="6" name="produk_deskripsi" style="visibility: hidden; display: none;"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" id="tambahkankategori" class="btn btn-info btn-lg">Tambahkan Produk</button>
									<a href="<?php echo base_url();?>administrator/produk">
										<button type="button" id="batal" class="btn btn-primary btn-lg">Batalkan</button>
									</a>
								</div>
							</div>
							
							<?php
								echo form_close();
							?>
						</div>
					</section>
				</div>
				
				
			</div>
		
		</section>
	</section>
	
	<script src="<?php echo base_url();?>assets/admin/assets/ckeditor/ckeditor.js"></script>
	
	
<?php
	$this->load->view('admin/templates/footer');
?>