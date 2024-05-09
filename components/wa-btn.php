<?php
/**
 *
 * Whatsapp Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get data
 */
function mm_simwa_get_wa_button() {
	$pass               = simwa( array( 'svg' ) );
	$wa_url             = mm_simwa_get_data()['wa_number_link'];
	$mm_simwa_wa_number = carbon_get_theme_option( 'mm_simwa_wa_number' );
	$bg_color           = carbon_get_theme_option( 'mm_simwa_wa_bg_color' );
	$text_color         = carbon_get_theme_option( 'mm_simwa_wa_text_color' );
	$icon_color         = carbon_get_theme_option( 'mm_simwa_wa_icon_color' );
	if ( $mm_simwa_wa_number ) {
		?>
	<li><a href="<?php echo esc_html( $wa_url ); ?>" class="wa-btn simwa-wa-btn" rel="noopener nofollow" title="chat whatsapp" style="background-color:<?php echo esc_html( $bg_color ); ?>; color:<?php echo esc_html( $text_color ); ?>; fill:<?php echo esc_html( $icon_color ); ?>;"><?php echo wp_kses( mm_simwa_get_data()['wa_btn_text'], $pass ); ?></a></li>
		<?php
	}
}