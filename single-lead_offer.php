
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main offer-background" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="entry-content container gutters large-gutters ">

				<div class="col span_3">
					<?php $image = get_field('full_cover_image');

					if( !empty($image) ): ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					<?php endif; ?>
				</div>

				<div class="col span_9">
					<?php the_field('thank_you_text'); ?>
					<a href="<?php the_field('download_file'); ?>" class="button button-block button--blue">Download</a>
				</div>
			</div><!-- .entry-content -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
