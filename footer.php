<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Driving_School
 */

?>
<?php if (!is_page_template('blank-page.php') && !is_page_template('blank-page-with-container.php')): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part('footer-widget');?>
	<footer id="colophon" class="site-footer text-center <?php echo wp_driving_school_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="' . home_url() . '">' . get_bloginfo('name') . '</a>'; ?>
                <span class="sep"></span>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif;?>
</div><!-- #page -->

<?php wp_footer();?>
</body>
</html>