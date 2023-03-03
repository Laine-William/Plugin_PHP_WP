<?php
/**
 * Plugin Name: Page Selector Plugin
 * Description: A plugin to select and organize pages using drag & drop.
 * Version: 1.0
 * Author: Your Name
 * Author URI: http://yourwebsite.com/
 */

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function next_menus_development() {
  add_menu_page("Next Plugin", "Next Plugin", "manage_options", "wp-next-plugin", "next_wp_list_call");
  add_submenu_page("wp-next-plugin", "Liste des menus", "Liste des menus", "manage_options", "wp-next-plugin", "next_wp_list_call");
  add_submenu_page("wp-next-plugin", "Ajouter des menus", "Ajouter des menus", "manage_options", "wp-next-add", "next_wp_add_call");
  add_submenu_page("wp-next-plugin", "Drag and Drop des menus", "Drag and Drop des menus", "manage_options", "wp-next-add-drap-and-drop", "next_wp_add_drap_and_drop_call");
}

add_action("admin_menu", "next_menus_development");

function next_wp_list_call() {
  include_once NEXT_PLUGIN_DIR_PATH . '/views/list-page.php';
}

function next_wp_add_call() {
  include_once NEXT_PLUGIN_DIR_PATH . '/views/add-page.php';
}

function wp_next_add_drap_and_drop_call () {
  include_once NEXT_PLUGIN_DIR_PATH . '/views/add-drap-and-drop-page.php';
}

?>