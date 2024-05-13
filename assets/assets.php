<?php
/**
 *
 * Assets
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


// Required necessary files.
require_once MM_SIMPLE_WA_PATH . 'assets/images/icons.php';

/**
 * Load necessary assets.
 */
function simwa_call_assets() {
	// Load CSS.
	wp_enqueue_style( 'mm-simwa-style', MM_SIMPLE_WA_URL . 'assets/css/style.css', array(), '1.0', 'all' );

	$mm_simwa_style = carbon_get_theme_option( 'mm_simwa_style' );
	wp_enqueue_style( 'mm-simwa-custom', MM_SIMPLE_WA_URL . 'assets/css/' . $mm_simwa_style . '.css', array(), '1.0', 'all' );

	// Responsive CSS.
	wp_enqueue_style( 'mm-simwa-responsive', MM_SIMPLE_WA_URL . 'assets/css/responsive.css', array(), '1.0', 'all' );

	// Load JS.
	wp_enqueue_script( 'mm-simple-wa', MM_SIMPLE_WA_URL . 'assets/js/js.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'simwa_call_assets' );


/**
 * Load simwa-admin.css
 */
function simwa_call_admin_assets() {
	wp_enqueue_style( 'mm-simwa-admin', MM_SIMPLE_WA_URL . 'assets/css/simwa-admin.css', array(), '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'simwa_call_admin_assets' );
