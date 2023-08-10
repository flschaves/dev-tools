<?php
namespace DevTools\Pages;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Github {
	/**
	 * Get the page title.
	 *
	 * @since 0.1.0
	 *
	 * @return string The page title.
	 */
	public function get_title() {
		return esc_html__( 'Github', 'dev-tools' );
	}

	/**
	 * Render the page HTML.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public static function render() {
		echo 'HEY THERE';
	}

	/**
	 * Process the POST request.
	 *
	 * @since 0.1.0
	 *
	 * @param  array $post Posted data.
	 * @return void
	 */
	public function processPost( $post ) {
	}
}
