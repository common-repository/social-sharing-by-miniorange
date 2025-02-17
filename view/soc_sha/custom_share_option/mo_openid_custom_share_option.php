<?php

function mo_ss_openid_cust_icon_opt(){
    ?>
    <script>jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Add Share Application');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);</script>
    <div style="margin-left: 1.5%">
        <p style="font-size: large; font-weight: 700">Instruction</p>
        <ol>
            <li>Upload the image of the application you want to add.</li>
            <li>Copy the image URL and paste it in the Custom Image URL text box.</li>
            <li>Enter the name of the application you want to add in the Custom Share Name.</li>
            <li>Enter the Redirect URL in the Custom Share Link. User will redirect to this URL when he click on the icon.</li>
        </ol>
    </div>
    <br>
    <hr>
    <div class="mo_openid_table_layout" style="height: auto; padding: 20px 20px 20px 20px;">
        <form method='post' action='' name='myform' enctype='multipart/form-data'>
            <h3>Upload image <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a></h3>
            <label style="cursor: auto" class="mo_openid_note_style">&nbsp;&nbsp;&nbsp;<?php echo sh_mo_sl('<b> Unlock this feature if you want to setup your own customize social sharing app with your choice of image.</b>');?>.</label><br>
            <input type='file' name='file' disabled>

            <input type='submit' name='image_submit' value='Submit' disabled>
            <br><br>
            <label style="cursor: auto" class="mo_openid_note_style">&nbsp;&nbsp;&nbsp;<?php echo sh_mo_sl('<b> Upload the image you want and copy the URL generated and paste it in Custom share image field.</b>');?>.</label><br>

        </form>
        <br><br>

        <form method="post">
            <input type="hidden" name="option" value="mo_openid_custom_social_sharing" />
            <table id="custom_attr" style="width:100%">
                <?php
                // $user_id=get_current_user_id();
                // $user_info = get_userdata($user_id);
                //var_dump(get_option('mo_openid_custom_social_sharing'));
                if(get_option('mo_openid_custom_social_sharing')) {
                    $custom_attr = get_option('mo_openid_custom_social_sharing');
                    $k=count($custom_attr);
                    $a=0;
                    foreach($custom_attr as $x)
                    {
                        foreach($x as $xx => $x_value)
                            ?>
                            <tr>
                            <td>
                            <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2"  name="mo_openid_custom_set_attribute_<?php echo $a ?>_name" value="<?php echo $xx; ?>" required style="width:80%;"/>
                        </td>
                        <td>
                            <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2"  name="mo_openid_custom_set_attribute_<?php echo $a ?>_value" value="<?php echo $x_value[0]; ?>" required style="width:80%;"/>
                        </td><td>
                        <input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2"  name="mo_openid_custom_set_attribute_<?php echo $a ?>_image" value="<?php echo $x_value[1]; ?>" required style="width:80%;"/>
                    </td><td>
                        <input name="<?php echo $a ?>" type="submit" value="<?php echo sh_mo_sl("Delete");?>" class="button button-primary button-large"/></td>
                        </tr>
                        <?php
                        $a++;
                    }
                }?>
                <tr>
                    <td><br><input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" name="mo_openid_custom_attribute_1_name" placeholder="Custom Share Name" style="width:80%;" disabled/></td>

                    <td><br><input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" name="mo_openid_custom_attribute_1_value" placeholder="Custom Share Link" style="width:80%;" disabled/></td>

                    <td><br><input type="text" class="mo_openid_textfield_css" style="border: 1px solid ;border-color: #0867b2" name="mo_openid_custom_attribute_1_image" placeholder="Custom Share Image" style="width:80%;" disabled/></td>

                    <td> <br><input type="button" name="mo_add_attribute" value="+" onclick="add_custom_attribute();" class=" button-primary" disabled/>&nbsp;
                        <input type="button" name="mo_remove_attribute" value="-" onclick="remove_custom_attribute();" class=" button-primary" disabled/>
                    </td> </tr>
                <tr id="mo_openid_custom_attribute"><td></td></tr>
                <tr>
                    <td align="center"colspan="3"><br>
                        <input type="hidden" name="mo_openid_custom_social_sharing_nonce"
                               value="<?php echo wp_create_nonce( 'mo-openid-custom-social-sharing-nonce' ); ?>" />
                        <input name="mo_openid_save_config_element" type="submit" value="Save Attributes"  class="button button-primary button-large" disabled/>
                        &nbsp &nbsp <a  href="" class="button button-primary button-large" disabled><?php echo sh_mo_sl("Cancel");?></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <br>
    <?php
}

