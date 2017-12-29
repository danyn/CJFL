<?php

add_action( 'init', 'create_allard_post_types' );
/**
 * Register a Journal Volume post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
defined( 'ABSPATH' ) or die( 'Please visit the main site - have a great day!' );

function create_allard_post_types() {
	$labels = array(
		'name'               => _x( 'Journal Volumes', 'post type general name', 'allard-post-types' ),
		'singular_name'      => _x( 'Journal Volume', 'post type singular name', 'allard-post-types' ),
		'menu_name'          => _x( 'Journal Volumes', 'admin menu', 'allard-post-types' ),
		'name_admin_bar'     => _x( 'Journal Volume', 'add new on admin bar', 'allard-post-types' ),
		'add_new'            => _x( 'Add New', 'Journal Volume', 'allard-post-types' ),
		'add_new_item'       => __( 'Add New Journal Volume', 'allard-post-types' ),
		'new_item'           => __( 'New Journal Volume', 'allard-post-types' ),
		'edit_item'          => __( 'Edit Journal Volume', 'allard-post-types' ),
		'view_item'          => __( 'View Journal Volume', 'allard-post-types' ),
		'all_items'          => __( 'All Journal Volumes', 'allard-post-types' ),
		'search_items'       => __( 'Search Journal Volumes', 'allard-post-types' ),
		'parent_item_colon'  => __( 'Parent Journal Volumes:', 'allard-post-types' ),
		'not_found'          => __( 'No Journal Volumes found.', 'allard-post-types' ),
		'not_found_in_trash' => __( 'No Journal Volumes found in Trash.', 'allard-post-types' )
	);

	$args = array(
		'labels'             => $labels,
             'description'        => __( 'Description.', 'allard-post-types' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'journal-volumes' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 2,
             'menu_icon' =>'dashicons-book-alt',
		'supports'           => array( 'title', 'author')
	);

	register_post_type( 'journal', $args );
}