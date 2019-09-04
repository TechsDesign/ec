<?php
// ----- usces widget bestseller
  function custom_bestseller_func() {
    $args = func_get_args();
    list($html, $post_id, $index) = $args;
    $html_soldout_img = (get_bloginfo('template_directory'). '/images/sold-out.png');
    $post = get_post($post_id);
    $tx_html_topitem_noimage = (get_bloginfo('template_directory'). '/images/noimage2.jpg');
    $tx_post_new_image_url = usces_the_itemImageURL(0, 'return',$post);
    $tx_post_new_cat = get_the_category($post_id);
    $tx_post_new_cat_count = count($tx_post_new_cat);
    $i = 0;
    $list = '<li class="txranking-item-in"><span class="img">';
     if($tx_post_new_image_url == ''){
       $list .= '<a href="'.get_permalink($post_id).'" class="intersection-img"><img src="'.$tx_html_topitem_noimage.'" width="60" height="60" alt="'.$post->post_title.'" /></a>';
     }else{
        $list .= '<a href="'.get_permalink($post_id).'" class="intersection-img">'.usces_the_itemImage(0, 60, 60, $post, 'return').'</a>';
     }
        $list .= '</span><span class="number">第'.($index+1).'位';
          if(!usces_have_zaiko_anyone($post_id)){
            $list .= '<span>Soldout</span>';
          }
        $list .= '</span><span class="title"><a href="'.get_permalink($post_id).'">'.mb_strimwidth($post->post_title, 0, 60, '...').'</a></span>';
          if($tx_post_new_cat){
            $list .= '<span class="ranking-cat">'.__('Categories', 'usces').':&nbsp;';
              foreach($tx_post_new_cat as $tx_post_new_cat_in){
                $i++;
                $tx_post_catlink = get_category_link($tx_post_new_cat_in);
                $list .= '<a href="'.$tx_post_catlink.'">'.$tx_post_new_cat_in->cat_name.'</a>';
                  if($tx_post_new_cat_count != $i){
                    $list .= ',&nbsp;'; 
                  }
              }
            $list .= '</span>';
          }
        $list .= '</li>';
          return $list;
  }
  add_filter('usces_filter_bestseller', 'custom_bestseller_func', 10, 3);
// usces widget bestseller

// ----- usces widget featured
  function custom_filter_featured_widget($list, $post, $list_index, $instance){
    global $usces;
    $tx_item_featured_price_get = $usces->getItemPrice($post->ID);
      sort($tx_item_featured_price_get);
    $tx_html_featured_noimage = (get_bloginfo('template_directory'). '/images/noimage2.jpg');
    $tx_post_featured_image = usces_the_itemImage(0, 60, 60, $post, 'return');
    $tx_post_featured_image_url = usces_the_itemImageURL(0, 'return', $post);
    $tx_post_featured_cat = get_the_category($post->ID);
    $tx_post_featured_cat_count = count($tx_post_featured_cat);
    $i = 0;
      $list = '<div class="widget-featured"><div class="thumimg">';
        if($tx_post_featured_image_url == ''){
          $list .= '<a href="'.get_permalink($post->ID).'" class="intersection-img"><img src="'.$tx_html_featured_noimage.'" width="60" height="60" alt="'.$post->post_title.'" /></a>';
        }else{
          $list .= '<a href="'.get_permalink($post->ID).'" class="intersection-img">'.$tx_post_featured_image.'</a>';
        }
      $list .= '</div>';
      $list .= '<div class="thumtitle"><a href="'.get_permalink($post->ID).'" rel="bookmark">'.mb_strimwidth($post->post_title, 0, 60, '...').'</a></div>';
        if(!usces_have_zaiko_anyone($post->ID)){
          $list .= '<div class="featured-price"><span class="price">Soldout</span></div>';
        }else{
          $list .= '<div class="featured-price"><span class="price">'.usces_crform($tx_item_featured_price_get[0], true, false, 'return').'</span><span class="tax">'.usces_guid_tax('return').'</span></div>';
        }
          if($tx_post_featured_cat){
            $list .= '<div class="featured-cat">'.__('Categories', 'usces').':&nbsp;';
              foreach($tx_post_featured_cat as $tx_post_featured_cat_in){
                $i++;
                $tx_post_featured_catlink = get_category_link($tx_post_featured_cat_in);
                $list .= '<a href="'.$tx_post_featured_catlink.'">'.$tx_post_featured_cat_in->cat_name.'</a>';
                  if($tx_post_featured_cat_count != $i){
                    $list .= ',&nbsp;'; 
                  }
              }
            $list .= '</div>';
          }
      $list .= '</div>';
      return $list;
  }
  add_filter('usces_filter_featured_widget', 'custom_filter_featured_widget', 10 ,4);
