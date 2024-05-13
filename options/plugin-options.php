<?php
/**
 *
 * Plugin Options
 *
 * @package mm-simple-wa
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Register options page.
 */
function mm_simwa_options() {
	Container::make( 'theme_options', 'MM Simple WA Options' )
		->add_fields(
			array(

				// ##############################
				// Options.
				// ##############################

				// ##############################
				// Greeting Style.
				// ##############################

				Field::make( 'separator', 'displayoptionssimwasep', 'Display Options' )
				->set_classes( 'simwa-sep-child simwa-email' ),

				// select option to choose style 1 to 5.
				Field::make( 'select', 'mm_simwa_style', 'Choose Style' )
				->set_width( 33 )
				->add_options(
					array(
						'default' => 'Style 1',
					)
				)
						->set_default_value( 'default' )
						->set_help_text( 'Choose style for your contact button.' ),

				// select option to choose position bottom left, bottom right, floating left or floating right.
				Field::make( 'select', 'mm_simwa_position', 'Choose Position' )
				->set_width( 33 )
				->add_options(
					array(
						'bottom-left'    => 'Bottom Left',
						'bottom-right'   => 'Bottom Right',
						'floating-left'  => 'Floating Left',
						'floating-right' => 'Floating Right',
					)
				)
						->set_default_value( 'bottom-right' )
						->set_help_text( 'Choose position for your contact button.' ),

				// Select with option hide on screen width below 768px and 495px.
				Field::make( 'select', 'mm_simwa_hide_on', 'Hide on Screen Width' )
				->set_width( 33 )
				->add_options(
					array(
						'none' => 'Display on all devices',
						'768'  => '768px',
						'495'  => '495px',
					)
				)
				->set_default_value( 'none' )
				->set_help_text( 'Hide contact button on screen width below 768px or 495px.' ),

				// ##############################
				// Greeting Style.
				// ##############################

				Field::make( 'separator', 'greetingoptionssimwasep', 'Greeting and Trigger Options' )
				->set_classes( 'simwa-sep-child simwa-email' ),

				// Checkbox show greeting or not.
				Field::make( 'checkbox', 'mm_simwa_show_greeting', 'Show Greeting' )
				->set_option_value( 'yes' )
				->set_default_value( true )
				->set_help_text( 'Show greeting text or callout, e.g Selamat datang bosq.' ),

				// Greeting Width.
				Field::make( 'text', 'mm_simwa_greeting_width', 'Greeting Width' )
				->set_attribute( 'type', 'number' )
				->set_default_value( 100 )
				->set_help_text( 'Set or adjust the greeting message box, width in pixel, just input number without px' ),

				// Textarea max 100 characters for greeting.
				Field::make( 'textarea', 'mm_simwa_greeting_text', 'Greeting Max Characters' )
				->set_attribute( 'maxLength', '100' )
				->set_default_value( 'Selamat datang di website kami bossQ' )
				->set_help_text( 'Enter max characters for greeting text. e.g selamat datang di website kami bossQ. NOTE: this will work if show greeting is CHECKED!' ),

				// Checkbox to use logo or not.
				Field::make( 'checkbox', 'mm_simwa_use_logo', 'Use Logo on trigger' )
				->set_option_value( 'yes' )
				->set_default_value( false )
				->set_help_text( 'Use your logo in the greeting. if not checked it will use default icon' ),

				// Logo.
				Field::make( 'image', 'mm_simwa_logo', 'Logo' )
				->set_required( true )
				->set_value_type( 'url' )
				->set_help_text( 'Upload your logo. for best result make image width: 40px with aspect ratio 1/1 or 40x40px' )
				->set_conditional_logic(
					array(
						array(
							'field'    => 'mm_simwa_use_logo',
							'operator' => '==',
							'value'    => true,
						),
					)
				),

				// text under logo.
				Field::make( 'text', 'mm_simwa_logo_text', 'Text Under Logo or Icon' )
				->set_default_value( 'Customer Service' )
				->set_help_text( 'Enter text under logo or icon e.g Customer Service. Leave it blank if you dont need!.' ),

				// ##############################
				// Additional Options.
				// ##############################

				Field::make( 'separator', 'additionaloptionssimwasep', 'Additional Options' )
				->set_classes( 'simwa-sep-child simwa-email' ),

				// checkbox to include post title just in post, page or singular.
				Field::make( 'checkbox', 'mm_simwa_include_title', 'Include Post Title' )
				->set_option_value( 'yes' )
				->set_default_value( true )
				->set_help_text( 'Include post title in the message, this will only work in post, page or singular or product.' ),

				// text prefix if include title.
				Field::make( 'text', 'mm_simwa_title_prefix', 'Title Prefix' )
				->set_default_value( 'Hello, I need help with' )
				->set_help_text( 'Enter your title prefix e.g Hello, I need help with' ),

				// checkbox to include post url post, page or singular.
				Field::make( 'checkbox', 'mm_simwa_include_url', 'Include Post URL' )
				->set_option_value( 'yes' )
				->set_default_value( true )
				->set_help_text( 'Include post URL in the message, this will only work in post, page or singular or product NOTE: this only work if you Include post title is CHECKED!.' ),

				// text before URL.
				Field::make( 'text', 'mm_simwa_url_prefix', 'URL Prefix' )
				->set_default_value( 'yang ada di' )
				->set_help_text( 'Enter your URL prefix e.g yang ada di' ),

				// Preview.
				Field::make( 'html', 'prevsimwa', 'Preview' )
				->set_html( '<span>Your message could be like this: Your prefix message + your post title + your url prefix + your post url. (e.g: Hi, saya ingin bertanya tentang judul post yang ada di https://somedomain.com/xxx/xxx/)</span>' ),

				// ##############################
				// Buttons.
				// ##############################

				...simwa_buttons_option(),

				// ##############################
				// Styling Options.
				// ##############################

				...simwa_style_options(),

			)
		);
}
add_action( 'carbon_fields_register_fields', 'mm_simwa_options' );

/**
 * Get Prefix
 */
function simwa_text_prefix() {
	if ( is_singular() ) {
		$prefix = str_replace( ' ', '%20', carbon_get_theme_option( 'mm_simwa_title_prefix' ) );
	} else {
		$prefix = '';
	}
	return $prefix;
}

/**
 * Get Post Title
 */
function simwa_post_title() {
	if ( is_singular() ) {
		$title = str_replace( ' ', '%20', get_the_title() );
	} else {
		$title = '';
	}
	return $title;
}

/**
 * Get URL Prefix.
 */
function simwa_url_prefix() {
	if ( is_singular() ) {
		if ( carbon_get_theme_option( 'mm_simwa_include_url' ) ) {
			$simwa_url_prefix = carbon_get_theme_option( 'mm_simwa_url_prefix' );
			if ( $simwa_url_prefix ) {
				$simwa_url_prefix = str_replace( ' ', '%20', $simwa_url_prefix );
			} else {
				$simwa_url_prefix = '@%20';
			}
		} else {
			$simwa_url_prefix = '';
		}
	} else {
		$simwa_url_prefix = '';
	}
	return $simwa_url_prefix;
}

/**
 * Get Post URL
 */
function simwa_post_url() {

	if ( is_singular() ) {
		if ( carbon_get_theme_option( 'mm_simwa_include_url' ) ) {
			$url = get_permalink();
		} else {
			$url = '';
		}
	} else {
		$url = '';
	}
	return $url;
}


/**
 * Get Position
 */
function mm_simwa_position() {
	$mm_simwa_position = carbon_get_theme_option( 'mm_simwa_position' );
	return $mm_simwa_position;
}
