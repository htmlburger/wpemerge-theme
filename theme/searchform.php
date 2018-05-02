<form action="<?php echo home_url( '/' ); ?>" class="search-form" method="get" role="search">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'app' ); ?></span>

		<input type="text" title="<?php _e( 'Search for:', 'app' ); ?>" name="s" value="" id="s" placeholder="<?php _e( 'Search &hellip;', 'app' ); ?>" class="search-form__field" />
	</label>

	<input type="submit" value="<?php echo esc_attr( __( 'Search', 'app' ) ); ?>" class="search-form__submit-button screen-reader-text" />
</form>
