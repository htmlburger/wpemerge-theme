<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/view/layouts.html
 *
 * @package WPEmergeTheme
 */

app_partial( 'header' );

if ( ! is_singular() ) {
	app_the_title( '<h2 class="pagetitle">', '</h2>' );
}

app_layout_content();

app_partial( 'sidebar' );

app_partial( 'footer' );
