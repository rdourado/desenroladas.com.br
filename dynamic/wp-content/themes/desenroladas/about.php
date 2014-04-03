<?php 
/*
Template name: About
*/
?>
<?php get_header() ?>
		<main class="main">
			<div class="body">
<?php 			while( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'entry h-entry' ) ?>>
					<header class="entry-head">
						<p class="heading" lang="en">about</p>
						<h2 class="entry-title p-name"><a class="u-url" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					</header>
					<div class="content e-content">
						<?php the_content() ?>
						
					</div>
				</article>
<?php 			endwhile; ?>
<?php 			if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
<?php 		get_sidebar() ?>
		</main>
<?php get_footer() ?>
