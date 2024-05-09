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

				// select option to choose style 1 to 5.
				Field::make( 'select', 'mm_simwa_style', 'Choose Style' )
				->add_options(
					array(
						'default' => 'Style 1',
						'simwa-2' => 'Style 2',
						'simwa-3' => 'Style 3',
						'simwa-4' => 'Style 4',
					)
				)
				->set_default_value( 'default' )
				->set_help_text( 'Choose style for your contact button.' ),

				// select option to choose position bottom left, bottom right, floating left or floating right.
				Field::make( 'select', 'mm_simwa_position', 'Choose Position' )
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
				->add_options(
					array(
						'none' => 'Display on all devices',
						'768'  => '768px',
						'495'  => '495px',
					)
				)
				->set_default_value( 'none' )
				->set_help_text( 'Hide contact button on screen width below 768px or 495px.' ),

				// Checkbox show greeting or not.
				Field::make( 'checkbox', 'mm_simwa_show_greeting', 'Show Greeting' )
				->set_option_value( 'yes' )
				->set_default_value( true )
				->set_help_text( 'Show greeting text or callout, e.g Selamat datang bosq.' ),

				// Textarea max 100 characters for greeting.
				Field::make( 'textarea', 'mm_simwa_greeting_text', 'Greeting Max Characters' )
				->set_attribute( 'maxLength', '100' )
				->set_default_value( 'Selamat datang di website kami bossQ' )
				->set_help_text( 'Enter max characters for greeting text. e.g selamat datang di website kami bossQ. NOTE: this will work if show greeting is CHECKED!' ),

				// Checkbox to use logo or not.
				Field::make( 'checkbox', 'mm_simwa_use_logo', 'Use Logo' )
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

				// checkbox to show icon.
				Field::make( 'checkbox', 'mm_simwa_show_icon', 'Show Icon' )
				->set_option_value( 'yes' )
				->set_default_value( true )
				->set_help_text( 'Check if you want to Show icon in the button.' ),

				// Call Number.
				Field::make( 'text', 'mm_simwa_call_number', 'Call Number' )
				->set_default_value( '0813-9891-2341' )
				->set_help_text( 'Enter your phone number e.g 0813-9891-2341 or leave it blank if you dont want to show this button' ),

				// Call button text.
				Field::make( 'text', 'mm_simwa_call_btn_text', 'Call Button Text' )
				->set_default_value( 'Call Us' )
				->set_help_text( 'Enter your call button text e.g Call Us' ),

				// Wa Number.
				Field::make( 'text', 'mm_simwa_wa_number', 'WhatsApp Number' )
				->set_default_value( '0813-9891-2341' )
				->set_help_text( 'Enter your WhatsApp number e.g 0813-9891-2341 or leave it blank if you dont want to show this button' ),

				// Wa button text.
				Field::make( 'text', 'mm_simwa_wa_btn_text', 'WhatsApp Button Text' )
				->set_default_value( 'Chat via WhatsApp' )
				->set_help_text( 'Enter your WhatsApp button text e.g Chat via WhatsApp' ),

				// Telegram Number.
				Field::make( 'text', 'mm_simwa_telegram', 'Telegram Number' )
				->set_default_value( '@budi_haryono' )
				->set_help_text( 'Enter your Telegram username e.g @budi_haryono or leave it blank if you dont want to show this button' ),

				// Telegram button text.
				Field::make( 'text', 'mm_simwa_telegram_btn_text', 'Telegram Button Text' )
				->set_default_value( 'Chat via Telegram' )
				->set_help_text( 'Enter your Telegram button text e.g Chat via Telegram' ),

				// Email.
				Field::make( 'text', 'mm_simwa_email', 'Email' )
				->set_default_value( 'Jon@doe.com' )
				->set_help_text( 'Enter your Email address or leave it blank if you dont want to show this button' ),

				// Email button text.
				Field::make( 'text', 'mm_simwa_email_btn_text', 'Email Button Text' )
				->set_default_value( 'Send Email' )
				->set_help_text( 'Enter your email button text e.g Send Email' ),

			)
		);
}
add_action( 'carbon_fields_register_fields', 'mm_simwa_options' );


/**
 * Get DATA
 */
