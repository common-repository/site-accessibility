jQuery(document).ready(function($) {
    // Set up the media uploader
    var ifweac_mediaUploader;

    $('#ifweac_upload_image_button').click(function(e) {
        e.preventDefault();

        // If the media uploader already exists, open it
        if (ifweac_mediaUploader) {
            ifweac_mediaUploader.open();
            return;
        }

        // Create the media uploader
        ifweac_mediaUploader = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        // When a file is selected, grab the URL and set it as the text field's value
        ifweac_mediaUploader.on('select', function() {
            var ifweac_attachment = ifweac_mediaUploader.state().get('selection').first().toJSON();
            $('input[name="ifweac_sidebar_icon"]').val(ifweac_attachment.url);
        });

        // Open the media uploader
        ifweac_mediaUploader.open();
    });

    $(document).on('click', ".ifweac_remove-image", function() {
        $(this).parents('.ifweac_sidebar_icon').find('.ifweac_image-wrap').html('');
        $('.ifweac_sidebar_icon_val').val('');
    });
});

//**********************//
// JS for admin ui tabs //
//**********************//
jQuery( function(){
    jQuery("#ifweac_tabs").tabs({
        active: localStorage.getItem("ifweac_access_curIdx"),
        activate: function(event, ui) {
            localStorage.setItem("ifweac_access_curIdx", jQuery(this).tabs('option', 'active'));
        }
    });
});

//***************************//
// JS for colorpicker fields //
//***************************//
jQuery(document).ready(function(jQuery){
    jQuery('.ifweac_links_highlight_color').wpColorPicker();
    jQuery('.ifweac_links_underline_color').wpColorPicker();
    jQuery('.ifweac_highlight_titles_border_color').wpColorPicker();
    jQuery('.ifweac_disability_mode_color').wpColorPicker();
    jQuery('.ifweac_select_sidebar_icon_color').wpColorPicker();

    //jQuery(".iflair_access_sidebar_title").hide();

    if( jQuery('#ifweac_enable_btn_txt').is(':checked') ){
        jQuery(".ifweac_sidebar_title").show();
    }
    else{
        jQuery(".ifweac_sidebar_title").hide();
    }

    if( jQuery('#ifweac_enable_btn_image').is(':checked') ){
        jQuery(".ifweac_sidebar_icon").show();
    }
    else{
        jQuery(".ifweac_sidebar_icon").hide();
    }

    jQuery("#ifweac_enable_btn_txt").click(function() {
        if(jQuery(this).is(":checked")) {
            jQuery(".ifweac_sidebar_title").show(300);
        } else {
            jQuery(".ifweac_sidebar_title").hide(200);
        }
    });

    jQuery("#ifweac_enable_btn_image").click(function() {
        if(jQuery(this).is(":checked")) {
            jQuery(".ifweac_sidebar_icon").show(300);
        } else {
            jQuery(".ifweac_sidebar_icon").hide(200);
        }
    });

});

