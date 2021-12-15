<?php
/**
 * Header Top Options
 *
 * @package WEN_Travel
 */

/**
 * Add header top options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wen_travel_header_top( $wp_customize ) {
	$wp_customize->add_section( 'wen_travel_header_top', array(
		'panel'       => 'wen_travel_theme_options',
		'title'       => esc_html__( 'Header Top Options', 'wen-travel-modern' ),
	) );

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_disable_header_top',
			'sanitize_callback' => 'wen_travel_sanitize_checkbox',
			'label'             => esc_html__( 'Header Top', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'custom_control'    => 'Wen_Travel_Toggle_Control',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_social_menu_left',
			'default'			=> 1,
			'sanitize_callback' => 'wen_travel_sanitize_checkbox',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Social Menu on Left', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'custom_control'    => 'Wen_Travel_Toggle_Control',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_header_top_menu_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Wen_Travel_Note_Control',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => sprintf( esc_html__( 'For Top Social Menu, go %1$shere%2$s', 'wen-travel-modern' ),
				 '<a href="javascript:wp.customize.control( \'nav_menu_locations[social-top]\' ).focus();">',
				 '</a>'
			),
			'section'           => 'wen_travel_header_top',
			'type'              => 'description',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_display_date',
			'sanitize_callback' => 'wen_travel_sanitize_checkbox',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Display Date', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'custom_control'    => 'Wen_Travel_Toggle_Control',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_header_top_link_text',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Link Text', 'wen-travel-modern' ),
			'default'           => esc_html__( 'My Account', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'type'              => 'text',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_header_top_link',
			'sanitize_callback' => 'esc_url_raw',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Link url', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_header_top_link_target',
			'sanitize_callback' => 'wen_travel_sanitize_checkbox',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'custom_control'    => 'Wen_Travel_Toggle_Control',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_phone',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Phone', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'type'              => 'text',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_email',
			'sanitize_callback' => 'sanitize_email',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Email', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'type'              => 'text',
		)
	);

	wen_travel_register_option( $wp_customize, array(
			'name'              => 'wen_travel_address',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'wen_travel_is_header_top_enabled',
			'label'             => esc_html__( 'Address', 'wen-travel-modern' ),
			'section'           => 'wen_travel_header_top',
			'type'              => 'text',
		)
	);
}
add_action( 'customize_register', 'wen_travel_header_top' );

if( ! function_exists( 'wen_travel_is_header_top_enabled' ) ) :
    /**
    * Return true if header top is enabled
    */
    function wen_travel_is_header_top_enabled( $control ) {
        return ( $control->manager->get_setting( 'wen_travel_disable_header_top' )->value() ? true : false );
    }
endif;