function sh_Cursor_icon_hover() {


    $apparr = array("facebook"=>"#46629e", "twitter"=>"#00acee", "google"=>"#dd4b39");

    $hovericon = "<section class='social'>";

    foreach($apparr as $x => $y) {
        if(1==1){ $hovericon.= "<a class='icon ".$x."'><img src=".mo_ss_plugin_url ."".$x."s.png  width='30px' height:'30px' style='margin-top: 5px;'></a>";

            $hovericon.= '<style>
                        .social .'.$x.' {
                      background: '.$y.';
                    }
                    .social .'.$x.':before,
                    .social .'.$x.':after {
                      border-color: '.$y.';
                    }
                    </style>';
        };
    }

    $hovericon.= '
        <style>
        @font-face {
          font-family: "icomoon";
          font-weight: normal;
          font-style: normal;
        }

        a {
          text-decoration: none;
        }

        .social {
          width: auto;
          position: relative;
          margin: 0px auto;
        }
        .social a {
          position: relative;
          display: inline-block;
          font-family: "icomoon";
          font-size: 1.2em;
          width: 40px;
          height: 40px;
          line-height: 40px;
          color: white;
          border-radius: 50%;
          text-align: center;
          margin-right: 30px;
          font-smoothing: antialiased;
        }

        .social a:before,
        .social a:after {
          content: "";
          display: block;
          position: absolute;
          background: transparent;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          border-radius: 50%;
          transition: 0.3s all;
          border: 3px solid;
        }
        .social a:hover:after {
          -webkit-transform: scale(1.5);
        }
        .social a:hover:before {
          -webkit-transform: scale(2);
          transition: 0.3s all;
          opacity: 0;
        }
        </style>
        ';

    return $hovericon;
}
function Cursor_icon_hover_free() {


    $apparr = array("facebook"=>"#46629e", "twitter"=>"#00acee", "google"=>"#dd4b39","vkontakte"=>"#4c75a3","linkedin"=>"#0077B5","tumblr"=>"#34465d","stumble"=>"#eb4924","pinterest"=>"#bd081c","whatsapp"=>"#25d366","reddit"=>"#ff5700","pocket"=>"#ff5700","digg"=>"#005be2","delicious"=>"#205cc0","mail"=>"#00acee","print" => "#e0205a","amazon" => "#ff9900", "telegram" => "#0088cc","line" => "#329555","yahoo_mail" => "#720e9e", "instapaper" => "#000000","livejournal" => "#306599","mix" => "#FF0000","mewe" => "#409d16","qzone" => "#e8ff00", "google_gmail" => "#004f9f","typepad_post" => "#04800c","fark" => "#654321", "google_bookmark" => "#3b3b38","fintel" => "#24a0ed", "mendeley" => "#008080","slashdot" => "#126A70", "wanelo" => "#FFF700", "google_classroom","yummly" => "#F0780E", "hacker_news" => "#FF6600", "kakao" => "#ffe812","plurk" => "#f00", "trello" => "#0079bf","wykop" => "#266F","renren" => "#2500B8","buffer" => "#000000");

    $hovericon = "<section class='social'>";

    foreach($apparr as $x => $y) {
        if(get_option('mo_openid_'.$x.'_share_enable')==1){ $hovericon.= "<a class='icon ".$x."'><img src=".mo_ss_plugin_url ."".$x."s.png  width='30px' height:'30px' style='margin-top: 10px;'></a>";

            $hovericon.= '<style>
                        .social .'.$x.' {
                      background: '.$y.';
                    }
                    .social .'.$x.':before,
                    .social .'.$x.':after {
                      border-color: '.$y.';
                    }
                    </style>';
        };
    }

    $hovericon.= '
        <style>
        @font-face {
          font-family: "icomoon";
          font-weight: normal;
          font-style: normal;
        }

        a {
          text-decoration: none;
        }

        .social {
          width: auto;
          position: relative;
          margin: 0px auto;
        }
        .social a {
          position: relative;
          display: inline-block;
          font-family: "icomoon";
          font-size: 1.2em;
          width: 47px;
          height: 40px;
          line-height: 40px;
          color: white;
          border-radius: 50%;
          text-align: center;
          margin-right: 30px;
          margin-bottom: 10px;
          padding-bottom:7px;
          font-smoothing: antialiased;
        }

        .social a:before,
        .social a:after {
          content: "";
          display: block;
          position: absolute;
          background: transparent;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          border-radius: 50%;
          transition: 0.3s all;
          border: 3px solid;
        }
        .social a:hover:after {
          -webkit-transform: scale(1.5);
        }
        .social a:hover:before {
          -webkit-transform: scale(2);
          transition: 0.3s all;
          opacity: 0;
        }
        </style>
        ';

    return $hovericon;
}


