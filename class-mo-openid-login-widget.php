<?php

include "mo-openid-social-login-functions.php";

add_action('widgets_init', function () {
    register_widget("mo_openid_sh_sharing_ver_wid");
});
add_action('widgets_init', function () {
    register_widget("mo_openid_sh_sharing_hor_wid");
});




/**
 * Sharing Widget Horizontal
 *
 */
class mo_openid_sh_sharing_hor_wid extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'mo_openid_sh_sharing_hor_wid',
            'miniOrange Sharing - Horizontal',
            array(
                'description' => __( 'Share using horizontal widget. Lets you share with Social Apps like Google, Facebook, LinkedIn, Pinterest, Reddit.', 'flw' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );

        echo $args['before_widget'];
        $this->show_sharing_buttons_horizontal();

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['wid_title'] = strip_tags( $new_instance['wid_title'] );
        return $instance;
    }

    public function show_sharing_buttons_horizontal(){
        global $post;
        $title = str_replace('+', '%20', urlencode($post->post_title));
        $content=strip_shortcodes( strip_tags( get_the_content() ) );
        $post_content=$content;
        $excerpt = '';
        $landscape = 'horizontal';
        include( plugin_dir_path( __FILE__ ) . 'class-mo-openid-social-share.php');
    }

}


/**
 * Sharing Vertical Widget
 *
 */
class mo_openid_sh_sharing_ver_wid extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'mo_openid_sh_sharing_ver_wid',
            'miniOrange Sharing - Vertical',
            array(
                'description' => __( 'Share using a vertical floating widget. Lets you share with Social Apps like Google, Facebook, LinkedIn, Pinterest, Reddit.', 'flw' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        $wid_title = apply_filters( 'widget_title', $instance['wid_title'] );
        $alignment = apply_filters( 'alignment', isset($instance['alignment'])? $instance['alignment'] : 'left');
        $left_offset = apply_filters( 'left_offset', isset($instance['left_offset'])? $instance['left_offset'] : '20');
        $right_offset = apply_filters( 'right_offset', isset($instance['right_offset'])? $instance['right_offset'] : '0');
        $top_offset = apply_filters( 'top_offset', isset($instance['top_offset'])? $instance['top_offset'] : '100');
        $space_icons = apply_filters( 'space_icons', isset($instance['space_icons'])? $instance['space_icons'] : '10');

        echo $args['before_widget'];
        if ( ! empty( $wid_title ) )
            echo $args['before_title'] . $wid_title . $args['after_title'];

        echo "<div style='display:inline-block !important; overflow: visible; z-index: 10000000; padding: 10px; border-radius: 4px; opacity: 1; -webkit-box-sizing: content-box!important; -moz-box-sizing: content-box!important; box-sizing: content-box!important; width:40px; position:fixed;" .(isset($alignment) && $alignment != '' && isset($instance[$alignment.'_offset']) ? esc_attr($alignment) .': '. ( $instance[$alignment.'_offset'] == '' ? 0 : esc_attr($instance[$alignment.'_offset'] )) .'px;' : '').(isset($top_offset) ? 'top: '. ( $top_offset == '' ? 0 : esc_attr($top_offset )) .'px;' : '') ."'>";

        $this->show_sharing_buttons_vertical($space_icons);

        echo '</div>';

        echo $args['after_widget'];
    }

    /*Called when user changes configuration in Widget Admin Panel*/
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['wid_title'] = strip_tags( $new_instance['wid_title'] );
        $instance['alignment'] = $new_instance['alignment'];
        $instance['left_offset'] = $new_instance['left_offset'];
        $instance['right_offset'] = $new_instance['right_offset'];
        $instance['top_offset'] = $new_instance['top_offset'];
        $instance['space_icons'] = $new_instance['space_icons'];
        return $instance;
    }


    public function show_sharing_buttons_vertical($space_icons){
        global $post;
        if($post->post_title) {
            $title = str_replace('+', '%20', urlencode($post->post_title));
        } else {
            $title = get_bloginfo( 'name' );
        }
        $content=strip_shortcodes( strip_tags( get_the_content() ) );
        $post_content=$content;
        $excerpt = '';
        $landscape = 'vertical';

        include( plugin_dir_path( __FILE__ ) . 'class-mo-openid-social-share.php');
    }

    /** Widget edit form at admin panel */
    function form( $instance ) {
        /* Set up default widget settings. */
        $defaults = array('alignment' => 'left', 'left_offset' => '20', 'right_offset' => '0', 'top_offset' => '100' , 'space_icons' => '10');

        foreach( $instance as $key => $value ){
            $instance[ $key ] = esc_attr( $value );
        }

        $instance = wp_parse_args( (array)$instance, $defaults );
        ?>
        <p>
            <script>
                function moOpenIDVerticalSharingOffset(alignment){
                    if(alignment == 'left'){
                        jQuery('.moVerSharingLeftOffset').css('display', 'block');
                        jQuery('.moVerSharingRightOffset').css('display', 'none');
                    }else{
                        jQuery('.moVerSharingLeftOffset').css('display', 'none');
                        jQuery('.moVerSharingRightOffset').css('display', 'block');
                    }
                }
            </script>
            <label for="<?php echo esc_attr($this->get_field_id( 'alignment' )); ?>">Alignment</label>
            <select onchange="moOpenIDVerticalSharingOffset(this.value)" style="width: 95%" id="<?php echo esc_attr($this->get_field_id( 'alignment' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'alignment' )); ?>">
                <option value="left" <?php echo $instance['alignment'] == 'left' ? 'selected' : ''; ?>>Left</option>
                <option value="right" <?php echo $instance['alignment'] == 'right' ? 'selected' : ''; ?>>Right</option>
            </select>
        <div class="moVerSharingLeftOffset" <?php echo $instance['alignment'] == 'right' ? 'style="display: none"' : ''; ?>>
            <label for="<?php echo esc_attr($this->get_field_id( 'left_offset' )); ?>">Left Offset</label>
            <input style="width: 95%" id="<?php echo esc_attr($this->get_field_id( 'left_offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'left_offset' )); ?>" type="text" value="<?php echo $instance['left_offset']; ?>" />px<br/>
        </div>
        <div class="moVerSharingRightOffset" <?php echo $instance['alignment'] == 'left' ? 'style="display: none"' : ''; ?>>
            <label for="<?php echo esc_attr($this->get_field_id( 'right_offset' )); ?>">Right Offset</label>
            <input style="width: 95%" id="<?php echo esc_attr($this->get_field_id( 'right_offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'right_offset' )); ?>" type="text" value="<?php echo $instance['right_offset']; ?>" />px<br/>
        </div>
        <label for="<?php echo esc_attr($this->get_field_id( 'top_offset' )); ?>">Top Offset</label>
        <input style="width: 95%" id="<?php echo esc_attr($this->get_field_id( 'top_offset' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'top_offset' )); ?>" type="text" value="<?php echo $instance['top_offset']; ?>" />px<br/>
        <label for="<?php echo esc_attr($this->get_field_id( 'space_icons' )); ?>">Space between icons</label>
        <input style="width: 95%" id="<?php echo esc_attr($this->get_field_id( 'space_icons' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'space_icons' )); ?>" type="text" value="<?php echo $instance['space_icons']; ?>" />px<br/>
        </p>
        <?php
    }

}

