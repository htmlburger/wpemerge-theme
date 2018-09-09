<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/view/layouts.html
 *
 * @package WPEmergeTheme
 */

app_render( 'header' );

if ( ! is_singular() ) {
	app_the_title( '<h2 class="pagetitle">', '</h2>' );
}

app_layout_content();

app_render( 'sidebar' );

app_render( 'footer' );
