<?php
function  mo_ss_openid_soc_med_ser(){
    ?>

    <form id="social_media_services" name="social_media_services" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_social_media_services" />
        <input type="hidden" name="mo_openid_social_media_services_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-social-media-services-nonce' ); ?>"/>
        <div style="height: auto; padding: 20px 20px 20px 20px; "><table style="width:60%">
                <label style="cursor: auto" class="mo_openid_note_style">&nbsp;&nbsp;&nbsp;<?php echo sh_mo_sl('Enable this feature to users will get option for like, recommend and pin your website page on facebook and pinterest');?>.</label>
                <h2>Social Sharing Services <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a></h2><br>
                <tr>
                    <td><input type="checkbox" class="app_enable" id="mo_openid_facebook_like" name="mo_openid_facebook_like" <?php checked(get_option('mo_openid_facebook_like') == 'on'); ?> disabled><img src="<?php echo mo_ss_plugin_url . 'share_icons/facebook_like.png' ?>"
                        ></td>
                    <td><input type="checkbox" id="mo_openid_facebook_recommend" name="mo_openid_facebook_recommend" <?php checked(get_option('mo_openid_facebook_recommend') == 'on'); ?> disabled><img src="<?php echo mo_ss_plugin_url . 'share_icons/facebook_recommend.png' ?>" ></td>
                    <td><input type="checkbox" id="mo_openid_pinterest_pin" name="mo_openid_pinterest_pin" <?php checked(get_option('mo_openid_pinterest_pin') == 'on'); ?> disabled><img src="<?php echo mo_ss_plugin_url . 'share_icons/pinterest_pin.png' ?>" ></td>
                </tr></table>
            <p>Copy and paste this <b>[social-share-service]</b> shortcode in page for social sharing feature</p>
        </div>
        <div class="mo_openid_table_layout">

            <table>
                <br>
                <h2>Twitter Follow Button <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a></h2><br>

                <label class="mo_openid_checkbox_container_disable">
                    <input disabled type="checkbox" id="mo_openid_twitter_btn" /><?php echo sh_mo_sl("Enable Twitter Follow Button");?>
                    <span class="mo_openid_checkbox_checkmark"></span>
                </label>
                <tr>
                    <td>Where Twitter Follow Button will be displayed:</td>
                    <td><select disabled name="mo_openid_twitter_follow_position_button" id="position_button" >
                            <option disabled value="before"<?php if (get_option('mo_openid_twitter_follow_position_button') === "before"){ echo "selected";}?>>Before Content</option>
                            <option disabled value="after" <?php if (get_option('mo_openid_twitter_follow_position_button') === "after"){ echo "selected";}?>>After Content</option>
                            <option disabled value="before_and_after" <?php if (get_option('mo_openid_twitter_follow_position_button') === "before_and_after"){ echo "selected";}?>>Before and After</option>
                        </select>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr>

                    <td>Custom CSS for &lt;div&gt; (i.e. float: right;):</td>
                    <td><input disabled id="own_css" name="mo_openid_twitter_follow_own_css" value="<?php echo get_option('mo_openid_twitter_follow_own_css');?>";></td>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr >
                    <td>What's your user name?</td>
                    <td><input disabled size="32" id="screen_name" name="mo_openid_twitter_follow_screen_name" value="<?php echo get_option('mo_openid_twitter_follow_screen_name');?>"></td>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>

                <tr>
                    <td>What color background will be used?</td>
                    <td><select disabled name="mo_openid_twitter_follow_data_button_background" id="data_button" >
                            <option disabled value="grey" <?php if (get_option('mo_openid_twitter_follow_data_button_background') === "grey"){ echo "selected";}?>>dark</option>
                            <option disabled value="blue"  <?php if (get_option('mo_openid_twitter_follow_data_button_background') === "blue"){ echo "selected";}?> >light</option>
                        </select>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr>
                    <td>Text color?</td>
                    <td><input disabled size="10" id="text_color" name="mo_openid_twitter_follow_data_text_color" value="<?php echo get_option('mo_openid_twitter_follow_data_text_color');?>"></td>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr>
                    <td>Link color?</td>
                    <td><input disabled size="10" id="link_color" name="mo_openid_twitter_follow_data_link_color" value="<?php echo get_option('mo_openid_twitter_follow_data_link_color');?>"></td>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>

                <tr >
                    <td>Show follower count?</th>
                    <td><select disabled name="mo_openid_twitter_follow_data_show_count" id="data_show_count" >
                            <option disabled value="true" <?php if (get_option('mo_openid_twitter_follow_data_show_count') === "true"){ echo "selected";}?> >true</option>
                            <option disabled value="false" <?php if (get_option('mo_openid_twitter_follow_data_show_count') === "false"){ echo "selected";}?>>false</option>
                        </select>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>

                <tr>
                    <td>Language options</td>
                    <td>
                        <select disabled name="mo_openid_twitter_follow_lang" id="lang" >
                            <option disabled value="en" <?php if (get_option('mo_openid_twitter_follow_lang') === "en"){ echo "selected";}?>>English</option>
                            <option disabled value="fr" <?php if (get_option('mo_openid_twitter_follow_lang') === "fr"){ echo "selected";}?>>French</option>
                            <option disabled value="de" <?php if (get_option('mo_openid_twitter_follow_lang') === "de"){ echo "selected";}?>>German</option>
                            <option disabled value="it" <?php if (get_option('mo_openid_twitter_follow_lang') === "it"){ echo "selected";}?>>Italian</option>
                            <option disabled value="ja" <?php if (get_option('mo_openid_twitter_follow_lang') === "ja"){ echo "selected";}?>>Japanese</option>
                            <option disabled value="ko" <?php if (get_option('mo_openid_twitter_follow_lang') === "ko"){ echo "selected";}?>>Korean</option>
                            <option disabled value="ru" <?php if (get_option('mo_openid_twitter_follow_lang') === "ru"){ echo "selected";}?> >Russian</option>
                            <option disabled value="es" <?php if (get_option('mo_openid_twitter_follow_lang') === "es"){ echo "selected";}?> >Spanish</option>
                            <option disabled value="tr" <?php if (get_option('mo_openid_twitter_follow_lang') === "tr"){ echo "selected";}?> >Turkish</option>
                        </select>
                    </td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr>
                    <td>Show Vote Up Link:</td>
                    <td><select disabled name="twitter_follow_button_options[creditOn]" id="creditOn" >
                            <option disabled value="true" <?php if (get_option('mo_openid_twitter_follow_crediton') == "true"){ echo "selected";}?> >true</option>
                            <option disabled value="false" <?php if (get_option('mo_openid_twitter_follow_crediton') == "false"){ echo "selected";}?> >false</option>
                        </select>
                    </td>
                </tr>
            </table>

            <br/><b><input disabled type="submit" name="submit" value="<?php echo sh_mo_sl('Save');?>" style="width:150px;text-shadow: none;background-color:#0867b2;color:white;box-shadow:none;"  class="button button-primary button-large" /></b>
        </div>
     
        <div style="float:left;margin-left:10px;">
        
        <p class="mo_openid_note_style" style="font-size: 15px;"><?php echo sh_mo_sl('NOTE: If you use this shortcode on any page [social-share-service] and enable the Facebook Like,Recommend and Pin it, they will get displayed in the following manner.You can even enable twitter follow button where you can specify the page to follow.');?><a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>.</p>
        <hr>

       <center>
           <h3>DEMO</h3>
        <img style="width: 80%" id="mo_sharing_hover_icon_preview"
                                         src="<?php echo mo_ss_plugin_url . '/' . 'officialbutton.png' ?>"/></center>
                                         </tr>
    
        </div>
        
    </form>
    <script>jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Social sharing service');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);</script>
    <?php
}