//*******************************//
// Start JS for fields Hide Show //
//*******************************//
jQuery(function () { 
    // Hide all fields by defualt
    jQuery('.ifweac_add_minimum_font_size').hide();
    jQuery('.ifweac_add_maximum_font_size').hide();
    jQuery('.ifweac_font_size_title').hide();
    jQuery('.ifweac_links_highlighted_color').hide();
    jQuery('.ifweac_links_highlight_text').hide();
    jQuery('.ifweac_links_underlined_color').hide();
    jQuery('.ifweac_links_underline_text').hide();
    jQuery('.ifweac_theme_mode_text').hide();
    jQuery('.ifweac_grayscale_text').hide();
    jQuery('.ifweac_image_magnifier_text').hide();
    jQuery('.ifweac_reset_all_text').hide();
    jQuery('.ifweac_max_min_font_size_val').hide();
    jQuery('.ifweac_text_magnifier_text').hide();
    jQuery('.ifweac_highlight_titles_text').hide();
    jQuery('.ifweac_disability_mode_text').hide();
    jQuery('.ifweac_titles_color_text').hide();
    jQuery('.ifweac_cursor_zoom_text').hide();
    jQuery('.ifweac_highlighted_titles_border_color_btn').hide();
    jQuery('.ifweac_disability_mode_border_color_btn').hide();

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_font_size"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_add_minimum_font_size').fadeIn();
            jQuery('.ifweac_add_maximum_font_size').fadeIn();
            jQuery('.ifweac_font_size_title').fadeIn();
            jQuery('.ifweac_max_min_font_size_val').fadeIn();
        } else {
            jQuery('.ifweac_add_minimum_font_size').hide();
            jQuery('.ifweac_add_maximum_font_size').hide();
            jQuery('.ifweac_font_size_title').hide();
            jQuery('.ifweac_max_min_font_size_val').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_links_highlight"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_links_highlighted_color').fadeIn();
            jQuery('.ifweac_links_highlight_text').fadeIn();
        } else {
            jQuery('.ifweac_links_highlighted_color').hide();
            jQuery('.ifweac_links_highlight_text').hide();
        }
    });

     //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_links_underline"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_links_underlined_color').fadeIn();
            jQuery('.ifweac_links_underline_text').fadeIn();
        } else {
            jQuery('.ifweac_links_underlined_color').hide();
            jQuery('.ifweac_links_underline_text').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_theme_mode"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_theme_mode_text').fadeIn();
        } else {
            jQuery('.ifweac_theme_mode_text').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_grayscale"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_grayscale_text').fadeIn();
        } else {
            jQuery('.ifweac_grayscale_text').hide();
        }
    });

     //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_image_magnifier"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_image_magnifier_text').fadeIn();
        } else {
            jQuery('.ifweac_image_magnifier_text').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_reset_all"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_reset_all_text').fadeIn();
        } else {
            jQuery('.ifweac_reset_all_text').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_text_magnifier"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_text_magnifier_text').fadeIn();
        } else {
            jQuery('.ifweac_text_magnifier_text').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_highlight_titles"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_highlight_titles_text').fadeIn();
            jQuery('.ifweac_highlighted_titles_border_color_btn').fadeIn();
        } else {
            jQuery('.ifweac_highlight_titles_text').hide();
            jQuery('.ifweac_highlighted_titles_border_color_btn').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_disability_mode"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_disability_mode_text').fadeIn();
            jQuery('.ifweac_disability_mode_border_color_btn').fadeIn();
        } else {
            jQuery('.ifweac_disability_mode_text').hide();
            jQuery('.ifweac_disability_mode_border_color_btn').hide();
        }
    });

    //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_titles_color"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_titles_color_text').fadeIn();
        } else {
            jQuery('.ifweac_titles_color_text').hide();
        }
    });

     //show it when the checkbox is clicked
    jQuery('input[name="ifweac_enable_cursor_zoom"]').on('click', function () {
        if (jQuery(this).prop('checked')) {
            jQuery('.ifweac_cursor_zoom_text').fadeIn();
        } else { 
            jQuery('.ifweac_cursor_zoom_text').hide();
        }
    });

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_font_size"]').prop('checked')) {
        jQuery('.ifweac_add_minimum_font_size').show();
        jQuery('.ifweac_add_maximum_font_size').show();
        jQuery('.ifweac_font_size_title').show();
        jQuery('.ifweac_max_min_font_size_val').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_links_highlight"]').prop('checked')) {
        jQuery('.ifweac_links_highlighted_color').show();
        jQuery('.ifweac_links_highlight_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_links_underline"]').prop('checked')) {
        jQuery('.ifweac_links_underlined_color').show();
        jQuery('.ifweac_links_underline_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_theme_mode"]').prop('checked')) {
        jQuery('.ifweac_theme_mode_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_grayscale"]').prop('checked')) {
        jQuery('.ifweac_grayscale_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_reset_all"]').prop('checked')) {
        jQuery('.ifweac_reset_all_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_image_magnifier"]').prop('checked')) {
        jQuery('.ifweac_image_magnifier_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_text_magnifier"]').prop('checked')) {
        jQuery('.ifweac_text_magnifier_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_highlight_titles"]').prop('checked')) {
        jQuery('.ifweac_highlight_titles_text').show();
        jQuery('.ifweac_highlighted_titles_border_color_btn').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_disability_mode"]').prop('checked')) {
        jQuery('.ifweac_disability_mode_text').show();
        jQuery('.ifweac_disability_mode_border_color_btn').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_titles_color"]').prop('checked')) {
        jQuery('.ifweac_titles_color_text').show();
    }

    // Display when if checkbox already clicked
    if(jQuery('input[name="ifweac_enable_cursor_zoom"]').prop('checked')) {
        jQuery('.ifweac_cursor_zoom_text').show();
    }
});
//*****************************//
// End JS for fields Hide Show //
//*****************************//

jQuery(document).ready(function() {
    // Check if image is present
    var ifweac_sidebar_icon = jQuery("input[name='ifweac_sidebar_icon']").val();
    if (ifweac_sidebar_icon !== "") {
        // If image is present, add class to the <tr>
        jQuery("tr.ifweac_sidebar_icon").addClass("image_show");
    }

    // Attach click event to the remove image link
    jQuery(".ifweac_remove-image").on("click", function() {
        // Remove the image source and hide the image
        jQuery("#ifweac_thumb").attr("src", "");
        jQuery(this).hide();

        // Remove the class from <tr>
        jQuery("tr.ifweac_sidebar_icon").removeClass("image_show");
    });
});