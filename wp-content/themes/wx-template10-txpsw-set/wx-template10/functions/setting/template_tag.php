<?php
// ----- main image
 function tx_main_slider_header_image(){
   $tx_template_add1 = get_option('tx_template_update1');
   $tx_template_add2 = get_option('tx_template_update2');
   $tx_headerspace = $tx_template_add2['tx_toplink_option'];
   $tx_image_attributes1 = wp_get_attachment_image_src($tx_template_add1['tx_img1_option'], 'full');
   $tx_mainimg_alt1 = get_post_meta($tx_template_add1['tx_img1_option'], '_wp_attachment_image_alt', true);
   $tx_image_attributes2 = wp_get_attachment_image_src($tx_template_add1['tx_img2_option'], 'full');
   $tx_mainimg_alt2 = get_post_meta($tx_template_add1['tx_img2_option'], '_wp_attachment_image_alt', true);
   $tx_image_attributes3 = wp_get_attachment_image_src($tx_template_add1['tx_img3_option'], 'full');
   $tx_mainimg_alt3 = get_post_meta($tx_template_add1['tx_img3_option'], '_wp_attachment_image_alt', true);
   $tx_image_attributes4 = wp_get_attachment_image_src($tx_template_add1['tx_img10_option'], 'full');
   $tx_mainimg_alt4 = get_post_meta($tx_template_add1['tx_img10_option'], '_wp_attachment_image_alt', true);
   $tx_image_attributes5 = wp_get_attachment_image_src($tx_template_add1['tx_img11_option'], 'full');
   $tx_mainimg_alt5 = get_post_meta($tx_template_add1['tx_img11_option'], '_wp_attachment_image_alt', true);
   $tx_mainimg_url6 = $tx_template_add1['tx_mainimg_url6_option'];
   $tx_image_attributes6 = wp_get_attachment_image_src($tx_template_add1['tx_img6_option'], 'full');
     if($tx_template_add1['tx_mainimg_option'] == 'slider'){
       echo '<div id="main-img">'."\n";
           if(!empty($tx_headerspace)){
             echo '<div id="top-space">'.$tx_headerspace.'</div>'."\n";
           }
       echo '<ul>'."\n";
         if(!empty($tx_template_add1['tx_img1_option']) && !empty($tx_template_add1['tx_mainimg_url1_option'])){
           echo '<li>';
             if(!empty($tx_template_add1['tx_imglink1_option'])){
               echo '<a href="'.esc_url($tx_template_add1['tx_imglink1_option']).'">';
             }
           echo '<img src="'.$tx_image_attributes1[0].'" width="'.$tx_image_attributes1[1].'" height="'.$tx_image_attributes1[2].'" alt="'.esc_attr($tx_mainimg_alt1).'" />';
             if(!empty($tx_template_add1['tx_imglink1_option'])){
               echo '</a>';
             }
           echo '</li>'."\n";
         }
         if(!empty($tx_template_add1['tx_img2_option']) && !empty($tx_template_add1['tx_mainimg_url2_option'])){
           echo '<li>';
             if(!empty($tx_template_add1['tx_imglink2_option'])){
               echo '<a href="'.esc_url($tx_template_add1['tx_imglink2_option']).'">';
             }
           echo '<img src="'.$tx_image_attributes2[0].'" width="'.$tx_image_attributes2[1].'" height="'.$tx_image_attributes2[2].'" alt="'.esc_attr($tx_mainimg_alt2).'" />';
             if(!empty($tx_template_add1['tx_imglink2_option'])){
               echo '</a>';
             }
           echo '</li>'."\n";
         }
         if(!empty($tx_template_add1['tx_img3_option']) && !empty($tx_template_add1['tx_mainimg_url3_option'])){
           echo '<li>';
             if(!empty($tx_template_add1['tx_imglink3_option'])){
               echo '<a href="'.esc_url($tx_template_add1['tx_imglink3_option']).'">';
             }
           echo '<img src="'.$tx_image_attributes3[0].'" width="'.$tx_image_attributes3[1].'" height="'.$tx_image_attributes3[2].'" alt="'.esc_attr($tx_mainimg_alt3).'" />';
             if(!empty($tx_template_add1['tx_imglink3_option'])){
               echo '</a>';
             }
           echo '</li>'."\n";
         }
         if(!empty($tx_template_add1['tx_img10_option']) && !empty($tx_template_add1['tx_mainimg_url4_option'])){
           echo '<li>';
             if(!empty($tx_template_add1['tx_imglink10_option'])){
               echo '<a href="'.esc_url($tx_template_add1['tx_imglink10_option']).'">';
             }
           echo '<img src="'.$tx_image_attributes4[0].'" width="'.$tx_image_attributes4[1].'" height="'.$tx_image_attributes4[2].'" alt="'.esc_attr($tx_mainimg_alt4).'" />';
             if(!empty($tx_template_add1['tx_imglink10_option'])){
               echo '</a>';
             }
           echo '</li>'."\n";
         }
         if(!empty($tx_template_add1['tx_img11_option']) && !empty($tx_template_add1['tx_mainimg_url5_option'])){
           echo '<li>';
             if(!empty($tx_template_add1['tx_imglink11_option'])){
               echo '<a href="'.esc_url($tx_template_add1['tx_imglink11_option']).'">';
             }
           echo '<img src="'.$tx_image_attributes5[0].'" width="'.$tx_image_attributes5[1].'" height="'.$tx_image_attributes5[2].'" alt="'.esc_attr($tx_mainimg_alt5).'" />';
             if(!empty($tx_template_add1['tx_imglink11_option'])){
               echo '</a>';
             }
           echo '</li>'."\n";
         }
       echo '</ul></div>'."\n";
     }elseif($tx_template_add1['tx_mainimg_option'] == 'header'){
       if(!empty($tx_template_add1['tx_img6_option'])){
         echo '<div id="main-still">'."\n";
           if(!empty($tx_headerspace)){
             echo '<div id="top-space">'.$tx_headerspace.'</div>'."\n";
           }
         echo '<div id="main-still-box">'."\n";
           if(!empty($tx_template_add1['tx_imglink5_option'])){
             echo '<a href="'.esc_url($tx_template_add1['tx_imglink5_option']).'">';
           }
         echo '<img src="'.$tx_image_attributes6[0].'" width="'.$tx_image_attributes6[1].'" height="'.$tx_image_attributes6[2].'" class="custom-img" alt="'.esc_attr(get_post_meta($tx_template_add1['tx_img6_option'], '_wp_attachment_image_alt', true)).'" />';
           if(!empty($tx_template_add1['tx_imglink5_option'])){
             echo '</a>';
           }
         echo '</div></div>'."\n";
       }
     }else{
         echo '<div id="main-still"><div id="main-still-box">'."\n";
         echo '<img src="'.get_bloginfo('template_directory').'/images/main-img-d.jpg" width="1600" height="500" alt="" />';
         echo '</div></div>'."\n";
     }
 }
