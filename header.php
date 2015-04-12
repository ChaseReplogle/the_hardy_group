<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package hardy_group
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=296553243701480&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div id="page" class="hfeed site">

	<div id="content" class="site-content">

	<nav class="nav-main clear">
		<div class="container">
			<div class="branding col span_4">
				<a href="/">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" />
					<h2>The Hardy Group <span class="secondary">All Things Church</span></h2>
				</a>
			</div>

			<div class="mobile menu-mobile">
				<a href="#">Menu</a>
			</div>

			<div class="menu col span_8">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>
			</div>

		</div>
	</nav>


	<?php
	$current_id = get_the_ID();
    $section_id = empty( $post->ancestors ) ? $post->ID : end( $post->ancestors );
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ 'primary' ] ); // 'primary' is our nav menu's name
    $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'post_parent' => $section_id ) );

    if( !empty( $menu_items ) ) { ?>

		<nav class="nav-sub clear">
			<div class="container">
				<div class="menu col span_12">

				        <?php foreach( $menu_items as $menu_item ) {

				        	$url = $menu_item->url;
				        	$postid = url_to_postid( $url );


				        	if ($postid == $current_id) {
				            	echo '<li class="menu-item current-menu-item"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
				        	} else {
				        		echo '<li class="menu-item"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
				        	}
				        }
				        echo '</ul>'; ?>
				</div>
			</div>

		</nav>

	<?php } ?>