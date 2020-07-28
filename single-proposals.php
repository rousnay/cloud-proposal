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


	<div id="bb-bookblock" class="bb-bookblock">
	<?php if( have_rows('slides') ): ?>
	    <?php while( have_rows('slides') ): the_row(); ?>
	      <div class="bb-item" id="slide-<?php echo get_row_index(); ?>">
				        	<p><?php the_sub_field('slide_content'); ?></p>
				        	<a><?php the_sub_field('read_more_text'); ?></a>
				        </div>
	    <?php endwhile; ?>
	<?php endif; ?>
	</div>

<nav>
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
					</nav>
					
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
