(function($){
	window.header = {
		toScroll: function()
		{
			$('.content').animate({
				scrollTop: $("body").offset().top
			}, 1000);
		},
		appearScroll: function(e)
		{
			var y = $(e).scrollTop();
			if (y > 300) {
				$('#go-top').fadeIn();
			} else {
				$('#go-top').fadeOut();
			}
		}
	}

	$(document).on('click touch', "#go-top", function(){
		header.toScroll();
	});

	$('.content').scroll(function() {
	  header.appearScroll(this);
	});
})(jQuery)