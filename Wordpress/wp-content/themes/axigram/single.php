<?php
	get_header();

	$page_id = get_the_id();
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
						<?php if(has_post_thumbnail()){?>
							<img class="aligncenter" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>">
						<?php }?>
						<?php echo apply_filters('the_content', $post->post_content); ?>
					</div>


					<div class="title produtos">Relacionados</div>
					<div class="divisor">
						<span class="borda magenta"></span>
						<span class="borda"></span>
					</div>

					<div class="main">
						<ul id="og-grid" class="blog-grid">
							<?php 
								$args = array(
									'post_type' => 'post',
									'status' => 'publish',
									'showposts' => 3,
									'post__not_in' => array($page_id)
								);
								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();

										$image = get_post_meta( get_the_ID(), 'image_produto', true );
								?>
									<li class="col-xs-12 col-sm-6 col-md-4">
										<div class="blog">
											<a class="detalhes" href="<?php echo get_the_permalink(get_the_ID()); ?>">
												<div class="image" style="<?php if(has_post_thumbnail()){?>background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>')<?php }?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></div>
												<div class="mostrar">
													<div class="legenda"><?php echo get_the_title(); ?></div>
												</div>
											</a>
										</div>
									</li>
								<?php
									endwhile;
								endif;

								wp_reset_query();
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
<?php
	get_footer();
?>
