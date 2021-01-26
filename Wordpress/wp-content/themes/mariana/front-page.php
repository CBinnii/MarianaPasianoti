<?php 
	get_header();
?>
	<div id="home"></div>
	
	<div id="margin"></div>

	<section class="banner">
		<div class="banner-home" id="banner">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide swiper-slide-active">
						<div class="image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/banner-bg-home-1536x782.jpg');">
							<div class="overlay">
								<p>Direito Público Empresarial</p>
								<div class="bottom-border"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div style="min-height: 1000px">
		<div class="section" id="sobre" style="padding-top: 0">
			<div class="sobre">
				<div class="container">
					<h2 class="title">Sobre</h2>
					
					<?php the_field('sobre'); ?>
				</div>
			</div>
		</div>

		<div class="section" id="servicos">
			<div class="servico">
				<div class="container">
					<h2 class="title">Áreas em que atuamos</h2>

					<div class="card-body p-0">
						<ul class="nav nav-tabs horizontal" id="custom-content-below-tab" role="tablist">
							<?php 
								$page = get_page_by_path( 'direito-tributario' );

								if (!is_null($page)) {
							?>
								<li class="nav-item">
									<a class="nav-link active" id="custom-direto-tributario-tab" data-toggle="pill" href="#custom-direto-tributario" role="tab" aria-controls="custom-direto-tributario" aria-selected="true"><i class="fas fa-gavel"></i> <?php echo get_the_title( $page ) ?></a>
								</li>
							<?php }?>
							<?php 
								$page1 = get_page_by_path( 'direito-ambiental' );

								if (!is_null($page1)) {
							?>
								<li class="nav-item">
									<a class="nav-link" id="custom-direito-ambiental-tab" data-toggle="pill" href="#custom-direito-ambiental" role="tab" aria-controls="custom-direito-ambiental" aria-selected="false"><i class="fab fa-envira"></i> <?php echo get_the_title( $page1 ) ?></a>
								</li>
							<?php }?>
							<?php 
								$page2 = get_page_by_path( 'relacao-governamental' );

								if (!is_null($page2)) {
							?>
								<li class="nav-item">
									<a class="nav-link" id="custom-relacao-gov-tab" data-toggle="pill" href="#custom-relacao-gov" role="tab" aria-controls="custom-relacao-gov" aria-selected="false"><i class="fas fa-handshake"></i>  <?php echo get_the_title( $page2 ) ?></a>
								</li>
							<?php }?>
							<?php 
								$page3 = get_page_by_path( 'direito-administrativo' );

								if (!is_null($page3)) {
							?>
								<li class="nav-item">
									<a class="nav-link" id="custom-direito-adm-tab" data-toggle="pill" href="#custom-direito-adm" role="tab" aria-controls="custom-direito-adm" aria-selected="false"><i class="fas fa-hand-holding-usd"></i> <?php echo get_the_title( $page3 ) ?></a>
								</li>
							<?php }?>
						</ul>
						<div class="tab-content" id="custom-content-below-tabContent">
							<?php 
								$page = get_page_by_path( 'direito-tributario' );

								if (!is_null($page)) {
							?>
								<div class="tab-pane fade show active" id="custom-direto-tributario" role="tabpanel" aria-labelledby="custom-direto-tributario-tab">
									<p><?php the_field('resumo', $page->ID); ?></p> 

									<a href="<?php echo get_permalink($page) ?>" class="btn">Ler mais</a>
								</div>
							<?php }?>
							<?php 
								$page1 = get_page_by_path( 'direito-ambiental' );

								if (!is_null($page1)) {
							?>
								<div class="tab-pane fade" id="custom-direito-ambiental" role="tabpanel" aria-labelledby="custom-direito-ambiental-tab">
									<p><?php the_field('resumo', $page1->ID); ?></p>

									<a href="<?php echo get_permalink($page1) ?>" class="btn">Ler mais</a>
								</div>
							<?php }?>
							<?php 
								$page2 = get_page_by_path( 'relacao-governamental' );

								if (!is_null($page2)) {
							?>
								<div class="tab-pane fade" id="custom-relacao-gov" role="tabpanel" aria-labelledby="custom-relacao-gov-tab">
									<p><?php the_field('resumo', $page2->ID); ?></p>

									<a href="<?php echo get_permalink($page2) ?>" class="btn">Ler mais</a>
								</div>
							<?php }?>
							<?php 
								$page3 = get_page_by_path( 'direito-administrativo' );

								if (!is_null($page3)) {
							?>
								<div class="tab-pane fade" id="custom-direito-adm" role="tabpanel" aria-labelledby="custom-direito-adm-tab">
									<p><?php the_field('resumo', $page3->ID); ?></p>

									<a href="<?php echo get_permalink($page3) ?>" class="btn">Ler mais</a>
								</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section" id="blog">
			<?php 
				$args = array(
					'post_type' => 'post',
					'status' => 'publish',
					'showposts' => 5
				);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
				?>
					<div class="container">
						<h2 class="title">Blog</h2>
					</div>

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
				<?php
				endif;

				wp_reset_query();
			?>
		</div>

		<div class="section" id="contato">
			<div class="contato">
				<div class="white">
					<h2 class="title">Contato</h2>
				</div>
				<div class="bg-color row">
					<div class="col-sm-6 mapa">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14670.570409722943!2d-46.893309!3d-23.1832408!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x61666063f7191634!2sGolden%20Office%20-%20Business%20%26%20Mall!5e0!3m2!1spt-BR!2sbr!4v1587793605666!5m2!1spt-BR!2sbr" width="600" height="520" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<div class="col-sm-5 contact-form">
						<div class="form">
							<?php 
								if ( is_active_sidebar( 'contact-form' ) ) :
									dynamic_sidebar( 'contact-form' );
								endif; 
							?>
							<div id="alert"></div>
							<!-- <form action="/#wpcf7-f44-o1" method="post" class="wpcf7-form" novalidate="novalidate"> -->
								<!-- <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
								<div class="row adjusting-row">
									<div class="col-sm-6 adjusting-col">
										<input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
								   </div>
									<div class="col-sm-6 adjusting-col">
										<input type="tel" name="telefone" id="telefone" value="" size="40" class="form-control" placeholder="Telefone">
								   </div>
								</div>
								<input type="text" name="assunto" id="assunto" class="form-control" placeholder="Assunto">
								<textarea name="mensagem" id="mensagem" cols="40" rows="10" class="form-control" placeholder="Mensagem"></textarea>
								<input type="submit" value="Enviar" id="send" class="enviar btn btn-default"> -->
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	get_footer();
?>