<?php
/**
 * Asset helpers.
 *
 * @package WPEmergeTheme
 */

/**
 * Get asset source url.
 *
 * @param string $name Source basename (no extension).
 * @param string $extension Source extension - '.js' or '.css'.
 * @return string
 */
function app_theme_get_asset_source( $name, $extension ) {
	$template_dir_uri = get_template_directory_uri();
	$mode             = 'production';
	$uri_path         = '.css' === $extension ? "styles/{$name}" : $name;
	$file_path        = implode(
		DIRECTORY_SEPARATOR,
		array_filter(
			[
				get_template_directory(),
				'dist',
				'.css' === $extension ? 'styles' : '',
				"$name.min$extension",
			]
		)
	);

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		$mode = 'debug';
	} elseif ( ! file_exists( $file_path ) ) {
		$mode = 'development';
	}

	if ( 'production' === $mode ) {
		return "$template_dir_uri/dist/{$uri_path}.min{$extension}";
	}

	if ( 'debug' === $mode ) {
		return "$template_dir_uri/dist/{$uri_path}{$extension}";
	}

	if ( '.css' === $extension ) {
		// CSS files are injected via JS in development mode.
		return '';
	}

	$hot_url  = wp_parse_url( \App::theme()->config()->get( 'development.hotUrl', 'http://localhost/' ) );
	$hot_port = \App::theme()->config()->get( 'development.port', 3000 );

	return "${hot_url['scheme']}://{$hot_url['host']}:{$hot_port}/{$uri_path}{$extension}";
}

/**
 * Enqueue front-end assets.
 *
 * @return void
 */
function app_action_theme_enqueue_assets() {
	// Enqueue the built-in comment-reply script for singular pages.
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue scripts.
	\App::theme()->assets()->enqueueScript(
		'theme-js-bundle',
		app_theme_get_asset_source( 'frontend', '.js' ),
		[ 'jquery' ],
		true
	);

	// Enqueue styles.
	$style = app_theme_get_asset_source( 'frontend', '.css' );

	if ( $style ) {
		\App::theme()->assets()->enqueueStyle(
			'theme-css-bundle',
			$style
		);
	}

	// Enqueue theme's style.css file to allow overrides for the bundled styles.
	\App::theme()->assets()->enqueueStyle( 'theme-styles', get_template_directory_uri() . '/style.css' );
}

/**
 * Enqueue admin assets.
 *
 * @return void
 */
function app_action_admin_enqueue_assets() {
	// Enqueue scripts.
	\App::theme()->assets()->enqueueScript(
		'theme-admin-js-bundle',
		app_theme_get_asset_source( 'admin', '.js' ),
		[ 'jquery' ],
		true
	);

	// Enqueue styles.
	$style = app_theme_get_asset_source( 'admin', '.css' );

	if ( $style ) {
		\App::theme()->assets()->enqueueStyle(
			'theme-admin-css-bundle',
			$style
		);
	}
}

/**
 * Enqueue login assets.
 *
 * @return void
 */
function app_action_login_enqueue_assets() {
	// Enqueue scripts.
	\App::theme()->assets()->enqueueScript(
		'theme-login-js-bundle',
		app_theme_get_asset_source( 'login', '.js' ),
		[ 'jquery' ],
		true
	);

	// Enqueue styles.
	$style = app_theme_get_asset_source( 'login', '.css' );

	if ( $style ) {
		\App::theme()->assets()->enqueueStyle(
			'theme-login-css-bundle',
			$style
		);
	}
}

/**
 * Enqueue editor assets.
 *
 * @return void
 */
function app_action_editor_enqueue_assets() {
	// Enqueue scripts.
	\App::theme()->assets()->enqueueScript(
		'theme-editor-js-bundle',
		app_theme_get_asset_source( 'editor', '.js' ),
		[ 'jquery' ],
		true
	);
}

/**
 * Add favicon proxy.
 *
 * @link WPEmergeTheme\Assets\Assets::addFavicon()
 * @return void
 */
function app_action_add_favicon() {
	\App::theme()->assets()->addFavicon();
}
