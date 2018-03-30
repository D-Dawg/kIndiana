<?php
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 5/4/2017
 * Time: 4:22 PM
 */

/**
 * Template Name:  Page-Home
 */

get_header();

//while(have_posts()): the_post();
//
//?>
    <!--<h1>-->
    <!--    --><?php
//the_title();
//?>
    <!--</h1>-->
    <!--    --><?php
//
//the_content();
//
//endwhile;

$args = array('post_type' => 'ki_onepage',
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'category_name' => 'startpage');

$i = 0;

$loop = new WP_QUERY($args);

while ($loop->have_posts()) : $loop->the_post();
    $i++;

    $title = get_the_title();

    $title_format = str_replace(' ', '_', $title);

    $title_format_2 = clear_string($title_format);


    ?>
    <section id="ki_<?php echo strtolower($title_format_2); ?>" data-id="<?php echo the_ID(); ?>">
        <!--    --><?php //if ($i == 1) { ?>
        <!--        -->
        <!--    --><?php //} ?>

        <!--    The first entry doesnt have picture as seperation-->

        <?php if (has_post_thumbnail($post->ID)): ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
        $image = $image[0]; ?>
        <?php if ($i == 1) { ?>
        <div id="post-<?php the_ID(); ?>" class="no-bg">
            <?php } else { ?>
            <div id="post-<?php the_ID(); ?>" class="ki-fixed-bg ki_bg"
                 style="background-image: url('<?php echo $image; ?>')">
                <?php } else : ?>
                <div id="post-<?php the_ID(); ?>" class="no-bg">
                    <?php endif; ?>
                    <div class="ki-sec-title">
                        <?php if ($i != 1) { ?>
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <?php
                if (strtolower($title) == "news") { ?>
                    <div class="ki-scrolling-bg ki_color">
                        <div class="entry-content ki_container">

                            <?php // Display blog posts on any page @ https://m0n.co/l
                            $temp = $wp_query;
                            $wp_query = null;
                            $wp_query = new WP_Query();
                            $wp_query->query('posts_per_page=1' . '&paged=' . $paged . "order=DESC");
                            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                <div class="news-date-start">
                                    <?php echo get_the_date(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" title="Read more">
                                    <div class="news-content-start">
                                        <?php if (has_post_thumbnail($post->ID)): ?>
                                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                            $image = $image[0]; ?>
                                            <div class="news-image-start"
                                                 style="background: url(<?php echo $image; ?>)  center center "></div>
                                        <?php endif; ?>
                                        <div class="news-container-start">
                                            <div class="news-title-start">
                                                <h4><?php the_title(); ?></h4>
                                            </div>
                                            <div class="news-description-start">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="news-comments-start">
                                                <div class="news-content-title">
                                                <?php comments_number(); ?>
                                                </div>
                                                <div class="comments-box">
                                                    <?php
                                                    $related_posts = array($post->ID);
                                                    $args = array(
                                                        'post__in' => $related_posts,
                                                        'orderby' => "comment_date",
                                                        'order' => 'DESC'
                                                    );
                                                    $comments_query = new WP_Comment_Query;
                                                    $comments = $comments_query->query($args);
                                                    if ($comments) {
                                                        for ($i = 0; $i < 1; $i++) {
                                                            $comment = $comments[$i];
                                                            if (sizeof($comments) > 1) { ?>
                                                                <div class="additional-comments">...</div>

                                                                <?php
                                                            }
                                                            ?>
                                                            <div class="comment-body">
                                                                <div class="comment-avatar">
                                                                    <?php
                                                                    echo get_avatar($comment_author_email);
                                                                    ?>
                                                                </div>
                                                                <div class="comment-inside-box">
                                                                <?php
                                                                echo '<div id="comment-author">' .
                                                                    $comment->comment_author . ': </div>';
                                                                echo '<div id="comment-text">' . $comment->comment_content . '</div>';
                                                                echo '<div id="comment-date">' .
                                                                    $comment->comment_date . '</div>';

                                                                ?>
                                                                <?php  ?>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        }
                                                    } else {
                                                        echo 'No comments found.';
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </a>


                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php
                } else{
                    if(strtolower($title) == "portfolio"){

                };
                    ?>
                    <div class="ki-scrolling-bg ki_color">
                        <div class="entry-content ki_container">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>


    </section>


    <?php

endwhile;


get_footer();