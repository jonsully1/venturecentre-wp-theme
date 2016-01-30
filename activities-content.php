
<?php
/**
* The content for each custom post activity

 * @package venture
 * @since venture 1.0
 */
?>

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
      
      ?>

  <header class="entry-header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
				  <figure>
					  <img src="<?php echo $image[url] ?>" width="<?php echo $image[width] ?>" height="<?php echo $image[height] ?>" alt="<?php echo $image[alt] ?>">
					  <div>Category: <?php echo $activity_category; ?></div>
					  <div>Day: <?php echo $day; ?></div>
					  <div>From: <?php echo $start_time; ?></div>
					  <div>To: <?php echo $end_time; ?></div>
				  </figure>
    </header><!-- .entry-header -->
			<section>
				<h4>More Information</h4>
				<div>£ <?php echo $fee; ?></div>
				<p><?php echo $description; ?></p>
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
