<?php 
/*
 * Plugin Name: WPPro Accessibility
 * Description: Our plugin will be usefull to the people who have some eye disability. We are helping them to to change some font size, and color.
 * Plugin URI: https://www.iflair.com
 * Version: 1.1.0
 * Author: iFlair Wordpress Team
 * Author URI: https://www.iflair.com
 * License: GPLv2 or later
 * Text Domain: ifweac-accessibility
 */ 

/*** If this file is called directly, abort ***/
if ( ! defined( 'ABSPATH' ) ) { die(); }

// Define plugin version
define( 'IFWEAC_VERSION' , '1.1.0' );
define( 'IFWEAC_PATH', plugins_url() );
define( 'IFWEAC_FILE', __FILE__ );
define( 'IFWEAC_DIR', dirname(__FILE__));

// Enqueue css files
function ifweac_public_side_style(){
  wp_enqueue_style( 'ifweac_style', plugins_url( '/assets/css/style.css', __FILE__ ), '', IFWEAC_VERSION );
}
add_action('wp_head', 'ifweac_public_side_style');

// Enqueue js files
function ifweac_public_side_script(){	
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'ifweac_custom_js', plugins_url( '/assets/js/public/custom.js', __FILE__ ), 'jQuery', IFWEAC_VERSION, true );  
    $ifweac_nonce = array(
        'nonce'          => wp_create_nonce('ifweac_nonces'),
        'ajaxurl'        => esc_url(admin_url('admin-ajax.php')),
    );
    wp_localize_script( 'ifweac_custom_js', 'ifweac_nonce', $ifweac_nonce );
}
add_action('wp_footer', 'ifweac_public_side_script');

