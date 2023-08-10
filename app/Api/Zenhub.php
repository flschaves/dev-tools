<?php 
namespace DevTools\Api;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Zenhub extends BaseApi {
	/**
	 * Class constructor for Zenhub API.
	 *
	 * @since 0.1.0
	 * @see   https://github.com/ZenHubIO/API
	 */
	public function __construct() {
		if ( ! defined( 'DEV_TOOLS_ZENHUB_TOKEN' ) || empty( DEV_TOOLS_ZENHUB_TOKEN ) ) {
			return;
		}

		$this->apiUrl  = 'https://api.zenhub.com';
		$this->headers = [
			'X-Authentication-Token' => DEV_TOOLS_ZENHUB_TOKEN,
		];
	}
}