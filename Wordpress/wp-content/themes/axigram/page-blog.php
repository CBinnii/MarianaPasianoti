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
						<p><?php echo apply_filters('the_content', $post->post_content); ?></p>
					</div>
					<div class="main">
						<ul id="og-grid" class="blog-grid">
							<?php
								$args = array(
									'post_type' => 'post',
									'status' => 'publish',
									'showposts' => 3,
									'paged' => $paged
								);

								$more = new WP_Query( $args );
								
								if (!empty($more->posts)): 
									foreach ( $more->posts as $post ): ?>
										<li class="col-xs-12 col-sm-6 col-md-4">
											<div class="blog">
												<a class="detalhes" href="<?php echo get_the_permalink(); ?>">
													<div class="image" style="<?php if(has_post_thumbnail()){?>background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>')<?php }?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title($post->ID); ?>"></div>
													<div class="mostrar blog-detalhe">
														<div class="legenda"><?php echo get_the_title($post->ID); ?></div>
													</div>
												</a>
											</div>
										</li>
									<?php 
									endforeach;
									?>
									<div class="clearfix"></div>
									<?php echo paginatorNews($more);
								endif;
								wp_reset_query();
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
		<!-- data-largesrc="<?php //echo wp_get_attachment_url($image); ?>" data-title="<?php //echo get_the_title(); ?>" data-description="<?php //echo apply_filters ('the_content', str_replace("\"", "'", $post->descricao_produto)); ?>" -->
<?php
	get_footer();
?>
