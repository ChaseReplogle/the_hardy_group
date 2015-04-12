
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="entry-content container gutters large-gutters">
			<div class="col span_9">

					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array (
  						'paged' 				=> $paged,
						'posts_per_page'         => '10',
						'orderby'                => 'date',
						'post_type'				=> array('post'),
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); ?>

						<div class="row blog-excerpt">

							<?php if ( has_post_thumbnail() ) { ?>
							<div class="col span_12">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>

						<?php } else { ?>
							<div class="col span_12">
						<?php } ?>

								<div >
									<header class="blog-header">
										<a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
										<div class="entry-meta">
											<?php echo get_the_category_list(); ?>
											<span class="secondary"><?php hardy_group_posted_on(); ?></span>
										</div><!-- .entry-meta -->
									</header><!-- .entry-header -->

									<div class="">
										<?php the_excerpt(); ?>
									</div><!-- .entry-content -->

								</div><!-- #post-## -->
							</div>

							<?php if ( 'post' == get_post_type() ) { ?>
								<a href="<?php the_permalink(); ?>" class="button full-width">Read More</a>
							<?php } ?>

						</div>

					<?php } ?>


					<div class="nav-previous alignleft text-gold"><?php next_posts_link('Past Articles', $query->max_num_pages) ?></div>
					<div class="nav-next alignright text-gold"><?php previous_posts_link('Newer Articles') ?></div>


					<?php } else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();

					?>



			</div>

			<div class="col span_3">
				<?php get_sidebar(); ?>
			</div>
		</div>

	</main>
</div>