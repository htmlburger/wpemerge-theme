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
	app_the_title( '<h2 class="post-title">', '</h2>' );
}

app_layout_content();

app_render( 'sidebar' );

app_render( 'footer' );
