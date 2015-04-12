<?php
/*
Template Name: Endorsements
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

						<div class="row endorsements">

						<?php
							// WP_Query arguments
							$args = array (
								'post_type'         => 'endorsement',
								'order'				=> 'ASC'
							);

							// The Query
							$team = new WP_Query( $args );

							// The Loop
							if ( $team->have_posts() ) {
							while ( $team->have_posts() ) { $team->the_post(); $count++; ?>


							<div class="col span_3 endorsement-item">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
								<h3><?php the_title(); ?></h3>
								<h4><?php the_field('position'); ?></h4>
								<?php the_content(); ?>
							</div>

							<?php if ( 0 == $count%4 ) { echo '<div class="clear"></div>'; } ?>
							<?php  }
							if ( 0 != $count%3 ) { echo '<div class="clear"></div>'; }
							} else {
								// no posts found
							}

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


	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
