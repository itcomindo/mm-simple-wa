<?php
/**
 *
 * Telegram Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get Telegram Button.
 */
function simwa_get_telegram_button() {
	// Telegram.

	$background_color = carbon_get_theme_option( 'mm_simwa_telegram_bg_color' );
	$text_color       = carbon_get_theme_option( 'mm_simwa_telegram_text_color' );
	$icon_color       = carbon_get_theme_option( 'mm_simwa_telegram_icon_color' );
	$icon             = carbon_get_theme_option( 'mm_simwa_show_icon' );

	// Create Button Text.
	$button_text = carbon_get_theme_option( 'mm_simwa_telegram_btn_text' );
	if ( ! empty( $button_text ) ) {
		if ( $icon ) {
			$icon        = mm_simwa_get_icon()['telegram'];
			$button_text = $icon . ' ' . $button_text;
		} else {
			$button_text = $button_text;
		}
	} else {
		$button_text = 'Chat via Telegram';
	}

	// Create Number.
	$number = carbon_get_theme_option( 'mm_simwa_telegram' );
	if ( ! empty( $number ) ) {
		$number = $number;
		$number = str_replace( '@', '', $number );
		$number = 'https://t.me/' . $number;
	} else {
		$number = 'budi_haryono';
		$number = 'https://t.me/@budi_haryono';
	}

	if ( carbon_get_theme_option( 'mm_simwa_include_title' ) ) {
		$text_prefix = simwa_text_prefix();
		$post_title  = simwa_post_title();
		$url_prefix  = simwa_url_prefix();
		$post_url    = simwa_post_url();
		$pesan       = '?start=' . $text_prefix . '%20' . $post_title . '%20' . $url_prefix . '%20' . $post_url;
		if ( is_single() || is_page() || is_singular() ) {
			$number = $number . $pesan;
		} else {
			$number = $number;
		}
	}

	$button = '<li><a href="' . $number . '" class="wa-btn simwa-telegram-btn" style="background-color:' . background_color() . '; color:' . $text_color . '">' . $button_text . '</a></li>';

	return $button;
}
