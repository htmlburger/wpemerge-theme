<?php
/**
 * Configure and use WP Emerge features.
 *
 * @link https://docs.wpemerge.com/
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ------------------------------------------------------------------------
 * Routes
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 * ------------------------------------------------------------------------
 */

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore
// Router::get( '/', 'ExampleController@home' );

// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// Router::get( ['post_id', get_option( 'page_on_front' )], 'ExampleController@home' );

/**
 * Pass all front-end requests through WPEmerge.
 * WARNING: Do not add routes after this - they will be ignored.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods?id=handling-all-requests
 */
Router::handleAll();

/**
 * ------------------------------------------------------------------------
 * Globals
 *
 * @link https://docs.wpemerge.com/#/framework/views/global-context
 * ------------------------------------------------------------------------
 */

// phpcs:ignore
// View::addGlobal( 'foo', 'bar' );

/**
 * ------------------------------------------------------------------------
 * View composers
 *
 * @link https://docs.wpemerge.com/#/framework/views/view-composers
 * ------------------------------------------------------------------------
 */

// phpcs:ignore
// View::addComposer( 'partials/foo', 'FooPartialViewComposer' );
