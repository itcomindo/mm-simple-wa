<?php
/**
 *
 * Email Button
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Get data
 */
function mm_simwa_get_email_button() {
	$pass           = simwa( array( 'svg' ) );
	$email_link     = mm_simwa_get_data()['email_link'];
	$mm_simwa_email = carbon_get_theme_option( 'mm_simwa_email' );
	$bgcol          = carbon_get_theme_option( 'mm_simwa_email_bg_color' );
	$text_color     = carbon_get_theme_option( 'mm_simwa_email_text_color' );
	$icon_color     = carbon_get_theme_option( 'mm_simwa_email_icon_color' );
	if ( $mm_simwa_email ) {
		?>
	<li><a href="<?php echo esc_html( $email_link ); ?>" class="wa-btn simwa-email-btn" rel="noopener nofollow" title="send email" style="background-color:<?php echo esc_html( $bgcol ); ?>; color:<?php echo esc_html( $text_color ); ?>; fill:<?php echo esc_html( $icon_color ); ?>;"><?php echo wp_kses( mm_simwa_get_data()['email_btn_text'], $pass ); ?></a></li>
		<?php
	}
}