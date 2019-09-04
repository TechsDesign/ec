<?php
 function tx_sns_img_button(){
   $tx_template_add1 = get_option('tx_template_update1');
   $tx_html_twimg = (get_bloginfo('template_directory'). '/images/sns/twitter.png');
   $tx_html_faimg = (get_bloginfo('template_directory'). '/images/sns/facebook.png');
   $tx_html_coimg = (get_bloginfo('template_directory'). '/images/sns/mail.png');
   $tx_html_rssimg = (get_bloginfo('template_directory'). '/images/sns/rss.png');
   $tx_html_rss = get_bloginfo('atom_url','raw');
   $tx_html_hatena_img_img = (get_bloginfo('template_directory'). '/images/sns/hatena.png');
   $tx_html_google_plus_img_img = (get_bloginfo('template_directory'). '/images/sns/google-plus.png');
   $tx_html_instaimg = (get_bloginfo('template_directory'). '/images/sns/instagram.png');

   if(!empty($tx_template_add1['tx_twitter_option']) == 'twitter' || !empty($tx_template_add1['tx_facebook_option']) == 'facebook' || !empty($tx_template_add1['tx_mail_option']) == 'contact' || !empty($tx_template_add1['tx_rss_option']) == 'rss' || !empty($tx_template_add1['tx_hatena_img_option']) == 'hatena_img' || !empty($tx_template_add1['tx_google_plus_img_option']) == 'google_plus_img' || !empty($tx_template_add1['tx_instagram_option']) == 'instagram'){
     echo '<div id="sns-but">';
     /*** twitter ***/
     if(!empty($tx_template_add1['tx_tw_option'])){
       $tx_html_tw = $tx_template_add1['tx_tw_option'];
         if(!empty($tx_template_add1['tx_twitter_option']) == 'twitter'){
           echo '<p><a href="https://twitter.com/'.esc_attr($tx_html_tw).'" target="_blank"><img src="'.$tx_html_twimg.'" width="36" height="36" alt="twitter" /></a></p>'."\n";
         }
     }
     /*** facebook ***/
     if(!empty($tx_template_add1['tx_fa_option'])){
       $tx_html_fa = $tx_template_add1['tx_fa_option'];
         if(!empty($tx_template_add1['tx_facebook_option']) == 'facebook'){
           echo '<p><a href="https://www.facebook.com/'.esc_attr($tx_html_fa).'" target="_blank"><img src="'.$tx_html_faimg.'" width="36" height="36" alt="facebook" /></a></p>'."\n";
         }
     }
     /*** hatena ***/
     if(!empty($tx_template_add1['tx_hatena_img_option']) == 'hatena_img'){
       echo '<p><a href="http://b.hatena.ne.jp/entry/'.get_option('home').'" target="_blank"><img src="'.$tx_html_hatena_img_img.'" width="36" height="36" alt="Hatena" /></a></p>'."\n";
     }
     /*** google ***/
     if(!empty($tx_template_add1['tx_google_plus_1_option'])){
       $tx_html_google_plus_img = $tx_template_add1['tx_google_plus_1_option'];
         if(!empty($tx_template_add1['tx_google_plus_img_option']) == 'google_plus_img'){
           echo '<p><a href="https://plus.google.com/'.esc_attr($tx_html_google_plus_img).'" target="_blank"><img src="'.$tx_html_google_plus_img_img.'" width="36" height="36" alt="Google+1" /></a></p>'."\n";
         }
     }
     /*** instagram ***/
     if(!empty($tx_template_add1['tx_insta_option'])){
       $tx_html_insta = $tx_template_add1['tx_insta_option'];
         if(!empty($tx_template_add1['tx_instagram_option']) == 'instagram'){
           echo '<p><a href="https://www.instagram.com/'.esc_attr($tx_html_insta).'" target="_blank"><img src="'.$tx_html_instaimg.'" width="36" height="36" alt="instagram" /></a></p>'."\n";
         }
     }
     /*** mail ***/
     if(!empty($tx_template_add1['tx_con1_option'])){
       $tx_con1_addition = $tx_template_add1['tx_con1_option'];
       $tx_html_con1 = get_page_link( $tx_con1_addition );
         if(!empty($tx_template_add1['tx_mail_option']) == 'contact'){
           echo '<p><a href="'.esc_attr($tx_html_con1).'"><img src="'.$tx_html_coimg.'" width="36" height="36" alt="contact" /></a></p>'."\n";
         }
     }
     /*** rss ***/
     if(!empty($tx_template_add1['tx_rss_option']) == 'rss'){
       echo '<p><a href="'.$tx_html_rss.'" target="_blank"><img src="'.$tx_html_rssimg.'" width="36" height="36" alt="rss" /></a></p>'."\n";
     }
     echo '</div>';
   }
 }

 function tx_single_sns_button(){
   global $post;
     $tx_template_add3 = get_option('tx_template_update3');
     $tx_single_link = get_the_permalink();
     $tx_single_encodeurl = rawurlencode($tx_single_link);
     $tx_single_title = get_the_title();
     $tx_single_title_seo = get_post_meta($post->ID, '_tx_title_seo' ,true);
       if(!empty($tx_template_add3['tx_tweet_option']) == 'tweet' || !empty($tx_template_add3['tx_like_option']) == 'like' || !empty($tx_template_add3['tx_hatena_option']) == 'hatena' || !empty($tx_template_add3['tx_pocket_option']) == 'pocket' || !empty($tx_template_add3['tx_google_plus_option']) == 'google_plus' || !empty($tx_template_add3['tx_line_option']) == 'line'){
         echo '<div id="single-sns">'."\n";

           /*** facebook ***/
           $tx_single_facebook_img = (get_bloginfo('template_directory'). '/images/sns/facebook-but.png');
           $tx_facebook_get = 'https://graph.facebook.com/?id=';
           $tx_facebook_json = json_decode(@file_get_contents($tx_facebook_get.$tx_single_encodeurl),false);
             if(!empty($tx_template_add3['tx_like_option']) == 'like'){
               if(isset($tx_facebook_json->share)){
	         $tx_facebook_count = $tx_facebook_json->share->share_count;
               }else{
	         $tx_facebook_count = 0;
               }
               echo '<div id="facebook-like"><a href="https://www.facebook.com/sharer/sharer.php?u='.$tx_single_link.'" ';
?>
onclick="window.open(this.href,'_blank','width=650,height=650,menubar=no,toolbar=no,scrollbars=yes'); return false;" title="Facebook" class="intersection-img">
<?php
               echo '<img src="'.$tx_single_facebook_img.'" width="30" height="30" alt="Facebook">'.esc_html($tx_facebook_count).'</a></div>'."\n";

                  /***** old code *****
                  echo '<div id="facebook-like"><div class="fb-like" data-href="'.$tx_single_link.'" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id; js.async = true;
                        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, "script", "facebook-jssdk"));</script></div>'."\n";
                  *********************/
             }

           /*** hatena ***/
           $tx_single_hatena_img = (get_bloginfo('template_directory'). '/images/sns/hatena-but.png');
           $tx_hatena_get = 'http://api.b.st-hatena.com/entry.count?url=';
           $tx_hatena_json = json_decode(@file_get_contents($tx_hatena_get.$tx_single_encodeurl),false);
             if(!$tx_hatena_json){
               $tx_hatena_json = 0;
             }
             if(!empty($tx_template_add3['tx_hatena_option']) == 'hatena'){
               if(!empty($tx_single_title_seo)){
                 echo '<div id="hatena-book"><a href="http://b.hatena.ne.jp/entry/'.$tx_single_link.'" class="hatena-bookmark-button intersection-img" data-hatena-bookmark-title="'.esc_attr($tx_single_title_seo).'" data-hatena-bookmark-layout="simple" data-hatena-bookmark-lang="ja" ';
               }else{
                 echo '<div id="hatena-book"><a href="http://b.hatena.ne.jp/entry/'.$tx_single_link.'" class="hatena-bookmark-button intersection-img" data-hatena-bookmark-title="'.$tx_single_title.'" data-hatena-bookmark-layout="simple" data-hatena-bookmark-lang="ja" ';
             }
?>
onclick="window.open(this.href,'_blank','width=650,height=650,menubar=no,toolbar=no,scrollbars=yes'); return false;" title="Hatenaブックマーク">
<?php
             echo '<img src="'.$tx_single_hatena_img.'" width="30" height="30" alt="このエントリーをはてなブックマークに追加" />'.esc_html($tx_hatena_json).'</a><script src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></div>'."\n";
             }

           /*** google ***/
           $tx_single_google_img = (get_bloginfo('template_directory'). '/images/sns/google-but.png');
           $tx_google_curl = curl_init();
                             curl_setopt($tx_google_curl, CURLOPT_URL, 'https://clients6.google.com/rpc');
                             curl_setopt($tx_google_curl, CURLOPT_POST, 1);
                             curl_setopt($tx_google_curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.$tx_single_link.'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
                             curl_setopt($tx_google_curl, CURLOPT_RETURNTRANSFER, true);
                             curl_setopt($tx_google_curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
           $tx_google_exec = curl_exec($tx_google_curl);
                             curl_close($tx_google_curl);
           $tx_google_json = json_decode($tx_google_exec, true);
           $tx_google_count = intval($tx_google_json[0]['result']['metadata']['globalCounts']['count']);
             if(!empty($tx_template_add3['tx_google_plus_option']) == 'google_plus'){
               echo '<div id="google-plus"><a href="https://plus.google.com/share?url='.$tx_single_link.'" ';
?>
onclick="window.open(this.href,'_blank','width=650,height=650,menubar=no,toolbar=no,scrollbars=yes'); return false;" title="Google+" class="intersection-img">
<?php
               echo '<img src="'.$tx_single_google_img.'" width="30" height="30" alt="Google+" />'.esc_html($tx_google_count).'</a></div>'."\n";
             }

           /*** pocket ***/
           $tx_single_pocket_img = (get_bloginfo('template_directory'). '/images/sns/pocket-but.png');
             if(!empty($tx_template_add3['tx_pocket_option']) == 'pocket'){
               if(!empty($tx_single_title_seo)){
                 echo '<div id="pocket"><a href="http://getpocket.com/edit?url='.$tx_single_link.'&amp;title='.esc_attr($tx_single_title_seo).'" ';
               }else{
                 echo '<div id="pocket"><a href="http://getpocket.com/edit?url='.$tx_single_link.'&amp;title='.$tx_single_title.'" ';
               }
?>
onclick="window.open(this.href,'_blank','width=650,height=650,menubar=no,toolbar=no,scrollbars=yes'); return false;" title="Pocket" class="intersection-img">
<?php
               echo '<img src="'.$tx_single_pocket_img.'" width="30" height="30" alt="Pocket" />Pocket</a></div>'."\n";
             }

           /*** twitter ***/
           $tx_single_twitter_img = (get_bloginfo('template_directory'). '/images/sns/twitter-but.png');
             if(!empty($tx_template_add3['tx_tweet_option']) == 'tweet'){
               if(!empty($tx_single_title_seo)){
                 echo '<div id="twitter-tweet"><a href="https://twitter.com/share?url='.$tx_single_link.'&amp;text='.esc_attr($tx_single_title_seo).'&amp;lang=ja" data-count="vertical" data-text="'.esc_attr($tx_single_title_seo).'" class="twitter-share-button intersection-img" ';
               }else{
                 echo '<div id="twitter-tweet"><a href="https://twitter.com/share?url='.$tx_single_link.'&amp;text='.esc_attr($tx_single_title).'&amp;lang=ja" data-count="vertical" data-text="'.$tx_single_title.'" class="twitter-share-button intersection-img" ';
               }
?>
onclick="window.open(this.href,'_blank','width=650,height=650,menubar=no,toolbar=no,scrollbars=yes'); return false;" title="Twitter">
<?php
               echo '<img src="'.$tx_single_twitter_img.'" width="30" height="30" alt="Twitter">Tweet</a></div>'."\n";
             }

           /*** line ***/
           $tx_single_line_img = (get_bloginfo('template_directory'). '/images/sns/line-but.png');
             if(!empty($tx_template_add3['tx_line_option']) == 'line'){
               if(!empty($tx_single_title_seo)){
                 echo '<div id="line"><a href="http://line.me/R/msg/text/?'.rawurlencode("$tx_single_title_seo $tx_single_link").'" target="_blank" title="LINEで送る" class="intersection-img"><img src="'.$tx_single_line_img.'" width="30" height="30" alt="LINEで送る" />送る</a></div>'."\n";
               }else{
                 echo '<div id="line"><a href="http://line.me/R/msg/text/?'.rawurlencode("$tx_single_title $tx_single_link").'" target="_blank" title="LINEで送る" class="intersection-img"><img src="'.$tx_single_line_img.'" width="30" height="30" alt="LINEで送る" />送る</a></div>'."\n";
               }
             }

             echo '</div>'."\n";
       }
 }
?>