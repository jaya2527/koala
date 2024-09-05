<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('KCP')) {
    class KCP
    {
        public static $instacne;
        public $post;
        public $shortcode;
        public $kcp_ajax;

        public function __construct()
        {
            add_action('plugins_loaded', [$this, 'initialize']);
            add_action('wp_enqueue_scripts' , [$this, 'enqueue']);
        }

        public static function getInstance()
        {
            if (self::$instacne === null) {
                self::$instacne = new self();
            }

            return self::$instacne;
        }

        public function initialize()
        {
            $this->includes();
            $this->run();
            $this->init_hooks();

        }

        private function includes()
        {
            include_once(KCP_INCLUDES . 'class-kcp-post.php');
            include_once(KCP_INCLUDES . 'class-kcp-shortcode.php');
            include_once(KCP_INCLUDES . 'class-kcp-ajax.php');
        }

        private function run()
        {
            $this->post = KCP_Post::get_instance();
            $this->shortcode = KCP_Shortcode::get_instance();
            $this->kcp_ajax = KCP_Ajax::get_instance();

        }

        private function init_hooks()
        {

        }

        public function enqueue()
        {
            wp_register_script('kcp-script', KCP_ASSETS.'js/kcp-script.js', array('jquery'), 1.0);
        }

    }
}
