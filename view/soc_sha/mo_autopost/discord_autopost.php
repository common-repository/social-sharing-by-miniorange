<?php
function mo_discord_autopost(){

    ?>
        <label class=" mo_openid_note_style" style="font-size:small;padding:22px;"><?php echo sh_mo_sl('Discord Auto post integrates with WordPress and WooCommerce. Once you configure the Webhook URLs, all of your new published posts will be sent to discord automatically.');?></label>

    
    
    <div class="mo_openid_table_layout">

        <form action="" method="post">
            <input type="hidden" name="option" value="mo-discord-post">
            <input type="hidden" id="discord_wpnonce" name="discord_wpnonce" value="40a9ecd217">
             <h2>General</h2>
            Send WordPress post to discord
            <table class="form-table" role="presentation">
                <tbody>
                <tr><th scope="row">Bot Username</th>
                    <td><input type="text" name="mo_bot_username" value="<?php echo get_option('mo_bot_username'); ?>" style="width:300px;margin-right:10px;" disabled><span class="description">The username that you want to use for the bot on your Discord server.</span></td>
                </tr><tr><th scope="row">Avatar URL</th><td><input type="text" name="mo_avatar_url" value="<?php echo get_option('mo_avatar_url'); ?>" style="width:300px;margin-right:10px;" disabled><span class="description"> The URL of the avatar that you want on your Discord server.</span></td></tr>
                <tr><th scope="row">Image URL</th><td><input type="text" name="mo_image_url" value="<?php echo get_option('mo_image_url'); ?>" style="width:300px;margin-right:10px;" disabled><span class="description"> The URL of the Image that you want on your Post to Discord.</span></td></tr>
                <tr><th scope="row">Mention Everyone</th><td><input type="checkbox" name="mo_mention_everyone" value="yes" <?php if(get_option('mo_mention_everyone')=='yes'){ echo 'checked';}else echo ''; ?> disabled><span class="description">Mention @everyone when sending the message to Discord.</span></td></tr>
                </tbody></table>
            <h2>Posts Settings</h2>
            Send WordPress post to discord
            <table class="form-table" role="presentation"><tbody>
                <tr><th scope="row">Webhook URL for WordPress Posts</th><td>
                        <div class="">
                            <div data-index="0" class="" style="border: 1px solid lightgrey; padding: 10px; width: 98%; ">
                                <div style="width:25%;display:inline-block;"> <label> Channel </label>
                                    <input style="padding:5px; margin: 5px;" name="mo_discord_chatroom" type="text" value="<?php echo get_option('mo_discord_chatroom'); ?>" disabled> </div>
                                <div style="width:50%; display:inline-block;"> <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Webhook URL </label>
                                    <input style="padding:5px; margin: 5px; width:65%;" name="mo_discord_post_webhook_url" type="text" value="<?php echo get_option('mo_discord_post_webhook_url');  ?>" disabled> </div>
                            </div>
                        </div>
                        <div style="clear:both;"> </div></td></tr>
                <br>
                </tbody></table>
            <br>
            <center>
                   <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Settings" disabled>
            </center>
        </form>
    </div>
    <hr>
    <br>
<div>

    <center>
        <h3>Demo</h3>
        <img style="height: 70%;width: 70%" id="mo_sharing_hover_icon_preview"
             src="<?php echo mo_ss_plugin_url . '/' . 'disc_auto.png' ?>"/>
    </center>
</div>
    
    <script>jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Discord Auto Post Settings');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);</script>
<?php
}
