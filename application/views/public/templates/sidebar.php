

<div id="sidebar" class="span-5">
	
	<ul id="kategori" class="quicksandbook"><h3 class="bebas header-kategori">Kategori</h3>
	<?php 
		if(isset($loadCategory)){
			foreach($loadCategory as $lc){
				$urikategori = $this->uri->segment(3);
				if($urikategori == $lc->kategori_url_title){$active="active";}else{$active="";}
	?>
			<a href="<?php echo base_url();?>product/category/<?php echo $lc->kategori_url_title;?>"><li class="<?php echo $active;?>"><?php echo $lc->produk_kategori;?></li></a>
	<?php
			}
		}else{
	?>
			<li>kategori produk belum tersedia</li>
	<?php
		}
	?>
		
	</ul>

</div>