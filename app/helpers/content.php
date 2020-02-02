<?php
/**
 * Content helpers.
 *
 * @package WPEmergeTheme
 */

/**
 * Filter excerpt more.
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_more/
 * @return string
 */
function app_filter_excerpt_more() {
	return '...';
}

/**
 * Filter excerpt length.
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
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
 * @link https://core.trac.wordpress.org/ticket/25449
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
 * Get text suitable for the title attribute of a permalink anchor tag.
 *
 * @param integer $post_id Post ID to get the title of. Defaults to the current post.
 * @return string The title attribute value
 */
function app_get_permalink_title( $post_id = 0 ) {
	if ( 0 === $post_id ) {
		$post_id = get_the_ID();
	}

	/* translators: post link title attribute */
	return sprintf( __( 'Permanent Link to %s', 'app' ), get_the_title( $post_id ) );
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

/**
 * Get the 404 page content.
 *
 * @return string The title attribute value
 */
function app_get_index_404_message() {
	if ( is_category() ) {
		/* translators: no posts found for category */
		return sprintf( __( 'There are no posts in the %s category yet.', 'app' ), single_cat_title( '', false ) );
	}
	if ( is_tag() ) {
		/* translators: no posts found with tag */
		return sprintf( __( 'There are no posts with the %s tag yet.', 'app' ), single_tag_title( '', false ) );
	}

	if ( is_date() ) {
		return __( 'There are no posts published on this date.', 'app' );
	}

	if ( is_author() ) {
		$user = get_user_by( 'id', get_queried_object_id() );
		/* translators: no posts found by author */
		return sprintf( __( 'There are no posts published by %s yet.', 'app' ), $user->display_name );
	}

	if ( is_search() ) {
		return __( 'No posts found. Try a different search?', 'app' );
	}

	return __( 'No posts found.', 'app' );
}
