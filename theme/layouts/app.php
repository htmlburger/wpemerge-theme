<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package WPEmergeTheme
 */

app_render( 'header' );

if ( ! is_singular() ) {
	app_the_title( '<h1 class="post-title">', '</h1>' );
}

app_layout_content();

app_render( 'sidebar' );

app_render( 'footer' );
