<?php
/**
 * Displays Contact Details on header top
 *
 * @package WEN_Travel
 */

$date      = get_theme_mod( 'wen_travel_display_date' );
$link_text = get_theme_mod( 'wen_travel_header_top_link_text', esc_html__( 'My Account', 'wen-travel-modern' ) );
$email     = get_theme_mod( 'wen_travel_email' );
$address   = get_theme_mod( 'wen_travel_address' );
$phone     = get_theme_mod( 'wen_travel_phone' );

if ( $date || $link_text || $email  || $address || $phone ): ?>
	<div class="header-top-left">			
		<ul class="contact-details">
		<?php if ( $link_text ) :
			$target = get_theme_mod( 'wen_travel_header_top_link_target' ) ? '_blank': '_self';
			$wen_travel_link = get_theme_mod( 'wen_travel_header_top_link', '#' );
			?>
			<li class="my-account-link"><a target="<?php echo $target; ?>" href="<?php echo esc_url( $wen_travel_link ); ?>"><?php echo wen_travel_get_svg( array( 'icon' => 'user' ) ); echo esc_html( $link_text ); ?></a></li>
			<?php endif; ?>

			<?php if ( $date ) : ?>
			<li class="date"><?php echo wen_travel_get_svg( array( 'icon' => 'calendar' ) ); ?><?php echo esc_html( date_i18n( 'l, F j, Y' ) ); ?></li>
			<?php endif; ?>

			<?php if ( $phone ) : ?>
			<li class="contact-phone"><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo wen_travel_get_svg( array( 'icon' => 'phone' ) ); echo esc_html( preg_replace( '/\s+/', '', $phone ) ); ?></a></li>
			<?php endif; ?>

			<?php if ( $email ) : ?>
			<li class="contact-email"><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo wen_travel_get_svg( array( 'icon' => 'email' ) ); echo esc_html( antispambot( $email ) ) ?></a></li>
			<?php endif; ?>

			<?php if ( $address ) : ?>
			<li class="contact-address"><?php echo wen_travel_get_svg( array( 'icon' => 'location' ) ); echo wp_kses_post( $address ); ?></li>
			<?php endif; ?>
		</ul><!-- .contact-details -->
	</div><!-- .header-top-left -->
<?php endif; ?>
