<?php
function mo_ss_openid_display_share_opt(){
    ?>

    <br>
    <form id="share_display" name="share_display" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_enable_share_display" />
        <input type="hidden" name="mo_openid_enable_share_display_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-enable-share-display-nonce' ); ?>"/>

        <div class="mo_openid_table_layout" style="max-height: 100%" >
            <table style="height: 200%">
                <style>
                    #upleft {
                        width:45%;
                        height:340px;
                        background:white;
                        float:left;
                        border: 1px transparent;
                    }
                    #upright {
                        width:45%;
                        height:340px;
                        background:white;
                        float:right;
                        border: 1px transparent;
                    }
                    #below {
                        height:available;
                        display: inline;
                        width:100%;
                        background:white;
                        float:right;
                        border: 1px transparent;
                        padding-bottom: 10px;
                    }
                    #above{
                        height:50px;
                        width:100%;
                        background:white;
                        float:right;
                        border: 1px transparent;
                    }
                </style>
                <div id="above">
                    <strong style="font-size: 14px"><?php echo sh_mo_sl('Select the options where you want to display social share icons');?></strong>
                </div>
                <div id="upleft" style="font-size: 14px;">


                    <label class="mo_openid_checkbox_container"> <?php echo sh_mo_sl('Home Page');?>
                        <input type="checkbox" id="mo_apps_home_page"  name="mo_share_options_home_page"  value="1"  <?php checked( get_option('mo_share_options_enable_home_page') == 1 );?>>
                        <span class="mo_openid_checkbox_checkmark"></span>
                    </label>
                    <div style="margin-left: 8%">

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_home_page_position" value="before"  <?php checked( get_option('mo_share_options_home_page_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_home_page_position" value="after"  <?php checked( get_option('mo_share_options_home_page_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            <input type="radio" id="mo_apps_posts_options"  name="mo_share_options_home_page_position" value="both"  <?php checked( get_option('mo_share_options_home_page_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                    </div>

                    <br>


                    <label class="mo_openid_checkbox_container"> <?php echo sh_mo_sl('Blog Post');?>
                        <input type="checkbox" id="mo_apps_posts"  name="mo_share_options_post" value="1"  <?php checked( get_option('mo_share_options_enable_post') == '1' );?>>
                        <span class="mo_openid_checkbox_checkmark"></span>
                    </label>
                    <div style="margin-left: 8%">


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_enable_post_position" value="before"  <?php checked( get_option('mo_share_options_enable_post_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_enable_post_position" value="after"  <?php checked( get_option('mo_share_options_enable_post_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>



                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_enable_post_position" value="both"  <?php checked( get_option('mo_share_options_enable_post_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>
                    </div>

                    <br>

                    <label class="mo_openid_checkbox_container"> <?php echo sh_mo_sl('Static Pages');?>
                        <input type="checkbox" id="mo_apps_static_page"  name="mo_share_options_static_pages"  value="1"  <?php checked( get_option('mo_share_options_enable_static_pages') == 1 );?>>
                        <span class="mo_openid_checkbox_checkmark"></span>
                    </label>
                    <div style="margin-left: 8%">


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_static_pages_position" value="before"  <?php checked( get_option('mo_share_options_static_pages_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_static_pages_position" value="after"  <?php checked( get_option('mo_share_options_static_pages_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_static_pages_position" value="both"  <?php checked( get_option('mo_share_options_static_pages_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>
                    </div>
                    <br>
                </div>
                <div id="upright" style="font-size: 14px;">
                    <br>
                    <label class="mo_openid_checkbox_container" ">  <?php echo sh_mo_sl('BBPress Forums Page');?>
                    <input type="checkbox" id="mo_apps_bb_forum"  name="mo_share_options_bb_forum"  value="1"  <?php checked( get_option('mo_share_options_bb_forum') == 1 );?>>
                    <span class="mo_openid_checkbox_checkmark "></span>
                    </label>
                    <div style="margin-left: 8%">
                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_forum_position" value="before"  <?php checked( get_option('mo_share_options_bb_forum_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_forum_position" value="after" <?php checked( get_option('mo_share_options_bb_forum_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_forum_position" value="both"  <?php checked( get_option('mo_share_options_bb_forum_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>
                    </div>
                    <br>

                    <label class="mo_openid_checkbox_container"> <?php echo sh_mo_sl('BBPress Topic Page');?>
                        <input type="checkbox" id="mo_apps_bb_topic"  name="mo_share_options_bb_topic"  value="1"  <?php checked( get_option('mo_share_options_bb_topic') == 1 );?>>
                        <span class="mo_openid_checkbox_checkmark"></span>
                    </label>
                    <div style="margin-left: 8%">
                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            <input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_topic_position" value="before"  <?php checked( get_option('mo_share_options_bb_topic_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            <input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_topic_position" value="after"  <?php checked( get_option('mo_share_options_bb_topic_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_topic_position" value="both"  <?php checked( get_option('mo_share_options_bb_topic_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                    </div>

                    <br>


                    <label class="mo_openid_checkbox_container"> <?php echo sh_mo_sl('BBPress Reply Page');?>
                        <input type="checkbox" id="mo_apps_bb_reply"  name="mo_share_options_bb_reply"  value="1"  <?php checked( get_option('mo_share_options_bb_reply') == 1 );?>>
                        <span class="mo_openid_checkbox_checkmark"></span>
                    </label>

                    <div style="margin-left: 8%">

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Before content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_reply_position" value="before"  <?php checked( get_option('mo_share_options_bb_reply_position') == 'before' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('After content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_reply_position" value="after"  <?php checked( get_option('mo_share_options_bb_reply_position') == 'after' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>


                        <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Both before and after content');?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="mo_apps_posts_options"  name="mo_share_options_bb_reply_position" value="both"  <?php checked( get_option('mo_share_options_bb_reply_position') == 'both' );?>>
                            <span class="mo-openid-radio-checkmark"></span></label>

                    </div>
                </div>
                <br>
                <div id="below">
                  <br>  <p class="mo_openid_note_style" ><strong><?php echo sh_mo_sl('NOTE');?>:</strong> <?php echo sh_mo_sl('The icons in above pages will be placed horizontally. For vertical icons, add ');?><b><?php echo sh_mo_sl('miniOrange Sharing - Vertical');?></b> <?php echo sh_mo_sl('widget from Appearance->Widgets.');?></p>

                </div>
                <tr>
                    <td><br /><b><input type="submit" name="submit" value="<?php echo sh_mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" /></b>
                    </td>
                </tr>

            </table>
        </div>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Display Options');?>');
    </script>

    <?php
}

function mo_ss_woocommerce_product_share(){
    ?>

    <form id="woocomm_single_pro_page" name="woocomm_single_pro_page" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_enable_share_woocomm_pro_page" />
        <input type="hidden" name="mo_openid_enable_share_woocomm_pro_page_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-enable-share-woocomm-pro-page-nonce' ); ?>"/>
        <div class="mo_openid_wc_sh_table_layout"><br/>
            <div style="background:white; border: 1px transparent;">
                <table style="border-spacing: 50px 0;  border-collapse: separate;">
                    <tr>
                        <td >
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container">
                                <input type="checkbox" id="mo_share_woo_top_pro_option" name="mo_share_woo_top_pro_option" value="1" <?php checked( get_option('mo_share_woo_top_pro_option') == 1 );?> />
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("Top of Individual Product Page");?>
                                </div>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <br>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/before_product_page.png'; ?>">
                                </div>
                            </label>
                        </td>
                        <td>
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container">
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("After Category on Individual Product Page");?>
                                </div>
                                <input type="checkbox"  id="mo_share_woo_after_category_option" name="mo_share_woo_after_category_option" value="1" <?php checked( get_option('mo_share_woo_after_category_option') == 1 );?> /><br>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/after_category.png';?>">
                                </div>
                            </label>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container">
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("After Every Product On Shop Page");?>
                                </div>
                                <input type="checkbox"  id="mo_share_options_wc_product" name="mo_share_options_wc_product" value="1" <?php checked( get_option('mo_share_options_wc_product') == 1 );?> /><br>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/after_product_shop.png';?>">
                                </div>
                            </label>
                        </td>

                        <td>
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container">
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("After Add Cart on Individual Product Page");?>
                                </div>
                                <input type="checkbox"  id="mo_share_woo_after_add_cart_option" name="mo_share_woo_after_add_cart_option" value="1" <?php checked( get_option('mo_share_woo_after_add_cart_option') == 1 );?> /><br>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/after_cart.png';?>">
                                </div>
                            </label>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container_disable">
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("After Short Description on Individual Product Page");?><span style="margin-left: 1%;position: inherit" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span>
                                </div>
                                <input type="checkbox"  id="mo_share_woo_after_sh_dis_option" name="mo_share_woo_after_sh_dis_option" value="1" <?php checked( get_option('mo_share_woo_after_sh_dis_option') == 1 );?> /><br>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/after_sh_dis.png';?>">
                                </div>
                            </label>
                        </td>
                        <td>
                            <label style="padding-left: 0px;" class="mo_openid_checkbox_container_disable">
                                <div style="padding-left: 7%;font-weight: bold">
                                    <?php echo sh_mo_sl("After Product Name on Individual Product Page");?><span style="margin-left: 1%; position: inherit" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span>
                                </div>
                                <input type="checkbox"  id="mo_share_woo_after_pro_name_option" name="mo_share_woo_after_pro_name_option" value="1" <?php checked( get_option('mo_share_woo_after_pro_name_option') == 1 );?> /><br>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <div>
                                    <img class="mo_openid_wco_pro_images" src="<?php echo plugin_dir_url(dirname(dirname(__dir__)) ). 'includes/images/icons/woo_share/after_product_name.png';?>">
                                </div>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br><center>
            <input style="width: 200px" type="submit" value="<?php echo sh_mo_sl('Save');?> "  class="button button-primary button-large" />
        </center>
        <br><br>
    </form>
    <script>
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('WooCommerce Product Page');?>');
    </script>
    <?php
}
function mo_ss_vertical_share_shortcode_2(){
    ?>
    <div style="margin-left: 1.5%">
        <h3>Default Vertical Icons</h3>
        <p class="mo_openid_note_style">Copy <code id="2">[miniorange_social_sharing_vertical]</code><i style= "width: 11px;height: 9px;padding-left:2px;padding-top:3px" class="mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip" onclick="copyToClipboard(this, '#2', '#shortcode_url2_copy')"><span id="shortcode_url2_copy" class="mo_copytooltiptext">Copy to Clipboard</span></i> the shortcode and paste on the page where you want to display Vertical Sharing Icons</p>
    </div>
    <img src=" <?php echo plugin_dir_url(dirname(dirname(dirname(__FILE__)))).'includes/images/icons/rec_1.gif'; ?> " style="margin-left: 1.5%">
    <br>
    <div style="margin-left: 1.5%">
        <h3>Customize Vertical Icons</h3>
        <p class="mo_openid_note_style">Select Customized Icon from custization tab and Copy <code id="2">[miniorange_social_sharing_vertical]</code><i style= "width: 11px;height: 9px;padding-left:2px;padding-top:3px" class="mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip" onclick="copyToClipboard(this, '#2', '#shortcode_url2_copy')"><span id="shortcode_url2_copy" class="mo_copytooltiptext">Copy to Clipboard</span></i> the shortcode and paste on the page where you want to display Vertical Sharing Icons</p>
    </div>
    <img src=" <?php echo plugin_dir_url(dirname(dirname(dirname(__FILE__)))).'includes/images/icons/rec_2.gif';?> " style="margin-left: 1.5%">
    <script>
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Vertical Share Icons');?>');
        function copyToClipboard(copyButton, element, copyelement) {
            var temp = jQuery("<input>");
            jQuery("body").append(temp);
            temp.val(jQuery(element).text()).select();
            document.execCommand("copy");
            temp.remove();
            jQuery(copyelement).text("Copied");
            jQuery(copyButton).mouseout(function(){
                jQuery(copyelement).text("Copy to Clipboard");
            });
        }
    </script>
    <?php

}

?>