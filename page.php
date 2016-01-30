<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package venture
 * @since venture 1.0
 */
 
get_header(); ?>

<!-- get the sub-nav code to display on the left hand side, this code was originally in sidebar.php but now seperated to allow it to be positioned before the main content to assit with CSS positioning and for semantic purposes -->
  <?php get_template_part( 'subnav' ); ?>
 
        <div id="primary" class="content-area col-sm-10 col-md-8">
            <div id="content" class="site-content" role="main">
 
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
                    <?php comments_template( '', true ); ?>
 
                <?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>