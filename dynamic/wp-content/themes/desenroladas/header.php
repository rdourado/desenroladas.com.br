<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?>>
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title() ?></title>
		<link href="<?php bloginfo( 'template_url' ) ?>/css/screen.css" media="screen, projection" rel="stylesheet">
		<!-- WP/ --><?php wp_head() ?><!-- /WP -->
	</head>
	<body <?php body_class() ?>>
		<!-- Facebook -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=170976276406736";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--  -->
		<header class="head">
			<h1 class="logo"><a href="<?php bloginfo( 'url' ) ?>"><img alt="<?php bloginfo( 'name' ) ?>" height="100" src="<?php bloginfo( 'template_url' ) ?>/img/logo@2x.png" width="477"></a></h1>
			<nav class="nav-main">
				<?php wp_nav_menu( "container=&theme_location=primary&menu_class=menu-main" ) ?>

				<div class="wrap-categories">
					<a class="toggle-menu-categories" href="#categories">Todas as categorias</a>
					<ul class="menu-categories" id="categories">
<?php 					echo str_replace( "\t", str_repeat( "\t", 6 ), wp_list_categories( "title_li=&echo=0" ) ); ?>
					</ul>
				</div>
			</nav>
		</header>
		<hr>
