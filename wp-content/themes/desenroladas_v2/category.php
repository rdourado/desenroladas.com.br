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
		<aside class="trend body__sidebar">
			<h3 class="trend__heading">Trending</h3>
			<ul class="trend__list">
				<li class="trend__item">
					<a class="trend__link" href="">
						<div class="trend__thumb" style="background-image: url(https://dummyimage.com/400x400);"></div>
						<h4 class="trend__title">Viagem por Londres: 4 locais geek para visitar na capital da Inglaterra.</h4>
					</a>
				</li>
				<li class="trend__item">
					<a class="trend__link" href="">
						<div class="trend__thumb" style="background-image: url(https://dummyimage.com/400x400);"></div>
						<h4 class="trend__title">Estrelas Além do Tempo: um filme necessário.</h4>
					</a>
				</li>
				<li class="trend__item">
					<a class="trend__link" href="">
						<div class="trend__thumb" style="background-image: url(https://dummyimage.com/400x400);"></div>
						<h4 class="trend__title">O que você deixou de consumir em 2016?</h4>
					</a>
				</li>
				<li class="trend__item">
					<a class="trend__link" href="">
						<div class="trend__thumb" style="background-image: url(https://dummyimage.com/400x400);"></div>
						<h4 class="trend__title">Conheça o Rodapet: projeto que ajuda a melhorar a qualidade de vida de cães…</h4>
				</a></li>
			</ul>
		</aside>
	</div>
</main>
<?php get_footer(); ?>
