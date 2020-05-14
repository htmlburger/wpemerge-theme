<?php
/**
 * Sidebar partial.
 *
 * @link https://codex.wordpress.org/Customizing_Your_Sidebar
 *
 * @package MyApp
 */

?>
<div class="sidebar">
	<ul class="widgets">
		<?php dynamic_sidebar( \MyApp::core()->sidebar()->getCurrentSidebarId() ); ?>
	</ul>
</div>
