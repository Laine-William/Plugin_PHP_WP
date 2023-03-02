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
}

add_action("admin_menu", "next_menus_development");

function next_wp_list_call() {
  include_once NEXT_PLUGIN_DIR_PATH . '/views/list-student.php';
}

function next_wp_add_call() {
  include_once NEXT_PLUGIN_DIR_PATH . '/views/add-student.php';
}

function renderMenuItem($id, $label, $url)
{
    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-url="' . $url . '">' .
        '<div class="dd-handle dd3-handle" > Drag</div>' .
        '<div class="dd3-content"><span>' . $label . '</span>' .
        '<div class="item-edit">Edit</div>' .
        '</div>' .
        '<div class="item-settings d-none">' .
        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
        '<p><label for="">Navigation Url<br><input type="text" name="navigation_url" value="' . $url . '"></label></p>' .
        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
        '<a class="item-close" href="javascript:;">Close</a></p>' .
        '</div>';

}

add_action("admin_menu", "renderMenuItem");


function menuTree($parent_id = 0)
{
    global $db;
    $items = '';
    $query = $db->query("SELECT * FROM menu WHERE parent_id = ? ORDER BY id_menu ASC", $parent_id);
    if ($query->numRows() > 0) {
        $items .= '<ol class="dd-list">';
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $items .= renderMenuItem($row['id_menu'], $row['label_menu'], $row['url_menu']);
            $items .= menuTree($row['id_menu']);
            $items .= '</li>';
        }
        $items .= '</ol>';
    }
    return $items;
}

add_action("admin_menu", "menuTree");

?>