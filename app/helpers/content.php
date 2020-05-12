<?php
/**
 * Content helpers.
 *
 * @package MyApp
 */

/**
 * Get text suitable for the title attribute of a permalink anchor tag.
 *
 * @param integer $post_id Post ID to get the title of. Defaults to the current post.
 * @return string The title attribute value
 */
function myapp_get_permalink_title( $post_id = 0 ) {
	if ( 0 === $post_id ) {
		$post_id = get_the_ID();
	}

	/* translators: post link title attribute */
	return sprintf( __( 'Permanent Link to %s', 'myapp' ), get_the_title( $post_id ) );
}

/**
 * Get the 404 page content.
 *
 * @return string The title attribute value
 */
function myapp_get_index_404_message() {
	if ( is_category() ) {
		/* translators: no posts found for category */
		return sprintf( __( 'There are no posts in the %s category yet.', 'myapp' ), single_cat_title( '', false ) );
	}
	if ( is_tag() ) {
		/* translators: no posts found with tag */
		return sprintf( __( 'There are no posts with the %s tag yet.', 'myapp' ), single_tag_title( '', false ) );
	}

	if ( is_date() ) {
		return __( 'There are no posts published on this date.', 'myapp' );
	}

	if ( is_author() ) {
		$user = get_user_by( 'id', get_queried_object_id() );
		/* translators: no posts found by author */
		return sprintf( __( 'There are no posts published by %s yet.', 'myapp' ), $user->display_name );
	}

	if ( is_search() ) {
		return __( 'No posts found. Try a different search?', 'myapp' );
	}

	return __( 'No posts found.', 'myapp' );
}
