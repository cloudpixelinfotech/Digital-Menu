<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

trait Shared {
    
    /**
     * Generate safe url
     *
     * @since v1.0.0
     */
    public function safe_protocol($url) {
        return preg_replace(['/^http:/', '/^https:/', '/(?!^)\/\//'], ['', '', '/'], $url);
    }
}