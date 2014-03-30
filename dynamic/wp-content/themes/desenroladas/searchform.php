<form action="<?php echo home_url( '/' ) ?>" class="searchform" id="searchform" method="get" role="search">
	<fieldset>
		<legend>Busca</legend>
		<input aria-label="Procurar por" aria-required="true" id="s" name="s" placeholder="Digite sua busca e tecle ‘enter’" required type="text" value="<?php the_search_query() ?>">
		<button id="searchsubmit" type="submit">Ok</button>
	</fieldset>
</form>