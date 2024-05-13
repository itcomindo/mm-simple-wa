<?php
/**
 *
 * Email Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get Call Button.
 */
function simwa_get_email_button() {
	$background_color = carbon_get_theme_option( 'mm_simwa_email_bg_color' );
	$text_color       = carbon_get_theme_option( 'mm_simwa_email_text_color' );
	$icon_color       = carbon_get_theme_option( 'mm_simwa_email_icon_color' );
	$icon             = carbon_get_theme_option( 'mm_simwa_show_icon' );

	// Create Button Text.
	$button_text = carbon_get_theme_option( 'mm_simwa_email_btn_text' );
	if ( ! empty( $button_text ) ) {
		if ( $icon ) {
			$icon        = mm_simwa_get_icon()['email'];
			$button_text = $icon . ' ' . $button_text;
		} else {
			$button_text = $button_text;
		}
	} else {
		$button_text = 'Send Email';
	}

	// Create Number.
	$email = carbon_get_theme_option( 'mm_simwa_email' );
	if ( ! empty( $email ) ) {
		$email = 'mailto:' . $email;
	} else {
		$email = 'mailto:email@email.com';
	}

	$button = '<li><a href="' . esc_html( $email ) . '" class="wa-btn simwa-email-btn" rel="noopener nofollow" title="Send Email" style="background-color:' . esc_html( $background_color ) . '; color:' . esc_html( $text_color ) . '; fill:' . esc_html( $icon_color ) . ';">' . $button_text . '</a></li>';

	return $button;
}
