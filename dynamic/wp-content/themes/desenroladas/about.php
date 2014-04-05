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
						<h1 class="entry-title p-name"><a class="u-url" href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
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
									<a href="#"><img alt="Facebook" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-facebook.png" width="24"></a>
									<a href="#"><img alt="Twitter" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-twitter.png" width="24"></a>
									<a href="#"><img alt="Instagram" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-instagram.png" width="24"></a>
								</p>
							</li>
<?php 						endwhile; ?>
						</ul>
<?php 					endif; ?>
					</div>

<?php 				$users = new WP_User_Query( array( 'role' => 'Contributor' ) );
					if ( $users->results ) : ?>
					<div class="entry-head">
						<p class="heading" lang="en">about</p>
						<h2 class="entry-title">Colaboradores</h2>
					</div>
					<div class="content">
						<p class="half-col">Para um conteúdo mais completo, contamos com a ajuda de vários colaboradores importantes.</p>
						<ul class="contributors">
<?php 						foreach ( $users->results as $user ) : ?>
							<li class="contributor-item">
								<?php echo get_avatar( $user->user_email, 114, 'identicon', $user->display_name ); ?>
								<div class="contributor-info">
									<?php echo get_avatar( $user->user_email, 160, 'identicon', $user->display_name ); ?>
									<?php echo apply_filters( 'the_content', $user->user_description ); ?>
									<a href="<?php echo get_author_posts_url( $user->ID ) ?>" class="contributor-link">Posts</a>
									<div class="contributor-social">
										<a href="#"><img alt="Facebook" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-blk-facebook.png" width="24"></a>
										<a href="#"><img alt="Twitter" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-blk-twitter.png" width="24"></a>
										<a href="#"><img alt="Instagram" class="2x" height="24" src="<?php bloginfo( 'template_url' ) ?>/img/icon-24-blk-instagram.png" width="24"></a>
									</div>
								</div>
							</li>
<?php 						endforeach; ?>
						</ul>
					</div>
<?php 				endif; ?>
				</article>
<?php 			endwhile; ?>
<?php 			if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
		</main>
<?php get_footer() ?>
