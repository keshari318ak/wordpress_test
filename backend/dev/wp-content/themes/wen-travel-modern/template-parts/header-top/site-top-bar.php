<?php
/**
 * Displays header top bar
 *
 * @package WEN_Travel
 */

if ( ! get_theme_mod( 'wen_travel_disable_header_top' ) ) {
		// Bail if Header top is disabled.
	return;
}

$social_left = get_theme_mod( 'wen_travel_social_menu_left', 1 );
$date     	 = get_theme_mod( 'wen_travel_display_date' );
$link_text 	 = get_theme_mod( 'wen_travel_header_top_link_text', esc_html__( 'My Account', 'wen-travel-modern' ) );
$email     	 = get_theme_mod( 'wen_travel_email' );
$address   	 = get_theme_mod( 'wen_travel_address' );
$phone     	 = get_theme_mod( 'wen_travel_phone' );

$classes[] = '';
if( $social_left ) {
	$classes[] = 'social-on-left';
}
if( ! $email && ! $address && ! $phone && ! $link_text && ! $date ) {
	$classes[] = 'no-header-top-left';
}
?>

<div id="header-top" class="header-top-bar <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<button id="menu-toggle-top" class="menu-top-toggle menu-toggle" aria-controls="top-menu" aria-expanded="false">
			<?php echo wen_travel_get_svg( array( 'icon' => 'bars' ) ); echo wen_travel_get_svg( array( 'icon' => 'close' ) ); 
			
			 $label = esc_html__( 'Top Bar', 'wen-travel-modern' ); ?>
				<span class="header-top-label menu-label"><?php echo esc_html( $label ); ?></span>
		</button>

		<div id="site-header-top-menu" class="site-header-top-main">
			<div class="top-main-wrapper">
				<!-- Header Top Left -->
				<?php get_template_part( 'template-parts/header-top/contact-details-top' ); ?>
				
				<!-- Header Top Right -->
				<?php get_template_part( 'template-parts/navigation/navigation-social-top' ); ?>
			</div><!-- .top-main-wrapper -->
		</div><!-- .site-header-top-main -->
	</div><!-- .wrapper -->
</div><!-- #header-top -->
