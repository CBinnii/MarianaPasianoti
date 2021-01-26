		
			<div class="footer<?php if ( is_front_page()) { echo " home"; } ?>">
				<div class="left">
					<p>2017 - Todos os direitos reservados - Axigram</p>
				</div>
				<div class="right">
					<p>Solução wordpress desenvolvido por: <a href="http://www.quicktechbrasil.com.br/">Quicktech</a></p>
				</div>
			</div>
		
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/go-top.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-55196126-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script>
			$(document).ready(function($){
				$('#options').on('change', function(){
					var selected = $(this).val();		
					$.each($('.panel'), function(v, i){
						if(selected != ''){
							var uf = $(this).data('uf');
							if(selected != uf){
								$(this).css('display', 'none');
							} else {
								$(this).css('display', 'block');
							}
						} else {
							$(this).css('display', 'block');
						}
					});
				});
			});

			var swiper = new Swiper('.swiper-container', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				loop: true
			});
		</script>
		<script>
			window.fbAsyncInit = function() {
			FB.init({
			    appId: 761584790662514,
			    status: true,
			    cookie: true,
			    xfbml: true
			});
			};

			(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];if   (d.getElementById(id)) {return;}js = d.createElement('script'); js.id = id; js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));

			function postToFeed(title, desc, url, image) {
			var obj = {method: 'feed',link: url,href: url, picture: image,name: title,description: desc};
			function callback(response) {}
			FB.ui(obj, callback);
			}

			$(document).on("click", ".fb_share", function(){
				var id = $(this).data('id');
				var title = $(".title-"+id).val(),
					desc = $(".description-"+id).val(),
					url = $(".link-"+id).val(),
					image = $(".image-"+id).val();
				postToFeed(title, desc, url, image);
			});
		</script>

		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=761584790662514";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	</body>
</html>