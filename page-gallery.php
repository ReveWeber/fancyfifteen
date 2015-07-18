<?php
/**
 * The template for displaying the gallery page
 * Change the name of this file to page-[pageslug].php
 * should you want a different page name than Gallery
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); // Start the loop.
			get_template_part( 'content', 'gallery' );
		endwhile; // End the loop.
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
