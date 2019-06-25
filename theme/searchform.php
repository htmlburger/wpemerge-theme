<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms#The_Search_Form
 *
 * @package WPEmergeTheme
 */

?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
	<div class="form-group">
		<label class="d-inline" for="s">
			<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'app' ); ?></span>
		</label>
		<input type="text" class="form-control" title="<?php esc_attr_e( 'Search for:', 'app' ); ?>" name="s" value="" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'app' ); ?>" />
	</div>
	<input type="submit" class="form-control" value="<?php esc_attr_e( 'Search', 'app' ); ?>" class="search-form__submit-button screen-reader-text" />
</form>
