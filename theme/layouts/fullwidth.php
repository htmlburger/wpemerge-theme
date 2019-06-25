<?php
/**
 * Base app layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package WPEmergeTheme
 */

WPEmerge\render( 'header' );
?>

<div class="container-fluid">
	<div class="row">
		<div class="col">

      <?php
			$renderBefore = apply_filters('emergence_render_before_content', []);
			foreach ($renderBefore as $file) {
				WPEmerge\render($file);
			}
			WPEmerge\layout_content();
			$renderBefore = apply_filters('emergence_render_after_content', []);
			foreach ($renderBefore as $file) {
				WPEmerge\render($file);
			}
			?>
		</div>
	</div>
</div>
<?php WPEmerge\render( 'footer' ); ?>
