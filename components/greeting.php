<?php
/**
 *
 * Greetings
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * Simwa Load Greeting
 */
function simwa_greeting() {
	if ( carbon_get_theme_option( 'mm_simwa_show_greeting' ) ) {
		add_action( 'wp_body_open', 'simwa_greeting_container' );
	}
}
add_action( 'init', 'simwa_greeting' );


/**
 * Simwa Trigger
 */
function simwa_trigger() {
	$mm_simwa_use_logo = carbon_get_theme_option( 'mm_simwa_use_logo' );
	$data_show         = carbon_get_theme_option( 'mm_simwa_hide_on' );
	if ( $mm_simwa_use_logo ) {
		$mm_simwa_logo = carbon_get_theme_option( 'mm_simwa_logo' );
		$mm_simwa_logo = '<img class="simwa-find-this" src="' . esc_url( $mm_simwa_logo ) . '" alt="Customer Service" title="Customer Service">';
	} else {
		$mm_simwa_logo = mm_simwa_get_icon()['support'];
	}
	if ( carbon_get_theme_option( 'mm_simwa_logo_text' ) ) {
		$logo_under_text = '<span class="simwa-text-logo">' . carbon_get_theme_option( 'mm_simwa_logo_text' ) . '</span>';
	} else {
		$logo_under_text = '';
	}
	$bg_color   = carbon_get_theme_option( 'simwa_trigger_bg_color' );
	$text_color = carbon_get_theme_option( 'simwa_trigger_text_color' );
	$icon_color = carbon_get_theme_option( 'simwa_trigger_icon_color' );
	?>
	<div id="simwa-trigger" class="simwa-sleep <?php echo esc_html( carbon_get_theme_option( 'mm_simwa_style' ) ); ?>" data-simwa-show="<?php echo esc_html( $data_show ); ?>" data-simwa-position="<?php echo esc_html( mm_simwa_position() ); ?>" style="background-color:<?php echo esc_html( $bg_color ); ?>; color:<?php echo esc_html( $text_color ); ?>; fill:<?php echo esc_html( $icon_color ); ?>;">
		<?php
		echo wp_kses( $mm_simwa_logo, simwa( array( 'svg', 'img' ) ) );
		echo wp_kses( $logo_under_text, simwa( array( 'span' ) ) );
		?>
	</div>
	<?php
}
add_action( 'wp_body_open', 'simwa_trigger' );

/**
 * Greeting Container
 */
function simwa_greeting_container() {
	$mm_simwa_show_greeting = carbon_get_theme_option( 'mm_simwa_show_greeting' );
	$data_show              = carbon_get_theme_option( 'mm_simwa_hide_on' );
	$bg_color               = carbon_get_theme_option( 'simwa_greeting_bg_color' );
	$text_color             = carbon_get_theme_option( 'simwa_greeting_text_color' );
	if ( $mm_simwa_show_greeting ) {
		$mm_simwa_greeting_text = carbon_get_theme_option( 'mm_simwa_greeting_text' );
		if ( $mm_simwa_greeting_text ) {
			?>
			<div id="simwa-greeting-wr" class="simwa-sleep <?php echo esc_html( carbon_get_theme_option( 'mm_simwa_style' ) ); ?>" data-simwa-show="<?php echo esc_html( $data_show ); ?>" data-simwa-position="<?php echo esc_html( mm_simwa_position() ); ?>" style="background-color: <?php echo esc_html( $bg_color ); ?>; color: <?php echo esc_html( $text_color ); ?>;">
				<span class="simwa-greeting-text">
					<?php echo esc_html( $mm_simwa_greeting_text ); ?>
				</span>
			</div>
			<?php
		}
	}
}

