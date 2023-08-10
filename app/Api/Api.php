<?php 
namespace PluginReleases\Api;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Api {
	/**
	 * Github API instance.
	 *
	 * @since 0.1.0
	 * 
	 * @var Zenhub
	 */
	public $zenhub = null;

	/**
	 * Zenhub API instance.
	 *
	 * @since 0.1.0
	 * 
	 * @var Github
	 */
	public $github = [];

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->zenhub = new Zenhub();
		$this->github = new Github();
	}
}