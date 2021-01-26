<?php
	get_header();

	$page_id = get_the_id();
?>
		<div class="produto-page"></div>
		
		<div class="content">
			<div class="top"></div>
			<div class="container">
				<div class="title"><?php echo get_the_title(); ?></div>
				<div class="divisor">
					<span class="borda magenta"></span>
					<span class="borda"></span>
				</div>
				<div class="conteudo">
					<div class="texto">
						<img class="aligncenter" src="<?php echo wp_get_attachment_url(get_post_meta( get_the_ID(), 'image_produto', true )); ?>">
						<?php echo apply_filters ('the_content', str_replace("\"", "'", $post->descricao_produto)); ?>
					</div>


					<div class="title produtos">Mais produtos</div>
					<div class="divisor">
						<span class="borda magenta"></span>
						<span class="borda"></span>
					</div>

					<div class="main">
						<ul id="og-grid" class="og-grid">
							<?php 
								$args = array(
									'post_type' => 'produto',
									'status' => 'publish',
									'post__not_in' => array($page_id)
								);
								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
										$the_query->the_post();

										$image = get_post_meta( get_the_ID(), 'image_produto', true );
								?>
									<li class="col-xs-6 col-sm-4 col-md-3">
										<div class="produto">
											<a class="detalhes" href="<?php echo get_the_permalink(get_the_ID()); ?>">
												<div class="image" style="background-image: url('<?php echo wp_get_attachment_url($image); ?>');" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></div>
												<div class="legenda"><?php echo get_the_title(); ?></div>
												<div class="mostrar"></div>
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
