<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use DIGITAL_MENU_BOARD\Classes\Template_Loader;

trait Shortcode {

    // shortcode
    private $shortcode;

    public function generate_shortcodes() {

        $this->shortcode = 'digital_menu_board';

        // register shortcode
        add_shortcode('digital_menu_board', array( $this, 'digital_menu_board_shortcode' ) );
    }

    public function digital_menu_board_shortcode() {

        global $post;
        $banners = $this->get_banners();
        
        $template_loader = new Template_Loader;
        
        if ( $banners ) :
    
            $template_loader->set_template_data( $banners )->get_template_part( 'front-end/digital-board' );
            
        endif;
    
    }

    public function get_banners() {

        $args = array(
            'numberposts' => -1,
            'post_type'   => 'digital_menu_board',
            'post_status' => 'publish',
        );
           
        return get_posts( $args );
    }

    public function display_generated_shortcodes() {
        return $this->shortcode;
    }

}
