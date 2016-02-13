<?php
/**
* The Sidebar containing the main widget areas.
*
* @package venture
* @since venture 1.0
*/
?>

<div class="sidebar-three">
<?php // If widgets exist in the tertiary widget area produce the widgets
      if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

      <?php dynamic_sidebar( 'sidebar-3' ); ?>
 
<?php endif; ?>
</div>