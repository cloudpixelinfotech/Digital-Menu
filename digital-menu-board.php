<?php
/**
 * Plugin Name: Digital Menu Board
 * Description: With Digital Menu Board, Create Awesome Website Digital Menu Board with unlimited customization options.
 * Plugin URI:  https://digitalmenu.cloudpixelinfotech.com/
 * Version:     1.0
 *
 * @package Digital Menu Board
 * Author:      Cloud Pixel
 * Author URI:  https://cloudpixelinfotech.com/
 * Text Domain: digital-menu-board
 */

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Defining plugin constants.
 *
 * @since v1.0.0
 */
define('DIGITAL_MENU_BOARD_PLUGIN_FILE', __FILE__);
define('DIGITAL_MENU_BOARD_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('DIGITAL_MENU_BOARD_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('DIGITAL_MENU_BOARD_PLUGIN_URL', plugins_url('/', __FILE__));
define('DIGITAL_MENU_BOARD_PLUGIN_VERSION', '1.0.0');

/**
 * Including composer autoloader globally.
 *
 * @since v1.0.0
 */
require_once DIGITAL_MENU_BOARD_PLUGIN_PATH . 'autoload.php';

/**
 * Run plugin after all others plugins
 *
 * @since v1.0.0
 */
add_action('plugins_loaded', function () {
    \DIGITAL_MENU_BOARD\Classes\Bootstrap::instance();
});

/**
 * Activation hook
 *
 * @since v1.0.0
 */
register_activation_hook(__FILE__, function () {
    $migration = new \DIGITAL_MENU_BOARD\Classes\Migration;
    $migration->plugin_activation_hook();
});

/**
 * Deactivation hook
 *
 * @since v1.0.0
 */
register_deactivation_hook(__FILE__, function () {
    $migration = new \DIGITAL_MENU_BOARD\Classes\Migration;
    $migration->plugin_deactivation_hook();
});


