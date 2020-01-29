<?php

namespace App\WordPress;

use App;
use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Registers widgets and sidebars.
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
		load_theme_textdomain( 'app', APP_DIR . 'languages' );
	}

	/**
	 * Add theme support.
	 *
	 * @return void
	 */
	public function addThemeSupport() {
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
					'name'  => __( 'Red', 'app' ),
					'slug'  => 'material-red',
					'color' => App::theme()->config()->get( 'variables.color.material-red', '#000000' ),
				],
				[
					'name'  => __( 'Pink', 'app' ),
					'slug'  => 'material-pink',
					'color' => App::theme()->config()->get( 'variables.color.material-pink', '#000000' ),
				],
				[
					'name'  => __( 'Purple', 'app' ),
					'slug'  => 'material-purple',
					'color' => App::theme()->config()->get( 'variables.color.material-purple', '#000000' ),
				],
				[
					'name'  => __( 'Deep Purple', 'app' ),
					'slug'  => 'material-deep-purple',
					'color' => App::theme()->config()->get( 'variables.color.material-deep-purple', '#000000' ),
				],
				[
					'name'  => __( 'Indigo', 'app' ),
					'slug'  => 'material-indigo',
					'color' => App::theme()->config()->get( 'variables.color.material-indigo', '#000000' ),
				],
				[
					'name'  => __( 'Blue', 'app' ),
					'slug'  => 'material-blue',
					'color' => App::theme()->config()->get( 'variables.color.material-blue', '#000000' ),
				],
				[
					'name'  => __( 'Light Blue', 'app' ),
					'slug'  => 'material-light-blue',
					'color' => App::theme()->config()->get( 'variables.color.material-light-blue', '#000000' ),
				],
				[
					'name'  => __( 'Cyan', 'app' ),
					'slug'  => 'material-cyan	',
					'color' => App::theme()->config()->get( 'variables.color.material-cyan	', '#000000' ),
				],
				[
					'name'  => __( 'Teal', 'app' ),
					'slug'  => 'material-teal',
					'color' => App::theme()->config()->get( 'variables.color.material-teal', '#000000' ),
				],
				[
					'name'  => __( 'Green', 'app' ),
					'slug'  => 'material-green',
					'color' => App::theme()->config()->get( 'variables.color.material-green', '#000000' ),
				],
				[
					'name'  => __( 'Light Green', 'app' ),
					'slug'  => 'material-light-green',
					'color' => App::theme()->config()->get( 'variables.color.material-light-green', '#000000' ),
				],
				[
					'name'  => __( 'Lime', 'app' ),
					'slug'  => 'material-lime',
					'color' => App::theme()->config()->get( 'variables.color.material-lime', '#000000' ),
				],
				[
					'name'  => __( 'Yellow', 'app' ),
					'slug'  => 'material-yellow',
					'color' => App::theme()->config()->get( 'variables.color.material-yellow', '#000000' ),
				],
				[
					'name'  => __( 'Amber', 'app' ),
					'slug'  => 'material-amber',
					'color' => App::theme()->config()->get( 'variables.color.material-amber', '#000000' ),
				],
				[
					'name'  => __( 'Orange', 'app' ),
					'slug'  => 'material-orange',
					'color' => App::theme()->config()->get( 'variables.color.material-orange', '#000000' ),
				],
				[
					'name'  => __( 'Deep Orange', 'app' ),
					'slug'  => 'material-deep-orange',
					'color' => App::theme()->config()->get( 'variables.color.material-deep-orange', '#000000' ),
				],
				[
					'name'  => __( 'Brown', 'app' ),
					'slug'  => 'material-brown',
					'color' => App::theme()->config()->get( 'variables.color.material-brown', '#000000' ),
				],
				[
					'name'  => __( 'Grey', 'app' ),
					'slug'  => 'material-grey',
					'color' => App::theme()->config()->get( 'variables.color.material-grey', '#000000' ),
				],
				[
					'name'  => __( 'Blue Grey', 'app' ),
					'slug'  => 'material-blue-grey',
					'color' => App::theme()->config()->get( 'variables.color.material-blue-grey', '#000000' ),
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
					'name'      => __( 'extra small', 'app' ),
					'shortName' => __( 'XS', 'app' ),
					'size'      => (int) App::theme()->config()->get( 'variables.font-size.xs', 12 ),
					'slug'      => 'xs',
				],
				[
					'name'      => __( 'small', 'app' ),
					'shortName' => __( 'S', 'app' ),
					'size'      => (int) App::theme()->config()->get( 'variables.font-size.s', 16 ),
					'slug'      => 's',
				],
				[
					'name'      => __( 'regular', 'app' ),
					'shortName' => __( 'M', 'app' ),
					'size'      => (int) App::theme()->config()->get( 'variables.font-size.m', 20 ),
					'slug'      => 'm',
				],
				[
					'name'      => __( 'large', 'app' ),
					'shortName' => __( 'L', 'app' ),
					'size'      => (int) App::theme()->config()->get( 'variables.font-size.l', 28 ),
					'slug'      => 'l',
				],
				[
					'name'      => __( 'extra large', 'app' ),
					'shortName' => __( 'XL', 'app' ),
					'size'      => (int) App::theme()->config()->get( 'variables.font-size.xl', 36 ),
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
