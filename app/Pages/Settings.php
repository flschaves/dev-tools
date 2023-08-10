<?php
namespace DevTools\Pages;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings {
	/**
	 * Get the page title.
	 *
	 * @since 0.1.0
	 *
	 * @return string The page title.
	 */
	public function get_title() {
		return esc_html__( 'Settings', 'dev-tools' );
	}

	/**
	 * Render the page HTML.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public static function render() {
		?>
			<form method="post">
				<?php wp_nonce_field( 'dev_tools_settings' ); ?>

				<table class="form-table" role="presentation">
					<tbody>
						<tr class="form-field form-required">
							<th scope="row">
								<label for="seo-settings"><?php esc_html_e( 'Run an action', 'dev-tools' ); ?></label>
							</th>
							<td>
								<select name="dev-tools[run-action]">
									<option value=""><?php esc_html_e( '-', 'dev-tools' ); ?></option>
									<option value="rerun-updates"><?php esc_html_e( 'Rerun updates', 'dev-tools' ); ?></option>
									<option value="recreate-tables"><?php esc_html_e( 'Recreate tables', 'dev-tools' ); ?></option>
								</select>

								<p id="site-admin-email"><?php esc_html_e( 'Choose an action to run.', 'dev-tools' ); ?></p>
							</td>
						</tr>
					</tbody>
				</table>

				<p class="submit">
					<input type="submit" value="<?php esc_attr_e( 'Save Changes', 'dev-tools' ); ?>" class="button button-primary">
				</p>
			</form>
		<?php
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
		check_admin_referer( 'dev_tools_settings' );
		
		if ( ! empty( $post['run-action'] ) ) {
			$this->runAction( $post['run-action'] );
		}
	}

	/**
	 * Run an action.
	 *
	 * @since 0.1.0
	 *
	 * @param  string $action Action to run.
	 * @return void
	 */
	private function runAction( $action ) {
		switch ( $action ) {
			case 'recreate-tables':
				devTools()->core->updates->createTables();
				break;
			case 'rerun-updates':
				update_option( devTools()->core->updates->optionName, '0.0.0' );
				devTools()->core->updates->runUpdates();
				break;
		}
	}
}
