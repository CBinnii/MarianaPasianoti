<?php 
	get_header();
?>
		<div class="content">
			<div class="bg-top"></div>
			<div class="container">
				<div class="title">
					<?php
						$image = get_post_meta( get_the_ID(), 'image_titulo', true );
						$title = get_the_title();

						if (empty($image)) {
							echo $title;
						} else {
					?>
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="Título">
					<?php
						}
					?>
				</div>
				<div class="divisor">
					<span class="borda magenta"></span>
					<span class="borda"></span>
				</div>
				<div class="conteudo">
					<div class="texto">
						<p><?php echo apply_filters('the_content', $post->post_content); ?></p>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
<?php
	get_footer();
?>