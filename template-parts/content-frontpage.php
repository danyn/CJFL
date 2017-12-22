<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allard
 */

?>

	<h2 class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</h2r><!-- .entry-header -->

		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'allard' ),
				'after'  => '</div>',
			) );
		?>
	



