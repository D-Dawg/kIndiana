<?php
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 5/4/2017
 * Time: 3:13 PM
 */

add_action('after_switch_theme','ki_flush_rewrite_rules');

function ki_flush_rewrite_rules(){
    flush_rewrite_rules();
}

// Init onepage admin layout--> supports indicates available tools (siehe Beträge)
//add_action( 'init', 'create_post_type' );


add_action( 'init', 'onepage_post_type' );
function onepage_post_type()
{
    register_post_type('ki_onepage',
        array(
            'labels' => array(
                'name' => __('OnePage'),
                'singular_name' => __('OnePage')
            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies' => array('category'),
            'public' => true,
            'show_ui' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions',
                'page-attributes',
                'custom-fields'
            )
        )
    );
}
// remove perma links for custom post onepage

add_action('ki_onepage_link','ki_ki_onepage_link',10,2);

function ki_ki_onepage_link($link,$post) {
    $post_type = 'ki_onepage';
    if ($post->post_type==$post_type) {
        $link = get_post_type_archive_link($post_type) ."#{$post->post_name}";
    }
    return $link;
}