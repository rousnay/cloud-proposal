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

	<?php $master_slides = get_field('slide_template');?>

	<main id="primary" class="site-main">


		<header> 
			<div class="row">
				<div class="col">
					<img class="cdw-logo logo-red" src="<?php echo get_stylesheet_directory_uri(); ?>/images/cdw_logo_red.png"><!-- <img class="cdw-logo logo-white" src="<?php //echo get_stylesheet_directory_uri(); ?>/images/cdw_logo_white.png"> -->

				</div>
				
					<div class="menu-panel">
						<h3><?php the_title(); ?> <span>Proposal</span></h3>
						<ul id="menu-toc" class="menu-toc">

							<li class="menu-toc-current"><a href="#slide-main"><?php the_field('heading_main'); ?></a></li>
							<?php if( get_field('heading_1') ): ?>
								<li><a href="#first-slide"><?php the_field('heading_1'); ?></a></li>
							<?php endif; ?>

							<?php if( have_rows('slides') ): ?>
								<?php while( have_rows('slides') ): the_row(); ?>
									<li><a href="#slide-<?php echo get_row_index(); ?>"><?php the_sub_field('heading'); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>

							<?php if( $master_slides ): ?>
								<?php foreach( $master_slides as $key=>$post ): 
									setup_postdata($post); ?>

									<li><a href="#slide-template-<?php echo $key ?>"><?php the_title(); ?></a></li>

								<?php endforeach; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>

							<?php
							if( get_field('add_pricing_table') == 'true' ): ?>
								<li><a href="#slide-table">Pricing Table</a></li>
							<?php endif; ?>

							<?php
							if( get_field('contact_us_slide') == 'true' ) : ?>
								<li><a href="#slide-contact">Contact Us</a></li>
							<?php endif; ?>

						</ul>
					</div>
				
			</div>
		</header>


		<div class="bb-custom-wrapper proposal-slider">
			<div id="bb-bookblock" class="bb-bookblock">

				<div class="bb-item" id="slide-main">
					<div class="slider-inner" style="background-image: url(<?php the_field('background_image_main');?>);">
						<div class="slider-overlay">

							<div class="content">
								

								<div class="container">

									<div class="scroller">


										<!-- <div class="header"><img src="<?php //the_field('company_logo_main'); ?>"></div> -->
										<h1 class="main-header" style="color:<?php the_field('color_main'); ?>"><?php the_field('heading_main'); ?></h1>
										<?php the_field('content_main'); ?>

									</div>
								</div>

								
							</div>

						</div>
					</div>
				</div>


				<?php if( get_field('heading_1') ): ?>

					<div class="bb-item" id="first-slide">
						<div class="slider-inner" style="background-image: url(<?php the_field('background_image_1');?>);">
							<div class="slider-overlay">

								<div class="content">
									<div class="scroller">

										<div class="container">
											<h1 class="main-header" style="color:<?php the_field('color_1'); ?>"><?php the_field('heading_1'); ?></h1>
											<?php the_field('content_1'); ?>

											<!-- <div class="btn_readmore"><i class="fa fa-arrow-down" aria-hidden="true"></i></div> -->

											<?php if( get_field('read_more_text_1') ): ?>
												<div class="btn_readmore">read more</div>

												<div class="block_readmore">
													<div class="block_readmore_inner">
														<a id="readmore-close" class="fa fa-angle-down read_close_cdw" href="#"></a>
														<div class="container">
															<?php the_field('read_more_text_1'); ?>
														</div>
													</div>
												</div>

											<?php endif; ?>

										</div>

										<div class="logo-custom"><img src="<?php the_field('company_logo_main'); ?>"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>


				<?php if( have_rows('slides') ): ?>
					<?php while( have_rows('slides') ): the_row(); ?>

						<div class="bb-item" id="slide-<?php echo get_row_index(); ?>">
							<div class="slider-inner" style="background-image: url(<?php the_sub_field('background_image');?>);">
								<div class="slider-overlay">

									<div class="content">
										<div class="scroller">

											<div class="container">
												<h1 class="main-header" style="color:<?php the_sub_field('color'); ?>"><?php the_sub_field('heading'); ?></h1>
												<?php the_sub_field('content'); ?>

												<div class="btn_readmore">read more</div>

												<div class="block_readmore">
													<div class="block_readmore_inner">
														<a id="readmore-close" class="fa fa-angle-down read_close_cdw" href="#"></a>
														<div class="container">
															<?php the_sub_field('read_more_text'); ?>
														</div>
													</div>
												</div>
											</div>


										</div>
									</div>

								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>


				<?php if( $master_slides ): ?>
					<?php foreach( $master_slides as $key=>$post ): 

							        // Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); ?>

						<div class="bb-item" id="slide-template-<?php echo $key ?>">
							<div class="slider-inner" style="background-image: url(<?php the_field('background_image');?>);">
								<div class="slider-overlay">

									<div class="content">
										<div class="scroller">

											<div class="container">
												<p><?php the_content(); ?></p>

												<div class="btn_readmore">read more</div>

												<div class="block_readmore">
													<div class="block_readmore_inner">
														<a id="readmore-close" class="fa fa-angle-down read_close_cdw" href="#"></a>
														<div class="container">
															<?php the_field('read_more_text'); ?>
														</div>
													</div>
												</div>
											</div>

										</div></div>

									</div>
								</div>
							</div>

						<?php endforeach; ?>
						<?php 
						    // Reset the global post object so that the rest of the page works correctly.
						wp_reset_postdata(); ?>
					<?php endif; ?>


					<?php
					if( get_field('add_pricing_table') == 'true' ): ?>


						<div class="bb-item" id="slide-table">




							<div class="content">
								<div class="scroller">

									<div class="container">
										<h1 class="main-header">Pricing Table</h1>
										<?php
										$table = get_field( 'pricing_table' );

										if ( ! empty ( $table ) ) {

											echo '<table border="0">';

											if ( ! empty( $table['caption'] ) ) {

												echo '<caption>' . $table['caption'] . '</caption>';
											}

											if ( ! empty( $table['header'] ) ) {

												echo '<thead>';

												echo '<tr>';

												foreach ( $table['header'] as $th ) {

													echo '<th>';
													echo $th['c'];
													echo '</th>';
												}

												echo '</tr>';

												echo '</thead>';
											}

											echo '<tbody>';

											foreach ( $table['body'] as $tr ) {

												echo '<tr>';

												foreach ( $tr as $td ) {

													echo '<td>';
													echo $td['c'];
													echo '</td>';
												}

												echo '</tr>';
											}

											echo '</tbody>';

											echo '</table>';
										}


										?>

									</div>


								</div></div>


							</div>

						<?php endif;?>


						<?php
						if( get_field('contact_us_slide') == 'true' ) : ?>

							<div class="bb-item" id="slide-contact">


								<div class="content">
									<div class="scroller">
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
								</div>
							</div>
						<?php endif;?>

					</div>

					<nav class="arrow">
						<span id="bb-nav-next" class="animate-surf-hint"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></span>
						<span id="bb-nav-prev"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></span>

					</nav>
					<span id="tblcontents" class="menu-button">Table of Contents</span>

				</div>

			</div>
		</main><!-- #main -->


		<?php
		get_sidebar();
		get_footer();