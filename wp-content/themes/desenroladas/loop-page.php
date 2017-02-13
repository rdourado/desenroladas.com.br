				<article <article <?php post_class( 'entry h-entry' ) ?>>>
					<header class="entry-head">
						<h2 class="entry-title p-name"><a class="u-url" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					</header>
					<div class="content e-content">
						<?php the_content() ?>
					</div>
					<footer class="entry-foot">
						<p class="entry-share"></p>
					</footer>
				</article>