// main image

// ----- top new blog
 function tx_toppage_newpost(){
  global $post;
  $tx_template_add3 = get_option('tx_template_update3');
  $tx_postimg_noimg = (get_bloginfo('template_directory'). '/images/noimage2.jpg');
  $tx_post_catlink = get_category_link($tx_template_add3['tx_catid_option']);
  $tx_post_catid_default = get_the_category_by_ID($tx_template_add3['tx_catid_option']);
    if(!empty($tx_template_add3['tx_off_option1']) == 'postnew1'){
      if(!empty($tx_template_add3['tx_off_option2']) == 'postnew2'){
        $tx_new_ob = new wp_query(array('cat'=>$tx_template_add3['tx_catid_option'], 'posts_per_page'=>$tx_template_add3['tx_quantitypost_option'], 'post_status'=>'publish', 'post_type' => 'post'));
      }else{
        $tx_new_ob = new wp_query(array('cat'=>$tx_template_add3['tx_catid_option'], 'posts_per_page'=>'4', 'post_status'=>'publish', 'post_type' => 'post'));
      }
        if($tx_new_ob->have_posts()){
          echo '<article id="top-post1"><div id="top-post1-in">';
            if(!empty($tx_template_add3['tx_posth3_option'])){
              echo '<div class="txpost-advanced"><h2><span>'.esc_attr($tx_template_add3['tx_posth3_option']).'</span></h2>';
                if($tx_post_catlink){
                  echo '<div class="txpost-cat"><p><a href="'.$tx_post_catlink.'">'.$tx_post_catid_default.'</a></p></div>';
                }else{
                  echo '<div class="txpost-cat"><p><a href="'.get_category_link('1').'">'.__('All Posts').'</a></p></div>';
                }
              echo '</div>'."\n";
              echo '<div id="txpost-h2">'."\n";
            }else{
              echo '<div id="txpost">'."\n";
            }
          echo '<div class="txpost-in">'."\n";
            while($tx_new_ob->have_posts()){ $tx_new_ob->the_post();
              $tx_post_thumbnail = get_the_post_thumbnail($post->ID, array(140,93), array('class' => 'tx_thumnail'));
              $tx_post_tags = get_the_tag_list('<p>', '</p><p>', '</p>');
              $tx_post_contents = strip_tags($post->post_content);
                echo '<div class="txpost-box"><div class="txpost-box-in">'."\n";
                  if(has_post_thumbnail()){
                    echo '<div class="txpost-thumbnail"><p><a href="'.get_permalink().'">'.$tx_post_thumbnail.'</a></p></div>'."\n";
                  }else{
                    echo '<div class="txpost-thumbnail"><p><a href="'.get_permalink().'"><img src="'.$tx_postimg_noimg.'" width="140" height="93" alt="noimage" /></a></p></div>'."\n";
                  }
                echo '<div class="txpost-box-right"><div class="txpost-date">'.get_the_time('Y&#047;n&#047;j');
                     if($tx_post_tags){
                       echo '<div class="top-posttags">'.$tx_post_tags.'</div>';
                     }
                echo '</div>'."\n";
                  if(!empty($tx_template_add3['tx_posth3_option'])){
                    echo '<h3 class="txpost-title"><a href="'.get_permalink().'">'.mb_strimwidth($post->post_title, 0, 88, '...').'</a></h3>'."\n";
                  }else{
                    echo '<h2 class="txpost-title"><a href="'.get_permalink().'">'.mb_strimwidth($post->post_title, 0, 88, '...').'</a></h2>'."\n";
                  }
                echo '<div class="txpost-content">'.mb_strimwidth($tx_post_contents, 0, 180, '...').'</div>'."\n";
                echo '</div></div></div>'."\n";
            }
            wp_reset_query();
          echo '</div></div>';
          echo '</div></article>'."\n";
        }
    }
 }
