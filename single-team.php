
<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="entry-content container gutters large-gutters">

				<div class="col span_3">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>
				</div>

				<div class="col span_9">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div><!-- .entry-content -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
