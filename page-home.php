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
								<h2 class="text-white">EVERY-DAY PASTORS AND LEADERS FOR ALL THINGS CHURCH</h2>
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
							<div class="col span_4">
								<img src="/wp-content/uploads/2015/04/Cover-021.jpg" />
							</div>
							<div class="col span_8 signup-form">
								<h3 class="text-white">Join the Network for Free!</h3>
								<h2 class="text-white">LEARN WHAT CHURCH LEADERS SAY THEY NEED MOST</h2>
								<h3 class="text-gold">We recently surveyed over 1,100 pastors and church leaders. We wanted to find out what they say is their greatest need, and the results were strikingly obvious.</h3>
								<p class="text-white">When you join our free network of pastors leaders, you'll recieve a free download of our guide to what church leaders say they need most.
								<?php gravity_form( 1, false, false, false, '', true ); ?>
							</div>
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
								<p>The Network consists of a free weekly resource for enhancing your leadership and ministry emailed directly to you.</p>
							</div>

							<div class="col span_3">
								<a href="/services/the-inner-circle/" class="service-item">
									<img src="/wp-content/uploads/2015/04/inner.png" class="icon"/>
									<p class="secondary">Level 02</p>
									<h2 class="text-gold">Inner Circle</h2>
								</a>
								<p>The Inner Circle is a members-only online community designed to give church leaders the motivation, training, and resources to lead better.</p>
							</div>

							<div class="col span_3">
								<a href="/services/coaching/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/phone.png" />
									<p class="secondary">Level 03</p>
									<h2 class="text-gold">Coaching</h2>
								</a>
								<p>Our personal coaching is designed specifically to help you gain understanding, navigate challenges, and hone your craft to the highest level possible.</p>
							</div>

							<div class="col span_3">
								<a href="/services/consulting/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/connection-2.png" />
									<p class="secondary">Level 04</p>
									<h2 class="text-gold">Consulting</h2>
								</a>
								<p>Our customized consulting provides you personal interaction with our team (including onsite visits) to uniquely help you strengthen your ministry.</p>
							</div>
						</div>
					</div>


				</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
