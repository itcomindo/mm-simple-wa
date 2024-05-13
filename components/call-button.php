<?php
/**
 *
 * Call Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get Call Button.
 */
function simwa_get_call_button() {
	$background_color = carbon_get_theme_option( 'mm_simwa_call_bg_color' );
	$text_color       = carbon_get_theme_option( 'mm_simwa_call_text_color' );
	$icon_color       = carbon_get_theme_option( 'mm_simwa_call_icon_color' );
	$icon             = carbon_get_theme_option( 'mm_simwa_show_icon' );

	// Create Button Text.
	$button_text = carbon_get_theme_option( 'mm_simwa_call_btn_text' );
	if ( ! empty( $button_text ) ) {
		if ( $icon ) {
			$icon = mm_simwa_get_icon()['phone'];

			$button_text = $icon . ' ' . $button_text;
		} else {
			$button_text = $button_text;
		}
	} else {
		$button_text = 'Call Us';
	}

	// Create Number.
	$number = carbon_get_theme_option( 'mm_simwa_call_number' );
	if ( ! empty( $number ) ) {
		$number = substr_replace( $number, '62', 0, 1 );
		$number = str_replace( array( '-', ' ' ), '', $number );
		$number = 'tel:+' . $number;
	} else {
		$number = 'tel:+6281398912341';
	}

	$button = '<li><a href="' . esc_html( $number ) . '" class="wa-btn simwa-call-btn" rel="noopener nofollow" title="Call Mobile Phone" style="background-color:' . esc_html( $background_color ) . '; color:' . esc_html( $text_color ) . ';">' . $button_text . '</a></li>';

	return $button;
}
