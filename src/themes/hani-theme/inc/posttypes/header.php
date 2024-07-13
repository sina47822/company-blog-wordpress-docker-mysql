<?php

function hani_header_post_type() {
	register_post_type('hani_header',
		array(
			'labels'      => array(
				'name'          => 'هدر ها',
				'singular_name' => 'هدر',
				'add_new'       => 'افزودن هدر',

			),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array(
					'slug' => 'headers',
				),
		)
	);
}
add_action('init', 'hani_header_post_type');