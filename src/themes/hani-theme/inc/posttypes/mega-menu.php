<?php

function hani_mega_menu_post_type() {
	register_post_type('hani_mega_menu',
		array(
			'labels'      => array(
				'name'          => 'مگا منو ها',
				'singular_name' => 'مگا منو',
				'add_new'       => 'افزودن مگا منو',

			),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array(
					'slug' => 'mega-menus',
				),
		)
	);
}
add_action('init', 'hani_mega_menu_post_type');