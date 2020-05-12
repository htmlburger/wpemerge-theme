<?php
/**
 * Web Routes.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore
// \MyApp::route()->get()->url( '/' )->handle( 'ExampleController@home' );

// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// \MyApp::route()->get()->where( 'post_id', get_option( 'page_on_front' ) )->handle( 'ExampleController@home' );

/**
 * Pass all front-end requests through WPEmerge.
 * WARNING: Do not add routes after this - they will be ignored.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods?id=handling-all-requests
 */
\MyApp::route()->all();
