// loader;
jQuery(window).on("load", function () {
  setTimeout(() => {
    jQuery("body").attr("id", "pre-loading");
  }, 500);
});
jQuery(document).ready(function () {
  if (jQuery("#ifweac_sidebar").hasClass("right-top")) {
    jQuery(".ifweac_accessibility-menu-wrapper").addClass("right-sidebar");
  }
  if (jQuery("#ifweac_sidebar").hasClass("right-bottom")) {
    jQuery(".ifweac_accessibility-menu-wrapper").addClass("right-sidebar");
  }
  // header-link
  jQuery(".header-nav-main li").click(function () {
    if (jQuery(this).hasClass("current-menu-item")) {
      jQuery(this).removeClass("current-menu-item"); 
    } else {
      jQuery(".header-nav-main li").removeClass("current-menu-item");
      jQuery(this).addClass("current-menu-item"); 
    }
  });
});

/* Sidebar */
const ifweac_sidebar = document.querySelector("#ifweac_sidebar");
const ifweac_sidebarToggler = document.querySelector(".ifweac_sidebar_toggler");
const ifweac_accessibility_menu_wrapper = document.querySelector(
  ".ifweac_accessibility-menu-wrapper"
);

// Toggling the Sidebar
ifweac_sidebarToggler.addEventListener("click", () => {
  ifweac_sidebar.classList.toggle("show");
  ifweac_accessibility_menu_wrapper.classList.toggle("show");
});

//*********************************//
// JS for fonts increase/decrease  //
//*********************************//
// var $iflair_affectedElements = jQuery(
//   "p:not(.iflair_sidebar_toggler), a:not(.iflair_sidebar_toggler), h1:not(.iflair_sidebar_toggler), h2:not(.iflair_sidebar_toggler), h3:not(.iflair_sidebar_toggler), h4:not(.iflair_sidebar_toggler), h5:not(.iflair_sidebar_toggler), h6:not(.iflair_sidebar_toggler), li:not(.iflair_sidebar_toggler), span:not(.iflair_sidebar_toggler), div:not(.iflair_sidebar_toggler)"
// );
var $ifweac_affectedElements = jQuery(
  "p, a, h1, h2, h3, h4, h5, h6, li, div, span"
);

// Fonts increase JS code
jQuery("#ifweac_increase_fonts").click(function () {
  var ifweac_maximum_font_size = jQuery("#ifweac_maximum_font_size").val();
  var ifweac_max_min_font_size_val = jQuery("#ifweac_max_min_font_size_val").val();
  var ifweac_btnPlusAttrFontVal = jQuery(this).attr("increaseFOntSize");
  var ifweac_parseBtnPlusAttrFontVal = parseInt(ifweac_btnPlusAttrFontVal, 10);
  var ifweac_increaseBtnPlusAttrFontVal =
    ifweac_parseBtnPlusAttrFontVal + parseInt(ifweac_max_min_font_size_val);

  if (ifweac_increaseBtnPlusAttrFontVal <= ifweac_maximum_font_size) {
    jQuery("#ifweac_increase_fonts").attr(
      "increaseFOntSize",
      ifweac_increaseBtnPlusAttrFontVal
    );
    var ifweac_decreasefontsize_attr = jQuery("#ifweac_decrease_fonts").attr(
      "decreasefontsize"
    );
    if (ifweac_decreasefontsize_attr > 0) {
      var ifweac_final_val_decreasefontsize_attr =
        parseInt(ifweac_decreasefontsize_attr) -
        parseInt(ifweac_max_min_font_size_val);
      jQuery("#ifweac_decrease_fonts").attr(
        "decreasefontsize",
        ifweac_final_val_decreasefontsize_attr
      );
    }
  }

  if (ifweac_maximum_font_size >= ifweac_increaseBtnPlusAttrFontVal) {
    $ifweac_affectedElements.not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").each(function () {
      var ifweac_currentTagFOnt = "";
      var ifweac_parseCurrentTagFOnt = "";
      var ifweac_finalIncreaseTagFOnt = "";
      var ifweac_currentTagFOnt = jQuery(this).css("font-size");
      var ifweac_parseCurrentTagFOnt = parseInt(ifweac_currentTagFOnt, 10);
      var ifweac_finalIncreaseTagFOnt =
        ifweac_parseCurrentTagFOnt + parseInt(ifweac_max_min_font_size_val);
      jQuery(this).css("font-size", ifweac_finalIncreaseTagFOnt);
    });
  }
});

