<?php

namespace DIGITAL_MENU_BOARD\Includes\Triat;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

trait Core {

	use \DIGITAL_MENU_BOARD\Includes\Triat\Metaboxes;

	/**
     * Load init
     *
     * @since v1.0.0
     */
    public function init() {

        // Register custom post
        add_action('init', array( $this, 'register_custom_posts' ) );
        
        // save metxboxes
        add_action( 'save_post', array( $this, 'menu_items_save_metabox'), 1, 2 );

        global $animations, $effects, $currencies;

        $effects = array(
            'zoomOut',
            'zoomIn',
            'panUp',
            'panDown',
            'panLeft',
            'panRight',
            'diagTopLeftToBottomRight',
            'diagTopRightToBottomLeft',
            'diagBottomRightToTopLeft',
            'diagBottomLeftToTopRight'
        );

        $animations = array(
            'Attention Seekers' => array(
                'bounce',
                'flash',
                'pulse',
                'rubberBand',
                'shake',
                'tada',
                'wobble',
                'jello',
                'heartBeat'
            ),
            'Bouncing Entrances' => array(
                'bounceIn',
                'bounceInDown',
                'bounceInLeft',
                'bounceInRight',
                'bounceInUp'
            ),
            'Bouncing Exits' => array(
                'bounceOut',
                'bounceOutDown',
                'bounceOutLeft',
                'bounceOutRight',
                'bounceOutUp'
            ),
            'Fading Entrances' => array(
                'fadeIn',
                'fadeInDown',
                'fadeInDownBig',
                'fadeInLeft',
                'fadeInLeftBig',
                'fadeInRight',
                'fadeInRightBig',
                'fadeInUp',
                'fadeInUpBig'
            ),
            'Fading Exits' => array(
                'fadeOut',
                'fadeOutDown',
                'fadeOutDownBig',
                'fadeOutLeft',
                'fadeOutLeftBig',
                'fadeOutRight',
                'fadeOutRightBig',
                'fadeOutUp',
                'fadeOutUpBig'
            ),
            'Flippers' => array(
                'flip',
                'flipInX',
                'flipInY',
                'flipOutX',
                'flipOutY'
            ),
            'Lightspeed' => array(
                'lightSpeedIn',
                'lightSpeedOut'
            ),
            'Rotating Entrances' => array(
                'rotateIn',
                'rotateInDownLeft',
                'rotateInDownRight',
                'rotateInUpLeft',
                'rotateInUpRight'
            ),
            'Rotating Exits' => array(
                'rotateOut',
                'rotateOutDownLeft',
                'rotateOutDownRight',
                'rotateOutUpLeft',
                'rotateOutUpRight'
            ),
            'Sliding Entrances' => array(
                'slideInUp',
                'slideInDown',
                'slideInLeft',
                'slideInRight'
            ),
            'Sliding Exits' => array(
                'slideOutUp',
                'slideOutDown',
                'slideOutLeft',
                'slideOutRight'
            ),
            'Zoom Entrances' => array(
                'zoomIn',
                'zoomInDown',
                'zoomInLeft',
                'zoomInRight',
                'zoomInUp'
            ),
            'Zoom Exits' => array(
                'zoomOut',
                'zoomOutDown',
                'zoomOutLeft',
                'zoomOutRight',
                'zoomOutUp'
            ),
            'Specials' => array(
                'hinge',
                'jackInTheBox',
                'rollIn',
                'rollOut'
            )
        );

        $currencies = array(
            'United Arab Emirates Dirham' => array(
                'currency_name' =>'United Arab Emirates Dirham', 'currency_symbol' => 'د.إ'
            ),
            'Australian Dollars' => array(
                'currency_name' =>'Australian Dollars', 'currency_symbol' => '$'
            ),
            'Brazilian Real' => array(
                'currency_name' =>'Brazilian Real', 'currency_symbol' => 'R$'
            ),
            'Bulgarian Lev' => array(
                'currency_name' =>'Bulgarian Lev', 'currency_symbol' => 'лв.'
            ),
            'Canadian Dollars' => array(
                'currency_name' =>'Canadian Dollars', 'currency_symbol' => '$'
            ),
            'Chilean Peso' => array(
                'currency_name' =>'Chilean Peso', 'currency_symbol' => '$'
            ),
            'Chinese Yuan' => array(
                'currency_name' =>'Chinese Yuan', 'currency_symbol' => '¥'
            ),
            'Czech Koruna' => array(
                'currency_name' =>'Czech Koruna', 'currency_symbol' => 'Kč'
            ),
            'Danish Krone' => array(
                'currency_name' =>'Danish Krone', 'currency_symbol' => 'kr'
            ),
            'Euros' => array(
                'currency_name' =>'Euros', 'currency_symbol' => '€'
            ),
            'Hong Kong Dollar' => array(
                'currency_name' =>'Hong Kong Dollar', 'currency_symbol' => '$'
            ),
            'Croatia kuna' => array(
                'currency_name' =>'Croatia kuna', 'currency_symbol' => 'Kn'
            ),
            'Hungarian Forint' => array(
                'currency_name' =>'Hungarian Forint', 'currency_symbol' => 'Ft'
            ),
            'Icelandic krona' => array(
                'currency_name' =>'Icelandic krona', 'currency_symbol' => 'Kr.'
            ),
            'Indonesia Rupiah' => array(
                'currency_name' =>'Indonesia Rupiah', 'currency_symbol' => 'Rp'
            ),
            'Indian Rupee' => array(
                'currency_name' =>'Indian Rupee ', 'currency_symbol' => 'Rs.'
            ),
            'Israeli Shekel' => array(
                'currency_name' =>'Israeli Shekel', 'currency_symbol' => '₪'
            ),
            'Japanese Yen' => array(
                'currency_name' =>'Japanese Yen', 'currency_symbol' => '¥'
            ),
            'South Korean Won' => array(
                'currency_name' =>'South Korean Won', 'currency_symbol' => '₩'
            ),
            'Malaysian Ringgits' => array(
                'currency_name' =>'Malaysian Ringgits', 'currency_symbol' => 'RM'
            ),
            'Mexican Peso' => array(
                'currency_name' =>'Mexican Peso', 'currency_symbol' => '$'
            ),
            'Nigerian Naira' => array(
                'currency_name' =>'Nigerian Naira', 'currency_symbol' => '₦'
            ),
            'Norwegian Krone' => array(
                'currency_name' =>'Norwegian Krone', 'currency_symbol' => 'kr'
            ),
            'New Zealand Dollar' => array(
                'currency_name' =>'New Zealand Dollar', 'currency_symbol' => '$'
            ),																	
            'Philippine Pesos' => array(
                'currency_name' =>'Philippine Pesos', 'currency_symbol' => '₱'
            ),
            'Pounds Sterling' => array(
                'currency_name' =>'Pounds Sterling', 'currency_symbol' => '£'
            ),
            'Romanian Leu' => array(
                'currency_name' =>'Romanian Leu', 'currency_symbol' => 'lei'
            ),
            'Russian Ruble' => array(
                'currency_name' =>'Russian Ruble', 'currency_symbol' => 'руб.'
            ),
            'Singapore Dollar' => array(
                'currency_name' =>'Singapore Dollar', 'currency_symbol' => '$'
            ),
            'South African rand' => array(
                'currency_name' =>'South African rand ', 'currency_symbol' => 'R'
            ),
            'Swedish Krona' => array(
                'currency_name' =>'Swedish Krona', 'currency_symbol' => 'kr'
            ),
            'Swiss Franc' => array(
                'currency_name' =>'Swiss Franc', 'currency_symbol' => 'CHF'
            ),
            'Taiwan New Dollars' => array(
                'currency_name' =>'Bulgarian Lev', 'currency_symbol' => 'NT$'
            ),
            'Thai Baht' => array(
                'currency_name' =>'Thai Baht', 'currency_symbol' => '฿'),
            'Turkish Lira' => array(
                'currency_name' =>'Turkish Lira', 'currency_symbol' => 'TL'
            ),
            'US Dollars' => array(
                'currency_name' =>'US Dollars', 'currency_symbol' => '$'
            ),
            'Vietnamese Dong' => array(
                'currency_name' =>'Vietnamese Dong', 'currency_symbol' => '₫'
            )
        );
	}
	
