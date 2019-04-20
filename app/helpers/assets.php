<?php
/**
 * Asset helpers.
 *
 * @package WPEmergeTheme
 */

use WPEmergeTheme\Facades\Theme;
use WPEmergeTheme\Facades\Assets;

/**
 * Enqueue front-end assets.
 *
 * @return void
 */
function app_action_theme_enqueue_assets() {
	$template_dir = Theme::uri();

	/**
	 * Enqueue the built-in comment-reply script for singular pages.
	 */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Enqueue scripts.
	 */
	Assets::enqueueScript(
		'theme-js-bundle',
		$template_dir . '/dist/theme.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	Assets::enqueueStyle(
		'theme-css-bundle',
		$template_dir . '/dist/styles/theme.css'
	);

	/**
	 * Enqueue theme's style.css file to allow overrides for the bundled styles.
	 */
	Assets::enqueueStyle( 'theme-styles', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue admin assets.
 *
 * @return void
 */
function app_action_admin_enqueue_assets() {
	$template_dir = Theme::uri();

	/**
	 * Enqueue scripts.
	 */
	Assets::enqueueScript(
		'theme-admin-js-bundle',
		$template_dir . '/dist/admin.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	Assets::enqueueStyle(
		'theme-admin-css-bundle',
		$template_dir . '/dist/styles/admin.css'
	);
}

/**
 * Enqueue login assets.
 *
 * @return void
 */
function app_action_login_enqueue_assets() {
	$template_dir = Theme::uri();

	/**
	 * Enqueue scripts.
	 */
	Assets::enqueueScript(
		'theme-login-js-bundle',
		$template_dir . '/dist/login.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	Assets::enqueueStyle(
		'theme-login-css-bundle',
		$template_dir . '/dist/styles/login.css'
	);
}

/**
 * Enqueue editor assets.
 *
 * @return void
 */
function app_action_editor_enqueue_assets() {
	$template_dir = Theme::uri();

	/**
	 * Enqueue scripts.
	 */
	Assets::enqueueScript(
		'theme-editor-js-bundle',
		$template_dir . '/dist/editor.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	Assets::enqueueStyle(
		'theme-editor-css-bundle',
		$template_dir . '/dist/styles/editor.css'
	);
}

/**
 * Add favicon proxy.
 *
 * @link WPEmergeTheme\Assets\Assets::addFavicon()
 * @return void
 */
function app_action_add_favicon() {
	Assets::addFavicon();
}
