<?php
/**
* The Sidebar containing the main widget areas.
*
* @package venture
* @since venture 1.0
*/
?>
 <div class="sidebar-two">
<?php // If widgets exist in the secondary widget area produce the widgets
      if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

      <?php dynamic_sidebar( 'sidebar-2' ); ?>
 
<?php endif; ?>
 </div>
