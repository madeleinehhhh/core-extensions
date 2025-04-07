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
      'taxonomies' => array( 'post_tag' ),

		)
	);
}
add_action('init', 'ap_cpt_teammember');

// function ap_teammember_customtaxonomies() {
//     $labels = array(
//         'name'              => _x( 'Roles', 'taxonomy general name', 'my-text-domain' ),
//         'singular_name'     => _x( 'Role', 'taxonomy singular name', 'my-text-domain' ),
//         // ... other labels
//     );

//     $args = array(
//         'labels'            => $labels,
//         'hierarchical'      => true, // or false for non-hierarchical
//         'public'            => true,
//         'rewrite'           => array( 'slug' => 'my-custom-taxonomy' ),
//         // ... other arguments
//     );
//     register_taxonomy( 'ap_teammember_customtaxonomies', array( 'my_custom_post_type' ), $args ); // Pass the custom post type name here
// }
// add_action( 'init', 'ap_teammember_customtaxonomies' );
