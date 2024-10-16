jQuery(document).ready(function($) {
    var mediaUploader;

    // Function to initialize the media uploader
    function initMediaUploader() {
        $('.constra-select-media').off('click').on('click', function(e) {
            e.preventDefault();

            var button = $(this);
            var imageFieldId = button.siblings('.constra-media-url').attr('id'); // Get the corresponding field ID
            var imagePreviewContainer = button.closest('.widget-content').find('.constra-image-preview');


            // If the media uploader already exists, reopen it.
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            // Create a new media uploader instance if it doesn't already exist
            mediaUploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false // Set to true to allow multiple images to be selected
            });

            // When an image is selected, run a callback
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();

                // Update the image preview immediately

                imagePreviewContainer.html('<img src="' + attachment.url + '" style="max-width:100%; height:auto;" />');

                // Update the hidden input field with the selected image URL
                $('#' + imageFieldId).val(attachment.url);

                // Change button text to 'Change Image'
                button.text('Change Image');

                // Enable the save button
                $('.widget-control-save').prop('disabled', false);
            });

            // Open the media uploader dialog
            mediaUploader.open();
        });
    }

    // Call it on page load
    initMediaUploader();

    // Re-initialize when widgets are added or updated dynamically
    $(document).on('widget-added widget-updated', function(event, widget) {
        initMediaUploader(); // Reattach the media uploader functionality for new widgets
    });
});