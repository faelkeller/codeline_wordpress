<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action('init', 'type_post_films');
 
    function type_post_films() { 
        $labels = array(
            'name' => _x('Films', 'post type general name'),
            'singular_name' => _x('Film', 'post type singular name'),            
            'parent_item_colon' => '',
            'menu_name' => 'Films'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'public_queryable' => true,
            'show_ui' => true,           
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,                  
            'supports' => array('title','editor','thumbnail','comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
        );
 
        register_post_type( 'films' , $args );
        flush_rewrite_rules();
}