<?php
 function tx_sort_forking_query($wp_query){
    if(is_admin() || !$wp_query->is_main_query()){
      return;
    }

      if($wp_query->is_category()){
        if(isset($_GET['sort']) && ($_GET['sort'] == 'price_up')){
          $wp_query->set('orderby', 'meta_value_num');
          $wp_query->set('meta_key', 'tx_sort_db_prices');
          $wp_query->set('order', 'DESC');
        }elseif(isset($_GET['sort']) && ($_GET['sort'] == 'price_down')){
          $wp_query->set('orderby', 'meta_value_num');
          $wp_query->set('meta_key', 'tx_sort_db_prices');
          $wp_query->set('order', 'ASC');
        }elseif(isset($_GET['sort']) && ($_GET['sort'] == 'stock_up')){
          $wp_query->set('orderby', 'meta_value_num');
          $wp_query->set('meta_key', 'tx_sort_db_stocks');
          $wp_query->set('order', 'DESC');
        }elseif(isset($_GET['sort']) && ($_GET['sort'] == 'stock_down')){
          $wp_query->set('orderby', 'meta_value_num');
          $wp_query->set('meta_key', 'tx_sort_db_stocks');
          $wp_query->set('order', 'ASC');
        }elseif(isset($_GET['sort']) && ($_GET['sort'] == 'title_up')){
          $wp_query->set('orderby', 'meta_value');
          $wp_query->set('meta_key', '_itemName');
          $wp_query->set('order', 'ASC');
        }elseif(isset($_GET['sort']) && ($_GET['sort'] == 'new')){
          $wp_query->set('orderby', 'ID');
          $wp_query->set('order', 'DESC');
        }else{
          $wp_query->set('orderby', 'ID');
          $wp_query->set('order', 'DESC');
        } return;
      }

      if($wp_query->is_archive()){
        $wp_query->set('orderby', 'ID');
        $wp_query->set('order', 'DESC');
          return;
      }

      $tx_default_search_notin = get_category_by_slug('item');
      $tx_default_search_notin_id = $tx_default_search_notin->cat_ID; 
        if($wp_query->is_search() && isset($_GET['default'])){
          $wp_query->set('category__not_in', $tx_default_search_notin_id);
          $wp_query->set('post_type', 'post');
            return;
        }
 }
   add_action('pre_get_posts', 'tx_sort_forking_query');

