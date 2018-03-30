<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Klara_Indiana
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./lib/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<script>
    $(document).ready(function () {

        var container = document.querySelector('#singlepage-content');
        if(container){
            var masonry = new Masonry(container, {
                columnWidth: 300,
                itemSelector: '.item'
//                isFitWidth: true
            });
        }
    });
    $(function () {
        $(window).scroll(function () {
//            console.log($(this).scrollTop());
            if(window.location.pathname!=="/kIndiana/"){
                $('nav.main-navigation').addClass('stickytop');
                $('#ki-main').css("margin-top","60px");
            }else{
                if ($(this).scrollTop() >= 414) {
                    $('nav.main-navigation').addClass('stickytop');
                    $('#ki-main').css("margin-top","60px");
                }
                else {
                    $('nav.main-navigation').removeClass('stickytop');
                    $('#ki-main').css("margin-top","0");

                }
            }

        });
    });
</script>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'klara-indiana'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php
            if (is_front_page() || is_home()) : ?>
                <!--				<h1 class="site-title home"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
                <div class="site-title homepage">
                </div>
            <?php else : ?>
                <p class="site-title"></p>
                <!--                <a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a>-->
                <?php
            endif;

            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) : ?>
                <!--				<p class="site-description">--><?php //echo $description; /* WPCS: xss ok. */ ?><!--</p>-->
                <?php
            endif; ?>
        </div><!-- .site-branding -->
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <!--                    --><?php //bloginfo( 'name' ); ?>
                <div id="navigation-logo"></div>
            </a>

            <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e('Primary Menu', 'klara-indiana'); ?></button>
            <div id="navigation-menu">
                <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
            </div>
        </nav><!-- #site-navigation -->


    </header><!-- #masthead -->

<!--    <div id="ki-main" class="site-content">-->
<!--        <div class="ki-main-content">-->