// Fonts decrese code JS
jQuery("#ifweac_decrease_fonts").click(function () {
  var ifweac_minimum_font_size = jQuery("#ifweac_minimum_font_size").val();
  var ifweac_max_min_font_size_val = jQuery(
    "#ifweac_max_min_font_size_val"
  ).val();
  var ifweac_btnminusAttrFontVal = jQuery(this).attr("decreaseFOntSize");
  var ifweac_parseBtnMinusAttrFontVal = parseInt(ifweac_btnminusAttrFontVal, 10);
  var ifweac_increaseBtnMinusAttrFontVal =
    ifweac_parseBtnMinusAttrFontVal + parseInt(ifweac_max_min_font_size_val);

  if (ifweac_minimum_font_size >= ifweac_increaseBtnMinusAttrFontVal) {
    jQuery("#ifweac_decrease_fonts").attr(
      "decreaseFOntSize",
      ifweac_increaseBtnMinusAttrFontVal
    );

    var ifweac_increasefontsize_attr = jQuery("#ifweac_increase_fonts").attr(
      "increasefontsize"
    );
    if (ifweac_increasefontsize_attr > 0) {
      var ifweac_final_val_increasefontsize_attr =
        parseInt(ifweac_increasefontsize_attr) -
        parseInt(ifweac_max_min_font_size_val);
      jQuery("#ifweac_increase_fonts").attr(
        "increasefontsize",
        ifweac_final_val_increasefontsize_attr
      );
    }
  }

  if (ifweac_minimum_font_size >= ifweac_increaseBtnMinusAttrFontVal) {
    $ifweac_affectedElements.not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").each(function () {
      var ifweac_currentTagFOnt = "";
      var ifweac_parseCurrentTagFOnt = "";
      var ifweac_finalDecreaseTagFOnt = "";
      var ifweac_currentTagFOnt = jQuery(this).css("font-size");
      var ifweac_parseCurrentTagFOnt = parseInt(ifweac_currentTagFOnt, 10);
      var ifweac_finalDecreaseTagFOnt =
        ifweac_parseCurrentTagFOnt - parseInt(ifweac_max_min_font_size_val);
      jQuery(this).css("font-size", ifweac_finalDecreaseTagFOnt);
    });
  }
});

// Storing the original size in a data attribute so size can be reset
$ifweac_affectedElements.each(function () {
  var $this = jQuery(this);
  $this.data("orig-size", $this.css("font-size"));
});

jQuery("#ifweac_btn-orig").click(function () {
  $ifweac_affectedElements.each(function () {
    var $this = jQuery(this);
    $this.css("font-size", $this.data("orig-size"));
    jQuery("#ifweac_increase_fonts").attr("increasefontsize", 0);
    jQuery("#ifweac_decrease_fonts").attr("decreasefontsize", 0);
  });
});

//********************//
// Links underline JS //
//********************//
jQuery(window).load(function() {
  jQuery("#ifweac_links_underline_checkbox").click(function() {
    if (jQuery("#ifweac_links_underline").hasClass("ifweac_underlinebtn")) {
      document.body.classList.remove("ifweac_underline");
      jQuery("#ifweac_links_underline").removeClass("ifweac_underlinebtn");
      jQuery("#ifweac_links_underline .ifweac_switch input[name='ifweac_underline']").prop('checked', false);
      jQuery("a").css("text-decoration", "");
      jQuery("a").css("text-decoration-color", "");
    } else {
      document.body.classList.add("ifweac_underline");
      jQuery("#ifweac_links_underline").addClass("ifweac_underlinebtn");
      jQuery("#ifweac_links_underline .ifweac_switch input[name='ifweac_underline']").prop('checked', true);

      // Exclude a specific div with class "excludeSection"
      jQuery(".ifweac_underline a").not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").css("text-decoration", "underline");

      var ifweac_links_underline_colors = jQuery("#ifweac_links_underline_colors").val();
      if (!ifweac_links_underline_colors) {
          ifweac_links_underline_colors = "#086db3"; // Set default value
      }
      jQuery(".ifweac_underline a").css(
        "text-decoration-color",
        ifweac_links_underline_colors
      );
    }
  });
});

