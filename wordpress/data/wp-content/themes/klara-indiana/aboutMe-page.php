<?php
/**
 * Created by IntelliJ IDEA.
 * User: denni
 * Date: 8/8/2017
 * Time: 6:26 PM
 */
/**
 * Template Name:  AboutMe-Page
 * Template Post Type: post, page, product
 */

get_header();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    HIER
		<?php
		while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', get_post_format() );

            the_post_navigation();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
		?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();