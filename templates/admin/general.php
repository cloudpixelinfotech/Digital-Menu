<div id="general" class="digital-menu-board-settings-tab <?= (($flag) ? '' : 'active') ?>">
    <div class="row">
        <div class="col-full">
            <div class="digital-menu-board-banner">
                <!--<img src="<?php //echo DIGITAL_MENU_BOARD_PLUGIN_URL . '/assets/admin/images/icon-twitter.svg'; ?>" alt="digital-menu-board">-->
                <div class="information-wrap">
                    <h4 class="digital-menu-board-banner-title">Welcome to Digital Menu Board!</h4>
                    <span class="digital-menu-board-banner-info">A simple way to manage your digital menu board...</span>
                </div>
            </div>
            <div class="">
                <p>Use this shortcode to display your digital menu board <br><code>[<?php $shortcode = $this->display_generated_shortcodes(); echo $shortcode; ?>]</code></p>
            </div>
        </div>
    </div>
</div> 