// Enqueue admin css and js
add_action( 'admin_enqueue_scripts', 'ifweac_enqueue_admin_styles' );
function ifweac_enqueue_admin_styles( $hook_suffix ) {
    // Enqueue CSS
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'ifweac_jquery_ui_css', plugins_url( '/assets/css/admin/jquery-ui.css', __FILE__ ), '', IFWEAC_VERSION );
    wp_enqueue_style( 'ifweac_admin_access_style', plugins_url( '/assets/css/admin/style.css', __FILE__ ), '', IFWEAC_VERSION );
    
    // Enqueue JS
    wp_enqueue_media();
    if ( ! wp_script_is( 'jquery', 'enqueued' ) ) {
        // Enqueue jQuery only if it's not already enqueued
        wp_enqueue_script( 'jquery' );
    }
    wp_enqueue_script( 'jquery-ui-core' ); // Enqueue jQuery UI Core
    wp_enqueue_script( 'jquery-ui-tabs' ); // Enqueue jQuery UI Tabs
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'wp-color-picker' ); // Enqueue WP Color Picker
    
    // Enqueue your custom script
    wp_enqueue_script( 'ifweac_my_script', plugins_url( 'assets/js/admin/my-script.js', __FILE__ ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-tabs', 'wp-color-picker' ), false, true );
}

// Include Sidebar template
function ifweac_accessibility_sidebar() {
    $enable_plugin_option = get_option('ifweac_enable_accessibility_plugin');
    if ($enable_plugin_option !== null && sanitize_text_field($enable_plugin_option) == 'yes') {
        // Include template file if not on admin pages or login/register pages
        if (!is_admin() && !ifweac_login_register_page()) {
            include_once IFWEAC_DIR . '/templates/public/sidebar.php';
        }
    }
}
add_action('wp_footer', 'ifweac_accessibility_sidebar');

// Function to check if the current page is a login/register page
function ifweac_login_register_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// Setup plugin menu
add_action('admin_menu', 'ifweac_accessibility_plugin_setup_menu'); 
function ifweac_accessibility_plugin_setup_menu(){
    add_menu_page( esc_html__('WPPro Accessibility', 'ifweac-accessibility'), esc_html__('WPPro Accessibility', 'ifweac-accessibility'), 'manage_options', 'ifweac-accessibility-plugin', 'ifweac_admin_page_html_callback', 'dashicons-universal-access-alt' , 5);
    add_action('admin_init', 'ifweac_plugin_redirect');
}

function ifweac_plugin_redirect() {
  // Check if we are on the specific admin page and no tab parameter is set
  if (isset($_GET['page']) && sanitize_text_field($_GET['page']) === 'ifweac-accessibility-plugin' && !isset($_GET['tab']) && current_user_can('manage_options')) {
    $redirect_url = add_query_arg('tab', 'default', admin_url('admin.php?page=ifweac-accessibility-plugin'));
    $redirect_url = esc_url_raw($redirect_url);
    wp_redirect($redirect_url);
    exit;
  }
}

register_activation_hook( IFWEAC_FILE, 'ifweac_plugin_activation' );
function ifweac_plugin_activation()
{
  // BY DEFAULT WHEN ACTIVE PLUGIN THEN FILL DEFAULT MESSAGE
  $ifweac_success_msg = array(
    'ifweac_enable_accessibility_plugin' => 'yes',
    'ifweac_enable_position' => 'Top Right',
    'ifweac_enable_font_size' => 'yes',
    'ifweac_add_minimum_font_size' => '5',
    'ifweac_add_maximum_font_size' => '5',
    'ifweac_max_min_font_size_val' =>  '1',
    'ifweac_enable_font_color_selection' =>  'yes',
    'ifweac_enable_links_highlight' =>  'yes',
    'ifweac_enable_links_underline' =>  'yes',
    'ifweac_enable_grayscale' => 'yes',
    'ifweac_enable_image_magnifier' => 'yes',
    'ifweac_enable_disability_mode' => 'yes',
    'ifweac_enable_highlight_titles' => 'yes',
    'ifweac_enable_titles_color' => 'yes',
    'ifweac_enable_reset_all' => 'yes'
  );
  foreach ($ifweac_success_msg as $ifweac_key => $ifweac_success_value)
  {
    if (!get_option($ifweac_key)) {
      update_option($ifweac_key, sanitize_text_field($ifweac_success_value));
    }
  }

}
// Admin HTML page
function ifweac_admin_page_html_callback() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) { return; }
  // Get the active tab from the $_GET param
  $ifweac_default_tab = 'default'; 
  $ifweac_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : sanitize_text_field($ifweac_default_tab);
  ?>
  <div class="wrap">
    <!-- Print the page title -->
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">
      <a href="<?php echo esc_url('?page=ifweac-accessibility-plugin&tab=default');?>" class="nav-tab <?php if($ifweac_tab==='default'):?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('Default Settings', 'ifweac-accessibility');?></a>
      <a href="<?php echo esc_url('?page=ifweac-accessibility-plugin&tab=settings')?>" class="nav-tab <?php if($ifweac_tab==='settings'):?>nav-tab-active<?php endif; ?>"><?php echo esc_html__('Advance Settings', 'ifweac-accessibility');?></a>
    </nav>
    <div class="tab-content">
    <?php 
    switch($ifweac_tab) :
      case 'settings': 
      include_once IFWEAC_DIR.'/templates/admin/settings_page_fields.php';
        break;
      case 'default': 
      include_once IFWEAC_DIR.'/templates/admin/default_page_fields.php';
        break;
    endswitch; ?>
    </div>
  </div>
  <?php
}

// Register plugin default settings
function ifweac_common_sanitize($input) {
    return sanitize_text_field($input);
}

function ifweac_default_register_plugin_settings() {
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_enable_accessibility_plugin', 'ifweac_common_sanitize' );
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_title', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_sidebar_title', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_enable_btn_txt', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_enable_btn_image', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_sidebar_icon', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_enable_position', 'ifweac_common_sanitize');
    register_setting('ifweac-default-accessibility-plugin-settings-group', 'ifweac_select_sidebar_icon_color', 'ifweac_common_sanitize');

    if (isset($_REQUEST['page']) && isset($_REQUEST['tab']) && isset($_REQUEST['settings-updated'])) {
        if (sanitize_text_field($_REQUEST['page']) == 'ifweac-accessibility-plugin' && sanitize_text_field($_REQUEST['tab']) == 'default' && sanitize_text_field($_REQUEST['settings-updated']) == 'true') {
            add_settings_error(
                'ifweac-notices',
                'ifweac-success',
                esc_html__('Your settings are saved successfully.', 'ifweac-accessibility'),
                'updated'
            );
        } elseif (sanitize_text_field($_REQUEST['page']) == 'ifweac-accessibility-plugin' && sanitize_text_field($_REQUEST['tab']) == 'default' && sanitize_text_field($_REQUEST['settings-updated']) == 'false') {
            add_settings_error(
                'ifweac-notices',
                'ifweac-error',
                esc_html__('Settings not saved', 'ifweac-accessibility'),
                'error'
            );
        }
    }
}
add_action('admin_init', 'ifweac_default_register_plugin_settings');

