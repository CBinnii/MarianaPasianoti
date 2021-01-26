<?php 
	get_header();
?>
		<div class="content">
			<div class="bg-top"></div>
			<div class="container">
				<div class="title"><?php echo get_the_title(); ?></div>
				<div class="divisor">
					<span class="borda magenta"></span>
					<span class="borda"></span>
				</div>
				<div class="conteudo">
					<div class="texto">
						<?php echo apply_filters('the_content', $post->post_content); ?>
					</div>
					<div class="depo">
						<?php 
							$args = array(
								'post_type' => 'depoimentos',
								'status' => 'publish',
								'showposts' => -1,
								'order' => 'ASC'
							);
							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									$idImagem = get_post_meta( get_the_ID(), 'image_depoimento', true );
									$image = wp_get_attachment_url($idImagem, array('300', '300'));
									$exlink = get_post_meta( get_the_ID(), 'extern_link', true );
									
						?>
						<div class="col-xs-12 box">
							
							<div class="col-sm-7 col-xs-12">
								<?php 
									if( get_post_meta( get_the_ID(), 'video_depoimento', true ) !== '' ):
										$video = get_post_meta( get_the_ID(), 'video_depoimento', true ); 
								?>
									<div class="video">
										<?php echo $video; ?>
									</div>
								<?php else: ?>
									<div class="imagem" style="background-image: url('<?php echo $image; ?>')">
										<a href="<?php echo $exlink; ?>" target="_blank">
											<img src="<?php echo $image; ?>" >
										</a>
									</div>
								<?php endif; ?>	
							</div>
							<div class="col-sm-5 col-xs-12">
								<div class="titulo">
									<a href="<?php echo $exlink; ?>" target="_blank"><?php echo get_the_title(); ?></a>
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
  									<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>;">
  										<img data-url="<?php the_permalink(); ?>" height="28" width="28" src="<?php echo IMAGES . 'twitter.jpg'; ?>" alt="Share on Google+"/>
  									</a>
								</div>
								<div class="comment">
									<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-width="100%"></div>
								</div>
							</div>

						</div>
						<?php
								endwhile;
							endif;

							wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>

		<div id="fb-root"></div>
<?php 
	get_footer();
?>