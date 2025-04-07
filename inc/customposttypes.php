<?php
/**
 * Example
 * Create a file, like this one, for each singular function/feature you're adding
 *
 * @package    APCoreExtensions
 * @since      1.0.1
 * @copyright  Copyright (c) 2025, Madeleine Herritage
 * @license    GPL-2.0+
**/

function ap_custom_post_type() {
	register_post_type('our_team',
		array(
			'labels'      => array(
				'name'          => __('Team Members', 'textdomain'),
				'singular_name' => __('Team Member', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
        'show_in_rest' => true,
		)
	);
}
add_action('init', 'ap_custom_post_type');
