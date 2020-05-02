<?php
/**
 * Base layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package WPEmergeTheme
 */

\MyTheme::render( 'header' );

if ( ! is_singular() ) {
	mytheme_the_title( '<h2 class="post-title">', '</h2>' );
}

\MyTheme::layoutContent();

\MyTheme::render( 'sidebar' );

\MyTheme::render( 'footer' );
