<?php
/**
 * This file is required by WordPress. Delegates the actual rendering to footer.blade.php.
 *
 * @package WPEmergeTheme
 * phpcs:disable
 */
add_filter( 'wpemerge.partials.footer.hook', '__return_false' );
App::render( 'footer' );
remove_filter( 'wpemerge.partials.footer.hook', '__return_false' );
