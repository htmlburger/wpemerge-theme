<?php
/**
 * Bootstrap theme.
 *
 * The purpose of this file is to bootstrap your theme by loading all dependencies and helpers.
 *
 * YOU SHOULD NORMALLY NOT NEED TO ADD ANYTHING HERE - any custom functionality unreleated
 * to boostrapping the theme should go into a separate helper file.
 * (refer to the directory structure in README.md)
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constant definitions.
 */
define( 'APP_APP_DIR_NAME', 'app' );
define( 'APP_APP_HELPERS_DIR_NAME', 'helpers' );
define( 'APP_APP_ROUTES_DIR_NAME', 'routes' );
define( 'APP_APP_SETUP_DIR_NAME', 'setup' );
define( 'APP_APP_SRC_DIR_NAME', 'src' );
define( 'APP_DIST_DIR_NAME', 'dist' );
define( 'APP_RESOURCES_DIR_NAME', 'resources' );
define( 'APP_VENDOR_DIR_NAME', 'vendor' );

define( 'APP_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'APP_APP_DIR', APP_DIR . APP_APP_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_SRC_DIR', APP_DIR . APP_APP_DIR_NAME . DIRECTORY_SEPARATOR . APP_APP_SRC_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_HELPERS_DIR', APP_APP_DIR . APP_APP_HELPERS_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_ROUTES_DIR', APP_APP_DIR . APP_APP_ROUTES_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_SETUP_DIR', APP_APP_DIR . APP_APP_SETUP_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_DIST_DIR', APP_DIR . APP_DIST_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_RESOURCES_DIR', APP_DIR . APP_RESOURCES_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_VENDOR_DIR', APP_DIR . APP_VENDOR_DIR_NAME . DIRECTORY_SEPARATOR );

if ( ! isset( $content_width ) ) {
	$content_width = 1080;
}

/**
 * Load composer dependencies.
 */
if ( file_exists( APP_VENDOR_DIR . 'autoload.php' ) ) {
	require_once APP_VENDOR_DIR . 'autoload.php';
}

/**
 * Load helpers.
 */
require_once APP_APP_SRC_DIR . 'App.php';
require_once APP_APP_DIR . 'helpers.php';

/**
 * Bootstrap theme after all dependencies and helpers are loaded.
 */
App::make()->bootstrap( require APP_APP_DIR . 'config.php' );

/**
 * Register hooks.
 */
require_once APP_APP_DIR . 'hooks.php';

add_action(
	'after_setup_theme',
	function() {
		/**
		 * Load textdomain.
		 */
		load_theme_textdomain( 'app', APP_DIR . 'languages' );

		/**
		 * Register theme support.
		 */
		require_once APP_APP_SETUP_DIR . 'theme-support.php';

		/**
		 * Register menu locations.
		 */
		require_once APP_APP_SETUP_DIR . 'menus.php';
	}
);

add_action(
	'init',
	function() {
		/**
		 * Register post types.
		 */
		require_once APP_APP_SETUP_DIR . 'post-types.php';

		/**
		 * Register taxonomies.
		 */
		require_once APP_APP_SETUP_DIR . 'taxonomies.php';
	}
);

add_action(
	'widgets_init',
	function() {
		/**
		 * Register widgets.
		 */
		require_once APP_APP_SETUP_DIR . 'widgets.php';

		/**
		 * Register sidebars.
		 */
		require_once APP_APP_SETUP_DIR . 'sidebars.php';
	}
);
