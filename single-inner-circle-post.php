
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="gutters image-header">
			<div class="background-gradient"></div>
			<div class="row container">

				<div class="col span_12 header-content">
					<img src="/wp-content/uploads/2015/04/ICLogo-FINAL.jpg">
					<div class="header-content-text">
						<h1>The Inner Circle Videos</h1>
						<p class="text-white">This video is presented as a part of your monthly Inner Circle Subscription.</p>
					</div>
				</div>

			</div>
		</div>


			<?php while ( have_posts() ) : the_post(); ?>

			<div class="entry-content container">

				<div class="col span_12">
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="col span_9">
					<?php $video_id = get_field('video_id'); ?>
					<?php if($video_id) { ?><div id="video"><iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&byline=0&portrait=0" width="1000" height="563" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><?php } ?>
					<?php the_content(); ?>
				</div>

				<div class="col span_3 video-links">
					<h3 class="text-gold">Related Files</h3>
					<?php if( have_rows('additional_links', $post->ID) ): ?>
						<ul class="dont-break">
					    <?php while ( have_rows('additional_links', $post->ID) ) : the_row(); ?>
							<li><a href="<?php the_sub_field('link_file', $post->ID);?>"><?php the_sub_field('link_title', $post->ID);?></a></li>
					    <?php endwhile; ?>
					    </ul>

					<?php else :

					endif;	?>
				</div>



				<div class="row">

				<hr>

				<?php $post_objects = get_field('related_videos');

				if( $post_objects ): ?>
				    <div class="col span_4">
				    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>

				        <div class="related_video-item">
				            <?php $video_id = get_field('video_id', $post->ID); ?>
							<?php if($video_id) { ?><div class="secondary-video"><iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&byline=0&portrait=0" width="1000" height="563" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><?php } ?>
							<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>


								<?php if( have_rows('additional_links', $post->ID) ):

								 	// loop through the rows of data
								    while ( have_rows('additional_links', $post->ID) ) : the_row(); ?>

										<ul class="dont-break">
								       		<li><a href="<?php the_sub_field('link_file', $post->ID);?>"><?php the_sub_field('link_title', $post->ID);?></a></li>
								       </ul>

								    <?php endwhile;

								else :

								endif;	?>
						</div>

				    <?php endforeach; ?>
				    </div>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>


				</div>
			</div><!-- .entry-content -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
