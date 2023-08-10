<?php 
namespace DevTools\Features;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Features {
	/**
	 * Daily instance.
	 *
	 * @var Daily
	 * @since 0.1.0
	 */
	public $daily = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->daily = new Daily();
	}
}
