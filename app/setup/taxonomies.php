<?php
/**
 * Register custom taxonomies.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 *
 * @hook    init
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Custom hierarchical taxonomy (like categories).
// phpcs:disable
/*
register_taxonomy(
	'app_custom_taxonomy',
	array( 'post_type' ),
	array(
		'labels'            => array(
			'name'              => __( 'Custom Taxonomies', 'app' ),
			'singular_name'     => __( 'Custom Taxonomy', 'app' ),
			'search_items'      => __( 'Search Custom Taxonomies', 'app' ),
			'all_items'         => __( 'All Custom Taxonomies', 'app' ),
			'parent_item'       => __( 'Parent Custom Taxonomy', 'app' ),
			'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'app' ),
			'view_item'         => __( 'View Custom Taxonomy', 'app' ),
			'edit_item'         => __( 'Edit Custom Taxonomy', 'app' ),
			'update_item'       => __( 'Update Custom Taxonomy', 'app' ),
			'add_new_item'      => __( 'Add New Custom Taxonomy', 'app' ),
			'new_item_name'     => __( 'New Custom Taxonomy Name', 'app' ),
			'menu_name'         => __( 'Custom Taxonomies', 'app' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'custom-taxonomy' ),
	)
);
*/
// phpcs:enable
