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
	 * Admin instance.
	 *
	 * @var Admin
	 * @since 0.1.0
	 */
	public $admin = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->admin = new Admin\Admin();
	}

	/**
	 * Main DevTools instance.
	 *
	 * Ensures only one instance of DevTools is loaded or can be loaded.
	 *
	 * @since 0.1.0
	 * @static
	 * @see devTools()
	 * @return DevTools - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}