//********************//
// Links highlight JS //
//********************//
jQuery(document).ready(function () {
  jQuery("#ifweac_highlight_links_checkbox").click(function () {
    if (jQuery("#ifweac_highlight_links").hasClass("ifweac_highlight_linksbtn")) {
      jQuery("#ifweac_highlight_links").removeClass("ifweac_highlight_linksbtn");
      jQuery("#ifweac_highlight_links .ifweac_switch input[name='ifweac_highlight']").prop('checked', false);
      jQuery("a").each(function () {
        jQuery(".ifweac_highlight").css("background-color","");
        jQuery(this).removeClass("ifweac_highlight");
        
      });
    } else {
      jQuery("#ifweac_highlight_links").addClass("ifweac_highlight_linksbtn");
      var ifweac_highlight_links_bgcolor = jQuery(
        "#ifweac_links_highlight_colors"
      ).val();
      // Check if the value is blank
      if (!ifweac_highlight_links_bgcolor) {
          ifweac_highlight_links_bgcolor = "#086db3"; // Set default value
      }
      jQuery("#ifweac_highlight_links .ifweac_switch input[name='ifweac_highlight']").prop('checked', true);
      jQuery("a").each(function () {
        jQuery(this).addClass("ifweac_highlight");
        jQuery(".ifweac_highlight").css(
          "background-color",
          ifweac_highlight_links_bgcolor
        );
      });
    }
  });
});

