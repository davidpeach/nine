<?php

add_action('init', 'davidpeach_add_excerpts_to_pages');
function davidpeach_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}

add_action('init', 'davidpeach_unhook_auto_excerpt');
function davidpeach_unhook_auto_excerpt()
{
    if (! is_singular('post')) {
        return;
    }
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
}

add_filter('generateblocks_query_loop_args', function ($query_args, $attributes) {
    if (
        ! is_admin() &&
        ! empty($attributes['className']) &&
        strpos($attributes['className'], 'nine-multi-query') !== false
    ) {
        // pass meta_query parameter
        $query_args['post_type'] = ['post', 'page'];
    }

    return $query_args;
}, 10, 2);
