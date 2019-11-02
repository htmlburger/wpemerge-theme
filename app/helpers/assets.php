<?php
/**
 * Asset helpers.
 *
 * @package WPEmergeTheme
 */

/**
 * Enqueue front-end assets.
 *
 * @return void
 */
function app_action_theme_enqueue_assets() {
	$template_dir = App::theme()->uri();

	/**
	 * Enqueue the built-in comment-reply script for singular pages.
	 */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-js-bundle',
		$template_dir . '/dist/theme.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	App::theme()->assets()->enqueueStyle(
		'theme-css-bundle',
		$template_dir . '/dist/styles/theme.css'
	);

	/**
	 * Enqueue theme's style.css file to allow overrides for the bundled styles.
	 */
	App::theme()->assets()->enqueueStyle( 'theme-styles', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue admin assets.
 *
 * @return void
 */
function app_action_admin_enqueue_assets() {
	$template_dir = App::theme()->uri();

	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-admin-js-bundle',
		$template_dir . '/dist/admin.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	App::theme()->assets()->enqueueStyle(
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
	$template_dir = App::theme()->uri();

	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-login-js-bundle',
		$template_dir . '/dist/login.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	App::theme()->assets()->enqueueStyle(
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
	$template_dir = App::theme()->uri();

	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-editor-js-bundle',
		$template_dir . '/dist/editor.js',
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	App::theme()->assets()->enqueueStyle(
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
	App::theme()->assets()->addFavicon();
}

/**
 * Adjust attachment attributes to enable lazyloading.
 *
 * @link https://github.com/ApoorvSaxena/lozad.js
 * @param array $attributes Array of attributes.
 * @return array
 */
function app_filter_enable_lazyload( $attributes ) {
	if ( is_admin() ) {
		return $attributes;
	}

	$lazyload = false;

	if ( ! empty( $attributes['src'] ) ) {
		$lazyload               = true;
		$attributes['data-src'] = $attributes['src'];
		unset( $attributes['src'] );
	}

	if ( ! empty( $attributes['srcset'] ) ) {
		$lazyload                  = true;
		$attributes['data-srcset'] = $attributes['srcset'];
		unset( $attributes['srcset'] );
	}

	if ( $lazyload ) {
		$class               = isset( $attributes['class'] ) ? $attributes['class'] : '';
		$attributes['class'] = $class . ' lozad';
	}

	return $attributes;
}
