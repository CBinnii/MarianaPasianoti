(function($){

	$(document).ready(function(){
		
		$(document).on('change', "#estates", function(){

			var estate = $(this).val();
			$.post( ajaxurl , { 'action': 'getCity', 'estate': estate }, function(data){
				$("#city").html(data);
			});

		});

		$(document).on('click', "#getGeoLocalization", function(){
			var address = $("#address").val();
			if( address == '' ){
				alert("Preencha corretamente o endereço!");
			} else {
				$.post(ajaxurl, {'action': 'getCoordinates', 'address': address }, function(data){
					if( data == 0 ){
						alert("Preencha corretamente o endereço!");
					} else {
						$("#localization").val(data);
					}
				});
			}
		})

	});

})(jQuery);