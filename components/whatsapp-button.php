<?php
/**
 *
 * Whatsapp Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
/**
 * Get Whatsapp Button.
 */
function simwa_get_whatsapp_button() {
	$bg_color             = carbon_get_theme_option( 'mm_simwa_wa_bg_color' );
	$text_color           = carbon_get_theme_option( 'mm_simwa_wa_text_color' );
	$icon_color           = carbon_get_theme_option( 'mm_simwa_wa_icon_color' );
	$whatsapp_button_text = carbon_get_theme_option( 'mm_simwa_wa_btn_text' );
	$mm_simwa_show_icon   = carbon_get_theme_option( 'mm_simwa_show_icon' );
	if ( ! empty( $whatsapp_button_text ) ) {
		if ( $mm_simwa_show_icon ) {
			$icon                 = mm_simwa_get_icon()['whatsapp'];
			$whatsapp_button_text = $icon . ' ' . $whatsapp_button_text;
		} else {
			$whatsapp_button_text = $whatsapp_button_text;
		}
	} else {
		$whatsapp_button_text = 'Chat via WhatsApp';
	}

	// Wa Number.
	$wa_number = carbon_get_theme_option( 'mm_simwa_wa_number' );
	if ( ! empty( $wa_number ) ) {
		$data['wa_number'] = $wa_number;
		$x                 = substr_replace( $wa_number, '62', 0, 1 );
		$x                 = str_replace( array( '-', ' ' ), '', $x );

		if ( carbon_get_theme_option( 'mm_simwa_include_title' ) ) {
			$text_prefix = simwa_text_prefix();
			$post_title  = simwa_post_title();
			$url_prefix  = simwa_url_prefix();
			$post_url    = simwa_post_url();
			$pesan       = $text_prefix . '%20' . $post_title . '%20' . $url_prefix . '%20' . $post_url;
			if ( is_singular() ) {
				$whatsapp_number = 'https://api.whatsapp.com/send?phone=' . $x . '&text=' . $pesan;
			} else {
				$whatsapp_number = 'https://api.whatsapp.com/send?phone=' . $x;
			}
		} else {
			$whatsapp_number = 'https://api.whatsapp.com/send?phone=' . $x;
		}
	} else {
		$whatsapp_number = 'https://api.whatsapp.com/send?phone=6281398912341';
	}

	$whatsapp_button = '<li><a href="' . esc_html( $whatsapp_number ) . '" class="wa-btn simwa-whatsapp-btn" rel="noopener nofollow" title="Chat via Whatsapp" style="background-color:' . esc_html( $bg_color ) . '; color:' . esc_html( $text_color ) . ';">' . $whatsapp_button_text . '</a></li>';

	return $whatsapp_button;
}
