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
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>
		<?php app_the_title( '<h2 class="post-title">', '</h2>' ); ?>

		<div class="page__content">
			<?php
			the_content();

			carbon_pagination( 'custom' );

			edit_post_link( __( 'Edit this entry.', 'app' ), '<p>', '</p>' );
			?>
		</div>
	</div>
<?php endwhile; ?>
