<?php get_header() ?>
		<main class="main">
			<div class="body">
<?php 			while( have_posts() ) : 
					the_post();
					get_template_part( 'loop', $post->post_type );
				endwhile; ?>
<?php 			if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
<?php 		get_sidebar() ?>
		</main>
<?php get_footer() ?>