<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hardy_group
 */
?>

	</div><!-- #content -->

</div><!-- #page -->

<footer class="footer-main">
	<nav class="nav-main clear">
		<div class="container">
			<div class="branding col span_4">
				<a href="/">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" />
					<h2>The Hardy Group <span class="secondary">All Things Church</span></h2>
				</a>
			</div>

			<div class="menu col span_8">
				<ul class="menu">
					<li class="menu-item"><a href="#"><img src="/wp-content/uploads/2015/04/facebook1.png"  width="20px" /></a></li>
				</ul>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>
			</div>

		</div>
	</nav>

	<div class="footer-partners container">
		<div class="row footer-partners-logos gutters">

				<?php

					$args = array( 'posts_per_page' => 4, 'post_type'=> 'partner', 'orderby' => 'rand' );

					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post );
						$image = get_field('partner_logo');

									if( !empty($image) ): ?>

									<div class="col span_3">
										<a href="<?php the_field('url'); ?>" target="_Blank" >
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										</a>
									</div>

									<?php endif; ?>
					<?php endforeach;
					wp_reset_postdata();?>


		</div>

		<div class="row footer-copyright">
			<p class="secondary">This website and its content is copyright of The Hardy Group - © The Hardy Group 2015. All rights reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
