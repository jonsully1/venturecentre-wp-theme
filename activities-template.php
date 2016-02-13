<?php
/**
*
Template Name: Activities Template
*
* The template for displaying the 'Activities' custom post types pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package venture
* @since venture 1.0
*/
 
get_header(); ?>

  <?php // get the sub-nav code to display on the left hand side, this code was originally in sidebar.php but now seperated to allow it to be positioned before the main content to assit with CSS positioning and for semantic purposes
get_template_part( 'subnav' ); ?>
 
<main id="maincontent" class="content-area general">
	
<h2><?php the_title(); ?></h2>

<?php
	
// Get the page title so that we can display certain posts
// depending on the page
  $page_title = get_the_title();
	
//  echo ($page_title === 'Activities') ? '<div id="activities" class="portfolio">' : '<div class="day">';
	
// 	The following code checks if the page title is 'Activities'.The
// 	If the answer is yes the following code identify posts
// 	with a post_type of 'activities'
	if ($page_title === 'Activities') {
			?>
	
		<nav class="categories">
	<ul>
		<li class="current-mobile">Categories</li>
		<li><a href="#" data-filter="*" class="selected">All Activities</a></li>
		<li><a href="#" data-filter=".children">Children</a></li>
		<li><a href="#" data-filter=".women-only">Women Only</a></li>
		<li><a href="#" data-filter=".over-fifties">Over 50s</a></li>
		<li><a href="#" data-filter=".eighteen-plus">Over 18s</a></li>
<!-- 		<li><a href="#" data-filter=".events">Events</a></li> -->
		<li><a href="#" data-filter=".open-to-all">Open to All</a></li>
	</ul>
</nav>
	
	
	<?php
		echo '<div id="activities" class="portfolio">';
		$args = array(
    'numberposts' => -1,
		'post_type' => 'activities',
    'post_status' => 'publish',
		 );
  $activities_loop = new WP_Query( $args );
  if ( $activities_loop->have_posts() ) :
    while ( $activities_loop->have_posts() ) : $activities_loop->the_post();
 
// Variables
// The following retrieves data from the posts (some from 
// advanced custom fields) and store them in varibles
	$category = get_the_category();
	$activities_start_time = get_post_meta( get_the_ID(), 'activities-start-time', true );
	$activities_end_time = get_post_meta( get_the_ID(), 'activities-end-time', true );
	$activities_weekday = get_post_meta( $post->ID, 'activities-weekday', true );
	
    
// Output
// 	The following HTML is repeated for each post and the content
// 	within the above variables are 'called' to populate the
// 	various elements
      ?>
	
      <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl(esc_html( $category[0]->name )); ?>  entry">
			<div class="inner">
				<header>
				  <h3><?php echo the_title(); ?></h3>
					<p><?php echo !empty( $category ) ? esc_html( $category[0]->name ) : ''; ?></p>
				  <figure>
						<?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				  </figure>
			</header>
			<section>
					 <p><?php echo esc_html( date( 'g:ia', $activities_start_time ) ); ?>-<?php echo esc_html( date( 'g:ia', $activities_end_time ) ); ?></p>
					<h4>Available On</h4>
				
				<?php if ( count($activities_weekday) === 1) {
									echo '<div class="go-to-link"><a class="btn" href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '">' . esc_html( $activities_weekday[0] ) . 's</a></div>';
																} else { ?>
																	<?php
														// Set a new variable to contain the html in string form
 															$weekday_links = array(); 
																foreach( $activities_weekday as $day ) {
																	$weekday_links[] = '<div class="go-to-link"><a class="btn" href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '">' . esc_html( $day ) . 's</a></div>';
																	};
																	echo implode($weekday_links);
																	 }; ?>
						
				<div class="go-to-link">
							<a class="btn" href="<?php echo get_permalink(); ?>">More Info...</a>
				</div>

			</section>
			</div> <!-- 				inner close -->
      </article>
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	} else {
		echo '<div class="day">';
  $args = array(
    'numberposts' => -1,
		'post_type' => 'activities',
    'post_status' => 'publish',
		'meta_query' => array (
			array (
		  		'key' => 'day_of_the_week',
		  		'value' => $page_title,
          'compare' => 'LIKE'
			)
		  ) );
  $activities_loop = new WP_Query( $args );
  if ( $activities_loop->have_posts() ) :
    while ( $activities_loop->have_posts() ) : $activities_loop->the_post();
 
	// Set variables
	$category = get_the_category();
	$activities_start_date = get_post_meta( get_the_ID(), 'activities-start-date', true );
	$activities_end_date = get_post_meta( get_the_ID(), 'activities-end-date', true );
	$activities_room = get_post_meta( get_the_ID(), 'activities-room', true );
	$activities_start_time = get_post_meta( get_the_ID(), 'activities-start-time', true );
	$activities_end_time = get_post_meta( get_the_ID(), 'activities-end-time', true );
	$activities_charge = get_post_meta( get_the_ID(), 'activities-charge', true );	
	$activities_weekday = get_post_meta( $post->ID, 'activities-weekday', true );
    
	// Output
      ?>
      <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl(esc_html( $category[0]->name )); ?> entry">
		  <div class="inner">
			<header class="entry-header">
				  <h3 class="entry-title"><?php the_title(); ?></h3>
				  <figure>
					  <?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				</figure>
					<p><em>Category: </em><?php echo !empty( $category ) ? esc_html( $category[0]->name ) : ''; ?></p>
				  <p><em>Day: </em><?php echo $page_title; ?></p>
					 <p><em>Time: </em><?php echo esc_html( date( 'g:ia', $activities_start_time ) ); ?>-<?php echo esc_html( date( 'g:ia', $activities_end_time ) ); ?></p>
			</header>
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
				<h5>Related Content</h5>
						<div class="related-content-links">	
							<?php 
							switch($activities_weekday) {
								case count($activities_weekday) === 1: echo 'This activity is only available on ' . $page_title . '.';
									break;
								default:  echo '<p>This activity is also available on:</p>';
													echo '<ul>';
													foreach( $activities_weekday as $day ) { 
															switch($day) {
																case $page_title: continue; 
															default:	echo '<li><a href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '" class="btn">' .  esc_html( $day ) . '</a></li>';
															};
													};
													echo '</ul>';
							}; 
							?>
						</div>
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
			</aside>
				
		  </div> <!-- close .inner -->
      </article>
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	}
	?>
		
	</div> <!-- close .portfolio -->

 
<!-- </div><!-- #content .site-content -->
</main><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>