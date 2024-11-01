<?php

/**
 * Plugin Name: Social Sharing by miniOrange
 * Plugin URI: https://www.miniorange.com
 * Description: Allow your users to share, and share with Facebook, Google, Apple, Twitter, LinkedIn etc using customizable buttons.
 * Version: 1.0.6
 * Author: miniOrange
 * License URI: http://miniorange.com/usecases/miniOrange_User_Agreement.pdf
 */

define('MO_OPENID_SOCIAL_SHARE_VERSION', '1.0.6');
define('mo_ss_plugin_url', plugin_dir_url(__FILE__) . "includes/images/icons/");
define('MOSS_PLUGIN_DIR',str_replace('/','\\',plugin_dir_path(__FILE__)));
require('miniorange_openid_sso_settings_page.php');
require('view/profile/mo_openid_profile.php');
require('class-mo-openid-sso-shortcode-buttons.php');
require('class-mo-openid-social-comment.php');
include dirname( __FILE__ ) . '/mo_openid_Language.php';
include dirname( __FILE__ ) . '/mo_openid_feedback_form.php';
include_once dirname(__FILE__) . '/class-mo-openid-login-widget.php';

class miniorange_ss_openid_sso_settings
{
    function __construct()
    {
        register_activation_hook( __FILE__, array( $this, 'mo_openid_sh_activate' ) );
        register_deactivation_hook(__FILE__, array( $this, 'mo_openid_sh_deactivate'));

        add_action( 'plugins_loaded', array( $this, 'social_sh_load_textdomain'));
        add_action('admin_menu', array($this, 'new_miniorange_sh_openid_menu'));
      //  add_action('init', array( $this, 'mo_openid_sh_plugin_settings_style' ));
        add_action( 'admin_init',  array( $this, 'miniorange_openid_sh_save_settings' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'mo_openid_sh_plugin_settings_script' ) );
      //  add_action( 'admin_enqueue_scripts', array( $this, 'mo_openid_sh_plugin_settings_style' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'mo_openid_sh_plugin_admin_style' ) );
        add_action('wp_ajax_mo_openid_share', 'mo_openid_sh_share_action');
        add_action( 'admin_footer', array( $this,'mo_openid_sh_feedback_request' ));
        add_action( 'wp_enqueue_scripts', array( $this, 'mo_openid_sh_plugin_script' ) ,5);
        add_action('wp_ajax_mo_register_sh_customer_toggle_update', 'mo_register_sh_customer_toggle_update');
        add_action('init', 'mo_openid_share_validate' );
        add_action('wp_ajax_mo_register_new_user', 'mo_openid_sh_register_user');
        add_action('wp_ajax_mo_sh_register_old_user', 'mo_sh_register_old_user');
        add_action('wp_ajax_mo_sh_sharing_app_value', 'mo_sh_sharing_app_value');
        update_option('mo_openid_social_share_version',MO_OPENID_SOCIAL_SHARE_VERSION);



        //add shortcode
        add_shortcode( 'miniorange_social_sharing', array($this, 'mo_get_sh_sharing_output') );
        add_shortcode( 'miniorange_social_sharing_vertical', array($this, 'mo_get_sh_vertical_sharing_output') );
        add_shortcode( 'miniorange_social_custom_fields', array($this, 'mo_get_custom_output') );
        add_filter( 'the_content', array( $this, 'mo_openid_sh_add_social_share_links' ) );
        add_filter( 'the_excerpt', array( $this, 'mo_openid_sh_add_social_share_links' ) );
        add_shortcode( 'miniorange_social_comments', array($this, 'mo_get_sh_comments_output') );
        add_shortcode('miniorange_follow_us_button',array($this,'mo_get_sh_follow_us_output'));

        //set default values
        add_option( 'mo_openid_host_name', 'https://login.xecurify.com');
        add_option('mo_openid_admin_api_key','BjIZyuSDTE90MVWp4pRLr3dzrFs8h74T');
        add_option('mo_openid_customer_token','6osoapPWEgGlBRgT');

        //social sharing
        add_option( 'mo_openid_share_theme', 'oval' );
        add_option( 'mo_openid_share_custom_theme', 'default' );
        add_option( 'mo_share_icon_space','4' );
        add_option('mo_sharing_icon_custom_color','000000');
        add_option('mo_sharing_icon_custom_font','000000');
        add_option( 'mo_share_icon_custom_height','35' );
        add_option( 'mo_sharing_icon_space','4' );
        add_option('mo_share_icon_custom_boundary','4');
        add_option( 'mo_openid_share_widget_customize_text_color', '000000');
        add_option( 'mo_openid_share_widget_customize_text', 'Share with:' );
        add_option( 'mo_openid_share_email_subject','I wanted you to see this site' );
        add_option('share_app','facebook#twitter#google#vkontakte#tumblr#stumble#linkedin#reddit#pinterest#pocket#digg#mail#print#whatsapp');
        add_option( 'mo_openid_popup_window', '0');
        add_action('mo_openid_registration_redirect','1');
        add_option('mo_sharing_icon_custom_size','35');
        add_option('mo_openid_share_email_body','Check out this site ##url##');

        add_option( 'mo_share_options_enable_post_position', 'before');
        add_option( 'mo_share_options_home_page_position', 'before');
        add_option( 'mo_share_options_static_pages_position', 'before');
        add_option( 'mo_share_options_bb_forum_position', 'before');
        add_option( 'mo_share_options_bb_topic_position', 'before');
        add_option( 'mo_share_options_bb_reply_position', 'before');

        //Follow us
        add_option( 'mo_openid_follow_us_theme', 'oval' );
        add_option( 'mo_openid_follow_us_custom_theme', 'default' );
        add_option( 'mo_openid_follow_us_icon_space','4' );
        add_option('mo_openid_follow_us_icon_custom_color','000000');
        add_option( 'mo_follow_us_icon_custom_size','35' );
        add_option( 'mo_openid_follow_us_icon_space','4' );
        add_option('fo_share_app','facebook#twitter#google#vkontakte#tumblr#stumble#linkedin#reddit#instagram#pinterest#pocket#digg#mail#print#whatsapp');

        //Social Commenting
        add_option( 'mo_openid_social_comment_blogpost','1' );
        add_option( 'mo_openid_social_comment_default_label', 'Default Comments' );
        add_option( 'mo_openid_social_comment_fb_label', 'Facebook Comments' );
        add_option( 'mo_openid_social_comment_disqus_label', 'Disqus Comments' );
        add_option( 'mo_disqus_shortname', '' );
        add_option( 'mo_openid_social_comment_heading_label', 'Leave a Reply' );
        add_option( 'mo_openid_login_theme', 'default' );

        if(get_option('mo_openid_default_comment_enable') == 1 ){
            add_action('comment_form_must_log_in_after', array($this, 'mo_openid_add_social_login'));
            add_action('comment_form_top', array($this, 'mo_openid_add_social_login'));
        }
        if(get_option('mo_openid_social_comment_fb') == 1 || get_option('mo_openid_social_comment_disqus') == 1 ){
            add_action('comment_form_top', array( $this, 'mo_openid_sh_add_comment'));
        }
        if(get_option('mo_share_woo_top_pro_option') == 1){
            add_action('woocommerce_before_single_product', array( $this, 'mo_openid_sh_social_share' ));
        }
        if(get_option('mo_share_woo_after_category_option') == 1){
            add_action('woocommerce_share', array( $this, 'mo_openid_sh_social_share' ));
        }
        if(get_option('mo_share_woo_after_add_cart_option') == 1) {
            add_action('woocommerce_product_meta_start', array($this, 'mo_openid_sh_social_share'));
        }
        if(get_option('mo_share_options_wc_product')==1){
            add_filter( 'woocommerce_loop_add_to_cart_link',array($this,'mo_openid_sh_social_share'));
            //add_filter( 'woocommerce_get_item_data','mo_openid_share_shortcode');
        }

        }

