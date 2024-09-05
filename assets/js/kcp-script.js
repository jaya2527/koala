jQuery(document).ready(function($) {
    $(document).on('click', '.post-sharing', function() {

        $.ajax({
            url: kcp_object.ajax_url,
            type: 'POST',
            data: {
                action: 'kcp_load_popup_content',
                post_id: $(this).data('id')
            },
            success: function(response) {
                $('body').append(response);
                $('.modal-wrapper').fadeIn();
            },
            error: function() {
                alert('Something went wrong while loading the popup.');
            }
        });
    });

    $(document).on('click', '.close-btn', function() {
        $('.modal-wrapper').fadeOut(function() {
            $(this).remove();
        });
    });

    $(document).on('click', function(event) {
        if ($(event.target).closest('.modal-dialog').length === 0 && $('.modal-wrapper').is(':visible')) {
            $('.modal-wrapper').fadeOut(function() {
                $(this).remove();
            });
        }
    });
});
