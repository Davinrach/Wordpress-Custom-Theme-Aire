<?php
/**
 * Airemodern functions and definitions
 */

function airemodern_classic_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'airemodern' ),
    ) );
}
add_action( 'after_setup_theme', 'airemodern_classic_setup' );

function airemodern_classic_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'airemodern' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'airemodern' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'airemodern_classic_widgets_init' );

function airemodern_classic_scripts() {
    // Enqueue Montserrat Font
    wp_enqueue_style( 'airemodern-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap', array(), null );
    
    wp_enqueue_style( 'airemodern-style', get_stylesheet_uri(), array(), '1.0' );
    wp_enqueue_style( 'airemodern-tailwind', get_template_directory_uri() . '/assets/css/main.css', array(), '1.1' );
    
    // Enqueue Vanilla JS
    wp_enqueue_script( 'airemodern-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'airemodern_classic_scripts' );
