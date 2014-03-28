<?php get_header() ?>
		<main class="main">
			<div class="body">
<?php 			while( have_posts() ) : 
					the_post();
					get_template_part( 'loop', 'post' );
				endwhile; ?>
<?php 			$tags = wp_get_post_tags( $post->ID );
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
<?php 				endif;
				endif;
				wp_reset_query(); ?>
			</div>
<?php 		get_sidebar() ?>
		</main>
<?php get_footer() ?>