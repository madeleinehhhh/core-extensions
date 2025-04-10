<?php
/**
 * Example
 * Create a file, like this one, for each singular function/feature you're adding
 *
 * @package    APCoreExtensions
 * @since      1.0.0
 * @copyright  Copyright (c) 2025, Madeleine Herritage
 * @license    GPL-2.0+
**/

function ap_cpt_teammember() {
	register_post_type('ap_team',
		array(
			'labels'      => array(
				'name'          => __('Team Members', 'textdomain'),
				'singular_name' => __('Team Member', 'textdomain'),
			),
			'rewrite'     => array( 'slug' => 'about/team' ),
			'public'      => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'revisions',
				'custom-fields',
			),
			'taxonomies' => array( 'ap_team_role' ), // Register custom taxonomy here
		)
	);
}
add_action('init', 'ap_cpt_teammember');

function ap_teammember_customtaxonomies() {
	$labels = array(
		'name'              => _x( 'Roles', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Role', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Roles', 'textdomain' ),
		'all_items'         => __( 'All Roles', 'textdomain' ),
		'edit_item'         => __( 'Edit Role', 'textdomain' ),
		'update_item'       => __( 'Update Role', 'textdomain' ),
		'add_new_item'      => __( 'Add New Role', 'textdomain' ),
		'new_item_name'     => __( 'New Role Name', 'textdomain' ),
		'menu_name'         => __( 'Roles', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false, // set to true if you want a category-style hierarchy
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true, // support Gutenberg + REST
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'team-role' ),
	);

	register_taxonomy( 'ap_team_role', array( 'ap_team' ), $args );
}
add_action( 'init', 'ap_teammember_customtaxonomies' );

function ap_register_contact_info_meta() {
	register_post_meta('ap_team', 'ap_show_contact_info', array(
		'show_in_rest'  => true,
		'single'        => true,
		'type'          => 'boolean',
		'auth_callback' => function() {
			return current_user_can('edit_posts');
		},
	));
}
add_action('init', 'ap_register_contact_info_meta');

function ap_enqueue_editor_assets() {
	wp_enqueue_script(
		'ap-team-toggle-meta',
		plugins_url( '../assets/editor-toggle.js', __FILE__ ), // <- note ../ to navigate from 'inc/' to root, then to 'assets/'
		array( 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-edit-post' ),
		false,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'ap_enqueue_editor_assets' );

add_filter( 'post_class', 'ap_team_add_contact_toggle_class', 10, 3 );

function ap_team_add_contact_toggle_class( $classes, $class, $post_id ) {
	if ( get_post_type( $post_id ) === 'ap_team' ) {
		$show_contact = get_post_meta( $post_id, 'ap_show_contact_info', true );
		$classes[] = $show_contact ? 'show-contact' : 'hide-contact';
	}
	return $classes;
}
