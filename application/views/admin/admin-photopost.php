<?php	$this->load->view('admin/templates/header');?>		<div id="layout" class="pure-g-r">		<a id="menuLink" class="pure-menu-link" href="#menu">			<span></span>		</a>		<div id="menu" class="pure-u">			<?php				$this->load->view('admin/templates/vertical-menu');			?>		</div>		<div id="main" class="pure-u-1">			<div class="header">				<h1>Photo Post</h1>				<h2>Di halaman ini anda dapat melihat, mengunggah, ataupun menghapus foto yang sudah anda tambahkan</h2><br />			</div>			<div class="wrap-menu">				<div class="menu-breadcrumb">					<ul>						<li class="link"><a href="<?php echo base_url()."administrator/addphotoset/".$nextid;?>">Add New Photo Set</a></li>					</ul>				</div>			</div>			<br /><br />			<div class="content">				<div class="pure-g">					<?php						if(isset($photoload)){							foreach($photoload as $rowphoto){					?>																<div class="img-list pure-u-1-2">									<img src="<?php echo base_url();?>uploads/photopost/<?php echo $rowphoto->fotosingle;?>" alt="" />								</div>								<div class="pure-u-1-2 text-box">									<div class="l-box">										<a class="linkload" href="<?php echo base_url();?>administrator/photosload/<?php echo $rowphoto->id_ps;?>" data-toggle="modal" data-target="#modal<?php echo $rowphoto->id_ps;?>"><?php echo $rowphoto->name_photo_set;?></a>									</div>									<!-- Modal -->									<div class="modal fade" id="modal<?php echo $rowphoto->id_ps;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >											<!-- LOAD CONTENT -->									</div>									<!-- /.modal -->								</div>																					<?php							}						}else{					?>							<div class="pure-u-1 text-box">								<div class="box-alert error"><div class="l-box"><?php echo $nophoto;?></div></div>							</div>					<?php						}										// test modal load from database										//$this->load->view('admin/load photo');										?>									</div>				<?php echo $this->pagination->create_links();?>			</div>					</div>	</div><?php	$this->load->view('admin/templates/footer');?>	