<?php
/**
 * Declare all your actions and filters here.
 */

/**
 * ------------------------------------------------------------------------
 * WordPress
 * ------------------------------------------------------------------------
 */

/**
 * Assets
 */
add_action( 'wp_enqueue_scripts', 'app_action_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'app_action_admin_enqueue_scripts' );
add_action( 'login_enqueue_scripts', 'app_action_login_enqueue_scripts' );

add_action( 'wp_head', 'app_action_add_favicon', 5 );
add_action( 'login_head', 'app_action_add_favicon', 5 );
add_action( 'admin_head', 'app_action_add_favicon', 5 );

add_filter( 'upload_mimes', 'app_filter_add_svg_support' );

add_filter( 'upload_dir', 'app_filter_fix_upload_dir_url_schema' );

/**
 * Content
 */
add_filter( 'excerpt_more', 'app_filter_excerpt_more' );
add_filter( 'excerpt_length', 'app_filter_excerpt_length', 999 );
add_filter( 'the_content', 'app_filter_fix_shortcode_empty_paragraphs' );

// Attach all suitable hooks from `the_content` on `app_content`.
add_filter( 'app_content', 'do_shortcode',                               9 );
add_filter( 'app_content', 'app_filter_fix_shortcode_empty_paragraphs', 10 );
add_filter( 'app_content', 'wptexturize',                               10 );
add_filter( 'app_content', 'wpautop',                                   10 );
add_filter( 'app_content', 'shortcode_unautop',                         10 );
add_filter( 'app_content', 'prepend_attachment',                        10 );
add_filter( 'app_content', 'wp_make_content_images_responsive',         10 );
add_filter( 'app_content', 'convert_smilies',                           20 );

/**
 * Login
 */
add_filter( 'login_headerurl', 'app_filter_login_headerurl' );
add_filter( 'login_headertitle', 'app_filter_login_headertitle' );

/**
 * ------------------------------------------------------------------------
 * External Libraries and Plugins.
 * ------------------------------------------------------------------------
 */
