<?php
/*
Template Name: Team
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-content">

				<div class="entry-content container gutters">
					<div class="col span_12">
						<h1><?php the_field('full_title'); ?></h1>

						<div class="row">
							<h3 class="text-gold">Consultants</h3>
							<hr />
						</div>
						<div class="row consultants">

						<?php
							// WP_Query arguments
							$args = array (
								'post_type'         => 'team',
								'role'				=> 'consultant',
							);

							function team_posts_orderby ($orderby) {
							   global $team_global_orderby;
							   if ($team_global_orderby) $orderby = $team_global_orderby;
							   return $orderby;
							}
							add_filter('posts_orderby','mam_posts_orderby');
							$team_global_orderby = "
							UPPER(CONCAT(REVERSE(SUBSTRING_INDEX(REVERSE($wpdb->posts.post_title),' ',1)),$wpdb->posts.post_title))
							";


							$team = new WP_Query( $args );

							// The Loop
							if ( $team->have_posts() ) {
							while ( $team->have_posts() ) { $team->the_post(); ?>


							<div class="col span_3 consultant-item">
								<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
									<h3><?php the_title(); ?></h3>
								</a>
									<?php the_excerpt(); ?>
							</div>


							<?php  }
							} else {
								// no posts found
							}
							$team_global_orderby = '';
							// Restore original Post Data
							wp_reset_postdata();

						?>
						</div>


						<div class="row">
							<h3 class="text-gold">Coaches</h3>
							<hr />
						</div>
						<div class="row coach">

						<?php
							// WP_Query arguments
							$args = array (
								'post_type'         => 'team',
								'role'				=> 'coach',
							);

							function coach_posts_orderby ($orderby) {
							   global $coach_global_orderby;
							   if ($coach_global_orderby) $orderby = $coach_global_orderby;
							   return $orderby;
							}
							add_filter('posts_orderby','coach_posts_orderby');
							$coach_global_orderby = "
							UPPER(CONCAT(REVERSE(SUBSTRING_INDEX(REVERSE($wpdb->posts.post_title),' ',1)),$wpdb->posts.post_title))
							";


							$team = new WP_Query( $args );

							// The Loop
							if ( $team->have_posts() ) {
							while ( $team->have_posts() ) { $team->the_post(); ?>


							<div class="col span_2 coach-item">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
									<h3><?php the_title(); ?></h3>
							</div>


							<?php  }
							} else {
								// no posts found
							}

							$coach_global_orderby = '';
							// Restore original Post Data
							wp_reset_postdata();

						?>
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
