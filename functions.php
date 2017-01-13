<?php
/**
 * sfp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sfp
 */
/*
	===========================
	 Clearance
	===========================
*/
	remove_action('wp_head', 'feed_links', 2);

	function my_function_admin_bar(){
		return false;
	}
	//add_filter( 'show_admin_bar' , 'my_function_admin_bar');
	
	remove_action('wp_head', 'rsd_link');

	remove_action('wp_head', 'wlwmanifest_link');



if ( ! function_exists( 'sfp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sfp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sfp, use a find and replace
	 * to change 'sfp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sfp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sfp' ),
		'second' => esc_html__( 'Second menu', 'sfp' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sfp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sfp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sfp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sfp_content_width', 640 );
}
add_action( 'after_setup_theme', 'sfp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sfp_widgets_init() {
	register_sidebars(1, array(
		'name'          => esc_html__( 'Sidebar 1' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sfp_widgets_init' );
/**
 * Enqueue scripts and styles.
 */

function sfp_scripts() {
	wp_enqueue_style( 'sfp-style', get_stylesheet_uri() );
	

	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js', array(), '1.0.0', true);
	
	
	wp_enqueue_script('customscript', get_template_directory_uri().'/dist/js/script.min.js', array(), '1.0.0', true);
	
	 // For Internet Explorer, bcs smooth Scrolling doesn't work on IE <= 10
    global $is_IE;
    if( $is_IE ) {
        //wp_enqueue_style('cssIE', get_template_directory_uri().'/css/ie.css', array(), '1.0.0');
    }else{
		//wp_enqueue_script('scriptsfront', get_template_directory_uri().'/js/scripts-front.js', array(), '1.0.0', true);
	}
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sfp_scripts' );

/**
 * Page Slug Body Class
 */
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Function to find children of the page
 */

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Bootstrap nav walker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';