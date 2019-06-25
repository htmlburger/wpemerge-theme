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
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-9">
			<?php WPEmerge\layout_content();?>
		</div>
		<div class="col d-sm-none d-lg-block">
			<?php WPEmerge\render( 'sidebar' );  ?>
		</div>
	</div>
</div>
<?php WPEmerge\render( 'footer' ); ?>