//****************************//
// Background color change JS //
//****************************//
function ifweac_changebackColor() {
  var ifweac_append_html = jQuery("#ifweac_themebgcolor").html();
  if (jQuery("#ifweac_themebgcolor").hasClass("ifweac_backColor")) {
    jQuery("#ifweac_themebgcolor").removeClass("ifweac_backColor");
    jQuery(".ifweac_sidebar_toggler_btn").css({
      "background-color": "",
      "border": "",
    });
    
    var ifweac_dynamic_txt = jQuery("#ifweac_dynamic_theme_mode_txt").val();
    if (ifweac_dynamic_txt === "") {
      jQuery("#ifweac_themebgcolor").html("Theme Mode : Light"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>');  
    } else {
      jQuery("#ifweac__themebgcolor").html(ifweac_dynamic_txt + " : Light"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>');
    }
    
    jQuery("#ifweac_themebgcolor .ifweac_switch input[name='ifweac_themebgcolor']").prop('checked', false);
    
    document.body.style.backgroundColor = "";
    jQuery("a").css("color", "");
    jQuery(".ifweac_sidebar_toggler").css("background-color", "");
    jQuery(".ifweac_sidebar_toggler").css("border", "");
    var $ifweac_affectedcolors = jQuery("p, h1, h2, h3, h4, h5, h6, div, li, span, div"
    );
    $ifweac_affectedcolors.each(function () {
      var $this = jQuery(this);
      $this.data("orig-size", $this.css("color", ""));
    });
   
  } else {
    jQuery("#ifweac_themebgcolor").addClass("ifweac_backColor");
    jQuery(".ifweac_sidebar_toggler_btn").css({
      "background-color": "#000",
      border: "1px solid #fff",
    });
    
    document.body.style.backgroundColor = "#000";
    
    var ifweac_dynamic_txt = jQuery("#ifweac_dynamic_theme_mode_txt").val();
    
    if (ifweac_dynamic_txt === "") {
      jQuery("#ifweac_themebgcolor").html("Theme Mode : Dark"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>');
    } else {
      jQuery("#ifweac_themebgcolor").html(ifweac_dynamic_txt + " : Dark"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>');
    }
    
    jQuery("#ifweac_themebgcolor .ifweac_switch input[name='ifweac_themebgcolor']").prop('checked', true);

    jQuery("a").css("color", "blue");
    // jQuery('.iflair_sidebar_toggler').css("background-color",'#000');
    // jQuery('.iflair_sidebar_toggler').css("border",'1px solid #fff');
    var $ifweac_affectedcolors = jQuery(
      "p, h1, h2, h3, h4, h5, h6, div, li, span, div"
    );
    $ifweac_affectedcolors.each(function () {
      var $this = jQuery(this);
      $this.data("orig-size", $this.css("color", "#fff"));
    });
  }
}

//**************//
// Grayscale JS //
//**************//
jQuery("#ifweac_grayscalebtn_checkbox").click(function () {
  //e.preventDefault();
  if (jQuery("#ifweac_grayscalebtn").hasClass("ifweac_grayscale_class")) {
    jQuery("#ifweac_grayscalebtn").removeClass("ifweac_grayscale_class");
    jQuery("#ifweac_grayscalebtn .ifweac_switch input[name='ifweac_grayscalebtn']").prop('checked', false);
    let imgs = document.getElementsByTagName("img");
    for (let i = 0; i < imgs.length; i++) {
      jQuery("img").each(function () {
        this.style.filter = "revert-layer";
      });
    }
  } else {
    jQuery("#ifweac_grayscalebtn").addClass("ifweac_grayscale_class");
    jQuery("#ifweac_grayscalebtn .ifweac_switch input[name='ifweac_grayscalebtn']").prop('checked', true);
    let imgs = document.getElementsByTagName("img");
    for (let i = 0; i < imgs.length; i++) {
      jQuery("img").each(function () {
        this.style.filter = "grayscale(100%)";
      });
    }
  }
});

//**********************//
// Select Font Color JS //
//**********************//
jQuery(document).ready(function () {
  var ifweac_font_colorPicker = jQuery("#ifweac_select_font_color");
  ifweac_font_colorPicker.on("change", function watchColorPicker() {
    var ifweac_font_color = jQuery(this).val();

    // Exclude a specific div with class "excludeSection"
    jQuery("*").not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").css({ color: ifweac_font_color });

    jQuery("#ifweac_select_font_color").addClass("ifweac_font_color_class");
    jQuery("#ifweac_select_font_color")
      .prev()
      .addClass("ifweac_font_color_span_class");
  });
});

//**************//
// Image Magnifier JS //
//**************//
jQuery("#ifweac_image_maginifier_checkbox").click(function () {
  //e.preventDefault();
  if (jQuery("#ifweac_image_maginifier").hasClass("ifweac_image_maginifier_class")) {
    jQuery("#ifweac_image_maginifier").removeClass("ifweac_image_maginifier_class");
    jQuery("#ifweac_image_maginifier .ifweac_switch input[name='ifweac_maginifier']").prop('checked', false);
    jQuery(".ifweac_magnify").remove();
    jQuery("img").hover(function () {
      jQuery(this).css("cursor", "pointer");
    });
  } else {
    jQuery("#ifweac_image_maginifier").addClass("ifweac_image_maginifier_class");
    jQuery("#ifweac_image_maginifier .ifweac_switch input[name='ifweac_maginifier']").prop('checked', true);
    /*Size is  set in pixels... supports being written as: '250px' */
    var ifweac_magnifierSize = 220;
    /*How many times magnification of image on page.*/
    var ifweac_magnification = 2;
    function ifweac_magnifier() {
      this.magnifyImg = function (ptr, ifweac_magnification, ifweac_magnifierSize) {
        var $ifweac_pointer;
        if (typeof ptr == "string") {
          $ifweac_pointer = jQuery(ptr);
        } else if (typeof ptr == "object") {
          $ifweac_pointer = ptr;
        }
        if (!$ifweac_pointer.is("img")) {
          return false;
        }

        ifweac_magnification = +ifweac_magnification;

        $ifweac_pointer.hover(
          function () {
            jQuery(this).css("cursor", "none");
            jQuery(".ifweac_magnify").show();
            //Setting some variables for later use
            var ifweac_width = jQuery(this).width();
            var ifweac_height = jQuery(this).height();
            var ifweac_src = jQuery(this).attr("src");
            var ifweac_imagePos = jQuery(this).offset();
            var ifweac_image = jQuery(this);

            if (ifweac_magnifierSize == undefined) {
              ifweac_magnifierSize = "150px";
            }

            jQuery(".ifweac_magnify").css({
              "background-size": ifweac_width * ifweac_magnification + "px " + ifweac_height * ifweac_magnification + "px",
              "background-image": 'url("' + ifweac_src + '")',
              width: ifweac_magnifierSize + "px", // Corrected property
              height: ifweac_magnifierSize + "px", // Corrected property
            });

            //Setting a few more...
            var ifweac_magnifyOffset = +(jQuery(".ifweac_magnify").width() / 2);
            var ifweac_rightSide = +(ifweac_imagePos.left + jQuery(this).width());
            var ifweac_bottomSide = +(ifweac_imagePos.top + jQuery(this).height());

            jQuery(document).mousemove(function (e) {
              if (
                e.pageX < +(ifweac_imagePos.left - ifweac_magnifyOffset / 6) ||
                e.pageX > +(ifweac_rightSide + ifweac_magnifyOffset / 6) ||
                e.pageY < +(ifweac_imagePos.top - ifweac_magnifyOffset / 6) ||
                e.pageY > +(ifweac_bottomSide + ifweac_magnifyOffset / 6)
              ) {
                jQuery(".ifweac_magnify").hide();
                jQuery(document).unbind("mousemove");
              }
              var ifweac_backgroundPos = 
              -((e.pageX - ifweac_imagePos.left) * ifweac_magnification - ifweac_magnifyOffset) + "px " +
              -((e.pageY - ifweac_imagePos.top) * ifweac_magnification - ifweac_magnifyOffset) + "px";

              jQuery(".ifweac_magnify").css({
                left: e.pageX - ifweac_magnifyOffset,
                top: e.pageY - ifweac_magnifyOffset,
                "background-position": ifweac_backgroundPos,
              });
            });
          },
          function () {}
        );
      };

      this.init = function () {
        jQuery("body").prepend('<div class="ifweac_magnify"></div>');
      };
      return this.init();
    }

    var ifweac_magnify = new ifweac_magnifier();
    ifweac_magnify.magnifyImg("img", ifweac_magnification, ifweac_magnifierSize);
  }
});
//*******************************//
// Jquery Text magnifier zoom JS //
//*******************************//
jQuery("#ifweac_text_zoom_checkbox").click(function () {
  var $ifweac_affectedElements = jQuery(
    "p, a, h1, h2, h3, h4, h5, h6, li, div"
  );

  if (jQuery("#ifweac_text_zoom").hasClass("ifweac_text_zoom_class")) {
    jQuery("#ifweac_text_zoom").removeClass("ifweac_text_zoom_class");
    jQuery("#ifweac_text_zoom .ifweac_switch input[name='ifweac_textzoom']").prop('checked', false);
    jQuery("*").css("display", "");
    $ifweac_affectedElements.not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").each(function () {
      jQuery(this).hover(
        function () {
          jQuery("body").css("cursor", "");
          jQuery(this).stop();
        },
        function () {
          jQuery(this).stop();
        }
      );
    });
  } else {
    jQuery("#ifweac_text_zoom").addClass("ifweac_text_zoom_class");
    jQuery("#ifweac_text_zoom .ifweac_switch input[name='ifweac_textzoom']").prop('checked', true);
    $ifweac_affectedElements.not(".ifweac_sidebar_toggler.ifweac_right_bottom, .ifweac_sidebar_toggler.ifweac_right_bottom *, .ifweac_accessibility-menu-wrapper, .ifweac_accessibility-menu-wrapper *").each(function () {
      var ifweac_currentsize = parseFloat(jQuery(this).css("font-size"));
      var ifweac_newsize = ifweac_currentsize + 4;

      var ifweac_oldWidth = parseFloat(jQuery(this).css("width"));
      var ifweac_newWidth = ifweac_oldWidth * 1;

      jQuery(this).hover(
        function () {
          //jQuery("body").css('cursor','url(./wp-content/plugins/iflair-wp-accessibility/assets/images/public/zoom_icon1.png), auto');
          jQuery(this).animate({ fontSize: ifweac_newsize, width: ifweac_newWidth }, 200);
        },
        function () {
          jQuery(this).animate({ fontSize: ifweac_currentsize, width: ifweac_oldWidth }, 200);
        }
      );
    });
  }
});
//**************************************//
// jquery for highlight titles h1 to h6 //
//**************************************//
jQuery("#ifweac_highlight_titles_checkbox").click(function () {
  //e.preventDefault();
  var ifweac_highlight_titles_border_color = jQuery("#ifweac_highlight_titles_border_color"
  ).val();
  if (!ifweac_highlight_titles_border_color) {
    ifweac_highlight_titles_border_color = "#086db3"; // Set default value
  }
  if (jQuery("#ifweac_highlight_titles").hasClass("ifweac_highlight_titles_class")) {
    jQuery("#ifweac_highlight_titles .ifweac_switch input[name='ifweac_highlighttitles']").prop('checked', false);
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6").not(".ifweac_sidebar_content h1, .ifweac_sidebar_content h2, .ifweac_sidebar_content h3, .ifweac_sidebar_content h4, .ifweac_sidebar_content h5, .ifweac_sidebar_content h6");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "");
      jQuery("#ifweac_highlight_titles").removeClass("ifweac_highlight_titles_class");
    });
  } else {
    jQuery("#ifweac_highlight_titles .ifweac_switch input[name='ifweac_highlighttitles']").prop('checked', true);
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6").not(".ifweac_sidebar_content h1, .ifweac_sidebar_content h2, .ifweac_sidebar_content h3, .ifweac_sidebar_content h4, .ifweac_sidebar_content h5, .ifweac_sidebar_content h6");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "2px solid");
      jQuery(this).css("border-color", ifweac_highlight_titles_border_color);
      jQuery("#ifweac_highlight_titles").addClass("ifweac_highlight_titles_class");
    });
  }
});