// Display success or error messages
function ifweac_admin_notices() {
    settings_errors('ifweac-notices');
}
add_action('admin_notices', 'ifweac_admin_notices');

// Register plugin advanced settings
function ifweac_advanced_register_plugin_settings(){
  // Register Fonts fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_font_size','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_font_size_title','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_add_minimum_font_size','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_add_maximum_font_size','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_max_min_font_size_val','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_font_color_selection','ifweac_common_sanitize');
  // Register links highlight fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_links_highlight','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_links_highlight_color','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_links_highlight_text','ifweac_common_sanitize');
  // Register links underline fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_links_underline','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_links_underline_color','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_links_underline_text','ifweac_common_sanitize');
  // Register theme mode fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_theme_mode','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_theme_mode_text','ifweac_common_sanitize');
  // Register Grayscale images fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_grayscale','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_grayscale_text','ifweac_common_sanitize');
  // Register image magnifier fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_image_magnifier','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_image_magnifier_text','ifweac_common_sanitize');
  // Register text magnifier fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_text_magnifier','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_text_magnifier_text','ifweac_common_sanitize');
  // Register highlights title fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_highlight_titles','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_highlight_titles_text','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_highlight_titles_border_color','ifweac_common_sanitize');
  // Register disability mode fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_disability_mode','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_disability_mode_text','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_disability_mode_color','ifweac_common_sanitize'); 
  // Rgister page titles color
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_titles_color','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_titles_color_text','ifweac_common_sanitize');  
  // Register cursor zoom fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_cursor_zoom','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_cursor_zoom_text','ifweac_common_sanitize');
  // Register reset all button fields
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_enable_reset_all','ifweac_common_sanitize');
  register_setting('ifweac-accessibility-plugin-settings-group', 'ifweac_reset_all_text','ifweac_common_sanitize'); 

  if (isset($_REQUEST['page']) && isset($_REQUEST['tab']) && isset($_REQUEST['settings-updated'])) {
        if (sanitize_text_field($_REQUEST['page']) == 'ifweac-accessibility-plugin' && sanitize_text_field($_REQUEST['tab']) == 'settings' && sanitize_text_field($_REQUEST['settings-updated']) == 'true') {
            add_settings_error(
                'ifweac-notices',
                'ifweac-success',
                esc_html__('Your settings are saved successfully.', 'ifweac-accessibility'),
                'updated'
            );
        } elseif (sanitize_text_field($_REQUEST['page']) == 'ifweac-accessibility-plugin' && sanitize_text_field($_REQUEST['tab']) == 'settings' && sanitize_text_field($_REQUEST['settings-updated']) == 'false') {
            add_settings_error(
                'ifweac-notices',
                'ifweac-error',
                esc_html__('Settings not saved', 'ifweac-accessibility'),
                'error'
            );
        }
    }
}
add_action( 'admin_init', 'ifweac_advanced_register_plugin_settings' );

// Display settings field when plugin acive
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ifweac_plugin_action_links');
function ifweac_plugin_action_links($links) {
    $ifweac_settings = '<a href="' . esc_url(admin_url('admin.php?page=ifweac-accessibility-plugin')) . '">' . esc_html__('Settings', 'ifweac-accessibility') . '</a>';
    array_unshift($links, $ifweac_settings);
    return $links;
}

// Add class in body when plugin activated
function ifweac_plugin_body_class($classes) {
    $classes[] = 'ifweac_accessibility';
    return $classes;
}
add_filter('body_class', 'ifweac_plugin_body_class');

// Load plugin textdomain
add_action('init', 'ifweac_load_textdomain');
function ifweac_load_textdomain() {
    load_plugin_textdomain('ifweac-accessibility', false, dirname(plugin_basename(__FILE__)) . '/languages');
}