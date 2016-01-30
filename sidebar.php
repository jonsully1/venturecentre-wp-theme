<?php
/**
* The Sidebar containing the main widget areas.
*
* @package venture
* @since venture 1.0
*/
?>

<!-- If widgets exist in the secondary widget area produce the widgets -->
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

     <aside id="secondary" class="widget-area col-xs-3 col-sm-4 col-md-2" role="supplementary">
      <?php dynamic_sidebar( 'sidebar-2' ); ?>
     </aside><!-- #tertiary .widget-area -->
 
<?php endif; ?>

<!-- If widgets exist in the tertiary widget area produce the widgets -->
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

     <aside id="tertiary" class="widget-area col-xs-3 col-sm-4 col-md-2" role="supplementary">
      <?php dynamic_sidebar( 'sidebar-3' ); ?>
     </aside><!-- #quaternary .widget-area -->
 
<?php endif; ?>