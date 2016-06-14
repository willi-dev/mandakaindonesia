$(document).ready(function() {

	$('.admin-menu').click(function(e){
		e.preventDefault();
		dataTarget = $(this).data('target');
		$(this).attr('disable', '');
		console.log( dataTarget );
		$.ajax({
			type:"POST",
			url:'administrator/'+dataTarget,
			dataType: 'html',
			beforeSend: function(){
				console.log( 'beforeSend' );
			},
			success: function(html) {
				console.log(html);
				$('.row-wrapper').hide().html( html ).fadeIn();
			}
		});
	});

});