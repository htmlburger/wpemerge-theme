<?php

namespace MyApp\View;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register view composers and globals.
 * This is an example class so feel free to modify or remove it.
 */
class ViewServiceProvider implements ServiceProviderInterface {
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
		$this->registerGlobals();
		$this->registerComposers();
	}

	/**
	 * Register view globals.
	 *
	 * @return void
	 */
	protected function registerGlobals() {
		/**
		 * Globals
		 *
		 * @link https://docs.wpemerge.com/#/framework/views/overview
		 */
		// phpcs:ignore
		// \MyApp::views()->addGlobal( 'foo', 'bar' );
	}

	/**
	 * Register view composers.
	 *
	 * @return void
	 */
	protected function registerComposers() {
		/**
		 * View composers
		 *
		 * @link https://docs.wpemerge.com/#/framework/views/view-composers
		 */
		// phpcs:ignore
		// \MyApp::views()->addComposer( 'views/partials/foo', 'FooPartialViewComposer' );
	}
}
