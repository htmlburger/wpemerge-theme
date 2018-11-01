<?php
/**
 * App Layout: layouts/app.php
 *
 * This is the template that is used for displaying all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPEmergeTheme
 */

?>
@extends('layouts.app')

@section('content')
	@while (have_posts())
		@php the_post() @endphp
		<div @php post_class() @endphp>
			@php app_the_title( '<h2 class="post-title">', '</h2>' ) @endphp

			<div class="page__content">
				@php
				the_content();

				carbon_pagination( 'custom' );

				edit_post_link( __( 'Edit this entry.', 'app' ), '<p>', '</p>' );
				@endphp
			</div>
		</div>
	@endwhile
@endsection
