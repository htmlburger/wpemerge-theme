<?php
/**
 * This file is required by WordPress. Delegates the actual rendering to header.blade.php.
 *
 * @package MyApp
 * phpcs:disable
 */
add_filter( 'wpemerge.partials.header.hook', '__return_false' );
\MyApp::render( 'views.partials.header' );
remove_filter( 'wpemerge.partials.header.hook', '__return_false' );