// top new blog

// ----- top new item
 function tx_toppage_newitem(){
  global $post,$usces;
    if(defined('USCES_VERSION')){
      $tx_template_add3 = get_option('tx_template_update3');
      $tx_item_noimg = (get_bloginfo('template_directory'). '/images/noimage1.jpg');
      $tx_item_soldout_img = (get_bloginfo('template_directory'). '/images/soldout.png');
      $tx_item_catlink = get_category_link($tx_template_add3['tx_catid_option2']);
      $tx_item_catid = get_the_category_by_ID($tx_template_add3['tx_catid_option2']);
        if(!empty($tx_template_add3['tx_off_option2']) == 'postnew2'){
          if(!empty($tx_template_add3['tx_quantitypost_option2'])){
            $tx_item_ob = new wp_query(array('cat'=>$tx_template_add3['tx_catid_option2'], 'posts_per_page'=>$tx_template_add3['tx_quantitypost_option2'], 'post_status'=>'publish', 'post_type' => 'post'));
          }else{
            $tx_item_ob = new wp_query(array('cat'=>$tx_template_add3['tx_catid_option2'], 'posts_per_page'=>'4', 'post_status'=>'publish', 'post_type' => 'post'));
          }
            if($tx_item_ob->have_posts()){
              echo '<article id="top-item">';
                if(!empty($tx_template_add3['tx_posth3_option2'])){
                  echo '<div class="txpost-advanced"><h2><span>'.esc_attr($tx_template_add3['tx_posth3_option2']).'</span></h2>';
                }
                    if($tx_item_catlink){
                      echo '<div class="top-item-cat"><p><a href="'.$tx_item_catlink.'">'.$tx_item_catid.'</a></p></div>';
                    }else{
                      echo '<div class="top-item-cat"><p><a href="'.get_category_link('1').'">'.__('All Posts').'</a></p></div>';
                    }
              echo '</div>'."\n";
              echo '<div id="top-item-in">'."\n";
                while($tx_item_ob->have_posts()){ $tx_item_ob->the_post(); usces_the_item();
                  $tx_item_thumbnail = usces_the_itemImage(0, 260, 260, '', 'return');
                  $tx_item_thumbnail_url = usces_the_itemImageURL(0, 'return');
                    echo '<div class="top-item-box"><div class="top-item-box-in">'."\n";
                    echo '<div class="top-item-thumbnail intersection-img"><p>';
                      if(!usces_have_zaiko_anyone($post->ID)){
                        if($tx_item_thumbnail_url == ''){
                       echo '<a href="'.get_permalink().'"><span class="item-soldout"><img src="'.$tx_item_soldout_img.'" width="200" height="200" alt="soldout" /></span><span class="item-thumbnail"><img src="'.$tx_item_noimg.'" width="270" height="270" alt="'.$post->post_title.'" /></span></a>';
                     }else{
                       echo '<a href="'.get_permalink().'"><span class="item-soldout"><img src="'.$tx_item_soldout_img.'" width="200" height="200" alt="'.$post->post_title.'" /></span><span class="item-thumbnail">'.$tx_item_thumbnail.'</span></a>';
                        }
                      }else{
                        if($tx_item_thumbnail_url == ''){
                          echo '<a href="'.get_permalink().'"><span class="item-thumbnail"><img src="'.$tx_item_noimg.'" width="260" height="260" alt="'.$post->post_title.'" /></span></a>'."\n";
                        }else{
                          echo '<a href="'.get_permalink().'"><span class="item-thumbnail">'.$tx_item_thumbnail.'</span></a>'."\n";
                        }
                      }
                    echo '</p></div>';
                    echo '<div class="top-item-title">'."\n";
                      if(!empty($tx_template_add3['tx_posth3_option2'])){
                        echo '<h3 class="item-title"><a href="'.get_permalink().'">'.mb_strimwidth($post->post_title, 0, 70, '...').'<span>&nbsp;</span></a></h3>'."\n";
                      }else{
                        echo '<h2 class="item-title"><a href="'.get_permalink().'">'.mb_strimwidth($post->post_title, 0, 70, '...').'<span>&nbsp;</span></a></h2>'."\n";
                      }
                      if(usces_is_skus()){
                          $tx_item_price_get = $usces->getItemPrice($post->ID);
                          sort($tx_item_price_get);
                          echo '<div class="top-item-price"><p>';
                            if(!usces_have_zaiko_anyone($post->ID)){
                              echo '<span class="soldout">Soldout</span>';
                            }else{
                              echo '<span class="price">'.usces_crform($tx_item_price_get[0], true, false, 'return').'</span>'.usces_guid_tax('return');
                            }
                          echo '</p></div>'."\n";
                      }
                    echo '</div>'."\n";
                    echo '</div></div>'."\n";
                }
                wp_reset_query();
              echo '</div>'."\n";
              echo '</article>'."\n";
            }
        }
    }
 }
