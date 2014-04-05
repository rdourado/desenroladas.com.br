<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?>>
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title() ?></title>
		<link href="<?php bloginfo( 'template_url' ) ?>/css/screen.css" media="screen, projection" rel="stylesheet">
		<!-- WP/ --><?php wp_head() ?><!-- /WP -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-49535755-1', 'desenroladas.com.br');
		  ga('send', 'pageview');
		</script>
	</head>
	<body <?php body_class() ?>>
		<!-- Facebook -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=170976276406736";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--  -->
		<header class="head">
			<h1 class="logo"><a href="<?php bloginfo( 'url' ) ?>"><img alt="<?php bloginfo( 'name' ) ?>" class="2x" height="100" src="<?php bloginfo( 'template_url' ) ?>/img/logo.png" width="477"></a></h1>
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
