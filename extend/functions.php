<?php
/**
 * allard custon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package allard
 */

//includes
//CMB2 and the custom post type
require get_template_directory() . '/extend/allard-post-types/Allard-Custom-Post-Types.php';



//functions
function allard_after_content(){
	
	echo "<p class='allard-disclaimer'>The Canadian Journal of Family Law/Revue Canadienne de Droit Familial
	is an academic legal publication. We do not provide legal services nor
	do we respond to questions of a legal nature. The content on this site
	is not intended to be a substitute or forum for legal advice.
	For legal advice, please contact your local Bar Society for lawyers
	who practice in your area. </p> ";
}

function allard_query_args($post_type, $posts_per_page, $cmb_volume, $cmb_issue ){
	//the Args   https://codex.wordpress.org/Class_Reference/WP_Query#Parameters
	//use post_per_page = -1 to show all posts
	
	return array(
    'post_type' => $post-type,
    'posts_per_page' => $posts_per_page,
    'meta_query' => array(
    	'volume_num' => array(key=>$cmb_volume),
    	'issue_num' => array(key=>$cmb_issue),
    	),
    'orderby' =>  array( 'volume_num' => 'DESC', 'issue_num' => 'ASC' ),
	);
}


function allard_debug_archive($num_volumes, $half_volumes, $is_even){
//	allard_debug_archive($num_volumes, $half_volumes, $is_even);
	
	echo '<div style="position:fixed;background-color:rgba(255,255,2550,.8);width:300px;border:1px solid black;overflow:auto">';

	//dump the query result so you can see what it is
	//	var_dump($query_results_journals);
	
    echo "	<p>Post ID:" . get_the_ID()  . " -> " .gettype(get_the_ID()) . "</p1>";
	
	echo "	<p>Journal Volume:" . get_post_meta( get_the_ID(), 'allard_volume', true )  . " -> " .gettype ( get_post_meta( get_the_ID(), 'allard_volume', true ) ) . "</p1>";
	

 	echo "	<p> Number of volumes: " . $num_volumes . " -> " .gettype($num_volumes) . "</p>";


	echo "	<p> Half of the volumes: " . $half_volumes . " -> " .gettype($half_volumes) . "</p>";


	echo "	<p>Is even: " .$is_even. " -> " .gettype($is_even) ."</p>";


	echo "	<p>The first issue returned is: " . get_post_meta( get_the_ID(), 'allard_issue', true ) . " -> " .gettype(get_post_meta( get_the_ID(), 'allard_issue', true )) ."</p>";

	echo '</div>';

}

function allard_open_archives_div($volume_number, $num_volumes, $div_break){
//	 call->
//	allard_open_archives_div($volume_number, $num_volumes, $div_break);
	
	if ( $volume_number == $num_volumes ){
		//write an opening div when its the most recent volume
		echo ' <div class="journal-archives journal-archives-left">';
	}elseif($volume_number == $div_break ){
		//write an opening div when at half volume mark
		echo ' <div class="journal-archives journal-archives-right">';
	}
}

function allard_close_archives_div($div_break, $volume_number){
//	allard_close_archives_div($div_break, $volume_number);
	
 	if ( $volume_number == ($div_break + 1)) {
		//write the closing div for  .journal-archives-left 
		echo ' </div>  <!-- .journal-archives-left -->';
  	}elseif($volume_number == 1 ) {
		//write the closing div for .journal-archives-right
		//here the volume represents the final volume in the result->Volume 1 (DESC) 
		echo ' </div>  <!-- .journal-archives-right -->';
	}
}

function allard_print_volume($volume_number, $issues){
	
//	allard_print_volume($volume_number, $issues);
	
	echo '<div class="a-journal">';
	echo '<div class="big-volume-number"> Volume '. $volume_number . '</div> <!-- .big-volume-number -->' ;
	echo '<div class="volume-issues">';
	echo '<ul>' . $issues . '</ul>';    
	echo '</div> <!-- .volume-issues -->';
	echo '</div> <!-- .a-journal -->';

}
	 	
	 	
	 	
	 	
