<form id="searchform" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>">
	<label><span class="screen-reader-text">Search for:</span></label>
	<div class="field has-addons">
		<div class="control">
			<input type="search" class="input search-field" placeholder="search..." value="<?php get_search_query() ?>" name="s" />
		</div>
		<div class="control">
			<button type="submit" class="search-submit button">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</div>
</form>

