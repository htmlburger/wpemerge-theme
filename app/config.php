<?php
/**
 * WP Emerge configuration.
 *
 * @link https://docs.wpemerge.com/#/framework/configuration
 *
 * @package WPEmergeTheme
 */

return [
	/**
	 * Array of service providers you wish to enable.
	 */
	'providers'         => [
		\App\Routing\RouteConditionsServiceProvider::class,
	],

	/**
	 * Custom directory to search for views.
	 * Use an absolute path or leave blank to disable.
	 * Applies only to the default PhpViewEngine.
	 */
	'views'             => '',

	/**
	 * Other config goes after this comment.
	 */

];