    function mo_openid_sh_plugin_settings_script() {
        if(strpos(get_current_screen()->id, 'mo_ss_openid_settings') === false) return;
        wp_enqueue_script( 'mo_openid_admin_settings_phone_script', plugins_url('includes/js/phone.js', __FILE__ ));
        wp_enqueue_script( 'mo_openid_admin_settings_color_script', plugins_url('includes/jscolor/jscolor.js', __FILE__ ));
        wp_enqueue_script( 'mo_openid_admin_settings_script', plugins_url('includes/js/settings.js?version=4.9.6', __FILE__ ), array('jquery'));
        wp_enqueue_script( 'mo_openid_admin_settings_phone_script', plugins_url('includes/js/bootstrap.min.js', __FILE__ ));
      //  wp_enqueue_script( 'bootstrap_script_tour', plugins_url( 'includes/js/mo_openid_bootstrap-tour-standalone.min.js', __FILE__ ));
    }

  
function mo_openid_sh_plugin_admin_style(){
    if(strpos(get_current_screen()->id, 'mo_ss_openid_settings') === false && strpos(get_current_screen()->id, 'miniorange-social-sharing_page_mo_ss_openid_social_commenting_settings') === false ) return;
       wp_enqueue_style( 'mo_openid_admin_settings_phone_style', plugins_url('includes/css/phone.css', __FILE__));
       wp_enqueue_style( 'mo-openid-sl-wp-font-awesome',plugins_url('includes/css/mo-font-awesome.min.css', __FILE__), false );
       wp_enqueue_style( 'mo_openid_admin_settings_style', plugins_url('includes/css/mo_openid_style.css?version=7.3.0', __FILE__));
       
     }
    function mo_openid_sh_activate() {
        $user_activation_date = date('Y-m-d', strtotime(' + 10 days'));
        $user_activation_date1=date('Y-m-d');
        update_option('mo_openid_user_activation_date1',$user_activation_date1);
        update_option('mo_openid_user_activation_date',$user_activation_date);
        add_option('mo_openid_malform_error', '1');
        add_option('Activated_Plugin','Plugin-Slug');
        update_option( 'mo_openid_host_name', 'https://login.xecurify.com');
    }

