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
						<?php echo apply_filters('the_content', $post->post_content); ?>
					</div>
					<div class="row treino">
						<?php 
							$args = array(
								'post_type' => 'treino',
								'status' => 'publish'
							);
							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
									$data = get_post_meta( get_the_ID(), 'datepicker', true );
						?>
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="treinamento">
								<div class="data"><p>
									<?php 
										if(empty($data)){
											echo "Data não informada.";
										}else{
											$data = DateTime::createFromFormat("d/m/Y", $data);
											echo date("d M Y", $data->getTimestamp()); 
										}
									?>
								</p></div>
								<div class="titulo"><p><?php echo get_the_title(); ?></p></div>
								<p><a href="<?php echo get_permalink(); ?>" class="btn btn-primary" role="button">Detalhes</a></p>
							</div>
						</div>
						<?php
								endwhile;
							endif;

							wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
<?php 
	get_footer();
?>