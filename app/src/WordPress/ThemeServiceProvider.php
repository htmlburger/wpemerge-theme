<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register theme support options.
 */
class ThemeServiceProvider implements ServiceProviderInterface
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
		add_action( 'after_setup_theme', [$this, 'loadTextdomain'] );
		add_action( 'after_setup_theme', [$this, 'addThemeSupport'] );
	}

	/**
	 * Load textdomain.
	 *
	 * @return void
	 */
	public function loadTextdomain() {
		load_theme_textdomain( 'my_app', get_template_directory() . DIRECTORY_SEPARATOR . 'languages' );
	}

	/**
	 * Add theme support.
	 *
	 * @return void
	 */
	public function addThemeSupport() {
		/**
		 * Support custom logo.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/**
		 * Support automatic feed links.
		 *
		 * @link https://codex.wordpress.org/Automatic_Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support post thumbnails.
		 *
		 * @link https://codex.wordpress.org/Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Support document title tag.
		 *
		 * @link https://codex.wordpress.org/Title_Tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Support HTML5 markup.
		 *
		 * @link https://codex.wordpress.org/Theme_Markup
		 */
		add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );

		/**
		 * Manually select Post Formats to be supported.
		 *
		 * @link http://codex.wordpress.org/Post_Formats
		 */
		// phpcs:ignore
		// add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );

		/**
		 * Support default editor block styles.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Support wide alignment for editor blocks.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Support block editor styles.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support( 'editor-styles' );
		add_editor_style( 'dist/styles/editor.css' );

		/**
		 * Support custom editor block color palette.
		 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
		 * Uses Material Design colors.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => __( 'Red', 'my_app' ),
					'slug'  => 'material-red',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-red', '#000000' ),
				],
				[
					'name'  => __( 'Pink', 'my_app' ),
					'slug'  => 'material-pink',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-pink', '#000000' ),
				],
				[
					'name'  => __( 'Purple', 'my_app' ),
					'slug'  => 'material-purple',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-purple', '#000000' ),
				],
				[
					'name'  => __( 'Deep Purple', 'my_app' ),
					'slug'  => 'material-deep-purple',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-deep-purple', '#000000' ),
				],
				[
					'name'  => __( 'Indigo', 'my_app' ),
					'slug'  => 'material-indigo',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-indigo', '#000000' ),
				],
				[
					'name'  => __( 'Blue', 'my_app' ),
					'slug'  => 'material-blue',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-blue', '#000000' ),
				],
				[
					'name'  => __( 'Light Blue', 'my_app' ),
					'slug'  => 'material-light-blue',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-light-blue', '#000000' ),
				],
				[
					'name'  => __( 'Cyan', 'my_app' ),
					'slug'  => 'material-cyan',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-cyan', '#000000' ),
				],
				[
					'name'  => __( 'Teal', 'my_app' ),
					'slug'  => 'material-teal',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-teal', '#000000' ),
				],
				[
					'name'  => __( 'Green', 'my_app' ),
					'slug'  => 'material-green',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-green', '#000000' ),
				],
				[
					'name'  => __( 'Light Green', 'my_app' ),
					'slug'  => 'material-light-green',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-light-green', '#000000' ),
				],
				[
					'name'  => __( 'Lime', 'my_app' ),
					'slug'  => 'material-lime',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-lime', '#000000' ),
				],
				[
					'name'  => __( 'Yellow', 'my_app' ),
					'slug'  => 'material-yellow',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-yellow', '#000000' ),
				],
				[
					'name'  => __( 'Amber', 'my_app' ),
					'slug'  => 'material-amber',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-amber', '#000000' ),
				],
				[
					'name'  => __( 'Orange', 'my_app' ),
					'slug'  => 'material-orange',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-orange', '#000000' ),
				],
				[
					'name'  => __( 'Deep Orange', 'my_app' ),
					'slug'  => 'material-deep-orange',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-deep-orange', '#000000' ),
				],
				[
					'name'  => __( 'Brown', 'my_app' ),
					'slug'  => 'material-brown',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-brown', '#000000' ),
				],
				[
					'name'  => __( 'Grey', 'my_app' ),
					'slug'  => 'material-grey',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-grey', '#000000' ),
				],
				[
					'name'  => __( 'Blue Grey', 'my_app' ),
					'slug'  => 'material-blue-grey',
					'color' => \MyApp::core()->config()->get( 'variables.color.material-blue-grey', '#000000' ),
				],
			]
		);

		/**
		 * Support color palette enforcement.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		// phpcs:ignore
		// add_theme_support( 'disable-custom-colors' );

		/**
		 * Support custom editor block font sizes.
		 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
		 */
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name'      => __( 'extra small', 'my_app' ),
					'shortName' => __( 'XS', 'my_app' ),
					'size'      => (int) \MyApp::core()->config()->get( 'variables.font-size.xs', 12 ),
					'slug'      => 'xs',
				],
				[
					'name'      => __( 'small', 'my_app' ),
					'shortName' => __( 'S', 'my_app' ),
					'size'      => (int) \MyApp::core()->config()->get( 'variables.font-size.s', 16 ),
					'slug'      => 's',
				],
				[
					'name'      => __( 'regular', 'my_app' ),
					'shortName' => __( 'M', 'my_app' ),
					'size'      => (int) \MyApp::core()->config()->get( 'variables.font-size.m', 20 ),
					'slug'      => 'm',
				],
				[
					'name'      => __( 'large', 'my_app' ),
					'shortName' => __( 'L', 'my_app' ),
					'size'      => (int) \MyApp::core()->config()->get( 'variables.font-size.l', 28 ),
					'slug'      => 'l',
				],
				[
					'name'      => __( 'extra large', 'my_app' ),
					'shortName' => __( 'XL', 'my_app' ),
					'size'      => (int) \MyApp::core()->config()->get( 'variables.font-size.xl', 36 ),
					'slug'      => 'xl',
				],
			]
		);

		/**
		 * Support WooCommerce.
		 */
		add_theme_support( 'woocommerce' );
	}
}
