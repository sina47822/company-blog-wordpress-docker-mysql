<?php

function hani_books_post_type() {
	register_post_type('hani_books',
		array(
			'labels'      => array(
				'name'          =>'کتاب ها',
				'singular_name' => 'کتاب',
				'add_new'       => 'افزودن کتاب',

			),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array(
					'slug' => 'books',
				),
		)
	);
}
add_action('init', 'hani_books_post_type');