<?php get_header() ?>
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
<?php 		$sticky = new WP_Query( array(
				'posts_per_page' => 3,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
			) );
			if ( $sticky->have_posts() ) : ?>
			<section class="features">
				<ul class="feature-list">
<?php 				while ( $sticky->have_posts() ) : $sticky->the_post(); ?>
					<li class="feature-item">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail() ?>
							<p class="feature-category"><?php my_the_category( ' – ' ) ?></p>
							<h2 class="feature-title"><?php the_title() ?></h2>
						</a>
					</li>
<?php 				endwhile; ?>
				</ul>
			</section>
<?php 		endif;
			wp_reset_query(); ?>
			<hr>
			<div class="ad">
				<img alt="" height="90" src="http://dummyimage.com/728x90" width="728">
			</div>
			<hr>
			<div class="body">
<?php 			while( have_posts() ) : 
					the_post();
					get_template_part( 'loop', 'post' );
				endwhile; ?>
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
								<?php the_post_thumbnail() ?>
								<p class="related-category"><?php the_category( ' – ' ) ?></p>
								<h2 class="related-title"><?php the_title() ?></h2>
							</a>
						</li>
<?php 					endwhile; ?>
					</ul>
				</section>
<?php 					endif;
					endif;
					wp_reset_query();
				endif; ?>
			</div>
<?php 		get_sidebar() ?>
		</main>
<?php get_footer() ?>