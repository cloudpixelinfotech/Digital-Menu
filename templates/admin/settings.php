<?php 
    global $animations, $effects, $currencies; 
    $container_options = get_option('dmb_container_global_options');
    $menu_options = get_option('menu_global_options');
    $banner_options = get_option('banner_global_options');

    // Container Global Settings
    $width = $container_options['width'];		$height = $container_options['height'];
    $margin = $container_options['margin'];

    // Banner Global Settings
	$banner_title_font_color = $banner_options['title_font_color'];
    $banner_title_font_size = $banner_options['title_font_size'];
    $banner_title_font_transform = $banner_options['title_font_transform'];
    $banner_title_font_weight = $banner_options['title_font_weight'];
    $banner_title_font_align = $banner_options['title_font_align'];
    $banner_effect_duration = $banner_options['effect_duration'];

    // Menu Global Settings
    $menu_animation = $menu_options['animation'];
    $menu_animation_delay = $menu_options['animation_delay'];
    $menu_header_font_size = $menu_options['header_font_size'];
    $header_font_transform = $menu_options['header_font_transform'];
    $header_font_weight = $menu_options['header_font_weight'];
    $header_font_align = $menu_options['header_font_align'];
    $menu_header_font_color = $menu_options['header_font_color'];
    $menu_item_font_size = $menu_options['item_font_size'];
    $menu_item_font_color = $menu_options['item_font_color'];
    $menu_item_font_transform = $menu_options['item_font_transform'];
    $menu_item_font_weight = $menu_options['item_font_weight'];
    $menu_item_font_align = $menu_options['item_font_align'];

    // Menu Currency Settings
    $currency = $menu_options['currency'];
    $currency_position = $menu_options['currency_position'];
    $price_thousand_separator = $menu_options['price_thousand_separator'];
    $price_decimal_separator = $menu_options['price_decimal_separator'];
    $price_number_decimals = $menu_options['price_number_decimals'];

