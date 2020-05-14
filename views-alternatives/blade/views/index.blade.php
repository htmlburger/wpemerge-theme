<?php
/**
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
 * @package MyApp
 */

?>
@extends('views.layouts.app')

@section('content')
	@include('views.partials.loop')
@endsection
