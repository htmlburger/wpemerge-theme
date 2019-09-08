<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Customizing_Your_Sidebar
 *
 * @package WPEmergeTheme
 */

?>
@php do_action('get_sidebar') @endphp
<div class="sidebar">
	<ul class="widgets">
		@php dynamic_sidebar( Theme\Sidebar::getCurrentSidebarId() ) @endphp
	</ul>
</div>
