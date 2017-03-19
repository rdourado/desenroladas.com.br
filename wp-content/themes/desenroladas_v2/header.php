<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'layout' ); ?>>
		<!-- <div class="grid">
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
			<div class="grid__col"></div>
		</div> -->
		<header class="head layout__head">
			<div class="head__wrap">
				<?php get_search_form(); ?>
				<nav id="menu" class="nav-head head__nav">
					<button id="toggle-menu" class="nav-head__toggle" type="button">
						<span>Mostrar menu</span>
					</button>
					<div class="nav-head__wrap">
						<?php my_menu( 'header', 'nav-head__list' ); ?>
						<button id="close-menu" class="nav-head__close" type="button">X</button>
					</div>
				</nav>
				<?php my_social_menu( 'social head__social' ); ?>
			</div>
		</header>
		<hr class="layout__hr">
