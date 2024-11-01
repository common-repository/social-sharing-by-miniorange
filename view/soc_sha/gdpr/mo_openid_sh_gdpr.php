<?php
function mo_openid_sh_gdpr()
{

    ?>
    <form id="gdpr" name="gdpr" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_enable_gdpr" />
        <div class="mo_openid_table_layout">
            <label class=" mo_openid_note_style" style="font-size:small;padding:22px;"><?php echo sh_mo_sl('If GDPR check is enabled, users will be asked to give consent before using Social Sharing. Users who will not give consent will not be able to share the post.');?>.<br><br> <?php echo sh_mo_sl(" Please update your website's privacy policy accordingly and enter the URL to your privacy policy below.");?></label>
            <br/>
            <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Take consent from users');?>
                <input style="padding-left: 15px" type="checkbox" id="mo_openid_gdpr_consent_" name="mo_openid_gdpr_consent_enable" value="1"
                    <?php checked( get_option('mo_openid_gdpr_consent_enable') == 1 );?> />
                <br>
                
                    <span class="mo_openid_checkbox_checkmark_disable"></span>
               
            </label>
            <label style="font-size: 12px"><?php echo sh_mo_sl('Enter the Consent message:');?> </label><br/>
            <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_gdpr_consent_message" />
            <br><br>
            <label style="font-size: 12px"> <?php echo sh_mo_sl('Enter the text to be displayed for the Privacy Policy URL');?> :</label><br/>
            <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_privacy_policy_text" />
            <br><br>
            <label style="font-size: 12px"><?php echo sh_mo_sl('Enter Privacy Policy URL');?>: </label><br/>
            <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2;width: 50%" name="mo_openid_privacy_policy_url"  />
            <br/><br/><b><input type="submit" name="submit" value="<?php echo sh_mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" /></b>
        </div>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('GDPR Settings');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);
        var win_height = jQuery('#mo_openid_menu_height').height();
        //win_height=win_height+18;
        jQuery(".mo_container").css({height:win_height});
    </script>
    <?php
}