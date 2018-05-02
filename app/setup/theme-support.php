<?php
/**
 * Declare theme functionality support.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'gallery' ) );

/**
 * Manually select Post Formats to be supported.
 *
 * @see http://codex.wordpress.org/Post_Formats
 */

// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
