<?php
/**
 * WP Emerge configuration.
 *
 * @see  https://docs.wpemerge.com/configuration.html
 */

return [
	/**
	 * Array of service providers you wish to enable.
	 */
	'providers'         => [
		\App\Routing\RouteConditionsServiceProvider::class,
	],

	/**
	 * Array of global middleware to apply to all requests.
	 */
	'global_middleware' => [

	],

	/**
	 * Other config goes after this comment.
	 */

];
