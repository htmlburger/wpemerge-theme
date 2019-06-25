<?php
/* Display the post content */
while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>

		<div class="page__content">
			<?php
			the_content();

			carbon_pagination( 'custom' );

			edit_post_link( __( 'Edit this entry.', 'app' ), '<p>', '</p>' );
			?>
		</div>
	</div>
<?php endwhile; ?>