    /**
	 * Redirect to options page
	 *
	 * @since v1.0.0
	 */
	public function redirect_on_activation() {
		if ( get_transient( 'digital_menu_board_do_activation_redirect' ) ) {
			delete_transient( 'digital_menu_board_do_activation_redirect' );
			if ( ! isset( $_GET['activate-multi'] ) ) {
				wp_redirect( 'admin.php?page=digital-menu-board' );
			}
		}
    }

	/**
	 * Set default values
	 *
	 * @since v1.0.0
	 */
    public function set_default_values() {
        
        $container_options = array(
            'width' => '100%',			'height' => '',
            'margin' => array(
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => ''
            )
        );
        
        // create global options for container of digital menu board
        $is_container_options = get_option('dmb_container_global_options');
        if ($is_container_options) :
            update_option('dmb_container_global_options', $container_options);
        else :
            add_option('dmb_container_global_options', $container_options);
        endif;

        $banner_options = array(
			'title_font_color'=> '#fff',
            'title_font_size'=> '50px',
            'title_font_transform'=> '',
            'title_font_weight'=> '',
            'title_font_align'=> '',
            'effect_duration' => '5000',
            'random_effect' => 'on'
        );

        // create global options for banner of digital menu board
        $is_banner_global_options = get_option('banner_global_options');
        if ($is_banner_global_options) :
            update_option('banner_global_options', $banner_options);
        else :
            add_option('banner_global_options', $banner_options);
        endif;

        $menu_options = array(
            'header_font_color' => '#fff',
            'header_font_size' => '2.4rem',
            'header_font_transform' => '',
            'header_font_weight' => '',
            'header_font_align' => '',

            'item_font_color' => '#000',
            'item_font_size' => '1.8rem',
            'item_font_transform' => '',
            'item_font_weight' => '',
            'item_font_align' => '',
            
            'animation' => 'none',
            'animation_delay' => '0.5s',

            'currency' => 'US Dollars',
            'currency_position' => 'left',
            'price_thousand_separator' => ',',
            'price_decimal_separator' => '.',
            'price_number_decimals' => '2'
        );

        // create global options for menu of digital menu board
        $is_menu_global_options = get_option('menu_global_options');
        if ($is_menu_global_options) :
            update_option('menu_global_options', $menu_options);
        else :
            add_option('menu_global_options', $menu_options);
        endif; 

	}   
	
