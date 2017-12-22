<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allard
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* call the template part with a loop in it for journal post type*/

				get_template_part( 'template-parts/content', 'journal-archive' );

			the_posts_navigation();
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
