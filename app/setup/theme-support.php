<?php
/**
 * Declare theme functionality support.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'gallery' ) );

/**
 * Manually select Post Formats to be supported.
 *
 * @see http://codex.wordpress.org/Post_Formats
 */

// add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ] );


/**
 * Support wide alignment for editor blocks.
 *
 * @see https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support( 'align-wide' );

/**
 * Support custom editor block color palette.
 * Uses Material Design colors.
 *
 * @see https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support( 'editor-color-palette', [
	[
		'name'  => __( 'Red', 'app' ),
		'slug'  => 'material-red',
		'color' => '#f44336',
	],
	[
		'name'  => __( 'Pink', 'app' ),
		'slug'  => 'material-pink',
		'color' => '#e91e63',
	],
	[
		'name'  => __( 'Purple', 'app' ),
		'slug'  => 'material-purple',
		'color' => '#9c27b0',
	],
	[
		'name'  => __( 'Deep Purple', 'app' ),
		'slug'  => 'material-deep-purple',
		'color' => '#673ab7',
	],
	[
		'name'  => __( 'Indigo', 'app' ),
		'slug'  => 'material-indigo',
		'color' => '#3f51b5',
	],
	[
		'name'  => __( 'Blue', 'app' ),
		'slug'  => 'material-blue',
		'color' => '#2196f3',
	],
	[
		'name'  => __( 'Light Blue', 'app' ),
		'slug'  => 'material-light-blue',
		'color' => '#03a9f4',
	],
	[
		'name'  => __( 'Cyan', 'app' ),
		'slug'  => 'material-cyan	',
		'color' => '#00bcd4',
	],
	[
		'name'  => __( 'Teal', 'app' ),
		'slug'  => 'material-teal',
		'color' => '#009688',
	],
	[
		'name'  => __( 'Green', 'app' ),
		'slug'  => 'material-green',
		'color' => '#4caf50',
	],
	[
		'name'  => __( 'Light Green', 'app' ),
		'slug'  => 'material-light-green',
		'color' => '#8bc34a',
	],
	[
		'name'  => __( 'Lime', 'app' ),
		'slug'  => 'material-lime',
		'color' => '#cddc39',
	],
	[
		'name'  => __( 'Yellow', 'app' ),
		'slug'  => 'material-yellow',
		'color' => '#ffeb3b',
	],
	[
		'name'  => __( 'Amber', 'app' ),
		'slug'  => 'material-amber',
		'color' => '#ffc107',
	],
	[
		'name'  => __( 'Orange', 'app' ),
		'slug'  => 'material-orange',
		'color' => '#ff9800',
	],
	[
		'name'  => __( 'Deep Orange', 'app' ),
		'slug'  => 'material-deep-orange',
		'color' => '#ff5722',
	],
	[
		'name'  => __( 'Brown', 'app' ),
		'slug'  => 'material-brown',
		'color' => '#795548',
	],
	[
		'name'  => __( 'Grey', 'app' ),
		'slug'  => 'material-grey',
		'color' => '#9e9e9e',
	],
	[
		'name'  => __( 'Blue Grey', 'app' ),
		'slug'  => 'material-blue-grey',
		'color' => '#607d8b',
	],
] );
