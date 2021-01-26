<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<title>Mariana Pasianoti</title>
		<meta name="description" content="Mariana Pasianoti - Direito Público Empresarial">
		<meta name="keywords" content="Direito Ambiental, Direito Ambiental Jundiaí, Direito Tributário, Direito Tributário Jundiaí, Direito Administrativo, Direito Administrativo Jundiaí, Relação Governamental, Relação Governamental Jundiaí, Direito Público Jundiaí, Direito Público Empresarial, Direito Público"/>
		<meta property="og:url" content="Escritório de advocacia sediado em Jundiaí – interior de São Paulo, especializado em auxiliar empresas de pequeno, médio e grande porte nas suas relações jurídicas com o setor público e no atendimento às exigências legais nas áreas de Direito Tributário, Direito Ambiental, Direito Administrativo e Relação Governamental. ">
		<meta property="og:title" content="Mariana Pasianoti">
		<meta property="og:description" content="Direito Público Empresarial">
		<meta property="og:image" content="<?php echo get_home_url(); ?>/wp-content/uploads/2020/05/screenshot-1024x1024.png">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/fontawesome-free/css/all.min.css" type="text/css" media="all">
		<?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166032393-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-166032393-1');
		</script>
	</head>
	<body>
		<header class="header">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="/">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" width="220px">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
						<!-- <ul class="navbar-nav" id="nav">
							<li class="nav-item current">
								<a class="nav-link" href="#home">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#sobre">Sobre</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#servicos">Serviços</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#blog">Blog</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contato">Contato</a>
							</li>
						</ul> -->
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=> '',
        							'container'       	=> 'ul',
									'menu'				=> 'Menu',
									'menu_class'		=> 'navbar-nav',
									'menu_id'			=> 'nav',
									'echo'				=> true,
									'fallback_cb'		=> 'wp_page_menu',
									'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'				=> 0
								)
							);
						?>
					</div>
				</div>
			</nav>
		</header>