// top new item

// ----- item page recommended
 function tx_itempage_recommended(){
  global $usces,$post;
    if(defined('USCES_VERSION')){
      $tx_template_add3 = get_option('tx_template_update3');
      $tx_recommended_post = get_post_meta($post->ID, '_tx_recommended_post_id' ,true);
      $tx_itemimg_noimg = (get_bloginfo('template_directory'). '/images/noimage1.jpg');
      $tx_sort_soldout_img = (get_bloginfo('template_directory'). '/images/soldout.png');
      $tx_recommended_itempage_post = array(
                                            $tx_template_add3['tx_recommended_itempage1_option'],
                                            $tx_template_add3['tx_recommended_itempage2_option'],
                                            $tx_template_add3['tx_recommended_itempage3_option'],
                                            $tx_template_add3['tx_recommended_itempage4_option'],
                                            $tx_template_add3['tx_recommended_itempage5_option'],
                                            $tx_template_add3['tx_recommended_itempage6_option'],
                                            $tx_template_add3['tx_recommended_itempage7_option'],
                                            $tx_template_add3['tx_recommended_itempage8_option']
                                     );
      $tx_recommended_itempage_post_array = array_filter($tx_recommended_itempage_post);
        if(empty($tx_recommended_post)){
          $tx_recommended_post[] = array();
        }
          $tx_recommended_post_array = array_filter($tx_recommended_post);
            if(!empty($tx_template_add3['tx_recommended_option']) == 'recommended'){
              if($tx_template_add3['tx_recommended_select_option'] == 'entry'){
                $orderby_type = 'post__in';
              }elseif($tx_template_add3['tx_recommended_select_option'] == 'rand'){
                $orderby_type = 'rand';
              }
                if($tx_template_add3['tx_recommended_or_option'] == 'itemid'){
                  if(!empty($tx_recommended_post_array)){
                    $tx_recommended_post_ob = new wp_query(array('post__in'=> $tx_recommended_post_array, 'post_status'=>'publish', 'post_type' => 'post', 'orderby' => $orderby_type));
                  }else{
                    $tx_recommended_post_ob = new wp_query(array('post__in'=> $tx_recommended_itempage_post_array, 'post_status'=>'publish', 'post_type' => 'post', 'orderby' => $orderby_type));
                  }
                }elseif($tx_template_add3['tx_recommended_or_option'] == 'itemcatid'){
                  if(!empty($tx_recommended_post_array)){
                    $tx_recommended_post_ob = new wp_query(array('post__in'=> $tx_recommended_post_array, 'post_status'=>'publish', 'post_type' => 'post', 'orderby' => $orderby_type));
                  }else{
                    $tx_recommended_post_ob = new wp_query(array('category__in'=> $tx_template_add3['tx_recommended_itempage_cat_option'], 'posts_per_page' => 8, 'post_status'=>'publish', 'post_type' => 'post', 'orderby' => $orderby_type));
                  }
                }
                   if(!empty($tx_recommended_itempage_post_array) || !empty($tx_recommended_post_array)|| !empty($tx_template_add3['tx_recommended_itempage_cat_option'])){
                     if($tx_recommended_post_ob->have_posts()){
                       echo '<div id="item-category"><div id="item-recommended">';
                         if(!empty($tx_template_add3['tx_recommended_title_option'])){
                           echo '<h2><span>'.esc_attr($tx_template_add3['tx_recommended_title_option']).'</span></h2>';
                         }
                       echo '<div class="item-category-in">'."\n";
                         while($tx_recommended_post_ob->have_posts()){ $tx_recommended_post_ob->the_post(); usces_the_item();
                           echo '<div class="item-box"><div class="item-box-in"><p class="intersection-img item-img">';
                             if(!usces_have_zaiko_anyone($post->ID)){
                               if(!usces_the_itemImageURL(0,'return')){
                                 echo '<a href="'.get_permalink($post->ID).'"><span class="item-soldout"><img src="'.$tx_sort_soldout_img.'" width="140" height="140" alt="soldout" /></span><span class="item-thumbnail"><img src="'.$tx_itemimg_noimg.'" width="170" height="170" alt="'.$post->post_title.'" /></span></a>';
                               }else{
                                 echo '<a href="'.get_permalink($post->ID).'"><span class="item-soldout"><img src="'.$tx_sort_soldout_img.'" width="140" height="140" alt="'.$post->post_title.'" /></span><span class="item-thumbnail">'.usces_the_itemImage(0, 170, 170, '', 'return').'</span></a>';
                               }
                             }else{
                               if(!usces_the_itemImageURL(0,'return')){
                                 echo '<span class="item-thumbnail"><a href="'.get_permalink($post->ID).'"><img src="'.$tx_itemimg_noimg.'" width="170" height="170" alt="'.$post->post_title.'" /></a></span>';
                               }else{
                                 echo '<span class="item-thumbnail"><a href="'.get_permalink($post->ID).'">'.usces_the_itemImage(0, 170, 170, '', 'return').'</a></span>';
                               }
                             }
                           echo '</p><p class="item-title"><a href="'.get_permalink($post->ID).'">'.mb_strimwidth($post->post_title, 0, 48, "...").'</a></p>';
                           echo '<div class="item-box-bottom"><p>';
                             $tx_item_price_get = $usces->getItemPrice($post->ID);
                               sort($tx_item_price_get);
                                 if(!usces_have_zaiko_anyone($post->ID)){
                                   echo '<span class="soldout">Soldout</span>';
                                 }else{
                                   echo '<span class="price">'.usces_crform($tx_item_price_get[0], true, false, 'return').'</span>'.usces_guid_tax('return');
                                 }
                           echo '</p></div>';
                           echo '</div></div>'."\n";
                         }
                         wp_reset_query();
                       echo '</div></div></div>'."\n";
                     }
                   }
            }
    }
 }
