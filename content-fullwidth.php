<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package hardy_group
 */
?>

<article id="post-<?php the_ID(); ?>" class="post-content">

	<div class="entry-content container gutters large-gutters">
		<div class="col span_12">
			<h1><?php the_field('full_title'); ?></h1>
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
