<?php

function mo_openid_sh_check_empty_or_null( $value ) {
    if( ! isset( $value ) || empty( $value ) ) {
        return true;
    }
    return false;
}

function mo_openid_sh_show_success_message() {
    remove_action( 'admin_notices', 'mo_openid_sh_success_message' );
    add_action( 'admin_notices', 'mo_openid_sh_error_message' );
}

function mo_openid_sh_show_error_message() {
    remove_action( 'admin_notices', 'mo_openid_sh_error_message' );
    add_action( 'admin_notices', 'mo_openid_sh_success_message');
}

function mo_openid_sh_success_message() {
    $message = get_option('mo_openid_message'); ?>
    <div id="snackbar"><?php echo($message);?></div>
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #c02f2f;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 8%;
            right: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 3.5s;
            animation: fadein 0.5s, fadeout 0.5s 3.5s;
        }

        @-webkit-keyframes fadein {
            from {right: 0; opacity: 0;}
            to {right: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {right: 0; opacity: 0;}
            to {right: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {right: 30px; opacity: 1;}
            to {right: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {right: 30px; opacity: 1;}
            to {right: 0; opacity: 0;}
        }
    </style>
    <script>
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
    </script>
<?php }

function mo_openid_sh_error_message() {
    $message = get_option('mo_openid_message'); ?>
    <div id="snackbar"><?php echo($message);?></div>
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 8%;
            right: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 3.5s;
            animation: fadein 0.5s, fadeout 0.5s 3.5s;
        }

        @-webkit-keyframes fadein {
            from {right: 0; opacity: 0;}
            to {right: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {right: 0; opacity: 0;}
            to {right: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {right: 30px; opacity: 1;}
            to {right: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {right: 30px; opacity: 1;}
            to {right: 0; opacity: 0;}
        }
    </style>
    <script>

        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);

    </script>
<?php }

function mo_openid_sh_share_action(){
    $nonce = sanitize_text_field($_POST['mo_openid_share_nonce']);
    if (!wp_verify_nonce($nonce, 'mo-openid-share')) {
        wp_die('<strong>ERROR</strong>: Invalid Request.');
    } else {

        $enable_id = sanitize_text_field($_POST['enabled']);

        if ($enable_id == "true") {

            update_option(sanitize_text_field($_POST['id_name']), 1);
        } else if ($enable_id == "false") {

            update_option(sanitize_text_field($_POST['id_name']), 0);
        }
    }
}

function mo_sh_sharing_app_value()
{
    $return_apps='';
    $count=1;
    foreach ($_POST['app_name'] as $app) {
        $app_value = get_option('mo_openid_' . $app . '_share_enable');
        if($app_value) {
            if($count==1) {
                $return_apps = $app;
                $count++;
            }
            else
                $return_apps.="#".$app;
        }
    }
    wp_send_json($return_apps);

}

function mo_openid_sh_activation_message() {
    $class = "updated";
    $message = get_option('mo_openid_message');
    echo "<div class='" . $class . "'> <p>" . $message . "</p></div>";
}

function mo_openid_sh_rating_given(){
    update_option("mo_openid_sh_rating_given",sanitize_text_field($_POST['rating']));
}

function mo_openid_sh_show_verify_license_page($licience_type){
    ?>
    <div class="mo_openid_table_layout" style="padding-bottom:50px;!important">
        <h3>Verify License </h3>
        <form name="f" method="post" action="">
            <input type="hidden" name="option" value="mo_openid_verify_license" />
            <input type="hidden" name="mo_openid_verify_license_nonce"
                   value="<?php echo wp_create_nonce( 'mo-openid-verify-license-nonce' ); ?>"/>

            <p><b><font color="#FF0000">*</font>Enter your license key to activate the plugin:</b>
                <input class="mo_openid_table_textbox" required type="text" style="margin-left:40px;width:300px;"
                       name="openid_licence_key" placeholder="Enter your license key to activate the plugin"/>
            </p>
            <p><b><font color="#FF0000">*</font>Please check this to confirm that you have read it: </b>&nbsp;&nbsp;<input required type="checkbox" name="license_conditions"/></p>


            <ol>
                <li>License key you have entered here is associated with this site instance. In future, if you are re-installing the plugin or your site for any reason. You should deactivate and then delete the plugin from wordpress console and should not manually delete the plugin folder. So that you can resuse the same license key.</li><br>
                <li><b>This is not a developer's license.</b> Making any kind of change to the plugin's code will delete all your configuration and make the plugin unusable.</li>
            </ol>
            <br>
            <input type="hidden" name="licience_type" value="<?php echo $licience_type?>" />
            <input type="submit" name="submit" value="Activate License" class="button button-primary button-large"/>
        </form>
    </div>
    <?php
}

function mo_openid_sh_show_verify_password_page() {
    update_option('regi_pop_up','no');
    ?>
    <!--Verify password with miniOrange-->
    <form name="f" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_connect_verify_customer" />
        <input type="hidden" name="mo_openid_connect_verify_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-connect-verify-nonce' ); ?>"/>
        <div class="mo_openid_table_layout">
            <h3>Login with miniOrange</h3>
            <p><b>It seems you already have an account with miniOrange. Please enter your miniOrange email and password. <a href="#forgot_password">Click here if you forgot your password?</a></b></p>
            <table class="mo_openid_settings_table">
                <tr>
                    <td><b><font color="#FF0000">*</font>Email:</b></td>
                    <td><input class="mo_openid_table_textbox" id="email" type="email" name="email"
                               required placeholder="person@example.com"
                               value="<?php echo esc_attr(get_option('mo_openid_admin_email'));?>" /></td>
                </tr>
                <td><b><font color="#FF0000">*</font>Password:</b></td>
                <td><input class="mo_openid_table_textbox" required type="password"
                           name="password" placeholder="Choose your password" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Login"
                               class="button button-primary button-large" />
                        <input type="button" value="Registration Page" id="mo_openid_go_back" style="margin-left: 2%"
                               class="button button-primary button-large" />
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <form name="f" method="post" action="" id="openidgobackform">
        <input type="hidden" name="option" value="mo_openid_go_back_login"/>
        <input type="hidden" name="mo_openid_go_back_login_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-go-back-login-nonce' ); ?>"/>
    </form>
    <form name="forgotpassword" method="post" action="" id="openidforgotpasswordform">
        <input type="hidden" name="option" value="mo_openid_forgot_password"/>
        <input type="hidden" name="mo_openid_forgot_password_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-forgot-password-nonce' ); ?>"/>
        <input type="hidden" id="forgot_pass_email" name="email" value=""/>
    </form>
    <script>
        jQuery('#mo_openid_go_back').click(function() {
            jQuery('#openidgobackform').submit();
        });
        jQuery('a[href="#forgot_password"]').click(function(){
            jQuery('#forgot_pass_email').val(jQuery('#email').val());
            jQuery('#openidforgotpasswordform').submit();
        });
    </script>
    <?php
}

function mo_openid_sh_is_customer_registered() {
    $email          = get_option('mo_openid_admin_email');
    $customerKey    = get_option('mo_openid_admin_customer_key');
    if( ! $email || ! $customerKey || ! is_numeric( trim( $customerKey ) ) ) {
        return 0;
    } else {
        return 1;
    }
}


function mo_register_sh_customer_toggle_update(){
    if(mo_openid_sh_is_customer_registered()){
        $appname = stripslashes(sanitize_text_field($_POST['appname']));
        if(isset($appname))
            update_option('mo_openid_enable_custom_app_' . $appname, 0);
        wp_send_json(["status"=>true]);
    }
    else
        wp_send_json(["status"=>false]);
}
function sh_create_customer(){
    delete_option('mo_openid_sms_otp_count');
    delete_option('mo_openid_email_otp_count');
    $customer = new sh_CustomerOpenID();
    $customerKey = json_decode( $customer->sh_create_customer(), true );
    if( strcasecmp( $customerKey['status'], 'CUSTOMER_USERNAME_ALREADY_EXISTS') == 0 ) {
        sh_get_current_customer();
    }
    else if((strcasecmp( $customerKey['status'], 'FAILED' ) == 0) && (strcasecmp( $customerKey['message'], 'Email is not enterprise email.' ) == 0) ){
        if($_POST['action']=='mo_register_new_user')
            wp_send_json(["error" => 'There was an error creating an account for you. You may have entered an invalid Email-Id. (We discourage the use of disposable emails) Please try again with a valid email.']);
        else {
            update_option('mo_openid_message', ' There was an error creating an account for you. You may have entered an invalid Email-Id. <b> (We discourage the use of disposable emails) </b> Please try again with a valid email.');
            update_option('mo_openid_registration_status', 'EMAIL_IS_NOT_ENTERPRISE');
            mo_openid_show_error_message();
            if (get_option('regi_pop_up') == "yes") {
                update_option('pop_regi_msg', get_option('mo_openid_message'));
                mo_openid_registeration_modal();
            }
        }
    }
    else if( strcasecmp( $customerKey['status'], 'SUCCESS' ) == 0 ) {
        update_option( 'mo_openid_admin_customer_key', $customerKey['id'] );
        update_option( 'mo_openid_admin_api_key', $customerKey['apiKey'] );
        update_option( 'mo_openid_customer_token', $customerKey['token'] );
        delete_option('mo_openid_admin_password', '');
        update_option('mo_openid_cust', '0');
        update_option( 'mo_openid_message', 'Registration complete!');
        update_option('mo_openid_registration_status','MO_OPENID_REGISTRATION_COMPLETE');
        delete_option('mo_openid_verify_customer');
        delete_option('mo_openid_new_registration');
        if($_POST['action']=='mo_register_new_user')
            wp_send_json(["success" => 'Registration complete!']);
        else {
            mo_openid_sh_show_success_message();
            header('Location: admin.php?page=mo_openid_settings&tab=licensing_plans');
        }
    }
    delete_option('mo_openid_admin_password', '');
}
