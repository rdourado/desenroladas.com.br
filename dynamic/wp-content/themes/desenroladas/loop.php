				<article <?php post_class( 'entry h-entry' ) ?>>
					<header class="entry-head">
						<p class="entry-category"><?php the_category( ' – ' ) ?></p>
						<h2 class="entry-title p-name"><a class="u-url" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="entry-meta">
							por <?php the_author_posts_link() ?>
							<time class="entry-date dt-published" datetime="<?php 
							echo get_the_time( 'c' ); ?>"><?php the_time( $date_format ) ?></time>
							<?php edit_post_link( 'editar post', ' | ' ) ?>
						</p>
					</header>
					<div class="content e-content">
						<?php the_content() ?>

<?php 					if ( get_field( 'users' ) ) : ?>
						<ul class="bloggers">
<?php 						while ( has_sub_field( 'users' ) ) :
							$user = get_userdata( get_sub_field( 'user' ) ); ?>
							<?php var_dump(get_sub_field( 'image' )); ?>
							<li class="blogger">
								<?php my_acf_thumbnail( get_sub_field( 'image' ), 'full' ); ?>
								<div class="blogger-body">
									<p><?php echo $user->description; ?></p>
									<div class="blogger-social">
										
									</div>
								</div>
							</li>
<?php 						endwhile; ?>
						</ul>
<?php 					endif; ?>
					</div>
					<footer class="entry-foot">
						<?php the_tags( '<p class="entry-tags"><b>Tags:</b> ', ' ', '</p>' ) ?>
						<p class="entry-share"></p>
					</footer>
				</article>
<?php 			if ( is_single() ) : ?>
				<div class="entry-comment">
					<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="620" data-numposts="5" data-colorscheme="light"></div>
				</div>
<?php 			endif; ?>
