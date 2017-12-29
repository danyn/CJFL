<?php
/**
 * Template part for displaying the archive page for journals.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allard
 */ 

?>

<?php
//init data for layout of the page.

//get the args for our query defined in extend/functions.php
$args = allard_query_args('journal', -1, 'allard_volume', 'allard_issue');

// The Query Results object
$query_results_journals = new WP_Query( $args );

//	start by seeing if there are any posts
if ( $query_results_journals->have_posts() ) {
	//iterate the post forward once for the first post
	//all other calls to the_post() happen in a nested while based on volume number 
	$query_results_journals->the_post();
	//results are sorted desc so the first result is the number of volumes
	$num_volumes = 1.0 * get_post_meta( get_the_ID(), 'allard_volume', true );

	//determine half of the volumes for layout reasons
	$half_volumes = $num_volumes/2.0;

	//should yield 0.5 for odd numbers and 0 for even
	$is_even = ( $half_volumes - floor($half_volumes) ) == 0;
	
	//create logic for layout based on number of volumes not related to number of posts - used to decide when to write a closing div
	if($is_even){
		$div_break = $half_volumes;
	}else{
		$div_break = floor($half_volumes);
	}

?>

	<!--debug info-->
	<?php  //allard_debug_archive($num_volumes, $half_volumes, $is_even);?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
	<div class="entry-content">
		<div class="all-journal-archives">
		<div class="volume-summary">
   			  <h1>Past Issues</h1>
   			  <p>
   			  	<span>Canadian Journal of Family Law</span><br>
			  	Volume 1, Number 1, 1978 - <?php echo get_the_title() ?>
			  </p>
  		</div> 
 		
     
<?php
		//start looping through results
	while ( $query_results_journals->have_posts() ) {	
		
		//current volume number		
		$volume_number= 1 * get_post_meta( get_the_ID(), 'allard_volume', true );

		//open divs conditionally to create columns based on the number of volumes
		allard_open_archives_div($volume_number, $num_volumes, $div_break);
		
		//create a clean accumulator for the issues which is a set of <li>
		$issues = ""; 
		
		//iterate the_post() forward until the volume# changes
		while( $volume_number==get_post_meta( get_the_ID(), 'allard_volume', true ) ){
			$issues .=  '<li> <a href="' . get_the_permalink() .'" title="'. '">'. get_the_title() . '</a></li>';      
			$query_results_journals->the_post();  //iterate the post variable forward 
		}

		//display the issues of the volume inside a <ul>
		allard_print_volume($volume_number, $issues);
		
		//conditionally close either the left column or right column 
		allard_close_archives_div($div_break, $volume_number);
        
	}//end while have posts
    
	echo '</div>';//.all-journal-archives
	  

} else {// have posts is false.
	echo 'The Archive for Jounral Volumes is currently empty. ';
}
  
  /* Restore original Post Data */
  wp_reset_postdata();

?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php allard_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
