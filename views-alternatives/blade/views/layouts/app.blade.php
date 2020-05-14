<?php
/**
 * Base layout.
 *
 * @package MyApp
 */

?>
@include('views.partials.header')

@if (!is_singular())
	@php my_app_the_title( '<h2 class="post-title">', '</h2>' ) @endphp
@endif

@yield('content')

@include('views.partials.sidebar')

@include('views.partials.footer')
