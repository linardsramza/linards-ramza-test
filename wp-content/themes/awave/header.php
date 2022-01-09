<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Awave</title>
		<meta name="description" content="Awave website">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row row--space-between">
					<div class="col col--left">
						<div class="logo">
							<a href="<?= get_site_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/primary-logo.webp"></a>
						</div>
					</div>
					<div class="col col--right">
						<div class="mobile-menu-toggle">
							<a href="#" id="menu-toggler"><img src="<?= get_template_directory_uri(); ?>/assets/images/svg/icon-menu.svg" alt="Mobile menu icon"></a>
						</div>
						<nav class="nav-bar">
							<?php
	                            wp_nav_menu([
	                                'menu'            => 'top-menu',
	                                'theme_location'  => 'top-menu'
	                            ]);
                            ?>
						</nav>                    
					</div>
				</div>
				<div class="row">
					<div class="mobile-menu hidden" id="mobile-menu">
						<nav class="nav-bar">
							<?php
	                            wp_nav_menu([
	                                'menu'            => 'top-menu',
	                                'theme_location'  => 'top-menu'
	                            ]);
                            ?>
						</nav> 
					</div>
				</div>
			</div>
		</header>