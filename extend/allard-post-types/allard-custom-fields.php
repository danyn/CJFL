<?php 
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}



add_action( 'cmb2_admin_init', 'register_journal_details' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
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





//set up the defualts for a wysiwyg
$journal_wysiwyg = array(
        'wpautop' => true, // use wpautop?
        'media_buttons' => false, // show insert/upload button(s)
        'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
        'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
        'tabindex' => '',
        'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
        'editor_class' => '', // add extra class(es) to the editor textarea
        'teeny' => true, // output the minimal editor config used in Press This
        'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
        'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
    );


//create repeatable groups for adding content to the journal issues.

add_action( 'cmb2_admin_init', 'register_journal_content_1' );

function register_journal_content_1() {
	global $journal_wysiwyg;
	$prefix = 'journal_content_1_';
	
	$described_entry = "Use the same entry type for all the entries that follow in this group. For example, Articles.";

	/**
	 * entry type one
	 */
	
	$cmb_content_one = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Journal Entry Group One', 'cmb2' ),
		'object_types'  => array( 'journal' ), // Post Type
	) );
	
	$field_id_one = $cmb_content_one->add_field( array(
		'id'          => 'entry_1',
		'type'        => 'group',
		'description' => __( $described_entry, 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb2' ), 
			'add_button'    => __( 'Add Another Entry To This Group', 'cmb2' ),
			'remove_button' => __( 'Remove This Entry', 'cmb2' ),
			// 'closed'     => true, // true to have the groups closed by default
			),
		) );

		$cmb_content_one->add_group_field( $field_id_one, array(
		'name' => 'Entry Type',
		'id'   => 'entry_type',
		'type' => 'text',
		) );

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
