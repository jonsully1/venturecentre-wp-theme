<?php
/**
*

*
* The template for displaying the Front Page.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package venture
* @since venture 1.0
*/
 
get_header();
get_sidebar('right');?>

<main id="maincontent" class="content-area general">
  
             <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
                    <?php comments_template( '', true ); ?>
 
                <?php endwhile; // end of the loop. ?>
 
<h2>Today's Activities</h2>
 
<div class="portfolio">
	
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
	$category = get_the_category();
	$activities_start_time = get_post_meta( get_the_ID(), 'activities-start-time', true );
	$activities_end_time = get_post_meta( get_the_ID(), 'activities-end-time', true );
	$activities_weekday = get_post_meta( $post->ID, 'activities-weekday', true );
    
	// Output
      ?>
	
      <article id="<?php echo basename(get_permalink()); ?>" class="<?php echo seoUrl(esc_html( $category[0]->name )); ?>  entry">
			<div class="inner">
				<header>
				  <h3><?php echo the_title(); ?></h3>
				  <figure>
						<?php echo the_post_thumbnail('full', array('class' => 'img-responsive img-circle')); ?>
				  </figure>
			</header>
			<section>
					<p><em>Category: </em><?php echo !empty( $category ) ? esc_html( $category[0]->name ) : ''; ?></p>
					<p><em>Day(s): </em><?php if ( count($activities_weekday) === 1) {
									echo '<a href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '">' . esc_html( $activities_weekday[0] ) . 's</a><br>';
																} else { ?>
																	<?php
														// Set a new variable to contain the html in string form
 															$weekday_links = array(); 
																foreach( $activities_weekday as $day ) {
																	$weekday_links[] = '<a href="/activities-2/' . seoUrl($day) . '#' . basename(get_permalink()) . '">' . esc_html( $day ) . 's</a><br>';
																	};
																	echo implode( ' / ', $weekday_links);
																	 }; ?>
						</p>
					 <p><em>Time: </em><?php echo esc_html( date( 'g:ia', $activities_start_time ) ); ?>-<?php echo esc_html( date( 'g:ia', $activities_end_time ) ); ?></p>
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
	}
	?>
	
			<div class="view-all">
		<a class="btn" href="<?php echo get_permalink( get_page_by_title( $today ) ); ?>"><?php _e( 'View today\'s activities...', 'News Items' ); ?></a>
		</div>

		
	</div> <!-- close .portfolio -->
 
</main>



<?php 
get_sidebar('left');
get_footer(); ?>