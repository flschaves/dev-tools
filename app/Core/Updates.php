<?php 
namespace DevTools\Core;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Updates {
	/**
	 * The version option name.
	 *
	 * @var string
	 * @since 0.1.0
	 */
	public $optionName = 'dev_tools_version';

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		if ( wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}

		add_action( 'init', [ $this, 'init' ], 1001 );
		add_action( 'init', [ $this, 'runUpdates' ], 1002 );
		add_action( 'init', [ $this, 'updateLatestVersion' ], 3000 );
	}

	/**
	 * Init.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		$lastVersion = get_option( $this->optionName );

		if ( $lastVersion && '0.0.0' !== $lastVersion ) {
			return;
		}

		$this->createTables();
	}

	/**
	 * Run updates.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function runUpdates() {
		$lastVersion = get_option( $this->optionName );

		if ( version_compare( $lastVersion, '0.1.1', '<' ) ) {
			// Run updates for 0.1.1
		}
	}

	/**
	 * Update latest version.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function updateLatestVersion() {
		$lastVersion = get_option( $this->optionName );

		if ( DEV_TOOLS_VERSION === $lastVersion ) {
			return;
		}

		update_option( $this->optionName, DEV_TOOLS_VERSION );
	}

	/**
	 * Add initial tables.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function createTables() {
		global $wpdb;

		$prefix = $wpdb->prefix . 'dev_tools_';

		// Create table for daily entries.
		$wpdb->query( "CREATE TABLE IF NOT EXISTS {$prefix}daily (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			date DATE NOT NULL,
			description TEXT NOT NULL,
			rd INT(11) DEFAULT 0,
			PRIMARY KEY (id)
		) {$wpdb->get_charset_collate()};" );
	}
}