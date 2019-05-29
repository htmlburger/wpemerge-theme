<?php
/**
 * Base app layout.
 *
 * @package WPEmergeTheme
 */

?>
@include('header')

@if (!is_singular())
	@php app_the_title( '<h2 class="post-title">', '</h2>' ) @endphp
@endif

@yield('content')

@include('sidebar')

@include('footer')
