<?php
/**
 * This file is required by WordPress. Delegates the actual rendering to footer.blade.php.
 *
 * @package MyApp
 * phpcs:disable
 */
add_filter( 'wpemerge.partials.footer.hook', '__return_false' );
\MyApp::render( 'views.partials.footer' );
remove_filter( 'wpemerge.partials.footer.hook', '__return_false' );
