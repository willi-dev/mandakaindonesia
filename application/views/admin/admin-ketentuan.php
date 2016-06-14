<?php
	$this->load->view('admin/templates/header'); // header html
	$this->load->view('admin/templates/header_menu'); // header menu
	$this->load->view('admin/templates/sidebar'); // sidebar menu
?>  
      <!--main content start-->
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
						<header class="panel-heading"><h2>Ketentuan Produk</h2></header>
						
						<div class="panel-body">
						<?php 
							$ketentuan = $loadKetentuan->ketentuan;
							if($ketentuan == NULL){
							
								$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
								echo form_open('administrator/ketentuan_proses', $att);
								?>
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label" for="ketentuan">Deskripsi Produk</label>
									<div class="col-sm-10">
										<textarea class="form-control ckeditor" rows="6" name="ketentuan" style="visibility: hidden; display: none;"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" id="simpanketentuan" class="btn btn-info btn-lg">Simpan Ketentuan</button>
									</div>
								</div>
								
								<?php
									echo form_close();
								
							}else{
									$att = array('id' => '', 'class' => 'form-horizontal tasi-form', 'name' => 'formsetting', 'method'=>'POST' );
									echo form_open('administrator/ketentuan_proses', $att);
									?>
									
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label" for="ketentuan">Deskripsi Produk</label>
										<div class="col-sm-10">
											<textarea class="form-control ckeditor" rows="6" name="ketentuan" style="visibility: hidden; display: none;"><?php echo $ketentuan;?></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" id="simpanketentuan" class="btn btn-info btn-lg">Simpan Ketentuan</button>
											<a href="<?php echo base_url();?>administrator/produk">
												<button type="button" id="batal" class="btn btn-primary btn-lg">Batalkan</button>
											</a>
										</div>
									</div>
									
									<?php
										echo form_close();
								
							}
							?>
						</div>
						
						
						</div>
						
					</section>
				    
                  </div>
              </div>

          </section>
      </section>
      <!--main content end-->
	<script src="<?php echo base_url();?>assets/admin/assets/ckeditor/ckeditor.js"></script>
	
<?php
	$this->load->view('admin/templates/footer');
?>