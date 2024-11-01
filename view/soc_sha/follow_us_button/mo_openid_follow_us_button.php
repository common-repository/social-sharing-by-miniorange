<?php
function mo_ss_openid_followus_button3(){
?>
    <label class=" mo_openid_note_style" style="font-size:small;padding:22px;"><?php echo sh_mo_sl('Follow Us Buttons provide your website visiters to follow you on different social media platform.');?></label>

  
  <!-- kk -->
   <form id="customize_text" name="customize_text" method="post" action="">
    <input type="hidden" name="option" value="mo_openid_enable_customize_follow_button" />
    <input type="hidden" name="mo_openid_enable_customize_follow_button_nonce"
           value="<?php echo wp_create_nonce( 'mo-openid-enable-customize-follow-button-nonce' ); ?>"/>

    <div class="mo_openid_table_layout" style="padding-bottom: 0px !important; margin-bottom: 0px !important;">
        <table style="width: 100%;">
            <tr>
                <td>

        <div style="width: 100%;">
            <table style="width: 100%">
                <tr>
                    <td>
                        <h3><?php echo sh_mo_sl('Customize Follow Us Icons');?></h3>
                        <p style="font-size: 17px"><?php echo sh_mo_sl('Customize shape, size and background for sharing icons');?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%">
                            <tr >
                                <td class="mo_openid_fix_fontsize_semiheading" style="width: 25%"><?php echo sh_mo_sl('Shape');?></td>
                                <td class="mo_openid_fix_fontsize_semiheading" style="width: 28%"><?php echo sh_mo_sl('Theme');?></td>
                                <td class="mo_openid_fix_fontsize_semiheading" style="width: 23%"><?php echo sh_mo_sl('Space between Icons');?></td>
                                <td class="mo_openid_fix_fontsize_semiheading" style="width: 30%"><?php echo sh_mo_sl('Size of Icons');?></td>
                            </tr>

                            <tr>
                                <td style=" width=25%">
<!--                                    <select id="shape" onchange="shape_change('shape'); checkShareButton();moSharePreview(setSizeOfIcons() ,document.getElementById('shape').value,setShareCustomTheme(),'2B41FF',document.getElementById('mo_share_icon_space').value,document.getElementById('mo_share_icon_custom_boundary').value)" name="mo_openid_share_shape">-->


                                    <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Round');?>
                                        <input type="radio" id="mo_openid_follow_us_theme_circle"  name="mo_openid_follow_us_theme" value="circle" onclick="tempHorShape = 'circle';moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, 'circle', setCustomTheme(), document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value, document.getElementById('mo_openid_follow_us_icon_custom_font').value)" <?php checked( get_option('mo_openid_follow_us_theme') == 'circle' );?> />
                                    <span class="mo-openid-radio-checkmark"></span></label>

                                    <br>

                                    <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Rounded Edges');?>
                                        <input type="radio"   name="mo_openid_follow_us_theme"  value="oval" onclick="tempHorShape = 'oval';moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, 'oval', setCustomTheme(), document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value)"  <?php checked( get_option('mo_openid_follow_us_theme') == 'oval' );?> /></br>
                                        <span class="mo-openid-radio-checkmark"></span></label>

                                    <br>
                                    <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Square');?>
                                        <input type="radio"   name="mo_openid_follow_us_theme" value="square" onclick="tempHorShape = 'square';moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, setTheme(), setCustomTheme(), document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value)" <?php checked( get_option('mo_openid_follow_us_theme') == 'square' );?> />
                                        <span class="mo-openid-radio-checkmark"></span></label>
                                <br>
<!--                                    </select>-->
                                </td>
                                <td style=" width=30%">


                                    <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Default');?>
                                        <input type="radio" id="mo_openid_default_background_radio"  name="mo_openid_follow_us_custom_theme" value="default" onclick="tempHorTheme = 'default';moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, setTheme(), 'default', document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value, document.getElementById('mo_openid_follow_us_icon_custom_font').value)"
                                            <?php checked( get_option('mo_openid_follow_us_custom_theme') == 'default' );?> /><br>
                                        <span class="mo-openid-radio-checkmark"></span></label>





                                 <br>


                                    <label class="mo-openid-radio-container"><?php echo sh_mo_sl('Custom background');?>*
                                        <input type="radio" id="mo_openid_custom_background_radio"  name="mo_openid_follow_us_custom_theme" value="custom" onclick="tempHorTheme = 'custom';moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, setTheme(),'custom',document.getElementById('mo_openid_follow_us_icon_custom_color').value,document.getElementById('mo_openid_follow_us_icon_space').value)"
                                            <?php checked( get_option('mo_openid_follow_us_custom_theme') == 'custom' );?> /><br>
                                        <span class="mo-openid-radio-checkmark"></span></label>


                                    <input id="mo_openid_follow_us_icon_custom_color" name="mo_openid_follow_us_icon_custom_color" class="color" value="<?php echo esc_attr(get_option('mo_openid_follow_us_icon_custom_color'))?>" onchange="moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, setTheme(),setCustomTheme(),document.getElementById('mo_openid_follow_us_icon_custom_color').value,document.getElementById('mo_openid_follow_us_icon_space').value,document.getElementById('mo_openid_follow_us_icon_custom_font').value)" ><br>
                                 <br>


                                   


                                    <input id="mo_openid_follow_us_icon_custom_font" style="display: none;" name="mo_openid_follow_us_icon_custom_font"  class="color" value="<?php echo esc_attr(get_option('mo_openid_follow_us_icon_custom_font'))?>" onchange="moSharingPreview('horizontal', document.getElementById('mo_openid_follow_us_icon_size').value, setTheme(),setCustomTheme(),document.getElementById('mo_openid_follow_us_icon_custom_color').value,document.getElementById('mo_openid_follow_us_icon_space').value,document.getElementById('mo_openid_follow_us_icon_custom_font').value,document.getElementById('mo_openid_follow_us_icon_custom_font').value)" /><br>

                                </td>
                                <td style=" width=25%">
                                <!-- Size between icons buttons-->
                                    <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px" onkeyup="moSharingSpaceValidate(this)" id="mo_openid_follow_us_icon_space" name="mo_openid_follow_us_icon_space" type="text" value="<?php echo esc_attr(get_option('mo_openid_follow_us_icon_space'))?>" />
                                    <input id="mo_follow_us_space_plus" type="button" value="+" onmouseup="moSharingPreview('horizontal',document.getElementById('mo_openid_follow_us_icon_size').value ,setTheme(),setCustomTheme(),document.getElementById('mo_openid_follow_us_icon_custom_color').value,document.getElementById('mo_openid_follow_us_icon_space').value)" />
                                    <input id="mo_follow_us_space_minus" type="button" value="-" onmouseup="moSharingPreview('horizontal',document.getElementById('mo_openid_follow_us_icon_size').value ,setTheme(),setCustomTheme(),document.getElementById('mo_openid_follow_us_icon_custom_color').value,document.getElementById('mo_openid_follow_us_icon_space').value)" />
                                </td>

                                <td style=" width=20%" >
                                    <input class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 16%;margin-bottom: 3px"id="mo_openid_follow_us_icon_size" onkeyup="moSharingSizeValidate(this)" name="mo_follow_us_icon_custom_size" type="text" value="<?php echo esc_attr(get_option('mo_follow_us_icon_custom_size'))?>" >

                                    <input id="mo_follow_us_size_plus" type="button" value="+" onmouseup="tempHorSize = document.getElementById('mo_openid_follow_us_icon_size').value;moSharingPreview('horizontal',document.getElementById('mo_openid_follow_us_icon_size').value , setTheme(), setCustomTheme(), document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value,document.getElementById('mo_openid_follow_us_icon_custom_font').value)" >

                                    <input id="mo_follow_us_size_minus" type="button" value="-" onmouseup="tempHorSize = document.getElementById('mo_openid_follow_us_icon_size').value;moSharingPreview('horizontal',document.getElementById('mo_openid_follow_us_icon_size').value ,setTheme(), setCustomTheme(), document.getElementById('mo_openid_follow_us_icon_custom_color').value, document.getElementById('mo_openid_follow_us_icon_space').value, document.getElementById('mo_openid_follow_us_icon_custom_font').value)" >
                                </br>
                                </td>
                            </tr>        
                            <tr>
                                <td colspan="4">
                                    <br><b><?php echo sh_mo_sl('Preview');?> : </b><br/>
                                    <div>
                                        <?php
                                        $sh_share_app=get_option('fo_share_app');
                                        $sh_share_app=explode('#',$sh_share_app);
                                        foreach ($sh_share_app as $active_app) {

                                            if (get_option('mo_openid_' . $active_app . '_follow_us_check')) {

                                                        ?>
                                                        <img class="mo_sharing_icon_preview"
                                                             id="mo_follow_us_icon_preview_<?php echo $active_app ?>"
                                                             src="<?php echo mo_ss_plugin_url . '/' . $active_app . '.png' ?>"/>

                                                        <i class="mo_custom_sharing_icon_preview mofa mofa-<?php echo $active_app ?>"
                                                           id="mo_custom_follow_us_icon_preview_<?php echo $active_app ?>"
                                                           style="color:#ffffff;text-align:center;margin-top:5px;"></i>

                                                        <i class="mo_custom_sharing_icon_font_preview mofa mofa-<?php echo $active_app ?>"
                                                           id="mo_custom_follow_up_icon_font_preview_<?php echo $active_app ?>"
                                                           style="text-align:center;margin-top:5px;"></i>

                                                        <?php
                                                    }

                                                }


                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </td>
            </tr>

        </div>

            </table>
            <br>
            <hr>
             <h3><?php echo sh_mo_sl('Select your social application for Follow US Button');?></h3>

            <br>
            <table style="width: 100%; margin-left: 2%">
                <tr>
                    <td style="width: 10%">
                       <label class="mo_openid_checkbox_container" style="top: 9px;" > <b style="font-size: 14px; "><?php echo sh_mo_sl('Twitter');?></b>
           <input type="checkbox" id="twitter_follow_us_check" onclick="compulsory_field()" name="mo_openid_twitter_follow_us_check"value="1" <?php checked(get_option('mo_openid_twitter_follow_us_check') == 1); ?> />
            <span class="mo_openid_checkbox_checkmark"></span>
        </label> 
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>twitter.png"  width='30px' height='30px' ></td>
                    <td style="width: 12%">
                        
                    </td>
                    <td style="width: 70%">
                        <input class="mo_openid_textfield_css" id="twitter_follow_url"style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px" placeholder="Please enter the redirect URL" type="url" name="mo_openid_twitter_follow_url" value="<?php echo esc_attr(get_option('mo_openid_twitter_follow_url')); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                       <label class="mo_openid_checkbox_container" style="top: 9px;"> <b style="font-size: 14px; "><?php echo sh_mo_sl('Facebook');?></b>
           <input type="checkbox" id="facebook_follow_us_check" name="mo_openid_facebook_follow_us_check" onclick="compulsory_field()" value="1" <?php checked(get_option('mo_openid_facebook_follow_us_check') == 1); ?> />
            <span class="mo_openid_checkbox_checkmark"></span>
        </label>
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>facebook.png"  width='30px' height='30px'></td>
                    <td style="width: 12%">
                        
                    </td>
                    <td style="width: 70%">
                        <input class="mo_openid_textfield_css" id="facebook_follow_url" style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px" placeholder="Please enter the redirect URL" type="url" name="mo_openid_facebook_follow_url" value="<?php echo esc_attr(get_option('mo_openid_facebook_follow_url')); ?>" >
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                      <label class="mo_openid_checkbox_container" style="top: 9px;"> <b style="font-size: 14px; "><?php echo sh_mo_sl('Instagram');?></b>
           <input type="checkbox" id="instagram_follow_us_check" name="mo_openid_instagram_follow_us_check"  onclick="compulsory_field()" value="1" <?php checked(get_option('mo_openid_instagram_follow_us_check') == 1); ?> disabled/>
            <span class="mo_openid_checkbox_checkmark"></span>
        </label>
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>Instagramd.png"  width='30px' height='30px' ></td>
                    <td style="width: 12%">
                        <span  class="mo-openid-premiums"><?php echo sh_mo_sl('PRO');?></span>
                    </td>
                    <td style="width: 70%">
                       <input class="mo_openid_textfield_css" id="instagram_follow_url"style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px"  placeholder="Please enter the redirect URL" type="url" name="mo_openid_instagram_follow_url" value="<?php echo esc_attr(get_option('mo_openid_instagram_follow_url')); ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                       <label class="mo_openid_checkbox_container" style="top: 9px;"> <b style="font-size: 14px; "><?php echo sh_mo_sl('Pinterest');?></b>
           <input type="checkbox" id = "pinterest_follow_us_check" name="mo_openid_pinterest_follow_us_check" onclick="compulsory_field()"  value="1" <?php checked(get_option('mo_openid_pinterest_follow_us_check') == 1); ?> disabled/>
            <span class="mo_openid_checkbox_checkmark"></span>
        </label>
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>pinterest.png"  width='30px' height='30px' ></td>
                    <td style="width: 12%">
                        <span  class="mo-openid-premiums"><?php echo sh_mo_sl('PRO');?></span>
                    </td>
                    <td style="width: 70%">
                        <input class="mo_openid_textfield_css" id="pinterest_follow_url" style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px"  placeholder="Please enter the redirect URL" type="url" name="mo_openid_pinterest_follow_url" value="<?php echo esc_attr(get_option('mo_openid_pinterest_follow_url')); ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                       <label class="mo_openid_checkbox_container" style="top: 9px;"> <b style="font-size: 14px; "><?php echo sh_mo_sl('LinkedIn');?></b>
           <input type="checkbox" id ="linkedin_follow_us_check" name="mo_openid_linkedin_follow_us_check"  onclick="compulsory_field()" value="1" <?php checked(get_option('mo_openid_linkedin_follow_us_check') == 1); ?> disabled/>
            <span class="mo_openid_checkbox_checkmark"></span>
        </label>
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>linkedin.png"  width='30px' height='30px' ></td>
                    <td style="width: 12%">
                        <span  class="mo-openid-premiums"><?php echo sh_mo_sl('PRO');?></span>
                    </td>
                    <td style="width: 70%">
                        <input class="mo_openid_textfield_css" id="linkedin_follow_url" style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px"  placeholder="Please enter the redirect URL" type="url" name="mo_openid_linkedin_follow_url" value="<?php echo esc_attr(get_option('mo_openid_linkedin_follow_url')); ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%">
                       <label class="mo_openid_checkbox_container" style="top: 9px;"> <b style="font-size: 14px; "><?php echo sh_mo_sl('Tumblr');?></b>
           <input type="checkbox" id="tumblr_follow_us_check" name="mo_openid_tumblr_follow_us_check"  onclick="compulsory_field()" value="1" <?php checked(get_option('mo_openid_tumblr_follow_us_check') == 1); ?> disabled/>
            <span class="mo_openid_checkbox_checkmark"></span>
        </label>
                    </td>
                    <td style="width:  4%"><img src="<?php echo mo_ss_plugin_url;?>tumblr.png"  width='30px' height='30px' ></td>
                    <td style="width: 12%">
                        <span  class="mo-openid-premiums"><?php echo sh_mo_sl('PRO');?></span>
                    </td>
                    <td style="width: 70%">
                        <input class="mo_openid_textfield_css" id="tumblr_follow_url" style="border: 1px solid ;border-color: #0867b2;margin-bottom: 8px" placeholder="Please enter the redirect URL"  type="url" name="mo_openid_tumblr_follow_url" value="<?php echo esc_attr(get_option('mo_openid_tumblr_follow_url')); ?>" disabled>
                    </td>
                </tr>
            </table>

</div>
  <center>
    <input type="submit" name="submit" value="<?php echo sh_mo_sl("Save");?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" /></center>
          </form>
          <br><p style="font-size: 15px;"><b>NOTE</b>: Copy the shortcode  <span style="color: red;"><b>[miniorange_follow_us_button]</b></span> and paste it on the page where you want to display the Follow Us Button.</p>
    <label style="cursor: auto" class="mo_openid_note_style">&nbsp;&nbsp;&nbsp;<?php echo sh_mo_sl('If you want appliction which is not present in the plugin ');?><a style="cursor: pointer" onclick="mo_openid_support_form('')">Please Contact Us</a></label>

    <script>
        var tempHorSize = '<?php echo esc_attr(get_option('mo_follow_us_icon_custom_size')) ?>';
        var tempHorShape = '<?php echo esc_attr(get_option('mo_openid_follow_us_theme')) ?>';
        var tempHorTheme = '<?php echo esc_attr(get_option('mo_openid_follow_us_custom_theme')) ?>';
        var tempbackColor = '<?php echo esc_attr(get_option('mo_openid_follow_us_icon_custom_color'))?>';
        var tempHorSpace = '<?php echo esc_attr(get_option('mo_openid_follow_us_icon_space'))?>';
        var tempHorFontColor = '<?php echo esc_attr(get_option('mo_openid_follow_us_icon_custom_font'))?>';
        function moSharingIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<60?r.value++:"subtract"==t&&r.value>10&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

        moSharingIncrement(document.getElementById('mo_follow_us_size_plus'), "add", document.getElementById('mo_openid_follow_us_icon_size'), 300, 0.7);
        moSharingIncrement(document.getElementById('mo_follow_us_size_minus'), "subtract", document.getElementById('mo_openid_follow_us_icon_size'), 300, 0.7);

        function moSharingSpaceIncrement(e,t,r,a,i){
            var h,s,c=!1,_=a;s=function(){
                "add"==t&&r.value<50?r.value++:"subtract"==t&&r.value>0&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}
        moSharingSpaceIncrement(document.getElementById('mo_follow_us_space_plus'), "add", document.getElementById('mo_openid_follow_us_icon_space'), 300, 0.7);
        moSharingSpaceIncrement(document.getElementById('mo_follow_us_space_minus'), "subtract", document.getElementById('mo_openid_follow_us_icon_space'), 300, 0.7);


        function setTheme(){return jQuery('input[name=mo_openid_follow_us_theme]:checked', '#customize_text').val();}
        function setCustomTheme(){
            return jQuery('input[name=mo_openid_follow_us_custom_theme]:checked', '#customize_text').val();}
    </script>

    <script type="text/javascript">

        var selectedApps = [];



        function moSharingPreview(e,t,r,w,h,n,x){

            if("default"==w){
                var a="mo_sharing_icon_preview";
                jQuery('.mo_sharing_icon_preview').show();
                jQuery('.mo_custom_sharing_icon_preview').hide();
                jQuery('.mo_custom_sharing_icon_font_preview').hide();
                jQuery("."+a).css({height:t,width:t});
                jQuery("."+a).css("font-size",(t-10)+"px");
                jQuery("."+a).css("margin-left",(n-4)+"px");

                if(r=="circle"){
                    jQuery("."+a).css("borderRadius","999px");
                }else if(r=="oval"){
                    jQuery("."+a).css("borderRadius","5px");
                }else if(r=="square"){
                    jQuery("."+a).css("borderRadius","0px");
                }

            }
            else if(w == "custom"){
                var a="mo_custom_sharing_icon_preview";
                jQuery('.mo_sharing_icon_preview').hide();
                jQuery('.mo_custom_sharing_icon_font_preview').hide();
                jQuery('.mo_custom_sharing_icon_preview').show();
                jQuery("."+a).css("background","#"+h);
                jQuery("."+a).css("padding-top","8px");
                jQuery("."+a).css({height:t-8,width:t});
                jQuery("."+a).css("font-size",(t-16)+"px");

                if(r=="circle"){
                    jQuery("."+a).css("borderRadius","999px");
                }else if(r=="oval"){
                    jQuery("."+a).css("borderRadius","5px");
                }else if(r=="square"){
                    jQuery("."+a).css("borderRadius","0px");
                }

                jQuery("."+a).css("margin-left",(n-4)+"px");
            }
        }
        moSharingPreview('horizontal',tempHorSize,tempHorShape,tempHorTheme,tempbackColor,tempHorSpace,tempHorFontColor);
        </script>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Customize Follow Us Button');?>');
    </script>
    <script >
       function compulsory_field() {
                if(document.getElementById('twitter_follow_us_check').checked)
                {
                    document.getElementById('twitter_follow_url').setAttribute("required", "");
                }
                else {
                    document.getElementById('twitter_follow_url').removeAttribute("required", "");
                }
                if(document.getElementById('facebook_follow_us_check').checked)
                {
                    document.getElementById('facebook_follow_url').setAttribute("required", "");
                }
                else {
                    document.getElementById('facebook_follow_url').removeAttribute("required", "");
                }
                if(document.getElementById('instagram_follow_us_check').checked)
                    document.getElementById('instagram_follow_url').setAttribute("required", "");
                else 
                    document.getElementById('instagram_follow_url').removeAttribute("required", "");
                if(document.getElementById('pinterest_follow_us_check').checked)
                    document.getElementById('pinterest_follow_url').setAttribute("required", "");
                else 
                    document.getElementById('pinterest_follow_url').removeAttribute("required", "");
                if(document.getElementById('tumblr_follow_us_check').checked)
                    document.getElementById('tumblr_follow_url').setAttribute("required", "");
                else 
                    document.getElementById('tumblr_follow_url').removeAttribute("required", "");
                if(document.getElementById('linkedin_follow_us_check').checked)
                    document.getElementById('linkedin_follow_url').setAttribute("required", "");
                else 
                    document.getElementById('linkedin_follow_url').removeAttribute("required", "");

            }
    </script>

<?php
}

