<?php
/*
Template Name: Inner Circle
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-content">

					<div class="gutters image-header">
						<div class="background-gradient"></div>
						<div class="row container">

							<div class="col span_7 video">
								<div id="video"><iframe src="https://player.vimeo.com/video/105408475?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
							</div>

							<div class="col span_5 header-content">
								<div class="logo"><img src="/wp-content/uploads/2015/04/ICLogo-FINAL.jpg"></div>
								<?php the_content(); ?>
							</div>

						</div>
					</div>


					<div class="light-gray-background gutters">
						<div class="row registration container">
							<div class="col span_3 registration-title">
								<h2>Get Started</h2>
							</div>

							<div class="col span_5">
								<p><?php the_field('registration_text'); ?></p>
							</div>

							<div class="col span_4">
								<a href="https://en225.infusionsoft.com/app/storeFront/showProductDetail?productId=3"  target="_Blank" class="button button--blue button-block">Join the Cirlce</a>
							</div>

						</div>
					</div>



					<div class="entry-content container gutters large-gutters">
							<?php

							// check if the repeater field has rows of data
							if( have_rows('benefits') ):

							 	// loop through the rows of data
							    while ( have_rows('benefits') ) : the_row(); ?>
								<div class="row inner-circle-feature">
									<div class="col span_7">
								       <h2 class="text-gold"><?php the_sub_field('title'); ?> </h2>
								       <?php the_sub_field('support');?>
								    </div>
								    <div class="col span_5">
										<?php

										$image = get_sub_field('image');

										if( !empty($image) ): ?>

											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

										<?php endif; ?>
								    </div>
								</div>

							    <?php endwhile;

							else :

							    // no rows found

							endif;	?>
						</div>
					</div>



					<div class="light-gray-background feature-video">
						<div class="container">
							<div class="inner-circle-video ">
								<h2>We've listened!</h2>
								<h3 class="text-gold">The Inner Cirlce was created with the input of over 600 church leaders.</h3>
								<div class="video-column" id="video">
									<iframe src="https://player.vimeo.com/video/120633625?title=0&byline=0&portrait=0" width="1000" height="562" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>





					<div class="dark-gray-background gutters">
						<div class="row pricing container">
							<div class="col span_7">
								<h2 class="text-gold">Pricing Information</h2>
								<p class="text-white">By investing in the Inner Circle today, you’ll have immediate access to this month’s resources. Make your first move toward growth by signing up. We look forward to seeing you in the Inner Circle.</p>
								<img class="network-image" src="/wp-content/uploads/2015/04/pricing-network.png" />
							</div>

							<div class="col span_5">
								<div class="price-box">
									<h5>Introductory Offer</h5>
									<h2>$<?php the_field('cost'); ?></h2>
									<h5>Price Based on Topic Selection</h5>
									<a href="https://en225.infusionsoft.com/app/storeFront/showProductDetail?productId=3"  target="_Blank" class="button button--white button-block">Join the Circle</a>
								</div>
							</div>
						</div>

						<div class="row boneses container">
							<div class="col span_3">
								<img src="/wp-content/uploads/2015/04/Screen-Shot-2015-04-11-at-10.41.13-AM.png" />
							</div>

							<div class="col span_9">
								<h2 class="text-gold">Free Bonus</h2>
								<p class="text-white">When you sign up you'll also receive a digital copy of 27 Tough Questions Pastors Ask, helping discuss the 30 navigational decisions leading pastors make in growing the church.</p>
							</div>

						</div>
					</div>



					<div class="light-gray-background">
						<div class="container">
							<div class="inner-circle-questions columns-2 dont-break">
								<?php

								// check if the repeater field has rows of data
								if( have_rows('questions') ):

								 	// loop through the rows of data
								    while ( have_rows('questions') ) : the_row(); ?>

										<div class="dont-break">
								       		<h3 class="text-gold"><?php the_sub_field('question'); ?> </h3>
								       		<p><?php the_sub_field('answer');?></p>
								       </div>

								    <?php endwhile;

								else :

								    // no rows found

								endif;	?>

							</div>
						</div>
					</div>



					<div class="gold-background pricing-bar">
						<div class="row container gutters large-gutters">
							<div class="col span_6">
								<h2 class="text-white">Pricing Information</h2>
								<p class="text-white"><?php the_field('registration_text'); ?></p>
							</div>

							<div class="col span_2">
								<h3 class="text-white">$<?php the_field('cost'); ?></h3>
								<p class="text-white">per month</p>
							</div>

							<div class="col span_4">
								<a href="https://en225.infusionsoft.com/app/storeFront/showProductDetail?productId=3" target="_Blank" class="button button--white button-block">Join the Cirlce</a>
							</div>

						</div>
					</div>



					</div><!-- .entry-content -->

				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
