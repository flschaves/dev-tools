<?php
namespace GhStats\Admin\Pages;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Auth {
	/**
	 * Get the page title.
	 *
	 * @since 0.1.0
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Authentication', 'gh-stats' );
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
