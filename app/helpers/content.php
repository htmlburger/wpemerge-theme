<?php
/**
 * Content helpers.
 */

/**
 * Filter excerpt more.
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_more/
 * @return string
 */
function app_filter_excerpt_more() {
	return '...';
}

/**
 * Filter excerpt length.
 *
 * @see https://developer.wordpress.org/reference/hooks/excerpt_length/
 * @return integer
 */
function app_filter_excerpt_length() {
	return 55;
}

/**
 * Filter shortcode usage leading to empty paragraphs around it.
 *
 * @param  string $content Rich content to filter.
 * @return string
 */
function app_filter_fix_shortcode_empty_paragraphs( $content ) {
	$replacements = [
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
		']<br>'   => ']',
	];

	$content = strtr( $content, $replacements );

	return $content;
}

/**
 * Fix upload_dir urls having incorrect url schema.
 *
 * The wp_upload_dir() function urls' schema depends on the site_url option which
 * can cause issues when HTTPS is forced using a plugin, for example.
 *
 * @see    https://core.trac.wordpress.org/ticket/25449
 * @param  array $upload_dir Array containing the current upload directory’s path and url.
 * @return array Filtered array.
 */
function app_filter_fix_upload_dir_url_schema( $upload_dir ) {
	if ( is_ssl() ) {
		$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'https' );
		$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'https' );
	} else {
		$upload_dir['url']     = set_url_scheme( $upload_dir['url'], 'http' );
		$upload_dir['baseurl'] = set_url_scheme( $upload_dir['baseurl'], 'http' );
	}

	return $upload_dir;
}

/**
 * Escape user input from WYSIWYG editors.
 *
 * Calls all filters usually executed on `the_content`.
 *
 * @param  string $content The content that needs to be escaped.
 * @return string The escaped content.
 */
function app_content( $content ) {
	return apply_filters( 'app_content', $content );
}