?>
<div id="settings" class="digital-menu-board-settings-tab digital-menu-board-settings">
    <div class="row">
        <div class="col-full">
            <div class="digital-menu-board-page-title digital-menu-board-align-left">
                <h4><?php _e( 'Global Settings' ); ?></h4>
                <p><?php _e( 'For better performance use our customization options for digital board & menu.' ); ?></p>
            </div>
            <div class="digital-menu-board-page-body">
                <table class="settings">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <h5 class="sub-heading">Container</h5>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Container Width
                                <div class="dmb-description">Set the width of your digital menu board container.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="text" id="container_width" name="container[width]" value="<?= $width ?>" />
                                </label>
                            </td>
                        </tr>												<tr class="dmb-item">                            <td class="dmb-name">                                Container Height                                <div class="dmb-description">Set the height of your digital menu board container.</div>                            </td>                            <td class="dmb-value">                                <label>                                    <span class="dmb-short-desc"></span>                                    <input type="text" id="container_height" name="container[height]" value="<?= $height ?>" />                                </label>                            </td>                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Container Margin
                                <div class="dmb-description">Set the margin for the whole digital menu board.</div>
                            </td>
                            <td class="dmb-value multiple-input">
                                <label>
                                    <span class="dmb-short-desc">Top</span>
                                    <input type="text" id="container_margin_top" name="container[margin][top]" value="<?= $margin['top'] ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Right</span>
                                    <input type="text" id="container_margin_right" name="container[margin][right]" value="<?= $margin['right'] ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Bottom</span>
                                    <input type="text" id="container_margin_bottom" name="container[margin][bottom]" value="<?= $margin['bottom'] ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Left</span>
                                    <input type="text" id="container_margin_left" name="container[margin][left]" value="<?= $margin['left'] ?>" />
                                </label>
                            </td>
                        </tr>
                        <!-- Board (Banner) -->
                        <tr>
                            <td colspan="2">
                                <h5 class="sub-heading margin-top-20">Board (Banner)</h5>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Slide Duration
                                <div class="dmb-description">Set slide duration for each banner</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="number" id="effect_duration" name="banner[effect_duration]" value="<?= $banner_effect_duration ?>" /> (in ms)
                                </label>
                            </td>
                        </tr>
						<tr class="dmb-item">
                            <td class="dmb-name"> 
                                Banner Title
                                <div class="dmb-description">Set font styles for menu banner title.</div>
                            </td>
                            <td class="dmb-value multiple-input">
                                <label>
                                    <span class="dmb-short-desc">Color</span>
                                    <input type="text" id="banner_title_font_color" name="banner[title_font_color]" value="<?= $banner_title_font_color ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Size</span>
                                    <input type="text" id="banner_title_font_size" name="banner[title_font_size]" value="<?= $banner_title_font_size ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Transform</span>
                                    <select id="banner_title_font_transform" name="banner[title_font_transform]">
                                        <option value="none" <?= (($banner_title_font_transform == 'none') ? 'selected' : '') ?>>Normal</option>
                                        <option value="capitalize" <?= (($banner_title_font_transform == 'capitalize') ? 'selected' : '') ?>>Capitalize</option>
                                        <option value="uppercase" <?= (($banner_title_font_transform == 'uppercase') ? 'selected' : '') ?>>UPPERCASE</option>
                                        <option value="lowercase" <?= (($banner_title_font_transform == 'lowercase') ? 'selected' : '') ?>>lowercase</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Weight</span>
                                    <select id="banner_title_font_weight" name="banner[title_font_weight]">
                                        <option value="inherit" <?= (($banner_title_font_weight == 'inherit') ? 'selected' : '') ?>>Theme Default</option>
                                        <option value="300" <?= (($banner_title_font_weight == '300') ? 'selected' : '') ?>>Light (300)</option>
                                        <option value="400" <?= (($banner_title_font_weight == '400') ? 'selected' : '') ?>>Normal (400)</option>
                                        <option value="bold" <?= (($banner_title_font_weight == 'bold') ? 'selected' : '') ?>>Bold (700)</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Align</span>
                                    <select id="banner_title_font_align" name="banner[title_font_align]">
                                        <option value="left" <?= (($banner_title_font_align == 'left') ? 'selected' : '') ?>>Left</option>
                                        <option value="center" <?= (($banner_title_font_align == 'center') ? 'selected' : '') ?>>Center</option>
                                        <option value="right" <?= (($banner_title_font_align == 'right') ? 'selected' : '') ?>>Right</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <!-- Menu -->
                        <tr>
                            <td colspan="2">
                                <h5 class="sub-heading margin-top-20">Menu</h5>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Animation
                                <div class="dmb-description">Set animation for all menu items.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <select id="menu_animation" name="menu[animation]">
										<option value="">None</option>
                                        <?php 
                                            foreach ($animations as $group_key => $group_value) {
                                                echo '<optgroup label="'. $group_key .'">';
                                                foreach($group_value as $animation) {
                                                    echo '<option value="'. $animation .'" '. (($menu_animation == $animation) ? 'selected' : '') .'>'. $animation .'</option>';
                                                }
                                                echo '</optgroup>';
                                            } 
                                        ?>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Animation Delay
                                <div class="dmb-description">Set animation delay for all menu items.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="text" id="menu_animation_delay" name="menu[animation_delay]" value="<?= $menu_animation_delay ?>" /> (In sec)
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name"> 
                                Menu Header
                                <div class="dmb-description">Set font styles for menu header.</div>
                            </td>
                            <td class="dmb-value multiple-input">
                                <label>
                                    <span class="dmb-short-desc">Color</span>
                                    <input type="text" id="menu_header_font_color" name="menu[header_font_color]" value="<?= $menu_header_font_color ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Size</span>
                                    <input type="text" id="menu_header_font_size" name="menu[header_font_size]" value="<?= $menu_header_font_size ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Transform</span>
                                    <select id="menu_header_font_transform" name="menu[header_font_transform]">
                                        <option value="none" <?= (($header_font_transform == 'none') ? 'selected' : '') ?>>Normal</option>
                                        <option value="capitalize" <?= (($header_font_transform == 'capitalize') ? 'selected' : '') ?>>Capitalize</option>
                                        <option value="uppercase" <?= (($header_font_transform == 'uppercase') ? 'selected' : '') ?>>UPPERCASE</option>
                                        <option value="lowercase" <?= (($header_font_transform == 'lowercase') ? 'selected' : '') ?>>lowercase</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Weight</span>
                                    <select id="menu_header_font_weight" name="menu[header_font_weight]">
                                        <option value="inherit" <?= (($header_font_weight == 'inherit') ? 'selected' : '') ?>>Theme Default</option>
                                        <option value="300" <?= (($header_font_weight == '300') ? 'selected' : '') ?>>Light (300)</option>
                                        <option value="400" <?= (($header_font_weight == '400') ? 'selected' : '') ?>>Normal (400)</option>
                                        <option value="bold" <?= (($header_font_weight == 'bold') ? 'selected' : '') ?>>Bold (700)</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Align</span>
                                    <select id="menu_header_font_align" name="menu[header_font_align]">
                                        <option value="left" <?= (($header_font_align == 'left') ? 'selected' : '') ?>>Left</option>
                                        <option value="center" <?= (($header_font_align == 'center') ? 'selected' : '') ?>>Center</option>
                                        <option value="right" <?= (($header_font_align == 'right') ? 'selected' : '') ?>>Right</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Menu Items
                                <div class="dmb-description">Set font styles for menu all items.</div>
                            </td>
                            <td class="dmb-value multiple-input">
                                <label>
                                    <span class="dmb-short-desc">Color</span>
                                    <input type="text" id="menu_item_font_color" name="menu[item_font_color]" value="<?= $menu_item_font_color ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Size</span>
                                    <input type="text" id="menu_item_font_size" name="menu[item_font_size]" value="<?= $menu_item_font_size ?>" />
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Transform</span>
                                    <select id="menu_item_font_transform" name="menu[item_font_transform]">
                                        <option value="none" <?= (($menu_item_font_transform == 'none') ? 'selected' : '') ?>>Normal</option>
                                        <option value="capitalize" <?= (($menu_item_font_transform == 'capitalize') ? 'selected' : '') ?>>Capitalize</option>
                                        <option value="uppercase"> <?= (($menu_item_font_transform == 'uppercase') ? 'selected' : '') ?>UPPERCASE</option>
                                        <option value="lowercase" <?= (($menu_item_font_transform == 'lowercase') ? 'selected' : '') ?>>lowercase</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Weight</span>
                                    <select id="menu_item_font_weight" name="menu[item_font_weight]">
                                        <option value="inherit" <?= (($menu_item_font_weight == 'inherit') ? 'selected' : '') ?>>Theme Default</option>
                                        <option value="300" <?= (($menu_item_font_weight == '300') ? 'selected' : '') ?>>Light (300)</option>
                                        <option value="400" <?= (($menu_item_font_weight == '400') ? 'selected' : '') ?>>Normal (400)</option>
                                        <option value="bold" <?= (($menu_item_font_weight == 'bold') ? 'selected' : '') ?>>Bold (700)</option>
                                    </select>
                                </label>
                                <label>
                                    <span class="dmb-short-desc">Align</span>
                                    <select id="menu_item_font_align" name="menu[item_font_align]">
                                        <option value="left" <?= (($menu_item_font_align == 'left') ? 'selected' : '') ?>>Left</option>
                                        <option value="center" <?= (($menu_item_font_align == 'center') ? 'selected' : '') ?>>Center</option>
                                        <option value="right" <?= (($menu_item_font_align == 'right') ? 'selected' : '') ?>>Right</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h5 class="sub-heading margin-top-20">Menu Items Currency</h5>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Currency
                                <div class="dmb-description">Display currency symbol to menu items.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <select id="menu_currency" name="menu[currency]">
                                        <?php foreach ($currencies as $key => $value) { ?>
                                            <option value="<?= $key ?>" <?= (($value['currency_name'] == $currency) ? 'selected' : '') ?>><?= $value['currency_name'] . ' (' . $value['currency_symbol'] . ')' ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Currency Position
                                <div class="dmb-description">Set the position of the currency symbol.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <select id="menu_currency_position" name="menu[currency_position]">
                                        <option value="left" <?= (($currency_position == 'left') ? 'selected' : '') ?>>Left</option>
                                        <option value="right" <?= (($currency_position == 'right') ? 'selected' : '') ?>>Right</option>
                                        <option value="left_space" <?= (($currency_position == 'left_space') ? 'selected' : '') ?>>Left with space</option>
                                        <option value="right_space" <?= (($currency_position == 'right_space') ? 'selected' : '') ?>>Right with space</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Thousand separator
                                <div class="dmb-description">Set the thousand separator of displayed prices.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="text" id="menu_price_thousand_separator" name="menu[price_thousand_separator]" class="small-inout-box" value="<?= $price_thousand_separator ?>" />
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item">
                            <td class="dmb-name">
                                Decimal Separator
                                <div class="dmb-description">Set the decimal separator of displayed prices.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="text" id="menu_price_decimal_separator" name="menu[price_decimal_separator]" class="small-inout-box" value="<?= $price_decimal_separator ?>" />
                                </label>
                            </td>
                        </tr>
                        <tr class="dmb-item multiple-input">
                            <td class="dmb-name">
                                Number Of Decimals
                                <div class="dmb-description">Set the number of decimal points shown in displayed prices.</div>
                            </td>
                            <td class="dmb-value">
                                <label>
                                    <span class="dmb-short-desc"></span>
                                    <input type="number" id="menu_price_number_decimals" name="menu[price_number_decimals]" class="small-inout-box" value="<?= $price_number_decimals ?>" />
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dmb-save-btn-wrap">
            <button type="submit" class="button dmb-btn js-dmb-settings-save"><?php echo __( 'Save settings', 'digital-menu-board' ); ?></button>
        </div>
    </div>
</div>