<?php
/**
 * venture functions and definitions
 *
 * @package venture
 * @since venture 1.0
 */

if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'venture_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since venture 1.0
 */

function venture_setup() {
 
    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on venture, use a find and replace
     * to change 'venture' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'venture', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
 
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'venture' ),
		'secondary' => __( 'Secondary Menu', 'venture' )
    ) );
}
endif; // venture_setup
add_action( 'after_setup_theme', 'venture_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since venture 1.0
 */
function venture_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'venture' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget primary %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'venture' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget secondary %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
	
	    register_sidebar( array(
        'name' => __( 'Tertiary Widget Area', 'venture' ),
        'id' => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget tertiary %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'venture_widgets_init' );

// Preset default widgets in sidebar-2 and sidebar-3 9 (thanks to Ptah Dunbar)
$preset_widgets = array (
    'sidebar-2'   => array( 'search', 'pages', 'categories', 'archives' ),
    'sidebar-3' => array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
    update_option( 'sidebars_widgets', $preset_widgets );
}
// update_option( 'sidebars_widgets', NULL );

// Check for static widgets in widget-ready areas (thanks to Chaos Kaizer)
function is_sidebar_active( $index ){
    global $wp_registered_sidebars;
 
    $widgetcolums = wp_get_sidebars_widgets();
 
    if ( $widgetcolums[$index] ) return true;
 
    return false;
} // end is_sidebar_active

/**
 * Enqueue scripts and styles
 */
function venture_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
	
// The four lines below register Bootstrap’s CSS and Javascript files	
	
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.1', true );

wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.1', 'all' );

wp_enqueue_script( 'bootstrap-js' );

wp_enqueue_style( 'bootstrap-css' );

}
add_action( 'wp_enqueue_scripts', 'venture_scripts' );

// This line will prevent WordPress from automatically inserting HTML line breaks in your posts.
// If you don’t do this, some of the Bootstrap snippets that we are going to add will probably not display correctly.

remove_filter('the_content', 'wpautop');

// Add all activities custom posts to the homepage

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'activities' ) );
	return $query;
	
}

add_theme_support( 'post-thumbnails' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// add_filter('deprecated_constructor_trigger_error', '__return_false');