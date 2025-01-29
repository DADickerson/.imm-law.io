<?php /* Template Name: Landing Darius Portfolio */ get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>
	
	<?php edit_post_link(); ?>

<?php endwhile; ?>

<?php else: ?>

	<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

<?php endif; ?>


<?php get_footer(); ?>