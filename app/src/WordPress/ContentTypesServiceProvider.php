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
			'myapp_custom_post_type',
			array(
				'labels'              => array(
					'name'               => __( 'Custom Types', 'myapp' ),
					'singular_name'      => __( 'Custom Type', 'myapp' ),
					'add_new'            => __( 'Add New', 'myapp' ),
					'add_new_item'       => __( 'Add new Custom Type', 'myapp' ),
					'view_item'          => __( 'View Custom Type', 'myapp' ),
					'edit_item'          => __( 'Edit Custom Type', 'myapp' ),
					'new_item'           => __( 'New Custom Type', 'myapp' ),
					'search_items'       => __( 'Search Custom Types', 'myapp' ),
					'not_found'          => __( 'No custom types found', 'myapp' ),
					'not_found_in_trash' => __( 'No custom types found in trash', 'myapp' ),
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
			'myapp_custom_taxonomy',
			array( 'post_type' ),
			array(
				'labels'            => array(
					'name'              => __( 'Custom Taxonomies', 'myapp' ),
					'singular_name'     => __( 'Custom Taxonomy', 'myapp' ),
					'search_items'      => __( 'Search Custom Taxonomies', 'myapp' ),
					'all_items'         => __( 'All Custom Taxonomies', 'myapp' ),
					'parent_item'       => __( 'Parent Custom Taxonomy', 'myapp' ),
					'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'myapp' ),
					'view_item'         => __( 'View Custom Taxonomy', 'myapp' ),
					'edit_item'         => __( 'Edit Custom Taxonomy', 'myapp' ),
					'update_item'       => __( 'Update Custom Taxonomy', 'myapp' ),
					'add_new_item'      => __( 'Add New Custom Taxonomy', 'myapp' ),
					'new_item_name'     => __( 'New Custom Taxonomy Name', 'myapp' ),
					'menu_name'         => __( 'Custom Taxonomies', 'myapp' ),
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
