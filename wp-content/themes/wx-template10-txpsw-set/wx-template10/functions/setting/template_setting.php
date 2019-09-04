<?php
/*** add menu ***/
 function tx_admin_addition(){
  add_menu_page('テンプレート', 'テンプレート', 'level_8', 'addition_1', 'tx_addition1');
  add_submenu_page('addition_1', '設定1(All)', '設定1&nbsp;&nbsp;(All)', 'level_8', 'addition_1', 'tx_addition1');
  add_submenu_page('addition_1', '設定2(Free)', '設定2&nbsp;&nbsp;(Free)', 'level_8', 'addition_2', 'tx_addition2');
  add_submenu_page('addition_1', '設定3(Page)', '設定3&nbsp;&nbsp;(Page)', 'level_8', 'addition_3', 'tx_addition3');
  add_submenu_page('addition_1', '設定4(Color)', '設定4&nbsp;&nbsp;(Color)', 'level_8', 'addition_4', 'tx_addition4');
  add_submenu_page('addition_1', '設定5(Sort)', '設定5&nbsp;&nbsp;(Sort)', 'level_8', 'addition_5', 'tx_addition5');
    if(isset($_GET['page']) && ($_GET['page'] == 'addition_1') || isset($_GET['page']) && ($_GET['page'] == 'addition_3')){
      wp_enqueue_media();
      wp_enqueue_script('add-uploader',get_template_directory_uri().'/functions/setting/js/add-uploader.js', array(), NULL, false);
    }
    $tx_page_types = array('post', 'page');
      foreach($tx_page_types as $tx_page_type){
        add_meta_box('tx_seo', 'SEO', 'tx_seo_creation', $tx_page_type, 'normal', 'core');
      }
        if(isset($_GET['page']) && ($_GET['page'] == 'usces_itemnew') || isset($_GET['page']) && ($_GET['page'] == 'usces_itemedit')){
          add_meta_box('tx_reco', 'おススメ商品', 'tx_recommended_creation', 'post', 'normal', 'core');
        }
 }
 add_action('admin_menu', 'tx_admin_addition');
  function tx_addition1(){
    $_POST = tx_remove_check($_POST);
    $tx_template_addition1 = get_option('tx_template_update1');
       if(isset($_POST['tx_submit']) && isset($_POST['tx_submit']) == 'tx_submit_addition1'){
         $tx_addition1_array = array(
           'tx_mainimg_url1_option', 'tx_mainimg_url2_option', 'tx_mainimg_url3_option', 'tx_mainimg_url4_option', 'tx_mainimg_url5_option', 'tx_mainimg_url6_option',
           'tx_img1_option', 'tx_img2_option', 'tx_img3_option', 'tx_img6_option', 'tx_img10_option', 'tx_img11_option',
           'tx_imglink1_option', 'tx_imglink2_option', 'tx_imglink3_option', 'tx_imglink5_option', 'tx_imglink10_option', 'tx_imglink11_option',
           'tx_mainimg_option', 'tx_logo1_option', 'tx_imglogo_option', 'tx_key_option', 'tx_copy_option',
           'tx_menu_selection_option', 'tx_imgmenu_url1_option', 'tx_imgmenu_url2_option', 'tx_imgmenu_url3_option', 'tx_imgmenu_url4_option', 'tx_imgmenu_url5_option', 'tx_imgmenu_url6_option',
           'tx_imgmenu_id1_option', 'tx_imgmenu_id2_option', 'tx_imgmenu_id3_option', 'tx_imgmenu_id4_option', 'tx_imgmenu_id5_option', 'tx_imgmenu_id6_option',
           'tx_twitter_option', 'tx_tw_option', 'tx_facebook_option', 'tx_fa_option', 'tx_google_plus_1_option', 'tx_google_plus_img_option', 'tx_hatena_img_option',
           'tx_mail_option', 'tx_con1_option', 'tx_con2_option', 'tx_rss_option', 'tx_google_option', 'tx_fb_admin_option', 'tx_fb_app_option', 'tx_instagram_option', 'tx_insta_option',
           'tx_switch_option'
          );
       foreach($tx_addition1_array as $tx_addition1_array_in){
           $tx_template_addition1[$tx_addition1_array_in] = isset($_POST[$tx_addition1_array_in]) ? stripslashes($_POST[$tx_addition1_array_in]) : ''; 
       }
          check_admin_referer('tx_template_addition1_page');
          update_option('tx_template_update1', $tx_template_addition1);
       }
  require_once(get_template_directory().'/admin/addition/addition_1.php');
  }
  function tx_addition2(){
    $_POST = tx_free_remove_check($_POST);
    $tx_template_addition2 = get_option('tx_template_update2');
       if(isset($_POST['tx_submit']) && isset($_POST['tx_submit']) == 'tx_submit_addition2'){
         $tx_addition2_array = array(
           'tx_toplink_option', 'tx_footer_option', 'tx_textarea1_option', 'tx_textarea2_option', 'tx_textarea3_option'
          );
       foreach($tx_addition2_array as $tx_addition2_array_in){
           $tx_template_addition2[$tx_addition2_array_in] = isset($_POST[$tx_addition2_array_in]) ? stripslashes($_POST[$tx_addition2_array_in]) : '';
       }
          check_admin_referer('tx_template_addition2_page');
          update_option('tx_template_update2', $tx_template_addition2);
       }
  require_once(get_template_directory().'/admin/addition/addition_2.php');
  }
  function tx_addition3(){
    $_POST = tx_remove_check($_POST);
    $tx_template_addition3 = get_option('tx_template_update3');
       if(isset($_POST['tx_submit']) && isset($_POST['tx_submit']) == 'tx_submit_addition3'){
         $tx_addition3_array = array(
           'tx_quantitypost_option', 'tx_posth3_option', 'tx_catid_option',
           'tx_off_option1','tx_off_option2','tx_quantitypost_option2', 'tx_posth3_option2', 'tx_catid_option2',
           'tx_com1_option', 'tx_com2_option', 'tx_com3_option', 'tx_com4_option','tx_com5_option', 'tx_com6_option', 'tx_com7_option',
           'tx_com8_option', 'tx_com9_option', 'tx_com10_option', 'tx_com11_option', 'tx_com12_option', 'tx_com13_option',
           'tx_tweet_option','tx_like_option', 'tx_hatena_option', 'tx_pocket_option', 'tx_google_plus_option', 'tx_line_option','tx_con3_option', 'tx_con4_option', 'tx_contact_item_option',
           'tx_recommended_option', 'tx_recommended_title_option', 'tx_recommended_select_option', 'tx_recommended_or_option',
           'tx_recommended_itempage1_option', 'tx_recommended_itempage2_option', 'tx_recommended_itempage3_option', 'tx_recommended_itempage4_option', 'tx_recommended_itempage5_option',
           'tx_recommended_itempage6_option', 'tx_recommended_itempage7_option', 'tx_recommended_itempage8_option', 'tx_recommended_itempage_cat_option'
         );
       foreach($tx_addition3_array as $tx_addition3_array_in){
           $tx_template_addition3[$tx_addition3_array_in] = isset($_POST[$tx_addition3_array_in]) ? stripslashes($_POST[$tx_addition3_array_in]) : '';
       }
          check_admin_referer('tx_template_addition3_page');
          update_option('tx_template_update3', $tx_template_addition3);
       }
  require_once(get_template_directory().'/admin/addition/addition_3.php');
  }
  function tx_addition4(){
    $_POST = tx_remove_check($_POST);
    $tx_template_addition4 = get_option('tx_template_update4');
       if(isset($_POST['tx_submit']) && isset($_POST['tx_submit']) == 'tx_submit_addition4'){
         $tx_addition4_array = array(
           'tx_color1_option', 'tx_color2_option', 'tx_color3_option', 'tx_color4_option', 'tx_color5_option', 'tx_color6_option', 'tx_color7_option', 'tx_color8_option',
           'tx_color9_option', 'tx_color10_option', 'tx_color11_option', 'tx_color12_option', 'tx_color13_option', 'tx_color14_option', 'tx_color15_option', 'tx_color16_option'
         );
       foreach($tx_addition4_array as $tx_addition4_array_in){
           $tx_template_addition4[$tx_addition4_array_in] = isset($_POST[$tx_addition4_array_in]) ? stripslashes($_POST[$tx_addition4_array_in]) : '';
       }
          check_admin_referer('tx_template_addition4_page');
          update_option('tx_template_update4', $tx_template_addition4);
       }
  require_once(get_template_directory().'/admin/addition/addition_4.php');
  }

  function tx_addition5(){
    $_POST = tx_remove_check($_POST);
    $tx_template_addition5 = get_option('tx_template_update5');
       if(isset($_POST['tx_submit']) && isset($_POST['tx_submit']) == 'tx_submit_addition5'){
         $tx_addition5_array = array(
           'tx_subnewitem_option','tx_priceupitem_option','tx_pricedownitem_option','tx_stockupitem_option','tx_stockdownitem_option','tx_abcdeitem_option'
         );
       foreach($tx_addition5_array as $tx_addition5_array_in){
           $tx_template_addition5[$tx_addition5_array_in] = isset($_POST[$tx_addition5_array_in]) ? stripslashes($_POST[$tx_addition5_array_in]) : '';
       }
          check_admin_referer('tx_template_addition5_page');
          update_option('tx_template_update5', $tx_template_addition5);
       }
           if(isset($_POST['tx_sort_itemupdate']) && $_POST['tx_sort_itemupdate'] == 'tx_template_sort_update'){
             $tx_sort_conversion_update = tx_sort_conversion_price();
             $tx_sort_conversion_update = tx_sort_conversion_stock();
           }
             if(isset($tx_sort_conversion_update) && $tx_sort_conversion_update === true){
               $tx_update_propriety = 'undertake';
               $tx_update_text = 'OK';
             }elseif(isset($tx_sort_conversion_update) && $tx_sort_conversion_update === false){
               $tx_update_propriety = 'error';
               $tx_update_text = 'ERROR';
             }else{
               $tx_update_propriety = '';
               $tx_update_text = '';
             }
  require_once(get_template_directory().'/admin/addition/addition_5.php');
  }

    /******************************************************************
      item page recommended
    ******************************************************************/
    function tx_recommended_creation($post){
      wp_nonce_field('tx_save_meta_data', 'tx_meta_data_nonce');
        $tx_recommended_post_id = get_post_meta($post->ID, '_tx_recommended_post_id' ,true);
          echo '<style>#recommended-box span{margin-right:10px;}input.recommended-input{width:90px;}input.recommended-cat-input{width:60%;}</style>'."\n";
          echo '<div id="recommended-box"><p><b>・POST&nbsp;ID</b></p>'."\n";
          echo '<span>[1]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id1]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id1'])){
              echo esc_attr($tx_recommended_post_id['id1']);
            }
          echo '" /></span>'."\n";
          echo '<span>[2]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id2]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id2'])){
              echo esc_attr($tx_recommended_post_id['id2']);
            }
          echo '" /></span>'."\n";
          echo '<span>[3]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id3]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id3'])){
              echo esc_attr($tx_recommended_post_id['id3']);
            }
          echo '" /></span>'."\n";
          echo '<span>[4]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id4]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id4'])){
              echo esc_attr($tx_recommended_post_id['id4']);
            }
          echo '" /></span><br />'."\n";
          echo '<span>[5]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id5]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id5'])){
              echo esc_attr($tx_recommended_post_id['id5']);
            }
          echo '" /></span>'."\n";
          echo '<span>[6]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id6]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id6'])){
              echo esc_attr($tx_recommended_post_id['id6']);
            }
          echo '" /></span>'."\n";
          echo '<span>[7]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id7]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id7'])){
              echo esc_attr($tx_recommended_post_id['id7']);
            }
          echo '" /></span>'."\n";
          echo '<span>[8]&nbsp;Post&nbsp;ID&nbsp;<input type="text" name="tx_recommended_postid[id8]" class="recommended-input" value="';
            if(!empty($tx_recommended_post_id['id8'])){
              echo esc_attr($tx_recommended_post_id['id8']);
            }
          echo '" /></span>'."\n";
          echo '</div>'."\n";
    }

    /******************************************************************
      page&post seo
    ******************************************************************/
    function tx_seo_creation($post){
      wp_nonce_field('tx_save_meta_data', 'tx_meta_data_nonce');
        $tx_on = 'on';
        $tx_off = 'off';
        $tx_title = get_post_meta($post->ID, '_tx_title_seo' ,true);
        $tx_description = get_post_meta($post->ID, '_tx_description_seo' ,true);
        $tx_h1 = get_post_meta($post->ID, '_tx_h1_seo' ,true);
        $tx_keyword = get_post_meta($post->ID, '_tx_keyword_seo' ,true);
        $tx_noindex = get_post_meta($post->ID, '_tx_noindex_seo' ,true);
        $tx_nofollow = get_post_meta($post->ID, '_tx_nofollow_seo' ,true);
        $tx_noarchive = get_post_meta($post->ID, '_tx_noarchive_seo' ,true);
          echo '<style>p.tx-seo{margin-top:30px;padding-bottom:30px;border-bottom:1px dotted #d5d5d5;}p.tx-seo span{width:100%;margin-bottom:3px;float:left;}p.tx-seo label{margin-right:20px;}</style>'."\n";
          echo '<p class="tx-seo"><span>Title&nbsp;[&nbsp;ページのタイトル&nbsp;(head内)&nbsp;]</span><input type="text" name="_tx_title_seo" value="';
            if(!empty($tx_title)){
              echo esc_attr($tx_title);
            }
          echo '" size="40" /></p>'."\n";
          echo '<p class="tx-seo"><span>Description&nbsp;[&nbsp;ページの説明&nbsp;(head内)&nbsp;]</span><textarea name="_tx_description_seo" rows="5" cols="50">';
            if(!empty($tx_description)){
              echo esc_attr($tx_description);
            }
          echo '</textarea></p>'."\n";
          echo '<p class="tx-seo"><span>Keyword&nbsp;[&nbsp;ページのキーワード&nbsp;(head内)&nbsp;]</span><input type="text" name="_tx_keyword_seo" value="';
            if(!empty($tx_keyword)){
              echo esc_attr($tx_keyword);
            }
          echo '" size="40" /></p>'."\n";
          echo '<p class="tx-seo"><span>H1&nbsp;[&nbsp;ページの大見出し&nbsp;]</span><input type="text" name="_tx_h1_seo" value="';
            if(!empty($tx_h1)){
              echo esc_attr($tx_h1);
            }
          echo '" size="40" /></p>'."\n";

          echo '<p class="tx-seo"><span>Robots&nbsp;[&nbsp;NOINDEX&nbsp;(head内)&nbsp;]</span><label><input type="radio" name="_tx_noindex_seo" value="'.$tx_on.'"';
            if($tx_noindex == $tx_on){echo ' checked="checked"';}
          echo ' />'.$tx_on.'</label>';
          echo '<label><input type="radio" name="_tx_noindex_seo" value="'.$tx_off.'"';
            if(empty($tx_noindex)){
              echo ' checked="checked"';
            }elseif($tx_noindex == $tx_off){
              echo ' checked="checked"';
            }
          echo ' />'.$tx_off.'</label></p>'."\n";
          echo '<p class="tx-seo"><span>Robots&nbsp;[&nbsp;NOFOLLOW&nbsp;(head内)&nbsp;]</span><label><input type="radio" name="_tx_nofollow_seo" value="'.$tx_on.'"';
            if($tx_nofollow == $tx_on){echo ' checked="checked"';}
          echo ' />'.$tx_on.'</label>';

          echo '<label><input type="radio" name="_tx_nofollow_seo" value="'.$tx_off.'"';
            if(empty($tx_nofollow)){
              echo ' checked="checked"';
            }elseif($tx_nofollow == $tx_off){
              echo ' checked="checked"';
            }
          echo ' />'.$tx_off.'</label></p>'."\n";
          echo '<p class="tx-seo"><span>Robots&nbsp;[&nbsp;NOARCHIVE&nbsp;(head内)&nbsp;]</span><label><input type="radio" name="_tx_noarchive_seo" value="'.$tx_on.'"';
            if($tx_noarchive == $tx_on){echo ' checked="checked"';}
          echo ' />'.$tx_on.'</label>';

          echo '<label><input type="radio" name="_tx_noarchive_seo" value="'.$tx_off.'"';
            if(empty($tx_noarchive)){
              echo ' checked="checked"';
            }elseif($tx_noarchive == $tx_off){
              echo ' checked="checked"';
            }
          echo ' />'.$tx_off.'</label></p>'."\n";
    }

    // ##### admin post list #####
      function admin_post_list($defaults){
        $defaults['postlist_index'] = 'noindex';
        $defaults['postlist_follow'] = 'nofollow';
        $defaults['postlist_archive'] = 'noarchive';
        return $defaults;
      }
      add_filter('manage_posts_columns', 'admin_post_list', 15, 1);
      add_filter('manage_pages_columns', 'admin_post_list', 15, 1);

      function admin_post_list_field($column_name, $id){
        if($column_name == 'postlist_index'){
          $tx_field_noindex = get_post_meta($id, '_tx_noindex_seo' ,true);
            if(empty($tx_field_noindex)){
              echo '<style>span.index-off{font-weight:bold;color:#c0abab;}span.index-on{font-weight:bold;color:#ff4817;}</style>';
              echo '<span class="index-off">off</span>';
            }elseif(!empty($tx_field_noindex)){
              if($tx_field_noindex == 'on'){
                echo '<span class="index-on">'.esc_attr($tx_field_noindex).'</span>';
              }elseif($tx_field_noindex == 'off'){
                echo '<span class="index-off">'.esc_attr($tx_field_noindex).'</span>';
              }
            }
        }
        if($column_name == 'postlist_follow'){
          $tx_field_nofollow = get_post_meta($id, '_tx_nofollow_seo' ,true);
            if(empty($tx_field_nofollow)){
              echo '<style>span.follow-off{font-weight:bold;color:#c0abab;}span.follow-on{font-weight:bold;color:#ff4817;}</style>';
              echo '<span class="follow-off">off</span>';
            }elseif(!empty($tx_field_nofollow)){
              if($tx_field_nofollow == 'on'){
                echo '<span class="follow-on">'.esc_attr($tx_field_nofollow).'</span>';
              }elseif($tx_field_nofollow == 'off'){
                echo '<span class="follow-off">'.esc_attr($tx_field_nofollow).'</span>';
              }
            }
        }
        if($column_name == 'postlist_archive'){
          $tx_field_noarchive = get_post_meta($id, '_tx_noarchive_seo' ,true);
            if(empty($tx_field_noarchive)){
              echo '<style>span.archive-off{font-weight:bold;color:#c0abab;}span.archive-on{font-weight:bold;color:#ff4817;}</style>';
              echo '<span class="archive-off">off</span>';
            }elseif(!empty($tx_field_noarchive)){
              if($tx_field_noarchive == 'on'){
                echo '<span class="archive-on">'.esc_attr($tx_field_noarchive).'</span>';
              }elseif($tx_field_noarchive == 'off'){
                echo '<span class="archive-off">'.esc_attr($tx_field_noarchive).'</span>';
              }
            }
        }
      }
      add_action('manage_posts_custom_column', 'admin_post_list_field', 15, 2);
      add_action('manage_pages_custom_column', 'admin_post_list_field', 15, 2);
    // ##### admin post list #####

    function tx_save_meta_data($post_id){
      if(!isset($_POST['tx_meta_data_nonce'])){
        return;
      }
        if(!wp_verify_nonce($_POST['tx_meta_data_nonce'], 'tx_save_meta_data')){
          return;
        }
          if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
            return;
          }
            if(isset($_POST['post_type']) && 'page' == $_POST['post_type']){
              if(!current_user_can('edit_page', $post_id)){
                return;
              }
            }else{
              if(!current_user_can('edit_post', $post_id)){
                return;
              }
            }
            if(isset($_GET['page']) && ($_GET['page'] == 'usces_itemnew') || isset($_GET['page']) && ($_GET['page'] == 'usces_itemedit')){
              if(isset($_POST['tx_recommended_postid'])){
                $tx_recommended_postkey = array();
                $tx_recommended_postkey = array_keys($_POST['tx_recommended_postid']);
                  foreach($tx_recommended_postkey as $tx_recommended_postkeys){
                    if(isset($_POST['tx_recommended_postid'][$tx_recommended_postkeys])){
                      $tx_recommended_post[$tx_recommended_postkeys] = sanitize_text_field($_POST['tx_recommended_postid'][$tx_recommended_postkeys]);
                    }
                  }
               update_post_meta($post_id, '_tx_recommended_post_id', $tx_recommended_post);
               }
            }
            if(get_post_type() === 'post' || get_post_type() === 'page'){
              $tx_title_seo_field = sanitize_text_field($_POST['_tx_title_seo']);
              $tx_description_seo_field = sanitize_text_field($_POST['_tx_description_seo']);
              $tx_h1_seo_field = sanitize_text_field($_POST['_tx_h1_seo']);
              $tx_keyword_seo_field = sanitize_text_field($_POST['_tx_keyword_seo']);
              $tx_noindex_seo_field = sanitize_text_field($_POST['_tx_noindex_seo']);
              $tx_nofollow_seo_field = sanitize_text_field($_POST['_tx_nofollow_seo']);
              $tx_noarchive_seo_field = sanitize_text_field($_POST['_tx_noarchive_seo']);
                update_post_meta($post_id, '_tx_title_seo', $tx_title_seo_field);
                update_post_meta($post_id, '_tx_description_seo', $tx_description_seo_field);
                update_post_meta($post_id, '_tx_h1_seo', $tx_h1_seo_field);
                update_post_meta($post_id, '_tx_keyword_seo', $tx_keyword_seo_field);
                update_post_meta($post_id, '_tx_noindex_seo', $tx_noindex_seo_field);
                update_post_meta($post_id, '_tx_nofollow_seo', $tx_nofollow_seo_field);
                update_post_meta($post_id, '_tx_noarchive_seo', $tx_noarchive_seo_field);
            }
    }
    add_action('save_post', 'tx_save_meta_data');
