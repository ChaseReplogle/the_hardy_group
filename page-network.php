<?php
/*
Template Name: Join Network
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

					<div class="footer-signup home-signup">
						<div class="container large-gutters">
							<div class="col span_4">
								<img src="/wp-content/uploads/2015/04/Cover1.jpg" />
							</div>
							<div class="col span_8 signup-form">
								<h3 class="text-white">Join the Network for Free!</h3>
								<h2 class="text-white">LEARN WHAT CHURCH LEADERS SAY THEY NEED MOST</h2>
								<h3 class="text-gold">We recently surveyed over 1,100 pastors and church leaders. We wanted to find out what they say is their greatest need, and the results were strikingly obvious.</h3>
								<p class="text-white">When you join our free network of pastors leaders, you'll recieve a free download of our guide to what church leaders say they need most.
								<?php gravity_form( 1, false, false, false, '', false ); ?>
							</div>
						</div>
					</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
