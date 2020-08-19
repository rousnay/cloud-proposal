<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cloud_proposal
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>


	<?php 
	global $post;
	$author_id = $post->post_author;							 
	?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cloud-proposal' ); ?></a>

		<main id="primary" class="site-main">

			<div class="proposal-slider">
				<div id="bb-bookblock" class="bb-bookblock">


					<?php while ( have_posts() ) : the_post(); ?>

						<div class="bb-item" id="slide-1">

							<div class="container">

								<p><?php the_content(); ?></p>

								<div class="btn_readmore">read more</div>

								<div class="block_readmore">
									<div class="block_readmore_inner">
										<a id="readmore-close" class="fa fa-angle-down read_close_cdw" href="#">Close</a>
										<?php the_field('read_more_text'); ?>
									</div>
								</div>

							</div>
						</div>


					<?php endwhile; // end of the loop. ?>


				</div>

			</div>

			<!-- </div> -->
<!-- 
			<nav class="arrow">

				<a id="bb-nav-prev" href="#" class="btn_prev">Previous</a>

				<a id="bb-nav-next" href="#" class="btn_next">Next</a>

			</nav> -->

		</main><!-- #main -->

		<?php
		get_sidebar();
		get_footer();
