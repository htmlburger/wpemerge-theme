<?php
/**
 * This is the template that is used for displaying all pages by default
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div <?php post_class( 'page' ); ?>>
		<?php app_the_title( '<h2 class="page__title pagetitle">', '</h2>' ); ?>

		<div class="page__entry">
			<?php
			the_content();

			carbon_pagination( 'custom' );

			edit_post_link( __( 'Edit this entry.', 'app' ), '<p>', '</p>' );
			?>
		</div><!-- /.page__entry -->
	</div><!-- /.page -->
<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
