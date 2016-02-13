<?php
/**
* The template for producing the sub-navigation.
*
* @package venture
* @since venture 1.0
*/
?>
<aside class="sub-menu" role="complementary">
		<nav class="site-navigation sub-navigation" aria-label="secondary">
			
			<?php // creates the sub-menu
// 						if ( have_posts() ) while ( have_posts() ) : the_post();
			wp_nav_menu( array(
								'fallback_cb' => '',
								'theme_location' => 'sub-navigation',
								'menu' => get_post_meta( $post->ID, 'MenuName', true),
						    'items_wrap' => my_nav_wrap_sub_menu()
									) 
								); 
								?>
			<?php // endwhile; ?>
        
		</nav>
	
	    <?php  do_action( 'before_sidebar' ); ?>
    <?php if ( dynamic_sidebar( 'sidebar-1' ) ) : ?>
 
    <?php endif; // end sidebar widget area ?>
</aside><!-- #secondary .widget-area -->
