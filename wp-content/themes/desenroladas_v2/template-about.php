<?php
/*
Template name: Sobre nós
*/
?>
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
					<p class="article__author"><?php echo get_theme_mod( 'bloggers' ); ?></p>
				</div>
			</header>
			<div class="article__body">
				<?php the_content(); ?>
			</div>
			<?php $admins = my_users( 'administrator' ); ?>
			<section class="bloggers">
				<?php foreach ( $admins as $admin ) : ?>
				<article class="bloggers__bio">
					<?php echo get_avatar( $admin->id, 640 ); ?>
					<div class="bloggers__content">
						<?php echo wpautop( $admin->meta->description[0] ); ?>
						<ul class="social bloggers__social">
							<?php if ( ! empty( $admin->meta->facebook ) ) : ?>
							<li class="menu-item menu-item--facebook">
								<a href="<?php echo $admin->meta->facebook[0]; ?>" target="_blank">
									<span>Facebook</span>
								</a>
							</li>
							<?php endif; ?>
							<?php if ( ! empty( $admin->meta->twitter ) ) : ?>
							<li class="menu-item menu-item--twitter">
								<a href="<?php echo $admin->meta->twitter[0]; ?>" target="_blank">
									<span>Twitter</span>
								</a>
							</li>
							<?php endif; ?>
							<?php if ( ! empty( $admin->meta->instagram ) ) : ?>
							<li class="menu-item menu-item--instagram">
								<a href="<?php echo $admin->meta->instagram[0]; ?>" target="_blank">
									<span>Instagram</span>
								</a>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</article>
				<?php endforeach; ?>
			</section>

			<?php $users = my_users( 'contributor' ); ?>
			<?php if ( ! empty( $users ) ) : ?>
			<footer class="others others--show-1">
				<h3 class="others__heading">Colaboradores</h3>
				<p class="others__lead">Para um conteúdo mais completo, contamos com a ajuda de vários colaboradores importantes.</p>
				<div class="others__body">
				</div>
				<div class="others__nav">
					<?php foreach ( $users as $user ) : ?>
					<article class="others__bio">
						<?php get_template_part( 'template-parts/others-meta' ); ?>
						<div class="others__content">
							<?php echo wpautop( $user->meta->description[0] ); ?>
						</div>
					</article>
					<?php endforeach; ?>
				</div>
			</footer>
			<?php endif; ?>
		</article>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>
