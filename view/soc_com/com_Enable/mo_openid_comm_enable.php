<?php
function mo_ss_select_comment_enable(){
?>
    <div class="mo_openid_table_layout">
        <table>
            <tr>
                <td colspan="2">
                    <p>
                        <h3><?php echo sh_mo_sl('Enable Social Comments');?></h3>
                        <?php echo sh_mo_sl('To enable Social Comments, please select Facebook Comments from');?> <strong><?php echo sh_mo_sl('Select Applications');?></strong>.<?php echo sh_mo_sl(' Also select one or both of the options from');?> <strong><?php echo sh_mo_sl('Display Options');?></strong>.
                        <h3><?php echo sh_mo_sl('Add Social Comments');?></h3>
                        <?php echo sh_mo_sl('You can add social comments in the following areas from ');?><strong><?php echo sh_mo_sl('Display Options');?></strong>. <?php echo sh_mo_sl('If you require a shortcode, please contact us from the Support form on the right.');?>
                        <ol>
                            <li><?php echo sh_mo_sl('Blog Post: This option enables Social Comments on Posts / Blog Post');?>.</li>
                            <li><?php echo sh_mo_sl('Static pages: This option places Social Comments on Pages / Static Pages with comments enabled');?>.</li>
                        </ol>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <script>
        jQuery('#mo_openid_page_heading').text('<?php echo sh_mo_sl('Enable Social Comments');?> ');
    </script>
<?php
    }