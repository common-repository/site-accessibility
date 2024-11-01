<?php
/**
 * If this file is called directly, abort
 */
if ( ! defined( 'ABSPATH' ) ) { die(); }
?>
<!-- Start Sidebar wrapper -->
<div class="ifweac_accessibility-menu-wrapper">
    <?php
    $ifweac_enable_position = get_option('ifweac_enable_position');
    ?>
    <!-- Start Sidebar section -->
    <aside style="background-color: #086db3;" id="ifweac_sidebar" class="<?php if(isset($ifweac_enable_position) &&  !empty($ifweac_enable_position)) {
            if($ifweac_enable_position == 'Bottom Left') { echo esc_html__('bottom-left','ifweac-accessibility'); } 
            elseif($ifweac_enable_position == 'Top Right') { echo esc_html__('right-top','ifweac-accessibility'); } 
            elseif($ifweac_enable_position == 'Bottom Right'){ echo esc_html__('right-bottom','ifweac-accessibility');} 
            elseif($ifweac_enable_position == 'Top Left') { echo esc_html__('top-left','ifweac-accessibility'); }
        } ?>"> 
        <!-- Start Hiddden fields and its values section -->
        <?php
        $ifweac_links_underline_color = get_option('ifweac_links_underline_color');
        $ifweac_links_highlight_color = get_option('ifweac_links_highlight_color');
        $ifweac_add_minimum_font_size = get_option('ifweac_add_minimum_font_size');
        $ifweac_add_maximum_font_size = get_option('ifweac_add_maximum_font_size');
        $ifweac_max_min_font_size_val = get_option('ifweac_max_min_font_size_val');
        $ifweac_highlight_titles_border_color = get_option('ifweac_highlight_titles_border_color');
        $ifweac_disability_mode_color = get_option('ifweac_disability_mode_color');
        $ifweac_theme_mode_text = get_option('ifweac_theme_mode_text');
        ?>
        <input type="hidden" name="ifweac_dynamic_theme_mode_txt" id="ifweac_dynamic_theme_mode_txt" value="<?php if(isset($ifweac_theme_mode_text) && !empty($ifweac_theme_mode_text)) { echo esc_attr($ifweac_theme_mode_text); } ?>">
        <input type="hidden" name="ifweac_links_underline_colors" id="ifweac_links_underline_colors" value="<?php if(isset($ifweac_links_underline_color) && !empty($ifweac_links_underline_color)) { echo esc_attr($ifweac_links_underline_color); } ?>">
        <input type="hidden" name="ifweac_links_highlight_colors" id="ifweac_links_highlight_colors" value="<?php if(isset($ifweac_links_highlight_color) && !empty($ifweac_links_highlight_color)) { echo esc_attr($ifweac_links_highlight_color); } ?>">
        <input type="hidden" name="ifweac_minimum_font_size" id="ifweac_minimum_font_size" value="<?php if(isset($ifweac_add_minimum_font_size) && !empty($ifweac_add_minimum_font_size)) { echo esc_attr($ifweac_add_minimum_font_size); } ?>">
        <input type="hidden" name="ifweac_maximum_font_size" id="ifweac_maximum_font_size" value="<?php if(isset($ifweac_add_maximum_font_size) && !empty($ifweac_add_maximum_font_size)) { echo esc_attr($ifweac_add_maximum_font_size); } ?>">
        <input type="hidden" name="ifweac_max_min_font_size_val" id="ifweac_max_min_font_size_val" value="<?php if(isset($ifweac_max_min_font_size_val) && !empty($ifweac_max_min_font_size_val)){ echo esc_attr($ifweac_max_min_font_size_val); } ?>">
        <input type="hidden" name="ifweac_highlight_titles_border_color" id="ifweac_highlight_titles_border_color" value="<?php if(isset($ifweac_highlight_titles_border_color) && !empty($ifweac_highlight_titles_border_color)){ echo esc_attr($ifweac_highlight_titles_border_color);}?>">
        <input type="hidden" name="ifweac_disability_mode_color" id="ifweac_disability_mode_color" value="<?php if(isset($ifweac_disability_mode_color) && !empty($ifweac_disability_mode_color)){ echo esc_attr($ifweac_disability_mode_color); } ?>">
        <input type="hidden" name="ifweac_access_plugins_icon_url" id="ifweac_access_plugins_icon_url" value="<?php echo esc_url(plugins_url('/site-accessibility/assets/images/public/mouse_cursor.png')); ?>">

        <!-- End Hiddden fields and its values section -->

        <!-- Start Sidebar head -->
        <?php $ifweac_title = get_option('ifweac_title'); ?>
        <div class="ifweac_sidebar_content ifweac_sidebar_head">
            <?php if(!empty($ifweac_title)){ ?>
                <h2><?php echo esc_html($ifweac_title); ?></h2>
            <?php 
            } else { ?>
                <h2><?php echo esc_html__('Accessibility Options', 'ifweac-accessibility'); ?></h2>
            <?php } ?>        
        </div>
        <!-- End Sidbar Head -->

        <!-- Start Fonts section -->
        <div class="ifweac_fonts_wrapper">
        <?php 
        $ifweac_enable_font_size = get_option('ifweac_enable_font_size');
        $ifweac_font_size_title = get_option('ifweac_font_size_title');
    
        if(isset($ifweac_enable_font_size) && !empty($ifweac_enable_font_size)){ ?>        
        <span id="ifweac_increase_fonts" increaseFOntSize="0" class="ifweac_plus_sign" value="increase"><?php echo esc_html__('A&#43;', 'ifweac-accessibility');?></span>
        <?php 
        if(!empty($ifweac_font_size_title)){ ?>
            <span id="ifweac_btn-orig"><?php echo esc_html($ifweac_font_size_title);?></span>
        <?php } else { ?>
            <span id="ifweac_btn-orig"><?php echo esc_html__('Font Size [100%]', 'ifweac-accessibility');?></span>
        <?php } ?>
        <span class="ifweac_minus_sign" decreaseFOntSize="0" id="ifweac_decrease_fonts" value="decrease"><?php echo esc_html__('A&#8722;', 'ifweac-accessibility');?></span>        
        <?php } ?>
        </div>
        <div class="ifweac_font_selector">
        <?php
        $ifweac_enable_font_color_selection = get_option('ifweac_enable_font_color_selection'); 
        if(isset($ifweac_enable_font_color_selection) && !empty($ifweac_enable_font_color_selection)) { ?>
            <label for="ifweac_select_font_color"><?php echo esc_html__('Select Font Color', 'ifweac-accessibility');?></label>   
            <input type="color" id="ifweac_select_font_color" name="ifweac_select_font_color" value=""><br> 
        <?php } ?>
        </div>
        <!-- End Fonts section -->

        <!-- Start Links underline section -->
        <?php 
        $ifweac_enable_links_underline = get_option('ifweac_enable_links_underline');
        $ifweac_links_underline_text = get_option('ifweac_links_underline_text');
        if(isset($ifweac_enable_links_underline) && !empty($ifweac_enable_links_underline)) { 
            if(!empty($ifweac_links_underline_text)) { ?>  
                <span id="ifweac_links_underline" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_links_underline_text);?>
                    <label class="ifweac_switch">
                        <input id="ifweac_links_underline_checkbox" type="checkbox" name="ifweac_underline">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php } else { ?>
                <span id="ifweac_links_underline" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Links Underline', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_links_underline_checkbox" type="checkbox" name="ifweac_underline">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br> 
        <?php }
        } ?>
        <!-- End Links underline section -->

        <!-- Start links highlighted section -->
        <?php
        $ifweac_enable_links_highlight = get_option('ifweac_enable_links_highlight');
        $ifweac_links_highlight_text = get_option('iflair_access_links_highlight_text');
        if(isset($ifweac_enable_links_highlight) && !empty($ifweac_enable_links_highlight)) {
            if(!empty($ifweac_links_highlight_text)) { ?>
                <span id="ifweac_highlight_links" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_links_highlight_text);?> 
                    <label class="ifweac_switch">
                        <input id="ifweac_highlight_links_checkbox" type="checkbox" name="ifweac_highlight">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php } else { ?>
                <span id="ifweac_highlight_links" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Highlight Links', 'ifweac-accessibility');?>
                     <label class="ifweac_switch">
                        <input id="ifweac_highlight_links_checkbox" type="checkbox" name="ifweac_highlight">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>   
                </span><br>
        <?php }
        } ?>
        <!-- End Links underline section -->

        <!-- Start Theme mode section -->
        <?php 
        $ifweac_enable_theme_mode = get_option('ifweac_enable_theme_mode');
        $ifweac_theme_mode_text = get_option('ifweac_theme_mode_text');
        if (isset($ifweac_enable_theme_mode) && !empty($ifweac_enable_theme_mode)) { 
            if (!empty($ifweac_theme_mode_text)) { ?>
                <span id="ifweac_themebgcolor" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_theme_mode_text) . ' ' . esc_html__(' : Light', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php } else { ?>
                <span id="ifweac_themebgcolor" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Theme Mode : Light', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_themebgcolor_checkbox" type="checkbox" name="ifweac_themebgcolor" onclick="ifweac_changebackColor()">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php }
        }
        ?>
        <!-- End theme mode section -->

        <!-- Start grayscale section -->
        <?php
        $ifweac_enable_grayscale = get_option('ifweac_enable_grayscale');  
        $ifweac_grayscale_text = get_option('ifweac_grayscale_text');
        if(isset($ifweac_enable_grayscale) && !empty($ifweac_enable_grayscale)) { 
            if(!empty($ifweac_grayscale_text)) { ?>
                <span id="ifweac_grayscalebtn" class="ifweac_toggle-checkbox"><?php echo esc_html($ifweac_grayscale_text);?>
                    <label class="ifweac_switch">
                        <input id="ifweac_grayscalebtn_checkbox" type="checkbox" name="ifweac_grayscalebtn">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
                <?php } else { ?>
                <span id="ifweac_grayscalebtn" class="ifweac_toggle-checkbox"><?php echo esc_html__('Grayscale Images', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_grayscalebtn_checkbox" type="checkbox" name="ifweac_grayscalebtn">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php 
            }   
        } ?>
        <!-- End grayscale section -->

        <!-- Start image magnifier section -->
        <?php 
        $ifweac_enable_image_magnifier = get_option('ifweac_enable_image_magnifier'); 
        $ifweac_image_magnifier_text = get_option('ifweac_image_magnifier_text');
        if(isset($ifweac_enable_image_magnifier) && !empty($ifweac_enable_image_magnifier)){
            if(!empty($ifweac_image_magnifier_text)) { ?>
                <span id="ifweac_image_maginifier" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_image_magnifier_text);?>
                    <label class="ifweac_switch">
                        <input id="ifweac_image_maginifier_checkbox" type="checkbox" name="ifweac_maginifier">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php } else { ?>
                <span id="ifweac_image_maginifier" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Image Magnifier', 'ifweac-accessibility');?>
                     <label class="ifweac_switch">
                        <input id="ifweac_image_maginifier_checkbox" type="checkbox" name="ifweac_maginifier">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>   
                </span><br>
            <?php } 
        } ?>
        <!-- End image magnifier section -->

        <!-- Start text magnifier section -->
        <?php
        $ifweac_enable_text_magnifier = get_option('ifweac_enable_text_magnifier');
        $ifweac_text_magnifier_text = get_option('ifweac_text_magnifier_text');
        if(isset($ifweac_enable_text_magnifier) && !empty($ifweac_enable_text_magnifier)){ 
            if(!empty($ifweac_text_magnifier_text)){ ?>
                <span id="ifweac_text_zoom" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_text_magnifier_text);?>
                     <label class="ifweac_switch">
                        <input id="ifweac_text_zoom_checkbox" type="checkbox" name="ifweac_textzoom">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>   
                </span><br><?php 
            } else { ?>
                <span id="ifweac_text_zoom" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Text Magnifier', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_text_zoom_checkbox" type="checkbox" name="ifweac_textzoom">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br> 
            <?php  }  
        } ?>
        <!-- End text magnifier section -->

        <!-- Start Disability mode section -->
        <?php
        $ifweac_enable_disability_mode = get_option('ifweac_enable_disability_mode');
        $ifweac_disability_mode_text = get_option('ifweac_disability_mode_text'); 
        if(isset($ifweac_enable_disability_mode) && !empty($ifweac_enable_disability_mode)){
            if(!empty($ifweac_disability_mode_text)) { ?>
                <span id="ifweac_disability_mode" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_disability_mode_text);?>
                     <label class="ifweac_switch">
                        <input id="ifweac_disability_mode_checkbox" type="checkbox" name="ifweac_disability">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>   
                </span><br>
            <?php } else { ?>
                <span id="ifweac_disability_mode" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Disability Mode', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_disability_mode_checkbox" type="checkbox" name="ifweac_disability">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>
                </span><br>
            <?php }
        } ?>
        <!-- End disability mode section -->

        <!-- Start cursor zoom section -->
        <?php 
        $ifweac_enable_cursor_zoom = get_option('ifweac_enable_cursor_zoom');
        $ifweac_cursor_zoom_text = get_option('ifweac_cursor_zoom_text');
        if(isset($ifweac_enable_cursor_zoom) && !empty($ifweac_enable_cursor_zoom)){
            if(!empty($ifweac_cursor_zoom_text)){ ?>
                <span id="ifweac_zoom_cursor" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_cursor_zoom_text);?>
                    <label class="ifweac_switch">
                        <input id="ifweac_zoom_cursor_checkbox" type="checkbox" name="ifweac_zoomcursor">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>    
                </span><br>
            <?php } else { ?>
                <span id="ifweac_zoom_cursor" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Cursor Zoom', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_zoom_cursor_checkbox" type="checkbox" name="ifweac_zoomcursor">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>   
                </span><br>
            <?php 
            }
        } ?>
        <!-- End cursor zoom section -->

        <!-- Start highlight titles section --> 
        <?php
        $ifweac_enable_highlight_titles = get_option('ifweac_enable_highlight_titles');
        $ifweac_highlight_titles_text = get_option('ifweac_highlight_titles_text');
        if(isset($ifweac_enable_highlight_titles) && !empty($ifweac_enable_highlight_titles)){
            if(!empty($ifweac_highlight_titles_text)){ ?>
                <span id="ifweac_highlight_titles" class="ifweac_toggle-checkbox">
                    <?php echo esc_html($ifweac_highlight_titles_text);?>
                    <label class="ifweac_switch">
                        <input id="ifweac_highlight_titles_checkbox" type="checkbox" name="ifweac_highlighttitles">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label>     
                </span><br>
            <?php } else { ?>
                <span id="ifweac_highlight_titles" class="ifweac_toggle-checkbox">
                    <?php echo esc_html__('Highlight Titles', 'ifweac-accessibility');?>
                    <label class="ifweac_switch">
                        <input id="ifweac_highlight_titles_checkbox" type="checkbox" name="ifweac_highlighttitles">
                        <span class="ifweac_slider ifweac_round"></span>
                    </label> 
                </span><br>
            <?php }
        } ?>
        <!-- End highlight titles section -->

        <!-- Start titles color section -->
        <div class="ifweac_font_selector">
        <?php
        $ifweac_enable_titles_color = get_option('ifweac_enable_titles_color');
        $ifweac_titles_color_text = get_option('ifweac_titles_color_text');
        if(isset($ifweac_enable_titles_color) && !empty($ifweac_enable_titles_color)) {
            if(!empty($ifweac_titles_color_text)) { ?>
                <label for="ifweac_highlighted_title_color" id="ifweac_titles_color"><?php echo esc_html($ifweac_titles_color_text);?> </label>
                <input type="color" id="ifweac_highlighted_title_color" name="ifweac_highlighted_title_color" value=""><br>
            <?php 
            } else { ?>
                <label for="ifweac_highlighted_title_color" id="ifweac_titles_color"><?php echo esc_html__('Select Page Titles Color', 'ifweac-accessibility');?></label>
                <input type="color" id="ifweac_highlighted_title_color" name="ifweac_highlighted_title_color" value="" ><br>
            <?php }    
        } ?>
        </div>
        <!-- End titles color section -->

        <!-- Start Reset all button section -->
        <?php 
        $ifweac_enable_reset_all = get_option('ifweac_enable_reset_all');
        $ifweac_reset_all_text = get_option('ifweac_reset_all_text');
        if(isset($ifweac_enable_reset_all) && !empty($ifweac_enable_reset_all)) {
            if(!empty($ifweac_reset_all_text)) { ?>
                <span id="ifweac_resetbtn" onclick="ifweac_resetbtn()"><?php echo esc_html($ifweac_reset_all_text);?></span><br>
                <?php } else { ?>
                <span id="ifweac_resetbtn" onclick="ifweac_resetbtn()"><?php echo esc_html__('Reset All', 'ifweac-accessibility');?></span><br> 
            <?php 
            } 
        }
        ?>
        <!-- End reset all button section -->
    </aside>
    <!-- End Sidebar section -->

    <?php 
    $ifweac_sidebar_title = get_option('ifweac_sidebar_title');
    $ifweac_sidebar_icon = get_option('ifweac_sidebar_icon'); 
    $ifweac_enable_btn_txt = get_option('ifweac_enable_btn_txt');
    $ifweac_enable_btn_image = get_option('ifweac_enable_btn_image');
    ?>    
    <!-- Start Sidebar-Toggler -->
    <?php $ifweac_select_sidebar_icon_color = get_option('ifweac_select_sidebar_icon_color');

    if(empty($ifweac_select_sidebar_icon_color)){
        $ifweac_select_sidebar_icon_color = '#086db3';
    }       
    ?>    
        <?php
        if($ifweac_enable_btn_image && $ifweac_enable_btn_txt){ ?>
            <div class="ifweac_sidebar_toggler first">
                <div class="ifweac_sidebar_toggler_btn" style="background-color: <?php echo esc_attr($ifweac_select_sidebar_icon_color);?>">
                <?php 
                if($ifweac_enable_btn_image) {
                    if(!empty($ifweac_sidebar_icon)){ ?>
                        <img src="<?php echo esc_url($ifweac_sidebar_icon); ?>" alt="" width="35" height="35">
                    <?php } else { ?>
                        <img src="<?php echo esc_url(plugins_url()).'/site-accessibility/assets/images/public/accessibility.png'; ?>" alt="" width="35" height="35">
                    <?php } 
                } ?>
                <?php 
                if($ifweac_enable_btn_txt) {
                    if(!empty($ifweac_sidebar_title)){ ?>
                    <span style="font-size: 16px;"><?php echo esc_html($ifweac_sidebar_title);?></span>
                    <?php } else { ?>
                    <span style="font-size: 16px;"><?php echo esc_html__('Accessibility', 'ifweac-accessibility');?></span>
                <?php } 
                } ?>
                </div>
            </div> <?php }
            else if ($ifweac_enable_btn_txt) { ?>
                <div class="ifweac_sidebar_toggler second">
                <div class="ifweac_sidebar_toggler_btn" style="width:auto;background-color: <?php echo esc_attr($ifweac_select_sidebar_icon_color);?>">
                    <span style="font-size: 16px;"><?php echo esc_html($ifweac_sidebar_title);?></span>                
                </div>
            </div>
            <?php } else if ($ifweac_enable_btn_image) { ?>
            <div class="ifweac_sidebar_toggler third">
                <div class="ifweac_sidebar_toggler_btn" style="width:auto;background-color: <?php echo esc_attr($ifweac_select_sidebar_icon_color);?>">
                    <?php 
                    if(!empty($ifweac_sidebar_icon)){ ?>
                        <img src="<?php echo esc_url($ifweac_sidebar_icon); ?>" alt="" width="35" height="35">
                        <span></span> 
                    <?php } else { ?>
                        <img src="<?php echo esc_url(plugins_url()).'/site-accessibility/assets/images/public/accessibility.png'; ?>" alt="" width="35" height="35">
                        <span></span> 
                    <?php } ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="ifweac_sidebar_toggler fourth">
                <div class="ifweac_sidebar_toggler_btn" style="width:auto;background-color: <?php echo esc_attr($ifweac_select_sidebar_icon_color);?>">
                    <img src="<?php echo esc_url(plugins_url()).'/site-accessibility/assets/images/public/accessibility.png'; ?>" alt="" width="35" height="35">
                    <span></span>                
                </div>
            </div>
       <?php } ?>
    <!-- End Sidebar-Toggler -->    
</div>
<!-- End Sidebar wrapper -->