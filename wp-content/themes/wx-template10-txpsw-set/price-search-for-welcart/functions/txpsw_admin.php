<?php
/*-------------- Can not delete / edit ---------------------------------------------

Plugin Name: TX Price Search for Welcart
Plugin URI: https://templx.com/
Description: It is only for this plugin: Welcart e-Commerce.
Author: TEMPLX
Author URI: https://templx.com/
License: GPLv2 or later

///////////////////////////////////////////////////////////////////
Copyright is still in TEMPLX even after purchase.
We will prohibit change / deletion of copyright owner and URL etc.
///////////////////////////////////////////////////////////////////

--------------- Can not delete / edit --------------------------------------------- */

// ----- Admin Page Create
   function tx_price_search_add(){
       add_submenu_page(USCES_PLUGIN_BASENAME, __('TX Price Search for Welcart','txpsw'), __('TX Price Search for Welcart','txpsw'), 'level_6', 'txpsw_page', 'price_search_admin_page');
   }
   add_action('usces_action_shop_admin_menue', 'tx_price_search_add');
// ----- Admin Page Create

// ----- Form Check
   function txpsw_add_remove_check($txpsw_add_check){
       $txpsw_add_check = preg_replace('/<(\?+)php(.*?)(\?+)>/i', '', $txpsw_add_check);
       $txpsw_add_check = preg_replace('/<style\b[^>]*>(.*?)<\/style>/i', '', $txpsw_add_check);
       $txpsw_add_check = preg_replace('/<script\b[^>]*>(.*?)<\/script>/i', '', $txpsw_add_check);
       $txpsw_add_check = preg_replace('/on[a-zA-Z]+=.*\"/is', '', $txpsw_add_check);
           return $txpsw_add_check;
   }
// ----- Form Check

// ----- Form Update
   function price_search_admin_page(){
       $_POST = txpsw_add_remove_check($_POST);
       $txpsw_options = get_option('txpsw_add_page_update');
           if(isset($_POST['txpsw_submit']) && $_POST['txpsw_submit'] == 'txpsw_add_page'){
               $txpsw_add_array = array(
                   'txpsw_form_any','txpsw_front_css','txpsw_form_title','txpsw_price_form_title','txpsw_templx_display','txpsw_form1','txpsw_form2','txpsw_form3','txpsw_form4','txpsw_form5',
                   'txpsw_form6','txpsw_form7','txpsw_form8','txpsw_form9','txpsw_form10','txpsw_form11','txpsw_form12','txpsw_form13','txpsw_form14','txpsw_form15','txpsw_form16','txpsw_form17'
               );
                   foreach($txpsw_add_array as $txpsw_add_array_inside){
                       $txpsw_options[$txpsw_add_array_inside] = isset($_POST[$txpsw_add_array_inside]) ? esc_attr($_POST[$txpsw_add_array_inside]) : ''; 
                   }
                            check_admin_referer('txpsw_add_field');
                            update_option('txpsw_add_page_update', $txpsw_options);
           }
                       if(isset($_POST['txpsw_prices_update']) && $_POST['txpsw_prices_update'] == 'txpsw_add_prices_update'){
                           $txpsw_conversion_update = txpsw_conversion_price();
                       }
                           if(isset($txpsw_conversion_update) && $txpsw_conversion_update === true){
                               $txpsw_update_propriety = 'completion';
                           }elseif(isset($txpsw_conversion_update) && $txpsw_conversion_update === false){
                               $txpsw_update_propriety = 'error';
                           }else{
                               $txpsw_update_propriety = '';
                           }
  require_once(TXPSW_PLUGIN_DIR. 'functions/txpsw_admin_page.php');
  }
// ----- Form Update

// ----- Price Update
    function txpsw_conversion_price(){
        global $usces;
            $txpsw_c_prices = true;
            $txpsw_id_price = $usces->getItemIds('front');
                if(TXPSW_TEMPLATE_AUTHOR !== 'TEMPLX'){
                    foreach((array)$txpsw_id_price as $txpsw_id_price_in){
                        $txpsw_get_sku = $usces->get_skus($txpsw_id_price_in);
                        $txpsw_get_price = $txpsw_get_sku[0]['price'];
                            update_post_meta($txpsw_id_price_in, 'txpsw_db_prices', $txpsw_get_price);
                            update_post_meta($txpsw_id_price_in, 'widget_txpsw-widget', $txpsw_get_price);
                    }
                }elseif(TXPSW_TEMPLATE_AUTHOR === 'TEMPLX'){
                    foreach((array)$txpsw_id_price as $txpsw_id_price_in){
                        $txpsw_get_price = $usces->getItemPrice($txpsw_id_price_in);
                            if(is_array($txpsw_get_price) && !empty($txpsw_get_price)){
                                sort($txpsw_get_price);
                                    $txpsw_get_sort_price = $txpsw_get_price[0];
                            }else{
                                $txpsw_get_sort_price = '';
                            }
                        update_post_meta($txpsw_id_price_in, 'tx_sort_db_prices', $txpsw_get_sort_price);
                        update_post_meta($txpsw_id_price_in, 'widget_txpsw-widget', $txpsw_get_sort_price);
                    }
                }
        return $txpsw_c_prices;
    }
// ----- Price Update

// ----- Read Css File
   function txpsw_admin_css_style(){
       wp_enqueue_style('txpsw-admin', TXPSW_PLUGIN_URL. 'css/txpsw-admin.css', array(), NULL, 'all');
           if(isset($_GET['page']) && ($_GET['page'] == 'addition_5')){
               wp_enqueue_script('txpsw-admin', TXPSW_PLUGIN_URL. 'js/txpsw-admin.js', array(), NULL, true);
           }
   }
   add_action('admin_enqueue_scripts', 'txpsw_admin_css_style');
// ----- Read Css File
?>