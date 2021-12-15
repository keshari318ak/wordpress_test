<?php
/**
 * The template used for displaying Special Offer
 *
 * @package WEN_Travel
 */

$enable_section = get_theme_mod( 'wen_travel_special_offer_visibility', 'disabled' );

if ( ! wen_travel_check_section( $enable_section ) ) {
	// Bail if Special Offer is not enabled
	return;
}

get_template_part( 'template-parts/special-offer/post-type-special' );
