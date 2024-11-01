<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();
//delete all stored key-value pairs

delete_option('mo_openid_host_name');
delete_option('mo_openid_new_registration');
delete_option( 'mo_openid_admin_company_name');
delete_option( 'mo_openid_admin_first_name');
delete_option( 'mo_openid_admin_last_name');
delete_option('mo_openid_admin_email');
delete_option('mo_openid_admin_password');
delete_option('mo_openid_admin_phone');
delete_option('mo_openid_verify_customer');
delete_option('mo_openid_registration_status');
delete_option('mo_openid_customer_token');
delete_option('mo_openid_message');
delete_option('mo_openid_admin_customer_key');
delete_option('mo_openid_admin_api_key');
delete_option('mo_openid_default_comment_enable');
delete_option( 'mo_openid_user_number');
delete_option( 'mo_openid_social_comment_fb');
delete_option( 'mo_openid_social_comment_google' );
delete_option( 'mo_openid_social_comment_default' );
delete_option( 'mo_openid_social_comment_blogpost' );
delete_option( 'mo_openid_social_comment_static' );
delete_option('mo_openid_social_comment_default_label' );
delete_option('mo_openid_social_comment_fb_label' );
delete_option('mo_openid_social_comment_google_label' );
delete_option('mo_openid_social_comment_heading_label' );
delete_option('mo_openid_deactivate_reason_form');
delete_option('share_app');
delete_option('mo_share_options_enable_post');
delete_option('mo_share_options_enable_home_page');
delete_option('mo_share_options_enable_static_pages');
delete_option( 'mo_openid_login_theme' );
delete_option( 'mo_openid_share_theme' );
delete_option( 'mo_openid_login_widget_customize_text');
delete_option( 'mo_openid_share_widget_customize_text' );
delete_option( 'mo_openid_login_button_customize_text');
delete_option( 'mo_login_icon_custom_boundary' );
delete_option('mo_share_options_wc_sp_summary_top');
delete_option('mo_share_options_wc_sp_summary');
delete_option('mo_share_options_bb_forum');
delete_option('mo_share_options_bb_forum_position');
delete_option('mo_share_options_bb_topic');
delete_option('mo_share_options_bb_topic_position');
delete_option('mo_share_options_bb_reply');
delete_option('mo_share_options_bb_reply_position');
delete_option( 'mo_openid_google_share_enable');
delete_option( 'mo_openid_facebook_share_enable');
delete_option( 'mo_openid_linkedin_share_enable' );
delete_option('mo_openid_twitter_share_enable');
delete_option('mo_openid_pinterest_share_enable');
delete_option('mo_openid_reddit_share_enable');
delete_option( 'mo_openid_tumblr_share_enable' );
delete_option( 'mo_openid_stumble_share_enable' );
delete_option( 'mo_openid_digg_share_enable' );
delete_option( 'mo_openid_pocket_share_enable' );
delete_option( 'mo_openid_vkontakte_share_enable' );
delete_option('mo_openid_mail_share_enable');
delete_option('mo_openid_print_share_enable');
delete_option('mo_openid_whatsapp_share_enable');
delete_option('mo_openid_share_count');
delete_option('mo_openid_Facebook_share_count_api');
delete_option( 'mo_openid_admin_customer_valid');
delete_option( 'mo_openid_admin_customer_plan');
delete_option( 'mo_openid_share_widget_customize_text_color');


delete_option('mo_share_options_enable_post_position');
delete_option('mo_share_options_home_page_position');
delete_option('mo_share_options_static_pages_position');
delete_option('mo_openid_share_twitter_username');
delete_option( 'mo_openid_share_email_subject' );
delete_option( 'mo_openid_share_email_body' );
delete_option('mo_share_vertical_hide_mobile');

delete_option('mo_sharing_icon_custom_size');
delete_option('mo_sharing_icon_custom_color');
delete_option('mo_openid_share_custom_theme');
delete_option('mo_sharing_icon_custom_font');
delete_option('mo_sharing_icon_space');

delete_option( 'mo_openid_login_widget_customize_logout_name_text');
delete_option( 'mo_openid_login_widget_customize_logout_text');
delete_option( 'mo_login_openid_login_widget_customize_textcolor');
delete_option('mo_share_icon_space');
delete_option('mo_share_icon_custom_height');
delete_option('mo_share_icon_custom_boundary');

//delete options
delete_option('mo_openid_popup_window');
delete_option('mo_openid_social_comment_disqus_label');
delete_option('mo_openid_social_login_version');
delete_option('widget_mo_openid_login_wid');
delete_option('mo_share_icon_space');
delete_option('mo_share_icon_custom_height');
delete_option('mo_share_icon_custom_boundary');
delete_option('mo_openid_user_count');

delete_option( 'custom_otp_msg' );
delete_option( 'regi_pop_up' );
delete_option( 'pop_regi_msg' );
delete_option( 'pop_login_msg' );
delete_option( 'mo_openid_feedback_form' );


?>