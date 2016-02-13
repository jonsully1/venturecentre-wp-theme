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
	$activities_start_date = get_post_meta( get_the_ID(), 'activities-start-date', true );
	$activities_end_date = get_post_meta( get_the_ID(), 'activities-end-date', true );
	$activities_room = get_post_meta( get_the_ID(), 'activities-room', true );
	$activities_start_time = get_post_meta( get_the_ID(), 'activities-start-time', true );
	$activities_end_time = get_post_meta( get_the_ID(), 'activities-end-time', true );
	$activities_charge = get_post_meta( get_the_ID(), 'activities-charge', true );	
	$activities_weekday = get_post_meta( $post->ID, 'activities-weekday', true );
    
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      
      ?>
	 <h2 class="entry-title"><?php the_title(); ?></h2>
<article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl(esc_html( $category[0]->name )); ?> entry">
 <div class="inner">
  <header class="entry-header">
        <h3 class="entry-title"><?php the_title(); ?></h3>
				  <figure>
					  <?php echo the_post_thumbnail(); ?>
					<p><em>Category: </em><?php echo !empty( $category ) ? esc_html( $category[0]->name ) : ''; ?></p>
					  <p>Day(s): <?php
															// Set a new variable to contain the html in string form
 															$weekday_links = array(); 
																foreach( $activities_weekday as $day ) {
																	$weekday_links[] = '<a href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '">' . esc_html( $day ) . '</a>';
																	};
																	echo implode(" / ", $weekday_links);
																?>
						</p>
					  <p>Time: <?php echo esc_html( date( 'h:ia', $activities_start_time ) ); ?>-<?php echo esc_html( date( 'h:ia', $activities_end_time ) ); ?></p>
				  </figure>
    </header><!-- .entry-header -->
			<section>
					<h4>More Information</h4>
					<p class="more-info-text">£ <?php if ($activities_charge === '0.00') {
																									echo 'Free';
																									} else {
																									echo $activities_charge;
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
  </div> <!-- close .inner -->
	</article>

     <?php endwhile; endif; ?>
 
    <div class="entry-content">
          
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'venture' ), 'after' => '</div>' ) ); ?>
    
  </div><!-- .entry-content -->
  
 </main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>