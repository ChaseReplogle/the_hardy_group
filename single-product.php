<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="blog_header ">
					<div class="container gutters">
						<div class="col span_12">
							<h1>Products</h1>
						</div>
					</div>
				</div>

				<article id="post-<?php the_ID(); ?>" class="post-content">

					<div class="entry-content container gutters large-gutters single-product-item">
						<div class="col span_4">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
						</div>
						<div class="col span_8">
							<h1><?php the_title(); ?></h1>
							<h3 class="text-gold"><?php the_field('sub-title'); ?></h3>
							<?php the_content(); ?>
							<?php

							// check if the repeater field has rows of data
							if( have_rows('item') ): ?>
								<table>

							 	<?php // loop through the rows of data
							    while ( have_rows('item') ) : the_row(); ?>

							    	<tr>
							    	<td><?php the_sub_field('title'); ?></td>
							    	<td class="description-cell"><?php the_sub_field('description'); ?></td>
							    	<td class="price-cell"><?php the_sub_field('price'); ?></td>
							    	</tr>


							    <?php endwhile;

							else :

							    // no rows found

							endif;	?>
								</table>
							<div class="also-available"><?php the_field('also_available'); ?></div>

						</div>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->




			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php hardy_group_footer_endorsements(); ?>

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
