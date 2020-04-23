<?php
/**
 * Base layout.
 *
 * @package WPEmergeTheme
 */

?>
@include('views.partials.header')

@if (!is_singular())
	@php app_the_title( '<h2 class="post-title">', '</h2>' ) @endphp
@endif

@yield('content')

@include('views.partials.sidebar')

@include('views.partials.footer')
