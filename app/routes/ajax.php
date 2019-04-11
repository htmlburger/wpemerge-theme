<?php
/**
 * WordPress AJAX Routes.
 * WARNING: Do not use Router::handleAll() here, otherwise you will override
 * ALL AJAX requests which you most likely do not actually want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Router::get( ['ajax', 'my-custom-ajax-action'], 'ExampleController@ajax' );
