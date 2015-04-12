
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="entry-content container gutters large-gutters">
			<div class="col span_9">

				<div class="row blog-excerpt">
					<div class="col span_12">

						<div class="">
							<header class="blog-header">
								<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail(); ?>
								<?php } ?>


								<a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
								<div class="entry-meta">
									<?php echo get_the_category_list(); ?>
									<span class="secondary"><?php hardy_group_posted_on(); ?></span>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->

							<div class="">
								<?php the_content(); ?>
								<h4>Share This Article</h4>
								<hr />
								<?php echo do_shortcode("[wp_social_sharing show_icons='1']"); ?>
							</div><!-- .entry-content -->



						</div><!-- #post-## -->
					</div>
				</div>


			<div class="nav-previous alignleft text-gold"><?php next_posts_link('Past Articles', $query->max_num_pages) ?></div>
			<div class="nav-next alignright text-gold"><?php previous_posts_link('Newer Articles') ?></div>


			</div>

			<div class="col span_3">
				<?php get_sidebar(); ?>
			</div>
		</div>

	</main>
</div>