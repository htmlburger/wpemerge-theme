<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register widgets and sidebars.
 */
class ContentTypesServiceProvider implements ServiceProviderInterface
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
		add_action( 'init', [$this, 'registerPostTypes'] );
		add_action( 'init', [$this, 'registerTaxonomies'] );
	}

	/**
	 * Register post types.
	 *
	 * @return void
	 */
	public function registerPostTypes() {
		// phpcs:disable
		/*
		register_post_type(
			'my_app_custom_post_type',
			array(
				'labels'              => array(
					'name'               => __( 'Custom Types', 'my_app' ),
					'singular_name'      => __( 'Custom Type', 'my_app' ),
					'add_new'            => __( 'Add New', 'my_app' ),
					'add_new_item'       => __( 'Add new Custom Type', 'my_app' ),
					'view_item'          => __( 'View Custom Type', 'my_app' ),
					'edit_item'          => __( 'Edit Custom Type', 'my_app' ),
					'new_item'           => __( 'New Custom Type', 'my_app' ),
					'search_items'       => __( 'Search Custom Types', 'my_app' ),
					'not_found'          => __( 'No custom types found', 'my_app' ),
					'not_found_in_trash' => __( 'No custom types found in trash', 'my_app' ),
				),
				'public'              => true,
				'exclude_from_search' => false,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'query_var'           => true,
				'menu_icon'           => 'dashicons-admin-post',
				'supports'            => array( 'title', 'editor', 'page-attributes' ),
				'rewrite'             => array(
					'slug'       => 'custom-post-type',
					'with_front' => false,
				),
			)
		);
		*/
		// phpcs:enable
	}

	/**
	 * Register taxonomies.
	 *
	 * @return void
	 */
	public function registerTaxonomies() {
		// phpcs:disable
		/*
		register_taxonomy(
			'my_app_custom_taxonomy',
			array( 'post_type' ),
			array(
				'labels'            => array(
					'name'              => __( 'Custom Taxonomies', 'my_app' ),
					'singular_name'     => __( 'Custom Taxonomy', 'my_app' ),
					'search_items'      => __( 'Search Custom Taxonomies', 'my_app' ),
					'all_items'         => __( 'All Custom Taxonomies', 'my_app' ),
					'parent_item'       => __( 'Parent Custom Taxonomy', 'my_app' ),
					'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'my_app' ),
					'view_item'         => __( 'View Custom Taxonomy', 'my_app' ),
					'edit_item'         => __( 'Edit Custom Taxonomy', 'my_app' ),
					'update_item'       => __( 'Update Custom Taxonomy', 'my_app' ),
					'add_new_item'      => __( 'Add New Custom Taxonomy', 'my_app' ),
					'new_item_name'     => __( 'New Custom Taxonomy Name', 'my_app' ),
					'menu_name'         => __( 'Custom Taxonomies', 'my_app' ),
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
	}
}
