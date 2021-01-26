<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Axigram - <?php echo get_the_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<meta name="keywords" content="solst, toque seco, fps50, protetor solar, axigram, solticio">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
		<?php wp_head(); ?>
	</head>
	<body>
		<?php if ( !(is_front_page()) ) { ?>
			<div id="go-top"></div>
		<?php } ?>
		<header class="header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>">
							<img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="Logo">
						</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=> '',
									'menu'				=> 'Menu',
									'menu_class'		=> 'nav navbar-nav navbar-right',
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