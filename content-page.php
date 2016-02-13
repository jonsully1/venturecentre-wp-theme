<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package venture
 * @since venture 1.0
 */
?>
 
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h2><?php the_title(); ?></h2>
 
    <div class="entry-content">
        <?php the_content(); ?>
      
      		<div class="social-share">
						<p>Share this page on social media</p>
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
      
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
        <?php edit_post_link( __( 'Edit', 'venture' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-content -->
</div><!-- #post-<?php the_ID(); ?> -->