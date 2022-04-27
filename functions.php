<?php

function load_styles_and_scripts()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());

    wp_enqueue_style(
        'navigation-style',
        get_stylesheet_directory_uri() . '/css/navigation.css'
    );

    wp_enqueue_style(
        'front-page-style',
        get_stylesheet_directory_uri() . '/css/front-page.css'
    );

    wp_enqueue_style(
        'comment-form-style',
        get_stylesheet_directory_uri() . '/css/comments.css'
    );

    wp_enqueue_script(
        "navigation_script",
        get_theme_file_uri("scripts/navigation.js"),
        [],
        "0.1",
        true
    );
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

function register_my_menus()
{
    register_nav_menus([
        'front_page_menu' => 'Front Page Menu',
        'navigation_menu' => 'Navigation Menu',
    ]);
}

add_action('init', 'register_my_menus');

// Registering our sidebars
function learnwp_sidebars()
{
    register_sidebar([
        'name' => 'Footer Widget',
        'id' => 'footer-widget',
        'description' => 'This is the widget for the footer.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => 'Email Subscribe Widget',
        'id' => 'email-subscribe-widget',
        'description' => 'This is the widget for the email subscribe form.',
        'before_widget' => '<div class="email-subscribe-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="email-subscribe-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'learnwp_sidebars');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
// nevermind:
$args = [
    'height' => 175,
    'width' => 1920,
];
add_theme_support('custom-header' /*, $args */);

// require name but not email for comments
function require_comment_name($fields)
{
    if ($fields['comment_author'] == '') {
        wp_die('Error: Please enter a valid name.');
    }
    return $fields;
}
add_filter('preprocess_comment', 'require_comment_name');

// change comment form title
function ocean_custom_comment_title($defaults)
{
    $defaults['title_reply'] = __('Drop a Comment', 'oceanwp');
    return $defaults;
}
add_filter('comment_form_defaults', 'ocean_custom_comment_title', 20);
