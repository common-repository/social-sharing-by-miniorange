<?php

ob_start();

require('CustomerOpenID.php');
require('view/soc_sha/soc_apps/mo_openid_sharing.php');
require('view/soc_sha/share_cnt/mo_openid_shrcnt.php');
require('view/soc_sha/cust_text/mo_openid_cust_shricon.php');
require('view/soc_sha/disp_shropt/mo_openid_disp_shropt.php');
require('view/soc_sha/shrt_co/mo_openid_shrtco.php');
require('view/soc_com/com_Cust/mo_openid_comm_cust.php');
require('view/soc_com/com_display_options/mo_openid_comm_disp_opt.php');
require('view/soc_com/com_select_app/mo_openid_comm_select_app.php');
require('view/soc_com/com_Enable/mo_openid_comm_enable.php');
require('view/soc_com/com_shrtco/comm_shrtco.php');
require ('view/soc_sha/email_subs/mo_openid_email_subscription.php');
require ('view/soc_sha/soc_med_ser/mo_openid_soc_med_ser.php');
require ('view/soc_sha/custom_share_option/mo_openid_custom_share_option.php');
require ('view/soc_sha/advan_cust/mo_openid_advance_cust.php');
require('view/soc_sha/licensing_plans/mo_openid_lic_plans.php');
require('view/soc_sha/gdpr/mo_openid_sh_gdpr.php');
require('view/soc_sha/follow_us_button/mo_openid_follow_us_button.php');
require('view/soc_sha/mo_autopost/discord_autopost.php');

