<?php
/**
 * Register menu locations.
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @hook    after_setup_theme
 * @package WPEmergeTheme
 */

register_nav_menus(
	[
		'main-menu' => __( 'Main Menu', 'app' ),
	]
);
