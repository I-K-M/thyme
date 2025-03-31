<?php

if (!defined('ABSPATH')) {
    exit;
}

function thyme_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'thyme_theme_setup');

function thyme_enqueue_assets() {
    wp_deregister_style('wp-block-library');
    wp_enqueue_style('thyme-style', get_template_directory_uri() . '/style.css', [], filemtime(get_template_directory() . '/style.css'));
    wp_enqueue_script('faq-script', get_template_directory_uri() . '/js/faq.js', ['jquery'], '1.0', true);
    wp_enqueue_script('thyme-js', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'thyme_enqueue_assets');



function thyme_register_menus() {
    register_nav_menus([
        'main_menu' => __('main menu', 'thyme')
    ]);
}
add_action('init', 'thyme_register_menus');

function thyme_meta_tags() {
    if (is_singular()) {
        echo '<meta name="description" content="' . esc_attr(get_the_excerpt()) . '">' . "\n";
    }
    echo '<meta name="robots" content="index, follow">' . "\n";
}
add_action('wp_head', 'thyme_meta_tags');

function thyme_sitemap() {
    if (!is_admin() && isset($_GET['sitemap'])) {
        header("Content-Type: application/xml");
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $posts = get_posts(['numberposts' => -1, 'post_type' => 'post']);
        foreach ($posts as $post) {
            setup_postdata($post);
            echo '<url>';
            echo '<loc>' . esc_url(get_permalink($post->ID)) . '</loc>';
            echo '<lastmod>' . get_the_modified_date('c', $post->ID) . '</lastmod>';
            echo '</url>';
        }
        wp_reset_postdata();
        echo '</urlset>';
        exit;
    }
}
add_action('init', 'thyme_sitemap');


add_filter('wp_generate_attachment_metadata', function ($metadata) {
    if (class_exists('Imagify\Optimizer')) {
        Imagify\Optimizer::get_instance()->optimize_attachment($metadata['file']);
    }
    return $metadata;
});

function thyme_remove_wp_version() {
    return '';
}
add_filter('the_generator', 'thyme_remove_wp_version');

function thyme_limit_login_attempts($user, $password) {
    $attempts = get_transient('failed_login_attempts') ?: 0;

    if ($attempts >= 5) {
        return new WP_Error('too_many_attempts', 'too many failed login attempts try again later.');
    }

    return $user;
}
add_filter('wp_authenticate_user', 'thyme_limit_login_attempts', 30, 2);

function thyme_failed_login() {
    $attempts = get_transient('failed_login_attempts') ?: 0;
    set_transient('failed_login_attempts', $attempts + 1, 600);
}
add_action('wp_login_failed', 'thyme_failed_login');


function thyme_create_default_menu() {
    if (!wp_get_nav_menu_object('Main Menu')) {
        $menu_id = wp_create_nav_menu('Main Menu');

        $menu_items = [
            ['home', home_url('/')],
            ['about', home_url('/about/')],
            ['contact', home_url('/contact/')]
        ];

        foreach ($menu_items as $item) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title' => __($item[0]),
                'menu-item-url' => esc_url($item[1]),
                'menu-item-status' => 'publish'
            ]);
        }

        set_theme_mod('nav_menu_locations', ['main_menu' => $menu_id]);
    }
}
add_action('after_setup_theme', 'thyme_create_default_menu');


function thyme_create_default_pages() {
    $pages = [
        'about' => 'about',
        'contact' => 'contact'
    ];

    foreach ($pages as $slug => $title) {
        if (!get_page_by_path($slug)) {
            wp_insert_post([
                'post_title' => esc_html($title),
                'post_name' => sanitize_title($slug),
                'post_status' => 'publish',
                'post_type' => 'page'
            ]);
        }
    }
}
add_action('after_setup_theme', 'thyme_create_default_pages');


function thyme_create_demo_posts() {
    if (!get_option('thyme_demo_content_created')) {
        $posts = [
            'welcome on thyme',
            'why optimise is important',
            'why security is important'
        ];

        foreach ($posts as $post_title) {
            if (!get_page_by_title($post_title, OBJECT, 'post')) {
                wp_insert_post([
                    'post_title' => $post_title,
                    'post_status' => 'publish',
                    'post_type' => 'post'
                ]);
            }
        }

        update_option('thyme_demo_content_created', true);
    }
}
add_action('after_setup_theme', 'thyme_create_demo_posts');