//*************************//
// Highlighted title color //
//*************************//
jQuery(document).ready(function () {
  var ifweac_font_colorPicker = jQuery("#ifweac_highlighted_title_color");
  ifweac_font_colorPicker.on("change", function watchColorPicker() {
    var ifweac_font_color = jQuery(this).val();
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6").not(".ifweac_sidebar_content h1, .ifweac_sidebar_content h2, .ifweac_sidebar_content h3, .ifweac_sidebar_content h4, .ifweac_sidebar_content h5, .ifweac_sidebar_content h6");
    ifweac_elems.each(function () {
      jQuery(this).css("color", ifweac_font_color);
      jQuery("#ifweac_highlighted_title_color").addClass(
        "ifweac_highlighted_title_color_class"
      );
      jQuery("#ifweac_highlighted_title_color")
        .prev()
        .addClass("ifweac_highlighted_title_color_span_class");
    });
  });
});

//********************//
// Jquery zoom cursor //
//********************//
jQuery("#ifweac_zoom_cursor_checkbox").click(function () {
  if (jQuery("#ifweac_zoom_cursor").hasClass("ifweac_zoom_cursor_class")) {
    jQuery("#ifweac_zoom_cursor").removeClass("ifweac_zoom_cursor_class");
    jQuery("#ifweac_zoom_cursor .ifweac_switch input[name='ifweac_zoomcursor']").prop('checked', false);
    jQuery("body").css("cursor", "");
  } else {
    var ifweac_plugins_icon_url = jQuery('#ifweac_access_plugins_icon_url').val();
    jQuery("#ifweac_zoom_cursor").addClass("ifweac_zoom_cursor_class");
    jQuery("#ifweac_zoom_cursor .ifweac_switch input[name='ifweac_zoomcursor']").prop('checked', true);
    jQuery("body").css(
      "cursor",
      "url('" + ifweac_plugins_icon_url + "'), auto"
    );
  }
});

