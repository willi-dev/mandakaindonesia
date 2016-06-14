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
						<header class="panel-heading"><h2>Ubah Produk</h2></header>
						<div class="panel-body">
						<?php
						if(isset($loadProductSpecific)){
						?>
							<hr />
							<?php
								$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
								echo form_open('administrator/produk_ubah_proses', $att);
							?>
							
							<input type="hidden" name="idproduk" value="<?php echo $loadProductSpecific->id ;?>"/>
							
							<div class="form-group">
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="produk_nama">Nama Produk</label>
									<div class="col-sm-10">
										<input type="text" id="produk_nama" class="form-control" name="produk_nama" value="<?php echo $loadProductSpecific->produk_nama ;?>" />
									</div>
								</div>
								<div class="col-lg-6">
									<label class="col-sm-2 col-sm-2 control-label" for="harga">Harga</label>
									<div class="col-sm-10">
										<div class="input-group m-bot15">
											<span class="input-group-addon">Rp.</span>
											<input type="text" id="harga" class="form-control" name="harga"  value="<?php echo $loadProductSpecific->harga ;?>"/>
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
											<input type="text" id="hargasale" class="form-control" name="hargasale"  value="<?php echo $loadProductSpecific->harga_sale ;?>"/>
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
													if($ls->id == $loadProductSpecific->id_produk_status){
														$selectstatus = "SELECTED";
													}else{
														$selectstatus = "";
													}
											?>
													<option <?php echo $selectstatus;?> value="<?php echo $ls->id;?>"><?php echo $ls->produk_status;?></option>
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
												if($lc->id == $loadProductSpecific->id_produk_kategori){
													$selectcategory = "SELECTED";
												}else{
													$selectcategory = "";
												}
										?>
													<option <?php echo $selectcategory;?> value="<?php echo $lc->id;?>"><?php echo $lc->produk_kategori;?></option>
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
									<textarea class="form-control ckeditor" rows="6" name="produk_deskripsi" style="visibility: hidden; display: none;"><?php echo $loadProductSpecific->produk_deskripsi ;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" id="ubahproduk" class="btn btn-info btn-lg">Simpan Perubahan Produk</button>
									<a href="<?php echo base_url();?>administrator/produk">
										<button type="button" id="batal" class="btn btn-primary btn-lg">Batalkan</button>
									</a>
								</div>
							</div>
							
						<?php
								echo form_close();
						
						}else{
						?>	
								<h2>Terjadi Kesalahan. <a href="<?php echo base_url();?>administrator/produk">Kembali</a></h2>
						<?php
						}						
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