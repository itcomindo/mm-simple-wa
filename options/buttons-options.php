<?php
/**
 *
 * Button Options
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Simwa Button Options
 */
function simwa_buttons_option() {
	return array(
		// ==========Call Options==========
		Field::make( 'separator', 'buttonssimwasep', 'Buttons Options' )
		->set_classes( 'simwa-sep simwa-call' ),

		Field::make( 'separator', 'callsimwasep', 'Calling Options' )
		->set_classes( 'simwa-sep-child simwa-call' ),

		// Call Number.
		Field::make( 'text', 'mm_simwa_call_number', 'Call Number' )
		->set_default_value( '0813-9891-2341' )
		->set_help_text( 'Enter your phone number e.g 0813-9891-2341 or leave it blank if you dont want to show this button' ),

		// Call button text.
		Field::make( 'text', 'mm_simwa_call_btn_text', 'Call Button Text' )
		->set_default_value( 'Call Us' )
		->set_help_text( 'Enter your call button text e.g Call Us' ),

		// Call button background color.
		Field::make( 'color', 'mm_simwa_call_bg_color', 'Call Button Background Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#FFFFFF00' )
		->set_help_text( 'Set the background color of the call button.' ),

		// Call button text color.
		Field::make( 'color', 'mm_simwa_call_text_color', 'Call Button Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#00aff0' )
		->set_help_text( 'Set the text color of the call button.' ),

		// Call Icon Color.
		Field::make( 'color', 'mm_simwa_call_icon_color', 'Call Icon Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#00aff0' )
		->set_help_text( 'Set the color of the call icon.' ),

		// ==========Whasapp Options==========
		Field::make( 'separator', 'wasimwasep', 'Whatsapp Options' )
		->set_classes( 'simwa-sep-child simwa-wa' ),

		// Wa Number.
		Field::make( 'text', 'mm_simwa_wa_number', 'WhatsApp Number' )
		->set_default_value( '0813-9891-2341' )
		->set_help_text( 'Enter your WhatsApp number e.g 0813-9891-2341 or leave it blank if you dont want to show this button' ),

		// Wa button text.
		Field::make( 'text', 'mm_simwa_wa_btn_text', 'WhatsApp Button Text' )
		->set_default_value( 'Chat via WhatsApp' )
		->set_help_text( 'Enter your WhatsApp button text e.g Chat via WhatsApp' ),

		// Wa button background color.
		Field::make( 'color', 'mm_simwa_wa_bg_color', 'WhatsApp Button Background Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#FFFFFF00' )
		->set_help_text( 'Set the background color of the WhatsApp button.' ),

		// Wa button text color.
		Field::make( 'color', 'mm_simwa_wa_text_color', 'WhatsApp Button Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#25d366' )
		->set_help_text( 'Set the text color of the WhatsApp button.' ),

		// Wa Icon Color.
		Field::make( 'color', 'mm_simwa_wa_icon_color', 'WhatsApp Icon Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#25d366' )
		->set_help_text( 'Set the color of the WhatsApp icon.' ),

		// ==========Telegram Options==========
		Field::make( 'separator', 'telegramsimwasep', 'Telegram Options' )
		->set_classes( 'simwa-sep-child simwa-telegram' ),
		// Telegram Number.
		Field::make( 'text', 'mm_simwa_telegram', 'Telegram Number' )
		->set_default_value( '@budi_haryono' )
		->set_help_text( 'Enter your Telegram username e.g @budi_haryono or leave it blank if you dont want to show this button' ),

		// Telegram button text.
		Field::make( 'text', 'mm_simwa_telegram_btn_text', 'Telegram Button Text' )
		->set_default_value( 'Chat via Telegram' )
		->set_help_text( 'Enter your Telegram button text e.g Chat via Telegram' ),

		// Telegram button background color.
		Field::make( 'color', 'mm_simwa_telegram_bg_color', 'Telegram Button Background Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#FFFFFF00' )
		->set_help_text( 'Set the background color of the Telegram button.' ),

		// Telegram button text color.
		Field::make( 'color', 'mm_simwa_telegram_text_color', 'Telegram Button Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#0088cc' )
		->set_help_text( 'Set the text color of the Telegram button.' ),

		// Telegram Icon Color.
		Field::make( 'color', 'mm_simwa_telegram_icon_color', 'Telegram Icon Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#0088cc' )
		->set_help_text( 'Set the color of the Telegram icon.' ),

		// ==========Email Options==========
		Field::make( 'separator', 'emailsimwasep', 'Email Options' )
		->set_classes( 'simwa-sep-child simwa-email' ),
		// Email.
		Field::make( 'text', 'mm_simwa_email', 'Email' )
		->set_default_value( 'Jon@doe.com' )
		->set_help_text( 'Enter your Email address or leave it blank if you dont want to show this button' ),

		// Email button text.
		Field::make( 'text', 'mm_simwa_email_btn_text', 'Email Button Text' )
		->set_default_value( 'Send Email' )
		->set_help_text( 'Enter your email button text e.g Send Email' ),

		// Email button background color.
		Field::make( 'color', 'mm_simwa_email_bg_color', 'Email Button Background Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#FFFFFF00' )
		->set_help_text( 'Set the background color of the Email button.' ),

		// Email button text color.
		Field::make( 'color', 'mm_simwa_email_text_color', 'Email Button Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#d14836' )
		->set_help_text( 'Set the text color of the Email button.' ),

		// Email Icon Color.
		Field::make( 'color', 'mm_simwa_email_icon_color', 'Email Icon Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#d14836' )
		->set_help_text( 'Set the color of the Email icon.' ),
	);
}
