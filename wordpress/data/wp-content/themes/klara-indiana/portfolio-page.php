<?php
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 8/8/2017
 * Time: 6:26 PM
 */

/**
 * Template Name:  Portfolio-Page
 * Template Post Type: post, page, product
 */

get_header();

?>
    <div class="page-title"><h2>Portfolio</h2></div>
<?php

$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC'
));
?>
    <div id="portfolio-content">
        <?php
        foreach ($categories as $category) {

            if (strcmp("Uncategorized", $category->name) == 0 || strcmp("tall", $category->name) == 0 || strcmp("Startpage", $category->name) == 0) {

            } else {

//                $category_link = sprintf(
//                    '<a href="%1$s" alt="%2$s">%3$s</a>',
//                    esc_url(get_category_link($category->term_id)),
//                    esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
//                    esc_html($category->name)
//                );
                ?>
                <a href="<?php echo get_category_link($category->term_id); ?>">
                    <div class="category-content">
                        <div class="category-title">
                            <?php echo $category->name; ?>
                        </div>
                        <div class="category-container">
                            <?php echo $category->description; ?>
                            <?php
                            $args = array(
                                'posts_per_page' => -1,
                                'category' => $category->term_id
                            );
                            $posts = get_posts($args);
                            if ($posts) {
                                foreach ($posts as $post) :
                                    setup_postdata($post); ?>
                                    <div class="category-inner">

<!--                                        <h2><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h2>-->
                                        <?php the_content(); ?>
                                    </div>
                                    <?php
                                endforeach;
                                wp_reset_postdata();
                            }
                            ?>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>

    </div>

<?php
get_footer();