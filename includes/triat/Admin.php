<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
} // Exit if accessed directly

use DIGITAL_MENU_BOARD\Classes\Notice;
use \DIGITAL_MENU_BOARD\Includes\Triat\Shortcode;

trait Admin {

    /**
	 * Create an admin menu.
	 *
	 * @since v1.0.0
	 */
    public function admin_menu() {
		add_menu_page(
			__( 'Digital Menu Board', 'Digital Menu Board' ),
			__( 'Digital Menu Board', 'digital-menu-board' ),
			'manage_options',
			'digital-menu-board',
			[ $this, 'digital_menu_board_admin_settings_page' ],
			$this->safe_protocol( DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/images/digital-menu-board-logo.svg' ),
			'58.6'
        );
        add_submenu_page(
            'digital-menu-board',
            __( 'Dashboard', 'Digital Menu Board' ),
            __( 'Dashboard', 'digital-menu-board' ),
            'manage_options',
            'digital-menu-board'
        );
        add_submenu_page(
            'digital-menu-board',
            __( 'All Boards', 'Digital Menu Board' ),
            __( 'All Boards', 'digital-menu-board' ),
            'manage_options',
            'edit.php?post_type=digital_menu_board'
        );
        add_submenu_page(
            'digital-menu-board',
            __( 'New Board', 'Digital Menu Board' ),
            __( 'New Board', 'digital-menu-board' ),
            'manage_options',
            'post-new.php?post_type=digital_menu_board'
        );
    }

    /**
	 * Loading all digital menu board admin scripts
	 *
	 * @since v1.0.0
	 */
	public function admin_enqueue_scripts( $hook ) {
        
        // general css
        wp_enqueue_style( 'digital-menu-board-general-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/css/general.css', false, DIGITAL_MENU_BOARD_PLUGIN_VERSION );

        // common admin js
        wp_enqueue_script( 'digital-menu-board-common-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/js/common.js', array( 'jquery' ), DIGITAL_MENU_BOARD_PLUGIN_VERSION, true );

        if ( isset( $hook ) && $hook == 'toplevel_page_digital-menu-board' ) {
            // admin css
            wp_enqueue_style( 'digital-menu-board-admin-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/css/admin.css', false, DIGITAL_MENU_BOARD_PLUGIN_VERSION );
           
            // admin common & metaboxes js
            wp_enqueue_script( 'digital-menu-board-common-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/js/common.js', array( 'jquery' ), DIGITAL_MENU_BOARD_PLUGIN_VERSION, true );
            
            // admin js
            wp_enqueue_script( 'digital_menu_board-admin-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/js/admin.js', array( 'jquery' ), DIGITAL_MENU_BOARD_PLUGIN_VERSION, true );
            
            // Sweet alert CSS & Js
            wp_enqueue_style('sweetalert2-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/vendor/sweetalert2/css/sweetalert2.min.css', false, DIGITAL_MENU_BOARD_PLUGIN_VERSION);
            wp_enqueue_script('sweetalert2-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/vendor/sweetalert2/js/sweetalert2.min.js', array('jquery', 'sweetalert2-core-js'), DIGITAL_MENU_BOARD_PLUGIN_VERSION, true);
            wp_enqueue_script('sweetalert2-core-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/vendor/sweetalert2/js/core.js', array('jquery'), DIGITAL_MENU_BOARD_PLUGIN_VERSION, true);
            
            wp_localize_script('digital_menu_board-admin-js', 'localize', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('digital-menu-board'),
            ));

            wp_enqueue_style( 'wp-color-picker');
            //
            wp_enqueue_script( 'wp-color-picker');
        }

    }
    
    /**
	 * Create settings page.
	 *
	 * @since v1.0.0
	 */
	public function digital_menu_board_admin_settings_page() {
        $flag = false;
		if (isset($_GET['messages']) && !empty($_GET['messages']))  {
			$flag = true;
		}
        ?>
        <div class="digital-menu-board-settings-wrap">
            <form action="" method="POST" id="dmb-settings" name="dmb-settings">
                <div class="digital-menu-board-header-bar">
					<div class="digital-menu-board-header-left">
						<div class="digital-menu-board-admin-logo-inline">
							<img src="<?php echo DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/images/digital-menu-board-logo.svg'; ?>" alt="digital-menu-board">
						</div>
						<h2 class="title"><?php echo __( 'Digital Menu Board', 'digital-menu-board' ); ?></h2>
					</div>
				</div>
                <div class="digital-menu-board-settings-tabs">
                    <ul class="digital-menu-board-tabs">
                        <li>
                            <a href="#general" class="<?= (($flag) ? '' : 'active') ?>"><img src="<?php echo DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/images/icon-settings.svg'; ?>" alt="digital-menu-board-general-settings"><span><?php echo __( 'General', 'digital-menu-board' ); ?></span></a>
                        </li>
                        <li>
                            <a href="#settings"><img src="<?php echo DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/images/icon-tools.svg'; ?>" alt="digital-menu-board-settings"><span><?php echo __( 'Settings', 'digital-menu-board' ); ?></span></a>
                        </li>
                    </ul>
                    <?php 
                        include_once DIGITAL_MENU_BOARD_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'templates/admin/general.php';
                        include_once DIGITAL_MENU_BOARD_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'templates/admin/settings.php';
                    ?>
                </div>
            </form>
        </div>
        <?php
    }

    /**
     * Saving data with ajax request
     * @param
     * @return  array
     * @since v1.0.0
     */
    public function save_settings() {
        check_ajax_referer('digital-menu-board', 'security');
        
        if (!isset($_POST['fields'])) {
            return;
        }

        parse_str($_POST['fields'], $settings); 
        
        // update container global settings
        $updated = update_option('dmb_container_global_options', $settings['container']);

        // update banner global settings
        $updated = update_option('banner_global_options', $settings['banner']);

        // update menu global settings
        $updated = update_option('menu_global_options', $settings['menu']);

        wp_send_json($updated);
    }

    /**
	 * Create Admin notice.
	 *
	 * @since v1.0.0
	 */    
    public function admin_notice() {

    }

}
