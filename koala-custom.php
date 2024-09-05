<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Plugin Name: Koala Custom
 * Description: Custom plugin for Koala
 * Version:     2.0.1
 * Author:      Dev@StableWp
 * Text Domain: koala-custom
*/


if ( ! defined( 'KCP_PLUGIN_DIR' ) ) {
    define( 'KCP_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'KCP_VERSION', '2.0.1' );
    define( 'KCP_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
    define( 'KCP_INCLUDES', plugin_dir_path( __FILE__ ) . '/includes/' );
    define( 'KCP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
    define( 'KCP_TEMPLATES', plugin_dir_path( __FILE__ ) . '/templates/' );
    define( 'KCP_ASSETS', KCP_PLUGIN_URL . '/assets/' );
}

if ( ! class_exists( 'KCP' ) ) {
    include_once( KCP_PLUGIN_DIR . '/includes/class-kcp.php' );
}

function kcp() {
	return KCP::getInstance();
}
register_activation_hook( __FILE__, function (){
    //check dependencies
    $dependencies = array(
        'advanced-custom-fields/acf.php',
    );
    $installed_plugins = get_plugins();
    $active_plugins = get_option('active_plugins');

    //check if the dependencies are installed
    foreach ($dependencies as $dependency) {
        if (!isset($installed_plugins[$dependency])) {
            // deactivate the plugin
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die('This plugin requires the following plugins to be installed and active: ' . implode(', ', $dependencies));
        }
    }

    //check if the dependencies are active
    foreach ($dependencies as $dependency) {
        if (!in_array($dependency, $active_plugins)) {
            // deactivate the plugin
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die('This plugin requires the following plugins to be installed and active: ' . implode(', ', $dependencies));
        }
    }
    return true;
});

$GLOBALS['koala_custom'] = kcp();
