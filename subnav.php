<?php
/**
* The template for producing the sub-navigation.
*
* @package venture
* @since venture 1.0
*/
?>
<div class="subnav col-sm-2" role="complementary">
 
    <aside id="archives" class="widget">
			
<!-- assign a secondary menu to a page with the corresponding MenuName custom field value -->
			<!-- custom fields need to be inside the loop -->
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php wp_nav_menu( array( 'fallback_cb' => '', 'theme_location' => 'sub-navigation', 'menu' => get_post_meta( $post->ID, 'MenuName', true) ) ); ?>
			<?php endwhile; ?>
        
		</aside>
	
	    <?php  do_action( 'before_sidebar' ); ?>
    <?php if ( dynamic_sidebar( 'sidebar-1' ) ) : ?>
 
        <aside id="meta" class="widget">
            <h1 class="widget-title"><?php _e( 'Meta', 'venture' ); ?></h1>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
 
    <?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->
