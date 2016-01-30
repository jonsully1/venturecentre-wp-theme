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

<!-- get the sub-nav code to display on the left hand side, this code was originally in sidebar.php but now seperated to allow it to be positioned before the main content to assit with CSS positioning and for semantic purposes -->
  <?php get_template_part( 'subnav' ); ?>
 
<section id="primary" class="content-area col-md-8">
<!-- <div id="content" class="site-content" role="main"> -->
	
<h2><?php the_title(); ?></h2>
	
<div class="portfolio row">
 
<?php
	
// Get the page title so that we can display certain posts
// depending on the page
  $page_title = get_the_title();
	
// 	The following code checks if the page title is 'Activities'.The
// 	If the answer is yes the following code identify posts
// 	with a post_type of 'activities'
	if ($page_title === 'Activities') {
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
  $title = get_the_title();
	$activity_category = get_field('activity_category'); 
  $description = get_the_content();
// 	$width = $image['sizes'][ $size . '-width' ];
// 	$height = $image['sizes'][ $size . '-height' ];
//	$day = get_field('day');
	$start_time = get_field('start_time');
	$end_time = get_field('end_time');
	$fee = get_field('fee');
	$related_content_link = get_field('related_content_link');
    
// Output
// 	The following HTML is repeated for each post and the content
// 	within the above variables are 'called' to populate the
// 	various elements
      ?>
      <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl($activity_category); ?> col-md-4 entry">
		  <div class="inner">
			<header>
				  <h3><?php echo $title; ?></h3>
				  <figure>
						<?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				  </figure>
			</header>
			<section>
						<div>Category: <?php echo $activity_category; ?></div>
					  <div>Time: <?php echo $start_time; ?>-<?php echo $end_time; ?></div>
						<div><?php 
		
						$day = get_field_object('day_of_the_week');
						$value = $day['value'];
						$choices = $day['choices'];
						
						if( $value ): ?>
							<ul>
								<?php foreach( $value as $v ): ?>
								<li>
									<a class="btn" href="/venture-centre/activities-2/<?php echo $choices[ $v ]; ?>#<?php echo basename(get_permalink()); ?>"><?php echo $choices[ $v ]; ?></a>
								</li>
								<?php endforeach; ?>
							</ul>
							
							<?php endif; ?>
						
						</div>
			</section>
		  </div> <!-- close .inner -->
      </article>
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	} else {
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
  $title = get_the_title();
	$activity_category = get_field('activity_category'); 
// 	$description = get_the_content();
// 	$width = $image['sizes'][ $size . '-width' ];
// 	$height = $image['sizes'][ $size . '-height' ];
	$day = get_field('day');
	$start_time = get_field('start_time');
	$end_time = get_field('end_time');
	$fee = get_field('fee');
	$contact_name = get_field('contact_name');
	$phone = get_field('phone');
	$email = get_field('email');
	$related_content_description = get_field('related_content_description');
	$related_content_link = get_field('related_content_link');
    
	// Output
      ?>
      <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl($activity_category); ?> entry">
		  <div class="inner">
			<header class="entry-header col-md-4">
				  <h3 class="entry-title"><?php echo $title; ?></h3>
				  <figure>
					  <?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
					  <div>Category: <?php echo $activity_category; ?></div>
					  <div>Day: <?php echo $page_title; ?></div>
					  <div>From: <?php echo $start_time; ?></div>
					  <div>To: <?php echo $end_time; ?></div>
				  </figure>
				
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
			</header>
			<section class="col-md-8">
				<h4>More Information</h4>
				<div>£ <?php echo $fee; ?></div>
				<p><?php echo the_content(); ?></p>
				<div>To find out more contact <?php echo $contact_name; ?>:</div>
				<div>Phone: <?php echo $phone; ?></div>
				<div>Email: <?php echo $email; ?></div>
			</section>
			<aside class="col-md-8">
			<h5>Related Content</h5>
				
						<div>
							
						<?php 
						
						$day = get_field_object('day_of_the_week');
						$value = $day['value'];
						$choices = $day['choices'];
							
						// Produce links to the instances of the activity on other pages or a statment to say the activity is only available on the current diary page day
						if( count($value) > 1 ) { ?>
							<p>This activity is also available on:</p>
							<ul>
								<?php foreach( $value as $v ) { ?>
									<li>
										<?php if( $v != $page_title ) { ?>
											<a class="btn" href="/venture-centre/activities-2/<?php echo $choices[ $v ]; ?>#<?php echo basename(get_permalink()); ?>">
												<?php echo $choices[ $v ]; ?>
											</a>
									</li>
								<?php } } } elseif( count($value) == 1 ) { ?>
												<p>This activity is only available on <?php echo $page_title; ?>.</p>
								<?php } ?>
							</ul>

						</div>
				
				<p><?php echo $related_content_description; ?></p>
				<a href="<?php echo $related_content_link; ?>">Click here</a>
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
</section><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>