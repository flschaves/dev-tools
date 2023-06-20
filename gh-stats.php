<?php
/**
 * Plugin Name:     Github Statistics - For developers
 * Plugin URI:      https://flschaves.com/plugins/gh-stats
 * Description:     This is a Github Statistics plugin for developers
 * Author:          Filipe Chaves
 * Author URI:      https://flschaves.com
 * Text Domain:     gh-stats
 * Domain Path:     /languages
 * Version:         0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( ! defined( 'GHSTATS_VER' ) ) {
	define( 'GHSTATS_VER', '0.1.0' );
}
if ( ! defined( 'GHSTATS_DIR' ) ) {
	define( 'GHSTATS_DIR', __DIR__ );
}
if ( ! defined( 'GHSTATS_FILE' ) ) {
	define( 'GHSTATS_FILE', __FILE__ );
}

/**
 * Returns the main instance of GhStats.
 *
 * @since  0.1.0
 * @return GhStats
 */
function ghStats() {
	return \GhStats\GhStats::instance();
}

ghStats();