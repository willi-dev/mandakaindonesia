      <!--footer start-->
      <!--footer class="site-footer">
          <div class="text-center">
              Template based on flatlab by vectorlab - 2013 &copy; FlatLab by VectorLab
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer-->
      <!--footer end-->
  </section>
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/owl.carousel.js" ></script>
    <script src="<?php echo base_url();?>assets/admin/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url();?>assets/admin/js/respond.min.js" ></script>
    <script src="<?php echo base_url();?>assets/admin/js/mandaka-admin.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url();?>assets/admin/js/common-scripts.js"></script>
	
    <!--script for this page-->
    <script src="<?php echo base_url();?>assets/admin/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/count.js"></script>
	
	<script src="<?php echo base_url();?>assets/admin/assets/dropzone/dropzone.js"></script>
	
	<?php 
		$produk = $this->uri->segment(2);
		if($produk == "produk"){
	?>
		<script src="<?php echo base_url();?>assets/admin/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#tableproduk').dataTable( {
					"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [ 0 , 1, 6] }
					], 
					"aaSorting": [[ 0, "asc" ]]
				  });
			  });
		</script>
	<?php
		}else{
			echo "";
		}
	?>
	<script src="<?php echo base_url();?>assets/admin/assets/fancybox/source/jquery.fancybox.js"></script>
	<script src="<?php echo base_url();?>assets/admin/js/modernizr.custom.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/toucheffects.js"></script>
	<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

	</script>
	
	<script type="text/javascript">
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
		  
		  $('.grid figure').css('height', $('.grid figure').width()+"px");
		  
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
  </script>

  </body>
</html>