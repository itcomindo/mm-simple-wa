<?php
/**
 *
 * Call Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get data
 */
function mm_simwa_get_call_button() {
	$pass                 = simwa( array( 'svg' ) );
	$call_url             = mm_simwa_get_data()['call_number_link'];
	$mm_simwa_call_number = carbon_get_theme_option( 'mm_simwa_call_number' );
	if ( $mm_simwa_call_number ) {
		?>
	<li><a href="<?php echo esc_html( $call_url ); ?>" class="wa-btn simwa-call-btn" rel="noopener nofollow" title="chat whatsapp"><?php echo wp_kses( mm_simwa_get_data()['call_btn_text'], $pass ); ?></a></li>
		<?php
	}
}