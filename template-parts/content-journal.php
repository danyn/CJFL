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
		$entries = get_post_meta( get_the_ID(), 'entry_1', true );
		$entry_type = get_post_meta( get_the_ID(), 'entry_type', true );
//		debug
//		var_dump($entries);
//		echo "<h2>$entry_type</h2>"  ; 

		//get the entry type of the first element and use it for the title of this group
		//iterate if it is set 
		if ( isset($entry_type) && !empty($entry_type)){
			echo '<h1>' . $entry_type . '</h1>';
			echo '<ul>';
			//iterate through the post entry to get info
			
			foreach ( (array) $entries as $key => $entry ) {

			//	one assignment to empty string
				$title = $abstract = $s='';

				if ( isset( $entry['title'] ) ) {
					echo '<li>' . esc_html( $entry['title'] ) . '</li>';		
				}

				if ( isset( $entry['abstract'] ) ) {
					echo  wpautop( $entry['abstract'] ) ;
				}

			}//foreach
			echo '</ul>';
		}else{
			echo '<p>There is no content for this issue currently</p>';
		}
			
		
		
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php allard_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
