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
					
				<div class="col-md-6">
					<?php
						$att = array('id' => '', 'class' => 'form-horizontal', 'name' => 'formsetting', 'method'=>'POST' );
						echo form_open('administrator/add_category', $att);
					?>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Add New Category</h3>
							<!-- <div class="box-tools pull-right">
		                    	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
		                      	<i class="fa fa-plus"></i></button>
		                    </div> -->

						</div>
						<div class="box-body">
							
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" for="produk_kategori">Category</label>
								<div class="col-sm-10">
									<input type="text" id="produk_kategori" class="form-control" name="produk_kategori" />
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" id="tambahkankategori" class="btn btn-info pull-right">Submit</button>
						</div>
					</div>
					<?php
						echo form_close();
					?>
				</div>	
				<div class="col-md-6">
					
					<div class="box box-info">
						<div class="box-body">
							<table id="category" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Category</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								if( isset( $loadCategory ) ):
									$num = 1;
									foreach ($loadCategory as $lc ) {
									?>
										<tr>
											<td><?php echo $num;?></td>
											<td><?php echo $lc->produk_kategori;?></td>
											<td>
												<!-- href="<?php echo base_url();?>administrator/kategori_ubah/<?php echo $lc->id;?>">Ubah <i class="icon-edit"></i></a -->
												<a data-toggle="modal" href="#ubahkategori<?php echo $lc->id;?>">Edit <i class="icon-edit"></i></a>
												<a data-toggle="modal" href="#hapuskategori<?php echo $lc->id;?>">Delete <i class="icon-trash"></i></a>	
											</td>
										</tr>
									<?php
										$num++;
									}
								else:
									?>
										<tr>
											<td colspan="3">
												<h1>No Category.</h1>
											</td>
										</tr>
									<?php
								endif;
								?>
									
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Category</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>


							<?php
							/*
							 * MODAL DIALOG UBAH DAN HAPUS KATEGORI
							 */											
								$a=1;
								foreach($loadCategory as $l){
							?>
								<div aria-hidden="true" aria-labelledby="ubahkategori<?php echo $l->id;?>Label" role="dialog" tabindex="-1" id="ubahkategori<?php echo $l->id;?>" class="modal fade">
								  <div class="modal-dialog">
									  <div class="modal-content">
										  <div class="modal-header">
											  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
											  <h4 class="modal-title">Ubah Kategori : <?php echo $l->produk_kategori;?></h4>
										  </div>
										  <div class="modal-body">
											<?php
												$att = array('class' => 'form-horizontal', 'role' => 'form', 'method'=>'POST' );
												echo form_open('administrator/update_category', $att);
											?>
												<input type="hidden" name="id_kategori" value="<?php echo $l->id;?>" />
												 <div class="form-group">
													<label class="col-lg-2 col-sm-2 control-label" for="produk_kategori">Kategori</label>
													<div class="col-lg-10">
														<input type="text" id="produk_kategori" class="form-control" name="produk_kategori" value="<?php echo $l->produk_kategori;?>"/>
													</div>
												  </div>
												  <div class="form-group">
													  <div class="col-lg-offset-2 col-lg-10">
														  <button type="submit" id="simpanperubahan" class="btn btn-info">Simpan Perubahan</button>
													  </div>
												  </div>
											<?php
											echo form_close();
											?>
										  </div>

									  </div>
								  </div>
								</div>
								
								
								<div aria-hidden="true" aria-labelledby="hapuskategori<?php echo $l->id;?>Label" role="dialog" tabindex="-1" id="hapuskategori<?php echo $l->id;?>" class="modal fade">
								  <div class="modal-dialog">
									  <div class="modal-content">
										  <div class="modal-header">
											  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
											  <h4 class="modal-title">Hapus Kategori : <?php echo $l->produk_kategori;?></h4>
										  </div>
										  <div class="modal-body">
												<div class="col-sm-12">
													<h3>Yakin ingin menghapus kategori <?php echo $l->produk_kategori;?> ? </h3>
												</div>
										  </div>
										  <div class="modal-footer">
											<a href="<?php echo base_url();?>administrator/delete_category/<?php echo $l->id;?>">
												<button class="btn btn-info " type="button">
													<i class="icon-trash"></i> Hapus
												</button>
											</a>
											<button data-dismiss="modal" type="button" id="batalhapuskategori" class="btn btn-default"><i class="icon-mail-reply-all"></i> Batal</button>
										  </div>
									  </div>
								  </div>
								</div>

							<?php
									$a++;
								}
							?>
						</div>
					</div>

				</div>

			</div>
		</section>

	</div>
	<!-- end of content-wrapper -->

<?php 
	$this->load->view( 'admin/templates_LTE/footer_content.php' );
	$this->load->view( 'admin/templates_LTE/footer.php' );