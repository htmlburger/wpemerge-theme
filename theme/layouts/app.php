<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/view/layouts.html
 *
 * @package WPEmergeTheme
 */

do_action( 'get_header', null );
app_partial( 'header' );

if ( ! is_singular() ) {
	app_the_title( '<h2 class="pagetitle">', '</h2>' );
}

app_layout_content();

do_action( 'get_sidebar', null );
app_partial( 'sidebar' );

do_action( 'get_footer', null );
app_partial( 'footer' );
