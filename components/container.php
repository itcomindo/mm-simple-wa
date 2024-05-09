<?php
/**
 *
 * Container
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Container
 */
function mm_simwa_container() {
	$data_show = carbon_get_theme_option( 'mm_simwa_hide_on' );
	?>
	<div id="simwa-container" class="simwa-sleep <?php echo esc_html( carbon_get_theme_option( 'mm_simwa_style' ) ); ?>" data-simwa-show="<?php echo esc_html( $data_show ); ?>" data-simwa-position="<?php echo esc_html( mm_simwa_position() ); ?>">
		<div id="simwa-close">X</div>
		<ul class="simwa-btn-wr">
			<?php
			mm_simwa_get_wa_button();
			mm_simwa_get_call_button();
			mm_simwa_get_telegram_button();
			mm_simwa_get_email_button();
			?>
		</ul>
	</div>
	<?php
}
add_action( 'wp_body_open', 'mm_simwa_container' );


