<?php
/**
 * WordPress AJAX Routes.
 * WARNING: Do not use \MyTheme::route->all() here, otherwise you will override
 * ALL AJAX requests which you most likely do not want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package MyTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Using our ExampleController to handle a custom ajax action, for example.
// phpcs:ignore
// \MyTheme::route->get()->where( 'ajax', 'my-custom-ajax-action' )->handle( 'ExampleController@ajax' );
