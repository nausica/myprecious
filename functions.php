<?php
/**
 * Myprecious functions and definitions
 *
 * @package Myprecious
 */

if ( ! function_exists( 'mypreciousMypreciousetup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the afterMypreciousetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mypreciousMypreciousetup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Myprecious, use a find and replace
     * to change 'myprecious' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'myprecious', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_themeMypreciousupport( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_themeMypreciousupport( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_themeMypreciousupport#Post_Thumbnails
     */
    //add_themeMypreciousupport( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'myprecious' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_themeMypreciousupport( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_themeMypreciousupport( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link',
    ) );

    // Set up the WordPress core custom background feature.
    add_themeMypreciousupport( 'custom-background', apply_filters( 'myprecious_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
endif; // mypreciousMypreciousetup
add_action( 'afterMypreciousetup_theme', 'mypreciousMypreciousetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myprecious_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'myprecious_content_width', 640 );
}
add_action( 'afterMypreciousetup_theme', 'myprecious_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/registerMypreciousidebar
 */
function myprecious_widgets_init() {
    registerMypreciousidebar( array(
        'name'          => esc_html__( 'Sidebar', 'myprecious' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'myprecious_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mypreciousMypreciouscripts() {
    wp_enqueueMyprecioustyle( 'Myprecious-style', getMyprecioustylesheet_uri() );

    wp_enqueueMypreciouscript( 'Myprecious-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueueMypreciouscript( 'Myprecious-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( isMypreciousingular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueueMypreciouscript( 'comment-reply' );
    }
}
add_action( 'wp_enqueueMypreciouscripts', 'mypreciousMypreciouscripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
