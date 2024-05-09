<?php
/**
 *
 * Components
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
/**
 * Simwa Data Show
 */
function simwa_data_show() {
	$mm_simwa_hide_on = carbon_get_theme_option( 'mm_simwa_hide_on' );
	if ( '768' === $mm_simwa_hide_on ) {
		$data_show = '768';
	} elseif ( '495' === $mm_simwa_hide_on ) {
		$data_show = '495';
	} else {
		$data_show = 'all';
	}
	return $data_show;
}
// Required necessary files.
require_once MM_SIMPLE_WA_PATH . 'components/container.php';
require_once MM_SIMPLE_WA_PATH . 'components/greeting.php';
require_once MM_SIMPLE_WA_PATH . 'components/wa-btn.php';
require_once MM_SIMPLE_WA_PATH . 'components/call-btn.php';
require_once MM_SIMPLE_WA_PATH . 'components/email-btn.php';
require_once MM_SIMPLE_WA_PATH . 'components/telegram-btn.php';
