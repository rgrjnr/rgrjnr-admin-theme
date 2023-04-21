<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Roger Junior - Required Plugins
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/RGRJNR/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/plugins/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
 */

require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('rgrjnr_register', 'rgrjnr_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the RGRJNR library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `rgrjnr()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `rgrjnr( $plugins );`.
 * In that case, the RGRJNR default settings will be used.
 *
 * This function is hooked into `rgrjnr_register`, which is fired on the WP `init` action on priority 10.
 */
function rgrjnr_register_required_plugins()
{
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'Security',
			'slug'      => 'hide-my-wp',
			'required'  => true,
		),
		array(
			'name'      => 'Security',
			'slug'      => 'sucuri-scanner',
			'required'  => true,
		),
		array(
			'name'      => 'SSL',
			'slug'      => 'really-simple-ssl',
			'required'  => true,
		),
		array(
			'name'      => 'Redirection',
			'slug'      => 'redirection',
			'required'  => false,
		),
		array(
			'name'      => 'Backup',
			'slug'      => 'updraftplus',
			'required'  => true,
		),
		array(
			'name'      => 'Performance',
			'slug'      => 'w3-total-cache',
			'required'  => true,
		),
		array(
			'name'      => 'Admin Menu',
			'slug'      => 'admin-menu-editor',
			'required'  => true,
		),
		array(
			'name'      => 'SEO',
			'slug'      => 'all-in-one-seo-pack',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Duplicate Post',
			'slug'      => 'duplicate-post',
			'required'  => true,
		),
		array(
			'name'      => 'Google Sit Kit',
			'slug'      => 'google-site-kit',
			'required'  => true,
		),

		array(
			'name'      => 'Cookie Management',
			'slug'      => 'cookie-law-info',
			'required'  => true,
		),

		array(
			'name'      => 'SVG Support',
			'slug'      => 'safe-svg',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * RGRJNR will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make RGRJNR even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'rgrjnr',                 // Unique ID for hashing notices for multiple instances of RGRJNR.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'rgrjnr-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


		'strings'      => array(
			'page_title'                      => __('Install Required Plugins', 'rgrjnr'),
			'menu_title'                      => __('Required Plugins', 'rgrjnr'),
		),
		/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'rgrjnr' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'rgrjnr' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'rgrjnr' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'rgrjnr'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'rgrjnr'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'rgrjnr'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'rgrjnr'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'rgrjnr'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'rgrjnr'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'rgrjnr'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'rgrjnr'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'rgrjnr'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'rgrjnr' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'rgrjnr' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'rgrjnr' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'rgrjnr' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'rgrjnr' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'rgrjnr' ),
			'dismiss'                         => __( 'Dismiss this notice', 'rgrjnr' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'rgrjnr' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'rgrjnr' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/

	);

	rgrjnr($plugins, $config);
}
