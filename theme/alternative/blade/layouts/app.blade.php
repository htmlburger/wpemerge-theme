<?php
/**
 * Base app layout.
 *
 * @package WPEmergeTheme
 */

?>

@php do_action('get_header') @endphp
@include('header')

@if (!is_singular())
	@php app_the_title( '<h2 class="post-title">', '</h2>' ) @endphp
@endif

@yield('content')

@php do_action('get_sidebar') @endphp
@include('sidebar')

@php do_action('get_footer') @endphp
@include('footer')
