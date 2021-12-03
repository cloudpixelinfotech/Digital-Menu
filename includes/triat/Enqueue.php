<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

trait Enqueue {

    public function enqueue_scripts() {

        // digital menu board bootstrap grid css
        wp_enqueue_style( 'digital-menu-board-bootstrap-grid-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/front-end/bootstrap-grid/bootstrap-grid.min.css' );

        // digital menu board banner slideshow css
        wp_enqueue_style( 'digital-menu-board-banner-slideshow-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/front-end/banner-slideshow/css/smoothslides.theme.css' );

        // digital menu board animate css
        wp_enqueue_style( 'digital-menu-board-animate-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/front-end/animate/animate.css' );

        // digital menu board css
        wp_enqueue_style( 'digital-menu-board-css', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/front-end/css/digital-menu-board.css' );

        // digital menu board banner slideshow js
        wp_enqueue_script( 'digital-menu-board-banner-slideshow-js', DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/front-end/banner-slideshow/js/smoothslides-2.1.0.js', array('jquery'), false, false );

    }
}