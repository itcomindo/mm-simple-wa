<?php
/**
 *
 * Greetings
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Greeting Container
 */
function simwa_greeting_container() {
	$greeting         = carbon_get_theme_option( 'mm_simwa_show_greeting' );
	$data_show        = carbon_get_theme_option( 'mm_simwa_hide_on' );
	$background_color = carbon_get_theme_option( 'simwa_greeting_bg_color' );
	$text_color       = carbon_get_theme_option( 'simwa_greeting_text_color' );
	$width            = carbon_get_theme_option( 'mm_simwa_greeting_width' );
	if ( $greeting ) {
		$greeting_text = carbon_get_theme_option( 'mm_simwa_greeting_text' );
		if ( $greeting_text ) {
			?>
			<div id="simwa-greeting-wr" class="simwa-sleep <?php echo esc_html( carbon_get_theme_option( 'mm_simwa_style' ) ); ?>" data-simwa-show="<?php echo esc_html( $data_show ); ?>" data-simwa-position="<?php echo esc_html( mm_simwa_position() ); ?>" style="background-color: <?php echo esc_html( $background_color ); ?>; color: <?php echo esc_html( $text_color ); ?>; width:<?php echo esc_html( $width ); ?>px">
				<span class="simwa-greeting-text">
					<?php echo esc_html( $greeting_text ); ?>
				</span>
			</div>
			<?php
		} else {
			?>
			<div id="simwa-greeting-wr" class="simwa-sleep <?php echo esc_html( carbon_get_theme_option( 'mm_simwa_style' ) ); ?>" data-simwa-show="<?php echo esc_html( $data_show ); ?>" data-simwa-position="<?php echo esc_html( mm_simwa_position() ); ?>" style="background-color: <?php echo esc_html( $background_color ); ?>; color: <?php echo esc_html( $text_color ); ?>;">
				<span class="simwa-greeting-text">Ini Greeting Text</span>
			</div>
			<?php
		}
	}
}

