<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register login page filters.
 */
class LoginServiceProvider implements ServiceProviderInterface {
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
		add_filter( 'login_headerurl', [$this, 'filterLoginHeaderUrl'] );

		if ( version_compare( get_bloginfo( 'version' ), '5.2', '<' ) ) {
			add_filter( 'login_headertitle', [$this, 'filterLoginHeaderTest'] );
		}

		add_filter( 'login_headertext', [$this, 'filterLoginHeaderTest'] );
	}

	/**
	 * Filter the login page header URL.
	 *
	 * @return string
	 */
	public function filterLoginHeaderUrl() {
		return home_url( '/' );
	}

	/**
	 * Filter the login page header text.
	 *
	 * @return string
	 */
	public function filterLoginHeaderTest() {
		return get_bloginfo( 'name' );
	}
}
