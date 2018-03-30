<?php
/*********************
Enqueue the proper CSS
if you use Sass.
 *********************/
if( ! function_exists( 'ki_enqueue_style' ) ) {
    function ki_enqueue_style()
    {
        // foundation stylesheet
        //wp_register_style( 'reverie-foundation-stylesheet', get_stylesheet_directory_uri() . '/css/app.css', array(), '' );

        // ie-only style sheet
        //wp_register_style( 'ki_ie-only', get_template_directory_uri() . '/lib/css/ie.css', array(), '' );

        // Register the main style
        wp_register_style( 'ki_stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

        //wp_enqueue_style( 'reverie-foundation-stylesheet' );
        wp_enqueue_style( 'ki_stylesheet' );
        //wp_enqueue_style('ki_ie-only');

    }
}
add_action( 'wp_enqueue_scripts', 'ki_enqueue_style' );


/**********************
Enqueue Scripts
 **********************/

// loading modernizr and jquery, and reply script
if( ! function_exists( 'ki_scripts' ) ) {
    function ki_scripts() {

        global $wp_query;

        if (!is_admin()) {

            global $is_IE;
            if ($is_IE) {
                wp_register_script ( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js" , false, true);
            }


            //wp_deregister_script('jquery');
            wp_register_script('cdn-jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, '2.2.4');

            // app.js
            wp_register_script( 'ki_appjs', get_template_directory_uri() . '/lib/js/app-min.js', array('jquery'), '', true );

            // comment reply script for threaded comments
            if( get_option( 'thread_comments' ) )  { wp_enqueue_script( 'comment-reply' ); }

            /*
            I recommend using a plugin to call jQuery
            using the google cdn. That way it stays cached
            and your site will load faster.
            */


            //wp_enqueue_script( 'cdn-jquery' );
            wp_enqueue_script("jquery");
            wp_enqueue_script( 'html5shiv' );
            wp_enqueue_script( 'ki_appjs' );

        }
    }
}

add_action( 'wp_enqueue_scripts', 'ki_scripts' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );
?>