/*** add menu ***/

/*** admin head css ***/
 function tx_adminhead_styles(){
   if(isset($_GET['page']) && ($_GET['page'] == 'addition_1') || isset($_GET['page']) && ($_GET['page'] == 'addition_2') || isset($_GET['page']) && ($_GET['page'] == 'addition_3') || isset($_GET['page']) && ($_GET['page'] == 'addition_4') || isset($_GET['page']) && ($_GET['page'] == 'addition_5')){
     wp_register_style('tx_add_style',get_template_directory_uri().'/functions/setting/css/add-style.css', array(), false, 'all');
     wp_enqueue_style('tx_add_style');
   }
 }
 add_action('admin_print_styles', 'tx_adminhead_styles');
/*** admin head css ***/

// ----- add page
  $tx_inquiry_page = array(
   'usces-inquiry' => array(
   'name' => 'usces-inquiry',
   'title' => 'お問い合わせ',
   'tag' => '右側の「ページ属性」→「テンプレート」でcontactを選択し更新してください。こちらのテキストは削除してください。',
   'option' => 'contact_url'
  ));
  $contact_page_slug = 'usces-inquiry';
    if(empty(get_page_by_path($contact_page_slug)->ID)){
      $contact_page_id = wp_insert_post(array(
        'post_title' => $tx_inquiry_page['usces-inquiry']['title'],
        'post_type' => 'page',
        'post_name' => $tx_inquiry_page['usces-inquiry']['name'],
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        'post_content' => $tx_inquiry_page['usces-inquiry']['tag'],
        'post_status' => 'publish',
        'post_author' => 1,
        'menu_order' => 0
      ));
    }
  $tx_company_page = array(
    'company' => array(
    'name' => 'company',
    'title' => '特定商取引法の表記',
    'tag' => '右側の「ページ属性」→「テンプレート」でcompanyを選択し更新してください。こちらのテキストは削除してください。',
    'option' => 'company_url'
  ));
  $company_page_slug = 'company';
    if(empty(get_page_by_path($company_page_slug)->ID)){
      $company_page_id = wp_insert_post(array(
        'post_title' => $tx_company_page['company']['title'],
        'post_type' => 'page',
        'post_name' => $tx_company_page['company']['name'],
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        'post_content' => $tx_company_page['company']['tag'],
        'post_status' => 'publish',
        'post_author' => 1,
        'menu_order' => 0
      ));
    }

  $tx_item_contact_page = array(
    'contact-item' => array(
    'name' => 'contact-item',
    'title' => '商品コンタクト',
    'tag' => '右側の「ページ属性」→「テンプレート」でcontact-itemを選択し更新してください。こちらのテキストは削除してください。',
    'option' => 'contact_item_url'
    ));
  $item_contact_page_slug = 'contact-item';
    if(empty(get_page_by_path($item_contact_page_slug)->ID)){
      $item_contact_page_id = wp_insert_post(array(
        'post_title' => $tx_item_contact_page['contact-item']['title'],
        'post_type' => 'page',
        'post_name' => $tx_item_contact_page['contact-item']['name'],
        'comment_status' => 'closed',
        'ping_status' => 'closed',
        'post_content' => $tx_item_contact_page['contact-item']['tag'],
        'post_status' => 'publish',
        'post_author' => 1,
        'menu_order' => 0
       ));
    }
