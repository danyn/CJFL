<?php
/**
 * The template for displaying the front page only.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allard
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php echo __FILE__ ?>
	<main id="main" class="site-main" role="main">
		<div class="entry-content">
<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'frontpage' );
		endwhile; // End of the loop.
?>

<!--https://stackoverflow.com/questions/21869117/display-content-of-most-recent-custom-post-type-on-a-page-->

            <?php
                $new_loop = new WP_Query( array(
                'post_type' => 'journal',
                'posts_per_page' => 1 
                ) );
            ?>
            
            <?php if ( $new_loop->have_posts() ) : ?>
                <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
					<h2> Current Issue </h2>
					<h2><?php the_title(); ?></h2>

					<?php echo get_post_meta( get_the_ID(), 'allard_synopsis', true ) ?>
					<a href="<?php the_permalink(); ?>">Abstract</a>
            
                <?php endwhile;?>
            <?php else: ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <?php allard_after_content() ?>
        </div><!-- .entry-content -->     




		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