// usces widget featured

// ----- usces widget serach
  function custom_usces_filter_search_widget_form($search_form){
    global $usces;
      $top_search_widget_cat_id = get_category_by_slug('item');
      $top_search_widget_cat = get_terms('category', 'child_of='.$top_search_widget_cat_id->term_id.'&orderby=title&order=ASC&title_li=');
        $search_form = '<input type="hidden" name="itemsearch" value="item_post">';
        $search_form .= '
          <span class="search-select">
            <select id="cat" class="postform" name="cat">
              <option value="'.$top_search_widget_cat_id->term_id.'"';
                if(isset($_GET['cat'])){
                  if($_GET['cat'] == $top_search_widget_cat_id->term_id) $search_form .= ' selected="selected"';
                }
                  $search_form .= '>'.$top_search_widget_cat_id->name.'</option>';
                    foreach($top_search_widget_cat as $top_search_widget_cat_in){
                      $search_form .= '<option value="'.$top_search_widget_cat_in->term_id.'"';
                        if(isset($_GET['cat'])){
                          if($_GET['cat'] == $top_search_widget_cat_in->term_id) $search_form .= ' selected="selected"';
                        }
                      $search_form .= '>'.$top_search_widget_cat_in->name.'</option>';
                    }
        $search_form .= '</select></span>';
        $search_form .= '<span class="search-custom"><a href="'.(USCES_CART_URL.$usces->delim).'page=search_item">'.__("'AND' search by categories", 'usces').'</a></span>';
      return $search_form;
  }
  add_filter('usces_filter_search_widget_form', 'custom_usces_filter_search_widget_form');
// usces widget serach

// ----- usces widget login
  function custom_usces_filter_login_widget($loginbox){
?>
   <div class="loginbox">
     <?php if ( ! usces_is_login() ) { ?>
       <form name="loginwidget" id="loginformw" action="<?php echo USCES_MEMBER_URL; ?>" method="post">
         <p>
           <label><span><?php _e('e-mail adress', 'usces'); ?>:</span>
             <input type="text" name="loginmail" id="loginmailw" class="loginmail" value="<?php usces_remembername(); ?>" size="20" placeholder="メールアドレスを入力" /></label><br />
           <label><span><?php _e('password', 'usces'); ?>:</span>
             <input type="password" name="loginpass" id="loginpassw" class="loginpass" size="20" placeholder="パスワードを入力" /></label><br />
           <label><input name="rememberme" type="checkbox" id="remembermew" value="forever" /> <?php _e('Remember Me', 'usces'); ?></label>
         </p>
         <p class="submit">
           <input type="submit" name="member_login" id="member_loginw" value="<?php _e('Log-in', 'usces'); ?>" />
         </p>
         <?php echo apply_filters('usces_filter_login_inform', NULL); ?>
       </form>
       <a href="<?php echo USCES_LOSTMEMBERPASSWORD_URL; ?>" title="<?php _e('Pssword Lost and Found', 'usces'); ?>"><?php _e('Lost your password?', 'usces'); ?></a><br />
       <a href="<?php echo USCES_NEWMEMBER_URL; ?>" title="<?php _e('New enrollment for membership.', 'usces'); ?>"><?php _e('New enrollment for membership.', 'usces'); ?></a>
     <?php }else{ ?>
       <div class="login-member-np">
         <p><?php echo sprintf(_x('%s', 'honorific', 'usces'), usces_the_member_name('return')); ?></p>
           <?php
             if(usces_is_membersystem_point()){
               echo '<p class="point">'.__('Points','usces').':'.usces_memberinfo('point','return').'</p>';
             }
           ?>
       </div>
       <div class="login-member">
         <p class="left"><?php echo usces_loginout(); ?></p>
         <p class="right"><a href="<?php echo USCES_MEMBER_URL; ?>" class="login_widget_mem_info_a"><?php _e('Membership information','usces') ?></a></p>
       </div>
     <?php } ?>
   </div>
<?php
  }
  add_filter('usces_filter_login_widget', 'custom_usces_filter_login_widget');
// usces widget login

// ----- usces widget category sort
 function usces_widget_sort_category( $widget_category_sort ){
   $widget_category_sort .= '&orderby=title&order=ASC';
   return $widget_category_sort;
 }
 add_action('usces_filter_welcart_category', 'usces_widget_sort_category');
// usces widget category sort

// ----- usces admin widget hide
/*****
  function unregister_default_wp_widgets(){
    unregister_widget('**widget name**');
  }
  add_action('widgets_init', 'unregister_default_wp_widgets', 11);
****/
// usces admin widget hide
?>