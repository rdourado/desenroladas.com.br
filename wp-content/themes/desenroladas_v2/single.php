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
				<div class="article__meta">
					<p class="article__author">por <?php the_author(); ?></p>
					<time class="article__date" datetime="<?php the_time( DATE_W3C ); ?>"><?php the_date(); ?></time>
				</div>
			</header>
			<div class="article__body">
				<?php the_content(); ?>
			</div>
			<footer class="article__footer">
				<?php the_tags( '<p class="article__tags">Tags: ', ' – ', '</p>' ); ?>
				<p class="share article__share">
					<b class="share__heading">Share:</b>
					<a class="share__link share__link--facebook" href=""><span>Facebook</span></a>
					<a class="share__link share__link--twitter" href=""><span>Twitter</span></a>
					<a class="share__link share__link--tumblr" href=""><span>Tumblr</span></a>
					<a class="share__link share__link--pinterest" href=""><span>Pinterest</span></a>
				</p>
			</footer>
		</article>
		<?php endwhile; ?>

		<?php $related = my_related_query(); ?>
		<?php if ( $related->have_posts() ) : ?>
		<section class="related">
			<h2 class="related__heading">Artigos relacionados</h2>
			<ul class="related__list">
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
				<li class="related__item">
					<a class="related__link" href="<?php the_permalink(); ?>">
						<?php my_thumb( 'my-three-cols-image', 'related__thumb' ); ?>
						<h4 class="related__title"><?php the_title(); ?></h4>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

		<nav class="body__navigation">
			<?php previous_post_link( '%link', 'Próx' ); ?>
			<?php next_post_link( '%link', 'Ante' ); ?>
		</nav>
	</div>
</main>
<?php get_footer(); ?>
