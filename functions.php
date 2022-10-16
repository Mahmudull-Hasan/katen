<?php
/**
 * Katen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Katen
 */

if ( site_url() == "http://localhost/katen") {
    define( "VERSION", time());
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function katen_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Katen, use a find and replace
		* to change 'katen' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'katen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	add_theme_support('post-formats', array ('audio', 'video', 'image', 'quote', 'link', 'gallery'));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary_menu' => esc_html__( 'Primary Menu', 'katen' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'katen_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'katen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function katen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'katen_content_width', 640 );
}
add_action( 'after_setup_theme', 'katen_content_width', 0 );

/**
 * Register widget area.
 */
function katen_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'katen' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'katen' ),
			'before_widget' => '<div id="%1$s" class="widget rounded %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-header text-center">
			<h3 class="widget-title">',
			'after_title'   => '</h3></div>',
		)
	);
}
add_action( 'widgets_init', 'katen_widgets_init' );


// Started theme ACF Json //

function katen_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
       
    // return
    return $path;
    
}
add_filter('acf/settings/save_json', 'katen_acf_json_save_point');


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
//  Disables the block editor from managing widgets.
 add_filter( 'use_widgets_block_editor', '__return_false' );




//Search Widget//
require_once get_theme_file_path('/inc/widgets/social-widget.php');

//popular post widget
require_once get_theme_file_path('/inc/widgets/popular-widget.php');

//Category widget
require_once get_theme_file_path('/inc/widgets/category-widget.php');

//Newsletter widget
require_once get_theme_file_path('/inc/widgets/newsletter-widget.php');

//Celebration Slide widget
require_once get_theme_file_path('/inc/widgets/post_slide-widget.php');

//Tags widget
require_once get_theme_file_path('/inc/widgets/tags-widget.php');







/**
 * Enqueue scripts and styles.
 */
function katen_scripts() {
	
	//css load//
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '1.0', 'all');

	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), '1.0', 'all');

	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), array(), '1.0', 'all');

	wp_enqueue_style('all-css', get_theme_file_uri('/assets/css/all.min.css'), array(), '1.0', 'all');
	
	wp_enqueue_style('slick-css', get_theme_file_uri('/assets/css/slick.css'), array(), '1.0', 'all');

	wp_enqueue_style('simple-line', get_theme_file_uri('/assets/css/simple-line-icons.css'), array(), '1.0', 'all');

	wp_enqueue_style('style-css', get_theme_file_uri('/assets/css/style.css'), array(), VERSION, 'all');

	wp_enqueue_style( 'katen-style', get_stylesheet_uri(), array(), VERSION );

	wp_style_add_data( 'katen-style', 'rtl', 'replace' );


	//scripts load//

	wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery.min.js'), array('jquery'), '1.0', true);

	wp_enqueue_script('popper', get_theme_file_uri('/assets/js/popper.min.js'), array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '1.0', true);
	wp_enqueue_script('slick-js', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '1.0', true);
	wp_enqueue_script('sticky-sidebar', get_theme_file_uri('/assets/js/jquery.sticky-sidebar.min.js'), array('jquery'), '1.0', true);
	
	wp_enqueue_script('costom-js', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), VERSION, true);
	
	wp_enqueue_script( 'katen-customizer', get_template_directory_uri() . '/js/customizer.js', array(), VERSION, true );
	
	wp_enqueue_script( 'katen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'katen_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Comment Form Modification*/

remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );

function meal_comment_form_fields($fields){

	$comment_field = $fields['author'];
	unset($fields['author']);
	$fields['author'] = $comment_field;
	return $fields;

}
add_filter('comment_form_fields','meal_comment_form_fields');





/* Post Pagination*/


function katen_pagination(){
    global $wp_query;
    $link =  paginate_links(array(
        'current' => max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages,
        'type'    => 'list',
		'prev_text'          => __( '', 'katen' ),
		'next_text'          => __( '', 'katen' ),
        // 'mid_size'=> 3

    ));


     $link = str_replace('page-numbers', 'page-link', $link);
     $link = str_replace("<ul class='page-link'>", '<ul class="pagination justify-content-center">', $link);
     $link = str_replace("<li'>", '<li class="page-item active">', $link);
     $link = str_replace("next page-link", 'next-arrow', $link);
     $link = str_replace("prev page-link", 'prev-arrow', $link);

    // $link = str_replace("prev pgn__num", 'pgn__prev', $link);
     echo $link;
}

/*============================
// Katen Theme Options 
==============================*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-options',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => __('About', 'katen'),
        'menu_title'    => __('About Page', 'katen'),
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => __('Contact', 'katen'),
        'menu_title'    => __('Contact Page', 'katen'),
        'parent_slug'   => 'theme-options',
    ));
    
}
