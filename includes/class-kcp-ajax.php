<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('KCP_Ajax')) {
    class KCP_Ajax
    {
        protected static $instance;

        public function __construct()
        {
            add_action('wp_ajax_kcp_load_popup_content', [$this,'kcp_load_popup_content']);
            add_action('wp_ajax_nopriv_kcp_load_popup_content', [$this,'kcp_load_popup_content']);
        }

        public static function get_instance()
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }

            return self::$instance;
        }
        public function kcp_load_popup_content() {
            ob_start();
            load_template(KCP_TEMPLATES . 'kcp-popup.php');
            $popup_content = ob_get_clean();

            if ($popup_content) {
                echo $popup_content;
            } else {
                error_log('No content loaded for the popup.');
            }

            wp_die();
        }


    }
}
