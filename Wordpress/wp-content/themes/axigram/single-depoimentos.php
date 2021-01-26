<?php 
	get_header();

	wp_head();
?>
		<div class="content">
			<div class="bg-top"></div>
			<div class="container">
				<div class="title"><?php echo get_the_title(); ?></div>
				<?php the_content(); ?>
				<div class="divisor">
					<span class="borda magenta"></span>
					<span class="borda"></span>
				</div>
				<div class="conteudo">
					<?php
						$idImagem = get_post_meta( get_the_ID(), 'image_depoimento', true );
						$image = wp_get_attachment_url($idImagem, array('300', '300'));
					?>
				</div>
				<div class="depo">
					<div class="col-xs-12 box">
						
						<div class="col-xs-7">
							<?php 
								if( get_post_meta( get_the_ID(), 'video_depoimento', true ) !== '' ):
									$video = get_post_meta( get_the_ID(), 'video_depoimento', true ); 
							?>
								<div class="video">
									<?php echo $video; ?>
								</div>
							<?php else: ?>
								<div class="imagem" style="background-image: url('<?php echo $image; ?>')">
									<img src="<?php echo $image; ?>" alt="">
								</div>
							<?php endif; ?>
						</div>
						<div class="col-xs-5">
							<div class="titulo">
								<a href="#"><?php echo get_the_title(); ?></a>
								<input type="hidden" class="title-<?php echo $post->ID; ?>" value="<?php the_title(); ?>" />
								<input type="hidden" class="description-<?php echo $post->ID; ?>" value="<?php echo get_the_excerpt(); ?>" />
								<input type="hidden" class="link-<?php echo $post->ID; ?>" value="<?php the_permalink(); ?>" />
								<input type="hidden" class="image-<?php echo $post->ID; ?>" value="<?php echo $image; ?>" />
							</div>
							<div class="description">
								<?php echo resume_content( get_post_meta( get_the_ID(), 'descricao_depoimento', true ), 15 ); ?>
							</div>
							<div class="compartilhe">
								<p>Compartilhe:</p>
								<img height="28" width="28" class="fb_share" data-id="<?php echo $post->ID; ?>" src="<?php echo IMAGES . 'facebook.jpg'; ?>" alt="">
								<a 
									href="https://plus.google.com/share?url=<?php the_permalink(); ?>" 
									onclick="javascript:window.open(this.href, 'sdfasdfasdfasdf', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=350');return false;">
										<img height="28" width="28" src="<?php echo IMAGES . 'google.jpg'; ?>" alt="Share on Google+"/>
								</a>
								<a href="https://twitter.com/intent/tweet?url=http://example.com;">
									<img data-url="<?php the_permalink(); ?>" height="28" width="28" src="<?php echo IMAGES . 'twitter.jpg'; ?>" alt="Share on Google+"/>
								</a>
							</div>
							<div class="comment">
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-width="100%"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
		<div id="fb-root"></div>


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
		<script>
			twttr.events.bind('tweet', function (event) {
			  // Do something there
			  alert('Tweeted');
			});
		</script>
<?php get_footer() ?>