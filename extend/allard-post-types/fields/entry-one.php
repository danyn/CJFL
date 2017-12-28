<?php
/**
 * Entry Type One
 * create repeatable groups for adding content to the journal issues.
 * 
**/

add_action( 'cmb2_admin_init', 'register_journal_content_1' );

function register_journal_content_1() {
	global $journal_wysiwyg;
	$group_id = 'content_1';
	//used to call this in the front end template code -> entry_1
	$field_id = 'entry_1';
	
	$described_entry = "Choose an entry type for all the entries that follow in this group. For example, Articles.";

	$described_group = "Add as many entries here as you need and they will be displayed for this journal issue";

	
	//create the metabox
	$cmb_content_one = new_cmb2_box( array(
		'id'            => $group_id,
		'title'         => esc_html__( 'Journal Entry Group A', 'cmb2' ),
		'object_types'  => array( 'journal' ), // Post Type
	) );
	
	
	//FIELD: get_post_meta( get_the_ID(), 'entry_type', true ); 
	$cmb_content_one->add_field( array(
	'name'    => 'Entry Type',
	'desc'    => $described_entry,
	'default' => 'Articles',
	'id'      => 'entry_type_1',
	'type'    => 'text',
) );
	
	
	//https://github.com/CMB2/CMB2/wiki/Field-Types#group
	//FIELD: get_post_meta( get_the_ID(), 'entry_1', true );
	$field_id_one = $cmb_content_one->add_field( array(
		'id'          => $field_id,
		'type'        => 'group',
		'description' => __( $described_group, 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Entry To This Group', 'cmb2' ),
			'remove_button' => __( 'Remove This Entry', 'cmb2' ),
			// 'closed'     => true, // true to have the groups closed by default
			),
		) );
		
	//start adding in the repeatable fields

	$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Title',
		'id'   => 'title',
		'type' => 'text',
		) );
	
	$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Abstract',
		'id'   => 'abstract',
		'type'    => 'wysiwyg',
		'options' => $journal_wysiwyg,
	) );
	
}//register_journal_content_1