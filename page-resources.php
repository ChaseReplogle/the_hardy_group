<?php
/*
Template Name: Resources
*/

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<div class="light-gray-background">
				<div class="container">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div>
							<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search articles and resources..." />
							<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
						</div>
					</form>
				</div>
			</div>

			<div class="entry-content container gutters large-gutters">
				<div class="row">
					<h1><?php the_field('full_title'); ?></h1>
				</div>

				<div class="row">
					<h3 class="text-gold">Products</h3>
					<hr />
				</div>
				<div class="row products resource-row">
					<?php
						// WP_Query arguments
						$args = array (
							'post_type'         => 'product',
						);

						// The Query
						$team = new WP_Query( $args );

						// The Loop
						if ( $team->have_posts() ) {
						while ( $team->have_posts() ) { $team->the_post();  $count = 0; $count++; ?>


						<div class="col span_4 product-item">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
								<h3  class="text-gold"><?php the_title(); ?></h3>
								<p class="subtitle"><?php the_field('sub-title'); ?></p>
							</a>
							<a href="<?php the_permalink(); ?>" class="button button-block">Learn More</a>
						</div>

						<?php  if ( 0 == $count%4 ) {
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






				<div class="row">
					<h3 class="text-gold">Book Reviews</h3>
					<hr />
				</div>
				<div class="row reviews resource-row">
					<div class="col span_5">
						<div class="columns-2">
							<?php $taxonomy = 'book-category';
							$tax_terms = get_terms($taxonomy); ?>

							<ul>
								<?php
								foreach ($tax_terms as $tax_term) {
									echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
								}
								?>
							</ul>
						</div>
						<a href="/book-reviews/" class="button button-block">See All Reviews</a>
					</div>

					<?php
						// WP_Query arguments
						$args = array (
							'post_type'         => 'book-reviews',
							'posts_per_page'	=> '1'
						);

						// The Query
						$review = new WP_Query( $args );

						// The Loop
						if ( $review->have_posts() ) {
						while ( $review->have_posts() ) { $review->the_post();  $count = 0; $count++; ?>

						<div class="col span_7 review-item">
							<a href="<?php the_permalink(); ?>" class="book-cover">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('large'); } ?>
							</a>
							<div class="review-text">
								<h4>Latest Review:</h4>
								<h3 class="text-gold"><?php the_title(); ?></h3>
								<p class="by_line"><?php the_field('by_line'); ?></p>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="button button-block">Read Reveiw</a>
							</div>

						</div>

						<?php  if ( 0 == $count%4 ) {
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


			<?php endwhile; // end of the loop. ?>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->


	<?php hardy_group_footer_endorsements(); ?>

	<?php hardy_group_footer_signup(); ?>

<?php get_footer(); ?>
