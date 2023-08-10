<?php 
namespace DevTools\Core;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Core {
	/**
	 * Cache instance.
	 *
	 * @var Core
	 * @since 0.1.0
	 */
	public $cache = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->cache = new Cache();
	}
}
