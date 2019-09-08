<?php
/**
 * This is the template that is used for displaying all posts by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPEmergeTheme
 */

?>
@extends('views.layouts.app')

@section('content')
	@include('partials.loop-single')
@endsection
