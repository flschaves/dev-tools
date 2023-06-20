<?php
namespace GhStats;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GhStats {

	/**
	 * The single instance of the class.
	 *
	 * @var GhStats
	 * @since 0.1.0
	 */
	protected static $_instance = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
	}

	/**
	 * Main GhStats instance.
	 *
	 * Ensures only one instance of GhStats is loaded or can be loaded.
	 *
	 * @since 0.1.0
	 * @static
	 * @see ghStats()
	 * @return GhStats - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}
