<form id="search" class="find head__find" action="<?php echo home_url( '/' ); ?>" method="get">
	<button id="toggle-search" type="button" class="find__toggle">
		<span>Mostrar busca</span>
	</button>
	<fieldset class="find__fs">
		<legend class="find__title">Busca</legend>
		<div class="find__wrap">
			<input class="find__input" type="search" name="s" id="s" required aria-required="true" aria-label="Procurar por" value="<?php the_search_query(); ?>">
			<button class="find__submit" type="submit">Ok</button>
		</div>
	</fieldset>
</form>
