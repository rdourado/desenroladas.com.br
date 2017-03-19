<?php get_header(); ?>
<main class="body layout__body">
	<div class="body__wrap">
		<?php my_logo(); ?>
		<?php my_menu( 'categories', 'menu__list', 'nav', 'menu body__menu' ); ?>
		<hr class="layout__hr">
		<section class="entries body__entries">
			<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entries__item' ); ?>>
				<a class="entries__link" href="<?php the_permalink(); ?>">
					<?php my_thumb( 'my-four-cols-image', 'entries__thumb' ); ?>
					<h2 class="entries__title"><?php the_title(); ?></h2>
					<p class="entries__excerpt"><?php the_excerpt(); ?></p>
				</a>
			</article>
			<?php endwhile; ?>
		</section>
		<?php the_posts_pagination(); ?>
	</div>
</main>
<?php get_footer(); ?>
