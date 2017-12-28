<?php
/**
 * add a meta box for each journal's year, volume, and issue number
 */

add_action( 'cmb2_admin_init', 'register_journal_details' );

function register_journal_details() {
	$prefix = 'journal_details_';

	/**
	 * Setup the journal details
	 */
	$cmb_journal_details = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Journal Details', 'cmb2' ),
		'object_types'  => array( 'journal' ), // Post type
	) );
	
	
	$cmb_journal_details->add_field( array(
		'name' => esc_html__( 'Year', 'cmb2' ),
		'desc' => esc_html__( 'Year of publication', 'cmb2' ),
		'id'   => $prefix . 'year',
		'type' => 'text_small',
	) );
	


	$cmb_journal_details->add_field( array(
		'name' => esc_html__( 'Volume', 'cmb2' ),
		'desc' => esc_html__( 'Volume Number', 'cmb2' ),
		'id'   => $prefix . 'volume',
		'type' => 'text_small',
	) );
	
	
	$cmb_journal_details->add_field( array(
		'name' => esc_html__( 'Number', 'cmb2' ),
		'desc' => esc_html__( 'The issue number within a given Volume', 'cmb2' ),
		'id'   => $prefix . 'issue',
		'type' => 'text_small',
	) );
}//journal detials