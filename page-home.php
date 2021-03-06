<?php
/*
Template Name: Home
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

							<div class="col span_6 ">
								<h3 class="text-white">Join a network of</h3>
								<h2 class="text-white">EVERYDAY PASTORS AND LEADERS FOR ALL THINGS CHURCH</h2>
								<p class="text-white">The Hardy Group is a network of pastors and leaders striving to lead better in order to expand their influence and make a difference. By being a part of The Hardy Group, you’ll have access to our consulting, coaching, and other resources designed to make you better. </p>
								<a href="/services/join-the-network/" class="button button--blue">Join the Network</a>
							</div>

							<div class="col span_6 header-content">
								<div class="iphone">
									<?php
										$rows = get_field('iphone_images');
										$row_count = count($rows);
										$i = rand(0, $row_count - 1);
										$image = $rows[ $i ]['iphone_image'];
									?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


						</div>
							</div>

						</div>
					</div>

					<div class="intro-dick">
						<div class="background-gradient"></div>
						<div class="row container">
							<div class="video-link">
								<a href="#home-video">
									<img src="/wp-content/uploads/2015/04/video-icon.png"/>
									Dick Hardy
								</a>
							</div>
							<div class="col span_7 dick-network">
								<a href="/about/endorsements/"><img src="/wp-content/uploads/2015/04/dick.png"/></a>
							</div>
							<div class="col span_5 dick-text">
								<h2 class="text-gold">Dick Hardy</h2>
								<p class="by_line">Founder & President</p>
								<p>After serving almost 30 years at two mega churches and a Bible college, Dick Hardy took a major leap of faith and launched The Hardy Group. His extensive background as a church administrator, staff pastor, non-profit executive director, and college vice-president set the stage for providing up-close and personal coaching and consulting for church leaders -- developing resources to help them be better.</p>
								<h3 class="text-gold">Connected with 8,000 pastors and church leaders worldwide.</h3>
								<a href="/about/endorsements/">Read Endorsements From The Network</a>
							</div>

						</div>
					</div>

					<div class="light-gray-background feature-home-video" id="home-video">
						<div class="container">
							<div class="inner-circle-video ">
								<div class="video-column" id="video">
									<iframe src="https://player.vimeo.com/video/124791988?title=0&byline=0&portrait=0" width="1000" height="562" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>

					<div class="faces">
						<img src="/wp-content/uploads/2015/04/Faces.jpg">
					</div>


					<div class="footer-signup home-signup">
						<div class="container large-gutters">
							<?php
							// WP_Query arguments
							$args = array (
								'post_type'        		 => 'lead_offer',
								'posts_per_page'         => '1',
							);

							// The Query
							$team = new WP_Query( $args );

							// The Loop
							if ( $team->have_posts() ) {
							while ( $team->have_posts() ) { $team->the_post(); ?>

								<div class="col span_4">
									<?php $image = get_field('full_cover_image');
										if( !empty($image) ): ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<?php endif; ?>
								</div>
								<div class="col span_8 signup-form">
									<h3 class="text-white">Join the Network for Free!</h3>
									<h2 class="text-white"><?php the_field('headline'); ?></h2>
									<h3 class="text-gold"><?php the_field('sub_headline'); ?></h3>
									<p class="text-white"><?php the_field('paragraph'); ?></p>
									<?php gravity_form( 1, false, false, false, '', true ); ?>
								</div>

							<?php  }
							} ?>

						</div>
					</div>


					<div class="light-gray-background">
						<div class="container">
							<h2 class="text-gold">Services</h2>
						</div>
						<div class="services row container gutters">

							<div class="col span_3">
								<a href="/services/join-the-network/" class="service-item">
									<img src="/wp-content/uploads/2015/04/Group.png" class="icon" />
									<p class="secondary">Level 01</p>
									<h2 class="text-gold">The Network</h2>
								</a>
								<p><?php the_field('excerpt_line', 30); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/the-inner-circle/" class="service-item">
									<img src="/wp-content/uploads/2015/04/inner.png" class="icon"/>
									<p class="secondary">Level 02</p>
									<h2 class="text-gold">Inner Circle</h2>
								</a>
								<p><?php the_field('excerpt_line', 32); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/coaching/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/phone.png" />
									<p class="secondary">Level 03</p>
									<h2 class="text-gold">Coaching</h2>
								</a>
								<p><?php the_field('excerpt_line', 34); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/consulting/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/connection-2.png" />
									<p class="secondary">Level 04</p>
									<h2 class="text-gold">Consulting</h2>
								</a>
								<p><?php the_field('excerpt_line', 36); ?></p>
							</div>
						</div>
					</div>


				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
