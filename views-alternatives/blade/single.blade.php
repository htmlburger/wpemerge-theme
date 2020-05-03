<?php
/**
 * This is the template that is used for displaying all posts by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyTheme
 */

?>
@extends('views.layouts.app')

@section('content')
	@include('views.partials.loop-single')
@endsection
