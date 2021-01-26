<?php 
	get_header();

	$page_id = get_the_id();
?>
	<div class="container">
		<div class="conteudo">
			<div class="about-post">
				<h1 class="title"><?php echo get_the_title(); ?></h1>
				<p> 
					Publicado em <?php echo date('d/m/Y', strtotime($post->post_date)); ?>, por <span>
					<?php
						$post_author = get_post_field( 'post_author', $post->ID );
						echo the_author_meta( 'nickname', $post_author ) 
					?> </span>
				</p>
			</div>

			<?php if(has_post_thumbnail()){?>
				<div class="image-thumbnail">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>">
				</div>
			<?php }?>
			
			<div class="texto">
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div>

			<?php 
				$categorias = get_the_category(get_the_ID());
				
				foreach ($categorias as $categoria) {
					$in = $categoria->cat_ID;
				}

				$args = array(
					'post_type' => 'post',
					'status' => 'publish',
					'showposts' => 3,
					'cat' => $in,
					'post__not_in' => array($page_id)
				);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
				?>
					<div class="relacionados">
						<div class="title">Relacionados</div>
						<div class="grid">
							<?php
								while ( $the_query->have_posts() ) :
									$the_query->the_post();

									$categories = get_the_category(get_the_ID());
							?>
								<div class="blog" style="<?php if(has_post_thumbnail()){?>background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>')<?php }?>">
									<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="more">
										<div class="center">
											<h1><?php echo get_the_title(); ?></h1>
											<div class="border-line"></div>
											<p>
												<?php
													foreach($categories as $category){
														echo $category->name;
													}
												?>
											</p>
										</div>
									</a>
								</div>
							<?php
								endwhile;
							?>
						</div>
					</div>
				<?php
				endif;

				wp_reset_query();
			?>
		</div>
	</div>
<?php
	get_footer();
?>