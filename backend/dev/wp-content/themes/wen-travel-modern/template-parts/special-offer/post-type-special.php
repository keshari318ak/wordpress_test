<?php
/**
 * The template used for displaying Special Offer
 *
 * @package WEN_Travel
 */

$args = array();

if ( $wen_travel_id = get_theme_mod( 'wen_travel_special_offer' ) ) {
	$args['page_id'] = absint( $wen_travel_id );
}

// If $args is empty return false
if ( empty( $args ) ) {
	return;
}

$args['posts_per_page']      = 1;
$args['ignore_sticky_posts'] = true;

// Create a new WP_Query using the argument previously created
$special_query = new WP_Query( $args );
if ( $special_query->have_posts() ) :
	while ( $special_query->have_posts() ) :
		$special_query->the_post();

		$classes[] = 'special-offer-section';
		$classes[] = 'section';
		$classes[] = 'content-align-left';
		$classes[] = 'text-align-left';

		if ( ! has_post_thumbnail() ) {
			$classes[] = 'content-full-width';
		}

		if ( ! has_post_thumbnail() ) {
			$classes[] = 'no-thumb';
		}
		?>
		<div id="special-offer-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<div class="wrapper">
				<div class="section-content-wrapper special-offer-content-wrapper">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="hentry-inner">
							<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumb-video-wrapper">
								<?php wen_travel_post_thumbnail( array(508, 635), 'html' ); // wen_travel_post_thumbnail( $image_size, $wen_travel_type = 'html', $echo = true, $no_thumb = false ). ?>
							</div><!-- .thumb-video-wrapper -->
							<?php endif; ?>

							<div class="entry-container">
							<?php
							$wen_travel_description = get_theme_mod( 'wen_travel_special_offer_text' );
							$wen_travel_percent = get_theme_mod( 'wen_travel_special_offer_percentage' );
							$description_background = get_theme_mod( 'wen_travel_special_offer_text_bg_image' );

							$description_class = '';
							if ($description_background) {
								$description_class = 'has-bg-img';
							} 
							?>
								<header class="entry-header">
									<h2 class="section-title">
										<?php the_title(); ?>
									</h2>
								</header><!-- .entry-header -->

							<?php if ( $wen_travel_description || $wen_travel_percent ) : ?>
								<div class="section-description <?php echo esc_attr( $description_class ); ?>">
									<p>
									<?php if ( $wen_travel_percent ) : ?>
										<span class="offer-percentage"><?php echo esc_html( absint( $wen_travel_percent ) ); ?>%</span>
									<?php endif; ?>
									
										<?php
										echo wp_kses_post( $wen_travel_description );
										?>
									</p>
								</div><!-- .section-description-wrapper -->
							<?php endif; ?>

							<div class="entry-content">
								<?php
								the_excerpt();

								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wen-travel-modern' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
									'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wen-travel-modern' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
								?>
							</div><!-- .entry-content -->

							<?php if ( get_edit_post_link() ) : ?>
								<footer class="entry-footer">
									<div class="entry-meta">
										<?php
											edit_post_link(
												sprintf(
													/* translators: %s: Name of current post */
													esc_html__( 'Edit %s', 'wen-travel-modern' ),
													the_title( '<span class="screen-reader-text">"', '"</span>', false )
												),
												'<span class="edit-link">',
												'</span>'
											);
										?>
									</div>	<!-- .entry-meta -->
								</footer><!-- .entry-footer -->
							<?php endif; ?>
						</div><!-- .hentry-inner -->
					</article>
				</div><!-- .section-content-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .section -->
	<?php
	endwhile;

	wp_reset_postdata();
endif;
