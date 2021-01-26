<?php 
	get_header();
?>
		<div class="content<?php if ( is_front_page()) { echo " home"; } ?>">
			<div class="slider-home desk">
				<?php
						$query = new WP_Query(
							array(
								'post_type' => 'slider'
							)
						);
					?>
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php
									foreach ($query->posts as $post):
										$imgID = get_post_meta($post->ID, 'imagem_slider', true);
										$link = get_post_meta( $post->ID, 'link', true );
									?>
										<div class="swiper-slide" style="background-image: url('<?php echo wp_get_attachment_url($imgID); ?>'); <?php if($link == '/solst'):?> background-position: right 20% bottom; <?php endif; ?> <?php if($link == '/terceirizacao/'):?> background-position: left center; <?php endif; ?>">
											<?php if ($link != ""): ?> <a href="<?php echo $link; ?>"> <?php endif; ?>
												<?php if( get_post_meta($post->ID, 'subtitulo_slider', true)): ?>
													<div class="description">
														<?php echo get_post_meta($post->ID, 'subtitulo_slider', true); ?>
													</div>
												<?php endif; ?>
											<?php if ($link != ""): ?> </a> <?php endif; ?>
										</div>
									<?php
									endforeach;
								?>
							</div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					<?php
					wp_reset_query();
				?>
			</div>
			<div class="slider-home mobi">
				<?php
						$query = new WP_Query(
							array(
								'post_type' => 'slider'
							)
						);
					?>
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php
									foreach ($query->posts as $post):
										$imgID_mobile = get_post_meta($post->ID, 'imagem_slider_mobile', true);
										$link = get_post_meta( $post->ID, 'link', true );
									?>
										<div class="swiper-slide" style="background-image: url('<?php echo wp_get_attachment_url($imgID_mobile); ?>'); <?php if($link == '/terceirizacao/'):?> background-position: center top; <?php endif; ?> <?php if($link == '/pontos-de-venda'):?> background-position: center top; <?php endif; ?>" >
											<?php if ($link != ""): ?> <a href="<?php echo $link; ?>"> <?php endif; ?>
												<?php if( get_post_meta($post->ID, 'subtitulo_slider', true)): ?>
													<div class="description">
														<p><?php echo get_post_meta($post->ID, 'subtitulo_slider', true); ?></p>
													</div>
												<?php endif; ?>
											<?php if ($link != ""): ?> </a> <?php endif; ?>
										</div>
									<?php
									endforeach;
								?>
							</div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					<?php
					wp_reset_query();
				?>
			</div>
		</div>
<?php
	get_footer();
?>