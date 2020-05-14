<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register widgets and sidebars.
 */
class MenusServiceProvider implements ServiceProviderInterface {
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
		add_action( 'after_setup_theme', [$this, 'registerMenus'] );
	}

	/**
	 * Register menu locations.
	 *
	 * @return void
	 */
	public function registerMenus() {
		register_nav_menus(
			[
				'main-menu' => __( 'Main Menu', 'my_app' ),
			]
		);
	}
}
