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


//set any defaults here: tinymce,...
require_once dirname(__FILE__) . '/fields/defaults.php';

/**
 * add a meta box for each journal's year, volume, and issue number
 ** FIELD: get_post_meta( get_the_ID(), 'year', true );
 ** FIELD: get_post_meta( get_the_ID(), 'volume', true );
 ** FIELD: get_post_meta( get_the_ID(), 'issue', true );	
 */
require_once dirname(__FILE__) . '/fields/details.php';


/**
 * Entry Type One
 * create repeatable groups for adding content to the journal issues.
 *  
 *  FIELD: get_post_meta( get_the_ID(), 'entry_type_1', true );
 *	FIELD: get_post_meta( get_the_ID(), 'entry_1', true ); 
 *  -> keys ('author','title', 'abstract')
**/
require_once dirname(__FILE__) . '/fields/entry-one.php';


/**
 * Entry Type Two
 * create repeatable groups for adding content to the journal issues.
 * 
 *  FIELD: get_post_meta( get_the_ID(), 'entry_type_2', true );
 *	FIELD: get_post_meta( get_the_ID(), 'entry_2', true ); 
 *  -> keys ('author','title', 'abstract')
**/
require_once dirname(__FILE__) . '/fields/entry-two.php';

