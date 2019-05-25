<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package WPEmergeTheme
 */

WPEmerge\render( 'header' );

if ( ! is_singular() ) {
	app_the_title( '<h2 class="post-title">', '</h2>' );
}

WPEmerge\layout_content();

WPEmerge\render( 'sidebar' );

WPEmerge\render( 'footer' );
