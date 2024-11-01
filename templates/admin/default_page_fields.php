<?php
/*** If this file is called directly, abort ***/
if ( ! defined( 'ABSPATH' ) ) { die(); }
?>
<!-- Start default page form -->
<form method="post" action="options.php">
    <?php settings_fields( 'ifweac-default-accessibility-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ifweac-default-accessibility-plugin-settings-group' ); ?>
    <!-- Start Table code -->
    <table class="form-table">
        <!-- HTML for Enable Plugin checkbox field -->
        <?php
        $ifweac_enable_accessibility = get_option('ifweac_enable_accessibility_plugin');
        ?>
    	<tr valign="top">            
			<th scope="row"><?php echo esc_html__('Enable Plugin?', 'ifweac-accessibility');?></th>
			<td>				
                <label class="ifweac_switch">
                  <input type="checkbox" id="ifweac_enable_accessibility_plugin" name="ifweac_enable_accessibility_plugin" value="yes" <?php if($ifweac_enable_accessibility == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                  <span class="ifweac_slider ifweac_round"></span>
                </label>				
			</td>		
        </tr>
        <?php
        $ifweac_enable_btn_txt = get_option('ifweac_enable_btn_txt');
        ?>
        <tr valign="top">            
            <th scope="row"><?php echo esc_html__('Enable Button Text?', 'ifweac-accessibility');?></th>
            <td>                
                <label class="ifweac_switch">
                  <input type="checkbox" id="ifweac_enable_btn_txt" name="ifweac_enable_btn_txt" value="yes" <?php if($ifweac_enable_btn_txt == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                  <span class="ifweac_slider ifweac_round"></span>
                </label>                
            </td>       
        </tr>
        <!-- HTML for Plugin Sidebar Text field -->
        <?php
        $ifweac_sidebar_title = get_option('ifweac_sidebar_title');
        ?>
        <tr valign="top" class="ifweac_sidebar_title">
            <th scope="row"><?php echo esc_html__('Plugin Sidebar Text :', 'ifweac-accessibility');?></th>
            <td>
                <input type="text" placeholder="Accessibility" name="ifweac_sidebar_title" id="ifweac_sidebar_title" value="<?php if(isset($ifweac_sidebar_title) && !empty($ifweac_sidebar_title)) { echo esc_html($ifweac_sidebar_title); } ?>">
                <label for="ifweac_sidebar_title"></label>
            </td>           
        </tr> 
        <!-- HTML for siderbar display location field -->
        <?php
        $ifweac_enable_btn_image = get_option('ifweac_enable_btn_image');
        ?>
        <tr valign="top">            
            <th scope="row"><?php echo esc_html__('Enable Sidebar Button Image?', 'ifweac-accessibility');?></th>
            <td>                
                <label class="ifweac_switch">
                  <input type="checkbox" id="ifweac_enable_btn_image" name="ifweac_enable_btn_image" value="yes" <?php if($ifweac_enable_btn_image == 'yes') echo esc_html__("checked=checked",'ifweac-accessibility'); ?>>
                  <span class="ifweac_slider ifweac_round"></span>
                </label>                
            </td>       
        </tr>
        <tr valign="top" class="ifweac_sidebar_icon">
            <th scope="row">Upload Image:</th>
            <td>
            <?php
                $ifweac_sidebar_icon = get_option('ifweac_sidebar_icon');
                ?>
                <input type="text" name="ifweac_sidebar_icon" class="ifweac_sidebar_icon_val" value="<?php echo esc_attr($ifweac_sidebar_icon); ?>" />
                <input type="button" class="button button-secondary" value="Upload Image" id="ifweac_upload_image_button" />
                <div class="ifweac_image-wrap">
                <?php
                if (!empty($ifweac_sidebar_icon))
                    { 
                        $ifweac_close_icon = IFWEAC_PATH .'/site-accessibility/assets/images/admin/close.svg';
                        ?>
                    <img src='<?php echo esc_url($ifweac_sidebar_icon);?>' width='150' height='150' id='ifweac_thumb' name='ifweac_user_profile'>
                    <a class='ifweac_remove-image' style='display: inline;'><img src='<?php echo esc_url($ifweac_close_icon);?>'></a>                     
                <?php } ?>
                </div>  
            </td>             
        </tr>
        <!-- HTML for sidebar_icon color -->
        <?php $ifweac_select_sidebar_icon_color = get_option('ifweac_select_sidebar_icon_color');?>
        <tr valign="top" class="ifweac_selects_sidebar_icon_color">
            <th scope="row"><?php echo esc_html__('Select Sidebar Icon color', 'ifweac-accessibility');?></th>
            <td>
                <input class="ifweac_select_sidebar_icon_color" name="ifweac_select_sidebar_icon_color" type="text" value="<?php if(isset($ifweac_select_sidebar_icon_color) && !empty($ifweac_select_sidebar_icon_color)) { echo esc_attr($ifweac_select_sidebar_icon_color);} else { ?>#086db3<?php } ?>" data-default-color="#fff" />         
            </td>
        </tr>
        <?php
        $ifweac_title = get_option('ifweac_title');
        ?>
        <tr valign="top" class="ifweac_accessibility_title">
        	<th scope="row"><?php echo esc_html__('Plugin Title Text :', 'ifweac-accessibility');?></th>
        	<td>
        		<input type="text" placeholder="iFlair Accessibility" name="ifweac_title" id="ifweac_title" value="<?php if(isset($ifweac_title) && !empty($ifweac_title)) { echo esc_attr($ifweac_title); } ?>">
        		<label for="ifweac_title"></label>
        	</td>        	
        </tr> 
        <!-- HTML for siderbar display location field -->
        <?php
        $ifweac_enable_position = get_option('ifweac_enable_position');
        ?>
        <tr valign="top">
            <th scope="row"><?php echo esc_html__('Where do you want to show?', 'ifweac-accessibility');?></th>
            <td>
                <div class="ifweac_pos-main"> 
                    <div class="ifweac_pos-inner">
                        <input type="radio" id="ifweac_pos_top_left" name="ifweac_enable_position" value="Top Left" <?php if(!empty($ifweac_enable_position && $ifweac_enable_position == 'Top Left')) echo esc_html__("checked=checked",'ifweac-accessibility'); ?><?php if(empty($ifweac_enable_position)) echo esc_html__("checked=checked",'ifweac-accessibility');?> />
                        <label for="ifweac_pos_top_left"><?php echo esc_html__('Top Left', 'ifweac-accessibility');?></label>
                    </div>
                    <div class="ifweac_pos-inner">
                        <input type="radio" id="ifweac_pos_bottom_left" name="ifweac_enable_position" value="Bottom Left" <?php if(!empty($ifweac_enable_position && $ifweac_enable_position == 'Bottom Left')) echo esc_html__("checked=checked",'ifweac-accessibility');?> />
                        <label for="ifweac_pos_bottom_left"><?php echo esc_html__('Bottom Left', 'ifweac-accessibility');?></label>
                    </div>
                    <div class="ifweac_pos-inner">
                        <input type="radio" id="ifweac_pos_top_right" name="ifweac_enable_position" value="Top Right" <?php if(!empty($ifweac_enable_position && $ifweac_enable_position == 'Top Right')) echo esc_html__("checked=checked",'ifweac-accessibility'); ?> />
                        <label for="ifweac_pos_top_right"><?php echo esc_html__('Top Right', 'ifweac-accessibility');?></label>
                    </div>
                    <div class="ifweac_pos-inner">
                        <input type="radio" id="ifweac_pos_bottom_right" name="ifweac_enable_position" value="Bottom Right"<?php if(!empty($ifweac_enable_position && $ifweac_enable_position == 'Bottom Right')) echo esc_html__("checked=checked",'ifweac-accessibility'); ?> />
                        <label for="ifweac_pos_bottom_right"><?php echo esc_html__('Bottom Right', 'ifweac-accessibility');?></label>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <!-- End Table code -->
    <?php submit_button(); ?>
</form>
<!-- End Start default page form -->