//****************************//
// jquery for Disability Mode //
//****************************//
jQuery("#ifweac_disability_mode_checkbox").click(function () {
  //e.preventDefault();
  var ifweac_disability_mode_color = jQuery("#ifweac_disability_mode_color").val();
  if (!ifweac_disability_mode_color) {
    ifweac_disability_mode_color = "#086db3"; // Set default value
  }
  if (jQuery("#ifweac_disability_mode").hasClass("ifweac_disability_mode_class")) {
     jQuery("#ifweac_disability_mode .ifweac_switch input[name='ifweac_disability']").prop('checked', false);
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6").not(".ifweac_sidebar_content h1, .ifweac_sidebar_content h2, .ifweac_sidebar_content h3, .ifweac_sidebar_content h4, .ifweac_sidebar_content h5, .ifweac_sidebar_content h6");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "");
      jQuery(this).css("border-radius", "");
      jQuery(this).css("padding", "");
      jQuery("#ifweac_disability_mode").removeClass("ifweac_disability_mode_class");
    });
  } else {
     jQuery("#ifweac_disability_mode .ifweac_switch input[name='ifweac_disability']").prop('checked', true);
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6").not(".ifweac_sidebar_content h1, .ifweac_sidebar_content h2, .ifweac_sidebar_content h3, .ifweac_sidebar_content h4, .ifweac_sidebar_content h5, .ifweac_sidebar_content h6");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "2px solid #000");
      jQuery(this).css("border-color", ifweac_disability_mode_color);
      jQuery(this).css("border-radius", "14px");
      jQuery(this).css("padding", "5px");
      jQuery("#ifweac_disability_mode").addClass("ifweac_disability_mode_class");
    });
  }
});

