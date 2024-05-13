<?php
/**
 *
 * Silence is golden
 *
 * @package what
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
use Carbon_Fields\Container;
use Carbon_Fields\Field;


/**
 * Simwa Style Options
 */
function simwa_style_options() {
	return array(

		Field::make( 'separator', 'simwastyleop', 'Styling Options' )
			->set_classes( 'simwa-sep' ),

		Field::make( 'separator', 'triggerssimwasep', 'Trigger Style' )
			->set_classes( 'simwa-sep-child simwa-email' ),

		// Trigger background color.
		Field::make( 'color', 'simwa_trigger_bg_color', 'Trigger Background Color' )
			->set_width( 33 )
			->set_alpha_enabled( true )
			->set_default_value( '#000000' )
			->set_help_text( 'Set the background color of the trigger button.' ),

		// Trigger text color.
		Field::make( 'color', 'simwa_trigger_text_color', 'Trigger Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#fffff' )
		->set_help_text( 'Set the text color of the trigger button.' ),

		// Trigger icon color.
		Field::make( 'color', 'simwa_trigger_icon_color', 'Trigger Icon Colorssss' )
			->set_width( 33 )
			->set_alpha_enabled( true )
			->set_default_value( '#25d366' )
			->set_help_text( 'Set the color of the trigger icon.' ),

		// ##############################
		// Greeting Style.
		// ##############################

		Field::make( 'separator', 'greetingsimwasep', 'Greeting Style' )
			->set_classes( 'simwa-sep-child simwa-email' ),

		// Greeting background color.
		Field::make( 'color', 'simwa_greeting_bg_color', 'Greeting Background Color' )
			->set_width( 33 )
			->set_alpha_enabled( true )
			->set_default_value( '#333333' )
			->set_help_text( 'Set the background color of the greeting message.' ),

		// Greeting text color.
		Field::make( 'color', 'simwa_greeting_text_color', 'Greeting Text Color' )
		->set_width( 33 )
		->set_alpha_enabled( true )
		->set_default_value( '#ffffff' )
		->set_help_text( 'Set the text color of the greeting message.' ),

		// ##############################
		// Button Container Style.
		// ##############################

		Field::make( 'separator', 'simwabuttoncontainersimwasep', 'Buttons Container Style' )
			->set_classes( 'simwa-sep-child simwa-email' ),

		// Button Container Background Color.
		Field::make( 'color', 'simwa_button_container_bg_color', 'Button Container Background Color' )
			->set_alpha_enabled( true )
			->set_default_value( '#333333' )
			->set_help_text( 'Set the background color of the button container.' ),

	);
}
