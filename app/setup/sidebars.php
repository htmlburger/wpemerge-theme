<?php
/**
 * Register sidebars.
 *
 * @see https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @package WPEmergeTheme
 */

/**
 * Array of default options.
 *
 * @var array
 */
$default_options = [
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widget__title">',
	'after_title'   => '</h2>',
];

/**
 * Default sidebar.
 */
register_sidebar( array_merge(
	$default_options,
	[
		'name' => __( 'Default Sidebar', 'app' ),
		'id'   => 'default-sidebar',
	]
) );
