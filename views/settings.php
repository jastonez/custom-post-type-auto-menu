<?php
/**
 * The settings page view in Admin
 * http://wp.tutsplus.com/tutorials/theme-development/the-complete-guide-to-the-wordpress-settings-api-part-5-tabbed-navigation-for-your-settings-page/
 * http://wordpress.stackexchange.com/questions/127493/wordpress-settings-api-implementing-tabs-on-custom-menu-page
 *
 * @version 1.1.0
 *
 * @since 1.0.0
 */
?>
<div class="wrap">
    <?php screen_icon(); ?>

    <h2><?php echo __('Custom Post Type Auto Menu', $this->plugin_slug); ?></h2>

    <?php settings_errors(); ?>

    <?php
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'cpt_auto_menu_select_cpt';
    ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=cpt_auto_menu&tab=select_cpt"
           class="nav-tab <?php echo $active_tab == 'select_cpt' ? 'nav-tab-active' : ''; ?>"><?php _e('CPT Settings', $this->plugin_slug); ?></a>

        <?php
        // if custom post type has been chosen display menu tab
        if (get_option('cpt_auto_menu_cpt_list')) {
            ?>

            <a href="?page=cpt_auto_menu&tab=select_menu"
               class="nav-tab <?php echo $active_tab == 'select_menu' ? 'nav-tab-active' : ''; ?>"><?php _e('Menu Settings', $this->plugin_slug); ?></a>

        <?php } ?>
    </h2>

    <form method="post" action="options.php">

        <?php
        if ($active_tab == 'select_cpt') {
            settings_fields('select_cpt_settings');
            do_settings_sections('select_cpt_settings');
        } else if ($active_tab == 'select_menu') {

            settings_fields('select_menu_settings');
            do_settings_sections('select_menu_settings');

        }
        ?>

        <?php @submit_button(__('Save Settings', $this->plugin_slug)); ?>
    </form>

    <br/>
    <br/>
    <br/>
    <br/>

    <hr/>
    <p><a target="_blank" href="http://wordpress.org/plugins/custom-post-type-auto-menu/">
            <?php _e('Custom Post Type Auto Menu', $this->plugin_slug); ?></a>
        <?php _e('version', $this->plugin_slug);
        echo ' ' . $this->version; ?>
        <?php _e('by', $this->plugin_slug); ?>
        <a href="http://badfunproductions.com" target="_blank">Bad Fun Productions</a> -
        <a href="https://github.com/badfun/custom-post-type-auto-menu"
           target="_blank"><?php _e('Please Report Bugs', $this->plugin_slug); ?></a> &middot;
        <?php _e('Follow on Twitter:', $this->plugin_slug); ?>
        <a href="http://twitter.com/badfunpro" target="_blank">BadFun Productions</a></p>

</div>