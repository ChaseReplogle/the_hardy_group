<?php
/**
 * @package hardy_group
 */
?>

<div class="row blog-excerpt">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class='col span_4'>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>

		<div class="col span_8">
	<?php } else { ?>
		<div class="col span_12">
	<?php } ?>

			<div class="">
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


		<a href="<?php the_permalink(); ?>" class="button full-width">Read More</a>

	</div>