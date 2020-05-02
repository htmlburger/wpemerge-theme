<?php

namespace App\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Registers widgets and sidebars.
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
			'app_custom_post_type',
			array(
				'labels'              => array(
					'name'               => __( 'Custom Types', 'app' ),
					'singular_name'      => __( 'Custom Type', 'app' ),
					'add_new'            => __( 'Add New', 'app' ),
					'add_new_item'       => __( 'Add new Custom Type', 'app' ),
					'view_item'          => __( 'View Custom Type', 'app' ),
					'edit_item'          => __( 'Edit Custom Type', 'app' ),
					'new_item'           => __( 'New Custom Type', 'app' ),
					'search_items'       => __( 'Search Custom Types', 'app' ),
					'not_found'          => __( 'No custom types found', 'app' ),
					'not_found_in_trash' => __( 'No custom types found in trash', 'app' ),
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
	}
}
