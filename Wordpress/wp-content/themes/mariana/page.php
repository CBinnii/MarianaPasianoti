<?php
	get_header();
?>
	<div class="container">
		<div class="conteudo">
			<div class="about-post">
				<h1 class="title"><?php echo get_the_title(); ?></h1>
			</div>

			<?php if(has_post_thumbnail()){?>
				<div class="image-thumbnail">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full');?>">
				</div>
			<?php }?>
			
			<div class="texto">
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div>
		</div>
	</div>
<?php
	get_footer();
?>