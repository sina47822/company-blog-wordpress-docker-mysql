<?php

defined( 'ABSPATH' ) || exit;

function hani_page_title(){
    $search = get_query_var('s');
    $title = '' ;

    //if there is post
    if ((is_home(  ) && !is_front_page(  )) || (is_page(  ) && !is_front_page(  )) || is_front_page(  )) {
        $title = single_post_title( '', false );
    }

    if (is_single(  )) {
        if (get_post_type(get_the_ID(  )) == 'post'){
            $title = the_title( );

        }
    }

    //if there's a category or tag
    if (is_category( ) || is_tag( )) {
        $title = single_term_title( '', false );
    }

    //if there's a taxonomy
    if (is_tax( )){
        $term = get_queried_object(  );
        if ($term){
            $tax = get_taxonomy( $term->taxonomy );
            $title = single_term_title( '', false);
        }
    }

    //if there's a search
    if (is_search( )){
        /* translator: 1:seprator, 2: search phrase */
        $title = esc_html__( 'Search Result' , 'hani search title' );
    }

    //if there's a 404 page
    if (is_404( )){
        $title = esc_html__( 'Page not found' , 'hani 404 title' );
    }

    echo esc_html( $title );
}