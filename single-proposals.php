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


					<?php if( have_rows('slides') ): ?>
						<?php while( have_rows('slides') ): the_row(); ?>

							<div class="bb-item" id="slide-<?php echo get_row_index(); ?>">

								<div class="container">
									<?php the_sub_field('slide_content'); ?>

									<div class="btn_readmore">read more</div>

									<div class="block_readmore">
										<div class="block_readmore_inner">
											<a id="readmore-close" class="fa fa-angle-down read_close_cdw" href="#">Close</a>
											<?php the_sub_field('read_more_text'); ?>
										</div>
									</div>
									
								</div>
							</div>
						<?php endwhile; ?>


						<?php $master_slides = get_field('slide_template');
						if( $master_slides ): ?>
							<?php foreach( $master_slides as $key=>$post ): 

						        // Setup this post for WP functions (variable must be named $post).
								setup_postdata($post); ?>

								<div class="bb-item" id="slide-template-<?php echo $key ?>">

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

							<?php endforeach; ?>
							<?php 
					    // Reset the global post object so that the rest of the page works correctly.
							wp_reset_postdata(); ?>
						<?php endif; ?>


						<?php
						if( get_field('contact_us_slide') == 'true' ) { ?>

							<div class="bb-item" id="slide-contact">

								<div class="container">


									<h1 class="main-header">Contact Us</h1>
									<h1><?php the_field('company_name', 'user_'.$author_id) ?></h1>

									<img width="150px" src="<?php the_field('company_logo', 'user_'.$author_id) ?>" alt="">

									<ul class="proposal-address">
										<li><?php the_field('phone_number', 'user_'.$author_id) ?></li>
										<li><?php the_field('business_email', 'user_'.$author_id) ?></li>
										<li><?php the_field('address_line_1', 'user_'.$author_id) ?></li>
										<li><?php the_field('address_line_2', 'user_'.$author_id) ?></li>
										<li><?php the_field('website', 'user_'.$author_id) ?></li>
									</ul>	
								</div>
							</div>
						<?php } endif;?>
					</div>

				</div>

				<!-- </div> -->

				<nav class="arrow">

					<a id="bb-nav-prev" href="#" class="btn_prev">Previous</a>

					<a id="bb-nav-next" href="#" class="btn_next">Next</a>

				</nav>

			</main><!-- #main -->


			<?php
			get_sidebar();
			get_footer();