	/**
	 * Register custom posts
	 *
	 * @since v1.0.0
	 */
	public function register_custom_posts() {

        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Digital Menu Board', 'Digital Menu Board', 'twentythirteen' ),
            'singular_name'       => _x( 'Digital Menu Board', 'Digital Menu Board', 'twentythirteen' ),
            'menu_name'           => __( 'Digital Menu Boards', 'twentythirteen' ),
            'parent_item_colon'   => __( 'Parent Digital Menu Board', 'twentythirteen' ),
            'all_items'           => __( 'All Menu Boards', 'twentythirteen' ),
            'view_item'           => __( 'View Menu Board', 'twentythirteen' ),
            'add_new_item'        => __( 'Add New Menu Board', 'twentythirteen' ),
            'add_new'             => __( 'Add New', 'twentythirteen' ),
            'edit_item'           => __( 'Edit Menu Board', 'twentythirteen' ),
            'update_item'         => __( 'Update Menu Board', 'twentythirteen' ),
            'search_items'        => __( 'Search Menu Board', 'twentythirteen' ),
            'not_found'           => __( 'Not Found', 'twentythirteen' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
        );
        
        // Set other options for Custom Post Type
        
        $args = array(
            'label'               => __( 'digital_menu_board', 'twentythirteen' ),
            'description'         => __( 'Digital Menu Board Price Slides', 'twentythirteen' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => false,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'register_meta_box_cb'=> array( $this, 'digital_menu_board_metaboxes' ),
        );
        
        // Registering your Custom Post Type
        register_post_type( 'digital_menu_board', $args );
        
    }

    /**
	 * Save Menu items Metaboxes
	 *
	 * @since v1.0.0
	 */
    public function menu_items_save_metabox( $post_id, $post ) {
        
        if (isset($_POST['menu']) && $post['post_type'] == 'digital_menu_board') {
            // Save our submissions to the database
            update_post_meta( $post->ID, 'menus_data', $_POST['menu'] );
        }
        
    }
    
}