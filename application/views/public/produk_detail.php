<?php
	$this->load->view('public/templates/header');
	$this->load->view('public/templates/sidebar');
?>
	<div id="content" class="span-19 last">
		<div class="append-1 span-18 last" >
		<!--div class="span-18 last append-1 prepend-1">
			<h1><a href="<?php echo base_url();?>"></a></h1>
		</div><hr /-->
		<!-- slider foto -->
		<div id="produk_display" class="span-10" style="">
			<?php 
			if(isset($loadSpecificProductPhoto)){
			?>
			<div id="slider_produk">
				<div class="slides_container">
					<?php
						foreach($loadSpecificProductPhoto as $lspp){
					?>
						<img src="<?php echo base_url();?>uploads/produk/<?php echo $lspp->produk_foto;?>" alt="" class="slide_img"/>
					<?php
						}
					?>
				</div>
				<div class="pagination-container span-8">
					<ul class="pagination">
				<?php 	$p=1;
						foreach($loadSpecificProductPhoto as $page){
							if($p%4==0){
								$akhir = "akhir";
							}else{
								$akhir = "";
							}
				?>
							<li class="span-2 <?php echo $akhir;?> pagination-item"><a href="#"><img src="<?php echo base_url();?>uploads/produk/thumb/<?php echo $page->produk_foto;?>" class="pagination-img" alt="" /></a></li>
				<?php		
							$p++;
						}
				?>
					</ul>
				</div>
			</div>
			<?php
			}else{
			?>
			<div id="slider_produk">
				<div class="slides_container">
					<img src="<?php echo base_url();?>assets/public/img/tumblr-logo.png" alt=""  class="slide_img"/>
				</div>
				<div class="pagination-container span-8">
					<ul class="pagination">
						<li class="span-2 pagination-item"><a href="#"><img src="<?php echo base_url();?>assets/public/img/tumblr-logo.png" class="pagination-img" alt="" /></a></li>
					</ul>
				</div>
			</div>
			<?php 
			}
			?>
		</div>
		<!-- end slider foto -->
		
		<!-- keterangan produk -->
			<div id="wrap-keterangan" class="span-8 last">
				<div class="capsule-keterangan">
				<table id="table-keterangan-detail">
					<tr>
						<td class="produknama quicksandbook"><?php echo ucwords($produk_nama) ;?></td>
					</tr>
					<tr>
						<?php if($produk_status=="habis"){$habis = "habis";}else{$habis = "dotunder";}?>
						<td class="produkstatus <?php echo $habis;?> quicksandbook"><?php echo ucwords($produk_status);?></td>
					</tr>
					<?php
					if($produk_status == "sale"){
					?>
						<tr>
							<td class="harga "> <s>Rp. <?php echo number_format($harga);?></s></td>
						</tr>
						<tr>
							<td class="hargasale ">
								Rp. <?php echo number_format($harga_sale);?>
							</td>
						</tr>
						
						
					<?php
						}else{
					?>
						<tr>
							<td class="harga ">Rp. <?php echo number_format($harga);?></td>
						</tr>
					<?php
						}
					?>
					<tr>
						<td class="produkdeskripsi quicksandbook"><?php echo $produk_deskripsi;?></td>
					</tr>
				</table>
				</div>
			</div>
		<!-- end keterangan produk -->
		</div>
		<hr/>
		<div class="span-18 last append-1">
			<div id="wrap-ketentuanumum">
			<?php if(isset($loadKetentuan)){
			?>
				<div class="ketentuanumum quicksandbook">
					<?php echo $loadKetentuan->ketentuan;?>
				</div>
			<?php
			}else{
			?>
				<div class="ketentuanumum">
					Ketentuan berbelanja belum tersedia.
				</div>
			<?php
			}
			?>
			</div>
		</div>
	</div>	
		<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/slides.min.jquery.js"></script>
		<script type="text/javascript">
		$(function(){
			$('#slider_produk').slides({
				preload: true,
				preloadImage: '<?php echo base_url();?>assets/public/img/load.gif',
				effect: 'slide, fade',
				crossfade: true,
				fadeSpeed: 180,
				generateNextPrev: false,
				generatePagination: false
			});
		});
		$(document).ready(function(){
			var slidescontainer = $('.slides_container');
			var scWidth = slidescontainer.width();
			var scHeight = slidescontainer.height();
			var orWidth, orHeight = 0;
			var newWidth = [], newHeight = [], mLeft = [], mTop = [];
			$(window).load(function(){
				$('.slide_img').each(function(i){
					orWidth = $(this).width();
					orHeight = $(this).height();
					if(orWidth != orHeight){
						if(orWidth < orHeight){ //PORTRAIT FORMAT
							$(this).css('height', 390+"px"); 
							ar = parseFloat(orWidth/orHeight);
							newHeight[i] = 390;
							newWidth[i] = ar*newHeight[i];
							mLeft[i] = (scWidth-parseInt(newWidth[i]))/2;
							mTop[i] = (scHeight-newHeight[i])/2;
							$(this).css('margin-left', mLeft[i]+"px");
							$(this).css('margin-top', mTop[i]+"px");
						}else{ //LANDSCAPE FORMAT
							$(this).css('width', 390+"px");
							ar = parseFloat(orHeight/orWidth);
							newWidth[i] = 390;
							newHeight[i] = ar*newWidth[i];
							mLeft[i] = (scWidth-newWidth[i])/2;
							mTop[i] = (scHeight-parseInt(newHeight[i]))/2;
							$(this).css('margin-left', mLeft[i]+"px");
							$(this).css('margin-top', mTop[i]+"px");
						}
					}else{ //SQUARE FORMAT
						$(this).css('width', 380+"px");
						$(this).css('height', 380+"px");
						newWidth[i] = 380;
						newHeight[i] = 380;
						mLeft[i] = (scWidth-newWidth[i])/2;
						mTop[i] = (scHeight-newHeight[i])/2;
						$(this).css('margin-left', mLeft[i]+"px");
						$(this).css('margin-top', mTop[i]+"px");
					}
				});
			});
			var paginationitem = $('.pagination-item');
			var piWidth = paginationitem.width();
			var piHeight = paginationitem.height();
			var oriWidth, oriHeight = 0;
			var nWidth = [], nHeight = [], marLeft = [], marTop = [];
			$(window).load(function(){
				$('.pagination-img').each(function(i){
					oriWidth = $(this).width();
					oriHeight = $(this).height();
					if(oriWidth != oriHeight){
						if(oriWidth < oriHeight){ //PORTRAIT FORMAT
							$(this).css('width', 68+"px");
							ar = parseFloat(oriHeight/oriWidth);
							nWidth[i] = 68;
							nHeight[i] = ar*nWidth[i];
							marLeft[i] = (piWidth-nWidth[i])/2;
							marTop[i] = (piHeight-parseInt(nHeight[i]))/2;
							$(this).css('margin-left', marLeft[i]+"px");
							$(this).css('margin-top', marTop[i]+"px");
						}else{ //LANDSCAPE FORMAT
							$(this).css('height', 68+"px"); 
							ar = parseFloat(oriWidth/oriHeight);
							nHeight[i] = 68;
							nWidth[i] = ar*nHeight[i];
							marLeft[i] = (piWidth-parseInt(nWidth[i]))/2;
							marTop[i] = (piHeight-nHeight[i])/2;
							$(this).css('margin-left', marLeft[i]+"px");
							$(this).css('margin-top', marTop[i]+"px");
						}
					}else{ //SQUARE FORMAT
						$(this).css('width', 68+"px");
						$(this).css('height', 68+"px");
						nWidth[i] = 68;
						nHeight[i] = 68;
						marLeft[i] = (piWidth-nWidth[i])/2;
						marTop[i] = (piHeight-nHeight[i])/2;
						$(this).css('margin-left', marLeft[i]+"px");
						$(this).css('margin-top', marTop[i]+"px");
					}
				});
			});
		});
		</script>
<?php
	$this->load->view('public/templates/footer');
?>