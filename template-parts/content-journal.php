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
//		gather all of the meta information into an array with the type at 0 and
//	 	the array of title, author and abstract at 1
		
		$entry_cache = array(array(get_post_meta( get_the_ID(), 'entry_type_1', true ),
								   get_post_meta( get_the_ID(), 'entry_1', true )),
							 array(get_post_meta( get_the_ID(), 'entry_type_2', true ),
								   get_post_meta( get_the_ID(), 'entry_2', true )),
							);
//		iterate through the array calling a markup function
		$is_content=0;
		foreach($entry_cache as $value){
				if ( isset($value[0]) && !empty($value[0]) ){
					allard_print_content($value[0], $value[1]);
					$is_content += 1;
				}	
		}
		if($is_content==0){
			echo '<p>There is no content for this issue currently</p>';
		}
?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php allard_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
