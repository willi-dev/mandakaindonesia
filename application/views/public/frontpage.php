<?php
	$this->load->view('public/templates/header');
	$this->load->view('public/templates/sidebar');
?>
	<div id="content" class="span-18 last">
		<div class="append-1 span-18 last" id="display-grid-product">
		<?php
		if(isset($loadAllProduct)){
			$no=1;
			
			foreach($loadAllProduct as $lap){
			if($no%3==0){
				$last = "last";
			}else{
				$last = "";
			}
		?>
			<a href="<?php echo base_url();?>product/detail/<?php echo $lap->url_title;?>">
			<div class="wrap-product span-6 <?php echo $last;?> quicksandlight">
				<div class="wrap-product-inner span-6 <?php echo $last;?>">
					<?php if($lap->foto!=NULL){ ?>
						<div class="wrap-grid-img">
							<img src="<?php echo base_url();?>uploads/produk/thumb/<?php echo $lap->foto;?>" alt="" class="img-product" />
						</div>
					<?php }else{ ?>
						<div class="wrap-grid-img">
							<img src="<?php echo base_url();?>assets/public/img/tumblr-logo.png" alt="" class="img-product" />
						</div>
					<?php }?>
				</div>
				<div class="wrap-namaproduk">
					<div><?php echo $lap->produk_nama;?></div>
					<?php 
					if($lap->produk_status=="sale"){?>
						<div><s>Rp. <?php echo number_format($lap->harga);?></s>  Rp. <?php echo number_format($lap->harga_sale);?></div>
						
					<?php
					}else{
					?>
						<div>Rp. <?php echo number_format($lap->harga);?></div>
					<?php
					}
					?>
				</div>
			</div>
			</a>
		<?php
				$no++;
			}
		}else{?>
			<h2>Produk belum tersedia.</h2>
		<?php
		}
		?>
		</div>
		<div class="append-1 span-18 last">
			<?php echo $this->pagination->create_links();?>
		</div>
		
	</div>
		<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/slides.min.jquery.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			var wrapgridimg = $('.wrap-grid-img');
			var wgiWidth = wrapgridimg.width();
			var wgiHeight = wrapgridimg.height();
			var orWidth, orHeight = 0;
			var newWidth = [], newHeight = [], mLeft = [], mTop = [];
			$(window).load(function(){
				$('.img-product').each(function(i){
					orWidth = $(this).width();
					orHeight = $(this).height();
					if(orWidth != orHeight){
						if(orWidth < orHeight){
							$(this).css('width', 228+"px");
							ar = parseFloat(orHeight/orWidth);
							newWidth[i] = 228;
							newHeight[i] = ar*newWidth[i];
							mLeft[i] = (wgiWidth-newWidth[i])/2;
							mTop[i] = (wgiHeight-parseInt(newHeight[i]))/2;
							$(this).css('margin-left', mLeft[i]+"px");
							$(this).css('margin-top', mTop[i]+"px");
						}else{
							$(this).css('height', 228+"px");
							ar = parseFloat(orWidth/orHeight);
							newHeight[i] = 228;
							newWidth[i] = ar*newHeight[i];
							mLeft[i] = (wgiWidth-parseInt(newWidth[i]))/2;
							mTop[i] = (wgiHeight-newHeight[i])/2;
							$(this).css('margin-left', mLeft[i]+"px");
							$(this).css('margin-top', mTop[i]+"px");
						}
					}else{
						$(this).css('width', 228+"px");
						$(this).css('height', 228+"px");
						newWidth[i] = 228;
						newHeight[i] = 228;
						mLeft[i] = (wgiWidth-newWidth[i])/2;
						mTop[i] = (wgiHeight-newHeight[i])/2;
						$(this).css('margin-left', mLeft[i]+"px");
						$(this).css('margin-top', mTop[i]+"px");
					}
				});
			});
		});
		</script>
<?php
	$this->load->view('public/templates/footer');
?>