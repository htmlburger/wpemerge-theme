<?php
/**
 * Asset helpers.
 *
 * @package WPEmergeTheme
 */

/**
 * Get asset source url.
 *
 * @param string  $name Source basename (no extension).
 * @param string  $extension Source extension - '.js' or '.css'.
 * @return string
 */
function app_theme_get_asset_source( $name, $extension ) {
	$mode = 'production';
	$path = '.css' === $extension ? "styles/{$name}" : $name;

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		$mode = 'debug';
	} else if ( ! file_exists( get_template_directory() . "/dist/{$path}.min{$extension}" ) ) {
		$mode = 'development';
	}

	if ( 'development' === $mode && '.css' === $extension ) {
		return '';
	}

	$template_dir_uri = get_template_directory_uri();
	$port             = 'development' === $mode ? ':' . App::theme()->config()->get( 'development.port', 3000 ) : '';
	$suffix           = 'production' === $mode ? '.min' : '';

	return 'development' === $mode ? "http://localhost{$port}/{$path}{$suffix}{$extension}" : "$template_dir_uri/dist/{$path}{$suffix}{$extension}";
}

/**
 * Enqueue front-end assets.
 *
 * @return void
 */
function app_action_theme_enqueue_assets() {
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
		app_theme_get_asset_source( 'frontend', '.js' ),
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	$style = app_theme_get_asset_source( 'frontend', '.css' );

	if ( $style ) {
		App::theme()->assets()->enqueueStyle(
			'theme-css-bundle',
			$style
		);
	}

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
	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-admin-js-bundle',
		app_theme_get_asset_source( 'admin', '.js' ),
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	$style = app_theme_get_asset_source( 'admin', '.css' );

	if ( $style ) {
		App::theme()->assets()->enqueueStyle(
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
	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-login-js-bundle',
		app_theme_get_asset_source( 'login', '.js' ),
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	$style = app_theme_get_asset_source( 'login', '.css' );

	if ( $style ) {
		App::theme()->assets()->enqueueStyle(
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
	/**
	 * Enqueue scripts.
	 */
	App::theme()->assets()->enqueueScript(
		'theme-editor-js-bundle',
		app_theme_get_asset_source( 'editor', '.js' ),
		[ 'jquery' ],
		true
	);

	/**
	 * Enqueue styles.
	 */
	$style = app_theme_get_asset_source( 'editor', '.css' );

	if ( $style ) {
		App::theme()->assets()->enqueueStyle(
			'theme-editor-css-bundle',
			$style
		);
	}
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
