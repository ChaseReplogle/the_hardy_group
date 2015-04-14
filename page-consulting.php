<?php
/*
Template Name: Consulting
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-content">

				<div class="entry-content container gutters">
					<div class="col span_12">
						<h3 class="text-gold">Level 04</h3>
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
						<h3 class="text-gold">Services</h3>
						<hr />
					</div>
					<div class="row">
						<div class="col span_6 topics">

						<?php
							// WP_Query arguments
							$args = array (
								'post_type'         => 'topics',
								'level'				=> '4'
							);

							// The Query
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

					</div>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->


		</main><!-- #main -->
	</div><!-- #primary -->



			<div class="gray-background">
				<div class="container">

					<div class="consulting-call-to-action row gutters">
						<div class="col span_7">
							<h2>Let's Talk.</h2>
							<p> Every consulting service begins with a simple conversation. Let’s get started by talking about whether The Hardy Group Consulting is right for you.</p>
						</div>
						<div class="col span_5">
							<a href="/contact" class="button button--blue button-block">Get Started</a>
						</div>

					</div>
				</div>
			</div>

			<div class="light-gray-background">
				<div class="container">
						<div class="consulting-questions columns-2">
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

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