function mo_ss_register_sharing_openid()
{
    if (sanitize_text_field(isset($_GET['tab'])) && sanitize_text_field($_GET['tab']) !== 'register') {
        $active_tab = sanitize_text_field($_GET['tab']);
    } else {
        $active_tab = 'soc_apps';
    }

    if($active_tab != 'license_plan')
    {
    ?>
    <div>
        <table>
            <tr>
                <td><img id="logo" style="margin-top: 25px"
                         src="<?php echo plugin_dir_url(__FILE__); ?>includes/images/logo.png"></td>
                <td>&nbsp;<a style="text-decoration:none" href="https://plugins.miniorange.com/"
                             target="_blank"><h1 style="color: #c9302c"><?php echo sh_mo_sl('miniOrange Social Sharing');?></h1></a></td>
            </tr>
        </table>
    </div>

    <div style="width: 100%">

        <div style="width: 15%; float: left; background-color: #32373C; border-radius: 15px 0px 0px 15px;">
            <div style="height:54px;margin-top: 9px;border-bottom: 0px;text-align:center;">
                <div><img style="float:left;margin-left:8px;width: 43px;height: 45px;padding-top: 5px;"
                          src="<?php echo plugins_url('includes/images/logo.png"', __FILE__); ?>"></div>
                <br>
                <span style="font-size:20px;color:white;float:left;"><?php echo sh_mo_sl('miniOrange');?></span>
            </div>

            <div class="mo_openid_tab" style="min-height:395px;width:100%; height: 445px;border-radius: 0px 0px 0px 15px;">
                <a id="social_apps" class="tablinks<?php if ($active_tab == "soc_apps") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'soc_apps'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Select
                    Social Apps');?></a>
                <a id="customization"
                   class="tablinks<?php if ($active_tab == "customization") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'customization'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Customization of 
                   Icons');?>
                </a>

                <a id="display_opt" class="tablinks<?php if ($active_tab == "display_opt") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'display_opt'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Display
                    Option');?></a>
                <a id="woocomm_product_page" class="tablinks<?php if ($active_tab == "woocomm_product_page") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'woocomm_product_page'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Woocommerce Product Page');?></a>
                <a id="follow_us_button" class="tablinks<?php if ($active_tab == "follow_us_button") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'follow_us_button'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Follow Us Button');?></a>
                <a id="short_code" class="tablinks<?php if ($active_tab == "vertical_icon") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'vertical_icon'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Vertical Share Icons');?></a>
                <a id="share_cnt" class="tablinks<?php if ($active_tab == "share_cnt") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'share_cnt'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Social
                    Share Counts');?></a>
                <a id="short_code" class="tablinks<?php if ($active_tab == "short_code") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'short_code'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Shortcodes');?></a>
                <a id="soc_med_ser" class="tablinks<?php if ($active_tab == "soc_med_ser") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'soc_med_ser'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Social sharing service');?><span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>
                <a id="autopost" class="tablinks<?php if ($active_tab == "autopost") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'autopost'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Discord Auto post');?><span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>
                <a id="adv_opt" class="tablinks<?php if ($active_tab == "adv_opt") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'adv_opt'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Advance Icon');?><span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>

                <a id="email_sub" class="tablinks<?php if ($active_tab == "email_sub") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'email_sub'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Email Subscription');?><span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>

                <a id="cust_icon_opt" class="tablinks<?php if ($active_tab == "cust_icon_opt") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'cust_icon_opt'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Add Share Application ');?><span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>
                <a id="gdpr" class="tablinks<?php if($active_tab=="gdpr") echo '_active';?>"
                 href="<?php echo add_query_arg( array('tab' => 'gdpr'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('GDPR');?> <span style="margin-left: 1%" class="mo-openid-premium"><?php echo sh_mo_sl('PRO');?></span></a>

                
                <a id="profile" class="tablinks<?php if ($active_tab == "profile") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'profile'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('User profile');?><span style="margin-left: 1%" class="mo_sh_openid_profile"></span></a>
                <a id="license_plan" class="tablinks<?php if ($active_tab == "license_plan") echo '_active'; ?>"
                   href="<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>"><?php echo sh_mo_sl('Licensing Plan');?></a>
            </div>
        </div>

        <div id="mo_openid_settings" style="width: 85%; float: right;">
            <div style="background-color: #FFFFFF;width: 90%;border-radius: 0px 15px 15px 0px;">
                <div class="mo_container">
                    <h3 id="mo_openid_page_heading" class="mo_openid_highlight" style="color: white;margin: 0;padding: 23px;border-radius: 0px 15px 0px 0px;">&nbsp</h3>
                    <div id="mo_openid_msgs"></div>
                    <table style="width:100%;">
                        <?php }
                        else { ?>

                            <div style="text-align:center;"><h1>Social Sharing Plugin</h1></div>
                            <div><a style="margin-top: 0px;background: #d0d0d0;border-color: #1162b5;color: #151515; float: left" class="button" onclick="window.location='<?php echo site_url();?>'+'/wp-admin/admin.php?page=mo_ss_openid_settings'"><span class="dashicons dashicons-arrow-left-alt" style="vertical-align: middle;"></span><b style="font-size: 15px;"> &nbsp;&nbsp;Back To Plugin Configuration</b></a></div>
                            <div style="text-align:center; color: rgb(233, 125, 104); margin-top: 55px; font-size: 23px"> You are currently on the Free version of the plugin <br> <br><span style="font-size: 20px; ">
                    <li style="color: dimgray; margin-top: 0px;list-style-type: none;">
                        <div class="mo_openid-quote">
                           <p>
                               <span onclick="void(0);" class="mo_openid-check-tooltip" style="font-size: 15px">Why should I upgrade?
                                <span class="mo_openid-info">
                                    <span class="mo_openid-pronounce">Why should I upgrade to premium plugin?</span>
                                    <span class="mo_openid-text">Upgrading lets you access all of our features such as Integration, Follow us Buttons etc.</span>
                                </span>
                            </span> </p>
                       </div>
                        <br><br>
                    </li>
                            </div>

                        <?php }?>
                        <tr>
                            <td style="vertical-align:top;">
                                <?php
                                switch ($active_tab) {
                                    case 'soc_apps':
                                        mo_ss_openid_share_apps();
                                        break;
                                    case 'share_cnt':
                                        mo_ss_openid_share_cnt();
                                        break;
                                    case 'customization':
                                        mo_ss_openid_customize_icons();
                                        break;
                                    case 'display_opt':
                                        mo_ss_openid_display_share_opt();
                                        break;
                                    case 'woocomm_product_page':
                                        mo_ss_woocommerce_product_share();
                                        break;
                                    case 'vertical_icon':
                                        mo_ss_vertical_share_shortcode_2();
                                        break;
                                    case 'follow_us_button':
                                        mo_ss_openid_followus_button3();
                                        break;
                                    case 'autopost':
                                        mo_discord_autopost();
                                        break;
                                    case 'short_code':
                                        mo_ss_openid_short_code();
                                        break;
                                    case 'adv_opt':
                                        mo_ss_openid_advance_icons_customization();
                                        break;
                                    case 'email_sub':
                                        mo_ss_openid_email_subscription();
                                        break;
                                    case 'soc_med_ser':
                                        mo_ss_openid_soc_med_ser();
                                        break;
                                    case 'cust_icon_opt':
                                        mo_ss_openid_cust_icon_opt();
                                        break;
                                    case 'gdpr':
                                        mo_openid_sh_gdpr();
                                        break;
                                    case 'licensing_plans':
                                        mo_ss_openid_licensing_plans();
                                        break;
                                    case  'profile':
                                        mo_ss_openid_profile();
                                        break;
                                    case 'license_plan':
                                        mo_ss_openid_licensing_plans();
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <input type="button" id="myBtn" class="support-help-button" data-show="false" onclick="mo_openid_support_form('')" value="<?php echo sh_mo_sl('NEED HELP');?>">

    </div>
    <?php include('view/support_form/miniorange_openid_support_form.php');?>
    <script>
        jQuery("#contact_us_phone").intlTelInput();
        function mo_openid_support_form(abc) {
            jQuery("#contact_us_phone").intlTelInput();
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            var btn=document.getElementById("myBtn");
            btn.style.display="none";
            var span = document.getElementsByClassName("mo_support_close")[0];
            span.onclick = function () {
                modal.style.display = "none";
                btn.style.display="block";
            }
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    btn.style.display="block";
                }
            }
        }
        function wordpress_support() {
            window.open("https://wordpress.org/support/plugin/miniorange-social-sharing","_blank");

        }
        function faq_support(){
            window.open("https://faq.miniorange.com/kb/social-login", "_blank");
        }

        function mo_openid_valid_query(f) {
            !(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(/[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;

        }
    </script>
    <?php

}

function mo_ss_comment_openid() {
    if( isset( $_GET[ 'tab' ]) && $_GET[ 'tab' ] !== 'register' ) {
        $active_tab = sanitize_text_field($_GET[ 'tab' ]);
    } else {
        $active_tab = 'select_applications';
    }
    ?>
    <div>

            <table>
                <tr>
                    <td><img id="logo" style="margin-top: 25px"
                             src="<?php echo plugin_dir_url(__FILE__); ?>includes/images/logo.png"></td>
                    <td>&nbsp;<a style="text-decoration:none" href="https://plugins.miniorange.com/"
                                 target="_blank"><h1 style="color: #c9302c"><?php echo sh_mo_sl('miniOrange Social Sharing');?></h1></a></td>
                    <td>
                </tr>
            </table>

    </div>
    <div style="width: 100%">

        <div style="width: 15%; float: left; background-color: #32373C; border-radius: 15px 0px 0px 15px;">
            <div style="height:54px;margin-top: 9px;border-bottom: 0px;text-align:center;">
                <div><img style="float:left;margin-left:8px;width: 43px;height: 45px;padding-top: 5px;" src="<?php echo plugins_url( 'includes/images/logo.png"', __FILE__ ); ?>"></div>
                <br>
                <span style="font-size:20px;color:white;float:left;"><?php echo sh_mo_sl('miniOrange');?></span>
            </div>
            <div class="mo_openid_tab" style="min-height:395px;width:100%; height: 445px;border-radius: 0px 0px 0px 15px;">
                <a id="select_applications" class="tablinks<?php if($active_tab=="select_applications") echo '_active';?>" href="<?php echo add_query_arg( array('tab' => 'select_applications'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('Select Applications');?></a>
                <a id="display_options" class="tablinks<?php if($active_tab=="display_options") echo '_active';?>" href="<?php echo add_query_arg( array('tab' => 'display_options'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('Display options');?></a>
                <a id="customize_text" class="tablinks<?php if($active_tab=="customize_text") echo '_active';?>" href="<?php echo add_query_arg( array('tab' => 'customize_text'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('Customization');?></a>
                <a id="enable_comment" class="tablinks<?php if($active_tab=="enable_comment") echo '_active';?>" href="<?php echo add_query_arg( array('tab' => 'enable_comment'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('Enable and Add Social Comments');?></a>
                <a id="comment_shortcode" class="tablinks<?php if($active_tab=="comment_shortcode") echo '_active';?>" href="<?php echo add_query_arg( array('tab' => 'comment_shortcode'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('Shortcodes');?></a>



            </div>
        </div>

        <div id="mo_openid_settings" style="width: 85%; float: right;">
            <div style="background-color: #FFFFFF;width: 90%;border-radius: 0px 15px 15px 0px;">
                <div class="mo_container">
                    <h3 id="mo_openid_page_heading" class="mo_openid_highlight" style="color: white;margin: 0;padding: 23px;border-radius: 0px 15px 0px 0px;">&nbsp</h3>
                    <div id="mo_openid_msgs"></div>
                    <table style="width:100%;">
                        <tr>
                            <td style="vertical-align:top;">
                                <?php
                                switch ($active_tab) {
                                    case 'select_applications':
                                        mo_ss_select_comment_app();
                                        break;
                                    case 'display_options':
                                        mo_ss_select_comment_disp();
                                        break;
                                    case 'customize_text':
                                        mo_ss_select_comment_customize();
                                        break;
                                    case 'enable_comment':
                                        mo_ss_select_comment_enable();
                                        break;
                                    case 'comment_shortcode':
                                        mo_ss_select_comment_shortcode();
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


        </div></div>

    <input type="button" id="myBtn" class="support-help-button" data-show="false" onclick="mo_openid_support_form('')" value="<?php echo sh_mo_sl('NEED HELP');?>">

    <?php include('view/support_form/miniorange_openid_support_form.php');?>
    <script>
        function moSharingSizeValidate(e){
            var t=parseInt(e.value.trim());t>60?e.value=60:10>t&&(e.value=10)
        }
        function moSharingSpaceValidate(e){
            var t=parseInt(e.value.trim());t>50?e.value=50:0>t&&(e.value=0)
        }
        function moLoginSizeValidate(e){
            var t=parseInt(e.value.trim());t>60?e.value=60:20>t&&(e.value=20)
        }
        function moLoginSpaceValidate(e){
            var t=parseInt(e.value.trim());t>60?e.value=60:0>t&&(e.value=0)
        }
        function moLoginWidthValidate(e){
            var t=parseInt(e.value.trim());t>1000?e.value=1000:140>t&&(e.value=140)
        }
        function moLoginHeightValidate(e){
            var t=parseInt(e.value.trim());t>50?e.value=50:35>t&&(e.value=35)
        }
        jQuery(document).ready(function(){
            let sel = jQuery(".mo_support_input_container");
            sel.each(function(){
                if(jQuery(this).find(".mo_support_input").val() !== "")
                    jQuery(this).addClass("mo_has_value");
            });
            sel.focusout( function(){
                if(jQuery(this).find(".mo_support_input").val() !== "")
                    jQuery(this).addClass("mo_has_value");
                else jQuery(this).removeClass("mo_has_value");
            });
        });
    </script>
    <script>
        jQuery(document).ready(function ()
        {
            jQuery("#bkgOverlay").delay(4800).fadeIn(400);
            jQuery("#mo_openid_rateus_myModal").delay(5000).fadeIn(400);

            jQuery("#btnClose").click(function (e)
            {
                HideDialog();
                e.preventDefault();
            });
        });
        //Controls how the modal popup is closed with the close button
        function HideDialog()
        {
            $("#bkgOverlay").fadeOut(400);
            $("#delayedPopup").fadeOut(300);
        }

    </script>
    <script>
        jQuery("#contact_us_phone").intlTelInput();
        function mo_openid_support_form(abc) {
            jQuery("#contact_us_phone").intlTelInput();
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            var btn=document.getElementById("myBtn");
            btn.style.display="none";
            var span = document.getElementsByClassName("mo_support_close")[0];
            span.onclick = function () {
                modal.style.display = "none";
                btn.style.display="block";
            }
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    btn.style.display="block";
                }
            }
        }
        function wordpress_support() {
            window.open("https://wordpress.org/support/plugin/miniorange-social-sharing","_blank");

        }
        function faq_support(){
            window.open("https://faq.miniorange.com/kb/social-login", "_blank");
        }

        function mo_openid_valid_query(f) {
            !(/^[a-zA-Z?,.\(\)\/@ 0-9]*$/).test(f.value) ? f.value = f.value.replace(/[^a-zA-Z?,.\(\)\/@ 0-9]/, '') : null;

        }
    </script>

    <?php

}
