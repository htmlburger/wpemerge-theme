<?php
/**
 * This file is required by WordPress. Delegates the actual rendering to sidebar.blade.php.
 *
 * @package WPEmergeTheme
 * phpcs:disable
 */
add_filter( 'wpemerge.partials.sidebar.hook', '__return_false' );
\WPEmerge\render( 'sidebar' );
remove_filter( 'wpemerge.partials.sidebar.hook', '__return_false' );
