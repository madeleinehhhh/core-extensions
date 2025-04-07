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
      'rewrite'     => array( 'slug' => 'about/team' ), // my custom slug
      'public'      => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'supports' => array(
          'title',
          'editor',
          'author',
          'thumbnail',
          'revisions',
          'custom-fields', ),
      // 'template' => $template,
      // 'template_lock' => 'all',

      // This is where we add taxonomies to our CPT
      'taxonomies' => array( 'tag' ),

		)
	);
}
add_action('init', 'ap_cpt_teammember');

// /**
//  * Add custom taxonomies
//  *
//  * Additional custom taxonomies can be defined here
//  * https://codex.wordpress.org/Function_Reference/register_taxonomy
//  */
// function ap_teammember_customtaxonomies() {
//   // Add new "Roles" taxonomy to Posts
//   register_taxonomy('Role', 'post', array(
//     // Hierarchical taxonomy (like categories)
//     'hierarchical' => true,
//     // This array of options controls the labels displayed in the WordPress Admin UI
//     'labels' => array(
//       'name' => _x( 'Roles', 'taxonomy general name' ),
//       'singular_name' => _x( 'Role', 'taxonomy singular name' ),
//       'search_items' =>  __( 'Search Roles' ),
//       'all_items' => __( 'All Roles' ),
//       'parent_item' => __( 'Parent Role' ),
//       'parent_item_colon' => __( 'Parent Role:' ),
//       'edit_item' => __( 'Edit Role' ),
//       'update_item' => __( 'Update Role' ),
//       'add_new_item' => __( 'Add New Role' ),
//       'new_item_name' => __( 'New Role Name' ),
//       'menu_name' => __( 'Roles' ),
//     ),
//     // Control the slugs used for this taxonomy
//     'rewrite' => array(
//       'slug' => 'Roles', // This controls the base slug that will display before each term
//       'with_front' => false, // Don't display the category base before "/Roles/"
//       'hierarchical' => true // This will allow URL's like "/Roles/boston/cambridge/"
//     ),
//   ));
// }
// add_action( 'init', 'ap_teammember_customtaxonomies', 0 );
