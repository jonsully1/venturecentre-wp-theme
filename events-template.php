<?php
/**
*
Template Name: Events Template
*
* The template for displaying the 'Events' custom post types pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package venture
* @since venture 1.0
*/
 
get_header(); ?>

  <?php get_template_part( 'subnav' ); ?>
 
<main id="maincontent" class="content-area event general">
	
<h2><?php the_title(); ?></h2>
 
<?php
	
// Get the page title so that we can display certain posts
// depending on the page
  $page_title = get_the_title();
	
// 	The following code checks if the page title is 'Events'.The
// 	If the answer is yes the following code identify posts
// 	with a post_type of 'activities'
	if ($page_title === 'Events') {
		
		//Preparing the query for events
		$meta_quer_args = array(
			'relation'	=>	'AND',
			array(
				'key'		=>	'event-end-date',
				'value'		=>	time(),
				'compare'	=>	'>='
			)
		);
			
		$args = array(
    'numberposts' => -1,
		'post_type' => 'events',
    'post_status' => 'publish',
		'meta_key' =>	'event-start-date',
		'orderby'	=>	'meta_value_num',
		'order'	=>	'ASC',
		'meta_query'	=>	$meta_quer_args
		 );
			
  $event_loop = new WP_Query( $args );
  if ( $event_loop->have_posts() ) :
    while ( $event_loop->have_posts() ) : $event_loop->the_post();
 
// Variables
// The following retrieves data from the posts (some from 
// advanced custom fields) and store them in varibles
	$category = get_the_category();
	$event_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
	$event_end_date = get_post_meta( get_the_ID(), 'event-end-date', true );
	$event_room = get_post_meta( get_the_ID(), 'event-room', true );
	$event_start_time = get_post_meta( get_the_ID(), 'event-start-time', true );
	$event_end_time = get_post_meta( get_the_ID(), 'event-end-time', true );
	$event_charge = get_post_meta( get_the_ID(), 'event-charge', true );	

// Output
// 	The following HTML is repeated for each post and the content
// 	within the above variables are 'called' to populate the
// 	various elements
      ?>
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
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	} 
	?>
		 
</main><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>