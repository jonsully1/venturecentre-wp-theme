<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package venture
 * @since venture 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2><?php the_title(); ?></h2>
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'venture' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->