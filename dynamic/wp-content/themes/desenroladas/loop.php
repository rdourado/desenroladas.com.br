				<article class="entry">
					<header class="entry-head">
						<p class="entry-category"><?php the_category( ' – ' ) ?></p>
						<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="entry-meta">por <?php the_author_posts_link() ?>
						<span class="entry-date"><?php the_time( $date_format ) ?></span></p>
					</header>
					<div class="content">
						<?php the_content() ?>
					</div>
					<footer class="entry-foot">
						<?php the_tags( '<p class="entry-tags"><b>Tags:</b> ', ' ', '</p>' ) ?>
						<p class="entry-share"></p>
					</footer>
				</article>
