<?php
/**
 * Search form partial.
 *
 * @link https://codex.wordpress.org/Customizing_Your_Sidebar
 */

?>
<div class="sidebar">
	<ul class="widgets">
		<?php dynamic_sidebar( Theme\Sidebar::getCurrentSidebarId() ); ?>
	</ul><!-- /.widgets -->
</div><!-- /.sidebar -->
