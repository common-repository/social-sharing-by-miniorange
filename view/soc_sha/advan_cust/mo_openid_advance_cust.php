<?php

function mo_ss_openid_advance_icons_customization(){
    ?>
    <script>jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Social Customize Icons');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);</script>

    <form id="social_media_cust" name="social_media_cust" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_social_media_cust" />
        <input type="hidden" name="mo_openid_social_media_cust_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-social-media-cust-nonce' ); ?>"/>
        <div style="height: auto; padding: 20px 20px 20px 20px; "><table style="width:60%">
                <tr><td>
                        <h2>Hover Icons <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a></h2>
                        <?php  echo sh_Cursor_icon_hover(); ?>
                        <br><br>Use this <b><code id="1">[hover-icon]</code><i style= "width: 11px;height: 9px;padding-left:2px;padding-top:3px" class="mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip" onclick="copyToClipboard(this, '#1', '#shortcode_url_copy')"><span id="shortcode_url_copy" class="mo_copytooltiptext">Copy to Clipboard</span></i></b> shortcode to display mouse hover icons.
                    </td></tr>
            </table>
        </div>
        <div style="float:left;margin-left:10px;">
        
        <p class="mo_openid_note_style" style="font-size: 15px;"><?php echo sh_mo_sl('NOTE: If you use the hover icons shortcode on your website then your icons will be displayed as below.');?><a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>.</p>

       
        <img id="mo_sharing_hover_icon_preview"
                                         src="<?php echo mo_ss_plugin_url . '/' . 'hovericon.gif' ?>"/>
                                         </tr>
    
        </div>
    </form>


    <br>
    <?php
}


