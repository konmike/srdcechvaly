<?php

//Remove dots from excerpt
function trim_excerpt($text)

{
return rtrim($text,'[...]');
}

add_filter('get_the_excerpt', 'trim_excerpt');

function themeslug_enqueue_script() {
    //wp_enqueue_script( 'jquery-v-2', 'http://code.jquery.com/jquery-2.1.3.min.js', false );
    wp_enqueue_script( 'mycustomJs', get_stylesheet_directory_uri() . '/js/script.js', false );
    wp_enqueue_script( 'pluginLoader', get_stylesheet_directory_uri() . '/js/queryloader2.min.js', false );
    wp_enqueue_script( 'pluginFlikcity', get_stylesheet_directory_uri() . '/js/flickity.pkgd.min.js', false );

    wp_enqueue_style( 'mycustomCss', get_stylesheet_directory_uri() . '/css/style.css', false );
    wp_enqueue_style( 'flikcity', get_stylesheet_directory_uri() . '/css/flickity.css', false );
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
    // here you can enqueue more js / css files 
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 210, 118 );
