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
						<header class="panel-heading"><h2><a href="<?php echo base_url();?>administrator/produk">Produk</a> / Detail Produk</h2></header>
						<?php
								if(isset($loadProductSpecific)){
						?>
								<div class="panel-body">
									<div class="col-sm-6">
										<table class="table table-striped">
											<tr>
												<td style="font-weight: bold;" >Produk</td>
												<td><?php echo $loadProductSpecific->produk_nama;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" >Deskripsi</td>
												<td><?php echo $loadProductSpecific->produk_deskripsi;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" >Harga</td>
												<td>Rp. <?php echo $loadProductSpecific->harga;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" >Harga Sale</td>
												<td>Rp. <?php echo $loadProductSpecific->harga_sale;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" >Status</td>
												<td><?php echo $loadProductSpecific->produk_status;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" >Kategori</td>
												<td><?php echo $loadProductSpecific->produk_kategori;?></td>
											</tr>
											<tr>
												<td style="font-weight: bold;" ></td>
												<td>
													<a data-toggle="modal" href="#unggahfoto<?php echo $loadProductSpecific->id;?>">
														<button class="btn btn-default " type="button">
														<i class="icon-cloud-upload"></i>
														Unggah Foto
														</button>
													</a>
												</td>
											</tr>
										</table>
									</div>
										<div aria-hidden="true" aria-labelledby="unggahfoto<?php echo $loadProductSpecific->id;?>Label" role="dialog" tabindex="-1" id="unggahfoto<?php echo $loadProductSpecific->id;?>" class="modal fade">
										    <div class="modal-dialog">
												<div class="modal-content">
												    <div class="modal-header">
													  <!--button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button-->
													  <h4 class="modal-title">Unggah Foto : <?php echo $loadProductSpecific->produk_nama;?></h4>
												    </div>
												    <div class="modal-body">
														<div class="form-group">
															<?php
																$att = array( 'class' => 'dropzone', 'enctype' =>'multipart/form-data');
																echo form_open('administrator/produk_tambah_foto_proses', $att);
															?>	
																	<input type="hidden" name="id_produk" value="<?php echo $loadProductSpecific->id;?>" />
															<?php
																echo form_close();
															?>
															
																
														</div>
														<div class="form-group">
															
														</div>
													</div>
													<div class="modal-footer">
														<a href="<?php echo base_url();?>administrator/produk_detail/<?php echo $loadProductSpecific->id;?>">
															<button class="btn btn-info " type="button">
																<i class="icon-ok"></i>Selesai
															</button>
														</a>
														<button data-dismiss="modal" type="button" id="simpanperubahan" class="btn btn-default"><i class="icon-mail-reply-all"></i>Batal</button>
													</div>
												</div><!-- end modal content -->
											</div>
										 </div>
								
								</div>	
								<hr />
								<div class="panel-body">
									<?php 
										if(isset($loadPhotoDetail)){
									?>
										<ul class="grid cs-style-3">
										<?php
											foreach($loadPhotoDetail as $lpd){
										?>
											<li>
												<figure>
												  <img src="<?php echo base_url();?>uploads/produk/thumb/<?php echo $lpd->produk_foto;?>" alt="img01">
												  <figcaption>
														<a data-toggle="modal" href="#hapusfoto<?php echo $lpd->id;?>">Hapus <i class="icon-trash"></i></a>
														<!--a class="fancybox" rel="group" href="<?php echo base_url();?>uploads/produk/<?php echo $lpd->produk_foto;?>">Lihat..</a-->
												  </figcaption>
											  </figure>
											</li>
										<?php
											}
										?>
										</ul>
										<?php
											
											foreach($loadPhotoDetail as $lp){
										?>
												<div aria-hidden="true" aria-labelledby="hapusfoto<?php echo $lp->id;?>Label" role="dialog" tabindex="-1" id="hapusfoto<?php echo $lp->id;?>" class="modal fade">
												  <div class="modal-dialog">
													  <div class="modal-content">
														  <div class="modal-header">
															  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
															  <h4 class="modal-title">Hapus Foto</h4>
														  </div>
														  <div class="modal-body">
																<div class="col-sm-12">
																	<h3>Yakin ingin menghapus foto ini?</h3>
																</div>
														  </div>
														  <div class="modal-footer">
															<a href="<?php echo base_url();?>administrator/produk_foto_hapus/<?php echo $lp->id;?>/<?php echo $lp->id_produk;?>">
																<button class="btn btn-info " type="button">
																	<i class="icon-trash"></i> Hapus
																</button>
															</a>
															<button data-dismiss="modal" type="button" id="batalhapusfoto" class="btn btn-default"><i class="icon-mail-reply-all"></i> Batal</button>
														  </div>
													  </div>
												  </div>
												</div>
										<?php
											}
										
										}else{
										?>
											<div class="col-sm-6">
												<h2>Belum ada foto yang terunggah.</h2>
											</div>
										<?php
										}
										?>
								</div>
						<?php
								}else{
								
								}
							?>
						
					</section>
				</div>
				
			</div><!-- end row -->
		
		</section>
	</section>

<?php
	$this->load->view('admin/templates/footer');
?>