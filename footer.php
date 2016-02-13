<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package venture
* @since venture 1.0
*/
?>
 
</div><!-- #main .site-main -->
 
<footer id="colophon" class="site-footer" role="contentinfo" aria-label="footer">

  <!--///////////////////////// start of Donate /////////////////////////////-->


	<div>

		<h3>Donate</h3>

		<div class="just-giving">

			<a href="https://www.justgiving.com/4w350m3/donation/direct/charity/124579">
				<img src="<?php echo get_template_directory_uri() ?>/img/donate.png" width="190" height="81" alt="to the venture centre just giving donation web page">
			</a>
			
			<p>Click the Just Giving logo above to make a donation to the valuble community work we do everyday.</p>
		
			<p>We are a Registered Charity, No: 1073115</p>
		</div>

	</div>


	<!--///////////////////////// end of Donate /////////////////////////////-->

	<!--///////////////////////// start of Visit Us /////////////////////////////-->

	<div>

		<h3>Visit Us</h3>

		<ul>
			<li>Venture Community Association
				<br>103A Wornington Rd
				<br>North Kensington
				<br>London
				<br>W10 5YB</li>
			<li><a href="https://www.google.co.uk/maps/place/Venture+Community+Association/@51.52267,-0.209813,17z/data=!3m1!4b1!4m2!3m1!1s0x48761018f53ea37f:0xf848a3e977f7f3e8">Find Us on Google Maps</a>
			</li>
		</ul>

	</div>

	<!--///////////////////////// end of Visit Us  /////////////////////////////-->

	<!--///////////////////////// start of Contact Us /////////////////////////////-->

	<div>

		<h3>Contact Us</h3>
	
 		<ul>
			<li>Phone:</li>
			<li><a href="tel://020-8960-3234">020 8960 3234</a></li>
			<li>Email:</li>
			<li><a href="mailto:info@venturecentre.org.uk">info@venturecentre.org.uk</a></li>
		</ul>

	</div>

	<!--///////////////////////// end of Contact Us  /////////////////////////////-->

	<!--///////////////////////// start of other links /////////////////////////////-->


	<div class="other-links">

		<h3>Other links</h3>
    
		<ul>
			<li><a href="<?php echo get_permalink( get_page_by_title( 'Activities' ) ); ?>">Activities</a>
			</li>
			<li><a href="<?php echo get_permalink( get_page_by_title( 'Newsletter' ) ); ?>">Newsletter</a>
			</li>
			<li><a href="<?php echo get_permalink( get_page_by_title( 'About' ) ); ?>">About</a>
			</li>
			<li><a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) ); ?>">Contact Us</a>
			</li>
<!--  			<li><a href="#">Site Map</a>
			</li>
			<li><a href="/accessibility/accessibility.php">Accessibility</a>
			</li> -->
		</ul>

	</div>
	<!-- close other links -->


	<!--///////////////////////// end of other links /////////////////////////////-->

<div class="josdesign">
	
	<p>WordPress theme design and development by <a href="https://uk.linkedin.com/in/john-o-sullivan-2aa37414">John O'Sullivan</a></p>
	
	</div><!-- 	.josdesign -->

</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
 
<?php wp_footer(); ?>
 
</body>
</html>