//***************//
// Reset Data JS //
//***************//
function ifweac_resetbtn() {
  // fonts reset code
  jQuery("#ifweac_links_underline_checkbox,#ifweac_highlight_links_checkbox,#ifweac_themebgcolor_checkbox,#ifweac_grayscalebtn_checkbox,#ifweac_image_maginifier_checkbox,#ifweac_text_zoom_checkbox,#ifweac_disability_mode_checkbox,#ifweac_zoom_cursor_checkbox,#ifweac_highlight_titles_checkbox").prop('checked', false);
  var $ifweac_affectedElements = jQuery(
    "p, a, h1, h2, h3, h4, h5, h6, li, span, div"
  );
  $ifweac_affectedElements.each(function () {
    var $this = jQuery(this);
    $this.css("font-size", $this.data("orig-size"));
    jQuery("#ifweac_increase_fonts").attr("increasefontsize", 0);
    jQuery("#ifweac_decrease_fonts").attr("decreasefontsize", 0);
  });

  // remove underline links code
  if (jQuery("#ifweac_links_underline").hasClass("ifweac_underlinebtn")) {
    document.body.classList.remove("ifweac_underline");
    jQuery("#ifweac_links_underline").removeClass("ifweac_underlinebtn");
    jQuery("a").css("text-decoration", "");
    jQuery("a").css("text-decoration-color", "");
  }

  // remove highlighted links
  if (jQuery("#ifweac_highlight_links").hasClass("ifweac_highlight_linksbtn")) {
    jQuery("#ifweac_highlight_links").removeClass("ifweac_highlight_linksbtn");
    jQuery("a").each(function () {
      jQuery(".ifweac_highlight").css("background-color","");
      jQuery(this).removeClass("ifweac_highlight");      
    });
  }

  // Reset Background colors
  if (jQuery("#ifweac_themebgcolor").hasClass("ifweac_backColor")) {
    jQuery("#ifweac_themebgcolor").removeClass("ifweac_backColor");
    jQuery(".ifweac_sidebar_toggler_btn").css({
      "background-color": "",
      border: "",
    });

    var ifweac_dynamic_txt = jQuery("#ifweac_dynamic_theme_mode_txt").val();
    if (ifweac_dynamic_txt === "") {
      jQuery("#ifweac_themebgcolor").html("Theme Mode : Light"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>'); 
    } else {
      jQuery("#ifweac_themebgcolor").html(ifweac_dynamic_txt + " : Light"+'<label class="ifweac_switch"><input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()"><span class="ifweac_slider ifweac_round"></span></label>');
    }

    jQuery(".ifweac_sidebar_toggler").css("background-color", "");
    jQuery(".ifweac_sidebar_toggler").css("border", "");
    document.body.style.backgroundColor = "";
    jQuery("a").css("color", "");
    var $ifweac_affectedcolors = jQuery(
      "p, h1, h2, h3, h4, h5, h6, div, li, span, div"
    );
    $ifweac_affectedcolors.each(function () {
      var $this = jQuery(this);
      $this.data("orig-size", $this.css("color", ""));
    });
  }

  // Reset Grayscale colors
  if (jQuery("#ifweac_grayscalebtn").hasClass("ifweac_grayscale_class")) {
    jQuery("#ifweac_grayscalebtn").removeClass("ifweac_grayscale_class");
    let ifweac_imgs = document.getElementsByTagName("img");
    for (let i = 0; i < ifweac_imgs.length; i++) {
      jQuery("img").each(function () {
        this.style.filter = "revert-layer";
      });
    }
  }

  // Reset fonts color
  if (jQuery("#ifweac_select_font_color").hasClass("ifweac_font_color_class")) {
    jQuery("#ifweac_select_font_color").removeClass("ifweac_font_color_class");
    jQuery("#ifweac_select_font_color")
      .prev()
      .removeClass("ifweac_font_color_span_class");
    jQuery("*").css("color", "");
    jQuery("#ifweac_select_font_color").val("");
  }

  // Reset image magnifier
  if (jQuery("#ifweac_image_maginifier").hasClass("ifweac_image_maginifier_class")) {
    jQuery("#ifweac_image_maginifier").removeClass("ifweac_image_maginifier_class");
    jQuery("#ifweac_image_maginifier .ifweac_switch input[name='ifweac_maginifier']").prop('checked', false);
    jQuery(".ifweac_magnify").remove();
    jQuery("img").hover(function () {
      jQuery(this).css("cursor", "pointer");
    });
  } 

  // Reset highlight titles
  if (jQuery("#ifweac_highlight_titles").hasClass("ifweac_highlight_titles_class")) {
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "");
      jQuery("#ifweac_highlight_titles").removeClass("ifweac_highlight_titles_class");
    });
  }

  // Reset highlighted title color
  if (
    jQuery("#ifweac_highlighted_title_color").hasClass(
      "ifweac_highlighted_title_color_class"
    )
  ) {
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6");
    ifweac_elems.each(function () {
      jQuery(this).css("color", "");
      jQuery("#ifweac_highlighted_title_color").removeClass(
        "ifweac_highlighted_title_color_class"
      );
      jQuery("#ifweac_highlighted_title_color")
        .prev()
        .removeClass("ifweac_highlighted_title_color_span_class");
      jQuery("#ifweac_highlighted_title_color").val("");
    });
  }

  // Reset zoom cursor
  if (jQuery("#ifweac_zoom_cursor").hasClass("ifweac_zoom_cursor_class")) {
    jQuery("body").css("cursor", "");
    jQuery("#ifweac_zoom_cursor").removeClass("ifweac_zoom_cursor_class");
  }

  // Reset Disability Mode
  if (jQuery("#ifweac_disability_mode").hasClass("ifweac_disability_mode_class")) {
    ifweac_elems = jQuery("h1, h2, h3, h4, h5, h6, a");
    ifweac_elems.each(function () {
      jQuery(this).css("border", "");
      jQuery(this).css("border-radius", "");
      jQuery(this).css("padding", "");
      jQuery("#ifweac_disability_mode").removeClass("ifweac_disability_mode_class");
    });
  }

  // Reset Text zoom magnifier
  if (jQuery("#ifweac_text_zoom").hasClass("ifweac_text_zoom_class")) {
    jQuery("#ifweac_text_zoom").removeClass("ifweac_text_zoom_class");
    jQuery("#ifweac_text_zoom").css({
      display: "",
      "font-size": "",
      width: "",
    });
    jQuery("*").css("display", "");
    var $ifweac_affectedElements = jQuery(
      "p, a, h1, h2, h3, h4, h5, h6, li, div"
    );
    $ifweac_affectedElements.each(function () {
      jQuery(this).hover(
        function () {
          jQuery("body").css("cursor", "");
          jQuery(this).stop();
        },
        function () {
          jQuery(this).stop();
        }
      );
    });
  }
}

