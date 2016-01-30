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
 
get_header(); 
get_sidebar(); ?>

<section id="primary" class="content-area col-md-8">
	
<div id="content" class="site-content" role="main">
  
             <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
                    <?php comments_template( '', true ); ?>
 
                <?php endwhile; // end of the loop. ?>
 
	
<div class="portfolio">
  
<h2>Today's Activities</h2>
 
<?php
	
// Get the page title so that we can display certain posts
// depending on the page
//  $title = get_the_title();
	
// 	The following code checks if the page title is 'Activities'.The
// 	If the answer is yes the following code identify posts
// 	with a post_type of 'activities'
  
date_default_timezone_set('Europe/London');
$today = date("l");
  
  if (isset($today)) {	
	$args = array(
    'numberposts' => -1,
		'post_type' => 'activities',
    'post_status' => 'publish',
		'meta_query' => array (
			array (
		  		'key' => 'day_of_the_week',
		  		'value' => $today,
          'compare' => 'LIKE'
			)
		  ) );
  $activities_loop = new WP_Query( $args );
  if ( $activities_loop->have_posts() ) :
    while ( $activities_loop->have_posts() ) : $activities_loop->the_post();
 
	// Set variables
  $title = get_the_title();
	$activity_category = get_field('activity_category'); 
	$day = get_field('day');
	$start_time = get_field('start_time');
	$end_time = get_field('end_time');

    
	// Output
      ?>
	
     <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl($activity_category); ?> col-md-4 entry">
		  <div class="inner">
			<header class="entry-header col-md-4">
				  <h3 class="entry-title"><?php echo $title; ?></h3>
				  <figure>
					  <?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
					  <div>Category: <?php echo $activity_category; ?></div>
					  <div>Day: <?php echo $today; ?></div>
					  <div>From: <?php echo $start_time; ?></div>
					  <div>To: <?php echo $end_time; ?></div>
						<div class="go-to-link">
						<a href="<?php echo get_permalink(); ?>">More information</a>
						</div><!--	.go-to-link -->
				</figure>
				</header>
		  </div> <!-- close .inner -->
      </article>

      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	}

	
	
	?>
		
	</div> <!-- close .portfolio -->
 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

</div><!-- #main .site-main -->
</div><!-- .row -->
</div><!-- .container -->


<?php get_footer(); ?>