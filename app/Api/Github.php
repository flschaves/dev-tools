<?php 
namespace DevTools\Api;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Github extends BaseApi {
	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 * @see   https://docs.github.com/en/rest?apiVersion=2022-11-28
	 */
	public function __construct() {
		if ( ! defined( 'DEV_TOOLS_GITHUB_TOKEN' ) || empty( DEV_TOOLS_GITHUB_TOKEN ) ) {
			return;
		}

		$this->apiUrl  = 'https://api.github.com';
		$this->headers = [
			'Authorization' => 'Bearer ' . DEV_TOOLS_GITHUB_TOKEN
		];
	}
}