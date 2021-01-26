<?php 
	get_header();

	$tag = get_queried_object();
	$tagID = $tag->term_id;
?>
	<div class="pb-4">
		<div class="container">
			<h2 class="title"><?php echo $tag->name ?></h2>
			
			<div class="grid row">
				<?php
					$args = array(
						'post_type' => 'post',
						'status' => 'publish',
						'showposts' => -1,
						'tag__in' => $tagID,
						's' => $s,
						'paged' => $paged
					);

					$more = new WP_Query( $args );
					
					if (!empty($more->posts)): ?>
					<?php
						foreach ( $more->posts as $post ):
							$categories = get_the_category(get_the_ID());
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
						<?php 
						endforeach;
					else :
					?>
						<div class="conteudo">
							<div class="texto">
								<h1 class="text-center">NENHUM POST RELACIONADO A ESTA TAG</h1>
							</div>
						</div>
					<?php
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</div>
<?php
	get_footer();
?>