<?php
/**
*
Template Name: News Template
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
<div id="content" class="site-content" role="main">
	
<h2><?php the_title(); ?></h2>
	
	<div class="inner">
		
	<div class="entry-content">
        <?php the_content(); ?>
  </div><!-- .entry-content -->

<?php
	
  $title = get_the_title();
	
if ($title === 'News') {
			$args = array(
    'numberposts' => -1,
		'post_type' => 'news',
    'post_status' => 'publish',
		 );
  $activities_loop = new WP_Query( $args );
  if ( $activities_loop->have_posts() ) :
    while ( $activities_loop->have_posts() ) : $activities_loop->the_post();
 
	// Set variables
  $title = get_the_title();
	$image = get_field('image');
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
// 	$content = get_field('description');

// Output
      ?>
      <article>
		  <div class="inner">
			<header class="entry-header">
				  <h3 class="entry-title"><?php echo $title; ?></h3>
  				  <figure>
					  <?php echo the_post_thumbnail(); ?>
				  </figure>
			</header>
			<section>
<!-- 				<h4>More Information</h4> -->
				<p><?php echo the_content(); ?></p>
			</section>
			<aside>
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
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
} else {
			$args = array(
    'numberposts' => -1,
		'post_type' => 'success_stories',
    'post_status' => 'publish',
		 );
  $activities_loop = new WP_Query( $args );
  if ( $activities_loop->have_posts() ) :
    while ( $activities_loop->have_posts() ) : $activities_loop->the_post();
 
	// Set variables
//   $title = get_the_title();
// 	$image = get_field('image');
// 	$width = $image['sizes'][ $size . '-width' ];
// 	$height = $image['sizes'][ $size . '-height' ];
// 	$content = get_field('description');

// Output
      ?>
      <article>
		  <div class="inner">
			<header class="entry-header">
				  <h3 class="entry-title"><?php echo the_title(); ?></h3>
  				  <figure>
					  <?php echo the_post_thumbnail(); ?>
				  </figure>
			</header>
			<section>
<!-- 				<h4>More Information</h4> -->
				<p><?php echo the_content(); ?></p>
			</section>
			<aside>
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
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
	}
	?>

	</div><!-- 	.inner -->
 
</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>