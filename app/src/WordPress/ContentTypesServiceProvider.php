<?php

namespace MyTheme\WordPress;

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
			'mytheme_custom_post_type',
			array(
				'labels'              => array(
					'name'               => __( 'Custom Types', 'mytheme' ),
					'singular_name'      => __( 'Custom Type', 'mytheme' ),
					'add_new'            => __( 'Add New', 'mytheme' ),
					'add_new_item'       => __( 'Add new Custom Type', 'mytheme' ),
					'view_item'          => __( 'View Custom Type', 'mytheme' ),
					'edit_item'          => __( 'Edit Custom Type', 'mytheme' ),
					'new_item'           => __( 'New Custom Type', 'mytheme' ),
					'search_items'       => __( 'Search Custom Types', 'mytheme' ),
					'not_found'          => __( 'No custom types found', 'mytheme' ),
					'not_found_in_trash' => __( 'No custom types found in trash', 'mytheme' ),
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
			'mytheme_custom_taxonomy',
			array( 'post_type' ),
			array(
				'labels'            => array(
					'name'              => __( 'Custom Taxonomies', 'mytheme' ),
					'singular_name'     => __( 'Custom Taxonomy', 'mytheme' ),
					'search_items'      => __( 'Search Custom Taxonomies', 'mytheme' ),
					'all_items'         => __( 'All Custom Taxonomies', 'mytheme' ),
					'parent_item'       => __( 'Parent Custom Taxonomy', 'mytheme' ),
					'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'mytheme' ),
					'view_item'         => __( 'View Custom Taxonomy', 'mytheme' ),
					'edit_item'         => __( 'Edit Custom Taxonomy', 'mytheme' ),
					'update_item'       => __( 'Update Custom Taxonomy', 'mytheme' ),
					'add_new_item'      => __( 'Add New Custom Taxonomy', 'mytheme' ),
					'new_item_name'     => __( 'New Custom Taxonomy Name', 'mytheme' ),
					'menu_name'         => __( 'Custom Taxonomies', 'mytheme' ),
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
