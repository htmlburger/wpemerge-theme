<?php
/**
 * Configure and use WP Emerge features.
 *
 * @link https://docs.wpemerge.com/
 *
 * @package WPEmergeTheme
 */

/**
 * ------------------------------------------------------------------------
 * Routes
 *
 * @see https://docs.wpemerge.com/routing/methods.html
 * ------------------------------------------------------------------------
 */

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore
// Router::get( '/', 'App\Controllers\ExampleController@home' );

// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// Router::get( ['post_id', get_option( 'page_on_front' )], 'App\Controllers\ExampleController@home' );

/**
 * Pass all front-end requests through WPEmerge.
 * WARNING: Do not add routes after this - they will be ignored.
 *
 * @see https://docs.wpemerge.com/routing/methods.html#handling-all-requests
 */
Router::handleAll();

/**
 * ------------------------------------------------------------------------
 * Globals
 *
 * @see https://docs.wpemerge.com/view/global-context.html
 * ------------------------------------------------------------------------
 */

// phpcs:ignore
// View::addGlobal( 'foo', 'bar' );

/**
 * ------------------------------------------------------------------------
 * View composers
 *
 * @see https://docs.wpemerge.com/view/view-composers.html
 * ------------------------------------------------------------------------
 */

// phpcs:ignore
// View::addComposer( 'partials/foo', \App\ViewComposers\FooPartialViewComposer::class );
