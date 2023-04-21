<?php

/**
 * Definition of all the paths from the plugin
 *
 * @file The paths configuration file
 *
 * @package HMWP\Paths
 */

defined('ABSPATH') || die('Cheatin\' uh?');

$currentDir = dirname(__FILE__);

define('RGRJNR_ADMIN_NAMESPACE', 'rgrjnr');
define('RGRJNR_ADMIN_PLUGIN_FULL_NAME', 'Custom Admin Theme');
define('RGRJNR_ADMIN_ACCOUNT_SITE', 'https://rogerjunior.com');
define('RGRJNR_ADMIN_API_SITE', RGRJNR_ADMIN_ACCOUNT_SITE);
define('RGRJNR_ADMIN_SUPPORT_EMAIL', 'roger@rogerjunior.com');
define('RGRJNR_ADMIN_CHECK_SSL', (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") || (defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN) || (function_exists('is_ssl') && is_ssl())) ? true : false));

/**
 * Directories
 */
define('RGRJNR_ADMIN_ROOT_DIR', realpath($currentDir));
define('RGRJNR_ADMIN_CLASSES_DIR', RGRJNR_ADMIN_ROOT_DIR . '/classes/');
define('RGRJNR_ADMIN_CONTROLLER_DIR', RGRJNR_ADMIN_ROOT_DIR . '/controllers/');
define('RGRJNR_ADMIN_MODEL_DIR', RGRJNR_ADMIN_ROOT_DIR . '/models/');
define('RGRJNR_ADMIN_TRANSLATIONS_DIR', RGRJNR_ADMIN_ROOT_DIR . '/languages/');
define('RGRJNR_ADMIN_ASSETS_DIR', RGRJNR_ADMIN_ROOT_DIR . '/assets/');

/**
 * URLS paths
 */
define('RGRJNR_ADMIN_URL', plugins_url() . '/' . plugin_basename(RGRJNR_ADMIN_ROOT_DIR));
define('RGRJNR_ADMIN_ASSETS_URL', RGRJNR_ADMIN_URL . '/assets/');
define('RGRJNR_ADMIN_WPLOGIN_URL', RGRJNR_ADMIN_URL . 'wplogin/');