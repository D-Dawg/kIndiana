<?php
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
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 5/4/2017
 * Time: 4:22 PM
 */

/**
 * Template Name:  News-Page
 * Template Post Type: post, page, product
 */


get_header(); ?>

    <div class="page-title"><h2>NEWS</h2></div>

    <article>
        <div id="singlepage-content" class="grid">
            <?php // Display blog posts on any page @ https://m0n.co/l
            $temp = $wp_query;
            $wp_query = null;
            $wp_query = new WP_Query();
            $wp_query->query('posts_per_page=10000' . '&paged=' . $paged . "order=DESC");
            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>




                <a href="<?php the_permalink(); ?>" title="Read more" class="item">
                    <div class="news-content">
                        <?php if (has_post_thumbnail($post->ID)): ?>
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                            $image = $image[0]; ?>
<!--                            <div class="news-image" ">-->
                            <?php if(in_category("tall")){?>
                                <div class="news-image tall" style="background: url(<?php echo $image; ?>)  center center ">
                                    <?php
                            }else{
                            ?>
                            <div class="news-image" style="background: url(<?php echo $image; ?>)  center center ">

<!--                                <img src="--><?php }//echo $image; ?><!--" alt="Smiley face" height="42" width="42">-->
                            </div>
                        <?php endif; ?>
                        <div class="news-container">

                            <div class="news-date"><!--                   --><?php //the_date(); ?>
                                <?php echo get_the_date(); ?>
                            </div>
                            <div class="news-title">
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <div class="news-description">
                                <?php the_excerpt(); ?>
                                <?php comments_number(); ?>

                            </div>
                        </div>


                    </div>
                </a>


            <?php endwhile; ?>

            <?php if ($paged > 1) { ?>

                <nav id="nav-posts">
                    <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                    <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
                </nav>

            <?php } else { ?>

                <nav id="nav-posts">
                    <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                </nav>

            <?php } ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </article>

<?php
////get_sidebar()();
get_footer();
