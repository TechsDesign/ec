<?php
    /*** head title ***/
    function tx_head_title_tag($title){
      global $post;
      $tx_site_title = get_bloginfo('name');
      $tx_page_title = get_the_title();
        if(is_page() || is_single()){
          $tx_custom_title = get_post_meta($post->ID, '_tx_title_seo' ,true);
        }
        if(is_home()){
          $title['title'] = $tx_site_title;
          $title['tagline'] = '';
        }elseif(is_page() || is_single()){
          if(!empty($tx_custom_title)){
            $title['title'] = esc_html($tx_custom_title);
          }else{
            $title['title'] = $tx_page_title.'|'.$tx_site_title;
          }
          $title['site'] = '';
          $title['tagline'] = '';
        }
        return $title;
    }
    add_filter('document_title_parts', 'tx_head_title_tag');

      if(!function_exists('_wp_render_title_tag')){
        function tx_before_title(){
?>
          <title><?php wp_title('|', true, 'right'); ?></title>
<?php
        }
    add_action('wp_head', 'tx_before_title');
    }
    /*** head title ***/

    /*** head description ***/
    function tx_head_description(){
      global $post;
      $tx_site_description = get_bloginfo('description');
      $tx_page_title = get_the_title();
        if(is_page() || is_single()){
          $tx_custom_description = get_post_meta($post->ID, '_tx_description_seo' ,true);
        }
      $tx_paging_number = isset($_GET['post']) ? esc_html($_GET['post']) : '';
        if(is_home()){
          echo '<meta name="description" content="'.$tx_site_description.'" />'."\n";
        }elseif(is_page() || is_single()){
          /*** usces newmember page ***/
            if(isset($_GET['page']) && $_GET['page'] == 'newmember'){
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.__('Membership Registration','usces').'|'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.__('Membership Registration','usces').'|'.$tx_site_description.'" />'."\n";
              }
          /*** usces newmember page ***/
          /*** usces login page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'login'){
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.__('Log-in','usces').'|'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.__('Log-in','usces').'|'.$tx_site_description.'" />'."\n";
              }
          /*** usces login page ***/
          /*** usces lostmemberpassword page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'lostmemberpassword'){
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.__('The new password acquisition','usces').'|'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.__('The new password acquisition','usces').'|'.$tx_site_description.'" />'."\n";
              }
          /*** usces lostmemberpassword page ***/
          /*** usces changepassword page ***/
            }elseif(isset($_GET['uscesmode']) && $_GET['uscesmode'] == 'changepassword'){
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.__('Change password','usces').'|'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.__('Change password','usces').'|'.$tx_site_description.'" />'."\n";
              }
          /*** usces changepassword page ***/
          /*** usces search item ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'search_item'){
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.__('Items','usces').__('An article category keyword search','usces').'|'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.__('Items','usces').__('An article category keyword search','usces').'|'.$tx_site_description.'" />'."\n";
              }
          /*** usces search item ***/
            }else{
              if(!empty($tx_custom_description)){
                echo '<meta name="description" content="'.esc_html($tx_custom_description).'" />'."\n";
              }else{
                echo '<meta name="description" content="'.$tx_page_title.'|'.$tx_site_description.'" />'."\n";
              }
            }
        }elseif(is_archive() && !is_category()){
          if(is_author()){
            echo '<meta name="description" content="'.get_the_author().'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }elseif(is_day()){
            echo '<meta name="description" content="'.get_the_time(__('Y年Fj日')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }elseif(is_month()){
            echo '<meta name="description" content="'.get_the_time(__('Y年F')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }elseif(is_year()){
            echo '<meta name="description" content="'.get_the_time(__('Y年')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }elseif(is_post_type_archive()){
            echo '<meta name="description" content="'.esc_html(get_post_type_object(get_post_type())->labels->singular_name).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }else{
            echo '<meta name="description" content="'.single_cat_title('', false).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }
        }elseif(is_category()){
          if(is_search()){
            echo '<meta name="description" content="'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }else{
            echo '<meta name="description" content="'.single_cat_title('', false).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
          }
        }elseif(is_search()){
          echo '<meta name="description" content="'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_description.'" />'."\n";
        }else{
          echo '<meta name="description" content="'.$tx_page_title.'|'.$tx_site_description.'" />'."\n";
        }
    }
    add_action('wp_head', 'tx_head_description', -996);
    /*** head description ***/

    /*** head keyword ***/
    function tx_head_keyword(){
      global $post;
        $tx_template_add1 = get_option('tx_template_update1');
          if(is_page() || is_single()){
            $tx_custom_keyword = get_post_meta($post->ID, '_tx_keyword_seo' ,true);
              if(!empty($tx_custom_keyword)){
                echo '<meta name="keywords" content="'.esc_html($tx_custom_keyword).'" />'."\n";
              }else{
                echo '<meta name="keywords" content="'.esc_html($tx_template_add1['tx_key_option']).'" />'."\n";
              }
          }else{
            if(!empty($tx_template_add1['tx_key_option'])){
              echo '<meta name="keywords" content="'.esc_html($tx_template_add1['tx_key_option']).'" />'."\n";
            }
          }
    }
    add_action('wp_head', 'tx_head_keyword', -997);
    /*** head keyword ***/

    /*** non index ***/
    function tx_non_index(){
      global $post;
        if(is_page() || is_single()){
          $tx_custom_noindex = get_post_meta($post->ID, '_tx_noindex_seo' ,true);
          $tx_custom_nofollow = get_post_meta($post->ID, '_tx_nofollow_seo' ,true);
          $tx_custom_noarchive = get_post_meta($post->ID, '_tx_noarchive_seo' ,true);
            if($tx_custom_noindex == 'on' && $tx_custom_nofollow == 'on' && $tx_custom_noarchive == 'on'){
              echo '<meta name="robots" content="noindex,nofollow,noarchive" />'."\n";
            }elseif($tx_custom_noindex == 'on' && $tx_custom_nofollow == 'on' && $tx_custom_noarchive == 'off'){
              echo '<meta name="robots" content="noindex,nofollow" />'."\n";
            }elseif($tx_custom_noindex == 'on' && $tx_custom_nofollow == 'off' && $tx_custom_noarchive == 'on'){
              echo '<meta name="robots" content="noindex,noarchive" />'."\n";
            }elseif($tx_custom_noindex == 'off' && $tx_custom_nofollow == 'on' && $tx_custom_noarchive == 'on'){
              echo '<meta name="robots" content="nofollow,noarchive" />'."\n";
            }elseif($tx_custom_noindex == 'on' && $tx_custom_nofollow == 'off' && $tx_custom_noarchive == 'off'){
              echo '<meta name="robots" content="noindex,follow" />'."\n";
            }elseif($tx_custom_noindex == 'off' && $tx_custom_nofollow == 'on' && $tx_custom_noarchive == 'off'){
              echo '<meta name="robots" content="nofollow" />'."\n";
            }elseif($tx_custom_noindex == 'off' && $tx_custom_nofollow == 'off' && $tx_custom_noarchive == 'on'){
              echo '<meta name="robots" content="noarchive" />'."\n";
            }
        }
    }
    add_action('wp_head', 'tx_non_index', -998);
    /*** non index ***/

    /*** pagination next prev ***/
    function tx_pagination_rel(){
      global $paged, $wp_query;
        if(is_archive() || is_category() || is_search()){
          $tx_max_page = $wp_query->max_num_pages;
            if(!$tx_max_page)
              if(!$paged)
                $paged = 1;
                  $tx_next_page = intval($paged) + 1;
                    if($tx_next_page <= $tx_max_page && $tx_max_page > 1){
                      echo '<link rel="next" href="'.next_posts($tx_max_page, false).'" />'."\n";
                    }
                    if($paged > 1){
                      echo '<link rel="prev" href="'.previous_posts(false).'" />'."\n";
                    }
        }
    }
    add_action('wp_head', 'tx_pagination_rel');
    /*** pagination next prev ***/

    /*** h1 ***/
    function tx_custom_h1(){
    global $post;
    $tx_site_title = get_bloginfo('name');
    $tx_page_title = get_the_title();
      if(is_page() || is_single()){
        $tx_custom_h1 = get_post_meta($post->ID, '_tx_h1_seo' ,true);
      }
        if(is_home()){
          echo '<h1>'.$tx_site_title.'</h1>'."\n";
        }elseif(is_page() || is_single()){
          /*** usces newmember page ***/
            if(isset($_GET['page']) && $_GET['page'] == 'newmember'){
              if(!empty($tx_custom_h1)){
                echo '<h1>'.__('Membership Registration','usces').'|'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.__('Membership Registration','usces').'|'.$tx_site_title.'</h1>'."\n";
              }
          /*** usces newmember page ***/
          /*** usces login page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'login'){
              if(!empty($tx_custom_h1)){
                echo '<h1>'.__('Log-in','usces').'|'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.__('Log-in','usces').'|'.$tx_site_title.'</h1>'."\n";
              }
          /*** usces login page ***/
          /*** usces lostmemberpassword page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'lostmemberpassword'){
              if(!empty($tx_custom_h1)){
                echo '<h1>'.__('The new password acquisition','usces').'|'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.__('The new password acquisition','usces').'|'.$tx_site_title.'</h1>'."\n";
              }
          /*** usces lostmemberpassword page ***/
          /*** usces changepassword page ***/
            }elseif(isset($_GET['uscesmode']) && $_GET['uscesmode'] == 'changepassword'){
              if(!empty($tx_custom_h1)){
                echo '<h1>'.__('Change password','usces').'|'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.__('Change password','usces').'|'.$tx_site_title.'</h1>'."\n";
              }
          /*** usces changepassword page ***/
          /*** usces search item ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'search_item'){
              if(!empty($tx_custom_h1)){
                echo '<h1>'.__('Items','usces').__('An article category keyword search','usces').'|'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.__('Items','usces').__('An article category keyword search','usces').'|'.$tx_site_title.'</h1>'."\n";
              }
          /*** usces search item ***/
            }else{
              if(!empty($tx_custom_h1)){
                echo '<h1>'.esc_html($tx_custom_h1).'</h1>'."\n";
              }else{
                echo '<h1>'.$tx_page_title.'|'.$tx_site_title.'</h1>'."\n";
              }
            }
        }elseif(is_archive() && !is_category()){
          if(is_author()){
            echo '<h1>'.get_the_author().'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }elseif(is_day()){
            echo '<h1>'.get_the_time(__('Y年Fj日')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }elseif(is_month()){
            echo '<h1>'.get_the_time(__('Y年F')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }elseif(is_year()){
            echo '<h1>'.get_the_time(__('Y年')).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }elseif(is_post_type_archive()){
            echo '<h1>'.esc_html(get_post_type_object(get_post_type())->labels->singular_name).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }else{
            echo '<h1>'.single_cat_title('', false).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }
        }elseif(is_category()){
          if(is_search()){
            echo '<h1>'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }else{
            echo '<h1>'.single_cat_title('', false).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
          }
        }elseif(is_search()){
          echo '<h1>'.esc_attr($_GET['s']).'|'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '|'; } echo $tx_site_title.'</h1>'."\n";
        }else{
          echo '<h1>'.$tx_page_title.'|'.$tx_site_title.'</h1>'."\n";
        }
    }
    /*** h1 ***/

// ----- footer title
  function tx_custom_footer_title(){
    global $post;
      $tx_site_title = get_bloginfo('name');
      $tx_page_title = get_the_title();
        if(is_page() || is_single()){
          $tx_custom_h1 = get_post_meta($post->ID, '_tx_h1_seo' ,true);
        }
        if(is_home()){
          echo '<h1><a href="'.home_url('/').'">'.$tx_site_title.'</a></h1>'."\n";
        }elseif(is_page() || is_single()){
          /*** usces newmember page ***/
            if(isset($_GET['page']) && $_GET['page'] == 'newmember'){
              if(!empty($tx_custom_h1)){
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Membership Registration','usces').'｜'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Membership Registration','usces').'｜'.$tx_site_title.'</a>'."\n";
              }
          /*** usces newmember page ***/
          /*** usces login page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'login'){
              if(!empty($tx_custom_h1)){
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Log-in','usces').'｜'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Log-in','usces').'｜'.$tx_site_title.'</a>'."\n";
              }
          /*** usces login page ***/
          /*** usces lostmemberpassword page ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'lostmemberpassword'){
              if(!empty($tx_custom_h1)){
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('The new password acquisition','usces').'｜'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('The new password acquisition','usces').'｜'.$tx_site_title.'</a>'."\n";
              }
          /*** usces lostmemberpassword page ***/
          /*** usces changepassword page ***/
            }elseif(isset($_GET['uscesmode']) && $_GET['uscesmode'] == 'changepassword'){
              if(!empty($tx_custom_h1)){
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Change password','usces').'｜'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Change password','usces').'｜'.$tx_site_title.'</a>'."\n";
              }
          /*** usces changepassword page ***/
          /*** usces search item ***/
            }elseif(isset($_GET['page']) && $_GET['page'] == 'search_item'){
              if(!empty($tx_custom_h1)){
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Items','usces').__('An article category keyword search','usces').'｜'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.__('Items','usces').__('An article category keyword search','usces').'｜'.$tx_site_title.'</a>'."\n";
              }
          /*** usces search item ***/
            }else{
              if(!empty($tx_custom_h1)){
                echo '<a href="'.get_the_permalink().'">'.esc_html($tx_custom_h1).'</a>'."\n";
              }else{
                echo '<a href="'.get_the_permalink().'">'.$tx_page_title.'｜'.$tx_site_title.'</a>'."\n";
              }
            }
        }elseif(is_archive() && !is_category()){
          if(is_author()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.get_the_author().'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }elseif(is_day()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.get_the_time(__('Y年Fj日')).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }elseif(is_month()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.get_the_time(__('Y年F')).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }elseif(is_year()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.get_the_time(__('Y年')).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }elseif(is_post_type_archive()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.esc_html(get_post_type_object(get_post_type())->labels->singular_name).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }else{
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.single_cat_title('', false).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }
        }elseif(is_category()){
          if(is_search()){
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.esc_attr($_GET['s']).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }else{
            echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.single_cat_title('', false).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
          }
        }elseif(is_search()){
          echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.esc_attr($_GET['s']).'｜'; if(get_query_var('paged')){ printf(__('Page %s'),get_query_var('paged')); echo '｜'; } echo $tx_site_title.'</a>'."\n";
        }else{
          echo '<a href="'.esc_url($_SERVER['REQUEST_URI']).'">'.$tx_page_title.'｜'.$tx_site_title.'</a>'."\n";
        }
    }
// footer title

    /*** head other ***/
    function tx_wphead_add(){
      global $post,$locale;
      $tx_site_title = get_bloginfo('name');
      $tx_page_title = get_the_title();
      $tx_site_description = get_bloginfo('description');
      $tx_template_addition1 = get_option('tx_template_update1');
      if($locale == 'ja'){
        $locale = 'ja_JP';
      }
      if(is_page() || is_single()){
        $tx_custom_title = get_post_meta($post->ID, '_tx_title_seo' ,true);
        $tx_custom_description = get_post_meta($post->ID, '_tx_description_seo' ,true);
        $tx_image_path = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large');
      }
      /* facebook ogp */
        if(is_home() || is_page() || is_single()){
          if(!empty($tx_template_addition1['tx_fb_admin_option']) && empty($tx_template_addition1['tx_fb_app_option'])){
            echo '<meta property="fb:admins" content="'.esc_html($tx_template_addition1['tx_fb_admin_option']).'" />'."\n";
          }elseif(empty($tx_template_addition1['tx_fb_admin_option']) && !empty($tx_template_addition1['tx_fb_app_option'])){
            echo '<meta property="fb:app_id" content="'.esc_html($tx_template_addition1['tx_fb_app_option']).'" />'."\n";
          }elseif(!empty($tx_template_addition1['tx_fb_admin_option']) && !empty($tx_template_addition1['tx_fb_app_option'])){
            echo '<meta property="fb:admins" content="'.esc_html($tx_template_addition1['tx_fb_admin_option']).'" />'."\n";
          }
            if(!is_page('usces-cart') && !is_page('usces-member')){
              echo '<meta property="og:locale" content="'.$locale.'" />'."\n";
            }
          }

            if(is_home()){
              echo '<meta property="og:title" content="'.$tx_site_title.'">'."\n";
              echo '<meta property="og:type" content="website">'."\n";
              echo '<meta property="og:description" content="'.$tx_site_description.'">'."\n";
              echo '<meta property="og:url" content="'.home_url('/').'">'."\n";
              echo '<meta property="og:site_name" content="'.$tx_site_title.'">'."\n";
            }elseif(is_page()){
              if(!is_page('usces-cart') && !is_page('usces-member')){
                if(!empty($tx_custom_title)){
                  echo '<meta property="og:title" content="'.esc_html($tx_custom_title).'">'."\n";
                }else{
                  echo '<meta property="og:title" content="'.$tx_page_title.'|'.$tx_site_title.'">'."\n";
                }
                echo '<meta property="og:type" content="website">'."\n";
                  if(!empty($tx_custom_description)){
                    echo '<meta property="og:description" content="'.esc_html($tx_custom_description).'">'."\n";
                  }else{
                    echo '<meta property="og:description" content="'.$tx_page_title.'|'.$tx_site_description.'">'."\n";
                  }
                echo '<meta property="og:url" content="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'."\n";
                  if(!empty($tx_custom_title)){
                    echo '<meta property="og:site_name" content="'.esc_html($tx_custom_title).'">'."\n";
                  }else{
                    echo '<meta property="og:site_name" content="'.$tx_page_title.'|'.$tx_site_title.'">'."\n";
                  }
                  if(has_post_thumbnail()){
                  echo '<meta property="og:image" content="'.$tx_image_path[0].'">'."\n";
                  }
              }
            }elseif(is_single()){
              if(!empty($tx_custom_title)){
                echo '<meta property="og:title" content="'.esc_html($tx_custom_title).'">'."\n";
              }else{
                echo '<meta property="og:title" content="'.$tx_page_title.'|'.$tx_site_title.'">'."\n";
              }
              echo '<meta property="og:type" content="article">'."\n";
                if(!empty($tx_custom_description)){
                  echo '<meta property="og:description" content="'.esc_html($tx_custom_description).'">'."\n";
                }else{
                  echo '<meta property="og:description" content="'.$tx_page_title.'|'.$tx_site_description.'">'."\n";
                }
              echo '<meta property="og:url" content="'.esc_url(home_url().$_SERVER['REQUEST_URI']).'">'."\n";
                if(usces_the_itemImageURL(0,'return')){
                  if(has_post_thumbnail()){
                    echo '<meta property="og:image" content="'.usces_the_itemImageURL(0, 'return').'">'."\n";
                  }
                }else{
                  if(has_post_thumbnail()){
                    echo '<meta property="og:image" content="'.$tx_image_path[0].'">'."\n";
                  }
                }
                if(!empty($tx_custom_title)){
                  echo '<meta property="og:site_name" content="'.esc_html($tx_custom_title).'">'."\n";
                }else{
                  echo '<meta property="og:site_name" content="'.$tx_page_title.'|'.$tx_site_title.'">'."\n";
                }
        }
      /* facebook ogp end */

      /* twitter card */
        if(!empty($tx_template_addition1['tx_tw_option'])){
          if(is_home() || is_page() || is_single()){
            if(!is_page('usces-cart') && !is_page('usces-member')){
              echo '<meta name="twitter:card" content="summary_large_image">'."\n";
              echo '<meta name="twitter:site" content="@'.esc_html($tx_template_addition1['tx_tw_option']).'">'."\n";
            }
          }
             if(is_home()){
               echo '<meta name="twitter:title" content="'.$tx_site_title.'" />'."\n";
               echo '<meta name="twitter:description" content="'.$tx_site_description.'" />'."\n";
             }elseif(is_page() || is_single()){
               if(!is_page('usces-cart') && !is_page('usces-member')){
                 if(!empty($tx_custom_title)){
                   echo '<meta name="twitter:title" content="'.esc_html($tx_custom_title).'">'."\n";
                 }else{
                   echo '<meta name="twitter:title" content="'.$tx_page_title.'|'.$tx_site_title.'">'."\n";
                 }
                 if(!empty($tx_custom_description)){
                   echo '<meta name="twitter:description" content="'.esc_html($tx_custom_description).'">'."\n";
                 }else{
                   echo '<meta name="twitter:description" content="'.$tx_page_title.'|'.$tx_site_description.'">'."\n";
                 }
                 if(usces_the_itemImageURL(0,'return')){
                   if(has_post_thumbnail()){
                     echo '<meta name="twitter:image:src" content="'.usces_the_itemImageURL(0, 'return').'">'."\n";
                   }
                 }else{
                   if(has_post_thumbnail()){
                     echo '<meta name="twitter:image:src" content="'.$tx_image_path[0].'">'."\n";
                   }
                 }
              }
           }
        }
      /* twitter card end */
    }
    add_action('wp_head', 'tx_wphead_add');
    /*** head other ***/

    /*** head ua ***/
    function vary_ua($head_vary){
      if(!is_admin()){
        $head_vary['Vary'] = 'User-Agent';
          return $head_vary;
      }
    }
    add_filter('wp_headers', 'vary_ua');
    /*** head ua ***/

    function remove_recent_comments_style() {
      global $wp_widget_factory;
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
    add_action('widgets_init', 'remove_recent_comments_style');

    function tx_remove_version($src){
      if(strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
          return $src;
    }
    add_filter('script_loader_src', 'tx_remove_version');
    add_filter('style_loader_src', 'tx_remove_version');

    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // ----- usces ogp hide
    function custom_usces_filter_ogp_meta($ogs){
      global $usces, $post;
        unset($ogs['title']);
        unset($ogs['type']);
        unset($ogs['description']);
        unset($ogs['url']);
        unset($ogs['image']);
        unset($ogs['site_name']);
          return $ogs;
    }
    add_filter('usces_filter_ogp_meta', 'custom_usces_filter_ogp_meta', 10, 4);
?>