<?php
/*** If this file is called directly, abort ***/
if ( ! defined( 'ABSPATH' ) ) { die(); }
?>
<!-- Start settings page form -->
<form method="post" action="options.php">
    <?php settings_fields( 'ifweac-accessibility-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ifweac-accessibility-plugin-settings-group' ); ?>
    <!-- Start admin ui options tabs code -->
    <div id="ifweac_tabs">
        <ul>
            <li><a href="#ifweac_fonts"><?php echo esc_html__('Fonts Management', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_underline_links"><?php echo esc_html__('Links Underline', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_highlighted_links"><?php echo esc_html__('Links Highlight', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_theme_mode"><?php echo esc_html__('Theme Mode', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_grayscale"><?php echo esc_html__('Grayscale Images', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_image_magnifier"><?php echo esc_html__('Image Magnifier', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_text_magnifier"><?php echo esc_html__('Text Magnifier', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_disability"><?php echo esc_html__('Disability Mode', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_cursor_zoom"><?php echo esc_html__('Cursor Zoom', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_highlighted_titles"><?php echo esc_html__('Page Titles Highlight', 'ifweac-accessibility');?></a></li>
            <li><a href="#ifweac_titles_colors"><?php echo esc_html__('Page Titles Color', 'ifweac-accessibility');?></a></li>  
            <li><a href="#ifweac_reset_btn"><?php echo esc_html__('Reset Button', 'ifweac-accessibility');?></a></li>
        </ul>
        <!-- Start code for fonts -->
        <div id="ifweac_fonts">
            <!-- Start Table Section -->
            <table class="form-table">
                <!-- HTML for Font Size Option field -->
                <?php 
                $ifweac_enable_font_size = get_option('ifweac_enable_font_size');
                ?>             
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Font Size Option?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                        <input type="checkbox" id="ifweac_enable_font_size" name="ifweac_enable_font_size" value="yes" <?php if(isset($ifweac_enable_font_size) && $ifweac_enable_font_size == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                        <span class="ifweac_slider ifweac_round"></span>
                        </label>                
                    </td>       
                </tr>
                <!-- HTML for Font Display Text field -->
                <?php 
                $ifweac_font_size_title = get_option('ifweac_font_size_title');
                ?>
                <tr valign="top" class="ifweac_font_size_title">
                    <th scope="row"><?php echo esc_html__('Font Display Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_font_size_title" id="ifweac_font_size_title" placeholder="Font Size[100%]" value="<?php if(isset($ifweac_font_size_title) && !empty($ifweac_font_size_title)) { echo esc_attr($ifweac_font_size_title); } ?>">
                    </td>           
                </tr>
                <!-- HTML for Maximum Font Size field -->
                <?php 
                $ifweac_add_maximum_font_size = get_option('ifweac_add_maximum_font_size');
                ?>
                <tr valign="top" class="ifweac_add_maximum_font_size">
                    <th scope="row"><?php echo esc_html__('Maximum Font Size', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can increase fonts as many times as shown here', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <input type="number" name="ifweac_add_maximum_font_size" id="ifweac_add_maximum_font_size" placeholder="0" min="0" value="<?php if(isset($ifweac_add_maximum_font_size) && !empty($ifweac_add_maximum_font_size)) { echo esc_attr($ifweac_add_maximum_font_size); } ?>">
                    </td>            
                </tr>                
                <!-- HTML for Minimum Font Size field -->
                <?php 
                $ifweac_add_minimum_font_size = get_option('ifweac_add_minimum_font_size');
                ?>
                <tr valign="top" class="ifweac_add_minimum_font_size">
                    <th scope="row"><?php echo esc_html__('Minimum Font Size', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can decrease fonts as many times as shown here', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <input type="number" name="ifweac_add_minimum_font_size" id="ifweac_add_minimum_font_size" placeholder="0" min="0" value="<?php if(isset($ifweac_add_minimum_font_size) && !empty($ifweac_add_minimum_font_size)) { echo esc_attr($ifweac_add_minimum_font_size); } ?>">
                    </td>
                </tr>
                <!-- HTML for Increase - Decrease Font Size field -->
                <?php 
                $ifweac_max_min_font_size_val = get_option('ifweac_max_min_font_size_val');
                ?>
                <tr valign="top" class="ifweac_max_min_font_size_val">
                    <th scope="row"><?php echo esc_html__('Increase - Decrease Font Size', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can increase-decrease font as number of times on single click as shown here', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <input type="number" name="ifweac_max_min_font_size_val" id="ifweac_max_min_font_size_val" placeholder="0" min="0" value="<?php if(isset($ifweac_max_min_font_size_val) && !empty($ifweac_max_min_font_size_val)) { echo esc_html($ifweac_max_min_font_size_val); } ?>"> 
                    </td>            
                </tr>
                <!-- HTML for Enable Font Color Selection field -->
                <?php 
                $ifweac_enable_font_color_selection = get_option('ifweac_enable_font_color_selection');
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Font Color Selection?', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can select fonts color through color picker for page', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_font_color_selection" name="ifweac_enable_font_color_selection" value="yes" <?php if(isset($ifweac_enable_font_color_selection) && $ifweac_enable_font_color_selection == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?> >
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>   
                    </td>                 
                </tr>
            </table>        
        </div>
        <!-- End code for fonts -->

        <!-- Start code for links underline -->
        <div id="ifweac_underline_links">
            <table class="form-table">
                <!-- HTML for Enable Links Underline checkbox field -->
                <?php  
                $ifweac_enable_links_underline = get_option('ifweac_enable_links_underline');
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Links Underline?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_links_underline" name="ifweac_enable_links_underline" value="yes" <?php if(isset($ifweac_enable_links_underline) && $ifweac_enable_links_underline == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>                             
                    </td>
                </tr>
                <!-- HTML for Select underline color field -->
                <?php 
                $ifweac_links_underline_color = get_option('ifweac_links_underline_color');
                ?>
                <tr valign="top" class="ifweac_links_underlined_color">
                    <th scope="row"><?php echo esc_html__('Select underline color', 'ifweac-accessibility');?></th>
                    <td>
                        <input class="ifweac_links_underline_color" name="ifweac_links_underline_color" type="text" value="<?php if(isset($ifweac_links_underline_color) && !empty($ifweac_links_underline_color)) { echo esc_attr($ifweac_links_underline_color);} else { ?>#086db3<?php } ?>" data-default-color="#effeff" />         
                    </td>
                </tr>
                <!-- HTML for Links Underline Text field -->
                <?php 
                $ifweac_links_underline_text = get_option('ifweac_links_underline_text');
                ?>
                <tr valign="top" class="ifweac_links_underline_text">
                    <th scope="row"><?php echo esc_html__('Links Underline Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_links_underline_text" id="ifweac_links_underline_text" placeholder="Links Underline" value="<?php if(isset($ifweac_links_underline_text) && !empty($ifweac_links_underline_text)) { echo esc_attr($ifweac_links_underline_text); } ?>">
                    </td>           
                </tr>  
            </table>     
        </div>
        <!-- End code for links underline -->

        <!-- Start code for highlight links -->
        <div id="ifweac_highlighted_links">
            <table class="form-table">
                <!-- HTML for Enable Links Highlight checkbox field -->
                <?php
                $ifweac_enable_links_highlight = get_option('ifweac_enable_links_highlight');
                ?>     
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Links Highlight?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_links_highlight" name="ifweac_enable_links_highlight" value="yes" <?php if(isset($ifweac_enable_links_highlight) && $ifweac_enable_links_highlight == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>             
                    </td>       
                </tr>
                <!-- HTML for Select Highlight link color field -->
                <?php
                $ifweac_links_highlight_color = get_option('ifweac_links_highlight_color');
                ?>
                <tr valign="top" class="ifweac_links_highlighted_color">
                    <th scope="row"><?php echo esc_html__('Select Highlight link color', 'ifweac-accessibility');?></th>
                    <td>
                        <input class="ifweac_links_highlight_color" name="ifweac_links_highlight_color" type="text" value="<?php if(isset($ifweac_links_highlight_color) && !empty($ifweac_links_highlight_color)) { echo esc_attr($ifweac_links_highlight_color); } else { ?>#086db3<?php } ?>" data-default-color="#effeff" />        
                    </td>       
                </tr>
                <!-- HTML for Links Highlight Text field -->
                <?php
                $ifweac_links_highlight_text = get_option('ifweac_links_highlight_text');
                ?>
                <tr valign="top" class="ifweac_links_highlight_text">
                    <th scope="row"><?php echo esc_html__('Links Highlight Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_links_highlight_text" id="ifweac_links_highlight_text" placeholder="Links Highlight" value="<?php if(isset($ifweac_links_highlight_text) && !empty($ifweac_links_highlight_text)) { echo esc_attr($ifweac_links_highlight_text); } ?>">
                    </td>           
                </tr> 
            </table>      
        </div>
        <!-- End code for highlight links -->

        <!-- Start code for Theme mode background -->
        <div id="ifweac_theme_mode">
            <table class="form-table">
                <!-- HTML for Enable Theme Mode checkbox field -->
                <?php
                $ifweac_enable_theme_mode = get_option('ifweac_enable_theme_mode');
                ?>         
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Theme Mode?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_theme_mode" name="ifweac_enable_theme_mode" value="yes" <?php if(isset($ifweac_enable_theme_mode) && $ifweac_enable_theme_mode == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>                
                    </td> 
                </tr>
                <!-- HTML for Theme Mode Text field -->
                <?php
                $ifweac_theme_mode_text = get_option('ifweac_theme_mode_text');
                ?>
                <tr valign="top" class="ifweac_theme_mode_text">
                    <th scope="row"><?php echo esc_html__('Theme Mode Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_theme_mode_text" id="ifweac_theme_mode_text" placeholder="Theme Mode" value="<?php if(isset($ifweac_theme_mode_text) && !empty($ifweac_theme_mode_text)) { echo esc_attr($ifweac_theme_mode_text); }?>" >
                    </td>           
                </tr>  
            </table>     
        </div>
        <!-- End code for Theme mode background -->

        <!-- Start code for image grayscale -->
        <div id="ifweac_grayscale">
            <table class="form-table">
                <!-- HTML for Enable Grayscale checkbox field -->
                <?php
                $ifweac_enable_grayscale = get_option('ifweac_enable_grayscale');       
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Grayscale?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_grayscale" name="ifweac_enable_grayscale" value="yes" <?php if(isset($ifweac_enable_grayscale) && $ifweac_enable_grayscale == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label> 
                    </td>
                </tr>
                <!-- HTML for Grayscale Text field -->
                <?php
                $ifweac_grayscale_text = get_option('ifweac_grayscale_text');
                ?>
                <tr valign="top" class="ifweac_grayscale_text">
                    <th scope="row"><?php echo esc_html__('Grayscale Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_grayscale_text" id="ifweac_grayscale_text" placeholder="Image Grayscale" value="<?php if(isset($ifweac_grayscale_text) && !empty($ifweac_grayscale_text)) { echo esc_attr($ifweac_grayscale_text); } ?>">
                    </td>           
                </tr>   
            </table>    
        </div>
        <!-- End code for image grayscale -->

        <!-- Start code for image magnifier -->
        <div id="ifweac_image_magnifier">
            <table class="form-table">

                <!-- HTML for Enable Image Magnifier checkbox field -->
                <?php
                $ifweac_enable_image_magnifier = get_option('ifweac_enable_image_magnifier');
                ?>    
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Image Magnifier?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_image_magnifier" name="ifweac_enable_image_magnifier" value="yes" <?php if(isset($ifweac_enable_image_magnifier) && $ifweac_enable_image_magnifier == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>
                    </td> 
                </tr>
                <!-- HTML for Image Magnifier Text field -->
                <?php
                $ifweac_image_magnifier_text = get_option('ifweac_image_magnifier_text');
                ?>
                <tr valign="top" class="ifweac_image_magnifier_text">
                    <th scope="row"><?php echo esc_html__('Image Magnifier Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_image_magnifier_text" id="ifweac_image_magnifier_text" placeholder="Image Magnifier" value="<?php if(isset($ifweac_image_magnifier_text) && !empty($ifweac_image_magnifier_text)) { echo esc_attr($ifweac_image_magnifier_text); } ?>">
                    </td>           
                </tr>    
            </table>   
        </div>
        <!-- End code for image magnifier -->

        <!-- Start code for text magnifier -->
        <div id="ifweac_text_magnifier">
            <table class="form-table">
                <!-- HTML for Enable Text Magnifier checkbox field -->
                <?php
                $ifweac_enable_text_magnifier = get_option('ifweac_enable_text_magnifier');  
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Text Magnifier?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_text_magnifier" name="ifweac_enable_text_magnifier" value="yes" <?php if(isset($ifweac_enable_text_magnifier) && $ifweac_enable_text_magnifier == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label> 
                    </td>                    
                </tr>
                <!-- HTML For Text Magnifier Text field -->
                <?php
                $ifweac_text_magnifier_text = get_option('ifweac_text_magnifier_text');
                ?>
                <tr valign="top" class="ifweac_texts_magnifier_text">
                    <th scope="row"><?php echo esc_html__('Text Magnifier Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_text_magnifier_text" id="ifweac_text_magnifier_text" placeholder="Text Zoom Magnifier" value="<?php if(isset($ifweac_text_magnifier_text) && !empty($ifweac_text_magnifier_text)){ echo esc_attr($ifweac_text_magnifier_text); }?>">
                    </td>           
                </tr>  
            </table>     
        </div>
        <!-- End code for text magnifier -->

        <!-- Start code for disability mode -->
        <div id="ifweac_disability">
            <table class="form-table">
                <!-- HTML for Enable Disability Mode checkbox field -->
                <?php
                $ifweac_enable_disability_mode = get_option('ifweac_enable_disability_mode');
                ?>
                <tr valign="top">
                <th scope="row"><?php echo esc_html__('Enable Disability Mode?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_disability_mode" name="ifweac_enable_disability_mode" value="yes" <?php if(isset($ifweac_enable_disability_mode) && $ifweac_enable_disability_mode == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>
                    </td> 
                </tr>
                <!-- HTML for Disability Mode Text field -->
                <?php
                $ifweac_disability_mode_text = get_option('ifweac_disability_mode_text');
                ?>
                <tr valign="top" class="ifweac_isability_mode_text">
                    <th scope="row"><?php echo esc_html__('Disability Mode Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_disability_mode_text" id="ifweac_disability_mode_text" placeholder="Disability Mode" value="<?php if(isset($ifweac_disability_mode_text) && !empty($ifweac_disability_mode_text)) { echo esc_html($ifweac_disability_mode_text); } ?>">
                    </td>           
                </tr>
                <!-- HTML for Disability Mode Border color field -->
                <?php
                $ifweac_disability_mode_color = get_option('ifweac_disability_mode_color');
                ?>
                <tr valign="top" class="ifweac_disability_mode_border_color_btn">
                    <th scope="row"><?php echo esc_html__('Disability Mode Border color', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can Highlight all tag fonts as Border color exclude p tag, span tag, div tag', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <input class="ifweac_disability_mode_color" name="ifweac_disability_mode_color" type="text" value="<?php if(isset($ifweac_disability_mode_color) && !empty($ifweac_disability_mode_color)) { echo esc_attr($ifweac_disability_mode_color); } else { ?>#086db3<?php } ?>" data-default-color="#effeff" />      
                    </td>       
                </tr>  
            </table>     
        </div>
        <!-- End code for disability mode -->

        <!-- Start code for highlight titles -->
        <div id="ifweac_highlighted_titles">
            <table class="form-table">
                <!-- HTML for Enable Highlight Titles checkbox field -->
                <?php
                $ifweac_enable_highlight_titles = get_option('ifweac_enable_highlight_titles'); 
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Highlight Titles?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_highlight_titles" name="ifweac_enable_highlight_titles" value="yes" <?php if(isset($ifweac_enable_highlight_titles) && $ifweac_enable_highlight_titles == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>                
                    </td> 
                </tr>
                <!-- HTML for Highlighted Titles Border color field -->
                <?php
                $ifweac_highlight_titles_border_color = get_option('ifweac_highlight_titles_border_color');
                ?>
                <tr valign="top" class="ifweac_highlighted_titles_border_color_btn">
                    <th scope="row"><?php echo esc_html__('Highlighted Titles Border color', 'ifweac-accessibility');?></th>
                    <td>
                        <input class="ifweac_highlight_titles_border_color" name="ifweac_highlight_titles_border_color" type="text" value="<?php if(isset($ifweac_highlight_titles_border_color) && !empty($ifweac_highlight_titles_border_color)) { echo esc_attr($ifweac_highlight_titles_border_color); } else { ?>#086db3<?php } ?>" data-default-color="#effeff" />        
                    </td>       
                </tr>
                <!-- HTML for Highlight Titles Text field -->
                <?php
                $ifweac_highlight_titles_text = get_option('ifweac_highlight_titles_text');
                ?>
                <tr valign="top" class="ifweac_highlight_titles_text">
                    <th scope="row"><?php echo esc_html__('Highlight Titles Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_highlight_titles_text" id="ifweac_highlight_titles_text" placeholder="Highlight Titles" value="<?php if(isset($ifweac_highlight_titles_text) && !empty($ifweac_highlight_titles_text)) { echo esc_attr($ifweac_highlight_titles_text); } ?>">
                    </td>           
                </tr> 
            </table>      
        </div>
        <!-- End code for highlight titles -->   

        <!-- Start code for titles color -->
        <div id="ifweac_titles_colors">
            <table class="form-table">
                <!-- HTML for Enable Page Titles Color checkbox field -->
                <?php
                $ifweac_enable_titles_color = get_option('ifweac_enable_titles_color');
                ?>
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Page Titles Color?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_titles_color" name="ifweac_enable_titles_color" value="yes" <?php if(isset($ifweac_enable_titles_color) && $ifweac_enable_titles_color == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>
                    </td>
                </tr>
                <!-- HTML for Page Titles Color Text field -->
                <?php
                $ifweac_titles_color_text = get_option('ifweac_titles_color_text');
                ?>
                <tr valign="top" class="ifweac_titles_color_text">
                    <th scope="row"><?php echo esc_html__('Page Titles Color Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_titles_color_text" id="ifweac_titles_color_text" placeholder="Select Titles Color" value="<?php if(isset($ifweac_titles_color_text) && !empty($ifweac_titles_color_text)) echo esc_attr($ifweac_titles_color_text);?>">
                    </td>           
                </tr>
            </table>
        </div>
        <!-- End code for titles color -->

        <!-- Start code for cursor zoom -->
        <div id="ifweac_cursor_zoom">
            <table class="form-table">
                <!-- HTML for Enable Cursor Zoom checkbox field -->
                <?php
                $ifweac_enable_cursor_zoom = get_option('ifweac_enable_cursor_zoom');
                ?>      
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Cursor Zoom?', 'ifweac-accessibility');?><span class="ifweac_ctooltip"><sup>[?]</sup><label class="ifweac_tooltip-content"><?php echo esc_html__('User can Zoom Cursor icon using this icon', 'ifweac-accessibility');?></label></span></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_cursor_zoom" name="ifweac_enable_cursor_zoom" value="yes" <?php if(isset($ifweac_enable_cursor_zoom) && $ifweac_enable_cursor_zoom == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                                <span class="ifweac_slider ifweac_round"></span>
                        </label> 
                    </td>            
                </tr>
                <!-- HTML for Cursor Zoom Text field -->
                <?php
                $ifweac_cursor_zoom_text = get_option('ifweac_cursor_zoom_text');
                ?>
                <tr valign="top" class="ifweac_cursor_zoom_text">
                    <th scope="row"><?php echo esc_html__('Cursor Zoom Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_cursor_zoom_text" id="ifweac_cursor_zoom_text" placeholder="Cursor Zoom" value="<?php if(isset($ifweac_cursor_zoom_text) && !empty($ifweac_cursor_zoom_text)){ echo esc_attr($ifweac_cursor_zoom_text); } ?>">
                    </td>           
                </tr>
            </table>
        </div>
        <!-- End code for cursor zoom -->

        <!-- Start code for reset all data -->
        <div id="ifweac_reset_btn">
            <table class="form-table">
                <!-- HTML for Enable Reset All checkbox field -->
                <?php
                $ifweac_enable_reset_all = get_option('ifweac_enable_reset_all');
                ?>          
                <tr valign="top">
                    <th scope="row"><?php echo esc_html__('Enable Reset All?', 'ifweac-accessibility');?></th>
                    <td>
                        <label class="ifweac_switch">
                            <input type="checkbox" id="ifweac_enable_reset_all" name="ifweac_enable_reset_all" value="yes" <?php if(isset($ifweac_enable_reset_all) && $ifweac_enable_reset_all == 'yes') { echo esc_html__("checked=checked",'ifweac-accessibility'); } ?>>
                            <span class="ifweac_slider ifweac_round"></span>
                        </label>
                    </td>
                </tr>
                <!-- HTML for Reset All Text field -->
                <?php
                $ifweac_reset_all_text = get_option('ifweac_reset_all_text');
                ?>
                <tr valign="top" class="ifweac_reset_all_text">
                    <th scope="row"><?php echo esc_html__('Reset All Text', 'ifweac-accessibility');?></th>
                    <td>
                        <input type="text" name="ifweac_reset_all_text" id="ifweac_reset_all_text" placeholder="Reset All" value="<?php if(isset($ifweac_reset_all_text) && !empty($ifweac_reset_all_text)) { echo esc_attr($ifweac_reset_all_text); } ?>">
                    </td>           
                </tr>
            </table>
            <!-- End Table Section-->
        </div>
        <!-- End code for reset all data -->
    </div>
    <!-- End admin ui options tabs code --> 
    <?php submit_button(); ?>
</form>
<!-- End settings page form -->