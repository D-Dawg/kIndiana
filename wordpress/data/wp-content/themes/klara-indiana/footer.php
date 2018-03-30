<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Klara_Indiana
 */

?>
<!--</div>-->
<!--</div><!-- #content -->-->

<footer id="colophon" class="site-footer container " role="contentinfo">
    <div class="site-info">
        <!--			<a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'klara-indiana' ) ); ?><!--">-->
        <?php //printf( esc_html__( 'Proudly powered by %s', 'klara-indiana' ), 'WordPress' ); ?><!--</a>-->
        <!--			<span class="sep"> | </span>-->
        <div id="footer-content row" >
            <div id="socialmedia" class="col-sm-4">
                <p>FIND ME ON:</p>
                <a href="https://www.facebook.com/klaraindiana/" rel="facebook/klaraindiana" target="_blank">
                    <div id="facebook"></div>
                </a>
                <a href="https://www.instagram.com/klaraindiana/" rel="instagram/klaraindiana" target="_blank">
                    <div id="instagram"></div>
                </a>
            </div>
            <div id="footer-text" class="col-sm-4">
                <p>HERE COMES SOME ADDITIONAL TEXT</p>
            </div>
            <div id="footer-links" class="col-sm-4">
                <p></p><a href="">AGB</a></p>
                <p><a href="">Impressum</a></p>
                <p><a href="">Contact</a></p>
            </div>
            <div id="footer-contact" class="col-sm-4">
                <p>WRITE ME:</p>
                <p style="font-size: larger"><b>KLARAINDIANAART [at] GMAIL [dot] COM</b></p>
            </div>
        </div>
        <!--			--><?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'klara-indiana' ), 'klara-indiana', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
