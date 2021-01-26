		<?php $footer = get_option("link_social");?>
		
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<?php echo $footer['about'] ?>
					</div>
					<div class="col-sm-6">
						<?php echo $footer['horario'] ?>
					</div>	
				</div>

				<ul class="social">
					<?php if ($footer['facebook'] != "") { ?>
						<li>
							<a href="<?php $footer['facebook'] ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fb.png">
								<p>Facebook</p>
							</a>
						</li>
					<?php } ?>
					<?php if ($footer['linkedin'] != "") { ?>
						<li>
							<a href="<?php echo $footer['linkedin'] ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lin.png">
								<p>Linked In</p>
							</a>
						</li>
					<?php } ?>
					<?php if ($footer['twitter'] != "") { ?>
						<li>
							<a href="<?php $footer['twitter'] ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tw.png">
								<p>Twitter</p>
							</a>
						</li>
					<?php } ?>
					<?php if ($footer['youtube'] != "") { ?>
						<li>
							<a href="<?php $footer['youtube'] ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/you.png">
								<p>You Tube</p>
							</a>
						</li>
					<?php } ?>
					<?php if ($footer['instagram'] != "") { ?>
						<li>
							<a href="<?php echo $footer['instagram'] ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ins.png">
								<p>Instagram</p>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
			
			<div class="footer-about">
				<p>2020 - pasianoti.adv.br</p>
			</div>
		</footer>

		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.v3.5.0.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.nav.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/swiper.js"></script>

		<script>
			var swiper_slider = new Swiper('.banner-home > .swiper-container');

			var headerhome   = $('.header').height();
			var width		 = $(window).width();

			$(document).ready(function() {
				$('#nav').onePageNav({
					changeHash: true
				});

				$(window).scroll(function(event){
					var scrollTop = jQuery(window).scrollTop();
					if(scrollTop>headerhome-10){
						$('.header').addClass('active');
						$('.header').addClass('fixed');
						$('.banner-home').css('z-index', '-1');
						$('#margin').addClass('margin');
					}
					else {
						$('#margin').removeClass('margin');
						$('.header').removeClass('fixed');
						$('.header').removeClass('active');
						$('.banner-home').css('z-index', '0');
					}
				});
			});
		</script>
	</body>
</html>