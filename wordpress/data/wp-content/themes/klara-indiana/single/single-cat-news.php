<?php
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 8/8/2017
 * Time: 11:45 PM
 */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Klara_Indiana
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="singlepage-content">

            <main id="main" class="site-main" role="main">
                <div id="details-content">
                SINGLE CAT NEWS
                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
<?php
////get_sidebar()();
get_footer();