//***********************//
// Add classes for sidebar //
//***********************//
jQuery(document).ready(function () {
    jQuery(".ifweac_sidebar_toggler_btn").click(function () {
      if (jQuery("#ifweac_sidebar").hasClass("right-top")) {
        jQuery(".ifweac_accessibility-menu-wrapper").addClass("ifweac_right_sidebar");
      }
      if (jQuery("#ifweac_sidebar").hasClass("right-bottom")) {
        jQuery(".ifweac_accessibility-menu-wrapper").addClass("ifweac_right_sidebar");
      }
      if (jQuery("#ifweac_sidebar").hasClass("top-left")) {
        jQuery(".ifweac_accessibility-menu-wrapper").addClass("ifweac_left_sidebar");
      }
      if (jQuery("#ifweac_sidebar").hasClass("bottom-left")) {
        jQuery(".ifweac_accessibility-menu-wrapper").addClass("ifweac_left_sidebar");
      }
    });
    var delay = 500;
    setTimeout(function() {
    if (jQuery("#ifweac_sidebar").hasClass("top-left")) {
      jQuery(".ifweac_sidebar_toggler").addClass("ifweac_top_left");
    }
    if (jQuery("#ifweac_sidebar").hasClass("right-top")) {
      jQuery(".ifweac_sidebar_toggler").addClass("ifweac_top_right");
    }
    if (jQuery("#ifweac_sidebar").hasClass("right-bottom")) {
      jQuery(".ifweac_sidebar_toggler").addClass("ifweac_right_bottom");
    }
    if (jQuery("#ifweac_sidebar").hasClass("bottom-left")) {
      jQuery(".ifweac_sidebar_toggler").addClass("ifweac_left_bottom");
    }}, delay);
});