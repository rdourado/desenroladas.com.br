<?php get_header() ?>
		<main class="main">
<?php 		if ( get_field( 'destaques', 'options' ) ) : ?>
			<section class="hero" id="hero">
				<a class="buttons prev" href="#">&#60;</a>
				<div class="viewport">
					<ul class="hero-list overview">
<?php 					while ( has_sub_field( 'destaques', 'options' ) ) :
						$class = array( get_sub_field( 'cor' ), get_sub_field( 'posicao' ) );
						$class = array_filter( $class ); 
						$sep = ' hero-';
						if ( $class ) 
							$class = $sep . implode( $sep, $class ); ?>
						<li class="hero-item<?php echo $class; ?>">
							<a href="<?php the_permalink() ?>">
								<?php my_acf_thumbnail( get_sub_field( 'imagem' ) ) ?>
								<div class="hero-table">
									<div class="hero-cell">
										<p class="hero-category"><?php my_the_category() ?></p>
										<h2 class="hero-title"><?php the_title() ?></h2>
										<p class="hero-more">Leia mais</p>
									</div>
								</div>
							</a>
						</li>
<?php 					endwhile; ?>
					</ul>
				</div>
				<a class="buttons next" href="#">&#62;</a>
				<ul class="bullets">
<?php 				$i = 0;
					while ( has_sub_field( 'destaques', 'options' ) ) : ?>
					<li><a class="bullet" data-slide="<?php echo $i++; ?>" href="#"><?php echo $i; ?></a></li>
<?php 				endwhile; ?>
				</ul>
			</section>
<?php 		endif; ?>
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
			<!-- <div class="ad">
				<img alt="" height="90" src="http://dummyimage.com/728x90" width="728">
			</div>
			<hr> -->
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
<?php 			if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
<?php 		get_sidebar() ?>
		</main>
<?php get_footer() ?>