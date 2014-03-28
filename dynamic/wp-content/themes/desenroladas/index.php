<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?>>
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title() ?></title>
		<link href="<?php bloginfo( 'template_url' ) ?>/css/screen.css" media="screen, projection" rel="stylesheet">
		<!-- WP/ --><?php wp_head() ?><!-- /WP -->
	</head>
	<body <?php body_class() ?>>
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
		<main class="main">
			<section class="hero" id="hero">
				<div class="viewport">
					<ul class="hero-list overview">
						<li class="hero-item">
							<a href="#">
								<img alt="" height="400" src="http://dummyimage.com/960x400" width="960">
								<p class="hero-category">Moda</p>
								<h2 class="hero-title">Iury Costa lança coleção inspirada na história de Fortaleza</h2>
								<p class="hero-more">Leia mais</p>
							</a>
						</li>
						<li class="hero-item">
							<a href="#">
								<img alt="" height="400" src="http://dummyimage.com/960x400" width="960">
								<p class="hero-category">Moda</p>
								<h2 class="hero-title">Iury Costa lança coleção inspirada na história de Fortaleza</h2>
								<p class="hero-more">Leia mais</p>
							</a>
						</li>
						<li class="hero-item">
							<a href="#">
								<img alt="" height="400" src="http://dummyimage.com/960x400" width="960">
								<p class="hero-category">Moda</p>
								<h2 class="hero-title">Iury Costa lança coleção inspirada na história de Fortaleza</h2>
								<p class="hero-more">Leia mais</p>
							</a>
						</li>
					</ul>
				</div>
				<ul class="bullets">
					<li><a class="bullet" href="#">1</a></li>
					<li><a class="bullet" href="#">2</a></li>
					<li><a class="bullet" href="#">3</a></li>
				</ul>
			</section>
			<section class="features">
				<ul class="feature-list">
					<li class="feature-item">
						<a href="#">
							<img alt="" height="200" src="http://dummyimage.com/310x200" width="310">
							<p class="feature-category">Moda</p>
							<h2 class="feature-title">Alessandra Ambrósio para Vogue Brasil</h2>
						</a>
					</li>
					<li class="feature-item">
						<a href="#">
							<img alt="" height="200" src="http://dummyimage.com/310x200" width="310">
							<p class="feature-category">Moda</p>
							<h2 class="feature-title">Alessandra Ambrósio para Vogue Brasil</h2>
						</a>
					</li>
					<li class="feature-item">
						<a href="#">
							<img alt="" height="200" src="http://dummyimage.com/310x200" width="310">
							<p class="feature-category">Moda</p>
							<h2 class="feature-title">Alessandra Ambrósio para Vogue Brasil</h2>
						</a>
					</li>
				</ul>
			</section>
			<hr>
			<div class="ad">
				<img alt="" height="90" src="http://dummyimage.com/728x90" width="728">
			</div>
			<hr>
			<div class="body">
<?php 			while( have_posts() ) : the_post(); ?>
				<article class="entry">
					<header class="entry-head">
						<p class="entry-category"><?php the_category( ' – ' ) ?></p>
						<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="entry-meta">por <?php the_author_posts_link() ?>
						<span class="entry-date"><?php the_time( $date_format ) ?></span></p>
					</header>
					<div class="content">
						<?php the_content() ?>
					</div>
					<footer class="entry-foot">
						<?php the_tags( '<p class="entry-tags"><b>Tags:</b> ', ' ', '</p>' ) ?>
						<p class="entry-share"></p>
					</footer>
				</article>
<?php 			endwhile; ?>
<?php 			if ( is_single() ) :
					$tags = wp_get_post_tags( $post->ID );
					if ( $tags ) :
						$tag_ids = array();
						foreach ( $tags as $individual_tag )
							$tag_ids[] = $individual_tag->term_id;  
						$args = array(
							'tag__in'             => $tag_ids,
							'post__not_in'        => array( $post->ID ),
							'posts_per_page'      => 2,
							'ignore_sticky_posts' => 1,
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) : ?>
				<section class="related-posts">
					<h2 class="related-heading">Relacionados</h2>
					<ul class="related-list">
<?php 					while( $loop->have_posts() ) : $loop->the_post(); ?>
						<li class="related-item">
							<a href="<?php the_permalink() ?>">
								<img alt="" height="200" src="http://dummyimage.com/310x200" width="310">
								<p class="related-category"><?php the_category( ' – ' ) ?></p>
								<h2 class="related-title"><?php the_title() ?></h2>
							</a>
						</li>
<?php 					endwhile; ?>
					</ul>
				</section>
<?php 					endif;
					endif;
					wp_reset_postdata();
				endif; ?>
			</div>
			<hr>
			<div class="side">
<?php 			dynamic_sidebar() ?>
				<!-- <aside class="widget widget-about">
					<h3 class="widget-title">Sobre nós</h3>
					<a class="about-link" href="#">
						<p><img alt="" height="270" src="http://dummyimage.com/300x270" width="300"></p>
						<p>Somos a Gabi e a Clara, uma dupla de jornalistas que desenrola tudo sobre moda, beleza, estilo e comportamento. 
						<strong>Leia mais</strong></p>
					</a>
					<a class="about-everyone" href="#">
						<figure class="about-collaborators">
							<img alt="" class="collaborator-image" height="69" src="http://dummyimage.com/69x69" width="69">
							<figcaption class="collaborator-caption">Iury Costa</figcaption>
						</figure>
						<p>Para um conteúdo mais completo, contamos com a ajuda de vários colaboradores importantes.<br><strong>Conheça todos</strong></p>
					</a>
				</aside>
				<aside class="widget widget-ad">
					<h3 class="widget-title">AD</h3>
					<img alt="" height="250" src="http://dummyimage.com/300x250" width="300">
				</aside>
				<aside class="widget widget-instagram">
					<h3 class="widget-title">Instagram</h3>
				</aside>
				<aside class="widget widget-facebook">
					<h3 class="widget-title">Siga nossa página no Facebook</h3>
				</aside>
				<aside class="widget widget-blogroll">
					<h3 class="widget-title">Blogroll</h3>
					<ul>
						<li><a href="#">4th and bleeker</a></li>
						<li><a href="#">a pair and a spare</a></li>
						<li><a href="#">a. leigh smith</a></li>
						<li><a href="#">baby is a sinner</a></li>
						<li><a href="#">born to be wild</a></li>
						<li><a href="#">color me nana</a></li>
						<li><a href="#">coming clean photo</a></li>
						<li><a href="#">design sponge</a></li>
						<li><a href="#">fashion gone rogue</a></li>
						<li><a href="#">free people on facebook</a></li>
						<li><a href="#">free people on google+</a></li>
						<li><a href="#">free people on instagram</a></li>
					</ul>
				</aside>
				<aside class="widget widget-social">
					<h3 class="widget-title">Siga-nos</h3>
				</aside> -->
			</div>
		</main>
		<hr>
		<footer class="foot">
			<nav class="nav-foot">
				<?php wp_nav_menu( "container=&theme_location=secondary&menu_class=menu-foot" ) ?>

			</nav>
			<p class="copyright">
				<img alt="<?php bloginfo( 'name' ) ?>" class="copy-logo" height="21" src="<?php bloginfo( 'template_url' ) ?>/img/logo-mini@2x.png" width="99">
				– por Clara e Gabi Dourado
			</p>
		</footer>
		<!-- Facebook -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=170976276406736";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!-- WP/ --><?php wp_footer() ?><!-- /WP -->
	</body>
</html>