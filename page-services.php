<?php
/*
Template Name: Services
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area dark">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="post-content">

				<div class="entry-content container gutters">
					<div class="row">
						<div class="row">
							<h1><?php the_field('full_title'); ?></h1>
						</div>
					</div>

					<div class="services row container gutters">

							<div class="col span_3">
								<a href="/services/join-the-network/" class="service-item">
									<img src="/wp-content/uploads/2015/04/Group.png" class="icon" />
									<p class="secondary">Level 01</p>
									<h2 class="text-gold">The Network</h2>
								</a>
								<p class="text-white"><?php the_field('excerpt_line', 30); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/the-inner-circle/" class="service-item">
									<img src="/wp-content/uploads/2015/04/inner.png" class="icon"/>
									<p class="secondary">Level 02</p>
									<h2 class="text-gold">Inner Circle</h2>
								</a>
								<p class="text-white"><?php the_field('excerpt_line', 32); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/coaching/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/phone.png" />
									<p class="secondary">Level 03</p>
									<h2 class="text-gold">Coaching</h2>
								</a>
								<p class="text-white"><?php the_field('excerpt_line', 34); ?></p>
							</div>

							<div class="col span_3">
								<a href="/services/consulting/" class="service-item">
									<img class="icon" src="/wp-content/uploads/2015/03/connection-2.png" />
									<p class="secondary">Level 04</p>
									<h2 class="text-gold">Consulting</h2>
								</a>
								<p class="text-white"><?php the_field('excerpt_line', 36); ?></p>
							</div>
						</div>

				</div><!-- .entry-content -->



			</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php hardy_group_footer_endorsements(); ?>

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
