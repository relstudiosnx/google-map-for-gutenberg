<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 * Plugin Name: Google Map for Gutenberg Block
 * Description: Simple, draggable map block powered by Google Maps for Gutenberg editor.
 * Author: idesignbucket
 * Author URI: http://idesignbucket.com
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 *
 * Action & Filter Hooks
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
add_action('init', 'idb_init');
add_action('enqueue_block_editor_assets', 'idb_enqueue_block_editor_assets');
add_action('enqueue_block_assets', 'idb_enqueue_block_assets');
add_action('wp_enqueue_scripts', 'idb_enqueue_frontend_assets');
add_action('admin_menu', 'idb_add_admin_menu');
add_filter('block_categories', 'idb_create_block_category');

/**
 *
 * Init Function
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_init() {
  define('IDB_URL',   plugin_dir_url( __FILE__ ));
  define('IDB_PATH',  plugin_dir_path(__FILE__));
  define('IDB_BASE',  plugin_basename(__FILE__));
}

/**
 *
 * Create a gutenberg block category
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_create_block_category($categories) {
  $categories[] = array(
    'slug'  => 'idb-block',
    'title' => esc_html__('Google Map', 'idb-block'),
  );
  return $categories;
}

/**
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_enqueue_block_editor_assets() {
  wp_enqueue_script('idb-blocks-js', IDB_URL .'dist/blocks.build.js', array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'), true );
  wp_enqueue_style('idb-blocks-editor-css', IDB_URL .'dist/blocks.editor.build.css', array('wp-edit-blocks'));
}

/**
 *
 * Enqueue CSS/JS of all the blocks both frontend + backend.
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_enqueue_block_assets() {
  $api_key = get_option('google-map-api');  
  wp_enqueue_style('idb-block-css', IDB_URL . 'dist/blocks.style.build.css', array('wp-editor'));
  wp_enqueue_script('google-map-api-js', '//maps.google.com/maps/api/js?key='.esc_attr($api_key), array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), true);
}

/**
 *
 * Enqueue CSS/JS of all the blocks both frontend
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_enqueue_frontend_assets() {
  wp_enqueue_script('idbub-custom-map-js', IDB_URL . 'assets/js/map.js', array('jquery'), '547657', true);
}

/**
 *
 * Add sub menu under tools
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_add_admin_menu() {
  global $idb_tool_submenu;
  $idb_tool_submenu = add_submenu_page('tools.php', 'Google Map', 'Google Map', 'manage_options', 'google_map', 'idb_main_page_callback');
}

/**
 *
 * The admin page of the plugin
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function idb_main_page_callback() {
  if(!current_user_can('manage_options')) {
    _e('You do not have sufficient permissions to access this page.','idb-block');
    die();
  }

  ?>
  <div class="wrap about-wrap idb-wrap">
    <h1 class="idb-title" style="font-weight:500;"><?php echo esc_html__('Google Map', 'idb-block'); ?></h1>
    <p>Please refer to this article on how to get the google map API Key <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">https://developers.google.com/maps/documentation/javascript/get-api-key</a></p>
    <div class="idb-margin-r-300">
      <div class="idb-tab-box">
        <?php
          if(isset($_POST['idb_save_button']) && isset( $_POST['idb_sample_nonce'] ) && wp_verify_nonce( $_POST['idb_sample_nonce'], 'idb_sample_nonce' )) {
            if(!check_admin_referer('idb_sample_nonce', 'idb_sample_nonce')) { return; }
            update_option('google-map-api', sanitize_text_field($_POST['idb_google_map_api']));
          }
          $google_map_api = get_option('google-map-api');
        ?>

        <form id="idb_form" action="" method="post">
          <?php wp_nonce_field('idb_sample_nonce', 'idb_sample_nonce'); ?>
          <h4 style="margin-bottom: 10px;"><?php echo esc_html__('API Key:', 'idb-block'); ?></h4>
          <input id="idb_google_map_api" type="text" name="idb_google_map_api" style="width:500px;" placeholder="<?php echo esc_html__('Enter your api key...', 'idb-block'); ?>" value="<?php echo esc_attr($google_map_api); ?>" />
          <p class="submit" style="margin-top: 8px;"><input id="idb_save_button" name="idb_save_button" type="submit" class="button-primary" value="Save"/></p>
        </form>

      </div>
    </div>
  </div>
<?php
}
