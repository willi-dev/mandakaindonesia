<div class="row">
	<div class="col-lg-12">
		<?php
		$msgsuccess = $this->session->flashdata('messagesuccess');
		echo $msgsuccess == '' ? '' : '<div class="alert alert-success alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgsuccess . '!</strong></div>';
		
		$msgerror = $this->session->flashdata('messageerror');
		echo $msgerror == '' ? '' : '<div class="alert alert-success alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="icon-remove"></i></button><strong>' . $msgerror . '!</strong></div>';
		?>
		<section class="panel">
			<header class="panel-heading">Kategori</header>
			<div class="panel-body">Di sini anda dapat melihat, mengubah, menambahkan, dan menghapus kategori</div>
		</section>
	</div>
</div>
<div class="row">
	
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading"><h2>Daftar Kategori</h2></header>
			<div class="panel-body">
				<?php if(isset($loadCategory)){
				?>
				<div class="adv-table">
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($loadCategory as $lc){
						?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $lc->produk_kategori;?></td>
								<td>
									<!-- href="<?php echo base_url();?>administrator/kategori_ubah/<?php echo $lc->id;?>">Ubah <i class="icon-edit"></i></a -->
									<a data-toggle="modal" href="#ubahkategori<?php echo $lc->id;?>">Ubah <i class="icon-edit"></i></a>
									<a data-toggle="modal" href="#hapuskategori<?php echo $lc->id;?>">Hapus <i class="icon-trash"></i></a>
										
								</td>
							</tr>
							
							
						<?php
								$no++;
							}
						?>
						</tbody>
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
											echo form_open('administrator/kategori_ubah_proses', $att);
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
										<a href="<?php echo base_url();?>administrator/kategori_hapus/<?php echo $l->id;?>">
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
				<?php
				}else{
				?>
					<h2>Kategory masih kosong...</h2>
				<?php
				}
				?>
			</div>
		</section>
	</div>
	
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading">Tambahkan Kategori</header>
			<div class="panel-body">
				<?php
					$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
					echo form_open('administrator/kategori_tambah', $att);
				?>
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label" for="produk_kategori">Kategori</label>
					<div class="col-sm-10">
						<input type="text" id="produk_kategori" class="form-control" name="produk_kategori" />
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" id="tambahkankategori" class="btn btn-info btn-lg">Tambahkan Kategori</button>
					</div>
				</div>
				
				<?php
					echo form_close();
				?>
			</div>
		</section>
	</div>
	
	
</div>