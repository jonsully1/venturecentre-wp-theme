<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package venture
 * @since venture 1.0
 */
?><!DOCTYPE html>

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;
 
wp_title( '|', true, 'right' );
 
// Add the blog name.
bloginfo( 'name' );
 
// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";
 
// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'venture' ), max( $paged, $page ) );
 
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

	<link href="http://fonts.googleapis.com/css?family=Gudea%7CRancho" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	
</head>
 
<body <?php // check if page title is equal to 'Home' or if page has a custom field of 'MenuName'
						$key = 'MenuName';
						$page_title = get_the_title();
						if ($page_title === 'Home') {
 									echo 'id="home"';
						} elseif (is_search()) {
 									echo 'id="search"';
						} else {
							$themeta = get_post_meta($post->ID, $key, TRUE);
 							 if ($themeta === '') {
										echo 'id="no-sub-menu"'; 
							 };
						};

							?> <?php body_class(); ?>>

<div id="page" class="hfeed site">
     <header id="masthead" class="site-header">

		<div id="skip"><a href="#maincontent" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', 'venture' ); ?></a></div>

	<nav class="site-navigation main-navigation" aria-label="primary">

		<?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'container'    => '',
                'depth'             => 2,
						    'items_wrap' => my_nav_wrap_main_menu()
            ));
        ?>
		
       <?php get_search_form(); ?>
        
	</nav><!-- .site-navigation .main-navigation -->

<div class="logo-newsletter">

	<div class="logo">

		<a<?php   $page_title = get_the_title();
			 				if ($page_title != 'home') {
								echo ' href="/index.php"';
							};?>>
			<img src="<?php echo get_template_directory_uri() ?>/img/vca-logo-original.png" width="350" height="90" alt="the logo for the venture community association">
		</a>

	</div>

</div>
			 
<h1 class="site-title">Venture : <?php if ( is_search() ) {
	echo 'Search Results';
} else {
	echo $page_title;
};
	?></h1>

     </header><!-- #masthead .site-header -->
	
	<?php if ($page_title != 'Home') {
	the_breadcrumb();
}
	?>
		
<!-- 	<div class=""> -->
<!-- <div> -->
	
	