
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Plugin Name: Koala Custom
 * Description: Custom plugin for Koala
 * Version:     2.0.0
 * Author:      Dev@StableWp
 * Text Domain: koala-custom
*/


if ( ! defined( 'KCP_PLUGIN_DIR' ) ) {
    define( 'KCP_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'KCP_VERSION', '2.0.0' );
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

$GLOBALS['koala_custom'] = kcp();
