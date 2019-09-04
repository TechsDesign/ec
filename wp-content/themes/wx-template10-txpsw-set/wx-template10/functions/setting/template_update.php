<?php
function tx_template_active_action() {
  global $pagenow;
    if(is_admin() && $pagenow == 'themes.php' && isset($_GET['activated']))
     do_action('tx_template_active_action');
}
add_action('init', 'tx_template_active_action');

function tx_template_active() {

    $tx_template_addition1 = get_option('tx_template_update1');
         $tx_addition1_array = array(
           'tx_mainimg_url1_option'=>'', 'tx_mainimg_url2_option'=>'', 'tx_mainimg_url3_option'=>'', 'tx_mainimg_url4_option'=>'', 'tx_mainimg_url5_option'=>'', 'tx_mainimg_url6_option'=>'',
           'tx_img1_option'=>'', 'tx_img2_option'=>'', 'tx_img3_option'=>'', 'tx_img6_option'=>'', 'tx_img10_option'=>'', 'tx_img11_option'=>'',
           'tx_imglink1_option'=>'', 'tx_imglink2_option'=>'', 'tx_imglink3_option'=>'', 'tx_imglink5_option'=>'', 'tx_imglink10_option'=>'', 'tx_imglink11_option'=>'',
           'tx_mainimg_option'=>'', 'tx_logo1_option'=>'', 'tx_imglogo_option'=>'', 'tx_key_option'=>'', 'tx_copy_option'=>'',
           'tx_menu_selection_option'=>'', 'tx_imgmenu_url1_option'=>'', 'tx_imgmenu_url2_option'=>'', 'tx_imgmenu_url3_option'=>'', 'tx_imgmenu_url4_option'=>'', 'tx_imgmenu_url5_option'=>'', 'tx_imgmenu_url6_option'=>'',
           'tx_imgmenu_id1_option'=>'', 'tx_imgmenu_id2_option'=>'', 'tx_imgmenu_id3_option'=>'', 'tx_imgmenu_id4_option'=>'', 'tx_imgmenu_id5_option'=>'', 'tx_imgmenu_id6_option'=>'',
           'tx_twitter_option'=>'', 'tx_tw_option'=>'', 'tx_facebook_option'=>'', 'tx_fa_option'=>'', 'tx_google_plus_1_option'=>'', 'tx_google_plus_img_option'=>'', 'tx_hatena_img_option'=>'',
           'tx_mail_option'=>'', 'tx_con1_option'=>'', 'tx_con2_option'=>'', 'tx_rss_option'=>'', 'tx_google_option'=>'', 'tx_fb_admin_option'=>'', 'tx_fb_app_option'=>'', 'tx_instagram_option'=>'', 'tx_insta_option'=>'',
           'tx_switch_option'=>''
          );
           if (!$tx_template_addition1) {
             update_option('tx_template_update1', $tx_addition1_array);
           }

    $tx_template_addition2 = get_option('tx_template_update2');
         $tx_addition2_array = array(
           'tx_toplink_option'=>'', 'tx_footer_option'=>'', 'tx_textarea1_option'=>'', 'tx_textarea2_option'=>'', 'tx_textarea3_option'=>''
          );
           if (!$tx_template_addition2) {
             update_option('tx_template_update2', $tx_addition2_array);
           }

    $tx_template_addition3 = get_option('tx_template_update3');
         $tx_addition3_array = array(
           'tx_quantitypost_option'=>'', 'tx_posth3_option'=>'', 'tx_catid_option'=>'',
           'tx_off_option1'=>'','tx_off_option2'=>'','tx_quantitypost_option2'=>'', 'tx_posth3_option2'=>'', 'tx_catid_option2'=>'',
           'tx_com1_option'=>'', 'tx_com2_option'=>'', 'tx_com3_option'=>'', 'tx_com4_option'=>'','tx_com5_option'=>'', 'tx_com6_option'=>'', 'tx_com7_option'=>'',
           'tx_com8_option'=>'', 'tx_com9_option'=>'', 'tx_com10_option'=>'', 'tx_com11_option'=>'', 'tx_com12_option'=>'', 'tx_com13_option'=>'',
           'tx_tweet_option'=>'','tx_like_option'=>'', 'tx_hatena_option'=>'', 'tx_pocket_option'=>'', 'tx_google_plus_option'=>'', 'tx_line_option'=>'','tx_con3_option'=>'', 'tx_con4_option'=>'', 'tx_contact_item_option'=>''
         );
           if (!$tx_template_addition3) {
             update_option('tx_template_update3', $tx_addition3_array);
           }

    $tx_template_addition4 = get_option('tx_template_update4');
         $tx_addition4_array = array(
           'tx_color1_option'=>'', 'tx_color2_option'=>'', 'tx_color3_option'=>'', 'tx_color4_option'=>'', 'tx_color5_option'=>'', 'tx_color6_option'=>'', 'tx_color7_option'=>'', 'tx_color8_option'=>'',
           'tx_color9_option'=>'', 'tx_color10_option'=>'', 'tx_color11_option'=>'', 'tx_color12_option'=>'', 'tx_color13_option'=>'', 'tx_color14_option'=>'', 'tx_color15_option'=>'', 'tx_color16_option'=>''
         );
           if (!$tx_template_addition4) {
             update_option('tx_template_update4', $tx_addition4_array);
           }

    $tx_template_addition5 = get_option('tx_template_update5');
         $tx_addition5_array = array(
           'tx_subnewitem_option'=>'','tx_priceupitem_option'=>'','tx_pricedownitem_option'=>'','tx_stockupitem_option'=>'','tx_stockdownitem_option'=>'','tx_abcdeitem_option'=>''
         );
           if (!$tx_template_addition5) {
             update_option('tx_template_update5', $tx_addition5_array);
           }

}
add_action('tx_template_active_action', 'tx_template_active');
?>