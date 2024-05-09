<?php
/**
 *
 * Telegram Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get data
 */
function mm_simwa_get_telegram_button() {
	$pass              = simwa( array( 'svg' ) );
	$telegram_link     = mm_simwa_get_data()['telegram_link'];
	$mm_simwa_telegram = carbon_get_theme_option( 'mm_simwa_telegram' );
	$bgcol             = carbon_get_theme_option( 'mm_simwa_telegram_bg_color' );
	$text_color        = carbon_get_theme_option( 'mm_simwa_telegram_text_color' );
	$icon_color        = carbon_get_theme_option( 'mm_simwa_telegram_icon_color' );
	if ( $mm_simwa_telegram ) {
		?>
	<li><a href="<?php echo esc_html( $telegram_link ); ?>" class="wa-btn simwa-telegram-btn" rel="noopener nofollow" title="caht on telegram" style="background-color:<?php echo esc_html( $bgcol ); ?>; color:<?php echo esc_html( $text_color ); ?>; fill:<?php echo esc_html( $icon_color ); ?>;"><?php echo wp_kses( mm_simwa_get_data()['telegram_btn_text'], $pass ); ?></a></li>
		<?php
	}
}