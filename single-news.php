<?php
/**

* The template for displaying a single post from the 'Activities' custom post types.
 * @package venture
 * @since venture 1.0
 */
?>

<?php get_header(); ?>
 
<main id="maincontent" class="content-area post general">
    
     <?php
    
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
      ?>
	 <h2 class="entry-title"><?php the_title(); ?></h2>
      <article>
		  <div class="inner">
			<div>
			<header class="entry-header">
  				  <figure>
					  <?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				  </figure>
			</header>
			<section>
				<h4>More Information</h4>
				<p class="the-content"><?php echo the_content(); ?></p>
			</section>
			</div>
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
		  </div> <!-- close .inner -->
      </article>


     <?php endwhile; endif; ?>
 
    <div class="entry-content">
          
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
    
  </div><!-- .entry-content -->
  
 </main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>