// add page

/*** denial ***/
 function tx_remove_check($tx_check){
   $tx_check = preg_replace('/<(\?+)php(.*?)(\?+)>/is', '', $tx_check);
   $tx_check = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $tx_check);
   $tx_check = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $tx_check);
   $tx_check = preg_replace('/on[a-zA-Z]+=.*\"/is', '', $tx_check);
   return $tx_check;
 }
 function tx_free_remove_check($tx_free_check){
   $tx_free_check = preg_replace('/<(\?+)php(.*?)(\?+)>/is', '', $tx_free_check);
   return $tx_free_check;
 }
/*** denial ***/

// ----- item contact
function item_contact_form($tag){
  if (!is_array($tag))
  return $tag;
  if(isset($_GET['contact_item_name'])){
    $name = $tag['name'];
    if($name == 'item-name')
    $tag['values']=(array) $_GET['contact_item_name'];
  }
  if(isset($_GET['contact_item_id'])){
    $id = $tag['name'];
    if($id == 'item-id')
    $tag['values']=(array) $_GET['contact_item_id'];
  }
  if(isset($_GET['contact_item_url'])){
    $url = $tag['name'];
    if($url == 'item-url')
    $tag['values']=(array) $_GET['contact_item_url'];
  }
  return $tag;
 }
 add_filter('wpcf7_form_tag', 'item_contact_form', 11);

 function tx_item_contact_form_but() {
  $tx_template_addition3 = get_option('tx_template_update3');
  $tx_item_contact_page = 'page_id=' . $tx_template_addition3['tx_con3_option'];
  if(!empty($tx_template_addition3['tx_contact_item_option'])){
   if($tx_template_addition3['tx_contact_item_option'] == 'contactitem'){
   echo '<div class="item-contact-but"><p><span><a href="'.home_url().'?'.$tx_item_contact_page.'&amp;contact_item_name='.urlencode(the_title('' , '' , false)).'&amp;contact_item_id='.get_the_ID().'&amp;contact_item_url='.urlencode(get_permalink()).'" target="_blank">
   この商品についての問い合わせはコチラ</a></span></p></div>';
   }
  }
 }
// item contact

// ----- item search
 function tx_itemsearch_file($template) {
   if(is_search() && isset($_GET['itemsearch'])){
     $template = get_template_part('search_item');
   }
   return $template;
 }
 add_filter('template_include', 'tx_itemsearch_file');
// default search

// ----- nav menu
 function tx_nav_container_false($args = ''){
   $args['container'] = false;
     return $args;
 }
 add_filter('wp_nav_menu_args', 'tx_nav_container_false');

 register_nav_menus(array('main_nav' => 'メインメニュー','sub_nav' => 'サブメニュー','footer_nav' => 'フッターメニュー'));
// nav menu

// ----- search query
 function tx_pre_get_posts_query($query){
     $cat = get_category_by_slug('item');
   if(is_admin() || !$query->is_main_query())
     return;
   if($query->is_search){
     $query->set('post_type', 'post');
       if(usces_is_item() == false  && !isset($_GET['itemsearch'])){
         $query->set('category__not_in', $cat->term_id);
       }
   return;
   }

   if($query->is_archive){
     if(is_author()){
       if(usces_is_item() == false){
         $query->set('category__not_in', $cat->term_id);
       }
     }
   return;
   }

 }
 add_filter('pre_get_posts','tx_pre_get_posts_query');

// search query
?>