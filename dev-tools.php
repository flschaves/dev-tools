<?php
/**
 * Plugin Name:     Developer Tools
 * Plugin URI:      https://flschaves.com/
 * Description:     This is a Developer Tools plugin for improving the development experience.
 * Author:          Filipe Chaves
 * Author URI:      https://flschaves.com
 * Text Domain:     dev-tools
 * Domain Path:     /languages
 * Version:         0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( ! defined( 'DEV_TOOLS_VERSION' ) ) {
	define( 'DEV_TOOLS_VERSION', '0.1.0' );
}
if ( ! defined( 'DEV_TOOLS_DIR' ) ) {
	define( 'DEV_TOOLS_DIR', __DIR__ );
}
if ( ! defined( 'DEV_TOOLS_FILE' ) ) {
	define( 'DEV_TOOLS_FILE', __FILE__ );
}

/**
 * Returns the main instance of DevTools.
 *
 * @since  0.1.0
 * @return DevTools
 */
function devTools() {
	return \DevTools\DevTools::instance();
}

devTools();