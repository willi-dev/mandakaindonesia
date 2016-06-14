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
						<header class="panel-heading">Jenis Kelamin</header>
						<div class="panel-body"></div>
					</section>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">Daftar Jenis Kelamin</header>
						<div class="panel-body">
							<?php if(isset($loadSex)){
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
										foreach($loadSex as $ls){
									?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $ls->sex;?></td>
											<td>
												<a href="">Ubah <i class="icon-edit"></i></a>
											</td>
										</tr>
									<?php
											$no++;
										}
									?>
									</tbody>
								</table>
							</div>
							<?php
							}else{
							?>
								<h2>Empty</h2>
							<?php
							}
							?>
						</div>
					</section>
				</div>
			
			</div>
		
		</section>
	</section>
	
<?php
	$this->load->view('admin/templates/footer');
?>