<?php

add_action('init', 'davidpeach_add_excerpts_to_pages');
function davidpeach_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}

add_action('init', 'davidpeach_unhook_auto_excerpt');
function davidpeach_unhook_auto_excerpt()
{
    if (! is_single()) {
        return;
    }
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
}
