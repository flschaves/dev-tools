<?php
namespace DevTools;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DevTools {
	/**
	 * The single instance of the class.
	 *
	 * @var DevTools
	 * @since 0.1.0
	 */
	protected static $_instance = null;

	/**
	 * Pages instance.
	 *
	 * @var Pages
	 * @since 0.1.0
	 */
	public $pages = null;

	/**
	 * API instance.
	 *
	 * @var Api
	 * @since 0.1.0
	 */
	public $api = null;

	/**
	 * Core instance.
	 *
	 * @var Core
	 * @since 0.1.0
	 */
	public $core = null;

	/**
	 * Features instance.
	 *
	 * @var Features
	 * @since 0.1.0
	 */
	public $features = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	private function __construct() {
		$this->pages    = new Pages\Pages();
		$this->api      = new Api\Api();
		$this->core     = new Core\Core();
		$this->features = new Features\Features();
	}

	/**
	 * Main DevTools instance.
	 * Ensures only one instance of DevTools is loaded or can be loaded.
	 *
	 * @since 0.1.0
	 *
	 * @return DevTools - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}
