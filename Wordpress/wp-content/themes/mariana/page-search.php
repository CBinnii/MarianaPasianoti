<?php
	get_header();
?>
	<div class="container">
		<div class="conteudo">
			<div class="about-post">
				<?php
					global $post;
					global $s;
				?>
				<h1 class="title"><?php echo "Pesquisa por: '" . $s ."'"; ?></h1>
			</div>

			<div class="grid row">
				<?php 
					if(isset($s)) {
						$args = array(
							'post_type' => 'post',
							'status' => 'publish',
							'showposts' => -1,
							's' => $s
						);

						$more = new WP_Query( $args );
						
						if (!empty($more->posts)): 
							foreach ( $more->posts as $post ): 
								$categories = get_the_category($post->ID);
								?>
								<div class="blog col-sm-6 col-md-4 p-0" style="<?php if(has_post_thumbnail()){?>background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>')<?php }?>">
									<a href="<?php echo get_the_permalink(); ?>" class="more">
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
							<?php endforeach;
						endif;
						wp_reset_query();
					?>
				<?php 
					} else {
				?>
					<div class="title">
						<h1>Nothing Found</h1>
					</div>
					<div class="excerpt">
						<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
					</div>
				<?php 
					}
				?>
			</div>
		</div>
	</div>
		<div class="content">
			<div class="nyheter">
				<div class="container">
				</div>
			</div>
		</div>
<?php 
	get_footer();
?>