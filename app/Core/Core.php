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
	 * @var Cache
	 * @since 0.1.0
	 */
	public $cache = null;

	/**
	 * Updates instance.
	 *
	 * @var Updates
	 * @since 0.1.0
	 */
	public $updates = null;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->updates = new Updates();
		$this->cache   = new Cache();
	}
}
