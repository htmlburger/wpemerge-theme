<?php
/**
 * Base layout.
 *
 * @package MyTheme
 */

?>
@include('views.partials.header')

@if (!is_singular())
	@php mytheme_the_title( '<h2 class="post-title">', '</h2>' ) @endphp
@endif

@yield('content')

@include('views.partials.sidebar')

@include('views.partials.footer')
