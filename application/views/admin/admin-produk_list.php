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
						<header class="panel-heading"><h2>Daftar Produk</h2></header>
						<div class="panel-body">
							<?php 
							if(isset($loadProduct)){
							?>
							<div class="adv-table">
								<table  class="display table table-bordered table-striped table-condesed" id="tableproduk">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Harga Sale</th>
											<th>Status</th>
											<th>Kategori</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no=1;
										foreach($loadProduct as $lp){
											
											//$shortdesc = SUBSTR("$lp->produk_deskripsi", 0, 40);
									?>
										<tr>
											<td><?php echo $no;?></td>
											<td><a href="<?php echo base_url();?>administrator/produk_detail/<?php echo $lp->id;?>"><?php echo $lp->produk_nama;?></a></td>
											<td>Rp. <?php echo $lp->harga;?></td>
											<td>Rp. <?php echo $lp->harga_sale;?></td>
											<td><?php echo $lp->produk_status;?></td>
											<td><?php echo $lp->produk_kategori;?></td>
											<td class="center">
												<a href="<?php echo base_url();?>administrator/produk_ubah/<?php echo $lp->id;?>">Ubah <i class="icon-edit"></i></a>
												<a data-toggle="modal" href="#hapusproduk<?php echo $lp->id;?>">Hapus <i class="icon-trash"></i></a>
											</td>
										</tr>
									<?php
											$no++;
										}
									?>
									</tbody>
								</table>
								</section>	
										
										<!-- HAPUS PRODUK MODAL DIALOG -->
										<?php 
										foreach($loadProduct as $lph){?>
										<div aria-hidden="true" aria-labelledby="hapusproduk<?php echo $lph->id;?>Label" role="dialog" tabindex="-1" id="hapusproduk<?php echo $lph->id;?>" class="modal fade">
										  <div class="modal-dialog">
											  <div class="modal-content">
												  <div class="modal-header">
													  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
													  <h4 class="modal-title">Hapus Produk : <?php echo $lph->produk_nama;?></h4>
												  </div>
												  <div class="modal-body">
														<div class="col-sm-12">
															<h3>Yakin ingin menghapus Produk <?php echo $lph->produk_nama;?> ? </h3><br /> 
															<h4>Ini akan menghapus data produk berikut foto-fotonya.. </h4>
														</div>
												  </div>
												  <div class="modal-footer">
													<a href="<?php echo base_url();?>administrator/produk_hapus/<?php echo $lph->id;?>">
														<button class="btn btn-info " type="button">
															<i class="icon-trash"></i> Hapus
														</button>
													</a>
													<button data-dismiss="modal" type="button" id="batalhapusproduk" class="btn btn-default"><i class="icon-mail-reply-all"></i> Batal</button>
												  </div>
											  </div>
										  </div>
										</div>
										<?php
										}
									?>
							</div>
						</div>
							<?php
							}else{
							?>
								<h2>Produk belum tersedia. Tambahkan di <a href="<?php echo base_url();?>administrator/produk_tambah">sini</a></h2>
							<?php
							}
							?>
						</div>
				</div>
			</div>
		</section>
	</section>
	
	
<?php
	$this->load->view('admin/templates/footer');
?>
	
	