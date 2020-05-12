<?php
/**
 * WordPress Admin Routes.
 * WARNING: Do not use \MyApp::route()->all() here, otherwise you will override
 * ALL custom admin pages which you most likely do not want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle a custom admin page registered using add_menu_page(), for example.
// phpcs:ignore
// \MyApp::route()->get()->where( 'admin', 'my-custom-admin-page-slug' )->handle( 'ExampleController@admin' );
