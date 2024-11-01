<?php
require_once( ABSPATH . 'wp-includes/plugin.php' );
function mo_ss_openid_share_apps()
{

    ?>

<!--<link rel="stylesheet" type="text/css" >-->

<form id="social_share" name="social_share" method="post" action="">
    <input type="hidden" name="option" value="mo_openid_social_settings"/>
    <input type="hidden" name="mo_openid_social_settings_nonce"
           value="<?php echo wp_create_nonce('mo-openid-social-settings-nonce'); ?>"/>
    <div class="mo_openid_table_layout">
        <table style="width: 100%;">
            <tr id="sel_apps">
                <td><h3 ><?php echo sh_mo_sl('Select Social Apps');?> </h3>
                    <table style="width: 100%">
                        <p style="font-size: 17px;"><?php echo sh_mo_sl('Select applications to enable social sharing');?></p>
                        <tr>
                            <td class="mo_openid_table_td_checkbox">

                        <tr>

                            <td style="width:20%">

                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Facebook');?>
                                    <input type="checkbox" id="mo_openid_facebook_share_enable" class="app_enable"
                                           name="mo_openid_facebook_share_enable" value="1"
                                           onclick="addSelectedApps(this,'facebook');moSharingPreview();mo_openid_enable_share('mo_openid_facebook_share_enable');" <?php checked(get_option('mo_openid_facebook_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>
                            </td>
                            <td style="width:20%">
                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Twitter');?>.
                                    <input type="checkbox"
                                           id="mo_openid_twitter_share_enable" class="app_enable"
                                           name="mo_openid_twitter_share_enable" value="1" onclick="addSelectedApps(this,'twitter');mo_openid_enable_share('mo_openid_twitter_share_enable');"
                                        <?php checked(get_option('mo_openid_twitter_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>
                            </td>
                            
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Vkontakte');?>
                                    <input type="checkbox" id="mo_openid_vkontakte_share_enable" class="app_enable"
                                           name="mo_openid_vkontakte_share_enable" value="1"
                                           onclick="addSelectedApps(this,'vk');mo_openid_enable_share('mo_openid_vkontakte_share_enable');" <?php checked(get_option('mo_openid_vkontakte_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>



                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Whatsapp');?>
                                    <input type="checkbox" id="mo_openid_whatsapp_share_enable" class="app_enable"
                                           name="mo_openid_whatsapp_share_enable" value="1"
                                           onclick="addSelectedApps(this,'whatsapp');mo_openid_enable_share('mo_openid_whatsapp_share_enable');" <?php checked(get_option('mo_openid_whatsapp_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Tumblr');?>
                                    <input type="checkbox"
                                           id="mo_openid_tumblr_share_enable" class="app_enable"
                                           name="mo_openid_tumblr_share_enable" value="1" onclick="addSelectedApps(this,'tumblr');mo_openid_enable_share('mo_openid_tumblr_share_enable');"
                                        <?php checked(get_option('mo_openid_tumblr_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>




                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('StumbleUpon');?>
                                    <input type="checkbox" id="mo_openid_stumble_share_enable" class="app_enable"
                                           name="mo_openid_stumble_share_enable" value="1"
                                           onclick="addSelectedApps(this,'stumble');mo_openid_enable_share('mo_openid_stumble_share_enable');" <?php checked(get_option('mo_openid_stumble_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>




                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('LinkedIn');?>
                                    <input type="checkbox" id="mo_openid_linkedin_share_enable" class="app_enable"
                                           name="mo_openid_linkedin_share_enable" value="1" onclick="addSelectedApps(this,'linkedin');mo_openid_enable_share('mo_openid_linkedin_share_enable');"
                                        <?php checked(get_option('mo_openid_linkedin_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>



                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Reddit');?>
                                    <input type="checkbox" id="mo_openid_reddit_share_enable" class="app_enable"
                                           name="mo_openid_reddit_share_enable" value="1" onclick="addSelectedApps(this,'reddit');mo_openid_enable_share('mo_openid_reddit_share_enable');"
                                        <?php checked(get_option('mo_openid_reddit_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>




                            </td>
                            <td style="width:20%">



                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Pinterest');?>
                                    <input type="checkbox" id="mo_openid_pinterest_share_enable" class="app_enable"
                                           name="mo_openid_pinterest_share_enable" value="1"
                                           onclick="addSelectedApps(this,'pinterest');mo_openid_enable_share('mo_openid_pinterest_share_enable');"
                                        <?php checked(get_option('mo_openid_pinterest_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>




                            </td>
                            <td style="width:20%">

                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Pocket');?>
                                    <input type="checkbox" id="mo_openid_pocket_share_enable" class="app_enable"
                                           name="mo_openid_pocket_share_enable" value="1"
                                           onclick="addSelectedApps(this,'pocket');mo_openid_enable_share('mo_openid_pocket_share_enable');" <?php checked(get_option('mo_openid_pocket_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>





                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Digg');?>
                                    <input type="checkbox" id="mo_openid_digg_share_enable" class="app_enable"
                                           name="mo_openid_digg_share_enable" value="1"
                                           onclick="addSelectedApps(this,'digg');mo_openid_enable_share('mo_openid_digg_share_enable');" <?php checked(get_option('mo_openid_digg_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>



                            </td>
                            <td style="width:20%">

                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl('Email');?>
                                    <input type="checkbox" id="mo_openid_mail_share_enable" class="app_enable"
                                           name="mo_openid_mail_share_enable" value="1"
                                           onclick="addSelectedApps(this,'mail');mo_openid_enable_share('mo_openid_mail_share_enable');" <?php checked(get_option('mo_openid_mail_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>



                            </td>
                            <td style="width:20%">

                                <label class="mo_openid_checkbox_container"><?php echo sh_mo_sl("Print");?>
                                    <input type="checkbox" id="mo_openid_print_share_enable" class="app_enable"
                                           name="mo_openid_print_share_enable" value="1"
                                           onclick="addSelectedApps(this,'print');mo_openid_enable_share('mo_openid_print_share_enable');" <?php checked(get_option('mo_openid_print_share_enable') == 1); ?> />
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                </label>


                            </td>
                            <td></td>
                             
                           <td></td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Buffer');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Amazon_wishlist');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Telegram');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Line');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Yahoo');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Instapaper');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Mewe');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Livejournal');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Mix');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Aol_mail');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Qzone');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Gmail');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Typepad_post');?>
                                    <input type="checkbox"   disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Fark');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Bookmark');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Fintel');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Mendeley');?>
                                    <input type="checkbox"   disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Slashdot');?>
                                    <input type="checkbox"
                                           disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Wanelo');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Classroom');?>
                                    <input type="checkbox"   disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Yummly');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Hacker_news');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Kakao');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Plurk');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Trello');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Wykop');?>
                                    <input type="checkbox" disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Weibo');?>
                                    <input type="checkbox"  disabled/>
                                    <span class="mo_openid_checkbox_checkmark"></span>
                                    <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                            </td>
                            <td style="width:20%">


                                  <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Renren');?>
                                  <input type="checkbox" disabled/>
                                  <span class="mo_openid_checkbox_checkmark"></span>
                                  <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                  </label>


                            </td>
                            <td style="width:20%">


                              <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Xing');?>
                              <input type="checkbox" disabled/>
                               <span class="mo_openid_checkbox_checkmark"></span>
                              <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                              </label>


                               </td>
                               <td style="width:20%">


                              <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('WordPress');?>
                              <input type="checkbox" disabled/>
                               <span class="mo_openid_checkbox_checkmark"></span>
                              <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                              </label>


                               </td>
                               </tr>
                               <tr>
                               <td style="width:20%">


                               <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Front It');?>
                               <input type="checkbox" disabled/>
                              <span class="mo_openid_checkbox_checkmark"></span>
                              <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                              </label>


                                </td>
                                <td style="width:20%">


                               <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Skype');?>
                               <input type="checkbox" disabled/>
                              <span class="mo_openid_checkbox_checkmark"></span>
                              <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                              </label>


                                </td>
                                <td style="width:20%">


                               <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Kindle It');?>
                               <input type="checkbox" disabled/>
                               <span class="mo_openid_checkbox_checkmark"></span>
                               <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                               </td>
                               <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Bloggerpost');?>
                                <input type="checkbox" disabled/>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                </label>


                                </td>
                                <td style="width:20%">


                                <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Mail.ru');?>
                                <input type="checkbox" disabled/>
                                <span class="mo_openid_checkbox_checkmark"></span>
                                <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                 </label>


                                 </td>
                        
                        </tr>
                        <tr>
                        <td style="width:20%">


                             <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Papaly');?>
                             <input type="checkbox" disabled/>
                             <span class="mo_openid_checkbox_checkmark"></span>
                             <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                             </label>


                             </td>
                             <td style="width:20%">


                                 <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Blogmarks');?>
                                 <input type="checkbox" disabled/>
                                 <span class="mo_openid_checkbox_checkmark"></span>
                                 <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                 </label>


                                  </td>
                                  <td style="width:20%">


                                 <label class="mo_openid_checkbox_container_disable"><?php echo sh_mo_sl('Twiddla');?>
                                 <input type="checkbox" disabled/>
                                 <span class="mo_openid_checkbox_checkmark"></span>
                                 <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a>
                                 </label>


                                  </td>
                            
                        </tr>
                        </td>
                        </tr>

                        </td>
                        </tr>
                    </table>

            <tr><td>&nbsp;</td></tr>

            <tr>
                <td><b>Preview: </b><br/><span hidden id="no_apps_text"><?php echo sh_mo_sl('No apps selected');?></span></td>
            </tr>

            <tr>
                <td>

                    <div>
                        <?php
                        $share_app=get_option('share_app');
                        $share_app=explode('#',$share_app);
                        foreach ($share_app as $active_app) {
                            $icon = $active_app;
                            if ($active_app == 'vkontakte') {
                                $icon = 'vk';
                            }
                            if ($active_app == 'mail') {
                                $icon = 'envelope';
                            }
                            if ($active_app == 'pocket') {
                                $icon = 'get-pocket';
                            }
                            if ($active_app == 'stumble') {
                                $icon = 'stumbleupon';
                            }
                            if ($active_app == 'mail' || $active_app == 'pocket' || $active_app == 'stumble') {

                                ?>

                                <img class="mo_sharing_icon_preview" style="display: none;"
                                     id="mo_sharing_icon_preview_<?php echo $active_app ?>"
                                     src="<?php echo mo_ss_plugin_url . '/' . $active_app . '.png' ?>"/>
                                <i class="mo_custom_sharing_icon_preview mofa mofa-<?php echo $icon ?>"
                                   id="mo_custom_sharing_icon_preview_<?php echo $active_app ?>"
                                   style="color:#ffffff;text-align:center;margin-top:5px;"></i>
                                <i class="mo_custom_sharing_icon_font_preview mofa mofa-<?php echo $icon ?>"
                                   id="mo_custom_sharing_icon_font_preview_<?php echo $active_app ?>"
                                   style="text-align:center;margin-top:5px;"></i>


                                <?php
                            }
                            else
                                if ($active_app == 'vkontakte') {
                                    ?>

                                    <img class="mo_sharing_icon_preview"
                                         id="mo_sharing_icon_preview_<?php echo $icon ?>"
                                         src="<?php echo mo_ss_plugin_url . '/' . $icon . '.png' ?>"/>

                                    <i class="mo_custom_sharing_icon_preview mofa mofa-<?php echo $icon ?>"
                                       id="mo_custom_sharing_icon_preview_<?php echo $icon ?>"
                                       style="color:#ffffff;text-align:center;margin-top:5px;"></i>


                                    <i class="mo_custom_sharing_icon_font_preview mofa mofa-<?php echo $icon ?>"
                                       id="mo_custom_sharing_icon_font_preview_<?php echo $icon ?>"
                                       style="text-align:center;margin-top:5px;"></i>

                                    <?php
                                } else {

                                    ?>
                                    <img class="mo_sharing_icon_preview"
                                         id="mo_sharing_icon_preview_<?php echo $active_app ?>" style="display: none"
                                         src="<?php echo mo_ss_plugin_url . '/' . $active_app . '.png' ?>"/>

                                    <i class="mo_custom_sharing_icon_preview mofa mofa-<?php echo $active_app ?>"
                                       id="mo_custom_sharing_icon_preview_<?php echo $active_app ?>"
                                       style="color:#ffffff;text-align:center;margin-top:5px;"></i>

                                    <i class="mo_custom_sharing_icon_font_preview mofa mofa-<?php echo $active_app ?>"
                                       id="mo_custom_sharing_icon_font_preview_<?php echo $active_app ?>"
                                       style="text-align:center;margin-top:5px;"></i>

                                    <?php
                                }
                        }



                        ?>
                        <script>
                            var radio = "<?php echo get_option('mo_openid_share_custom_theme') ?>";

                            var application = ["facebook","twitter","google","vkontakte","tumblr","stumble","linkedin","reddit","pinterest","pocket","digg","mail","print","whatsapp"];
                            jQuery(document).ready(function () {
                                application.forEach(myFunction);
                                check_sharing_enable_apps();
                            });
                            function myFunction(item) {
                                if(item=="vkontakte"){
                                  item="vk";
                                }
                                var b = '#mo_sharing_icon_preview_' + item;
                                var c='#mo_custom_sharing_icon_preview_'+item;
                                var d='#mo_custom_sharing_icon_font_preview_'+item;
                                jQuery(d).toggle(0.00000000000000000000000000000000000000000000000000000001);
                                jQuery(c).toggle(0.00000000000000000000000000000000000000000000000000000001);

                                jQuery(b).toggle(0.00000000000000000000000000000000000000000000000000000001);
                                if(radio !== "default"){
                                    jQuery(b).toggle(0.00000000000000000000000000000000000000000000000000000001);

                                }
                                if(radio !=="custom") {
                                    jQuery(c).toggle(0.00000000000000000000000000000000000000000000000000000001);
                                }
                                if(radio !=="customFont") {
                                    jQuery(d).toggle(0.00000000000000000000000000000000000000000000000000000001);
                                }
                            }

                            function check_sharing_enable_apps() {
                                jQuery.ajax({
                                    url: "<?php echo admin_url("admin-ajax.php");?>", //the page containing php script
                                    method: "POST", //request type,
                                    data: {
                                        action: 'mo_sh_sharing_app_value',
                                        app_name: application,
                                    },
                                    success: function (result){
                                        var strArray = result.split("#");
                                        strArray.forEach(show_apps);

                                    }
                                });
                            }
                            function show_apps(apps) {
                              if(apps=="vkontakte"){
                                  apps="vk";
                              }
                                if(radio=="default") {
                                    jQuery('#mo_sharing_icon_preview_' + apps).show();
                                }
                                if(radio=="custom") {
                                    jQuery('#mo_custom_sharing_icon_preview_' + apps).show();
                                }
                                if(radio=="customFont") {
                                    jQuery('#mo_custom_sharing_icon_font_preview_' + apps).show();
                                }
                            }

                        </script>
                    </div>

                </td>
            </tr>



            </td>
            </tr>

            <script>
                var tempHorSize = '<?php echo esc_attr(get_option('mo_sharing_icon_custom_size')) ?>';
                var tempHorShape = '<?php echo esc_attr(get_option('mo_openid_share_theme')) ?>';
                var tempHorTheme = '<?php echo esc_attr(get_option('mo_openid_share_custom_theme')) ?>';
                var tempbackColor = '<?php echo esc_attr(get_option('mo_sharing_icon_custom_color'))?>';
                var tempHorSpace = '<?php echo esc_attr(get_option('mo_sharing_icon_space'))?>';
                var tempHorFontColor = '<?php echo esc_attr(get_option('mo_sharing_icon_custom_font'))?>';

            </script>


            <script type="text/javascript">
                var selectedApps = [];


                function addSelectedApps(e,app_name) {

                    var radio = "<?php echo get_option('mo_openid_share_custom_theme') ?>";
                    var flag = jQuery("#sel_apps .app_enable:checked").length + 1;
                    var value_of_app_default= ("#mo_sharing_icon_preview_" + app_name);
                    var value_of_app_custom=("#mo_custom_sharing_icon_preview_"+app_name);
                    var value_of_app_no=("#mo_custom_sharing_icon_font_preview_"+app_name);


                    if (e.checked) {

                        flag++;
                        if (radio== 'default') {

                            jQuery(value_of_app_default).show();
                        }
                        if (radio== 'custom') {

                            jQuery(value_of_app_custom).show();
                        }
                        if (radio=='customFont') {

                            jQuery(value_of_app_no).show();
                        }
                    } else if (!e.checked) {


                        flag--;
                        jQuery(value_of_app_default).hide();
                        jQuery(value_of_app_custom).hide();
                        jQuery(value_of_app_no).hide();
                    }

                    if (flag) {

                        jQuery("#no_apps_text").hide();
                    } else {
                        jQuery("#no_apps_text").show();
                    }

                }

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

                    else if("customFont"==w){

                        var a="mo_custom_sharing_icon_font_preview";
                        jQuery('.mo_sharing_icon_preview').hide();
                        jQuery('.mo_custom_sharing_icon_preview').hide();
                        jQuery('.mo_custom_sharing_icon_font_preview').show();
                        jQuery("."+a).css("font-size",t+"px");
                        jQuery('.mo_custom_sharing_icon_font_preview').css("color","#"+x);
                        jQuery("."+a).css("margin-left",(n-4)+"px");

                        if(r=="circle"){
                            jQuery("."+a).css("borderRadius","999px");

                        }else if(r=="oval"){
                            jQuery("."+a).css("borderRadius","5px");
                        }else if(r=="square"){
                            jQuery("."+a).css("borderRadius","0px");
                        }

                    }
                    //addSelectedApps();



                }
                moSharingPreview('horizontal', tempHorSize, tempHorShape, tempHorTheme, tempbackColor, tempHorSpace, tempHorFontColor);



                function mo_openid_enable_share(id_name) {

                    id=document.getElementById(id_name);

                    var mo_openid_share_nonce = '<?php echo wp_create_nonce("mo-openid-share"); ?>';
                    jQuery.ajax({
                        type: "POST",
                        url: '<?php echo admin_url("admin-ajax.php"); ?>',
                        data: {
                            'mo_openid_share_nonce': mo_openid_share_nonce,
                            id_name: id_name,
                            action:'mo_openid_share',
                            enabled:id.checked,
                        },
                        success: function(data) {

                        },
                        error: function (data){}
                    });
                }

            </script>
            <tr>
                <td>
                    <br>
                    <hr>
                    <p style="font-weight: 900; text-align: center; font-size: x-large">Click here to Add a sharing application</p>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                        <a style="text-decoration: none" href="<?php echo get_site_url() . "/wp-admin/admin.php?page=mo_ss_openid_settings&tab=cust_icon_opt";?> "><button type="button" style="cursor: pointer; background-color: #2795e9; color: white; height: 35px;width: 120px;border-radius: 20px; border-color: #2795e9">Click Here</button></a>
                    </center>
                    <br>
                    <hr>
                </td>
            </tr>

            <tr>
                <td>
                    <br/>
                    <p class="mo_openid_note_style"><strong>*<?php echo sh_mo_sl('NOTE');?>:</strong><br/><?php echo sh_mo_sl('Custom background: This will
                        change the background color of sharing icons');?>.
                        <br/><?php echo sh_mo_sl('No background: This will change the font color of icons without background');?>.
                        <br/><?php echo sh_mo_sl('No background will be applicable only for the few applications.');?>.
                    </p>
                </td>
            </tr>



        </table>

    </div>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Social Sharing');?>');
    </script>
    <?php
    }
    ?>
