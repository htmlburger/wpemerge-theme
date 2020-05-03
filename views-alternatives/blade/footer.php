<?php
/**
 * This file is required by WordPress. Delegates the actual rendering to footer.blade.php.
 *
 * @package MyTheme
 * phpcs:disable
 */
add_filter( 'wpemerge.partials.footer.hook', '__return_false' );
\MyTheme::render( 'views.partials.footer' );
remove_filter( 'wpemerge.partials.footer.hook', '__return_false' );
