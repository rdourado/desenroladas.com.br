<?php get_header(); ?>
<main class="body layout__body">
	<div class="body__wrap">
		<?php my_logo(); ?>
		<?php my_menu( 'categories', 'menu__list', 'nav', 'menu body__menu' ); ?>

		<hr class="layout__hr">

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'article' ); ?>>
			<header class="article__header">
				<h1 class="article__title"><?php the_title(); ?></h1>
			</header>
			<div class="article__body">
				<?php the_content(); ?>
			</div>
			<footer class="article__footer">
				<p class="share article__share">
					<span>Share:</span>
					<a class="share__link share__link--facebook" href="">Facebook</a>
					<a class="share__link share__link--twitter" href="">Twitter</a>
					<a class="share__link share__link--tumblr" href="">Tumblr</a>
					<a class="share__link share__link--pinterest" href="">Pinterest</a>
				</p>
			</footer>
		</article>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>
