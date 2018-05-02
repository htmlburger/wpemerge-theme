<?php
/**
 * Register custom taxonomies.
 *
 * Here, you can register the custom taxonomies for use in the theme.
 *
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
 */

// Custom hierarchical taxonomy (like categories).
/*register_taxonomy(
	'app_custom_taxonomy', # Taxonomy name
	array( 'post_type' ), # Post Types
	array( # Arguments
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
);*/

// Custom non-hierarchical taxonomy (like tags).
/*register_taxonomy(
	'custom_taxonomy', # Taxonomy name
	array( 'post_type' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'                       => __( 'Custom Taxonomies', 'app' ),
			'singular_name'              => __( 'Custom Taxonomy', 'app' ),
			'search_items'               => __( 'Search Custom Taxonomies', 'app' ),
			'popular_items'              => __( 'Popular Custom Taxonomies', 'app' ),
			'all_items'                  => __( 'All Custom Taxonomies', 'app' ),
			'view_item'                  => __( 'View Custom Taxonomy', 'app' ),
			'edit_item'                  => __( 'Edit Custom Taxonomy', 'app' ),
			'update_item'                => __( 'Update Custom Taxonomy', 'app' ),
			'add_new_item'               => __( 'Add New Custom Taxonomy', 'app' ),
			'new_item_name'              => __( 'New Custom Taxonomy Name', 'app' ),
			'separate_items_with_commas' => __( 'Separate Custom Taxonomies with commas', 'app' ),
			'add_or_remove_items'        => __( 'Add or remove Custom Taxonomies', 'app' ),
			'choose_from_most_used'      => __( 'Choose from the most used Custom Taxonomies', 'app' ),
			'not_found'                  => __( 'No Custom Taxonomies found.', 'app' ),
			'menu_name'                  => __( 'Custom Taxonomies', 'app' ),
		),
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'custom-taxonomy' ),
	)
);*/
