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
	'providers'           => [
		\App\Routing\RouteConditionsServiceProvider::class,
		\App\View\ViewServiceProvider::class,
	],

	'routes'              => [
		'web'   => APP_APP_ROUTES_DIR . 'web.php',
		'admin' => APP_APP_ROUTES_DIR . 'admin.php',
		'ajax'  => APP_APP_ROUTES_DIR . 'ajax.php',
	],

	/**
	 * Register middleware class aliases.
	 * Use fully qualified middleware class names.
	 *
	 * Internal aliases that you should avoid overriding:
	 * - 'flash'
	 * - 'old_input'
	 * - 'csrf'
	 * - 'user.logged_in'
	 * - 'user.logged_out'
	 * - 'user.can'
	 */
	'middleware'          => [
		// phpcs:ignore
		// 'mymiddleware' => \App\Middleware\MyMiddleware::class,
	],

	/**
	 * Register middleware groups.
	 * Use fully qualified middleware class names or registered aliases.
	 * There are a couple built-in groups that you may override:
	 * - 'web'      - Automatically applied to web routes.
	 * - 'admin'    - Automatically applied to admin routes.
	 * - 'ajax'     - Automatically applied to ajax routes.
	 * - 'global'   - Automatically applied to all of the above.
	 * - 'wpemerge' - Internal group applied the same way 'global' is.
	 *
	 * Warning: The 'wpemerge' group contains some internal WP Emerge
	 * middleware which you should avoid overriding.
	 */
	'middleware_groups'   => [
		'global' => [],
		'web'    => [],
		'ajax'   => [],
		'admin'  => [],
	],

	/**
	 * Optionally specify middleware execution order.
	 * Use fully qualified middleware class names.
	 */
	'middleware_priority' => [
		// phpcs:ignore
		// \App\Middleware\MyMiddlewareThatShouldRunFirst::class,
		// \App\Middleware\MyMiddlewareThatShouldRunSecond::class,
	],

	/**
	 * Custom directories to search for views.
	 * Use absolute paths or leave blank to disable.
	 * Applies only to the default PhpViewEngine.
	 */
	'views'               => [ get_stylesheet_directory(), get_template_directory() ],

	/**
	 * Other config goes after this comment.
	 */

];