    function new_miniorange_sh_openid_menu() {
        //Add miniOrange plugin to the menu
        $page = add_menu_page( 'MO OpenID Settings ' . __( 'Configure OpenID', 'mo_ss_openid_settings' ), 'miniOrange Social Sharing', 'administrator',
            'mo_ss_openid_settings', 'mo_ss_register_sharing_openid' ,plugin_dir_url(__FILE__) . 'includes/images/miniorange_icon.png');
        $page = add_submenu_page( 'mo_ss_openid_settings', 'MiniOrange-General Settings','Social Sharing', 'administrator','mo_ss_openid_settings','mo_ss_register_sharing_openid');
        $page = add_submenu_page( 'mo_ss_openid_settings', 'MiniOrange-General Settings','Social Commenting', 'administrator','mo_ss_openid_social_commenting_settings','mo_ss_comment_openid');


    }

    function mo_openid_sh_add_comment(){
        global $post;
        if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
            $http = "https://";
        } else {
            $http = "http://";
        }
        $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
        if(is_single() && get_option('mo_openid_social_comment_blogpost') == 1 ) {
            mo_ss_openid_sh_social_comment($post, $url);
        } else if(is_page() && get_option('mo_openid_social_comment_static')==1) {
            mo_ss_openid_sh_social_comment($post, $url);
        }
    }

    function mo_openid_sh_plugin_script() {
        wp_enqueue_script( 'js-cookie-script',plugins_url('includes/js/jquery.cookie.min.js', __FILE__), array('jquery'));
        wp_enqueue_script( 'mo-social-login-script',plugins_url('includes/js/social_login.js', __FILE__), array('jquery') );
    }

    function miniorange_openid_sh_save_settings()
    {
        if(is_admin() && get_option('Activated_Plugin')=='Plugin-Slug') {
            delete_option('Activated_Plugin');
            update_option('mo_openid_message','Go to plugin <b><a href="admin.php?page=mo_ss_openid_settings">settings</a></b> to enable Social Login, Social Sharing by miniOrange.');
            add_action('admin_notices', 'mo_openid_sh_activation_message');
        }

        $value = isset( $_POST['option']) ? sanitize_text_field($_POST['option']): '';
        switch( $value )
        {

            case 'mo_openid_contact_us_query_option':
                $nonce = sanitize_text_field($_POST['mo_openid_contact_us_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-contact-us-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                   
                    // Contact Us query
                    $email = sanitize_email($_POST['mo_openid_contact_us_email']);
                    
                    $phone = isset($_POST['mo_openid_contact_us_phone'])?sanitize_text_field($_POST['mo_openid_contact_us_phone']):'';

                    $query = sanitize_text_field($_POST['mo_openid_contact_us_query']);
                    $feature_plan=sanitize_text_field($_POST['mo_openid_feature_plan']);
                    
                    $customer = new sh_CustomerOpenID();
                    if (mo_openid_sh_check_empty_or_null($email) || mo_openid_sh_check_empty_or_null($query)) {
                        update_option('mo_openid_message', 'Please fill up Email and Query fields to submit your query.');
                        mo_openid_sh_show_error_message();
                    } else {
                        $submited = $customer->sh_submit_contact_us($email, $phone, $query, $feature_plan);
                        if ($submited == false) {
                            update_option('mo_openid_message', 'Your query could not be submitted. Please try again.');
                            mo_openid_sh_show_error_message();
                        } else {
                            update_option('mo_openid_message', 'Thanks for getting in touch! We shall get back to you shortly.');
                            mo_openid_sh_show_success_message();
                        }
                    }
                }
                break;
                case 'mo_openid_feedback':
                    $nonce = $_POST['mo_openid_feedback_nonce'];
                    if ( ! wp_verify_nonce( $nonce, 'mo-openid-feedback-nonce' ) ) {
                        wp_die('<strong>ERROR</strong>: Invalid Request.');
                    } else {
                        $message='';
                        $email = '';
                        if(isset($_POST['deactivate_plugin']) )
                        {
                            $message.=' '. sanitize_text_field($_POST['deactivate_plugin']);
                            if($_POST['mo_openid_query_feedback']!='')
                            {
                                $message.='. '.sanitize_text_field($_POST['mo_openid_query_feedback']);
                            }
    
                            if(get_option('mo_openid_admin_email'))
                            {
                                $email=get_option('mo_openid_admin_email');
                            }
    
                            //only reason
                            $phone='';
                            $contact_us = new sh_CustomerOpenID();
                            $submited = json_decode( $contact_us->mo_openid_sh_send_email_alert( $email, $phone, $message ), true );
    
                            if ( json_last_error() == JSON_ERROR_NONE ) {
                                if ( is_array( $submited ) && array_key_exists( 'status', $submited ) && $submited['status'] == 'ERROR' )
                                {
                                    if( isset($submited['message']))
                                    {
                                        update_option('mo_openid_message',$submited['message']);
                                        //mo_openid_show_error_message();
                                    }
    
    
                                } else
                                {
                                    if ( $submited == false )
                                    {
                                        update_option( 'mo_openid_message',"ERROR_WHILE_SUBMITTING_QUERY");
                                        mo_openid_sh_show_success_message();
                                    } else {
    
                                        update_option('mo_openid_message',"Your response is submitted successfully");
                                        mo_openid_sh_show_success_message();
                                        update_option('mo_openid_feedback_form',1);
                                    }
                                }
                            }
                            update_option('mo_openid_feedback_form',1);
                            deactivate_plugins( '/social-sharing-by-miniorange/miniorange_openid_sso_settings.php' );
                            update_option('mo_openid_message',"Plugin Deactivated Successfully");
                            mo_openid_sh_show_success_message();
                        }
                    }
                    break;
            case 'mo_openid_verify_license':
                $nonce = sanitize_text_field($_POST['mo_openid_verify_license_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-verify-license-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                }
                else {
                    $code = trim($_POST['openid_licence_key']);
                    $customer = new sh_CustomerOpenID();
                    $content = json_decode($customer->sh_check_customer_ln(sanitize_text_field($_POST['licience_type'])), true);
                    if (strcasecmp($content['status'], 'SUCCESS') == 0) {
                        $content = json_decode($customer->mo_openid_sh_vl($code, false), true);
                        update_option('mo_openid_sh_vl_check_t', time());
                        if (strcasecmp($content['status'], 'SUCCESS') == 0) {
                            $key = get_option('mo_openid_customer_token');
                            if($_POST['licience_type']=="extra_attributes_addon") {
                                update_option('mo_openid_opn_lk_extra_attr_addon', MOAESEncryption::encrypt_data($code, $key));
                                update_option('mo_openid_message', 'Your addon license is verified. You can now setup the addon plugin.');
                            }
                            $key = get_option('mo_openid_customer_token');
                            update_option('mo_openid_site_ck_l', MOAESEncryption::encrypt_data("true", $key));
                            update_option('mo_openid_t_site_status', MOAESEncryption::encrypt_data("false", $key));
                            mo_openid_sh_show_success_message();
                        } else if (strcasecmp($content['status'], 'FAILED') == 0) {
                            if (strcasecmp($content['message'], 'Code has Expired') == 0) {
                                $url = add_query_arg(array('tab' => 'pricing'), $_SERVER['REQUEST_URI']);
                                update_option('mo_openid_message', 'License key you have entered has already been used. Please enter a key which has not been used before on any other instance or if you have exausted all your keys then <a href="' . $url . '">Click here</a> to buy more.');
                            } else {
                                update_option('mo_openid_message', 'You have entered an invalid license key. Please enter a valid license key.');
                            }
                            mo_openid_sh_show_error_message();
                        } else {
                            update_option('mo_openid_message', 'An error occured while processing your request. Please Try again.');
                            mo_openid_sh_show_error_message();
                        }
                    }
                    else {
                        $key = get_option('mo_openid_customer_token');
                        update_option('mo_openid_site_ck_l', MOAESEncryption::encrypt_data("false", $key));
                        $url = add_query_arg(array('tab' => 'pricing'), $_SERVER['REQUEST_URI']);
                        update_option('mo_openid_message', 'You have not upgraded yet. <a href="' . $url . '">Click here</a> to upgrade to premium version.');
                        mo_openid_sh_show_error_message();
                    }
                    $content = json_decode($customer->sh_check_customer_valid(), true);
                    if (strcasecmp($content['status'], 'SUCCESS') == 0) {
                        update_option('mo_openid_admin_customer_plan', isset($content['licensePlan']) ? base64_encode($content['licensePlan']) : 0);
                    }
                }
                break;

            case 'mo_openid_enable_customize_text':
                $nonce=sanitize_text_field($_POST['mo_openid_enable_customize_text_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-customize-text-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                }else {
                    update_option('mo_sharing_icon_custom_size',isset($_POST['mo_sharing_icon_custom_size'])?sanitize_text_field($_POST['mo_sharing_icon_custom_size']):0);
                    update_option('mo_sharing_icon_space',isset($_POST['mo_sharing_icon_space'])? sanitize_text_field($_POST['mo_sharing_icon_space']):0);
                    update_option('mo_sharing_icon_custom_font',isset($_POST['mo_sharing_icon_custom_font'])? sanitize_text_field($_POST['mo_sharing_icon_custom_font']):0);
                    update_option('mo_sharing_icon_custom_color',isset($_POST['mo_sharing_icon_custom_color'])?sanitize_text_field($_POST['mo_sharing_icon_custom_color']):000000);
                    update_option('mo_openid_share_custom_theme',isset($_POST['mo_openid_share_custom_theme'])?sanitize_text_field($_POST['mo_openid_share_custom_theme']):"");
                    update_option('mo_openid_share_theme',isset($_POST['mo_openid_share_theme'])?sanitize_text_field($_POST['mo_openid_share_theme']):"");
                    update_option('mo_openid_login_widget_customize_text',isset($_POST['mo_openid_login_widget_customize_text'])? sanitize_text_field($_POST['mo_openid_login_widget_customize_text']):"");
                    update_option('mo_openid_login_button_customize_text',isset($_POST['mo_openid_login_button_customize_text'])? sanitize_text_field($_POST['mo_openid_login_button_customize_text']):"");
                    update_option('mo_openid_share_widget_customize_text', isset($_POST['mo_openid_share_widget_customize_text'])?sanitize_text_field($_POST['mo_openid_share_widget_customize_text']):"");
                    update_option('mo_openid_share_widget_customize_text_color',isset($_POST['mo_openid_share_widget_customize_text_color'])? sanitize_text_field($_POST['mo_openid_share_widget_customize_text_color']):000000);
                    update_option('mo_openid_share_twitter_username',isset($_POST['mo_openid_share_twitter_username'])? sanitize_text_field($_POST['mo_openid_share_twitter_username']):"");
                    update_option('mo_openid_share_email_subject',isset($_POST['mo_openid_share_email_subject'])? sanitize_text_field($_POST['mo_openid_share_email_subject']):"");
                    update_option('mo_openid_share_email_body',isset($_POST['mo_openid_share_email_body'])? sanitize_text_field($_POST['mo_openid_share_email_body']):"");
	                update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;

            case 'mo_openid_enable_share_display':
                $nonce=sanitize_text_field($_POST['mo_openid_enable_share_display_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-share-display-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                }
                else{
                    update_option('mo_share_options_enable_home_page', isset($_POST['mo_share_options_home_page']) ? sanitize_text_field($_POST['mo_share_options_home_page']) : 0);
                    update_option('mo_share_options_enable_post', isset($_POST['mo_share_options_post']) ? sanitize_text_field($_POST['mo_share_options_post']) : 0);
                    update_option('mo_share_options_enable_static_pages', isset($_POST['mo_share_options_static_pages']) ? sanitize_text_field($_POST['mo_share_options_static_pages']) : 0);
                    update_option('mo_share_options_enable_post_position', isset($_POST['mo_share_options_enable_post_position'])? sanitize_text_field($_POST['mo_share_options_enable_post_position']):0);
                    update_option('mo_share_options_home_page_position',isset($_POST['mo_share_options_home_page_position'])? sanitize_text_field($_POST['mo_share_options_home_page_position']):0);
                    update_option('mo_share_options_static_pages_position',isset($_POST['mo_share_options_static_pages_position'])? sanitize_text_field($_POST['mo_share_options_static_pages_position']):0);
                    update_option('mo_share_options_bb_forum_position',isset($_POST['mo_share_options_bb_forum_position'])? sanitize_text_field($_POST['mo_share_options_bb_forum_position']):0);
                    update_option('mo_share_options_bb_topic_position',isset($_POST['mo_share_options_bb_topic_position'])? sanitize_text_field($_POST['mo_share_options_bb_topic_position']):0);
                    update_option('mo_share_options_bb_reply_position',isset($_POST['mo_share_options_bb_reply_position'])? sanitize_text_field($_POST['mo_share_options_bb_reply_position']):0);
                    update_option('mo_share_vertical_hide_mobile', isset($_POST['mo_share_vertical_hide_mobile']) ? sanitize_text_field($_POST['mo_share_vertical_hide_mobile']) : 0);
                    update_option('mo_share_options_bb_forum', isset($_POST['mo_share_options_bb_forum']) ? sanitize_text_field($_POST['mo_share_options_bb_forum']) : 0);
                    update_option('mo_share_options_bb_topic', isset($_POST['mo_share_options_bb_topic']) ? sanitize_text_field($_POST['mo_share_options_bb_topic']) : 0);
                    update_option('mo_share_options_bb_reply', isset($_POST['mo_share_options_bb_reply']) ? sanitize_text_field($_POST['mo_share_options_bb_reply']) : 0);

                    update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;
            case 'mo_openid_enable_customize_follow_button':
                $nonce = $_POST['mo_openid_enable_customize_follow_button_nonce'];
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-customize-follow-button-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                    ////////////////////////////////////////////////////
                    update_option('mo_follow_us_icon_custom_size',isset($_POST['mo_follow_us_icon_custom_size'])?sanitize_text_field($_POST['mo_follow_us_icon_custom_size']):0);
                    update_option('mo_openid_follow_us_icon_space',isset($_POST['mo_openid_follow_us_icon_space'])? sanitize_text_field($_POST['mo_openid_follow_us_icon_space']):0);
                    update_option('mo_openid_follow_us_icon_custom_color',isset($_POST['mo_openid_follow_us_icon_custom_color'])?sanitize_text_field($_POST['mo_openid_follow_us_icon_custom_color']):000000);
                    update_option('mo_openid_follow_us_custom_theme',isset($_POST['mo_openid_follow_us_custom_theme'])?sanitize_text_field($_POST['mo_openid_follow_us_custom_theme']):"");
                    update_option('mo_openid_follow_us_theme',isset($_POST['mo_openid_follow_us_theme'])?sanitize_text_field($_POST['mo_openid_follow_us_theme']):"");
                    update_option('mo_openid_twitter_follow_us_check', isset($_POST['mo_openid_twitter_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_twitter_follow_us_check']) : 0);                    
                      update_option('mo_openid_twitter_follow_url', isset($_POST['mo_openid_twitter_follow_url']) ? sanitize_text_field($_POST['mo_openid_twitter_follow_url']) : get_option('mo_openid_twitter_follow_url'));
                      update_option('mo_openid_facebook_follow_us_check', isset($_POST['mo_openid_facebook_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_facebook_follow_us_check']) : 0);                    
                      update_option('mo_openid_facebook_follow_url', isset($_POST['mo_openid_facebook_follow_url']) ? sanitize_text_field($_POST['mo_openid_facebook_follow_url']) : get_option('mo_openid_facebook_follow_url'));
                    update_option('mo_openid_instagram_follow_us_check', isset($_POST['mo_openid_instagram_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_instagram_follow_us_check']) : 0);
                     update_option('mo_openid_instagram_follow_url', isset($_POST['mo_openid_instagram_follow_url']) ? sanitize_text_field($_POST['mo_openid_instagram_follow_url']) : get_option('mo_openid_instagram_follow_url'));
                   update_option('mo_openid_linkedin_follow_us_check', isset($_POST['mo_openid_linkedin_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_linkedin_follow_us_check']) : 0);
                    update_option('mo_openid_linkedin_follow_url', isset($_POST['mo_openid_linkedin_follow_url']) ? sanitize_text_field($_POST['mo_openid_linkedin_follow_url']) : get_option('mo_openid_linkedin_follow_url'));
                   update_option('mo_openid_pinterest_follow_us_check', isset($_POST['mo_openid_pinterest_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_pinterest_follow_us_check']) : 0);
                   update_option('mo_openid_pinterest_follow_url', isset($_POST['mo_openid_pinterest_follow_url']) ? sanitize_text_field($_POST['mo_openid_pinterest_follow_url']) : get_option('mo_openid_pinterest_follow_url'));
                   update_option('mo_openid_tumblr_follow_us_check', isset($_POST['mo_openid_tumblr_follow_us_check']) ? sanitize_text_field($_POST['mo_openid_tumblr_follow_us_check']) : 0);
                  update_option('mo_openid_tumblr_follow_url', isset($_POST['mo_openid_tumblr_follow_url']) ? sanitize_text_field($_POST['mo_openid_tumblr_follow_url']) : get_option('mo_openid_tumblr_follow_url'));
                    update_option('mo_openid_message', 'Your settings are saved successfully.');
                    mo_openid_sh_show_success_message();
              }
                break;
            case 'mo_openid_feedback':
                $nonce = sanitize_text_field($_POST['mo_openid_feedback_nonce']);
                if ( ! wp_verify_nonce( $nonce, 'mo-openid-feedback-nonce' ) ) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                    $message='';
                    $email = '';
                    if(isset($_POST['deactivate_plugin']) )
                    {
                        $message.=' '. sanitize_text_field($_POST['deactivate_plugin']);
                        if($_POST['mo_openid_query_feedback']!='')
                        {
                            $message.='. '.sanitize_text_field($_POST['mo_openid_query_feedback']);
                        }

                        $email = sanitize_email($_POST['mo_feedback_email']);
                        //only reason
                        $phone='';
                        $contact_us = new sh_CustomerOpenID();
                        $submited = json_decode( $contact_us->mo_ss_openid_send_email_alert( $email, $phone, $message ), true );

                        if ( json_last_error() == JSON_ERROR_NONE ) {
                            if ( is_array( $submited ) && array_key_exists( 'status', $submited ) && $submited['status'] == 'ERROR' )
                            {
                                if( isset($submited['message']))
                                {
                                    update_option('mo_openid_message',$submited['message']);
                                    //mo_openid_sh_show_error_message();
                                }
                            } else
                            {
                                if ( $submited == false )
                                {
                                    update_option( 'mo_openid_message',"ERROR_WHILE_SUBMITTING_QUERY");
                                    mo_openid_sh_show_success_message();
                                } else {

                                    update_option('mo_openid_message',"Your response is submitted successfully");
                                    mo_openid_sh_show_success_message();
                                }
                            }
                        }
                        update_option('mo_openid_deactivate_reason_form',1);
                        deactivate_plugins( '/miniorange-social-sharing/miniorange_ss_openid_sso_settings.php' );
                        update_option('mo_openid_message',"Plugin Deactivated Successfully");
                        mo_openid_sh_show_success_message();
                    }
                }
                break;
            case 'mo_openid_enable_share_woocomm_pro_page':
                $nonce=sanitize_text_field($_POST['mo_openid_enable_share_woocomm_pro_page_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-share-woocomm-pro-page-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                }
                else {

                    update_option('mo_share_woo_top_pro_option', isset($_POST['mo_share_woo_top_pro_option']) ? sanitize_text_field($_POST['mo_share_woo_top_pro_option']) : 0);
                    update_option('mo_share_woo_after_category_option', isset($_POST['mo_share_woo_after_category_option']) ? sanitize_text_field($_POST['mo_share_woo_after_category_option']) : 0);
                    update_option('mo_share_woo_after_add_cart_option', isset($_POST['mo_share_woo_after_add_cart_option']) ? sanitize_text_field($_POST['mo_share_woo_after_add_cart_option']) : 0);
                    update_option('mo_share_options_wc_product', isset($_POST['mo_share_options_wc_product']) ? sanitize_text_field($_POST['mo_share_options_wc_product']) : 0);

                }
                break;
            case 'mo_openid_share_cnt':
                $nonce=sanitize_text_field($_POST['mo_openid_share_cnt_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-share-cnt-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                }else {
                    update_option( 'mo_openid_share_count', isset( $_POST['mo_openid_share_count']) ? sanitize_text_field($_POST['mo_openid_share_count']) : 0);
                    update_option( 'mo_openid_Facebook_share_count_api', isset( $_POST['mo_openid_Facebook_share_count_api']) ? sanitize_text_field($_POST['mo_openid_Facebook_share_count_api']) : '');
	                update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;

            case 'mo_openid_comment_selectapp':
                $nonce = sanitize_text_field($_POST['mo_openid_enable_comment_selectapp_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-comment-selectapp-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                    update_option('mo_openid_social_comment_fb', isset($_POST['mo_openid_social_comment_fb']) ? sanitize_text_field($_POST['mo_openid_social_comment_fb']) : 0);
                    update_option('mo_openid_social_comment_disqus', isset($_POST['mo_openid_social_comment_disqus']) ? sanitize_text_field($_POST['mo_openid_social_comment_disqus']) : 0);
                    update_option('mo_openid_social_comment_default', isset($_POST['mo_openid_social_comment_default']) ? sanitize_text_field($_POST['mo_openid_social_comment_default']) : 0);
                    update_option('mo_disqus_shortname', isset($_POST['mo_disqus_shortname']) ? sanitize_text_field($_POST['mo_disqus_shortname']) : "");
	                update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;

            case 'mo_openid_comment_display':
                $nonce = sanitize_text_field($_POST['mo_openid_enable_comment_display_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-comment-display-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                    update_option('mo_openid_social_comment_blogpost', isset($_POST['mo_openid_social_comment_blogpost']) ? sanitize_text_field($_POST['mo_openid_social_comment_blogpost']) : 0);
                    update_option('mo_openid_social_comment_static', isset($_POST['mo_openid_social_comment_static']) ? sanitize_text_field($_POST['mo_openid_social_comment_static']) : 0);
	                update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;

            case 'mo_openid_comment_labels':
                $nonce = sanitize_text_field($_POST['mo_openid_enable_comment_labels_nonce']);
                if (!wp_verify_nonce($nonce, 'mo-openid-enable-comment-labels-nonce')) {
                    wp_die('<strong>ERROR</strong>: Invalid Request.');
                } else {
                    update_option('mo_openid_social_comment_default_label',isset($_POST['mo_openid_social_comment_default_label'])? sanitize_text_field($_POST['mo_openid_social_comment_default_label']):0);
                    update_option('mo_openid_social_comment_fb_label', isset($_POST['mo_openid_social_comment_fb_label'])?sanitize_text_field($_POST['mo_openid_social_comment_fb_label']):0);
                    update_option('mo_openid_social_comment_disqus_label', isset($_POST['mo_openid_social_comment_disqus_label'])?sanitize_text_field($_POST['mo_openid_social_comment_disqus_label']):0);
                    update_option('mo_openid_social_comment_heading_label',isset($_POST['mo_openid_social_comment_heading_label'])? sanitize_text_field($_POST['mo_openid_social_comment_heading_label']):0);
	                update_option('mo_openid_message', 'Your settings are saved successfully.');
	                mo_openid_sh_show_success_message();
                }
                break;
        }
    }


    function mo_openid_sh_deactivate() {

        delete_option('mo_openid_host_name');
        delete_option('mo_openid_registration_status');
        delete_option('mo_openid_twitter_follow_url');
        delete_option('twitter_follow_us_check');
        delete_option('facebook_follow_us_check');
        delete_option('mo_openid_facebook_follow_url');
        delete_option('mo_openid_instagram_follow_url');
        delete_option('mo_openid_pinterest_follow_url');
        delete_option('mo_openid_tumblr_follow_url');
        delete_option('mo_openid_linkedin_follow_url');
        delete_option( 'mo_openid_follow_us_icon_space','4' );
        delete_option('mo_openid_follow_us_icon_custom_color','000000');
        delete_option( 'mo_follow_us_icon_custom_size','35' );
        delete_option( 'mo_openid_follow_us_icon_space','4' );

    }


    function mo_openid_sh_feedback_request(){
        if(get_option('mo_openid_deactivate_reason_form')=='0')
            mo_openid_sh_display_feedback_form();
    }
    function mo_openid_sh_add_social_share_links($content) {
        global $post;
        $post_content=$content;
        $title = str_replace('+', '%20', urlencode($post->post_title));

        if(is_front_page() && get_option('mo_share_options_enable_home_page')==1){
            $html_content = mo_openid_sh_share_shortcode('', $title);

            if ( get_option('mo_share_options_home_page_position') == 'before' ) {
                return  $html_content . $post_content;
            } else if ( get_option('mo_share_options_home_page_position') == 'after' ) {
                return   $post_content . $html_content;
            } else if ( get_option('mo_share_options_home_page_position') == 'both' ) {
                return $html_content . $post_content . $html_content;
            }
        } else if(is_page() && get_option('mo_share_options_enable_static_pages')==1){
            $html_content = mo_openid_sh_share_shortcode('', $title);

            if ( get_option('mo_share_options_static_pages_position') == 'before' ) {
                return  $html_content . $post_content;
            } else if ( get_option('mo_share_options_static_pages_position') == 'after' ) {
                return   $post_content . $html_content;
            } else if ( get_option('mo_share_options_static_pages_position') == 'both' ) {
                return $html_content . $post_content . $html_content;
            }
        } else if(is_single() && get_option('mo_share_options_enable_post') == 1 ){
            $html_content = mo_openid_sh_share_shortcode('', $title);

            if ( get_option('mo_share_options_enable_post_position') == 'before' ) {
                return  $html_content . $post_content;
            } else if ( get_option('mo_share_options_enable_post_position') == 'after' ) {
                return   $post_content . $html_content;
            } else if ( get_option('mo_share_options_enable_post_position') == 'both' ) {
                return $html_content . $post_content . $html_content;
            }
        } else
            return $post_content;

    }


    function mo_openid_sh_social_share(){
		global $post;
		$title = str_replace('+', '%20', urlencode($post->post_title));
        echo mo_openid_sh_share_shortcode('', $title);	
        
	}

    public function mo_get_sh_sharing_output( $atts ){

        $title = '';
        global $post;
        if(isset($post)) {
            $content=get_the_content();
            $title = str_replace('+', '%20', urlencode($post->post_title));
            $content=strip_shortcodes( strip_tags( get_the_content() ) );
        }
        $html = mo_openid_sh_share_shortcode( $atts, $title);
        return $html;

    }
    public function mo_get_sh_follow_us_output($atts){
        $title = '';
        global $post;
        if(isset($post)) {
            $content=get_the_content();
            $title = str_replace('+', '%20', urlencode($post->post_title));
            $content=strip_shortcodes( strip_tags( get_the_content() ) );
        }
        $html = mo_openid_sh_follow_us_shortcode( $atts, $title);
        return $html;

    }
    public function mo_get_sh_vertical_sharing_output( $atts )
    {
        $title = '';
        global $post;
        if (isset($post)) {
            $content = get_the_content();
            $title = str_replace('+', '%20', urlencode($post->post_title));
            $content = strip_shortcodes(strip_tags(get_the_content()));
        }
        $html = mo_openid_sh_vertical_share_shortcode($atts, $title);
        return $html;
    }
    public function mo_get_sh_comments_output( $atts ){
        $html = mo_ss_openid_sh_comments_shortcode();
        return $html;
    }

    

    function social_sh_load_textdomain()
    {
        load_plugin_textdomain( 'miniorange-social-sharing', FALSE, dirname( plugin_basename(__FILE__) ) . '/lang/' );
    }
}


new miniorange_ss_openid_sso_settings();


