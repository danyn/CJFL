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



add_action( 'cmb2_admin_init', 'allard_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function allard_register_metabox() {
	$prefix = 'allard_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_allard = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'journal', 'cmb2' ),
		'object_types'  => array( 'journal' ), // Post type
	) );
	
	
	$cmb_allard->add_field( array(
		'name' => esc_html__( 'Year', 'cmb2' ),
		'desc' => esc_html__( 'Year of publication', 'cmb2' ),
		'id'   => $prefix . 'year',
		'type' => 'text_small',
	) );
	


	$cmb_allard->add_field( array(
		'name' => esc_html__( 'Volume', 'cmb2' ),
		'desc' => esc_html__( 'Volume Number', 'cmb2' ),
		'id'   => $prefix . 'volume',
		'type' => 'text_small',
	) );
	
	
	$cmb_allard->add_field( array(
		'name' => esc_html__( 'Number', 'cmb2' ),
		'desc' => esc_html__( 'The issue number within a given Volume', 'cmb2' ),
		'id'   => $prefix . 'issue',
		'type' => 'text_small',
	) );
	
//	repeatable group article
	
	$article_field_id = $cmb_allard->add_field( array(
	'id'          => 'Articles',
	'type'        => 'group',
	'name'		  => 'Articles In This Issue',
	'description' => __( 'Add Article Entries Below.', 'cmb2' ),
	'options'     => array(
		'group_title'   => __( 'Article {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
		'add_button'    => __( 'Add Another Article To This Issue', 'cmb2' ),
		'remove_button' => __( 'Remove This Article', 'cmb2' ),
		'sortable'      => true, // beta
		// 'closed'     => true, // true to have the groups closed by default
	),
) );


$cmb_allard->add_group_field( $article_field_id, array(
	'name' => 'Title',
	'id'   => 'title',
	'type' => 'text',
//	'repeatable' => true,
) );

$abstract_wysig = array(
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
	
$cmb_allard->add_group_field( $article_field_id, array(
	'name' => 'Abstract',
	'id'   => 'abstract',
	'type'    => 'wysiwyg',
    'options' => $abstract_wysig,
) );
	




}