if(!function_exists('tx_sort_buttom')){
 function tx_sort_buttom(){
   $tx_template_addition5 = get_option('tx_template_update5');
   $tx_sort_category = get_query_var('cat');
   $tx_query_price_up = add_query_arg(array('sort' => 'price_up'),get_category_link($tx_sort_category));
   $tx_query_price_down = add_query_arg(array('sort' => 'price_down'),get_category_link($tx_sort_category));
   $tx_query_id_postnew = add_query_arg(array('sort' => 'new'),get_category_link($tx_sort_category));
   $tx_query_stock_up = add_query_arg(array('sort' => 'stock_up'),get_category_link($tx_sort_category));
   $tx_query_stock_down = add_query_arg(array('sort' => 'stock_down'),get_category_link($tx_sort_category));
   $tx_query_title_up = add_query_arg(array('sort' => 'title_up'),get_category_link($tx_sort_category));

     if(!empty($tx_template_addition5['tx_subnewitem_option']) || !empty($tx_template_addition5['tx_priceupitem_option']) || !empty($tx_template_addition5['tx_pricedownitem_option']) || !empty($tx_template_addition5['tx_stockupitem_option']) || !empty($tx_template_addition5['tx_stockdownitem_option']) || !empty($tx_template_addition5['tx_abcdeitem_option'])){
       echo '<div class="category-sort">';
         if(!empty($tx_template_addition5['tx_subnewitem_option'])){
           if($tx_template_addition5['tx_subnewitem_option'] == 'newitem'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'new'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_id_postnew.'">新着</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_id_postnew.'">新着</a></p>';
             }
           }
         }
         if(!empty($tx_template_addition5['tx_priceupitem_option'])){
           if($tx_template_addition5['tx_priceupitem_option'] == 'priceup'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'price_up'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_price_up.'">価格が高い</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_price_up.'">価格が高い</a></p>';
             }
           }
         }
         if(!empty($tx_template_addition5['tx_pricedownitem_option'])){
           if($tx_template_addition5['tx_pricedownitem_option'] == 'pricedown'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'price_down'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_price_down.'">価格が安い</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_price_down.'">価格が安い</a></p>';
             }
           }
         }
         if(!empty($tx_template_addition5['tx_stockupitem_option'])){
           if($tx_template_addition5['tx_stockupitem_option'] == 'stockup'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'stock_up'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_stock_up.'">在庫が多い</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_stock_up.'">在庫が多い</a></p>';
             }
            }
         }
         if(!empty($tx_template_addition5['tx_stockdownitem_option'])){
           if($tx_template_addition5['tx_stockdownitem_option'] == 'stockdown'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'stock_down'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_stock_down.'">在庫が少ない</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_stock_down.'">在庫が少ない</a></p>';
             }
           }
         }
         if(!empty($tx_template_addition5['tx_abcdeitem_option'])){
           if($tx_template_addition5['tx_abcdeitem_option'] == 'titleup'){
             if(isset($_GET['sort']) && $_GET['sort'] == 'title_up'){
               echo '<p class="sort-but-on"><a href="'.$tx_query_title_up.'">タイトル順</a></p>';
             }else{
               echo '<p class="sort-but"><a href="'.$tx_query_title_up.'">タイトル順</a></p>';
             }
           }
         }
       echo '</div>';
     }
 }
}

 function tx_sort_conversion_stock(){
   global $usces;
     $tx_sort_stocks = true;
     $tx_sort_id_stock = $usces->getItemIds('front');
       foreach((array)$tx_sort_id_stock as $tx_sort_id_stock_in){
         $tx_get_skus = $usces->get_skus($tx_sort_id_stock_in);
            foreach($tx_get_skus as $tx_in_skus){ $tx_get_stocks = $tx_in_skus['stocknum']; }
            update_post_meta($tx_sort_id_stock_in, 'tx_sort_db_stocks', $tx_get_stocks);
       }
       return $tx_sort_stocks;
 }

 function tx_sort_conversion_price(){
   global $usces;
     $tx_sort_prices = true;
     $tx_sort_id_price = $usces->getItemIds('front');
       foreach((array)$tx_sort_id_price as $tx_sort_id_price_in){
         $tx_get_price = $usces->getItemPrice($tx_sort_id_price_in);
           if(is_array($tx_get_price) && !empty($tx_get_price)){
             sort($tx_get_price);
             $tx_get_sort_price = $tx_get_price[0];
           }else{
             $tx_get_sort_price = '';
           }
           update_post_meta($tx_sort_id_price_in, 'tx_sort_db_prices', $tx_get_sort_price);
       }
       return $tx_sort_prices;
 }

 function tx_sort_rearrangement(){
  global $usces,$post;
    $tx_itemimg_noimg = (get_bloginfo('template_directory'). '/images/noimage1.jpg');
    $tx_sort_soldout_img = (get_bloginfo('template_directory'). '/images/soldout.png');
       if(have_posts()) : 
         echo '<div class="item-category-in">'."\n";
           while(have_posts()) : the_post();
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
           endwhile;
         echo '</div>'."\n";
       endif;
 }

 function tx_category_total_item(){
   global $wp_query,$wpdb;
     $tx_cat_total_category = get_query_var('cat');
      $tx_cat_total_sql = "
            SELECT COUNT(*)
            FROM $wpdb->posts as p
            LEFT JOIN $wpdb->term_relationships as r ON p.ID = r.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t ON r.term_taxonomy_id = t.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms ON t.term_id = terms.term_id
            WHERE post_status = 'publish'
            AND post_type = 'post'
            AND t.taxonomy = 'category' AND terms.term_id = '{$tx_cat_total_category}'
            ";
    $tx_cat_total_item = $wpdb->get_var($tx_cat_total_sql);
      if($tx_cat_total_item > 0){
         if($tx_cat_total_page = get_query_var('paged')) $tx_cat_total_page--;
            $tx_cat_total_per_page = get_query_var('posts_per_page');
            $tx_cat_total_from = $tx_cat_total_page * $tx_cat_total_per_page;
            $tx_cat_total_to = min($tx_cat_total_from++ + get_query_var('posts_per_page'), $tx_cat_total_item);
            $tx_cat_total_cat_name = get_category($tx_cat_total_category);
               printf('<div class="item-count">%s[%d件中]&nbsp;&nbsp;%d件&nbsp;-&nbsp;%d件</div>',
              get_search_query(),$tx_cat_total_item,$tx_cat_total_from,$tx_cat_total_to);
         }else{
              printf('カテゴリー「'.esc_html($tx_cat_total_cat_name->name).'%s」', get_search_query());
       }
 }
?>