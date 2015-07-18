<?php
/**
 * The template used for displaying gallery page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="filtration-gallery" id="filtration-gallery">

		<div class="album-selector" id="album-selector">
			<div class="album-button" id="album-button"> Select an Album </div>
			<?php
				$args = array(
					'order'             => 'DESC',
					'parent'            => '0',
					);

				$terms = get_terms('attachment_category', $args);

				$linkstart = '<li><a href="' . esc_url( home_url( '/gallery/?album=' ) );
				$linkslug = '" data-slug="';
				$linkend = ' <span class="album-arrows">&rang;&rang;</span></a></li>';

				echo '<ul class="mla-parent-categories" id="mla-parent-categories">';
				foreach ($terms as $value) {
					$slug = $value->slug;
					echo $linkstart . $slug . $linkslug . $slug . '">' . $value->name . '</a>';
					echo '<ul class="mla-sub-categories">';
					echo $linkstart . $slug . $linkslug . $slug . '">All' . $linkend;
					$newargs = array( 'parent' => $value->term_id );
					$subterms = get_terms('attachment_category', $newargs);
					foreach ($subterms as $subvalue) {
						$s_slug = $subvalue->slug;
						echo $linkstart . $s_slug . $linkslug . $s_slug . '">' . $subvalue->name . $linkend;
					}
					echo '</ul> <!-- .mla-sub-categories -->';
					echo '</li>';
				}
				echo '</ul> <!-- .mla-parent-category -->';
			?>
		</div> <!-- .album-selector -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<div id="current-album-wrapper">
			<div class="current-album" id="current-album">
			<?php
				if ( term_exists( $_GET["album"], 'attachment_category' ) ) {
					$slugarray = array( 'slug' => $_GET["album"], );
					$albumarray = get_terms( 'attachment_category', $slugarray );
					echo '<h2>' . $albumarray[0]->name . '</h2>';
					echo do_shortcode( '[mla_gallery attachment_category=' . $_GET["album"] . ' size=thumbnail link=full]' );
				} else {
					echo '<h2>' . date("Y") . ' Events</h2>';
					echo do_shortcode( '[mla_gallery attachment_category=' . date("Y") . '-events size=thumbnail link=full]' );
				}
			?>
			</div> <!-- .current-album -->
		</div> <!-- #current-album-wrapper -->

	</div> <!-- .filtration-gallery -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
