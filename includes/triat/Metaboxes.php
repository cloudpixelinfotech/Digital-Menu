<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use DIGITAL_MENU_BOARD\Classes\Template_Loader;

trait Metaboxes {

    public function digital_menu_board_metaboxes($post) {

        add_meta_box(
            'pricing_menu',
            __( 'Pricing Menu', 'twentythirteen' ),
            array( $this, 'digital_menu_pricing_metaboxes_callback' ),
            'digital_menu_board',
            'normal',
            'high'
        );
		
    }

    public function digital_menu_board_banner_metaboxes_callback() {

        $fields = array(
            'id' => 'banner-image',
            'name' => 'banner_image',
            'type' => 'image',
            'desc' => '',
            'class' => '',
        );

        $template_loader = new Template_Loader;
        $template_loader->set_template_data( $fields )->get_template_part( 'form-fields/' . $fields['type'] );
    }

    public function digital_menu_pricing_metaboxes_callback($post) {

        $menus_data = get_post_meta( $post->ID, 'menus_data' );

        $fields = array(
            'label' => 'Menu Items',
            'desc'  => 'Digital menu pricing.',
            'id'    => 'menu-items',
            'type'  => 'menus',
            'data' => $menus_data
        );

        $template_loader = new Template_Loader;
        $template_loader->set_template_data( $fields )->get_template_part( 'form-fields/' . $fields['type'] );

    }  

}

