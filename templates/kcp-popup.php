<?php
if (!defined('ABSPATH')) {
    exit;
}
$post_url=esc_url(get_permalink($_POST['post_id']));
$post_title=esc_attr(get_the_title($_POST['post_id']));
?>
<style>

    .modal-wrapper {
        position: fixed; /* Ensure it stays in place */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        display: none; /* Hidden by default */
        z-index: 9999; /* Ensure it's above other content */
    }

    .modal-dialog {
        position: relative;
        margin: 5% auto; /* Center the modal */
        width: 80%; /* Adjust width as needed */
        max-width: 600px; /* Maximum width */
    }

    .modal-content {
        background: #fff; /* White background */
        border-radius: 8px; /* Rounded corners */
        overflow: hidden; /* Hide overflow */
    }

    .modal-body {
        padding: 20px; /* Add some padding */
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer; /* Pointer cursor for the close button */
    }

</style>
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
                    <h3>Share Post: <?php echo $post_title; ?></h3>

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
