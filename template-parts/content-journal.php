<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allard
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php echo __FILE__ ?>


	<div class="entry-content">
	    <header class="entry-header">
	    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	    </header>
	<?php
		
		$entry_type_1 = get_post_meta( get_the_ID(), 'entry_type_1', true );
		$entries_1 = get_post_meta( get_the_ID(), 'entry_1', true );
		
//		debug
//		var_dump($entries);
//		echo "<h2>$entry_type</h2>"  ; 

		
		//iterate if it is set 
if ( isset($entry_type_1) && !empty($entry_type_1)){
	allard_print_content($entry_type_1, $entries_1);
	
}

		
		

		
		
		
		
		
//		}else{
//			echo '<p>There is no content for this issue currently</p>';
//		}
			
		
		
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php allard_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
