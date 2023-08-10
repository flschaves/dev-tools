<?php
namespace DevTools\Pages;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Dashboard {
	/**
	 * Get the page title.
	 *
	 * @since 0.1.0
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Dashboard', 'dev-tools' );
	}

	/**
	 * Render the page HTML.
	 *
	 * @since 0.1.0
	 */
	public static function render() {
		echo 'HEY THERE';
	}

	/**
	 * Process the POST request.
	 *
	 * @since 0.1.0
	 *
	 * @param array $post Posted data.
	 */
	public function processPost( $post ) {
	}
}
