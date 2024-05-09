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
	if ( $mm_simwa_telegram ) {
		?>
	<li><a href="<?php echo esc_html( $telegram_link ); ?>" class="wa-btn simwa-telegram-btn" rel="noopener nofollow" title="caht on telegram"><?php echo wp_kses( mm_simwa_get_data()['telegram_btn_text'], $pass ); ?></a></li>
		<?php
	}
}