// item page recommended

// ----- author logo analytics space free
 function tx_head_author(){
   $tx_template_add1 = get_option('tx_template_update1');
     if(!empty($tx_template_add1['tx_copy_option'])){
       echo esc_html($tx_template_add1['tx_copy_option']);
     }
  }
 function tx_header_logo(){
   global $post;
     $tx_template_add1 = get_option('tx_template_update1');
     $tx_headerlogo_img_attachment = wp_get_attachment_image_src($tx_template_add1['tx_logo1_option'], 'full');
     $tx_headerlogo_alt = get_post_meta($tx_template_add1['tx_logo1_option'], '_wp_attachment_image_alt', true);
     $tx_paging_number = isset($_GET['post']) ? esc_html($_GET['post']) : '';
     $tx_site_title = get_bloginfo('name');
     $tx_page_title = get_the_title();
       if(is_page() || is_single()){
         $tx_custom_h1 = get_post_meta($post->ID, '_tx_h1_seo' ,true);
       }
       if(!empty($tx_template_add1['tx_imglogo_option']) && !empty($tx_template_add1['tx_logo1_option'])){
         if(is_home()){
           echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.$tx_site_title.'" /></a></h1>'."\n";
         }elseif(is_page() || is_single()){
          /*** usces newmember page ***/
            if(isset($_GET['page']) && $_GET['page'] == 'newmember'){
              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Membership Registration','usces').'|'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Membership Registration','usces').'|'.$tx_site_title.'" /></a></p>'."\n";
              }
          /*** usces newmember page ***/
          /*** usces login page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'login'){
              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Log-in','usces').'|'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Log-in','usces').'|'.$tx_site_title.'" /></a></p>'."\n";
              }
          /*** usces login page ***/
          /*** usces lostmemberpassword page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'lostmemberpassword'){
              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('The new password acquisition','usces').'|'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('The new password acquisition','usces').'|'.$tx_site_title.'" /></a></p>'."\n";
              }
          /*** usces lostmemberpassword page ***/
          /*** usces changepassword page ***/
            }elseif(isset($_GET['uscesmode']) && $_GET['uscesmode'] == 'changepassword'){
              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Change password','usces').'|'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Change password','usces').'|'.$tx_site_title.'" /></a></p>'."\n";
              }
          /*** usces changepassword page ***/
          /*** usces search item ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'search_item'){

              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Items','usces').__('An article category keyword search','usces').'|'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.__('Items','usces').__('An article category keyword search','usces').'|'.$tx_site_title.'" /></a></p>'."\n";
              }
          /*** usces search item ***/
            }else{
              if(!empty($tx_custom_h1)){
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.esc_html($tx_custom_h1).'" /></a></p>'."\n";
              }else{
                echo '<p class="ps-title"><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.$tx_page_title.'|'.$tx_site_title.'" /></a></p>'."\n";
              }
            }
         }elseif(is_archive() && !is_category()){
           if(is_author()){
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.get_the_author().'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }elseif(is_day()){
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.get_the_time(__('F jS, Y')).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }elseif(is_month()){
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.get_the_time(__('Y F')).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }elseif(is_year()){
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.get_the_time(__('Y')).'|'; if(get_query_var('paged')){ echo sprintff(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
          }elseif(is_post_type_archive()){
            echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.esc_html(get_post_type_object(get_post_type())->labels->singular_name).'|'; if(get_query_var('paged')){ echo sprintff(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }else{
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.single_cat_title('', false).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }
         }elseif(is_category()){
           if(is_search()){
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }else{
             echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.single_cat_title('', false).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
           }
         }elseif(is_search()){
           echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ echo sprintf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'" /></a></h1>'."\n";
         }else{
           echo '<h1><a href="'.home_url('/').'"><img src="'.$tx_headerlogo_img_attachment[0].'" width="'.$tx_headerlogo_img_attachment[1].'" height="'.$tx_headerlogo_img_attachment[2].'" alt="'.$tx_page_title.'|'.$tx_site_title.'" /></a></h1>'."\n";
         }
       }else{
         echo '<h1><a href="'.home_url('/').'"><img src="'.get_bloginfo('template_directory').'/images/logo.png" width="300" height="80" alt="" /></a></h1>';
       }
 }
 function tx_footer_space(){
   $tx_template_add2 = get_option('tx_template_update2');
     if(!empty($tx_template_add2['tx_footer_option'])){
       echo '<div id="footer-space">'.$tx_template_add2['tx_footer_option'].'</div>';
     }
 }
 function tx_index_free1(){
   $tx_template_add2 = get_option('tx_template_update2');
     if(!empty($tx_template_add2['tx_textarea1_option'])){
       echo '<div id="free-area-widget">'.$tx_template_add2['tx_textarea1_option'].'</div>';
     }
 }
 function tx_index_free2(){
   $tx_template_add2 = get_option('tx_template_update2');
     if(!empty($tx_template_add2['tx_textarea2_option'])){
       echo '<div class="free-area">'.$tx_template_add2['tx_textarea2_option'].'</div>';
     }
 }
 function tx_index_free3(){
   $tx_template_add2 = get_option('tx_template_update2');
     if(!empty($tx_template_add2['tx_textarea3_option'])){
       echo '<div class="free-area">'.$tx_template_add2['tx_textarea3_option'].'</div>';
     }
 }
 function tx_footer_goolge(){
   $tx_template_add1 = get_option('tx_template_update1');
     if(!empty($tx_template_add1['tx_google_option'])){
?>
   <script>
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo esc_attr($tx_template_add1['tx_google_option']);?>', 'auto');
      ga('send', 'pageview');
   </script>
<?php
     }
 }
 add_action('wp_footer', 'tx_footer_goolge');
// author logo analytics space free
?>