function mm_simwa_get_data() {
	$data = array();

	// Greeting.
	$greeeting = carbon_get_theme_option( 'mm_simwa_greeting' );
	if ( ! empty( $greeeting ) ) {
		$data['greeting'] = $greeeting;
	} else {
		$data['greeting'] = 'Hi admin kamu belum memasukan text greeting.';
	}

	// Email.
	$email = carbon_get_theme_option( 'mm_simwa_email' );
	if ( ! empty( $email ) ) {
		$data['email']      = $email;
		$data['email_link'] = 'mailto:' . $email;
	} else {
		$data['email']      = 'email@email.com';
		$data['email_link'] = 'mailto:email@email.com';
	}

	// mm_simwa_email_btn_text.
	$mm_simwa_email_btn_text = carbon_get_theme_option( 'mm_simwa_email_btn_text' );
	if ( ! empty( $mm_simwa_email_btn_text ) ) {
		if ( carbon_get_theme_option( 'mm_simwa_show_icon' ) ) {
			$icon                   = mm_simwa_get_icon()['email'];
			$data['email_btn_text'] = $icon . ' ' . $mm_simwa_email_btn_text;
		} else {
			$data['email_btn_text'] = $mm_simwa_email_btn_text;
		}
	} else {
		$data['email_btn_text'] = 'Send Email';
	}

	// Telegram.
	$telegram = carbon_get_theme_option( 'mm_simwa_telegram' );
	if ( ! empty( $telegram ) ) {
		$data['telegram']      = $telegram;
		$data['telegram_link'] = 'https://t.me/' . $telegram;
	} else {
		$data['telegram']      = '@budi_haryono';
		$data['telegram_link'] = 'https://t.me/@budi_haryono';
	}

	// mm_simwa_telegram_btn_text.
	$mm_simwa_telegram_btn_text = carbon_get_theme_option( 'mm_simwa_telegram_btn_text' );
	if ( ! empty( $mm_simwa_telegram_btn_text ) ) {
		if ( carbon_get_theme_option( 'mm_simwa_show_icon' ) ) {
			$icon                      = mm_simwa_get_icon()['telegram'];
			$data['telegram_btn_text'] = $icon . ' ' . $mm_simwa_telegram_btn_text;
		} else {
			$data['telegram_btn_text'] = $mm_simwa_telegram_btn_text;
		}
	} else {
		$data['telegram_btn_text'] = 'Chat via Telegram';
	}

	// Call Number.
	$call_number = carbon_get_theme_option( 'mm_simwa_call_number' );
	if ( ! empty( $call_number ) ) {
		$data['call_number']      = $call_number;
		$x                        = substr_replace( $call_number, '62', 0, 1 );
		$x                        = str_replace( array( '-', ' ' ), '', $x );
		$data['call_number_link'] = 'tel:+' . $x;
	} else {
		$data['call_number']      = '0813-9891-2341';
		$data['call_number_link'] = 'tel:+6281398912341';
	}

	$mm_simwa_show_icon = carbon_get_theme_option( 'mm_simwa_show_icon' );

	$mm_simwa_call_btn_text = carbon_get_theme_option( 'mm_simwa_call_btn_text' );
	if ( ! empty( $mm_simwa_call_btn_text ) ) {
		if ( $mm_simwa_show_icon ) {
			$icon                  = mm_simwa_get_icon()['phone'];
			$data['call_btn_text'] = $icon . ' ' . $mm_simwa_call_btn_text;
		} else {
			$data['call_btn_text'] = $mm_simwa_call_btn_text;
		}
	} else {
		$data['call_btn_text'] = 'Call Us';
	}

	// Wa Number.
	$wa_number = carbon_get_theme_option( 'mm_simwa_wa_number' );
	if ( ! empty( $wa_number ) ) {
		$data['wa_number'] = $wa_number;
		$x                 = substr_replace( $wa_number, '62', 0, 1 );
		$x                 = str_replace( array( '-', ' ' ), '', $x );

		if ( carbon_get_theme_option( 'mm_simwa_include_title' ) ) {
			$text_prefix = simwa_text_prefix();
			$post_title  = simwa_post_title();
			$url_prefix  = simwa_url_prefix();
			$post_url    = simwa_post_url();
			$pesan       = $text_prefix . '%20' . $post_title . '%20' . $url_prefix . '%20' . $post_url;
			if ( is_singular() ) {
				$data['wa_number_link'] = 'https://api.whatsapp.com/send?phone=' . $x . '&text=' . $pesan;
			} else {
				$data['wa_number_link'] = 'https://api.whatsapp.com/send?phone=' . $x;
			}
		} else {
			$data['wa_number_link'] = 'https://api.whatsapp.com/send?phone=' . $x;
		}
	} else {
		$data['wa_number']      = '0813-9891-2341';
		$data['wa_number_link'] = 'https://api.whatsapp.com/send?phone=6281398912341';
	}

	$mm_simwa_wa_btn_text = carbon_get_theme_option( 'mm_simwa_wa_btn_text' );
	if ( ! empty( $mm_simwa_wa_btn_text ) ) {
		if ( $mm_simwa_show_icon ) {
			$icon                = mm_simwa_get_icon()['whatsapp'];
			$data['wa_btn_text'] = $icon . ' ' . $mm_simwa_wa_btn_text;
		} else {
			$data['wa_btn_text'] = $mm_simwa_wa_btn_text;
		}
	} else {
		$data['wa_btn_text'] = 'Chat via WhatsApp';
	}

	return $data;
}


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
