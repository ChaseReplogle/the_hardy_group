<?php


?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="container row consulting-text-header">
					<?php $image = get_field('icon');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
					<?php if( has_term( '4', 'level' ) ) { ?>
						<h3 class="text-gold">Consulting</h3>
					<?php } elseif( has_term( '3', 'level' ) ) { ?>
						<h3 class="text-gold">Coaching</h3>
					<?php } ?>

					<br />
					<h1><?php the_field('full_title'); ?></h1>
				</div>

				<div class="row container gutters">
					<div class="col span_6 main-consulting-text">

						<article id="post-<?php the_ID(); ?>" class="post-content">

							<div class="entry-content container gutters large-gutters">
								<div class="col span_12">
									<?php the_content(); ?>
								</div>
							</div><!-- .entry-content -->

						</article><!-- #post-## -->
					</div>
					<div class="col span_6 consulting-contact">
						<?php $video_id = get_field('video_id'); ?>
						<?php if($video_id) { ?><div id="video"><iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&byline=0&portrait=0" width="1000" height="563" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><?php } ?>

						<div class="form">
							<h2 class="text-gold"><?php the_title(); ?></h2>
							<?php if( has_term( '4', 'level' ) ) { ?>
								<h4>Tell us about your ministry.</h4>
							<?php } elseif( has_term( '3', 'level' ) ) { ?>
								<h2><?php the_field('cost'); ?></h2>
								<h4><?php the_field('duration'); ?></h4>
							<?php } ?>

							<hr>
							<?php if( has_term( '4', 'level' ) ) { ?>
								<?php echo do_shortcode( '[gravityform id="6" title="false" description="true"]' ); ?>
							<?php } elseif( has_term( '3', 'level' ) ) { ?>
								<a href="<?php  the_field('purchase_link'); ?>" target="_Blank" class="button button--blue button-block">Sign Up</a>
							<?php } ?>
						</div>
						<div class="consulting-questions">
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

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php related_endorsements(); ?>

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
