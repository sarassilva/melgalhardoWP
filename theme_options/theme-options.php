<?php 
	/* Página de opções do tema personalizado */

	// Include front end button
    include 'button.php';
	
	class theme_options {
		public function __construct() {
			add_action( 'admin_menu', 'theme_settings_page' );
			add_action( 'admin_init', 'theme_register_settings' );
		}
	}

	function theme_settings_page() {
	    add_theme_page(
	        'Move',
	        'Move',
	        'manage_options',
	        'move',
	        'theme_settings_page_callback',
	        0 // menu position
	      );
	}

	function theme_register_settings() {
		$theme_settings_args = array (
			'sanitize_callback' => 'sanitize_text_field'
		); 

		$theme_fields_options = array(
            'whatsapp_number',
            'whatsapp_status',
            'whatsapp_number_visible',
            'text_help_center',
        );

        foreach ($theme_fields_options as $option) {
            register_setting('theme_fields', $option, $theme_settings_args);
        }

        // Initialize options
    	$whatsapp_number = get_option('whatsapp_number');
		$whatsapp_status = get_option('whatsapp_status');
		$whatsapp_number_visible = get_option('whatsapp_number_visible');
		$text_help_center = get_option('text_help_center');
	}

	function theme_settings_page_callback() {
		// Check access
        if (!current_user_can("manage_options") && !is_admin()) {
            return;
        }

        // Include settings page
            include 'settings.php';
	}

	new theme_options();
?>