function mo_openid_share_validate(){



   if( isset($_POST['mo_openid_go_back_registration_nonce']) and isset( $_POST['option'] ) and $_POST['option'] == "mo_openid_go_back_registration" ){
        $nonce = sanitize_text_field($_POST['mo_openid_go_back_registration_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'mo-openid-go-back-register-nonce' ) ) {
            wp_die('<strong>ERROR</strong>: Invalid Request.');
        } else {
            update_option('mo_openid_verify_customer','true');
        }
    }
    else if ( isset($_POST['mo_openid_custom_form_submitted_nonce']) and isset($_POST['username']) and $_POST['option'] == 'mo_openid_custom_form_submitted' ){
        $nonce = sanitize_text_field($_POST['mo_openid_custom_form_submitted_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'mo-openid-custom-form-submitted-nonce' ) ) {
            wp_die('<strong>ERROR</strong>: Invalid Request.' . $nonce);
        } else {
            global $wpdb;
            $db_prefix = $wpdb->prefix;
            $curr_user=get_current_user_id();
            if($curr_user!=0) {
                update_custom_data($curr_user);
                header("Location:".get_option('profile_completion_page'));
                exit;
            }
            $user_picture = sanitize_text_field($_POST["user_picture"]);
            $user_url = sanitize_text_field($_POST["user_url"]);
            $last_name = sanitize_text_field($_POST["last_name"]);
            $username=sanitize_text_field($_POST["username"]);
            $user_email=sanitize_text_field($_POST["user_email"]);
            $random_password=sanitize_text_field($_POST["random_password"]);
            $user_full_name = sanitize_text_field($_POST["user_full_name"]);
            $first_name = sanitize_text_field($_POST["first_name"]);
            $decrypted_app_name = sanitize_text_field($_POST["decrypted_app_name"]);
            $decrypted_user_id = sanitize_text_field($_POST["decrypted_user_id"]);
            $call = sanitize_text_field($_POST["call"]);
            $user_profile_url = sanitize_text_field($_POST["user_profile_url"]);
            $social_app_name = sanitize_text_field($_POST["social_app_name"]);
            $social_user_id = sanitize_text_field($_POST["social_user_id"]);

            $userdata = array(
                'user_login'  => $username,
                'user_email'    => $user_email,
                'user_pass'   =>  $random_password,
                'display_name' => $user_full_name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'user_url' => $user_url,
            );

            // Checking if username already exist
            $user_name_user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users where user_login = %s", $userdata['user_login']));

            if( isset($user_name_user_id) ){
                $email_array = explode('@', $user_email);
                $user_name = $email_array[0];
                $user_name_user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users where user_login = %s", $user_name));
                $i = 1;
                while(!empty($user_name_user_id) ){
                    $uname=$user_name.'_' . $i;
                    $user_name_user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM " .$db_prefix."users where user_login = %s", $uname));
                    $i++;
                    if(empty($user_name_user_id)){
                        $userdata['user_login']= $uname;
                        $username =$uname;
                    }
                }

                if($i==1)
                    $userdata['user_login'] = $uname;

                if( isset($user_name_user_id) ){
                    echo '<br/>'."Error Code Existing Username: ".get_option('mo_existing_username_error_message');
                    exit();
                }
            }

            $user_id   = wp_insert_user( $userdata);
            if(is_wp_error( $user_id )) {
                print_r($user_id);
                wp_die("Error Code ".$call.": ".get_option('mo_registration_error_message'));
            }

            update_option('mo_openid_user_count',get_option('mo_openid_user_count')+1);

            if($social_app_name!="")
                $appname=$social_app_name;
            else
                $appname=$decrypted_app_name;

            $session_values= array(
                'username' => $username,
                'user_email' => $user_email,
                'user_full_name' => $user_full_name,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'user_url' => $user_url,
                'user_picture' => $user_picture,
                'social_app_name' => $appname,
                'social_user_id' => $social_user_id,
            );

            mo_openid_start_session_login($session_values);
            $user	= get_user_by('id', $user_id );
            update_custom_data($user_id);
            //registration hook
            do_action( 'mo_user_register', $user_id,$user_profile_url);
            mo_openid_link_account($user->user_login, $user);
            $linked_email_id = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM " . $db_prefix . "mo_openid_linked_user where linked_social_app = \"%s\" AND identifier = %s", $appname, $social_user_id));
            mo_openid_login_user($linked_email_id,$user_id,$user,$user_picture,0);
        }
    }

    else if( isset($_POST['mo_openid_go_back_login_nonce']) and isset( $_POST['option'] ) and $_POST['option'] == "mo_openid_go_back_login" ){
        $nonce = sanitize_text_field($_POST['mo_openid_go_back_login_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'mo-openid-go-back-login-nonce' ) ) {
            wp_die('<strong>ERROR</strong>: Invalid Request.');
        } else {
            update_option('mo_openid_registration_status','');
            delete_option('mo_openid_admin_email');
            delete_option('mo_openid_admin_phone');
            delete_option('mo_openid_admin_password');
            delete_option('mo_openid_admin_customer_key');
            delete_option('mo_openid_verify_customer');
        }
    }
    else if(isset($_POST['mo_openid_forgot_password_nonce']) and isset($_POST['option']) and $_POST['option'] == 'mo_openid_forgot_password'){
        $nonce = sanitize_text_field($_POST['mo_openid_forgot_password_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'mo-openid-forgot-password-nonce' ) ) {
            wp_die('<strong>ERROR</strong>: Invalid Request.');
        } else {
            $email ='';
            if( mo_openid_sh_check_empty_or_null( $email ) ) {
                if( mo_openid_sh_check_empty_or_null( $_POST['email'] ) ) {
                    update_option( 'mo_openid_message', 'No email provided. Please enter your email below to reset password.');
                    mo_openid_sh_show_error_message();
                    if(get_option('regi_pop_up') =="yes"){
                        update_option("pop_login_msg",get_option("mo_openid_message"));
                        mo_pop_show_verify_password_page();
                    }
                    return;
                } else {
                    $email = sanitize_email($_POST['email']);
                }
            }
            $customer = new sh_CustomerOpenID();
            $content = json_decode($customer->sh_forgot_password($email),true);
            if(strcasecmp($content['status'], 'SUCCESS') == 0){
                update_option( 'mo_openid_message','You password has been reset successfully. Please enter the new password sent to your registered mail here.');
                mo_openid_sh_show_success_message();
                if(get_option('regi_pop_up') =="yes"){
                    update_option("pop_login_msg",get_option("mo_openid_message"));
                    mo_pop_show_verify_password_page();
                }
            }else{
                update_option( 'mo_openid_message','An error occurred while processing your request. Please make sure you are registered in miniOrange with the <b>'. $content['email'] .'</b> email address. ');
                mo_openid_sh_show_error_message();
                if(get_option('regi_pop_up') =="yes"){
                    update_option("pop_login_msg",get_option("mo_openid_message"));
                    mo_pop_show_verify_password_page();
                }
            }
        }
    }
    else if( isset($_POST['mo_openid_connect_register_nonce']) and isset( $_POST['option'] ) and $_POST['option'] == "mo_openid_connect_register_customer" ) {	//register the admin to miniOrange
        $nonce = sanitize_text_field($_POST['mo_openid_connect_register_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'mo-openid-connect-register-nonce' ) ) {
            wp_die('<strong>ERROR</strong>: Invalid Request.');
        } else {
            mo_openid_sh_register_user();
        }
    }
    else if( isset( $_POST['show_login'] ) )
    {
        mo_pop_show_verify_password_page();
    }


    else if( isset($_POST['mo_openid_connect_verify_nonce']) and isset( $_POST['option'] ) and $_POST['option'] == "mo_openid_connect_verify_customer" ) {    //register the admin to miniOrange
        $nonce = sanitize_text_field($_POST['mo_openid_connect_verify_nonce']);
        if (!wp_verify_nonce($nonce, 'mo-openid-connect-verify-nonce')) {
            wp_die('<strong>ERROR</strong>: Invalid Request.');
        }
        else {
            mo_sh_register_old_user();
        }
    }


}
function mo_openid_sh_register_user()
{
    //validation and sanitization
    $email = '';
    $password = '';
    $confirmPassword = '';
    $illegal = "#$%^*()+=[]';,/{}|:<>?~";
    $illegal = $illegal . '"';
    if (mo_openid_sh_check_empty_or_null($_POST['email']) || mo_openid_sh_check_empty_or_null($_POST['password']) || mo_openid_sh_check_empty_or_null($_POST['confirmPassword'])) {
        update_option('mo_openid_message', 'All the fields are required. Please enter valid entries.');
        mo_openid_sh_show_error_message();
        if (get_option('regi_pop_up') == "yes") {
            update_option('pop_regi_msg', get_option('mo_openid_message'));
            mo_openid_registeration_modal();
        }
        return;
    } else if (strlen($_POST['password']) < 6 || strlen($_POST['confirmPassword']) < 6) {    //check password is of minimum length 6
        update_option('mo_openid_message', 'Choose a password with minimum length 6.');
        mo_openid_sh_show_error_message();
        if (get_option('regi_pop_up') == "yes") {
            update_option('pop_regi_msg', get_option('mo_openid_message'));
            mo_openid_registeration_modal();
        }
        return;
    } else if (strpbrk($_POST['email'], $illegal)) {
        update_option('mo_openid_message', 'Please match the format of Email. No special characters are allowed.');
        mo_openid_sh_show_error_message();
        if (get_option('regi_pop_up') == "yes") {
            update_option('pop_regi_msg', get_option('mo_openid_message'));
            mo_openid_registeration_modal();
        }
        return;
    } else if (strcmp(stripslashes($_POST['password']), stripslashes($_POST['confirmPassword'])) != 0) {
        update_option('mo_openid_message', 'Passwords do not match.');
        if (get_option('regi_pop_up') == "yes") {
            update_option('pop_regi_msg', get_option('mo_openid_message'));
            mo_openid_registeration_modal();
        }
        delete_option('mo_openid_verify_customer');
        mo_openid_sh_show_error_message();
    } else {
        $email = sanitize_email($_POST['email']);
        $password = stripslashes($_POST['password']);
        update_option('mo_openid_admin_email', $email);
        update_option('mo_openid_admin_password', $password);
        $customer = new sh_CustomerOpenID();
        $content = json_decode($customer->sh_check_customer(), true);
        if (strcasecmp($content['status'], 'CUSTOMER_NOT_FOUND') == 0) {
            if ($content['status'] == 'ERROR') {
                if ($_POST['action'] == 'mo_register_new_user') {
                    wp_send_json(["error" => $content['message']]);
                } else {
                    update_option('mo_openid_message', $content['message']);
                    mo_openid_sh_show_error_message();
                }
            } else {
                sh_create_customer();
                update_option('mo_openid_oauth', '1');
                update_option('mo_openid_new_user', '1');
                update_option('mo_openid_malform_error', '1');
            }

        } else if ($content == null) {
            if ($_POST['action'] == 'mo_register_new_user') {
                wp_send_json(["error" => 'Please check your internet connetion and try again.']);
            } else {
                update_option('mo_openid_message', "Please check your internet connetion and try again.");
                mo_openid_sh_show_error_message();
                if (get_option('regi_pop_up') == "yes") {
                    update_option('pop_regi_msg', get_option('mo_openid_message'));
                    mo_openid_registeration_modal();
                }
            }
        } else {
            sh_get_current_customer();
        }
        delete_option('mo_openid_admin_password');

    }

}
function sh_get_current_customer(){
    $customer = new sh_CustomerOpenID();
    $content = $customer->get_sh_customer_key();
    $customerKey = json_decode( $content, true );
    if( isset($customerKey) ) {
        update_option( 'mo_openid_admin_customer_key', $customerKey['id'] );
        update_option( 'mo_openid_admin_api_key', $customerKey['apiKey'] );
        update_option( 'mo_openid_customer_token', $customerKey['token'] );
        update_option('mo_openid_admin_password', '' );
        update_option( 'mo_openid_message', 'Your account has been retrieved successfully.' );
        delete_option('mo_openid_verify_customer');
        delete_option('mo_openid_new_registration');
        if($_POST['action']=='mo_register_new_user')
            wp_send_json(["success" => 'Your account has been retrieved successfully.']);
        else
            mo_openid_sh_show_success_message();
    } else {
        update_option( 'mo_openid_message', 'You already have an account with miniOrange. Please enter a valid password.');
        update_option('mo_openid_verify_customer', 'true');
        delete_option('mo_openid_new_registration');
        if($_POST['action']=='mo_register_new_user')
            wp_send_json(["error" => 'You already have an account with miniOrange. Please enter a valid password.']);
        else {
            mo_openid_sh_show_error_message();
            if (get_option('regi_pop_up') == "yes") {
                update_option("pop_login_msg", get_option("mo_openid_message"));
                mo_pop_show_verify_password_page();
            }
        }
    }
}

function mo_sh_register_old_user(){
    //validation and sanitization
    $email = '';
    $password = '';
    $illegal = "#$%^*()+=[]';,/{}|:<>?~";
    $illegal = $illegal . '"';
    $message =new miniorange_ss_openid_sso_settings();
    if (mo_openid_sh_check_empty_or_null($_POST['email']) || mo_openid_sh_check_empty_or_null($_POST['password'])) {
        update_option('mo_openid_message', 'All the fields are required. Please enter valid entries.');
        $message->mo_openid_sh_show_error_message();
        return;
    } else if (strpbrk($_POST['email'], $illegal)) {
        update_option('mo_openid_message', 'Please match the format of Email. No special characters are allowed.');
        $message->mo_openid_sh_show_error_message();
        return;
    } else {
        $email = sanitize_email($_POST['email']);
        $password = stripslashes($_POST['password']);
    }
    update_option('mo_openid_admin_email', $email);
    update_option('mo_openid_admin_password', $password);
    $customer = new sh_CustomerOpenID();
    $content = $customer->get_sh_customer_key();
    $customerKey = json_decode($content, true);
    if (isset($customerKey)) {
        update_option('mo_openid_admin_customer_key', $customerKey['id']);
        update_option('mo_openid_admin_api_key', $customerKey['apiKey']);
        update_option('mo_openid_customer_token', $customerKey['token']);
        update_option('mo_openid_admin_phone', $customerKey['phone']);
        update_option('mo_openid_admin_password', '');
        update_option('mo_openid_message', 'Your account has been retrieved successfully.');
        delete_option('mo_openid_verify_customer');
        if(isset($_POST['action'])?$_POST['action']=='mo_sh_register_old_user':false)
            wp_send_json(["success" => 'Your account has been retrieved successfully.']);
        else
            mo_openid_sh_show_success_message();
    } else {
        if (isset($_POST['action'])?$_POST['action'] == 'mo_sh_register_old_user':false)
            wp_send_json(["error" => 'Invalid username or password. Please try again.']);
        else {
            update_option('mo_openid_message', 'Invalid username or password. Please try again.');
            mo_openid_sh_show_error_message();
        }
    }
    update_option('mo_openid_admin_password', '');
}
