<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="blog_header ">
					<div class="container gutters">
						<div class="col span_12">
							<h1>Products</h1>
						</div>
					</div>
				</div>

				<article id="post-<?php the_ID(); ?>" class="post-content">

					<div class="entry-content container gutters large-gutters single-review-item">
						<div class="col span_4">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
						</div>
						<div class="col span_8">
							<h1><?php the_title(); ?></h1>
							<h3 class="text-gold"><?php the_field('by_line'); ?></h3>
							<?php the_content(); ?>
							<h4>Share This Review</h4>
							<hr />
							<?php echo do_shortcode("[wp_social_sharing show_icons='1']"); ?>
						</div>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->




			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php hardy_group_footer_endorsements(); ?>

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
