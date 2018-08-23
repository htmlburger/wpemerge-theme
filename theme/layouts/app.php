<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/view/layouts.html
 *
 * @package WPEmergeTheme
 */

get_header();

if ( ! is_singular() ) {
	app_the_title( '<h2 class="pagetitle">', '</h2>' );
}

app_layout_content();

get_sidebar();

get_footer();
