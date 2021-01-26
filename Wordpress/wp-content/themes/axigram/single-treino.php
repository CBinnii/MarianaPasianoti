<?php 
	get_header();
	wp_head();
?>
		<div class="content">
			<div class="bg-top"></div>
			<div class="container">
				<div class="title">
					<?php echo get_the_title(); ?>
				</div>
				<div class="divisor">
					<span class="borda magenta"></span>
					<span class="borda"></span>
				</div>
				<div class="conteudo">
					<div class="texto">
						<p><?php echo apply_filters('the_content', $post->descricao_treino); ?></p>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
<?php get_footer();?>