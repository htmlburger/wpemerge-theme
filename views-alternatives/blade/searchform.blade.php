<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms#The_Search_Form
 *
 * @package MyApp
 */

?>
<form action="{{ esc_url( home_url( '/' ) ) }}" class="search-form" method="get" role="search">
	<label for="s">
		<span class="screen-reader-text">{{ __( 'Search for:', 'my_app' ) }}</span>

		<input type="text" title="{{ __( 'Search for:', 'my_app' ) }}" name="s" value="" id="s" placeholder="{{ __( 'Search &hellip;', 'my_app' ) }}" class="search-form__field" />
	</label>

	<input type="submit" value="{{ __( 'Search', 'my_app' ) }}" class="search-form__submit-button screen-reader-text" />
</form>
