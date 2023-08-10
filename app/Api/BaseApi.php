<?php 
namespace PluginReleases\Api;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class BaseApi {
	/**
	 * ZenHub API URL.
	 *
	 * @since 0.1.0
	 * 
	 * @var string
	 */
	public $apiUrl = '';

	/**
	 * Request headers.
	 *
	 * @since 0.1.0
	 * 
	 * @var array
	 */
	public $headers = [];

	/**
	 * Make a request to the API.
	 *
	 * @since 0.1.0
	 *
	 * @param  string $method   Request method.
	 * @param  string $endpoint Endpoint.
	 * @param  array  $data     Data.
	 * @return array
	 */
	public function __call( $method, $args ) {
		$method   = strtoupper( $method );
		$endpoint = $this->prepareEndpoint( $args[0], $args[1] );
		$data     = isset( $args[2] ) ? $args[2] : [];

		$response = wp_remote_request( $this->apiUrl . '/' . $endpoint, [
			'method'  => $method,
			'headers' => $this->headers,
			'timeout' => 60,
			'body'    => $data,
		] );

		return $response;
	}

	/**
	 * Prepare endpoint.
	 *
	 * @since 0.1.0
	 * @todo  Sanitize the data.
	 *
	 * @param  string $endpoint Endpoint.
	 * @param  array  $data     Data.
	 * @return string           The prepared endpoint.
	 */
	protected function prepareEndpoint( $endpoint, $data = [] ) {
		$endpoint = rtrim( $endpoint, '/\\' );
		$endpoint = ltrim( $endpoint, '/\\' );

		if ( ! empty( $data ) ) {
			foreach ( $data as $key => $value ) {
				$endpoint = str_replace( ':' . $key, $value, $endpoint );
			}
		}

		return $endpoint;
	}
}