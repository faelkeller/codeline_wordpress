<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
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
        "description" => 'Films',
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'register_meta_box_cb' => 'films_meta_box',
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')
    );

    register_post_type('films', $args);
    flush_rewrite_rules();
}

add_action('init', 'create_film_tax');

function create_film_tax() {
    register_taxonomy(
            "genres", "films", array(
        "label" => "Genres",
        "singular_label" => "Genre",
        'public' => true,
        'rewrite' => true,
        'hierarchical' => true,
            )
    );

    register_taxonomy(
            "country", "films", array(
        "label" => "Countries",
        "singular_label" => "Country",
        'public' => true,
        'rewrite' => true,
        'hierarchical' => true,
            )
    );

    register_taxonomy(
            "year", "films", array(
        "label" => "Years",
        "singular_label" => "Year",
        'public' => true,
        'rewrite' => true,
        'hierarchical' => true,
            )
    );

    register_taxonomy(
            "actor", "films", array(
        "label" => "Actors",
        "singular_label" => "Actor",
        'public' => true,
        'rewrite' => true,
        'hierarchical' => true,
            )
    );
}

function films_meta_box() {
    add_meta_box('meta_box_ticket', __('Ticket Price'), 'meta_box_ticket_show', 'films', 'side', 'high');
    add_meta_box('meta_box_release', __('Release Date'), 'meta_box_release_show', 'films', 'side', 'high');
}

function meta_box_ticket_show() {
    global $post;
    $ticket_price = get_post_meta($post->ID, 'ticket_price', true);
    echo '<input type="text" name="ticket_price" id="ticket_price" value="' . $ticket_price . '" />';
}

function meta_box_release_show() {
    global $post;
    $release_date = get_post_meta($post->ID, 'release_date', true);
    echo '<input type="text" name="release_date" id="release_date" value="' . $release_date . '" />';
}

add_action('save_post', 'save_films_post');

function save_films_post() {
    global $post;
    update_post_meta($post->ID, 'ticket_price', $_POST['ticket_price']);
    update_post_meta($post->ID, 'release_date', $_POST['release_date']);
}

function change_list_post($post_object) {
    if (is_archive()) {
        $ticket_price = get_post_meta($post_object->ID, 'ticket_price', true);
        $release_date = get_post_meta($post_object->ID, 'release_date', true);
        $post_object->ticket_price = $ticket_price;
        $post_object->release_date = $release_date;

        return_terms('country', $post_object);
        return_terms('genres', $post_object);
    }
}

add_action('the_post', 'change_list_post');

function return_terms($key, &$post_object) {
    $terms = get_the_terms($post_object->ID, $key);

    $post_object->{$key} = "";

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $post_object->{$key} .= $term->name . "; ";
        }
    }
}

function last_films_function() {
    $posts = query_posts('posts_per_page=5&post_type=films');
    $films = "";
    $films .= '<ul class="list-group">';
    foreach ($posts as $post) {
        $films .= '<li class="list-group-item">'.$post->post_title.'</li>';
    }
    $films .= '</ul>';
    return $films;
}

add_shortcode('last_films', 'last_films_function');
