<?php
/**
 * Entry Group A
 * create repeatable groups for adding content to the journal issues.
 *  
 * FIELD: get_post_meta( get_the_ID(), 'entry_type_1', true ); 
 * FIELD: get_post_meta( get_the_ID(), 'entry_1', true );
 * keys ('author','title', 'abstract')
**/

add_action( 'cmb2_admin_init', 'register_journal_content_1' );

function register_journal_content_1() {
	
	//vars for the meta box
	$box_id = 't_8';//meta box id used internally by cmb2
	$title= 'Journal Entry Group A';  ;

	
	//vars for the entry type
	$field_entry_type_id =  'entry_type_1';//string field used in template code
	
	$described_entry = "Choose an entry type for all the entries that follow in this group. For example, Articles. This will also be the heading that is displayed when a person visits the website so if there is more than one plural is a good choice. Article for one article and Articles for more than one article.";
	
	//vars for the repeating group
	$field_group_id = 'entry_1';//string field used in template code
	
	$described_group = "Add as many entries here as you need and they will be displayed for this journal issue";
	
	global $journal_wysiwyg;
	
	//create the metabox  
	$cmb_content_one = new_cmb2_box( array(
		'id'            => $box_id,
		'title'         => esc_html__( $title, 'cmb2' ),
		'object_types'  => array( 'journal' ), // Post Type
	) );
		
	
	$cmb_content_one->add_field( array(
	'name'    => 'Entry Type',
	'desc'    => $described_entry,
	'id'      => $field_entry_type_id,
	'type'    => 'text',
) );
	

	//https://github.com/CMB2/CMB2/wiki/Field-Types#group

	$field_id_one = $cmb_content_one->add_field( array(
		'id'          => $field_group_id,
		'type'        => 'group',
		'description' => __( $described_group, 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Entry To This Group', 'cmb2' ),
			'remove_button' => __( 'Remove This Entry', 'cmb2' ),
			// 'closed'     => true, // true to have the groups closed by default
			),
		) );
		
	//start adding in the repeatable fields for the group

	$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
		) );
	
		$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Author(s)',
		'id'   => 'author',
		'type' => 'text',
		) );
	
	$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Abstract',
		'id'   => 'abstract',
		'type'    => 'wysiwyg',
		'options' => $journal_wysiwyg,
	) );
	
}//register_journal_content_1