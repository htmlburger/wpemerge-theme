<?php
/**
 * WP Emerge configuration.
 *
 * @link https://docs.wpemerge.com/#/framework/configuration
 *
 * @package MyTheme
 */

return [
	/**
	 * Array of service providers you wish to enable.
	 */
	'providers'           => [
		\WPEmergeThemeCore\Assets\AssetsServiceProvider::class,
		\WPEmergeThemeCore\Avatar\AvatarServiceProvider::class,
		\WPEmergeThemeCore\Config\ConfigServiceProvider::class,
		\WPEmergeThemeCore\Image\ImageServiceProvider::class,
		\WPEmergeThemeCore\Sidebar\SidebarServiceProvider::class,
		\WPEmergeThemeCore\Theme\ThemeServiceProvider::class,
		\MyTheme\Routing\RouteConditionsServiceProvider::class,
		\MyTheme\View\ViewServiceProvider::class,
		\MyTheme\WordPress\AdminServiceProvider::class,
		\MyTheme\WordPress\AssetsServiceProvider::class,
		\MyTheme\WordPress\ContentTypesServiceProvider::class,
		\MyTheme\WordPress\LoginServiceProvider::class,
		\MyTheme\WordPress\MenusServiceProvider::class,
		\MyTheme\WordPress\ShortcodesServiceProvider::class,
		\MyTheme\WordPress\ThemeServiceProvider::class,
		\MyTheme\WordPress\WidgetsServiceProvider::class,
	],

	/**
	 * Array of route group definitions and default attributes.
	 * All of these are optional so if we are not using
	 * a certain group of routes we can skip it.
	 * If we are not using routing at all we can skip
	 * the entire 'routes' option.
	 */
	'routes'              => [
		'web'   => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php',
			'attributes'  => [
				'namespace' => 'MyTheme\\Controllers\\Web\\',
			],
		],
		'admin' => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'admin.php',
			'attributes'  => [
				'namespace' => 'MyTheme\\Controllers\\Admin\\',
			],
		],
		'ajax'  => [
			'definitions' => __DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'ajax.php',
			'attributes'  => [
				'namespace' => 'MyTheme\\Controllers\\Ajax\\',
			],
		],
	],

	/**
	 * View Composers settings.
	 */
	'view_composers'      => [
		'namespace' => 'MyTheme\\ViewComposers\\',
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
		// 'mymiddleware' => \MyTheme\Middleware\MyMiddleware::class,
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
		// \MyTheme\Middleware\MyMiddlewareThatShouldRunFirst::class,
		// \MyTheme\Middleware\MyMiddlewareThatShouldRunSecond::class,
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
