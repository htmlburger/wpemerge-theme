<?php
/**
 * Base layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package MyApp
 */

\MyApp::render( 'header' );

if ( ! is_singular() ) {
	my_app_the_title( '<h2 class="post-title">', '</h2>' );
}

\MyApp::layoutContent();

\MyApp::render( 'sidebar' );

\MyApp::render( 'footer' );
