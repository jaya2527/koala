<?php
if (!defined('ABSPATH')) {
    exit;
}
global $post;
?>
<div class="post-card-wrapper">
    <div class="post-card-wrp">
        <div class="post-img-col">
            <div class="post-image-wrapper">
                <a href="<?php if (has_post_thumbnail()) : ?>">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else : ?>
                        <img src="<?php echo wp_get_attachment_url( $post->ID) ?>" alt="Default Image">
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <div class="post-cont-col">
            <?php echo do_shortcode("[social_links post_id=$post->ID]") ?>
            <div class="post-details">
                <a href="<?php the_permalink(); ?>"> <!--post url-->
                    <div class="detail">
                        <div class="post-title">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="post-excerpt">
                            <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="post-info">
                <div class="viewers">
                    <p>
                        <span class="post-views"><?php echo $count = get_field('post_field_count', get_the_ID()) ?? 0; ?></span>
                        views</p>
                    <p><span class="post-comments"><?php echo get_comments_number(); ?></span> comments</p>
                </div>
            </div>
        </div>
    </div>
</div>
