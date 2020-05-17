<?php
/**
 * Theme header partial.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyApp
 */

?>
@php apply_filters( "wpemerge.partials.header.hook", true ) && do_action('get_header') @endphp
<!DOCTYPE html>
<html @php language_attributes() @endphp>
	<head>
		<meta http-equiv="Content-Type" content="@php bloginfo( 'html_type' ) @endphp; charset=@php bloginfo( 'charset' ) @endphp" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="@php bloginfo( 'pingback_url' ) @endphp" />

		@php wp_head() @endphp
	</head>
	<body @php body_class() @endphp>
		@php my_app_shim_wp_body_open() @endphp

		@include('views.partials.logo')
