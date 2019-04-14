<?php
/**
 * WordPress Admin Routes.
 * WARNING: Do not use Route::all() here, otherwise you will override
 * ALL admin pages which you most likely do not actually want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle a custom admin page registered using add_menu_page(), for example.
// phpcs:ignore
// Route::get( ['admin', 'my-custom-admin-page-slug'], 'ExampleController@admin' );
