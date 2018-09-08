<?php
/**
 * App Layout: layouts/app.php
 *
 * The main template file.
 *
 * This is the template that is used for displaying:
 * - posts
 * - single posts
 * - archive pages
 * - search results pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */

?>
@extends('layouts.app')

@section('content')
	@if (is_single())
		@include('partials.loop-single')
	@else
		@include('partials.loop')
	@endif
@endsection
