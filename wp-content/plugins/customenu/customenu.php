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

/* 
// Add a menu item under the Settings menu
add_action( 'admin_menu', 'page_selector_menu' );
function page_selector_menu() {
  add_options_page( 'Page Selector Settings', 'Page Selector', 'manage_options', 'page-selector', 'page_selector_options' );
}

// Render the plugin settings page
function page_selector_options() {
  // Retrieve all pages
  $pages = get_pages();
  ?>

  <div class="wrap">
    <h1>Page Selector Settings</h1>

    <h2>Select Pages</h2>
    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
      <input type="hidden" name="action" value="page_selector_save">
      <ul>
        <?php foreach ( $pages as $page ) : ?>
          <li>
            <label>
              <input type="checkbox" name="pages[]" value="<?php echo esc_attr( $page->ID ); ?>">
              <?php echo esc_html( $page->post_title ); ?>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php submit_button( 'Save Pages' ); ?>
    </form>

    <h2>Selected Pages</h2>
    <div id="page-selector-list"></div>
  </div>

  <?php
}

// Handle saving the selected pages
add_action( 'admin_post_page_selector_save', 'page_selector_save' );
function page_selector_save() {
  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'Unauthorized user' );
  }

  if ( empty( $_POST['pages'] ) ) {
    delete_option( 'page_selector_pages' );
  } else {
    $pages = array_map( 'intval', $_POST['pages'] );
    update_option( 'page_selector_pages', $pages );
  }

  wp_redirect( add_query_arg( 'page_selector_message', 'saved' ) );
  exit;
}

// Add the required scripts and styles
add_action( 'admin_enqueue_scripts', 'page_selector_scripts' );
function page_selector_scripts( $hook ) {
  if ( 'settings_page_page-selector' !== $hook ) {
    return;
  }

  wp_enqueue_script( 'jquery-ui-sortable' );
  wp_enqueue_script( 'page-selector-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery', 'jquery-ui-sortable' ), '1.0', true );
  wp_enqueue_style( 'page-selector-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0' );
}

// Render the selected pages using a shortcode
add_shortcode( 'page_selector', 'page_selector_shortcode' );
function page_selector_shortcode( $atts ) {
  $pages = get_option( 'page_selector_pages', array() );

  if ( empty( $pages ) ) {
    return '';
  }

  $output = '<ul class="page-selector">';
  foreach ( $pages as $page_id ) {
    $page = get_post($page_id );
    if ( $page ) {
      $output .= '<li data-page-id="' . esc_attr( $page_id ) . '">' . esc_html( $page->post_title ) . '</li>';
    }
  }
  $output .= '</ul>';
  
  return $output;
}

// Enqueue the jQuery script
function page_selector_enqueue_scripts() {
  wp_enqueue_script( 'jquery-script', plugin_dir_url( __FILE__ ) . 'js/jquery-3.6.3.min.js', array( 'jquery', 'jquery-nestable' ), '1.0', true );
  wp_enqueue_script( 'nestable-script', plugin_dir_url( __FILE__ ) . 'js/jquery.nestable.js', array( 'jquery', 'jquery-nestable' ), '1.0', true );
  wp_enqueue_script( 'page-selector-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery', 'jquery-nestable' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'page_selector_enqueue_scripts' ); */

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