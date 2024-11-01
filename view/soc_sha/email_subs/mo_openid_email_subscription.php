<?php
function  mo_ss_openid_email_subscription(){
    ?>

    <form id="mo_openid_email_subscription" name="mo_openid_email_subscription" method="post" action="">
        <input type="hidden" name="option" value="mo_openid_email_subscription" />
        <input type="hidden" name="mo_openid_email_subscription_nonce"
               value="<?php echo wp_create_nonce( 'mo-openid-email-subscription-nonce' ); ?>"/>
        <div>
            <table style="width:100%; padding: 20px 20px 20px 20px;">
                <tr><td>
                        <label style="cursor: auto" class="mo_openid_note_style">&nbsp;&nbsp;&nbsp;<?php echo sh_mo_sl('Enable this feature to give your users an option to subscribe on your website through E-mail.');?>.</label>
                        <h2>E-mail Subcribe <a style="left: 1%; position: relative; text-decoration: none" class="mo-openid-premium" href="<?php echo add_query_arg( array('tab' => 'license_plan'), $_SERVER['REQUEST_URI'] ); ?>"><?php echo sh_mo_sl('PRO');?></a></h2>
                        <input type="email" name="email" id="email" required placeholder="Enter your email address" disabled>
                        <input class="btn btn-primary" value="Join Now" type="submit" id="submit" >
                        <br><br>E-mail subscribe from <b>[mail-subcribe]</b>
                    </td></tr>
                <tr><td><br/><br><b><input type="submit" name="submit" value="<?php echo sh_mo_sl('Save');?>" style="width:150px;background-color:#0867b2;color:white;box-shadow:none;text-shadow: none;"  class="button button-primary button-large" disabled/>
                        </b></td></tr>
            </table>
        </div>
    </form>
    <script>
        //to set heading name
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Email Subscription');?>');
        var temp = jQuery("<a style=\"left: 1%; padding:4px; position: relative; text-decoration: none\" class=\"mo-openid-premium\" href=\"<?php echo add_query_arg(array('tab' => 'license_plan'), $_SERVER['REQUEST_URI']); ?>\">PRO</a>");
        jQuery("#mo_openid_page_heading").append(temp);
        var win_height = jQuery('#mo_openid_menu_height').height();
        //win_height=win_height+18;
        jQuery(".mo_container").css({height:win_height});
    </script>
    <?php
}

function sh_mail_service_func() {

    $my_var = '
        <form action="" method="post">
        <input type="email" name="email" id="email" required placeholder="Enter your email address ">
        <input class="btn-primary" value="Join Now" type="submit" id="submit">
        </form>';

    if(isset($_POST['email'])){

        $to = "me@example.com"; // Your Brand Mail ID
        $from = "no-reply@example.com"; // Replace it with your From Mail ID

        $headers = "From: " . $from . "rn";

        $subject = "New subscription";
        $body = "New user subscription: " . $_POST['email'];
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
        {
            if (wp_mail($to, $subject, $body, $headers, "-f " . $from))
            {
                echo 'Your e-mail (' . $_POST['email'] . ') has been added to our mailing list!';
            }
            else{
                echo 'There was a problem with your e-mail (' . $_POST['email'] . ')';
            }
        }
    }
    return $my_var;
}
