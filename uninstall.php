<?php
/**
 * Leave no trace...
 * Use this file to remove any elements that have been added by the plugin, including database tables
 * @author BadFun Productions, 2013
 */

// exit if uninstall/delete not called
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN'))
    exit();

// otherwise remove custom table entries
global $wpdb;

$sql = "DELETE FROM `wp_options` WHERE `option_name` IN ( 'select_cpt', 'select_menu', 'select_parent_menu')";

// execute the query
$wpdb->query($sql);

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
