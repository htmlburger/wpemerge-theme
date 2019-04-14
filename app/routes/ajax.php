<?php
/**
 * WordPress AJAX Routes.
 * WARNING: Do not use Route::all() here, otherwise you will override
 * ALL AJAX requests which you most likely do not actually want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle a custom ajax action, for example.
// phpcs:ignore
// Route::get( ['ajax', 'my-custom-ajax-action'], 'ExampleController@ajax' );
