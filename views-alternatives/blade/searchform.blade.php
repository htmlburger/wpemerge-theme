<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms#The_Search_Form
 *
 * @package MyTheme
 */

?>
<form action="{{ esc_url( home_url( '/' ) ) }}" class="search-form" method="get" role="search">
	<label for="s">
		<span class="screen-reader-text">{{ __( 'Search for:', 'mytheme' ) }}</span>

		<input type="text" title="{{ __( 'Search for:', 'mytheme' ) }}" name="s" value="" id="s" placeholder="{{ __( 'Search &hellip;', 'mytheme' ) }}" class="search-form__field" />
	</label>

	<input type="submit" value="{{ __( 'Search', 'mytheme' ) }}" class="search-form__submit-button screen-reader-text" />
</form>
