<?php

namespace MyTheme\WordPress;

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
	}

	/**
	 * Get asset source url.
	 *
	 * @param string  $name Source basename (no extension).
	 * @param string  $extension Source extension - '.js' or '.css'.
	 * @return string
	 */
	protected function getAssetSource( $name, $extension ) {
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

		$hot_url  = wp_parse_url( \MyTheme::theme()->config()->get( 'development.hotUrl', 'http://localhost/' ) );
		$hot_port = \MyTheme::theme()->config()->get( 'development.port', 3000 );

		return "${hot_url['scheme']}://{$hot_url['host']}:{$hot_port}/{$uri_path}{$extension}";
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
		\MyTheme::theme()->assets()->enqueueScript(
			'theme-js-bundle',
			$this->getAssetSource( 'frontend', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = $this->getAssetSource( 'frontend', '.css' );

		if ( $style ) {
			\MyTheme::theme()->assets()->enqueueStyle(
				'theme-css-bundle',
				$style
			);
		}

		// Enqueue theme's style.css file to allow overrides for the bundled styles.
		\MyTheme::theme()->assets()->enqueueStyle( 'theme-styles', get_template_directory_uri() . '/style.css' );
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @return void
	 */
	public function enqueueAdminAssets() {
		// Enqueue scripts.
		\MyTheme::theme()->assets()->enqueueScript(
			'theme-admin-js-bundle',
			$this->getAssetSource( 'admin', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = $this->getAssetSource( 'admin', '.css' );

		if ( $style ) {
			\MyTheme::theme()->assets()->enqueueStyle(
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
		\MyTheme::theme()->assets()->enqueueScript(
			'theme-login-js-bundle',
			$this->getAssetSource( 'login', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = $this->getAssetSource( 'login', '.css' );

		if ( $style ) {
			\MyTheme::theme()->assets()->enqueueStyle(
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
		\MyTheme::theme()->assets()->enqueueScript(
			'theme-editor-js-bundle',
			$this->getAssetSource( 'editor', '.js' ),
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
		\MyTheme::theme()->assets()->addFavicon();
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
}
