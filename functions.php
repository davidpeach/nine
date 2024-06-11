<?php

add_action('init', 'davidpeach_add_excerpts_to_pages');
function davidpeach_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}
