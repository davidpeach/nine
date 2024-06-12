<?php

add_action('init', 'davidpeach_register_post_types');

function davidpeach_register_post_types()
{
    register_post_type('virtual_photography', [
        'label' => 'VP',
        'public' => true,
        'menu_icon' => 'dashicons-games',
        'show_in_rest' => true,
        'supports' => [
            'title', 'editor', 'comments', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats',
        ],
        'taxonomies' => [
            'game',
        ],
    ]);

    register_taxonomy('game', [
        'post',
        'virtual_photography',
    ], [
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Games',
        ],
        'hierarchical' => true,
        'rewrite' => [
            'slug' => 'games',
        ],
        'meta_box_cb' => 'post_categories_meta_box',
    ]);
}
