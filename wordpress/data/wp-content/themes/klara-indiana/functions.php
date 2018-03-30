<?php
/**
 * Klara Indiana functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Klara_Indiana
 */



if ( ! function_exists( 'klara_indiana_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function klara_indiana_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Klara Indiana, use a find and replace
	 * to change 'klara-indiana' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'klara-indiana', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'klara-indiana' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'klara_indiana_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'klara_indiana_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function klara_indiana_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'klara_indiana_content_width', 640 );
}
add_action( 'after_setup_theme', 'klara_indiana_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function klara_indiana_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'klara-indiana' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'klara-indiana' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'klara_indiana_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function klara_indiana_scripts() {
	wp_enqueue_style( 'klara-indiana-style', get_stylesheet_uri() );

//    wp_register_script( 'masonry', get_template_directory_uri() . '/lib/js/masonry.pkgd.min.js' );

    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/lib/js/masonry.pkgd.min.js', array('jquery'), '4.2.0', true);

    wp_enqueue_script( 'klara-indiana-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'klara-indiana-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'klara_indiana_scripts' );

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

/**
 * Initializing my own OnePage
 */
require_once(get_template_directory() . '/lib/php/custompost.php');
/**
 * Initializing my own styles ans scripts
 */
require_once(get_template_directory() . '/lib/php/style.php');


/**
function umlaute to normal letters
 */
function clear_string($str, $how = '-'){
    $search = array("ä", "ö", "ü", "ß", "Ä", "Ö",
        "Ü", "&", "é", "á", "ó",
        " :)", " :D", " :-)", " :P",
        " :O", " ;D", " ;)", " ^^",
        " :|", " :-/", ":)", ":D",
        ":-)", ":P", ":O", ";D", ";)",
        "^^", ":|", ":-/", "(", ")", "[", "]",
        "<", ">", "!", "\"", "§", "$", "%", "&",
        "/", "(", ")", "=", "?", "`", "´", "*", "'",
        "_", ":", ";", "²", "³", "{", "}",
        "\\", "~", "#", "+", ".", ",",
        "=", ":", "=)");
    $replace = array("ae", "oe", "ue", "ss", "Ae", "Oe",
        "Ue", "und", "e", "a", "o", "", "",
        "", "", "", "", "", "", "", "", "",
        "", "", "", "", "", "", "", "", "",
        "", "", "", "", "", "", "", "", "",
        "", "", "", "", "", "", "", "", "",
        "", "", "", "", "", "", "", "", "",
        "", "", "", "", "", "", "", "", "", "");
    $str = str_replace($search, $replace, $str);
    $str = strtolower(preg_replace("/[^a-zA-Z0-9]+/", trim($how), $str));
    return $str;
}

/*
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');

/**
 * Filter the single_template with our custom function
 */
add_filter('single_template', 'my_single_template');

/**
 * Single template function which will choose our template
 */
function my_single_template($single) {
    global $wp_query, $post;

    /**
     * Checks for single template by category
     * Check by category slug and ID
     */
    foreach((array)get_the_category() as $cat) :

        if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

        elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

    endforeach;
}