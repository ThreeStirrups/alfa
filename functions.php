<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Alfa' );
define( 'CHILD_THEME_URL', 'http://www.threestirrups.com/themes/alfa/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue scripts
add_action( 'wp_enqueue_scripts', 'genesis_base_theme_google_fonts' );
function genesis_base_theme_google_fonts() {
    wp_enqueue_script( 'alfa-custom', get_bloginfo( 'stylesheet_directory' ) . '/js/custom.js', array( 'jquery' ), '1.0.0' );
    wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'alfa-fonts', '//fonts.googleapis.com/css?family=Volkhov|Open+Sans:400,600,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3);

//* Reposition site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Unregister secondary navigation menu
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
    'header',
    'site-inner',
    'footer-widgets',
    'footer'
) );

//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//* Reposition the post meta function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 20 );

//* Customize the post info function
add_filter( 'genesis_post_info', 'alfa_post_info_filter' );
function alfa_post_info_filter($post_info) {
    $post_info = '[post_date] [post_author_posts_link] [post_comments]';
    return $post_info;
}

//* Add toggle icons
add_action('genesis_header', 'alfa_toggle', 12);
function alfa_toggle() {
    echo '<div class="toggle-icons">
    <span class="toggle-icon toggle-menu">
        <span class="dashicons dashicons-arrow-right-alt2"></span>
        <span class="menu-toggle">Menu</span>
    </span>
    <span class="toggle-icon toggle-search">
        <span class="dashicons dashicons-search"></span>
        <span class="search-toggle">Search</span>
    </span>
    </div>';
}

add_action('genesis_after_header', 'alfa_drop_downs');
function alfa_drop_downs() {
    echo'<div class="search-drop">';

    get_search_form();

    echo'</div>';
}

add_action('genesis_after_footer', 'alfa_overlay');
function alfa_overlay() {
    echo'<div class="overlay"></div>';
}