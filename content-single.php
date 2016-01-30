<?php
/**
 * @package venture
 * @since venture 1.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inner"> 
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
 
        <div class="entry-meta">
            <?php venture_posted_on(); ?>
        </div><!-- .entry-meta -->
     <?php 

// Below checks if the users has added a 'featured image' to the post
// and produces (echo) and <img> element with full attributes surrouded
// by the <figure> element for semantic purposes.
	
	if ( has_post_thumbnail() ) {
	echo '<figure>';
  echo the_post_thumbnail();
  echo '</figure>';
	} 
	
?>
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
 
    <footer class="entry-meta">
      
 			<div class="social-share">
			<p>Share on social media</p>
			<ul>
				<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink() ?>">Facebook</a>
				</li>
				<li class="twitter"><a href="http://twitter.com/share?text=Home:%20Venture%20Community%20Association&amp;url=<?php echo get_post_permalink() ?>">Twitter</a>
				</li>
				<li class="pinterest"><a href="//pinterest.com/pin/create/link/?url=<?php echo get_post_permalink() ?>;media=http%3A%2F%2Fwww%2Eventurecentre%2Eorg%2Euk%2Fimages%2Fvc%2Dmosaic%2Ejpg&amp;description=Home%3A%20Venture%20Community%20Centre">Pinterest</a>
				</li>
				<li class="google-plus"><a href="https://plus.google.com/share?url=<?php echo get_post_permalink() ?>">Google +</a>
				</li>
			</ul>
			</div><!-- .social-share -->
      
        <?php
            /* translators: used between list items, there is a space after the comma */
            $category_list = get_the_category_list( __( ', ', 'venture' ) );
 
            /* translators: used between list items, there is a space after the comma */
                        $tag_list = get_the_tag_list( '', __( ', ', 'venture' ) );
 
            if ( ! venture_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venture' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venture' );
                }
 
            } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                    $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venture' );
                } else {
                    $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'venture' );
                }
 
            } // end check for categories on this blog
 
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );
        ?>
 
        <?php edit_post_link( __( 'Edit', 'venture' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
   </div> <!-- close .inner -->
</article><!-- #post-<?php the_ID(); ?> -->

  