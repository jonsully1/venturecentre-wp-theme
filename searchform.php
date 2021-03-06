<?php
/**
 * The template for displaying search forms in venture
 *
 * @package venture
 * @since venture 1.0
 */
?>
    <form class="navbar-form navbar-left" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
      <div class="form-group">
        <label for="s" class="assistive-text"><?php _e( 'Search', 'venture' ); ?></label>
        <input type="text" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'venture' ); ?>" />
      </div>
      <button type="submit" class="btn" value="<?php esc_attr_e( 'Search', 'venture' ); ?>">Search</button>
    </form>