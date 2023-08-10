<?php 
namespace DevTools\Pages;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Pages {
	/**
	 * Admin Area slug.
	 *
	 * @since 0.1.0
	 * 
	 * @var string
	 */
	private $slug = 'dev-tools';

	/**
	 * List of admin area pages.
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	private $pages;

	/**
	 * Class constructor.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		$this->hooks();
		$this->setPages();
	}

	/**
	 * Assign all hooks to proper places.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	protected function hooks() {
		add_action( 'admin_menu', [ $this, 'addMenus' ] );
		add_action( 'admin_init', [ $this, 'processActions' ] );
	}

	/**
	 * Add admin area menu item.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function addMenus() {
		add_menu_page(
			esc_html__( 'Developer Tools', 'dev-tools' ),
			esc_html__( 'Developer Tools', 'dev-tools' ),
			$this->getMenuItemCapability(),
			$this->slug,
			[ $this, 'render' ],
			'dashicons-editor-table',
			$this->getMenuItemPosition()
		);

		foreach ( $this->pages as $slug => $page ) {
			if ( $slug === $this->slug ) {
				continue;
			}

			add_submenu_page(
				$this->slug,
				$page->get_title(),
				$page->get_title(),
				$this->getMenuItemCapability(),
				$slug,
				[ $this, 'render' ]
			);
		}
	}

	/**
	 * Get menu item position.
	 *
	 * @since 0.1.0
	 *
	 * @return int The menu item position.
	 */
	public function getMenuItemPosition() {
		return apply_filters( 'devtools_admin_area_get_menu_item_position', 95 );
	}

	/**
	 * Get menu item capability.
	 *
	 * @since 0.1.0
	 *
	 * @return string The menu item capability.
	 */
	public function getMenuItemCapability() {
		return apply_filters( 'devtools_admin_area_get_menu_item_capability', 'manage_options' );
	}

	/**
	 * Set all admin area pages.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	private function setPages() {
		$this->pages = [
			$this->slug             => new Dashboard(),
			$this->slug . '-github' => new Github(),
			$this->slug . '-daily'  => new Daily()
		];
	}

	/**
	 * Get admin area page instance.
	 *
	 * @since 0.1.0
	 *
	 * @param  string      $slug Page slug.
	 * @return object|bool       Page instance or false if not found.
	 */
	public function getPage( $slug = '' ) {
		if ( empty( $slug ) ) {
			$slug = ! empty( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '';
		}

		if ( isset( $this->pages[ $slug ] ) ) {
			return $this->pages[ $slug ];
		}

		return false;
	}

	/**
	 * Handle POST submits.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function processActions() {
		$page = $this->getPage();

		// Prevent if is not or own page
		if ( ! $page ) {
			return;
		}

		// Process POST only if it exists.
		if ( is_callable( [ $page, 'processPost' ] ) && ! empty( $_POST['devtools'] ) ) {
			$page->processPost( $_POST['devtools'] );
		}
	}

	/**
	 * Render the admin area page.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function render() {
		$page = $this->getPage();

		if ( ! $page ) {
			return;
		}
		?>
			<div class="wrap" id="table-area">
				<h1>
					<?php
					esc_html_e( 'Developer Tools', 'dev-tools' );
					if ( ! empty( $page->get_title() ) ) {
						echo " - {$page->get_title()}";
					}
					?>
				</h1>

				<?php $page->render(); ?>
			</div>
		<?php
	}
}