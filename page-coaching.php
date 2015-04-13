<?php
/*
Template Name: Coaching
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

						<div class="row gutters large-gutters">
							<div class="consulting-text col span_5">
								<?php the_content(); ?>
							</div>

							<div class="consulting-text col span_7">
									<?php $video_id = get_field('video_id'); ?>
									<?php if($video_id) { ?><div id="video"><iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&byline=0&portrait=0" width="1000" height="563" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><?php } ?>
							</div>
						</div>



					<div class="row">
						<h3 class="text-gold">Topics</h3>
						<hr />
					</div>
					<div class="row">
						<div class="col span_6 topics">

						<?php
							// WP_Query arguments
							$args = array (
								'post_type'         => 'topics',
								'level'				=> '3'
							);


							$team = new WP_Query( $args );

							// The Loop
							if ( $team->have_posts() ) {
							while ( $team->have_posts() ) { $team->the_post(); $count++; ?>


							<div class="topic-item <?php  if ( $count == 1 ) {  echo 'current-topic'; } ?>">
								<a href="#<?php global $post; echo $post->post_name; ?>">
									<?php

									$image = get_field('icon');

									if( !empty($image) ): ?>

										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

									<?php endif; ?>

									<h3><?php the_title(); ?></h3>
								</a>
								<div class="topic-item-content <?php  if ( $count == 1 ) {  echo 'current-content'; } ?>" id="<?php global $post; echo $post->post_name; ?>">
									<?php the_field('summary'); ?>
									<a href="<?php the_permalink(); ?>" class="button button-block button--gold" >Learn More</a>
								</div>
							</div>

							<?php  if ( 0 == $count%2 ) {
						        echo '<div class="clear"></div>';
						    } ?>


							<?php  }
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();

						?>
						</div>

						<div class="col span_6 topic-item-content-container">
						</div>
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
								'role'				=> 'coach'
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
							while ( $team->have_posts() ) { $team->the_post();  $count = 0; $count++; ?>


							<div class="col span_2 coach-item">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
									<h3><?php the_title(); ?></h3>
							</div>

							<?php  if ( 0 == $count%6 ) {
						        echo '<div class="clear"></div>';
						    } ?>

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


		</main><!-- #main -->
	</div><!-- #primary -->

			<div class="light-gray-background">
				<div class="container">
						<div class="consulting-questions columns-2 dont-break">
							<?php

							// check if the repeater field has rows of data
							if( have_rows('questions') ):

							 	// loop through the rows of data
							    while ( have_rows('questions') ) : the_row(); ?>

							       <h3 class="text-gold"><?php the_sub_field('question'); ?> </h3>
							       <p><?php the_sub_field('answer');?></p>

							    <?php endwhile;

							else :

							    // no rows found

							endif;	?>

						</div>
				</div>
			</div>

			<?php endwhile; // end of the loop. ?>



	<?php hardy_group_footer_endorsements(); ?>

<?php get_footer(); ?>
