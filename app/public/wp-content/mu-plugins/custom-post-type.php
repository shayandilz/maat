<?php


function portfolio_post_types()
{
    //    Projects post type
    register_post_type('services', array(
        'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
        'rewrite' => array('slug' => 'services'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'خدمات',
            'add_new' => 'افزودن سرویس',
            'add_new_item' => 'افزودن سرویس',
            'edit_item' => 'ویرایش سرویس',
            'all_items' => 'همه ی خدمات',
            'singular_name' => 'خدمات'
        ),
        'menu_icon' => 'dashicons-screenoptions'
    ));
    register_taxonomy(
        'services_categories',
        'services',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی خدمات', // display name
            'query_var' => true,
        )
    );
    // game post-type
    register_post_type('portfolio', array(
        'supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
        'rewrite' => array('slug' => 'portfolio'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'نمونه کار',
            'add_new' => 'افزودن نمونه کار',
            'add_new_item' => 'افزودن نمونه کار',
            'edit_item' => 'ویرایش نمونه کار',
            'all_items' => 'همه ی نمونه کار ها',
            'singular_name' => 'نمونه کار ها'
        ),
        'menu_icon' => 'dashicons-portfolio'
    ));
    register_taxonomy(
        'portfolio_categories',
        'portfolio',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'دسته بندی نمونه کار', // display name
            'query_var' => true,
        )
    );
    // services post-type
    register_post_type('clients', array('supports' => array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
        'rewrite' => array('slug' => 'clients'),
        'has_archive' => false,
        'public' => true,
        'labels' => array(
            'name' => 'مشتریان',
            'add_new' => 'افزودن مشتری',
            'add_new_item' => 'افزودن مشتری جدید',
            'edit_item' => 'ویرایش مشتری',
            'all_items' => 'همه ی مشتریان',
            'singular_name' => 'مشتری'
        ),
        'menu_icon' => 'dashicons-admin-users'
    ));
}

add_action('init', 'portfolio_post_types');