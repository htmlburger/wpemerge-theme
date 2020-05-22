<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register and enqueues assets.
 */
class AssetsServiceProvider implements ServiceProviderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_action( 'wp_enqueue_scripts', [$this, 'enqueueFrontendAssets'] );
		add_action( 'admin_enqueue_scripts', [$this, 'enqueueAdminAssets'] );
		add_action( 'login_enqueue_scripts', [$this, 'enqueueLoginAssets'] );
		add_action( 'enqueue_block_editor_assets', [$this, 'enqueueEditorAssets'] );

		add_action( 'wp_head', [$this, 'addFavicon'], 5 );
		add_action( 'login_head', [$this, 'addFavicon'], 5 );
		add_action( 'admin_head', [$this, 'addFavicon'], 5 );

		add_action( 'upload_dir', [$this, 'fixUploadDirUrlSchema'] );

		add_action( 'wp_footer', [$this, 'loadSvgSprite'] );
	}

	/**
	 * Enqueue frontend assets.
	 *
	 * @return void
	 */
	public function enqueueFrontendAssets() {
		// Enqueue the built-in comment-reply script for singular pages.
		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'frontend', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = \MyApp::core()->assets()->getBundleUrl( 'frontend', '.css' );

		if ( $style ) {
			\MyApp::core()->assets()->enqueueStyle(
				'theme-css-bundle',
				$style
			);
		}

		// Enqueue theme's style.css file to allow overrides for the bundled styles.
		\MyApp::core()->assets()->enqueueStyle( 'theme-styles', get_template_directory_uri() . '/style.css' );
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @return void
	 */
	public function enqueueAdminAssets() {
		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-admin-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'admin', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = \MyApp::core()->assets()->getBundleUrl( 'admin', '.css' );

		if ( $style ) {
			\MyApp::core()->assets()->enqueueStyle(
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
	public function enqueueLoginAssets() {
		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-login-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'login', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = \MyApp::core()->assets()->getBundleUrl( 'login', '.css' );

		if ( $style ) {
			\MyApp::core()->assets()->enqueueStyle(
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
	public function enqueueEditorAssets() {
		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-editor-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'editor', '.js' ),
			[ 'jquery' ],
			true
		);
	}

	/**
	 * Add favicon.
	 *
	 * @return void
	 */
	public function addFavicon() {
		\MyApp::core()->assets()->addFavicon();
	}


	/**
	 * Fix upload_dir urls having incorrect url schema.
	 *
	 * The wp_upload_dir() function urls' schema depends on the site_url option which
	 * can cause issues when HTTPS is forced using a plugin, for example.
	 *
	 * @link https://core.trac.wordpress.org/ticket/25449
	 * @param  array $upload_dir Array containing the current upload directory’s path and url.
	 * @return array Filtered array.
	 */
	public function fixUploadDirUrlSchema( $upload_dir ) {
		if ( is_ssl() ) {
			$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'https' );
			$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'https' );
		} else {
			$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'http' );
			$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'http' );
		}

		return $upload_dir;
	}

	/**
	 * Load SVG sprite.
	 *
	 * @return void
	 */
	public function loadSvgSprite() {
		$file_path = implode(
			DIRECTORY_SEPARATOR,
			array_filter(
				[
					get_template_directory(),
					'dist',
					'images',
					'sprite.svg'
				]
			)
		);

		if ( ! file_exists( $file_path ) ) {
			return;
		}

		readfile( $file_path );
	}
}
