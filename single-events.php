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
      
  // Set variables
	$category = get_the_category();
	$event_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
	$event_end_date = get_post_meta( get_the_ID(), 'event-end-date', true );
	$event_room = get_post_meta( get_the_ID(), 'event-room', true );
	$event_start_time = get_post_meta( get_the_ID(), 'event-start-time', true );
	$event_end_time = get_post_meta( get_the_ID(), 'event-end-time', true );
	$event_charge = get_post_meta( get_the_ID(), 'event-charge', true );	
    
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
      ?>
	 <h2 class="entry-title"><?php the_title(); ?></h2>
        <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl(esc_html( $category[0]->name )); ?> entry">
		  <div class="inner">
			<header class="entry-header">
				  <h3 class="entry-title"><?php the_title(); ?></h3>
				  <figure>
					  <?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				</figure>
					<p><em>Category: </em><?php echo !empty( $category ) ? esc_html( $category[0]->name ) : ''; ?></p>
					<p><em>Date: </em>
						<time class="sis_event_date"><?php echo date( 'l, d F', $event_start_date ); ?></time>
						<?php if ( $event_start_date =! $event_end_date) {
							echo '&ndash; <time class="sis_event_date">' . date( 'l, d F', $event_end_date ) . '</time>';
						 } ?>
					</p>
					 <p><em>Time: </em><?php echo esc_html( date( 'g:ia', $event_start_time ) ); ?>-<?php echo esc_html( date( 'g:ia', $event_end_time ) ); ?></p>
			</header>
			<section>
					<h4>More Information</h4>
					<p class="more-info-text">£ <?php if ($event_charge === '0.00') {
																									echo 'Free';
																									} else {
																									echo $event_charge;
																									}
																									?>
					</p>
					<p class=""><?php echo the_content(); ?></p>
				<p><em>To find out more contact us on:</em></p>
				<p><em>Phone:</em> 020 8960 3234</p>
				<p><em>Email:</em> <a href="mailto:info@venturecentre.org.uk">info@venturecentre.org.uk</a></p>
			</section>
			<aside>
					<div class="social-share">
						<p>Share this event on social media</p>
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
			</aside>
				
		  </div> <!-- close .inner -->
      </article>

     <?php endwhile; endif; ?>
 
    <div class="entry-content">
          
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
    
  </div><!-- .entry-content -->
  
 </main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>