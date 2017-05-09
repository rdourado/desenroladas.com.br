		<hr class="layout__hr">
		<footer class="foot layout__foot">
			<div class="foot__wrap">
				<h4 class="by foot__by">
					<b class="by__logo"><span><?php bloginfo( 'name' ); ?></span></b>
					<em class="by__names"><?php echo get_theme_mod( 'bloggers', __( 'por Clara e Gabi Dourado', 'desenroladas' ) ); ?></em>
				</h4>
				<?php my_menu( 'footer', 'nav-foot foot__nav' ); ?>
				<?php my_social_menu( 'social foot__social' ); ?>
				<form action="" method="post" class="news news--closed">
					<fieldset class="news__wrap">
						<legend class="news__title"><?php _e( 'Assine nossa newsletter!', 'desenroladas' ); ?></legend>
						<label for="email" class="news__label"><?php _e( 'Para novidades e atualizações, assine nossa newsletter!', 'desenroladas' ); ?></label>
						<input type="email" name="email" id="email" class="news__input" placeholder="<?php _e( 'seu email', 'desenroladas' ); ?>" required aria-required="true">
						<button type="submit" class="news__submit"><?php _e( 'assinar', 'desenroladas' ); ?></button>
					</fieldset>
					<button type="button" class="news__close">X</button>
				</form>
				<?php if ( $url = get_theme_mod( 'designer_url' ) ) : ?>
				<a href="<?php echo $url; ?>" target="_blank" class="foot__copyright">
					<?php echo get_theme_mod( 'designer_name', __( 'Layout por Studio Lilo', 'desenroladas' ) ); ?>
				</a>
				<?php endif; ?>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
