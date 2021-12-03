<?php
/**
 * The template for displaying digital menu board
 *
 * @package Digital Menu Board
 * @since 1.0.0
 */

    $banners = array();
    if (isset($data) && !empty($data)) {
        $banners = $data;
    }

    // get global settings
    $container_options = get_option('dmb_container_global_options'); 
    $banner_options = get_option('banner_global_options'); 
    $menu_options = get_option('menu_global_options'); 

    if (empty($container_options['width'])) {
        $container_options['width'] = 'auto';
    }
    $container_margin = $container_options['margin'];

    // Menu Currenct Settings
    global $currencies;
    $currency = $currencies[$menu_options['currency']]['currency_symbol'];
    $currency_position = $menu_options['currency_position'];
    $price_thousand_separator = $menu_options['price_thousand_separator'];
    $price_decimal_separator = $menu_options['price_decimal_separator'];
    $price_number_decimals = $menu_options['price_number_decimals'];   

    if ($currency_position == 'left_space') {
        $currency = ' ' . $currency;
    }
    if ($currency_position == 'right_space') {
        $currency = $currency . ' ';
    } 
?>
<style>
	<?php  if (!empty($container_options['height'])) { ?>
        .digital-menu-board .ss-slide-stage {
            height: <?= $container_options['height'] ?> !important;
        }
    <?php } ?>
    .digital-menu-board {
        width: <?= $container_options['width'] ?>;
        margin: <?= (($container_margin['top'] != '') ? $container_margin['top'] : '0') . ' ' . (($container_margin['right'] != '') ? $container_margin['right'] : '0') . ' ' . (($container_margin['bottom'] != '') ? $container_margin['bottom'] : '0') . ' ' . (($container_margin['left'] != '') ? $container_margin['left'] : '0') ?>;
    }
    .pricing-menu-box .pricing-menu-head h5.head-title {
        font-size: <?= $menu_options['header_font_size'] ?>;
        color: <?= $menu_options['header_font_color'] ?>;
        text-transform: <?= $menu_options['header_font_transform'] ?>;
        font-weight: <?= $menu_options['header_font_weight'] ?>;
        text-align: <?= $menu_options['header_font_align'] ?>;
    }
    .pricing-menu-box .pricing-menu-body .item-name, 
    .pricing-menu-box .pricing-menu-body .item-price {
        font-size: <?= $menu_options['item_font_size'] ?>;
        color: <?= $menu_options['item_font_color'] ?>;
        text-transform: <?= $menu_options['item_font_transform'] ?>;
        font-weight: <?= $menu_options['item_font_weight'] ?>;
        text-align: <?= $menu_options['item_font_align'] ?>;
    }
	.ss-title {
        font-size: <?= $banner_options['title_font_color'] ?>;
        color: <?= $banner_options['title_font_color'] ?>;
        text-transform: <?= $banner_options['title_font_transform'] ?>;
        font-weight: <?= $banner_options['title_font_weight'] ?>;
        text-align: <?= $banner_options['title_font_align'] ?>;
    }
</style>

<div id="digital-menu-board-slideshow" class="digital-menu-board bootstrap-wrapper smoothslides">
    <?php 
        $menu = '';
        $index = 0;
        foreach ( $banners as $post ) : setup_postdata($post); 
        $index++;
        // get menu items
        $menus_data = get_post_meta( $post->ID, 'menus_data' ); 
        $menus_data = current($menus_data); 
    ?>
        <img class="banner-img" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="menu-<?php echo $index ?>" data-title="<?php echo the_title(); ?>" data-effect="panUp" />
               
        <?php 

            if (!empty($menus_data) && !empty(array_filter($menus_data))) {
                $menu .= '<div id="menu-'. $index .'" style="display: none;">';

                foreach($menus_data as $menu_key => $menu_items) {
                    
                    $dis_location = $menu_items['display_location'];
                    $dis_location = ((!empty($dis_location) && $dis_location == 'right') ? ' dmb-right' : ' dmb-left');

                    $menu .= '<div class="pricing-menu-box '. $dis_location .'" data-animation="'. $menu_options['animation'] .'" data-delay="'. $menu_options['animation_delay'] .'">
                                <div class="pricing-menu-head row col-md-12">';

                                foreach($menu_items['menu_header'] as $menu_header) {
                                    $menu .= '<h5 class="head-title">'. $menu_header .'</h5>';
                                }
                        $menu .= '</div>';

                        $menu .= '<div class="pricing-menu-body">';
                        foreach($menu_items['menu_item'] as $menu_items_key => $menu_items) {							$menu .= '<div class="row col-md-12">';
                            foreach($menu_items as $key => $value) {
                                if ($key == 0) {
                                    $menu .= '<div class="item-name">'. $value .'</div>';
                                } else {
                                    $menu .= '<div class="item-price '. ((count($menu_items) == ($key+1)) ? 'last' : '') .'">'. (!empty($value) ? (($currency_position == 'left') ? $currency : '') . number_format($value, $price_number_decimals, $price_decimal_separator, $price_thousand_separator) . (($currency_position == 'right') ? $currency : '')  : '') .'</div>';
                                } 
                            }							$menu .= '</div>';
                        }
                        $menu .= '</div>';

                    $menu .= '</div>';
                }

                $menu .= '</div>';
            }
        ?>

    <?php endforeach; ?>

</div>

<!-- Banner Menu Items -->
<?php 

echo $menu; 

add_action('wp_footer', function() use($banner_options) {
    $effect_duration = $banner_options['effect_duration'];     
?>
    <script type="text/javascript">
        (function($) {
            $(window).load( function() {
                $('#digital-menu-board-slideshow').smoothSlides({
                    effectDuration: <?php echo $effect_duration ?>,
                    matchImageSize: true,
                    navigation: false,
                    pagination: false
                });
            });
        })(jQuery);
    </script>
<?php 
});

?>


