<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register shortcodes.
 */
class ShortcodesServiceProvider implements ServiceProviderInterface {
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
		// phpcs:ignore
		// add_shortcode( 'example', [$this, 'shortcodeExample'] );
	}

	/**
	 * Example shortcode.
	 *
	 * @param  array  $atts
	 * @param  string $content
	 * @return string
	 */
	public function shortcodeExample( $atts, $content ) {
		$atts = shortcode_atts(
			array(
				'example_attribute' => 'example_value',
			),
			$atts,
			'example'
		);

		ob_start();
		?>
		<div class="shortcode-example">
			<!-- Your shortcode content goes here ... -->
		</div>
		<?php
		$html = ob_get_clean();

		// Alternatively, you can use a WP Emerge View instead of a buffer:
		// $html = \MyApp::view( 'some-view' )->with( $atts )->with( 'content', $content )->toString();

		return $html;
	}
}
