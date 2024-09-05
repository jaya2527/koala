<?php
if (!defined('ABSPATH')) {
    exit;
}
$post_url=esc_url(get_permalink($_POST['post_id']));
$post_title=esc_attr(get_the_title($_POST['post_id']));
?>

<div class="modal-wrapper">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close-btn">
                    <img
                            src="/wp-content/uploads/2024/08/cross-svg.svg"
                            alt="close button"
                    />
                </div>

                <div class="modal-inner-wrp">
                    <h3>Share Post</h3>

                    <div class="sharing-wrp">
                        <div class="facebook-sharing each-item">
                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank">
                                <img
                                        src="/wp-content/uploads/2024/08/facebook-svg.svg"
                                        alt="Facebook"
                                />
                            </a>
                        </div>

                        <div class="twitter-sharing each-item">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank">
                                <img
                                        src="/wp-content/uploads/2024/08/twitter-svg.svg"
                                        alt="Twitter"
                                />
                            </a>
                        </div>

                        <div class="linkedin-sharing each-item">
                            <a href="https://linkedin.com/shareArticle?url=<?php echo $post_url; ?>" target="_blank">
                                <img
                                        src="/wp-content/uploads/2024/08/linkedin-svg.svg"
                                        alt="LinkedIn"
                                />
                            </a>
                        </div>

                        <div class="mail-sharing each-item">
                            <a href="mailto:?subject=<?php echo $post_title; ?>&body=<?php echo $post_url; ?>" target="_blank">
                                <img
                                        src="/wp-content/uploads/2024/08/link-svg.svg"
                                        alt="Email"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
