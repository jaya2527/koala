<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists( 'KCP_Post' )) {
    class KCP_Post
    {
        protected static $instacne;

        public function __construct()
        {
			add_action('wp_head', [$this, 'set_post_view']);
            add_filter('manage_posts_columns', [$this, 'posts_column_views']);
            add_action('manage_posts_custom_column', [$this, 'posts_custom_column_views'], 10, 2);
        }

        public static function get_instance()
        {
            if (self::$instacne === null) {
                self::$instacne = new self();
            }

            return self::$instacne;
        }

        public function get_post_view($post_id) {
            $count = get_field('post_field_count', $post_id) ?? 0;
            return $count . ' views';
        }

        public function set_post_view() {
	        if (is_singular()){
                $post_id = get_the_ID();;
				$count = (int) get_field('post_field_count', $post_id) ?? 0;
				$count++;
	            update_field('post_field_count', $count, $post_id);
            }
        }

        public function posts_column_views( $columns ) {
            $columns['post_views'] = 'Views';
            return $columns;
        }

        public function posts_custom_column_views( $column, $post_id ) {
            if($column==='post_views'){
                echo $this->get_post_view($post_id);
            }
        }

    }
}
