<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cloud_proposal
 */

get_header();
?>

<main id="primary" class="site-main">

<?php if( have_rows('slides') ): ?>
    <?php while( have_rows('slides') ): the_row(); ?>
      <div id="slide-<?php echo get_row_index(); ?>">
			        	<p><?php the_sub_field('slide_content'); ?></p>
			        	<a><?php the_sub_field('read_more_text'); ?></a>
			        </div>
    <?php endwhile; ?>
<?php endif; ?>


		</main><!-- #main -->

	<?php
	get_sidebar();
	get_footer();
