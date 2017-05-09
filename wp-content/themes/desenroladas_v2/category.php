<?php get_header(); ?>
<main class="body layout__body">
	<div class="body__wrap">
		<?php my_logo(); ?>
		<?php my_menu( 'categories', 'menu__list', 'nav', 'menu body__menu' ); ?>

		<hr class="layout__hr">

		<section class="entries body__entries body__content">
			<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entries__item' ); ?>>
				<a class="entries__link" href="<?php the_permalink(); ?>">
					<?php my_thumb( 'my-eight-cols-thumb', 'entries__thumb' ); ?>
					<h2 class="entries__title"><?php the_title(); ?></h2>
					<p class="entries__excerpt"><?php the_excerpt(); ?></p>
				</a>
			</article>
			<?php endwhile; ?>
		</section>

		<?php $trend = my_trending_query(); ?>
		<?php if ( $trend->have_posts() ) : ?>
		<aside class="trend body__sidebar">
			<h3 class="trend__heading"><?php _e( 'Trending', 'desenroladas' ); ?></h3>
			<ul class="trend__list">
				<?php while ( $trend->have_posts() ) : $trend->the_post(); ?>
				<li <?php post_class( 'trend__item' ); ?>>
					<a class="trend__link" href="<?php the_permalink(); ?>">
						<div class="trend__thumb" style="background-image: url(<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>);"></div>
						<h4 class="trend__title"><?php the_title(); ?></h4>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</aside>
		<?php endif; ?>

	</div>
</main>
<?php get_footer(); ?>
