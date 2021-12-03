<?php 

if (!empty($data)) {
    $field = $data; 

    ?>

    <div class="dmb-field dmb-create-menus">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" id="create_menu_title" name="create_menu_title" placeholder="Menu Title" />
            </div>
            <div class="form-group">
                <input type="number" id="create_menu_columns" name="create_menu_columns" placeholder="Menu Columns" />
            </div>
            <div class="form-group">
                <select id="create_menu_display_location" name="create_menu_display_location">
                    <option value="">Select Display Location</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
            </div>
            <div class="form-group">
                <a href="#" class="dmb-button button button-primary" data-event="create-menu">Create Menu</a>
            </div>
        </div>
    </div>

    <div class="dmb-field menu-item-tables">
    <?php
    if (!empty(array_filter($field->data))) {
        $menus = current($field->data); 
         
        foreach ($menus as $menu_key => $menu_data) { ?>
                <div class="dmb-table-wrap">
                    <div class="dmb-label">
                        <label><?= ((isset($menu_data['title'])) ? $menu_data['title'] : '' ) ?></label><span>Display Location <b><?= empty($menu_data['display_location']) ? '--' : $menu_data['display_location'] ?></b></span>
                    </div>
                    <input type="hidden" name="menu[<?= $menu_key ?>][title]" value="<?= ((isset($menu_data['title'])) ? $menu_data['title'] : '' ) ?>" />
                    <input type="hidden" name="menu[<?= $menu_key ?>][column]" value="<?= ((isset($menu_data['column'])) ? $menu_data['column'] : '' ) ?>" />
                    <input type="hidden" name="menu[<?= $menu_key ?>][display_location]" value="<?= ((isset($menu_data['display_location'])) ? $menu_data['display_location'] : '' ) ?>" />
                    <table class="dmb-table" data-menu="<?= $menu_key ?>">
                        <thead>
                            <tr>
                                <th class="dmb-row-handle"></th>
                                <?php foreach($menu_data['menu_header'] as $header_key => $header_data) { ?>
                                    <th class="dmb-th"><input type="text" name="menu[<?= $menu_key ?>][menu_header][<?= $header_key ?>]" value="<?= $header_data ?>" /></th>
                                <?php } ?>
                                <th class="dmb-row-handle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($menu_data['menu_item']) && !empty(array_filter($menu_data['menu_item'])) ) { ?>
                                <?php foreach($menu_data['menu_item'] as $menu_item_key => $menu_item) { ?>
                                    <tr class="dmb-row">
                                        <td class="dmb-row-handle order"><span><?= $menu_item_key ?></span></td>
                                        <?php 
                                            foreach($menu_item as $key => $value) {
                                                echo '<td><input type="text" name="menu['. $menu_key .'][menu_item]['. $menu_item_key .']['. $key .']" value="'. $value .'" /></td>';
                                            } 
                                        ?>
                                        <td class="dmb-row-handle remove"><a href="#" data-event="remove-item"><i class="dashicons-before dashicons-minus"></i></a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="dmb-actions">
                        <a href="#" class="dmb-button button button-primary" data-event="add-item" data-column="<?= $menu_data['column'] ?>">Add Row</a>
                    </div>
                </div>
            <?php } ?>
    <?php } ?>
    </div>
<?php
} 



