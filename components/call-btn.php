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
	$bgcol                = carbon_get_theme_option( 'mm_simwa_call_bg_color' );
	$text_color           = carbon_get_theme_option( 'mm_simwa_call_text_color' );
	$icon_color           = carbon_get_theme_option( 'mm_simwa_call_icon_color' );
	if ( $mm_simwa_call_number ) {
		?>
	<li><a href="<?php echo esc_html( $call_url ); ?>" class="wa-btn simwa-call-btn" rel="noopener nofollow" title="chat whatsapp" style="background-color:<?php echo esc_html( $bgcol ); ?>; color:<?php echo esc_html( $text_color ); ?>; fill:<?php echo esc_html( $icon_color ); ?>;"><?php echo wp_kses( mm_simwa_get_data()['call_btn_text'], $pass ); ?></a></li>
		<?php
	}
}