<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('KCP_Shortcode')) {
    class KCP_Shortcode
    {
        protected static $instance;

        public function __construct()
        {
            add_shortcode('kcp_social_links', [$this, 'render_social_popup']);
            add_shortcode('kcp_latest_posts', [$this, 'render_latest_posts']);
        }

        public static function get_instance()
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function render_latest_posts($atts)
        {
            $atts = shortcode_atts([
                'posts' => 10,
            ], $atts, 'latest_posts');

            $query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => $atts['posts'],
                'orderby'       => 'date',
                'order'         => 'DESC',
            ]);

            ob_start();
            if ($query->have_posts()) {
                echo '<div class="latest-posts">';
                while ($query->have_posts()): $query->the_post();
                    load_template( KCP_TEMPLATES . 'koala-post.php', false );
                endwhile;
                echo '</div>';
            } else {
                echo '<p>No posts found.</p>';
            }
            wp_reset_postdata();
            return ob_get_clean();
        }

        public function render_social_popup($atts){
            global $post;
            $post_id=empty($atts['post_id']) ? $post->ID : $atts['post_id'];
            ?>
            <div class="post-sharing" data-id="<?php echo $post_id ?>"> <!-- post sharing modal -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 256 256">
                    <path fill="#565f73"
                          d="M112 60a16 16 0 1 1 16 16a16 16 0 0 1-16-16Zm16 52a16 16 0 1 0 16 16a16 16 0 0 0-16-16Zm0 68a16 16 0 1 0 16 16a16 16 0 0 0-16-16Z"></path>
                </svg>
            </div>
            <?php
            wp_enqueue_script('kcp-script', KCP_ASSETS . 'kcp-script.js', ['jquery'], null, true);
            wp_localize_script('kcp-script', 'kcp_object',['ajax_url' => admin_url('admin-ajax.php')]);
        }

    }
}