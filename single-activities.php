<?php
/**

* The template for displaying a single post from the 'Activities' custom post types.
 * @package venture
 * @since venture 1.0
 */
?>

<?php get_header(); ?>
 
<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="inner"> 
    
     <?php
      
      	// Set variables
        $activity_category = get_field('activity_category'); 
        $description = get_the_content();
        $image = get_field('image');
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        $day = get_field('day_of_the_week');
        $start_time = get_field('start_time');
        $end_time = get_field('end_time');
        $fee = get_field('fee');
        $contact_name = get_field('contact_name');
        $phone = get_field('phone');
        $email = get_field('email');
        $related_content_description = get_field('related_content_description');
        $related_content_link = get_field('related_content_link');
    
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
      ?>

  <header class="entry-header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
				  <figure>
					  <?php echo the_post_thumbnail(); ?>
					  <div>Category: <?php echo $activity_category; ?></div>
					  <div>Day: <?php echo $day; ?></div>
					  <div>From: <?php echo $start_time; ?></div>
					  <div>To: <?php echo $end_time; ?></div>
				  </figure>
    </header><!-- .entry-header -->
			<section>
				<h4>More Information</h4>
				<div>£ <?php echo $fee; ?></div>
				<p><?php echo the_content(); ?></p>
				<div>To find out more contact <?php echo $contact_name; ?>:</div>
				<div>Phone: <?php echo $phone; ?></div>
				<div>Email: <?php echo $email; ?></div>
			</section>
			<aside>
			<h5>Related Content</h5>
				<p><?php echo $related_content_description; ?></p>
				<a href="<?php echo $related_content_link; ?>">Click here</a>
			</aside>
		<div class="social-share">
			<p>Share this activity on social media</p>
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

     <?php endwhile; endif; ?>
 
    <div class="entry-content">
          
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
    
  </div><!-- .entry-content -->
 
    <footer class="entry-meta">
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
  
  
 </div><!-- #content .site-content -->
</section><!-- #primary .content-area -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>