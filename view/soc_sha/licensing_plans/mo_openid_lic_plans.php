<?php

function mo_ss_openid_licensing_plans()
{
    ?>
        <div style="text-align: center; font-size: 14px; background: forestgreen; color: white; padding-top: 4px; padding-bottom: 4px; border-radius: 16px;"></div>
        <input type="hidden" id="mo_license_plan_selected" value="" />
        <div class="mo-openid-tab-content">
            <div class="active">
                <br>
                <div class="mo-openid-cd-pricing-container mo-openid-cd-has-margins"><br>

                    <div style="background: #F2F5FB;border-radius:5px;font-size: large;margin-top:10px;padding:10px;border-style: solid;border-color: #2f6062">
                        <span class="dashicons dashicons-info" style="vertical-align: bottom;"></span>
                        Upgrading to any plan is a <b>One-Time Payment</b>. You can continue using all the available features in that plan for lifetime. Contact us at <a style="color:blue
    " href="mailto:info@xecurify.com">info@xecurify.com</a> for bulk discounts.
                    </div>

                    <input type="hidden" value="" id="mo_customer_registered">
                    <ul id="list-type" class="mo-openid-cd-pricing-list cd-bounce-invert" >
                        <li>
                            <ul class="mo-openid-cd-pricing-wrapper" id="col1">
                                <li data-type="singlesite" class="mosslp is-visible" style="">
                                    <header class="mo-openid-cd-pricing-header">
                                        <h2 style="margin-bottom:10px;">Free</h2>
                                        <h3 class="mo-openid-subheading_plans" style="color:black;"><span> &nbsp;</span><br> <span>You are on this plan </span><br><br /><br /></h3>
                                        <div class="cd-price" >
                                            <span class="mo-openid-cd-currency">$</span>
                                            <span class="mo-openid-cd-value">0</span> &nbsp;&nbsp;

                                        </div>
                                    </header> <!-- .mo-openid-cd-pricing-header -->
                                    </a>
                                    <footer class="mo-openid-cd-pricing-footer">
                                        <a style="cursor: pointer; display: block" class="mo-openid-cd-select" onclick="mo_openid_support_form('')">Contact US For More Features</a>
                                    </footer>

                                    <div class="mo-openid-cd-pricing-body">
                                        <ul class="mo-openid-cd-pricing-features ">
                                            <li>14 Social Sharing Apps</li>
                                            <li>Beautiful Icon</li>
                                            <li>Customisations for Icons & Themes</li>
                                            <li>Customize Text For Social Share Icons</li>
                                            <li>Social share count</li>
                                            <li>Facebook Social Comments</li>
                                            <li>Disqus Social Comments</li>
                                            <li>Display options</li>
                                            <li>Vertical Icons</li>
                                            <li>Horizontal Icons</li>
                                            <li>Shortcodes to display social sharing icons on
                                                any homepage, Blog post, Pages and BBPress</li>
                                            <li><a style="cursor: pointer" onclick="mo_openid_support_form('')">Click here to Contact Us</a></li>
                                        </ul>
                                    </div> <!-- .mo-openid-cd-pricing-body -->

                                </li>


                            </ul> <!-- .mo-openid-cd-pricing-wrapper -->
                        </li>

                        <li class="mo-openid-cd-popular">
                            <ul class="mo-openid-cd-pricing-wrapper" id="col2">
                                <li data-type="singlesite" class="mosslp is-visible" style="">
                                    <header class="mo-openid-cd-pricing-header">

                                        <h2 style="margin-bottom: 4%" >Standard<span style="font-size:0.5em"></span></h2>
                                        <label for="mo_sh_inst">Select No. of Instances : </label>
                                        <select name="mo_sh_inst" id="mo_sh_inst">
                                            <option value="1">1</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>

                                        <div class="cd-price" style="margin-top: 9%;">
                                            <span class="mo-openid-cd-currency">$</span>
                                            <span id="wca1" class="mo-openid-cd-value">19</span> &nbsp;&nbsp;
                                            <span class="mo-openid-cd-currency">$</span>
                                            <span id="wca2" class="mo-openid-cd-value"><strike>29</strike></span></span>

                                        </div>

                                    </header> <!-- .mo-openid-cd-pricing-header -->
                                    </a>
                                    <footer class="mo-openid-cd-pricing-footer">
                                        <a href="#" class="mo-openid-cd-select" style="display: block" onclick="mosocial_addonform('wp_social_login_share_plan')" >Upgrade Now</a>
                                    </footer>
                                    <div class="mo-openid-cd-pricing-body">
                                        <ul class="mo-openid-cd-pricing-features">
                                            <li><div class="mo_openid_tooltip" >40+ Social Sharing Application <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Facebook, LinkedIn, Twitter, WhatsApp, Kakao, Weibo, Line, Vkontakte,Tumblr, Yahoo, Mewe, Gmail, Kindleit, Telegram and many mores.</span></div></li>
                                            <li><div class="mo_openid_tooltip" >Social Share Count <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Share count for Facebook, Reddit, Vkontakte, Stumble Upon, Buffer and Pinterest.</span></div></li>
<!--                                            <div class="mo_openid_tooltip" >Discord AutoPost <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Sharing Icon for WooCommerce Product Pages.</span></div>-->
                                            <li>Customise Your Social Sharing Icon</li>
                                            <li>Mouse Hover Icons</li>
                                            <li><div class="mo_openid_tooltip" >Follow Us Button <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Follow us button with customizable icon.</span></div></li>
                                            <li><div class="mo_openid_tooltip" >Discord AutoPost <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Discord Auto post integrates with WordPress and WooCommerce. Once you configure the Webhook URLs, all of your new published posts will be sent to discord automatically.</span></div></li>
                                            <li>E-mail subscriber</li>
                                            <li><div class="mo_openid_tooltip" >Sharing Icon for WooCommerce Product Pages <i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;"> Sharing Icon for WooCommerce Individual Product Page, Before Individual Product Summary, Before shop loop,and more.</span></div></li>
                                            <li><div class="mo_openid_tooltip"> Sharing Icons for BBPress.<i class="mofa mofa-commenting" style="font-size:18px;color:#85929E"></i> <span class="mo_openid_tooltiptext"style="width:100%;">Sharing icons on BBPress Forum Page, Topic Page, and Reply page. </span></div></li>
                                            <li>Facebook Like Button</li>
                                            <li>Facebook Recommended Button</li>
                                            <li>Pinterest Pin Button</li>
                                            <li>Twitter follow</li>
                                            <li>Shortcodes to display social icons on any hompage page, post, popup and php pages</li>
                                            <li><a style="cursor: pointer" onclick="mo_openid_support_form('')">Click here to Contact Us</a></li>
                                        </ul>
                                    </div> <!-- .mo-openid-cd-pricing-body -->
                                </li>

                            </ul> <!-- .mo-openid-cd-pricing-wrapper -->
                        </li>


                    </ul> <!-- .mo-openid-cd-pricing-list -->
                </div>
            </div>
        </div>

        <script>

            function upgradeform(planType) {
                jQuery('#requestOrigin').val(planType);
                if(jQuery('#mo_customer_registered').val()==1)
                    jQuery('#loginform').submit();
                else{
                    location.href = jQuery('#mobacktoaccountsetup').attr('href');
                }

            }

            jQuery(document).ready(function($){

                //document.getElementById("multisite").checked = true;
                if(jQuery('#mo_license_plan_selected').val() == 'multisite'){
                    document.getElementById("multisite").checked = true;
                }
                if(document.getElementById("multisite").checked == true){
                    jQuery('.mosslp').removeClass('is-visible').addClass('is-hidden');
                    jQuery('.momslp').addClass('is-visible').removeClass('is-hidden is-selected');
                }

                function show_selected_items(selected_elements) {
                    selected_elements.addClass('is-selected');
                }

            });
        </script>
        <br/>&nbsp;<br/>

        <div class="clear">
            <hr>
            <h3>Refund Policy -</h3>
            <p><b>At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you
                    purchased is not working as advertised and you've attempted to resolve any issues with our support
                    team, which couldn't get resolved then we will refund the whole amount within 10 days of the
                    purchase. Please email us at <a href="mailto:info@xecurify.com"><i>info@xecurify.com</i></a> for any
                    queries regarding the return policy.</b></p>
            <b>Not applicable for -</b>
            <ol>
                <li>Returns that are because of features that are not advertised.</li>
                <li>Returns beyond 10 days.</li>
            </ol>
        </div>
        <script>
            //to set heading name
            function myFunction(dots_id,read_id,btn_id) {

                var dots = document.getElementById(dots_id);
                var moreText = document.getElementById(read_id);
                var btnText = document.getElementById(btn_id);

                if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.innerHTML = "Read more";
                    moreText.style.display = "none";
                } else {
                    dots.style.display = "none";
                    btnText.innerHTML = "Close";
                    moreText.style.display = "inline";
                }
            }
            jQuery('#mo_sh_inst').on('change', function () {
                if (this.value == "1") {
                    jQuery('#wca1').html("19");
                    jQuery('#wca2').html("<strike>29</strike>");
                } else if (this.value == "5") {
                    jQuery('#wca1').html("59");
                    jQuery('#wca2').html("<strike>95</strike>");
                }
                else if (this.value == "10") {
                    jQuery('#wca1').html("99");
                    jQuery('#wca2').html("<strike>190</strike>");
                }
            });
            function mosocial_addonform(planType) {
                jQuery.ajax({
                    url: "<?php echo admin_url("admin-ajax.php");?>", //the page containing php script
                    method: "POST", //request type,
                    dataType: 'json',
                    data: {
                        action: 'mo_register_sh_customer_toggle_update',
                    },
                    success: function (result) {
                        if(result.status){
                            jQuery('#requestOrigin').val(planType);
                            jQuery('#mosocial_loginform').submit();
                        }
                        else
                        {
                            alert("It seems you are not registered with miniOrange. Please login or register with us to upgrade to premium plan.");
                            window.location.href="<?php echo site_url()?>".concat("/wp-admin/admin.php?page=mo_ss_openid_settings&tab=profile");
                        }
                    }
                });
            }
        </script>

        </td>

        <td>
            <form style="display:none;" id="mosocial_loginform" action="<?php echo get_option( 'mo_openid_host_name' ) . '/moas/login'; ?>"
                  target="_blank" method="post" >
                <input type="email" name="username" value="<?php echo esc_attr(get_option('mo_openid_admin_email')); ?>" />
                <input type="text" name="redirectUrl" value="<?php echo esc_attr(get_option( 'mo_openid_host_name')).'/moas/initializepayment'; ?>" />
                <input type="text" name="requestOrigin" id="requestOrigin"/>
            </form>
        </td>

    <?php
}