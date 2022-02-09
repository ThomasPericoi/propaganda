<?php

// Add Thumbnail
add_theme_support('post-thumbnails');

// Add Title
add_theme_support('title-tag');

// Add Stylesheets
function pt_enqueue_theme_stylesheets()
{
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', '', null, 'all');
    wp_register_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.css', '', null, 'all');
    wp_register_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', '', null, 'all');
    wp_register_style('style', get_stylesheet_uri(), '', null, 'all');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('swiper');
    wp_enqueue_style('normalize');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'pt_enqueue_theme_stylesheets');

// Add Scripts
function pt_enqueue_theme_scripts()
{
    wp_register_script('jQuery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), false, true);
    wp_register_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.js', array(), false, true);
    wp_register_script('usefool', get_template_directory_uri() . '/assets/js/usefool.js', array(), false, true);
    wp_register_script('ascii-printer', get_template_directory_uri() . '/assets/js/ascii-printer.js', array('usefool'), false, true);
    wp_register_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jQuery', 'swiper', 'usefool', 'ascii-printer'), false, true);
    wp_enqueue_script('jQuery');
    wp_enqueue_script('swiper');
    wp_enqueue_script('usefool');
    wp_enqueue_script('ascii-printer');
    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'pt_enqueue_theme_scripts');

// Add menus
function pt_register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'propaganda'),
            'footer-menu-1' => __('Footer Menu 1', 'propaganda'),
            'footer-menu-2' => __('Footer Menu 2', 'propaganda'),
            'footer-menu-3' => __('Footer Menu 3', 'propaganda'),
        )
    );
}
add_action('init', 'pt_register_menus');

// Fix the Admin Bar CSS
add_theme_support('admin-bar', array('callback' => '__return_false'));

// Add Customizer
include(get_stylesheet_directory() . '/inc/customizer/customizer.php');

