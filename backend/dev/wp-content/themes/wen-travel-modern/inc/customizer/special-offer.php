<?php
/**
 * Special Offer Options
 *
 * @package WEN_Travel
 */

/**
 * Add Special Offer options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wen_travel_special_offer_options( $wp_customize ) {
	$wp_customize->add_section( 'wen_travel_special_offer_options', array(
			'title' => esc_html__( 'Special Offer', 'wen-travel-modern' ),
			'panel' => 'wen_travel_theme_options',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_special_offer_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'wen_travel_sanitize_select',
			'choices'           => wen_travel_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'wen-travel-modern' ),
			'section'           => 'wen_travel_special_offer_options',
			'type'              => 'select',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_special_offer',
			'default'           => '0',
			'sanitize_callback' => 'wen_travel_sanitize_post',
			'active_callback'   => 'wen_travel_is_special_offer_active',
			'label'             => esc_html__( 'Page', 'wen-travel-modern' ),
			'section'           => 'wen_travel_special_offer_options',
			'type'              => 'dropdown-pages',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_special_offer_percentage',
			'sanitize_callback' => 'wen_travel_sanitize_number_range',
			'active_callback'   => 'wen_travel_is_special_offer_active',
			'label'             => esc_html__( 'Offer Number (Percent)', 'wen-travel-modern' ),
			'section'           => 'wen_travel_special_offer_options',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 60px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_special_offer_text',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'wen_travel_is_special_offer_active',
			'label'             => esc_html__( 'Offer Text', 'wen-travel-modern' ),
			'section'           => 'wen_travel_special_offer_options',
			'type'              => 'text',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_special_offer_text_bg_image',
			'sanitize_callback' => 'esc_url_raw',
			'active_callback'   => 'wen_travel_is_special_offer_active',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Offer Text Background Image', 'wen-travel-modern' ),
			'section'           => 'wen_travel_special_offer_options',
		)
	);
}
add_action( 'customize_register', 'wen_travel_special_offer_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'wen_travel_is_special_offer_active' ) ) :
	/**
	* Return true if Special Offer content is active
	*
	* @since Wen Travel Pro 1.0
	*/
	function wen_travel_is_special_offer_active( $control ) {
		$enable = $control->manager->get_setting( 'wen_travel_special_offer_visibility' )->value();

		return wen_travel_check_section( $enable );
	}
endif;
