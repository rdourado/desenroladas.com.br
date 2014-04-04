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
						
<?php 					if ( get_field( 'users' ) ) : ?>
						<ul class="bloggers">
<?php 						while ( has_sub_field( 'users' ) ) : 
							$user = get_sub_field( 'user' ); ?>
							<li class="blogger">
								<?php my_acf_thumbnail( get_sub_field( 'image' ), 'large', 'blogger-image' ); ?>
								<?php echo apply_filters( 'the_content', $user['user_description'] ); ?>
								<p class="blogger-social">
									<a href="#"><img alt="Facebook" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-facebook.png" width="24"></a>
									<a href="#"><img alt="Twitter" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-twitter.png" width="24"></a>
									<a href="#"><img alt="Instagram" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-instagram.png" width="24"></a>
								</p>
							</li>
<?php 						endwhile; ?>
						</ul>
<?php 					endif; ?>
					</div>
				</article>
<?php 			endwhile; ?>
<?php 			if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
		</main>
<?php get_footer() ?>
