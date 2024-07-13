<?php

function hani_footer_post_type() {
	register_post_type('hani_footer',
		array(
			'labels'      => array(
				'name'          => 'فوتر ها',
				'singular_name' => 'فوتر',
                'add_new'       => 'افزودن فوتر',

			),
				'public'      => true,
				'has_archive' => true,
                'rewrite'     => array(
					'slug' => 'footers',
				),
		)
	);
}
add_action('init', 'hani_footer_post_type');